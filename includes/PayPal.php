<?php

require __DIR__ . '/config/app.php';
require __DIR__ . '/config/paypal.php';

class PayPal
{
    protected $db;

    function __construct()
    {
        $this->db = DB();
    }

    public function isEmail($email)
    {
        $email = mysqli_real_escape_string($this->db, $email);
        $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        if (mysqli_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function isValidPassword($email, $password)
    {
        $email = mysqli_real_escape_string($this->db, $email);
        $password = mysqli_real_escape_string($this->db, $password);

        if ($this->isEmail($email)) {
            $enc_password = $this->findPasswordByEmail($email);
            if (password_verify($password, $enc_password)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }

    }

    function findPasswordByEmail($email)
    {
        $query = "SELECT password FROM `users` WHERE `email`='$email'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        $data = '';
        if (mysqli_num_rows($result) > 0) {
            while ($r = mysqli_fetch_assoc($result)) {
                $data = $r['password'];
            }
        }

        return $data;
    }

    public function getUserIDByEmail($email)
    {
        $email = mysqli_real_escape_string($this->db, $email);
        $query = "SELECT id FROM `users` WHERE `email` = '$email'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        $data = '';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data = $row['id'];
            }
        }

        return $data;
    }
    public function getAllProducts()
    {
        $data = [];
        $query = "SELECT * FROM products";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getUserDetails($id)
    {
        $data = [];
        $query = "SELECT * FROM `users` WHERE `id` = '$id'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data = $row;
            }
        }

        return $data;
    }

    public function get_product_details($id)
    {
        $data = [];
        $query = "SELECT * FROM `products` WHERE `id` = '$id'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data = $row;
            }
        }

        return $data;
    }


    public function add_new_product($product)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [0 => [
                'product_id' => $product['id'],
                'foto' => $product['foto'],
                'title'       => $product['title'],
                'prijs'      => $product['prijs'],

                'quantity'   => 1,
            ]];
        } else {
            $cart = $_SESSION['cart'];
            $found = FALSE;
            foreach ($cart as $item) {
                if ($item['product_id'] === $product['id']) {
                    $found = TRUE;
                }
            }

            if ($found === FALSE) {

                $count = count($cart);

                $cart[$count] = [
                    'product_id' => $product['id'],
                    'foto' => $product['foto'],
                    'title'       => $product['title'],
                    'prijs'      => $product['prijs'],

                    'quantity'   => 1,
                ];

                $_SESSION['cart'] = $cart;
            }
        }
    }


    public function remove_product($index)
    {
        if ($index >= 0) {
            $cart = $_SESSION['cart'];
            unset($cart[$index]);
            $_SESSION['cart'] = $cart;
        }
    }



    public function _get_sum()
    {
        $prijs = 0;
        if (count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $product) {
                $prijs += (float)$product["prijs"]*$product["quantity"];
            }
        }

        return round($prijs, 2);
    }



    public function paypal_check_payment($payment_id, $payer_id, $token, $user_id)
    {

        // request http using curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, PayPal_BASE_URL . 'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_USERPWD, PayPal_CLIENT_ID . ":" . PayPal_SECRET);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $result = curl_exec($ch);
        $accessToken = NULL;


        if (empty($result)) {
            return FALSE;
        } else {

            // get Order details along with the status and update order
            $json = json_decode($result);
            $accessToken = $json->access_token;
            $curl = curl_init(PayPal_BASE_URL . 'payments/payment/' . $payment_id);
            curl_setopt($curl, CURLOPT_POST, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_HEADER, FALSE);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $accessToken,
                'Accept: application/json',
                'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
            $result = json_decode($response);
            $state = $result->state;
            $total = $result->transactions[0]->amount->total;
            curl_close($ch);
            curl_close($curl);

            if ($state == 'approved') {
                $this->add_new_order($user_id, $payment_id, $payer_id, $total);

                return TRUE;

            } else {

                return FALSE;
            }

        }

    }

    public function add_new_order($user_id, $payment_id, $payer_id, $total)
    {
        $query = "INSERT INTO orders(user_id, payment_id, payer_id, payment_total, created_at) VALUES ('$user_id', '$payment_id', '$payer_id', '$total', CURRENT_TIMESTAMP )";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        $order_id = mysqli_insert_id($this->db);
        $this->_add_order_items($order_id);
    }

    public function _add_order_items($order_id)
    {
        $cart = $_SESSION['cart'];

        if (count($cart) > 0) {
            foreach ($cart as $product) {
                $query = "INSERT INTO order_items(product_id, order_id) VALUES ('{$product['product_id']}', '$order_id')";
                if (!$result = mysqli_query($this->db, $query)) {
                    exit(mysqli_error($this->db));
                }
            }
        }

        $_SESSION['cart'] = [];
    }

    public function getOrders($user_id)
    {
        $data = [];

        $query = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getOrderItems($order_id)
    {
        $data = [];
        $query = "SELECT P.id, P.title, P.prijs FROM order_items OI
  LEFT JOIN products P
  ON P.id = OI.product_id
    WHERE OI.order_id = '$order_id'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }



    public function count_all()
    {
        $products = [];
        $query = "SELECT COUNT(*) FROM products";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
        }

        return $products;
    }
}

?>


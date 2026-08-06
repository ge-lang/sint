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
        $query = "SELECT * FROM products WHERE availability = 1 ORDER BY id DESC";
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

    private function get_paypal_access_token()
    {
        if (PayPal_CLIENT_ID === '' || PayPal_SECRET === '') {
            return false;
        }

        $ch = curl_init(PayPal_BASE_URL . 'oauth2/token');
        curl_setopt_array($ch, array(
            CURLOPT_HEADER => false,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_USERPWD => PayPal_CLIENT_ID . ':' . PayPal_SECRET,
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
            CURLOPT_HTTPHEADER => array('Accept: application/json', 'Accept-Language: en_US')
        ));
        $body = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($body === false || $status < 200 || $status >= 300) {
            return false;
        }

        $response = json_decode($body, true);
        return $response['access_token'] ?? false;
    }

    private function paypal_api_request($method, $path, $token, $payload = null)
    {
        $ch = curl_init(PayPal_API_BASE_URL . ltrim($path, '/'));
        $headers = array(
            'Accept: application/json',
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        );
        $options = array(
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_HTTPHEADER => $headers
        );
        if ($payload !== null) {
            $options[CURLOPT_POSTFIELDS] = json_encode($payload);
        }
        curl_setopt_array($ch, $options);
        $body = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return array(
            'status' => $status,
            'body' => $body === false ? array() : (json_decode($body, true) ?: array())
        );
    }

    public function create_paypal_order()
    {
        if (empty($_SESSION['cart'])) {
            return false;
        }
        $token = $this->get_paypal_access_token();
        if (!$token) {
            return false;
        }

        $payload = array(
            'intent' => 'CAPTURE',
            'purchase_units' => array(array(
                'amount' => array(
                    'currency_code' => CURRENCY,
                    'value' => number_format($this->_get_sum(), 2, '.', '')
                )
            ))
        );
        $response = $this->paypal_api_request('POST', 'v2/checkout/orders', $token, $payload);
        if ($response['status'] < 200 || $response['status'] >= 300) {
            return false;
        }
        return $response['body']['id'] ?? false;
    }

    public function capture_paypal_order($order_id, $user_id)
    {
        $order_id = trim((string) $order_id);
        $user_id = (int) $user_id;
        if ($order_id === '' || $user_id <= 0 || empty($_SESSION['cart'])) {
            return false;
        }
        $token = $this->get_paypal_access_token();
        if (!$token) {
            return false;
        }
        $response = $this->paypal_api_request('POST', 'v2/checkout/orders/' . rawurlencode($order_id) . '/capture', $token);
        $payment = $response['body'];
        $unit = $payment['purchase_units'][0] ?? array();
        $amount = $unit['payments']['captures'][0]['amount'] ?? array();
        $total = (float) ($amount['value'] ?? -1);
        $capture_status = $payment['purchase_units'][0]['payments']['captures'][0]['status'] ?? '';
        $expected_total = $this->_get_sum();

        if ($response['status'] < 200 || $response['status'] >= 300 ||
            ($payment['status'] ?? '') !== 'COMPLETED' || $capture_status !== 'COMPLETED' ||
            ($amount['currency_code'] ?? '') !== CURRENCY || abs($total - $expected_total) > 0.01) {
            return false;
        }

        $order_id_escaped = mysqli_real_escape_string($this->db, $order_id);
        $existing = mysqli_query($this->db, "SELECT user_id FROM orders WHERE payment_id = '{$order_id_escaped}' LIMIT 1");
        if ($existing && mysqli_num_rows($existing) > 0) {
            $row = mysqli_fetch_assoc($existing);
            return (int) $row['user_id'] === $user_id;
        }

        $payer_id = $payment['payer']['payer_id'] ?? '';
        $this->add_new_order($user_id, $order_id, $payer_id, $total);
        return true;
    }



    public function paypal_check_payment($payment_id, $payer_id, $token, $user_id)
    {
        $payment_id = trim((string) $payment_id);
        $payer_id = trim((string) $payer_id);
        $user_id = (int) $user_id;
        if ($payment_id === '' || $payer_id === '' || $user_id <= 0 || PayPal_CLIENT_ID === '' || PayPal_SECRET === '') {
            return FALSE;
        }

        // request http using curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, PayPal_BASE_URL . 'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_USERPWD, PayPal_CLIENT_ID . ":" . PayPal_SECRET);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $result = curl_exec($ch);
        $http_code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($result === false || $http_code < 200 || $http_code >= 300) {
            curl_close($ch);
            return FALSE;
        }

        $json = json_decode($result, true);
        $accessToken = $json['access_token'] ?? '';
        if ($accessToken === '') {
            curl_close($ch);
            return FALSE;
        }

        // Never trust payment status or amount supplied by the browser.
        $curl = curl_init(PayPal_BASE_URL . 'payments/payment/' . rawurlencode($payment_id));
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $accessToken,
            'Accept: application/json'
        ));
        $response = curl_exec($curl);
        $payment_http_code = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($ch);
        curl_close($curl);

        if ($response === false || $payment_http_code < 200 || $payment_http_code >= 300) {
            return FALSE;
        }

        $payment = json_decode($response, true);
        $state = $payment['state'] ?? '';
        $transaction = $payment['transactions'][0] ?? array();
        $total = (float) ($transaction['amount']['total'] ?? -1);
        $currency = $transaction['amount']['currency'] ?? '';
        $returned_payer_id = $payment['payer']['payer_info']['payer_id'] ?? '';
        $expected_total = $this->_get_sum();

        if ($state !== 'approved' || $returned_payer_id !== $payer_id || $currency !== CURRENCY || abs($total - $expected_total) > 0.01) {
            return FALSE;
        }

        // A repeated callback must not create a second order.
        $payment_id_escaped = mysqli_real_escape_string($this->db, $payment_id);
        $existing = mysqli_query($this->db, "SELECT id, user_id FROM orders WHERE payment_id = '{$payment_id_escaped}' LIMIT 1");
        if ($existing && mysqli_num_rows($existing) > 0) {
            $existing_order = mysqli_fetch_assoc($existing);
            return (int) $existing_order['user_id'] === $user_id;
        }

        $this->add_new_order($user_id, $payment_id, $payer_id, $total);
        return TRUE;

    }

    public function add_new_order($user_id, $payment_id, $payer_id, $total)
    {
        $user_id = (int) $user_id;
        $payment_id = mysqli_real_escape_string($this->db, (string) $payment_id);
        $payer_id = mysqli_real_escape_string($this->db, (string) $payer_id);
        $total = number_format((float) $total, 2, '.', '');
        $query = "INSERT INTO orders(user_id, payment_id, payer_id, payment_total, created_at) VALUES ($user_id, '$payment_id', '$payer_id', '$total', CURRENT_TIMESTAMP )";
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

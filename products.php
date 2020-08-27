<?php
require __DIR__ . '/lib/PayPal.php';

if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$app = new PayPalDemo();
// fetch all products
$products = $app->getAllProducts();
$user = $app->getUserDetails($_SESSION['user_id']);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP MySQL PayPal JavaScript Express Checkout Demo</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require 'navigation.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>PHP MySQL PayPal JavaScript Express Checkout Demo</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>
                Products
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <?php foreach ($products as $product) { ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <?php echo $product['title'] ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?php echo $product['description'] ?>
                        </p>

                        <h4>Price: <?php echo $product['prijs']  ?></h4>


                        <div class="form-group">
                            <form action="shopping-cart.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                                <input name="btnAddProduct" type="submit" class="btn btn-success" value="Add to Shopping Cart">
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="col-md-4 well">
            <h3>Active User</h3>
            <p>
                <b><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></b>
            </p>
            <p>
                <b><?php echo $user['email']; ?></b>
            </p>
        </div>
    </div>
</div>

</body>
</html>

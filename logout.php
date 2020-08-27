<?php

if (isset($_GET['action']) && $_GET['action'] == TRUE) {
    session_start();
    $_SESSION['user_id'] = '';
    $_SESSION['cart'] = [];
    session_destroy();
    header("Location: index.php");
}

?>
<?php
require_once("includes/header.php");


$the_message = '';
//*controle of er reeds is ingelogd**/
/*if($session->is_signed_in()){
    redirect("index.php");
}*/
/**isset functie kijkt of er IETS aanwezig is dus geen NULL**/
if(isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    /**methode check of de user bestaat*/
    $user_found = User::verify_user($username, $password);

    if ($user_found) {
        $session->login($user_found);
        if ($_SESSION['role'] == '1') {
            redirect("admin/index.php");

            } else {
                redirect("index.php");
            }
//       redirect("index.php");
        } else {
            $the_message = "PASSWORD OR USERNAME NOT CORRECT, CHEATING HUH!";
            echo $the_message;
        }

    } else {
        $username = "";
        $password = "";


}

?>

<body class="bg-dark">

<div class="container mt-5 pt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block "><img src="img/logo_gts.png" alt=""></div>
                        <div class="col-lg-6">

                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mt-5 mb-5" style="color: #f55a22">Welcome to the GTS!</h1>
                                </div>
                                <h5 style="color: red"><?php echo $the_message; ?></h5>
                                <form class="user mb-5" action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user rounded-0" name="username" placeholder="Uw usernaam" value="<?php echo htmlentities($username); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user rounded-0" name="password" placeholder="Uw password" value="<?php echo htmlentities($password); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Login" class="btn text-white btn-user btn-block rounded-0" style="background-color: #f55a22">
                                    </div>
                                </form>
                                <div class="text-center" style="color: #f55a22">
                                    <div class="small"><a href="register.php">Don't have an account? Go to registration</a></div>
                                </div>
                            </div>

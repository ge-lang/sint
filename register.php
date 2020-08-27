<?php
require_once("includes/header.php");



$user = new User();

if(isset($_POST['submit'])) {
    if ($user) {
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->role = $_POST['role'];
        //    $user->set_file($_FILES['user_image']);
        //     $user->save_user_and_image();
        //    redirect('users.php');

        if (empty($_FILES['user_image'])) {
            $user->save();
        } else {
            $user->set_file($_FILES['user_image']);
            $user->save_user_and_image();
            $user->save();
            redirect('login.php');
        }
    }
}

?>

<body class="bg-dark">

<div class="container mt-5 pt-5 ">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block"><img  src="img/logo_gts.png" alt=""></div>
                       <div class="col-lg-6 d-none d-lg-block ml-15 mt-70 position-absolute text-center"><span  id="output"></span></div>
                    <div class="col-lg-6">
                            <div class="">
                                <div class="text-center pt-3 pb-0">
                                    <h4  style="color: #f55a22">Create Account</h4>
                                </div>

    <form action="register.php" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center">
                    <div class="card-body">
                        <form>
                            <div class="form-group">

                                <input type="text" name="username" class="form-control type="text" placeholder="Uw usernaam" ">
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input class="form-control "  type="text" name="first_name" placeholder="Uw voornaam" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input class="form-control" name="last_name" type="text" placeholder="Uw achternaam" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" aria-describedby="emailHelp" placeholder="Uw email" />
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control " name="password" type="password" placeholder="Uw password" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control " name="password" type="password" placeholder="Confirm password" />
                                    </div>
                                </div>
                            </div>


                            <!--value="3" role 'klant' id=3 -->
                            <input type="hidden" name="role" value="3" class="form-control">




                                    <div class="form-group" >
                                       <input type="file" name="user_image" id="file" class="form-control">
                                    </div>

                            <div class="form-group  mb-0">
                                <input class="btn text-white btn-user btn-block rounded-0" style="background-color: #f55a22" type="submit" value="Create Account" name="submit"
                                       class="form-control">
                            </div>

                        </form>
                    </div>
                    <div class="" style="color: #f55a22">
                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                    </div>
                            </div>



                        <script>
                            function handleFileSelect(evt) {
                                var file = evt.target.files; // FileList object
                                var f = file[0];
                                // Only process image files.
                                if (!f.type.match('image.*')) {
                                    alert("Image only please....");
                                }
                                var reader = new FileReader();
                                // Closure to capture the file information.
                                reader.onload = (function(theFile) {
                                    return function(e) {
                                        // Render thumbnail.
                                        var span = document.createElement('span');
                                        span.innerHTML = ['<img class="thumb shadow" style="height: 280px; width: 280px; border: white 5px solid;  border-radius: 50%" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
                                        document.getElementById('output').insertBefore(span, null);
                                    };
                                })(f);
                                // Read in the image file as a data URL.
                                reader.readAsDataURL(f);
                            }
                            document.getElementById('file').addEventListener('change', handleFileSelect, false);
                        </script>
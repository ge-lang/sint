<?php
require_once("includes/header.php");



$user = new User();
$the_message = '';

if(isset($_POST['submit'])) {
    $password = (string) ($_POST['password'] ?? '');
    $password_confirmation = (string) ($_POST['password_confirmation'] ?? '');

    if ($password === '' || $password !== $password_confirmation) {
        $the_message = 'Passwords do not match.';
    } else {
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->email = $_POST['email'];
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->role = 0;

        if (empty($_FILES['user_image']['name'])) {
            $user->save();
        } else {
            $user->set_file($_FILES['user_image']);
            if (!$user->save_user_and_image()) {
                $the_message = join('<br>', $user->errors);
            }
        }

        if ($the_message === '') {
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
                        <div class="col-lg-6 d-none d-lg-block"><img src="img/logo_evva_hot.svg" alt="EVVA"></div>
                       <div class="col-lg-6 d-none d-lg-block ml-15 mt-70 position-absolute text-center"><span  id="output"></span></div>
                    <div class="col-lg-6">
                            <div class="">
                                <div class="text-center pt-3 pb-0">
                                <h4  style="color: #8d1fea">Create Account</h4>
                                <?php if ($the_message !== ''): ?><p class="text-danger"><?php echo htmlspecialchars($the_message, ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
                                </div>

    <form action="register.php" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center">
                    <div class="card-body">
                        <form>
                            <div class="form-group">

                                <input type="text" name="username" class="form-control" placeholder="Uw gebruikersnaam">
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                <input class="form-control" type="text" name="first_name" placeholder="Uw voornaam" />
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
                                <input class="form-control" name="password" type="password" placeholder="Uw wachtwoord" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                <input class="form-control" name="password_confirmation" type="password" placeholder="Bevestig uw wachtwoord" />
                                    </div>
                                </div>
                            </div>


                                    <div class="form-group" >
                                       <input type="file" name="user_image" id="file" class="form-control"
                                              accept="image/jpeg,image/png,image/gif,image/webp">
                                       <small class="form-text text-muted">Maximaal 5 MB. JPG, PNG, GIF of WEBP.</small>
                                    </div>

                            <div class="form-group  mb-0">
                                <input class="btn text-white btn-user btn-block rounded-0" style="background-color: #8d1fea" type="submit" value="Create Account" name="submit"
                                       class="form-control">
                            </div>

                        </form>
                    </div>
                    <div class="" style="color: #8d1fea">
                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                    </div>
                            </div>



                        <script>
                            function handleFileSelect(evt) {
                                var file = evt.target.files; // FileList object
                                var f = file[0];
                                if (!f) {
                                    return;
                                }
                                if (f.size > 5 * 1024 * 1024) {
                                    alert("De afbeelding mag maximaal 5 MB groot zijn.");
                                    evt.target.value = "";
                                    return;
                                }
                                // Only process image files.
                                if (!f.type.match('image.*')) {
                                    alert("Image only please....");
                                    evt.target.value = "";
                                    return;
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

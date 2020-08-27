<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");

}

$user = new User();

if(isset($_POST['submit'])){
    if($user){
        $user->username= $_POST['username'];
        $user->email= $_POST['email'];
        $user->first_name= $_POST['first_name'];
        $user->last_name= $_POST['last_name'];
        $user->role= $_POST['role'];
        $user->password= $_POST['password'];
        //    $user->set_file($_FILES['user_image']);
        //     $user->save_user_and_image();
        //    redirect('users.php');

        if (empty($_FILES['user_image'])) {
            $user->save();
        } else {
            $user->set_file($_FILES['user_image']);
            $user->save_user_and_image();
            $user->save();
            redirect('users.php');
        }
    }
}

?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <td><a href="add_product.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-user-astronaut"></i><span>New User</span></a></td>
            <td"><a href="users.php" class="btn btn-outline-danger rounded-0  mb-3"><i class="fas fa-fw fa-users"></i><span>All Users</span></a></td>

            <form action="add_user.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="file" name="user_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control">
                        </div>
                        <div class="form-group">

                            <input class="btn btn-danger rounded-0" type="submit" value="+ Add user" name="submit"
                                   class="form-control">
                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>


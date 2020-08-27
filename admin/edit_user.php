<?php
include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect("login.php");

}
if(empty($_GET['id'])){
    redirect('users.php');
}
$user = User::find_by_id($_GET['id']);

if (isset($_POST['update'])) {
    if ($user) {
        var_dump($user);
        $user->username = $_POST['username'];
        $user->email= $_POST['email'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->role= $_POST['role'];
        $user->password = $_POST['password'];

        if (empty($_FILES['user_image'])) {
            $user->save();
        } else {
            $user->set_file($_FILES['user_image']);
            $user->save_user_and_image();
            $user->save();
            redirect("edit_user.php?id={$user->id}");
        }
    }
}
?>
<?php include("includes/sidebar.php")?>
<?php include("includes/content-top.php")?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <td><a href="add_user.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-user-plus"></i> Add User</a></td>
            <td><a href="add_user.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-users"></i> All Users</a></td>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="user_image">
                            <label class="custom-file-label" for="customFile">Bestand kiezen</label>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control"
                                   value="<?php echo $user->username; ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control"
                                   value="<?php echo $user->email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control"
                                   value="<?php echo $user->password; ?>">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" class="form-control"
                                   value="<?php echo $user->first_name; ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" name="last_name" class="form-control"
                                   value="<?php echo $user->last_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control">
                        </div>
                        <div class="form-group">

                        </div>

                        <div class="form-group">

                            <input class="btn btn-danger rounded-0" type="submit" value="Update user" name="update"
                                   class="form-control">
                        </div>

                    </div>
                    <div class="col-4">
                        <img class="img-fluid"
                             src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>






<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}

$role = new Role();

if(isset($_POST['submit'])){
    if($role){
        $role->role= $_POST['role'];
        $role->save();
        redirect('roles.php');

    }
}

?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <td><a href="add_role.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Role</span></a></td>
                <td><a href="roles.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-rocket"></i><span>All Roles</span></a></td>

                <form action="add_role.php" method="post">
                    <div class="row">
                        <div class="col-12">

                            <div class="form-group">
                                <label for="role">Rol</label>
                                <input type="text" name="role" class="form-control">
                            </div>

                            <div class="form-group">

                                <input class="btn btn-danger rounded-0" type="submit" value="Create Role" name="submit"
                                       class="form-control">
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>
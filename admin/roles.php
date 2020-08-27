<?php include("includes/header.php");
//if ($session->is_signed_in()){
//redirect('login.php');
//}
$roles = Role::find_all();
?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <td><a href="add_role.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Role</span></a></td>
            <td><a href="roles.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-rocket"></i><span>All Roles</span></a></td>


            <table class="table table-header">
                <thead>
                <tr>

                    <th>Id</th>
                    <th>Role</th>
                    <th>Wijzig?</th>
                    <th>Delete?</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?php echo $role->id; ?></td>
                        <td><?php echo $role->role; ?></td>
                        <td><a href="edit_role.php?id=<?php echo $role->id; ?>"
                               class="btn btn-outline-danger rounded-0"><i class="fas fa-edit"></i> </a> </td>
                        <td><a href="delete_role.php?id=<?php echo $role->id; ?>"
                               class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i> </a> </td>

                    </tr>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>

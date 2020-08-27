<?php include("includes/header.php");
//if ($session->is_signed_in()){
//redirect('login.php');
//}
$diensten = Dienst::find_all();
?>
<?php include("includes/sidebar.php")?>
<?php include("includes/content-top.php"); ?>



<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <td><a href="add_dienst.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Dienst</span></a></td>
            <td><a href="diensten.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-palette"></i><span>All Diensten</span></a></td>

            <table class="table table-header">
                <thead>
                <tr>

                    <th>Dienst</th>
                    <th>Title</th>
                    <th>Foto</th>
                    <th>Wijzig?</th>
                    <th>Delete?</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($diensten as $dienst): ?>
                    <tr>


                        <td><?php echo $dienst->id; ?></td>
                        <td><?php echo $dienst->title; ?></td>
                        <td><img src="<?php echo $dienst->picture_path(); ?>" height="62" width="62" alt=""></td>
                        <td><a href="edit_dienst.php?id=<?php echo $dienst->id; ?>"
                               class="btn btn-outline-danger rounded-0"><i class="fas fa-edit"></i> </a> </td>
                        <td><a href="delete_dienst.php?id=<?php echo $dienst->id; ?>"
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

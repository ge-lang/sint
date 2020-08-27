<?php include("includes/header.php");
//if ($session->is_signed_in()){
//redirect('login.php');
//}
$categories = Categorie::find_all();
?>
<?php include("includes/sidebar.php")?>
<?php include("includes/content-top.php"); ?>



<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <td><a href="add_categorie.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Categorie</span></a></td>
            <td><a href="categories.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-palette"></i><span>All Categories</span></a></td>

            <table class="table table-header">
                <thead>
                <tr>

                    <th>Category</th>
                    <th>Title</th>
                    <th>Foto</th>
                    <th>Wijzig?</th>
                    <th>Delete?</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $categorie): ?>
                    <tr>


                        <td><?php echo $categorie->id; ?></td>
                        <td><?php echo $categorie->title; ?></td>
                        <td><img src="<?php echo $categorie->picture_path(); ?>" height="62" width="62" alt=""></td>
                        <td><a href="edit_categorie.php?id=<?php echo $categorie->id; ?>"
                               class="btn btn-outline-danger rounded-0"><i class="fas fa-edit"></i> </a> </td>
                        <td><a href="delete_categorie.php?id=<?php echo $categorie->id; ?>"
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

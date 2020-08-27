<?php include("includes/header.php");
//if ($session->is_signed_in()){
//redirect('login.php');
//}
$brands = Brand::find_all();
?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <td><a href="add_brand.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Brand</span></a></td>
            <td><a href="brands.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-leaf"></i><span>All Brands</span></a></td>


            <table class="table table-header">
                <thead>
                <tr>

                    <th>Id</th>
                    <th>Title</th>
                    <th>Wijzig?</th>
                    <th>Delete?</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($brands as $brand): ?>
                    <tr>


                        <td><?php echo $brand->id; ?></td>
                        <td><?php echo $brand->title; ?></td>
                        <td><a href="edit_brand.php?id=<?php echo $brand->id; ?>"
                               class="btn btn-outline-danger rounded-0"><i class="fas fa-edit"></i> </a> </td>
                        <td><a href="delete_brand.php?id=<?php echo $brand->id; ?>"
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

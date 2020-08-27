<?php include("includes/header.php");
//if ($session->is_signed_in()){
//redirect('login.php');
//}
$products = Product::find_all();
?>
<?php include("includes/sidebar.php")?>
<?php include("includes/content-top.php"); ?>



<div class="container-fluid">
    <div class="row ">
        <div class="col-12">

            <td><a href="add_product.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Product</span></a></td>
            <td><a href="products.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-magic"></i><span>All Products</span></a></td>

            <table class="table table-header">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Id</th>
                    <th>Code</th>
                    <th>Category</th>
                    <th>Title</th>
<!--                    <th>Availability</th>-->
                    <th>Brand</th>
                  <!--  <th>New</th>
                    <th>Recommended</th>-->
                    <th>Description</th>
                    <th>Prijs</th>
                    <th>Wijzig?</th>
                    <th>Delete?</th>
                    <th>View?</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><img src="<?php echo $product->picture_path(); ?>" height="62" width="62" alt=""></td>
                        <td><?php echo $product->id; ?></td>
                        <td><?php echo $product->code; ?></td>
                        <td><?php echo $product->categorie_id; ?></td>
                        <td><?php echo $product->title; ?></td>
<!--                        <td>--><?php //echo $product->availability; ?><!--</td>-->
                        <td><?php echo $product->brand_id; ?></td>
                       <!-- <td><?php /*echo $product->is_new; */?></td>
                        <td><?php /*echo $product->is_recommended; */?></td>-->
                        <td><?php echo $product->description; ?></td>
                        <td><?php echo $product->prijs; ?></td>



                        <td><a href="edit_product.php?id=<?php echo $product->id; ?>"
                               class="btn btn-outline-danger rounded-0"><i class="fas fa-edit"></i> </a> </td>
                        <td><a href="delete_product.php?id=<?php echo $product->id; ?>"
                               class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i> </a> </td>
                        <td><a class="btn btn-outline-danger rounded-0"
                               href="../product-details.php?id=<?php echo $product->id; ?>" target="_blank"><i class="fas fa-eye"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>

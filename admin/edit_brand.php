<?php
include("includes/header.php");
if (!$session->is_signed_in()){
redirect('login.php');
}
if(empty($_GET['id'])){
    redirect('shop_brands.php');
}
$brand = Brand::find_by_id($_GET['id']);

if (isset($_POST['update'])) {
    if ($brand) {
        var_dump($brand);

        $brand->id = $_POST['id'];
        $brand->title = $_POST['title'];

        $brand->update();
        $brand->save();

        redirect("edit_brand.php?id={$brand->id}");
    }

}
?>


<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <td><a href="add_brand.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Brand</span></a></td>
            <td><a href="brands.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-leaf"></i><span>All Brands</span></a></td>

            <form action="edit_brand.php?id=<?php echo $brand->id; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="id">Brand_id</label>
                            <input type="text" name="id" class="form-control"
                                   value="<?php echo $brand->id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control"
                                   value="<?php echo $brand->title; ?>" >
                        </div>
                        <div class="form-group">
                            <input class="btn btn-danger rounded-0" type="submit" value="Update brand" name="update"
                                   class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ("includes/footer.php"); ?>






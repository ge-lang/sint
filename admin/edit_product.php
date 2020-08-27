<?php
include("includes/header.php");

if (!$session->is_signed_in()){
redirect('login.php');
}
if(empty($_GET['id'])){
    redirect('products.php');
}
$product = Product::find_by_id($_GET['id']);

if (isset($_POST['update'])) {
    if ($product) {
        $product->code = $_POST['code'];
        $product->categorie_id = $_POST['categorie_id'];
        $product->brand_id = $_POST['brand_id'];
        $product->title = $_POST['title'];
        $product->description = $_POST['description'];
        $product->prijs = $_POST['prijs'];
        $product->update();
        if(empty($_FILES['foto'])) {
        $product->save();
    }else {
        $product->set_file($_FILES['foto']);

        $product->save();
        redirect("edit_product.php?id={$product->id}");
    }
    }
}
?>


<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row ">
        <div class="col-10">
            <td><a href="add_product.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Product</span></a></td>
            <td><a href="products.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-magic"></i><span>All Products</span></a></td>

            <form action="edit_product.php?id=<?php echo $product->id; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="foto">
                            <label class="custom-file-label" for="customFile">Bestand kiezen</label>
                        </div>
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" name="code" class="form-control"
                                   value="<?php echo $product->code; ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="categorie_id">Categorie_id</label>
                            <input type="text" name="categorie_id" class="form-control"
                                   value="<?php echo $product->categorie_id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Brand_id</label>
                            <input type="text" name="brand_id" class="form-control"
                                   value="<?php echo $product->brand_id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control"
                                   value="<?php echo $product->title; ?>"
                            >
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10">
								<?php echo $product->description; ?>
							</textarea>
                        </div>
                        <div class="form-group">
                            <label for="prijs">Prijs</label>
                            <input type="text" name="prijs" class="form-control"
                                   value="<?php echo $product->prijs; ?>">
                        </div>

                        <div class="form-group">

                            <input class="btn btn-danger rounded-0" type="submit" value="Update product" name="update"
                                   class="form-control">
                        </div>

                    </div>
                    <div class="col-4 border-danger border-left">
                        <img class="img-fluid"
                             src="<?php echo $product->picture_path(); ?>" height="62" width="62" alt="">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php include ("includes/footer.php"); ?>






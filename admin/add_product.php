<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");

if(!$session->is_signed_in()){
    redirect('login.php');
}

$message = "";
if(isset($_POST['submit'])) {
    $product = new Product();
    $product->code = $_POST['code'];
    $product->categorie_id = $_POST['categorie_id'];
    $product->title = $_POST['title'];
    $product->availability = $_POST['availability'];
    $product->brand_id = $_POST['brand_id'];
    $product->is_new = $_POST['is_new'];
    $product->is_recommended = $_POST['is_recommended'];
    $product->description = $_POST['description'];
    $product->prijs = $_POST['prijs'];
    $product->set_file($_FILES['file']);
    if($product->save()) {
        echo $message = "Product uploaded sucessfully";
    } else {
        echo $message = join("<br>", $product->errors);
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-6">

            <td><a href="add_product.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Product</span></a></td>
            <td><a href="products.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-magic"></i><span>All Products</span></a></td>

            <form action="add_product.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="code">code</label>
                    <input type="text" name="code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="categorie_id">categorie_id</label>
                    <input type="text" name="categorie_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="availability">availability</label>
                    <input type="text" name="availability" class="form-control">
                </div>
                <div class="form-group">
                    <label for="brand_id">brand</label>
                    <input type="text" name="brand_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="is_new">is_new</label>
                    <input type="text" name="is_new" class="form-control">
                </div>
                <div class="form-group">
                    <label for="is_recommended">is_recommended</label>
                    <input type="text" name="is_recommended" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="prijs">prijs</label>
                    <input type="text" name="prijs" class="form-control">
                </div>
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                </div>
                <input type="submit" name="submit" value="+ Add product" class="btn btn-danger rounded-0">
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php");  ?>
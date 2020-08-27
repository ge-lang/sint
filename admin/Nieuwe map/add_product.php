<?php
include("includes/header.php");
if (!$session->is_signed_in()){
    redirect('login.php');
}

$product = new Product();

if(isset($_POST['submit'])) {
    if ($product) {
        $product->title = $_POST['title'];
        $product->categorie_id = $_POST['categorie_id'];
        $product->description = $_POST['description'];
        $product->prijs = $_POST['prijs'];
        $product->set_file($_FILES['file']);
        $product->save();
        /*if (empty($_FILES['foto'])) {
            $product->save();
        }
    } else {
        $product->set_file($_FILES['foto']);
        $product->save_product_and_image();
        $product->save();
    }*/
        redirect("products.php?id={$product->id}");

    }
}
?>

<?php include("includes/sidebar.php"); ?>


<div class="container-fluid">
    <div class="row mt-5 pt-4">
        <div class="col-6 offset-4">
            <h2>Add product</h2>
            <form action="add_product.php" method="post">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="categorie_id">Categorie</label>
                        <input type="text" name="categorie_id" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="prijs">Prijs</label>
                        <input type="text" name="prijs" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="foto">Photo</label>
                        <input type="file" name="foto" class="form-control" value="">
                    </div>

                    <input type="submit" name="submit" value="Add Product" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
</div>

<?php include ("includes/footer.php"); ?>
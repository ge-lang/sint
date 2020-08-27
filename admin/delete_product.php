<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
   redirect("login.php");

}
if(empty($_GET['id'])){
    redirect('products.php');
}

    $product = Product::find_by_id($_GET['id']);
    if($product){
        $product->delete();
    redirect('products.php');
}else{
    redirect('products.php');
}
?>

<?php include("includes/sidebar.php"); ?>

    <h1>Delete product</h1>
<?php include "includes/footer.php"; ?>
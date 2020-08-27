<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
   redirect("login.php");

}
if(empty($_GET['id'])){
    redirect('brands.php');
}

    $brand = Brand::find_by_id($_GET['id']);
    if($brand){
        $brand->delete();
    redirect('brands.php');
}else{
    redirect('brands.php');
}
?>

<?php include("includes/sidebar.php"); ?>

    <h1>Delete product</h1>
<?php include "includes/footer.php"; ?>
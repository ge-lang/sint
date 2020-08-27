<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
   redirect("login.php");

}
if(empty($_GET['id'])){
    redirect('categories.php');
}

    $categorie = Categorie::find_by_id($_GET['id']);
    if($categorie){
        $categorie->delete();
    redirect('categories.php');
}else{
    redirect('categories.php');
}
?>

<?php include("includes/sidebar.php"); ?>

    <h1>Delete product</h1>
<?php include "includes/footer.php"; ?>
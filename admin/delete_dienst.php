<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
   redirect("login.php");

}
if(empty($_GET['id'])){
    redirect('categories.php');
}

    $dienst = Dienst::find_by_id($_GET['id']);
    if($dienst){
        $dienst->delete();
    redirect('diensten.php');
}else{
    redirect('diensten.php');
}
?>

<?php include("includes/sidebar.php"); ?>

    <h1>Delete product</h1>
<?php include "includes/footer.php"; ?>
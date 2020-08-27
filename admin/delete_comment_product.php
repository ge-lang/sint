<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("login.php");

}
if(empty($_GET['id'])){
    redirect('comments.php');
}

$comment = Comment::find_by_id($_GET['id']);
if($comment){
    $comment->delete();
    redirect("comment_product.php?id={$comment->photo_id}");
}else{
    redirect("products.php");
}
?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>
<h1>welkom delete pagina comments</h1>
<?php include("includes/footer.php"); ?>



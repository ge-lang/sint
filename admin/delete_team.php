<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
   redirect("login.php");

}
if(empty($_GET['id'])){
    redirect('teamleaders.php');
}

    $team = Teamlead::find_by_id($_GET['id']);
    if($team){
        $team->delete();
    redirect('teamleaders.php');
}else{
    redirect('teamleaders.php');
}
?>

<?php include("includes/sidebar.php"); ?>

    <h1>Delete product</h1>
<?php include "includes/footer.php"; ?>
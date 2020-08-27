<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("login.php");

}
if(empty($_GET['id'])){
    redirect('roles.php');
}

$role = Role::find_by_id($_GET['id']);
if($role){
    $role->delete();
    redirect('roles.php');
}else{
    redirect('roles.php');
}
?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>
    <h1>welkom delete pagina users</h1>
<?php include("includes/footer.php"); ?>
<?php
include("includes/header.php");
/*if (!$session->is_signed_in()){
    redirect('login.php');
}*/
?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php");

$message = "";
if(isset($_POST['submit'])){
    $categorie = new Categorie();
    $categorie->title= $_POST['title'];
    $categorie->set_categorie_file($_FILES['file']);


    if($categorie->save_categorie()) {
            echo $message = "uploaded sucessfully";
        } else {
            echo $message = join("<br>", $categorie->errors);
        }

       /* $categorie->save();
        redirect("shop_categories.php?id={$categorie->id}");*/

}
?>




<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <td><a href="add_categorie.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Categorie</span></a></td>
            <td><a href="categories.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-palette"></i><span>All Categories</span></a></td>

            <form action="add_categorie.php" method="post"enctype="multipart/form-data">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <input type="file" name="file" class="form-control">
                    </div>

                    <input type="submit" name="submit" value="Add Categorie" class="btn btn-danger rounded-0">
                </div>

            </form>
        </div>
    </div>
</div>


<?php include ("includes/footer.php"); ?>






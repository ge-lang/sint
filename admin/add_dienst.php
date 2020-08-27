<?php
include("includes/header.php");
/*if (!$session->is_signed_in()){
    redirect('login.php');
}*/




$message = "";
if(isset($_POST['submit'])){
    $dienst = new Dienst();
    $dienst->title= $_POST['title'];
    $dienst->set_dienst_file($_FILES['file']);


    if($dienst->save_dienst()) {
            echo $message = "uploaded sucessfully";
        } else {
            echo $message = join("<br>", $dienst->errors);
        }

       /* $categorie->save();
        redirect("shop_categories.php?id={$categorie->id}");*/

}
?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <td><a href="add_dienst.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Dienst</span></a></td>
            <td><a href="diensten.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-phone-volume"></i><span>All Diensten</span></a></td>

            <form action="add_dienst.php" method="post"enctype="multipart/form-data">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <input type="file" name="file" class="form-control">
                    </div>

                    <input type="submit" name="submit" value="Add Dienst" class="btn btn-danger rounded-0">
                </div>

            </form>
        </div>
    </div>
</div>


<?php include ("includes/footer.php"); ?>






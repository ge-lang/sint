<?php
include("includes/header.php");
if (!$session->is_signed_in()){
redirect('login.php');
}
if(empty($_GET['id'])){
    redirect('categories.php');
}
$categorie = Categorie::find_by_id($_GET['id']);

if (isset($_POST['update'])) {
    if ($categorie) {
        $categorie->title = $_POST['title'];
//        $categorie->update();
        if (empty($_FILES['file'])) {
            $categorie->save();
        } else {
            $categorie->set_categorie_file($_FILES['file']);
            $categorie->save_categorie();
            $categorie->save();
            redirect("edit_categorie.php?id={$categorie->id}");
        }
    }
}
?>


<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <td><a href="add_categorie.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Categorie</span></a></td>
            <td><a href="categories.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-palette"></i><span>All Categories</span></a></td>

            <form action="edit_categorie.php?id=<?php echo $categorie->id; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="file">
                            <label class="custom-file-label" for="customFile">Bestand kiezen</label>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control"
                                   value="<?php echo $categorie->title; ?>" >
                        </div>
                        <div class="form-group">
                            <input class="btn btn-danger rounded-0" type="submit" value="Update categorie" name="update"
                                   class="form-control">
                        </div>

                    </div>
                    <div class="col-4 border-danger border-left">
                        <img class="img-fluid"
                             src="<?php echo $categorie->picture_path(); ?>" height="62" width="62" alt="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ("includes/footer.php"); ?>






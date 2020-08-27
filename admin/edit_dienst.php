<?php
include("includes/header.php");
if (!$session->is_signed_in()){
redirect('login.php');
}
if(empty($_GET['id'])){
    redirect('diensten.php');
}
$dienst = Dienst::find_by_id($_GET['id']);

if (isset($_POST['update'])) {
    if ($dienst) {
        $dienst->title = $_POST['title'];

        if (empty($_FILES['file'])) {
            $dienst->save();
        } else {
            $dienst->set_dienst_file($_FILES['file']);
            $dienst->save_dienst();
            $dienst->save();
            redirect("edit_dienst.php?id={$dienst->id}");
        }
    }
}
?>


<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <td><a href="add_dienst.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Dienst</span></a></td>
            <td><a href="diensten.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-phone-volume"></i><span>All diensten</span></a></td>

            <form action="edit_dienst.php?id=<?php echo $dienst->id; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="file">
                            <label class="custom-file-label" for="customFile">Bestand kiezen</label>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control"
                                   value="<?php echo $dienst->title; ?>" >
                        </div>
                        <div class="form-group">
                            <input class="btn btn-danger rounded-0" type="submit" value="Update dienst" name="update"
                                   class="form-control">
                        </div>

                    </div>
                    <div class="col-4 border-danger border-left">
                        <img class="img-fluid"
                             src="<?php echo $dienst->picture_path(); ?>" height="62" width="62" alt="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ("includes/footer.php"); ?>






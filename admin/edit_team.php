<?php
include("includes/header.php");
if (!$session->is_signed_in()){
redirect('login.php');
}
if(empty($_GET['id'])){
    redirect('teamleaders.php');
}
$teamlead = Teamlead::find_by_id($_GET['id']);

if (isset($_POST['update'])) {
    if ($teamlead) {
        $teamlead->title = $_POST['naam'];
        $teamlead->title = $_POST['achternaam'];
        $teamlead->title = $_POST['positie'];


        if (empty($_FILES['file'])) {
            $teamlead->save();
        } else {
            $teamlead->set_team_file($_FILES['file']);
            $teamlead->save_team();
            $teamlead->save();
            redirect("edit_team.php?id={$teamlead->id}");
        }
    }
}
?>


<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <td><a href="add_team.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Teamleader</span></a></td>
            <td><a href="teamleaders.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-people-carry"></i><span>All Teamleaders</span></a></td>

            <form action="edit_team.php?id=<?php echo $teamlead->id; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="file">
                            <label class="custom-file-label" for="customFile">Bestand kiezen</label>
                        </div>

                        <div class="form-group">
                            <label for="naam">Naam</label>
                            <input type="text" name="naam" class="form-control"
                                   value="<?php echo $teamlead->naam; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="achternaam">Achternaam</label>
                            <input type="text" name="achternaam" class="form-control"
                                   value="<?php echo $teamlead->achternaam; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="positie">Positie</label>
                            <input type="text" name="positie" class="form-control"
                                   value="<?php echo $teamlead->positie; ?>" >
                        </div>
                        <div class="form-group">
                            <input class="btn btn-danger rounded-0" type="submit" value="Update teamleader" name="update"
                                   class="form-control">
                        </div>

                    </div>
                    <div class="col-4 border-danger border-left">
                        <img class="img-fluid"
                             src="<?php echo $teamlead->picture_path(); ?>" height="62" width="62" alt="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ("includes/footer.php"); ?>






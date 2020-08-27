<?php
include("includes/header.php");
/*if (!$session->is_signed_in()){
    redirect('login.php');
}*/




$message = "";
if(isset($_POST['submit'])){
    $teamlead = new Teamlead();
    $teamlead->naam= $_POST['naam'];
    $teamlead->achternaam= $_POST['achternaam'];
    $teamlead->positie= $_POST['positie'];
    $teamlead->set_team_file($_FILES['file']);


    if($teamlead->save_team()) {
            echo $message = "uploaded sucessfully";
        } else {
            echo $message = join("<br>", $teamlead->errors);
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
            <td><a href="add_team.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Teamleader</span></a></td>
            <td><a href="teamleaders.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-palette"></i><span>All Teamleaders</span></a></td>

            <form action="add_team.php" method="post"enctype="multipart/form-data">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="naam">Naam</label>
                        <input type="text" name="naam" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="achternaam">Achternaam</label>
                        <input type="text" name="achternaam" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="positie">Positie</label>
                        <input type="text" name="positie" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <input type="file" name="file" class="form-control">
                    </div>

                    <input type="submit" name="submit" value="Add Teamleader" class="btn btn-danger rounded-0">
                </div>

            </form>
        </div>
    </div>
</div>


<?php include ("includes/footer.php"); ?>






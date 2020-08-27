<?php include("includes/header.php");
//if ($session->is_signed_in()){
//redirect('login.php');
//}
$teamleaders = Teamlead::find_all();
?>
<?php include("includes/sidebar.php")?>
<?php include("includes/content-top.php"); ?>



<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <td><a href="add_team.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Teamleader</span></a></td>
            <td><a href="teamleaders.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-palette"></i><span>All Teamleaders</span></a></td>

            <table class="table table-header">
                <thead>
                <tr>
                    <th>Teamleader</th>
                    <th>Naam</th>
                    <th>Achternaam</th>
                    <th>Positie</th>
                    <th>Foto</th>
                    <th>Wijzig?</th>
                    <th>Delete?</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($teamleaders as $teamleader): ?>
                    <tr>

                        <td><?php echo $teamleader->id; ?></td>
                        <td><?php echo $teamleader->naam; ?></td>
                        <td><?php echo $teamleader->achternaam; ?></td>
                        <td><?php echo $teamleader->positie; ?></td>
                        <td><img src="<?php echo $teamleader->picture_path(); ?>" height="62" width="62" alt=""></td>
                        <td><a href="edit_team.php?id=<?php echo $teamleader->id; ?>"
                               class="btn btn-outline-danger rounded-0"><i class="fas fa-edit"></i> </a> </td>
                        <td><a href="delete_team.php?id=<?php echo $teamleader->id; ?>"
                               class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i> </a> </td>

                    </tr>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>

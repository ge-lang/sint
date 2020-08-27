<?php include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}

$comments = Comment::find_all();


?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <td><a href="../shop.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Comment</span></a></td>
            <td><a href="comments.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-comments"></i><span>All Comments</span></a></td>


            <table class="table table-header">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>body</th>
                    <th>Delete?</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?php echo $comment->id; ?></td>
                        <td><?php echo $comment->author; ?></td>
                        <td><?php echo $comment->body; ?></td>
                        <td><a href="delete_comment.php?id=<?php echo $comment->id; ?>"
                               class="btn btn-danger rounded-0"><i class="fas fa-edit"></i> </a> </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>





<?php include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}



$comments = Comment::find_the_comment($_GET['id']);


?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <table>
                <thead>
                <tr>
	                <th>DELETE?</th>
                    <th>id</th>
                    <th>Author</th>
                    <th>Body</th>
                
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($comments as $comment) : ?>

                    <tr>
                        <td>
	                        <a href="delete_comment_product.php?id=<?php echo $comment->id; ?>" class="btn btn-danger
	                        btn-sm
	                        m-2">
		                        DELETE
	                        </a>
	                        <?php echo $comment->id; ?>

                        </td>
                        
                        <td><?php echo $comment->author; ?>

                        </td>
                        <td><?php echo $comment->body; ?></td>
                        
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>





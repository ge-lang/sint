<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");

}
//$photos = Photo::find_all();
if(empty($_GET['id'])){

    redirect("photos.php");
}else {
    $photo = Photo::find_by_id($_GET['id']);

    if (isset($_POST['update'])) {
        if ($photo) {

            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->alternate_text = $_POST['alternate_text'];
            $photo->description = $_POST['description'];
            //$photo->update();
            if (empty($_FILES['filename'])) {
                $photo->save();
            } else {
                $photo->set_file($_FILES['user_image']);
                $photo->save();
                redirect("edit_photo.php?id={$photo->id}");
            }
        }
    }
}
?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h1>welkom edit pagina</h1>
			<form action="edit_photo.php?id=<?php echo $photo->id; ?>" method="post">
				<div class="row">
					<div class="col-12 col-md-8">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" class="form-control"

							value="<?php echo $photo->title; ?>">
						</div>
						<div class="form-group">

							<a class="thumbnail" href=""><img src="<?php echo $photo->picture_path(); ?>" alt=""></a>
						</div>
                        <div class="form-group">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="customFile" name="filename">
                                <label class="custom-file-label" for="customFile">Bestand kiezen</label>
                            </div>
                        </div>
						<div class="form-group">
							<label for="caption">Caption</label>
							<input type="text" name="caption" class="form-control"
							       value="<?php echo $photo->caption; ?>">
						</div>
						<div class="form-group">
							<label for="alternate_text">Alternate Text</label>
							<input type="text" name="alternate_text" class="form-control"
							       value="<?php echo $photo->alternate_text; ?>">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea class="form-control" name="description" id="" cols="30" rows="10">
								<?php echo $photo->description; ?>
							</textarea>
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="photo-info-box">
							<div class="info-box-header">
								<h4>Save <span id="toggle" class="fas fa-arrow-up"></span></h4>
							</div>
							<div class="inside">
								<div class="box-inner">
									<p class="text">
										<span class="fas fa-calendar">Uploaded on: April 01, 2020 @ 5:26</span>
									</p>
									<p class="text">
										<span class="data photo_id_box">Uploaded on: April 01, 2020 @
										                                        5:26</span>
									</p>
									<p class="text">
										Photo Id:<span class="data">34</span>
									</p>
									<p class="text">
										Filename:<span class="data">image.jpg</span>
									</p>
									<p class="text">
										File Type:<span class="data">JPG</span>
									</p>
									<p class="text">
										File Size:<span class="data">245</span>
									</p>

								</div>
								<div class="info-box-footer">
									<div class="info-box-delete float-left">
										<a class="btn btn-danger btn-lg" href="delete_photo.php?id=<?php echo
										$photo->id;
										?>">Delete</a>
									</div>
									<div class="info-box-update float-right">
										<input class="btn btn-primary btn-lg" type="submit" name="update"
										       value="update">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include("includes/footer.php"); ?>


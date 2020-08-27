<?php
include("includes/header.php");
/*if (!$session->is_signed_in()){
    redirect('login.php');
}*/
include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php");
$brand = new Brand();



if(isset($_POST['submit'])){
    if($brand){
        $brand->title= $_POST['title'];
        $brand->brand_id= $_POST['id'];


        $brand->save();

        redirect("brands.php");
    }
}
?>




<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <td><a href="add_brand.php" class="btn btn-danger rounded-0 mb-3"><i class="fas fa-fw fa-plus-square "></i><span>Brand</span></a></td>
            <td><a href="brands.php" class="btn btn-outline-danger rounded-0 mb-3"><i class="fas fa-fw fa-leaf"></i><span>All Brands</span></a></td>

            <form action="add_brand.php" method="post">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="id">Brand id</label>
                        <input type="text" name="id" class="form-control" value="">
                    </div>


                    <input type="submit" name="submit" value="Add Brand" class="btn btn-danger rounded-0">
                </div>

            </form>
        </div>
    </div>
</div>


<?php include ("includes/footer.php"); ?>






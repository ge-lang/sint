<?php
include("admin/includes/header.php");
include("includes/header.php");


include('includes/head_shop.php');


require_once("admin/includes/init.php");
$product = Product::find_by_id($_GET['id']);



if(isset($_POST['submit'])){
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);
    $new_comment = Comment::create_comment($product->id, $author, $body);

    if($new_comment && $new_comment->save()){
        redirect("product_comment.php?id={$product->id}");
    }else{
        $message = "There are some problems saving";
    }

}else{
    $author = "";
    $body = "";
}
$comments = Comment::find_the_comment($product->id);


$app = new PayPal();
$user = $app->getUserDetails($_SESSION['user_id']);
?>

<!-- Product Details Area Start -->
<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-50">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><?= $product->categorie_id; ?></a></li>
                        <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $product->title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <!-- Preview Image -->
                    <img class="img-fluid w-100" src="<?php echo 'admin' .DS.$product->picture_path(); ?>"  alt="">
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price">&euro;<?= $product->prijs; ?></p>
                        <a href="product-details.php?id=<?php echo $product->id; ?>">
                            <h6><?= $product->title; ?></h6>
                        </a>
                        <!-- Ratings & Review -->
                        <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="review">
                                <a href=  "product_comment.php?id=<?php echo $product->id; ?>" >Write A Review</a>
                            </div>
                        </div>
                        <!-- Avaiable -->
                        <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                    </div>

                    <div class="short_overview my-5">
                        <p><?= $product->description; ?></p>
                    </div>




                </div>
            </div>
        </div>
    </div>

    <!-- Post Content Column -->
    <div class="col-lg-8  text-dark" style="background-color: #f55a22">
        <!-- Author -->
        <p class="lead ">by     <span><?php echo $user['username'] ?></span></p>
        <hr>
        <!-- Date/Time -->
        <p class="lead "> Posted on January 1, 2019 at 12:00 PM</p>
        <hr>

        <!-- Post Content -->
        <p class="text-white"><?php echo $product->description; ?></p>
        <hr>
        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" name="author" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="body" rows="3"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn amado-btn">Submit</button>
                </form>
            </div>
        </div>
        <?php foreach($comments as $comment): ?>
            <!-- Single Comment -->
            <div class="media mb-4 ">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body ">
                    <h5 class="mt-0 "><strong><?php echo $comment->author; ?></strong> over <em> <?php echo $product->title; ?></em></h5>
                    <p><?php echo $comment->body; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Product Details Area End -->



</div>
<!-- ##### Main Content Wrapper End ##### -->
<?php include("includes/footer.php"); ?>

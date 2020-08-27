
<?php
include ('includes/header.php');
?>


<?php
include('includes/head_shop.php');
?>




<?php
$categories = Categorie::find_all();
?>



<?php
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 9;
$items_total_count = Categorie::count_all();


$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM categories ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";
$categories = Categorie::find_this_query($sql);
?>



    <!-- Product Catagories Area Start -->
    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">


            <!-- Single Catagory -->

            <?php foreach ($categories as $categorie): ?>
                <div class="single-products-catagory clearfix">
                    <a href="shop_categories.php?id=<?php echo $categorie->id; ?>">
                        <img src="<?php echo 'admin' . DS . $categorie->picture_path(); ?>" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Van &euro;100</p>
                            <h4><?= $categorie->title; ?></h4>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>



        </div>
    </div>
<!-- Product Catagories Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->

        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination justify-content-end mt-50">
                        <?php
                        if ($paginate->page_total() > 1) {
                            if ($paginate->has_previous ()) {
                                echo "<li class='previous mx-2'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                            }
                            for ($i = 1; $i <= $paginate->page_total(); $i++) {
                                if ($i == $paginate->current_page) {
                                    echo "<li class='page-item active mx-2'><a class='page-link badge-primary' href='index.php?page={$i}'> {$i} </a></li>";
                                } else {
                                    echo "<li class='page-item mx-2'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                                }
                            }
                            if ($paginate->has_next()) {
                                echo "<li class='next mx-2'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
                            }
                        }
                        ?>

                    </ul>
                </nav>
            </div>
        </div>













<?php
include ('includes/Newsletter.php');
?>

<?php
include ('includes/footer.php');
?>

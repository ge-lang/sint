

<?php
include ('includes/header.php');
require_once("admin/includes/init.php");
?>

<?php
include('includes/head_shop.php');
?>

<?php
include('includes/shop_sidebar_area.php');
?>

<?php

include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>



<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
    echo '<div class="cart-view-table-front" id="view-cart">';
    echo '<h3>Your Shopping Cart</h3>';
    echo '<form method="post" action="cart_update.php">';
    echo '<table width="100%"  cellpadding="6" cellspacing="0">';
    echo '<tbody>';

    $total =0;
    $b = 0;
    foreach ($_SESSION["cart_products"] as $cart_itm)
    {

        $title = $cart_itm["title"];
        $qty = $cart_itm["qty"];
        $prijs = $cart_itm["prijs"];
        $code = $cart_itm["code"];
        $product_color = $cart_itm["product_color"];
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
        echo '<tr class="'.$bg_color.'">';
        echo '<td>Qty <input type="text" size="2" maxlength="2" name="qty['.$code.']" value="'.$qty.'" /></td>';
        echo '<td>'.$title.'</td>';
        echo '<td><input type="checkbox" name="remove_code[]" value="'.$code.'" /> Remove</td>';
        echo '</tr>';
        $subtotal = ($prijs * $qty);
        $total = ($total + $subtotal);
    }
    echo '<td colspan="4">';
    echo '<button type="submit">Update</button><a href="cart_.php" class="button">Checkout</a>';
    echo '</td>';
    echo '</tbody>';
    echo '</table>';

    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
    echo '</div>';

}
?>
<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT code, title, description, foto, prijs FROM products ORDER BY id ASC");
if($results){
    $products_item = '<ul class="products">';
//fetch results set as object and output HTML
    while($obj = $results->fetch_object())
    {
        $products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3>{$obj->title}</h3>
	<div class="product-thumb"><img src="admin/img/products/{$obj->foto}"></div>
	<div class="product-desc">{$obj->description}</div>
	<div class="product-info">
	Price {$currency}{$obj->prijs} 
	
	<fieldset>
	
	<label>
		<span>Color</span>
		<select name="product_color">
		<option value="Black">Black</option>
		<option value="Silver">Silver</option>
		</select>
	</label>
	
	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="qty" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="code" value="{$obj->code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div></div>
	</form>
	</li>
EOT;
    }
    $products_item .= '</ul>';
    echo $products_item;
}
?>    <br>
<!-- Products List End -->
<div style="text-align: center;"> Copyright &copy; 2017 <a style="text-decoration: none" href="http://www.vetbossel.in" target="_blank"> VetBosSel</a> - All Rights Reserved</div><br>





<div class="amado_product_area section-padding-100">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                    <!-- Total Products -->
                    <div class="total-products">
                        <p>Showing 1-8 0f 25</p>
                        <div class="view d-flex">
                            <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>

                        </div>
                    </div>
                    <!-- Sorting -->
                    <div class="product-sorting d-flex">
                        <div class="sort-by-date d-flex align-items-center mr-15">
                            <p>Sort by</p>
                            <form action="#" method="get">
                                <select name="select" id="sortBydate">
                                    <option value="value">Date</option>
                                    <option value="value">Newest</option>
                                    <option value="value">Popular</option>
                                </select>
                            </form>
                        </div>
                        <div class="view-product d-flex align-items-center">
                            <p>View</p>
                            <form action="#" method="get">
                                <select name="select" id="viewProduct">
                                    <option value="value">12</option>
                                    <option value="value">24</option>
                                    <option value="value">48</option>
                                    <option value="value">96</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php
        $products = Product::find_all();
        ?>
        <!-- --><?php
        /*                $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
                        $items_per_page = 4;
                        $items_total_count = Product::count_all();


                        $paginate = new Paginate($page, $items_per_page, $items_total_count);

                        $sql = "SELECT * FROM products ";
                        $sql .= "LIMIT {$items_per_page} ";
                        $sql .= "OFFSET {$paginate->offset()}";
                        $products = Product::find_this_query($sql);
                        */?>



        <div class="row">
            <?php foreach ($products as $product): ?>
                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img text-center">
                            <img  src="<?php echo 'admin' . DS . $product->picture_path(); ?>" class="w-75"   alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="<?php echo 'admin' . DS . $product->picture_path(); ?>" alt="">
                        </div>

                        <!-- Product Description -->
                        <div class="product-description d-flex align-items-center justify-content-between">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">&euro;<?= $product->prijs; ?></p>
                                <a href="product-details.php?id=<?php echo $product->id; ?>">
                                    <h6><?= $product->title; ?></h6>
                                </a>
                            </div>
                            <!-- Ratings & Cart -->
                            <div class="ratings-cart text-right">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>


                                <!-- Add to Cart Form -->
                                <form action="" class="cart clearfix" method="post">
                                    <input type='hidden' name='code' value="<?= $product->code; ?>" />


                                    <a href="cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"> <button type="submit" name="addtocart" value="5" class="btn amado-btn"> <i class="fa fa-shopping-cart"></i></button></a>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>

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


    </div>
</div>


</div>
<!-- ##### Main Content Wrapper End ##### -->







<?php
include ('includes/Newsletter.php');
?>

<?php
include ('includes/footer.php');

?>


<?php

include("header.php");
$category_id = "";
$catDish="";   // checkbox feature
if(isset($_GET['CatDish'])){
    $catDish = $_GET['CatDish'];

}

if (isset($_GET['cat_id']) && $_GET['cat_id'] > 0) {
    $category_id = get_safe_value($_GET['cat_id']);  // primary key of category id

}
?>
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="shop.php">Shop</a></li>
                <li class="active">Shop Grid Style </li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-page-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">


                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">


                            <?php
                            if ($category_id == "") {
                                // show all dishes
                                $dish_sql = "select * from dish where status=1 order by dish";
                            } else {
                                // show specific dishes according to categoty id
                                $dish_sql = "select * from dish where status=1 and category_id=$category_id order by dish";
                            }

                            $dish_res = mysqli_query($con, $dish_sql);
                            $dish_count = mysqli_num_rows($dish_res);

                            if ($dish_count <= 0) {
                                echo "No dish Available";
                            } else {

                                while ($dish_row = mysqli_fetch_assoc($dish_res)) {
                            ?>

                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <!-- <a href="product-details.html">
                                                    <img src="assets/img/product/product-1.jpg" alt="">
                                                </a> -->
                                                <a target="_blank" href="<?= SITE_IMAGE . $dish_roww['image'] ?>">
                                                    <img class="bigImage" src="<?php echo  SITE_IMAGE . $dish_row['image'] ?>">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4>
                                                    <a href="javascript:void(0)"><?php echo $dish_row['dish'] ?></a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span>$100.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>



                        </div>
                    </div>

                </div>
            </div>

            <?php
            $cat_res = mysqli_query($con, "select * from category where status=1 order by order_number desc");


            ?>
            <div class="col-lg-3">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Shop By Categories</h4>
                        <div class="shop-catigory">



                            <ul id="faq" class="category_list"> <?php

                                                                while ($cat_row = mysqli_fetch_assoc($cat_res)) {
                                                                    $class = "selected";
                                                                    if ($category_id == $cat_row['id']) {
                                                                        $class = "active";
                                                                    }
  echo "<li  >   <input type='checkbox' onclick=set_checkbox('". $cat_row['id']."') class='checkboxclass' name='cat_arr[]' value='" . $cat_row['id'] ."'>" . $cat_row['category'] . "</li>";
                                                                }
                                                                ?> 
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="get" id="frmCatDish">
    <input type="textbox" name="CatDish" id="CatDish" value='<?php echo $catDish ?>' />
</form>
<script>
    function set_checkbox(id){
      var Text = jQuery('#CatDish').val();
        Text = Text +":"+id;
        jQuery('#CatDish').val(Text) ;
        jQuery('#frmCatDish')[0].submit();
    }
</script>
<?php

include("footer.php");
?>
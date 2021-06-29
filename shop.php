<?php

include("header.php");

$catDish="";   // checkbox feature
$catDish_arr=array();

if(isset($_GET['CatDish'])){
    $catDish = $_GET['CatDish'];
    $catDish_arr = array_filter( explode(':',$catDish) ) ;
    $catDish_arr_str = implode(',',$catDish_arr);
   
 

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
                           
                            $dish_sql = "select * from dish where status=1 ";
                            if (isset($_GET['CatDish']) && $_GET['CatDish'] !='') {
                                $dish_sql .= " and category_id in ($catDish_arr_str)" ;  // primary key of category id
                            
                            }
                            $dish_sql .= "order by dish";

                            // if ($category_id == "") {
                            //     // show all dishes
                            //     $dish_sql = "select * from dish where status=1 order by dish";
                            // } else {
                            //     // show specific dishes according to categoty id
                            //     $dish_sql = "select * from dish where status=1 and category_id in $category_id order by dish";
                            // }

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
                                                <a target="_blank" href="<?= SITE_IMAGE . $dish_row['image'] ?>">
                                                    <img class="bigImage" src="<?php echo  SITE_IMAGE . $dish_row['image'] ?>">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4>
                                                    <a href="javascript:void(0)"><?php echo $dish_row['dish'] ?></a>
                                                </h4>
                                                <div class="product-price-wrapper" id="dish_detail">
                                                <?php 
                                                $dish_attr_res = mysqli_query($con,"select * from dish_details where status='1' and dish_id ='" . $dish_row['id'] ."'");


                                                while($dish_attr_row = mysqli_fetch_row($dish_attr_res)){
                                                    // pr($dish_attr_row[2]);   for  learning purpose
                                                    ?> 
                                                    <div> <?php
                                                    echo "<input type='radio' class='dish_radio' name='raio_". $dish_row['id']."' value='".$dish_row['id']."' >"  . $dish_attr_row[2]  ;
                                                    echo "&nbsp; &nbsp;";
                                                    echo  $dish_attr_row[3] ;
                                                    echo "&nbsp; &nbsp;&nbsp;&nbsp;";
                                                   ?> </div><?php
                                                   
                                                   
                                                     
                                                }
                                                
                                                
                                                ?>

                                                   
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


                            
                            <ul id="faq" class="category_list">
                            <a href="shop.php"><u>Clear</u></a>
                             <?php

                                                                while ($cat_row = mysqli_fetch_assoc($cat_res)) {
                                                                    $class = "selected";
                                                                   
                                                                    $is_checked="";
                                                                    if(in_array($cat_row['id'],$catDish_arr)){
                                                                        $is_checked="checked='checked'";
                                                                    }
  echo "<li  >   <input $is_checked type='checkbox' onclick=set_checkbox('". $cat_row['id']."') class='checkboxclass' name='cat_arr[]' value='" . $cat_row['id'] ."'>" . $cat_row['category'] . "</li>";
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
      var check = Text.search(":"+id);
       
      

        if(check==-1){
     
             // user selected for first time, means user want to select this option
             Text = Text +":"+id;
        }else{
                  // means already exist that id , so user want to deselect that option(i.e menu / id)
              Text =  Text.replace(":"+id,'');
        }
        jQuery('#CatDish').val(Text) ;
        jQuery('#frmCatDish')[0].submit();
    }
</script>
<?php

include("footer.php");
?>
<?php include('partials-font/menu.php'); ?>

<?php

    if (isset($_SESSION['add-to-cart'])) {
        echo $_SESSION['add-to-cart'];
        unset($_SESSION['add-to-cart']);
        
    }

    if (isset($_SESSION['product-exist'])) {
        echo $_SESSION['product-exist'];
        unset($_SESSION['product-exist']);
        
    }
 ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Products.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Categories</h2>

            <?php
                //Create SQL Query to diplay category from database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 4";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count the rows
                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    //Category is available
                    while($row = mysqli_fetch_assoc($res)){

                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                           <section id="top-sale">
                            <div class="container py-5">
                              
                              <hr>
                    <!-- owl carousel -->
                    <h4><?php echo $title; ?></h4>
                        <div class="owl-carousel owl-theme">
                               <div class="item py-2">
                                <div class="product font-rale">
                                  <div class="d-flex flex-column">
                                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ?>" class="img-fluid" height="90px" width="100px"></a>
                                    <div class="text-center">
                                      
                                      
                                      
                                      <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>"><button type="submit" class="btn btn-warning font-size-12">Visit Products</button></a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <!-- !owl carousel -->
                        </div>
                      </section>
                      <br><br><br>

                        <?php 

                    }
                }
                else{

                }
             ?>

           

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
    <!-- TESTING -->
    

    
          <!-- TESTING -->

    <!-- fOOD MEnu Section Starts Here -->
    <form action="" method="POST" enctype="multipart/form-data">
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Products</h2>
            <?php
             $sql = "SELECT * FROM tbl_food WHERE featured='Yes' AND active='Yes' LIMIT 6";
             $res = mysqli_query($conn, $sql);
             $count = mysqli_num_rows($res);
             if ($count > 0) {
                 while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $price = $row['price'];
                    $description = $row['description'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                                
                                    
                                        
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"  class="img-responsive img-curve" width="100px" height="90px">

                                        <?php

                                    
                                 ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                                <p class="food-price"><?php echo $price; ?>DH</p>
                                    <p class="food-detail">
                                    <?php echo $description; ?>
                                    </p>
                        <br>

                    <a href="<?php echo SITEURL; ?>add-to-cart.php?id=<?php echo $id; ?> " class="btn btn-primary">Add To Cart</a>
                        </div>
                    </div>


                    <?php
                     
                 }
             }
             else{
                echo "Sorry! No Product is available";
             }
             ?>

            

            


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php SITEURL; ?>foods.php">See All Products</a>
        </p>
    </section>
    </form>
     
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-font/footer.php'); ?>
<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS file -->
    
    <style type="text/css">
        *{

    margin: 0 0;
    padding: 0 0;
    font-family: Arial, Helvetica, sans-serif;
}
.container{

    width: 100%;
    margin: 0 auto;
    padding: 1%;
}
.img-responsive{

    width: 100%;
}
.img-curve{
    
}

.text-right{
    text-align: right;
}
.text-center{
    text-align: center;
}
.text-left{
    text-align: left;
}
.text-white{
    color: white;
}

.clearfix{
    clear: both;
    float: none;
}

a{
    color: red;
    text-decoration: none;
}
a:hover{
    color: red;
    text-decoration: none;
}

.btn{
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
}

h2{
    color: #2f3542;
    font-size: 2rem;
    margin-bottom: 2%;
}
h3{
    font-size: 1.5rem;
}
.float-container{

    position: relative;
}
.float-text{
    position: absolute;
    bottom: -30px;
    left: 20%;
    transition: 0.5s;
    opacity: 0;
}
fieldset{
    border: 1px solid white;
    margin: 5%;
    padding: 3%;
    border-radius: 5px;
}


/* CSSS for navbar section */
.navbar{
    

    margin: -10px;
    padding: -5px;
}
.logo{
    height: 5px;
    width: 10%;
    float: left;
    position: relative;
    top: 8%;
    left: -30px;
}
.menu{
    position: relative;
    top: 0;
    line-height: 10px;
    width: 100%;
    right: -30px;
}
.menu ul{
    list-style-type: none;
}

.menu ul li{
    display: inline-block;
    padding: 1%;
    font-weight: bold;
}


/* CSS for Search Section */

.food-search{
    background-image: url(../images/bg.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
}

.food-search input[type="search"]{
    width: 50%;
    padding: 1%;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
}
/* TESTING */

h4{
    position: relative;
    top: -20px;
}

@import url("https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&family=Raleway&family=Rubik&display=swap");


/* CSS for Categories */
.categories{
    padding: 4% 0;


}
.btn-buy{
    background-color: red;
    color: white;
    margin: 2%;
    padding: 2%;
   
}

.box-3{
    width: 20%;
    float: left;
    margin: 2%;
    border: 1px solid whitesmoke;
    top: 15px;
}
.box-3 img{
    position: relative;
    top: 4px;

}
.box-3 :hover + .float-text{
    transition: 0.5s;
    bottom: 50px;
    opacity: 1;
}


/* CSS for Food Menu */
.food-menu{
    background-color: #ececec;
    padding: 4% 0;
}
.food-menu-box{
    width: 43%;
    margin: 1%;
    padding: 2%;
    float: left;
    background-color: white;
    border-radius: 15px;
}

.food-menu-img{
    width: 20%;
    float: left;
}

.food-menu-desc{
    width: 70%;
    float: left;
    margin-left: 8%;
}

.food-price{
    font-size: 1.2rem;
    margin: 2% 0;
}
.food-detail{
    font-size: 1rem;
    color: #747d8c;
}


/* CSS for Social */
.social ul{
    list-style-type: none;
}
.social ul li{
    display: inline;
    padding: 1%;
}

/* for Order Section */
.order{
    width: 50%;
    margin: 0 auto;
}
.input-responsive{
    width: 96%;
    padding: 1%;
    margin-bottom: 3%;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
}
.order-label{
    margin-bottom: 1%; 
    font-weight: bold;
}



/* CSS for Mobile Size or Smaller Screen */

@media only screen and (max-width:768px){
    .logo{
        width: 70%;
        float: none;
        margin: 1% auto 20% auto;
    }

    .menu ul{
        text-align: center;
    }

    .food-search input[type="search"]{
        width: 90%;
        padding: 2%;
        margin-bottom: 3%;
    }

    

    .food-search{
        padding: 10% 0;
    }

    .categories{
        padding: 20% 0;
    }
    h2{
        margin-bottom: 10%;
    }
    .box-3{
        width: 100%;
        margin: 4% auto;
    }

    .food-menu{
        padding: 20% 0;
    }

    .food-menu-box{
        width: 90%;
        padding: 5%;
        margin-bottom: 5%;
    }
    .social{
        padding: 5% 0;
    }
    .order{
        width: 100%;
    }
}
.cart{
    width: 100%;
    background-color: #57B6E3;
    color: white;
    text-align: center;
    padding: 5%;
    margin: 5% auto;
    border-radius: 5px;
    }

.return{
    width: 100%;
    text-align: center;
    margin: 5% auto;
}
.return a{
    border: 1px solid red;
    border-radius: 10px;
    padding: 10px;
    transition: 0.2s;
    
}
.return a:hover{
    background-color: red;
    color: white;
    transition: 0.2s;
}



    </style>

</head>
<body>

    <?php
        if (isset($_SESSION['cart-delete'])) {
            echo $_SESSION['cart-delete'];
            unset($_SESSION['cart-delete']);
        }
     ?>
        <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Products</a>
                    </li>
                    <li>
                        <a href="">Contact</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>shop-cart.php"><i style="font-size:24px" class="fa">&#xf07a;</i></a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <!-- start #header -->
        <header id="header">
        	
            <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
                <p class="font-rale font-size-12 text-black-50 m-0">Magasin 4 , Immeuble 1403 , Quatier El Wifaq – Temara</p>
                
            </div>

            <!-- Primary Navigation -->
         
               <!-- !Primary Navigation -->

        </header>
    <!-- !start #header -->
      

    <!-- start #main-site -->
        <main id="main-site">

            <!-- Shopping cart section  -->
                <section id="cart" class="py-3">
                    <div class="container-fluid w-75">
                        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

                        <!--  shopping cart items   -->
                            <div class="row">
                                <div class="col-sm-9">
                                    <!-- cart item -->
                                    <?php 
                                    $sql = "SELECT * FROM tbl_cart";
                                    $res = mysqli_query($conn, $sql);   
                if ($res==TRUE) {
                    $count = mysqli_num_rows($res);
                    if ($count > 0) {
                        
                        $total=0;
                        while ($row = mysqli_fetch_assoc($res)) {
                            
                            $id = $row['id'];
                            $product_id = $row['product_id'];
                            $product_id_array = array($product_id);
                            $sql1 = "SELECT * FROM tbl_food WHERE id = $product_id";
                            $res1 = mysqli_query($conn, $sql1);
                            while($row1 = mysqli_fetch_assoc($res1) ){
                            $title = $row1['title'];
                            $price = $row1['price'];
                            $image_name = $row1['image_name'];
                            $total +=$price;

                            }
                            

                            

                            ?>

                            <div class="row border-top py-3 mt-3">
                                            <div class="col-sm-2">
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>" style="height: 100px;" alt="cart1" class="img-fluid">
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="font-baloo font-size-20"><?php echo $title; ?></h5>
                                                
                                                <!-- product rating -->
                                                
                                                <!--  !product rating-->

                                                <!-- product qty -->
                                                    <div class="qty d-flex pt-2">
                                                        <div class="d-flex font-rale w-25">
                                                            
                                                            <input type="number" data-id="pro1" class="qty_input border px-2 w-100 bg-light" value="1" placeholder="1" min="1">
                                                            
                                                        </div>
                                                        <a href="<?php echo SITEURL; ?>delete-cart.php?id=<?php echo $id; ?>"><button class="btn font-baloo text-danger px-3 border-right">Delete</button></a>
                                                        
                                                    </div>
                                                <!-- !product qty -->

                                            </div>

                                            <div class="col-sm-2 text-right">
                                                <div class="font-size-20 text-danger font-baloo">
                                                    <span class="product_price"><?php echo $price; ?></span> DH
                                                </div>
                                            </div>
                                        </div>

                            <?php
                        }
                    }
                    else{
                        ?>
                        <div class="cart">
                            <h1 >Your Cart is empty</h1>

                        </div>
                        <div class="return">
                            <a href="<?php SITEURL;?>categories.php">Return To store</a>
                        </div>
                        <?php
                    }
                }
                else{
                    header('location:'.SITEURL);
                }


             ?>

                                       
                                <!-- !cart item -->
                                </div>
                                <!-- subtotal section-->
                                <div class="col-sm-3">
                                    <div class="sub-total border text-center mt-2">
                                        <h6 class="font-size-12 font-rale text-success py-3"><i class="fa fa-check" aria-hidden="true"></i> Your order is eligible for FREE Delivery.</h6>
                                        <div class="border-top py-4">
                                            <h5 class="font-baloo font-size-20">Subtotal (<?php echo $count ?> item):&nbsp; <span class="text-danger"><span class="text-danger" id="deal-price"><br><?php if (isset($total)==TRUE) {
                                                echo $total;
                                            }
                                            else{
                                                echo 0;
                                            } ?></span> DH </span> </h5>
                                            <?php if ($count > 0) {
                                                ?>
                                                <a href="<?php echo SITEURL; ?>order.php" ><button type="submit" class="btn-buy">Proceed to Buy</button></a>
                                                <?php 
                                            } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- !subtotal section-->
                            </div>
                        <!--  !shopping cart items   -->
                    </div>
                </section>
            <!-- !Shopping cart section  -->

              <!-- New Phones -->
             
              <!-- !New Phones -->

        </main>
    <!-- !start #main-site -->

    <!-- start #footer -->
        <footer id="footer" class="bg-dark text-white py-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-12">
                <h4 class="font-rubik font-size-20">Mobile Shopee</h4>
                <p class="font-size-14 font-rale text-white-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.</p>
              </div>
              <div class="col-lg-4 col-12">
                <h4 class="font-rubik font-size-20">Newslatter</h4>
                <form class="form-row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Email *">
                  </div>
                  <div class="col">
                    <button type="submit" class="btn-buy">Subscribe</button>
                  </div>
                </form>
              </div>
              <div class="col-lg-2 col-12">
                <h4 class="font-rubik font-size-20">Information</h4>
                <div class="d-flex flex-column flex-wrap">
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">About Us</a>
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Delivery Information</a>
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Privacy Policy</a>
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Terms & Conditions</a>
                </div>
              </div>
              <div class="col-lg-2 col-12">
                <h4 class="font-rubik font-size-20">Account</h4>
                <div class="d-flex flex-column flex-wrap">
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">My Account</a>
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Order History</a>
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Wish List</a>
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Newslatters</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <div class="copyright text-center bg-dark text-white py-2">
          <p class="font-rale font-size-14">&copy; Copyrights 2020. Desing By <a href="#" class="color-second">Chouaib Kaddouri</a></p>
        </div>
    <!-- !start #footer -->

    
</body>
</html>
<?php include('partials-font/menu.php'); ?>

<?php
    if (isset($_GET['food_id'])) 
    {
        $food_id = $_GET['food_id'];

        $sql = "SELECT * FROM tbl_food WHERE id = $food_id";

        

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count==1) 
        {
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
            

            

        }
        else
        {
            header('location:'.SITEURL);
        }
    }
    else
    {
        header('location'.SITEURL);
    }
 ?>

    
    <section class="food-search1">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>


            <form action="#" class="order" method="POST">
                
               
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Chouaib Kaddouri" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. +212xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="adress" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    <div class="order-label">Payment Method</div><br>
                    <input type="radio" name="payment" value="On_delivery" onclick="text(1)" required>On delivery<br>
                    <input type="radio" name="payment" value="Credit_Card" onclick="text(0)" required checked>Credit Card<br>
                    <br>
                    <div id="mycode">
                    <div class="order-label">Card Name</div>
                    <input type="text" name="card_name" placeholder="Card name" class="input-responsive" required>
                    <div class="order-label">Card Number</div>
                    <input type="number" name="card_number" placeholder="Card Number" class="input-responsive" required>
                    <div class="order-label">CCV</div>
                    <input type="number" name="ccv" placeholder="CCV 996" class="input-responsive" required>
                    <div class="order-label">Expiration Date</div>
                    <input type="month" name="exp_date"  class="input-responsive" required>
                    </div>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    
                </fieldset>

            </form>

            <?php
                if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;
                    $order_date = date("Y-m-d h:i:sa");

                    $status = "Ordered";
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_adress = $_POST['adress'];



                    $sql2 = "INSERT INTO tbl_order SET
                    food = '$title',
                    price = $price,
                    qty = '$qty',
                    total = '$total',
                    order_date = '$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_adress'
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if ($res2==TRUE) {

                        $_SESSION['order'] = '<script>alert("Order saved")</script>';
                        echo $_SESSION['order'];
                        unset ($_SESSION['order']);
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                        
                        
                    }
                    else{
                        echo '<script>alert("Failed to order please try again!")</script>';
                    }
                }
             ?>

        </div>
    </section>
    <script type="text/javascript">
        function text(x) {
            if (x==0) {
                document.getElementById('mycode').style.display="block";
                document.getElementById('mycode').style.transition="0.5s";
            }
            else
                document.getElementById('mycode').style.display="none";
                document.getElementById('mycode').style.transition="0.5s";
            return;
            
        }
    </script>
    <!-- fOOD sEARCH Section Ends Here -->

<?php include('partials-font/footer.php'); ?>
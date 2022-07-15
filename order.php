
<?php include('partials-front/menu.php'); ?>

    <?php 
        //Check if shoes ID is set or not
        if(isset($_GET['shoes_id']))
        {
            //Get shoes ID and details of the selected shoes
            $shoes_id = $_GET['shoes_id'];

            //Get details of the selected shoes
            $sql = "SELECT * FROM tbl_shoes WHERE id=$shoes_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //Check data availability
            if($count==1)
            {
                //Get the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //Shoes unavailabe
                //redirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //redirect to homepage
            header('location:'.SITEURL);
        }
    ?>

    <!-- SHOES SEARCH START -->
    <section class="shoes-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Shoes</legend>

                    <div class="shoes-list-img">
                        <?php 
                        
                            //Check image availability
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/shoes/<?php echo $image_name; ?>" alt="shoes" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                        </div>
                    
                        

    
                    <div class="shoes-list-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="shoes" value="<?php echo $title; ?>">

                        <p class="shoes-price">RM<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
					<legend><h3>Billing Details</h3></legend>
                    <div class="order-label">Recipient Name</div>
                    <input type="text" name="customer_name"  placeholder="Enter your name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact"  placeholder="Insert phone number" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email"  placeholder="insert your email here" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="7" placeholder="Insert your address here" class="input-responsive" required></textarea>

                    <br><br>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
            </form>
           

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $shoes = $_POST['shoes'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; 

                    $order_date = date("Y-m-d"); //Order date

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['customer_name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

					
                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        shoes = '$shoes',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Shoes Ordered Successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Shoes.</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>
                </div>
    </section>
    <!-- SHOES SEARCH END -->

    <?php include('partials-front/footer.php'); ?>
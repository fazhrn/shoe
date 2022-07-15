    
    <?php include('partials-front/menu.php'); ?>

    <?php 
        //check ID
        if(isset($_GET['category_id']))
        {
            //Category ID is set and get the ID
            $category_id = $_GET['category_id'];
            // Get category title based on Category ID
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>


    <!-- SHOES SEARCH START -->
    <section class="shoes-search text-center">
        <div class="container">
            
            <h2>Shoes on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- SHOES SEARCH END-->



    <!-- SHOES LIST START -->
    <section class="shoes-list">
        <div class="container">
            <h2 class="text-center">Shoes List</h2>

            <?php 
            
                //Create SQL Query to Get shoes based on Selected CAtegory
                $sql2 = "SELECT * FROM tbl_shoes WHERE category_id=$category_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //check shoes availability
                if($count2>0)
                {
                    //Shoes is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="shoes-list-box">
                            <div class="shoes-list-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/shoes/<?php echo $image_name; ?>" alt="Shoes" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="shoes-list-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="shoes-price">RM<?php echo $price; ?></p>
                                <p class="shoes-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?shoes_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Shoes not available
                    echo "<div class='error'>Shoes not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- SOES LIST END -->

    <?php include('partials-front/footer.php'); ?>
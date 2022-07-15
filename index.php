    <?php include('partials-front/menu.php'); ?>

    <!-- SHOES SEARCH START -->
    <section class="shoes-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>shoes-search.php" method="POST">
                <input type="search" name="search" placeholder="Search Shoes..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- SHOES SEARCH END -->

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- CATEGORY START -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">EXPLORE</h2>

            <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //categories available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="<?php echo SITEURL; ?>category-shoes.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check if Image is available or not
                                    if($image_name=="")
                                    {
                                        //display message
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Shoes" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-black"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>
<br>

            <div class="clearfix"></div>
        </div>
                                <p class="text-center">
                        <a href="categories.php">See All Categories</a>
                        </p>
    </section>
    <!-- CATEGORY END -->



    <!-- SHOES LIST START -->
    <section class="shoes-list">
        <div class="container">
            <h2 class="text-center">Shoes List</h2>

            <?php 
            
            //Getting Shoes from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_shoes WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether shoes available or not
            if($count2>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="shoes-list-box">
                        <div class="shoes-list-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
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
                //Shoes Not Available 
                echo "<div class='error'>Shoes not available.</div>";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="shoes.php">See All Shoes</a>
        </p>
    </section>
    <!-- Shoes Menu Section Ends Here -->

    
    <?php include('partials-front/footer.php'); ?>
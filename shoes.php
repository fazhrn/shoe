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



    <!-- SHOES LIST START -->
    <section class="shoes-list">
        <div class="container">
            <h2 class="text-center">Shoes List</h2>

            <?php 
                //Display Shoes that are Active
                $sql = "SELECT * FROM tbl_shoes WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //check shoes availibility
                if($count>0)
                {
                    //Shoes Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="shoes-list-box">
                            <div class="shoes-list-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/shoes/<?php echo $image_name; ?>" alt="shoes" class="img-responsive img-curve">
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
                    //Shoes unavailable
                    echo "<div class='error'>Shoes not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- SHOES LIST END -->

    <?php include('partials-front/footer.php'); ?>
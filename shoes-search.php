    <?php include('partials-front/menu.php'); ?>

    <!-- SHOES SEARCH START -->
    <section class="shoes-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>Shoes on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- SHOES SEARCH END -->



    <!-- SHOES LIST START -->
    <section class="shoes-list">
        <div class="container">
            <h2 class="text-center">Shoes List</h2>

            <?php 

                //SQL Query to Get shoes based on search keyword
                //$search = adult '; DROP database name;
                // "SELECT * FROM tbl_shoes WHERE title LIKE '%adult'%' OR description LIKE '%adult%'";
                $sql = "SELECT * FROM tbl_shoes WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check shoes availability
                if($count>0)
                {
                    //Food Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="shoes-list-box">
                            <div class="shoes-list-img">
                                <?php 
                                    // Check whether image name is available or not
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

                                <a href="#" class="btn btn-primary">Order Now</a>
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
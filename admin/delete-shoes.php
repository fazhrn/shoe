<?php 
    //Include COnstants Page
    include('../config/constants.php');

    //echo "Delete Shoes Page";

    if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use '&&' or 'AND'
    {
        //Process to Delete
        //echo "Process to Delete";

        //1.  Get ID and Image NAme
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. Remove the Image if Available
        //Check image availability and Delete only if available
        if($image_name != "")
        {
            // IT has image and need to remove from folder
            //Get the Image Path
            $path = "../images/shoes/".$image_name;

            //REmove Image File from Folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            if($remove==false)
            {
                //Failed to Remove image
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
                //REdirect to Manage Food
                header('location:'.SITEURL.'admin/manage-shoes.php');
                //Stop the Process of Deleting Shoes
                die();
            }

        }

        //3. Delete Shoes from Database
        $sql = "DELETE FROM tbl_shoes WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage Shoes with Session Message
        if($res==true)
        {
            //Shoes Deleted
            $_SESSION['delete'] = "<div class='success'>Shoes Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-shoes.php');
        }
        else
        {
            //Failed to Delete Shoes
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Shoes.</div>";
            header('location:'.SITEURL.'admin/manage-shoes.php');
        }

        

    }
    else
    {
        //Redirect to Manage Shoes Page
        //echo "REdirect";
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-shoes.php');
    }

?>
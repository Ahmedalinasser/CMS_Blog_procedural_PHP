<?php



function Query_Error($reslut)
{
global $connection;
if(!$reslut)  
{
    die("QUERY FAILED".mysqli_error($connection));
}
}



function insert_into_category()
{
            global $connection;
            if(isset($_POST['submit']))
            {
                $cat_title = $_POST['cat_title'];
                if($cat_title == "" || empty( $cat_title ) )
                {
                    echo " Please enter this empty field ";

                }
                else 
                {
                    $query = "INSERT INTO categories (cat_title)";
                    $query .="VALUE  ('{$cat_title}')";

                    $select_all_cat_to_catTitle_value = mysqli_query($connection,$query);

                    if(!$select_all_cat_to_catTitle_value )
                    {
                        die("Query Failed" . mysqli_error($connection));
                    }

                }
            }
                           
}

function select_and_delet_cates()
{
    
    
    
    
                                    global $connection;
    
    
                                //////// SELECT ALL CATES ////////
                                    $query = "SELECT * FROM categories ";
                                    $select_all_cat_admin = mysqli_query($connection,$query);
                                    
                                    while($row = mysqli_fetch_assoc($select_all_cat_admin))
                                    {
                                        $cat_Id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];

                                        ?>
                                        <tr>
                                        <td><?php echo $cat_Id?></td>
                                        <td><?php echo $cat_title?></td>
                                        <td><a href='category.php?delete=<?php echo $cat_Id ?>'>Delete</a></td>
                                        <td><a href='category.php?edit=<?php echo $cat_Id ?>'>Update</a></td>
                                        </tr>
                                        <?php  

                                        //////// DELETING QUERY OF CATE ////////     

                                        if(isset($_GET['delete']))
                                        {
                                            $delete_cat_Id = $_GET['delete'];
                                            $query = "DELETE FROM categories WHERE cat_id = '{$delete_cat_Id}'";
                                            $delete_query = mysqli_query($connection, $query);                                   
                                            header("location: category.php");
                                        }
                                    }
}














<form action="" method="post">
    <div class="form-group">
        <label for = "cat_title"> Up date </label>
                    
                            <?php
        
                                ///////// Selecting categories /////////
        
                                if(isset($_GET['edit']))
                                {   
                                    $cat_id = $_GET['edit'];
                                    $query = "SELECT * FROM categories WHERE cat_id = '{$cat_id}'";
                                    $select_to_edit_cat_id_query = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($select_to_edit_cat_id_query))
                                {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                            ?>
                            
         <input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title )) {echo $cat_title;} ?>">
                       
                        
                          <?php
                                                                
                                }
                                    
                                //////// UPDATE Query /////////
                                    
                                if(isset($_POST['update_category']))
                                {
                                    $cat_title = $_POST['cat_title'];
                                     $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = '{$cat_id}'";


                                        $update_query = mysqli_query($connection,$query);

                                        if(!$update_query )
                                        {
                                           die("Query Failedssssss" . mysqli_error($connection));
                                        }

                                    }
                                }
                        ?>
                        
                        
        </div>
        <div class="form-group">

        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>

</form>

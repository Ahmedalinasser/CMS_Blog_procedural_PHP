
                   <?php
                        
                        if(isset($_POST['asos'])) 
                        {
                             $ArrayValueHolder =  $_POST['asos'];
                            
                            foreach($ArrayValueHolder as $post_value_id_holder)
                            {
                               
                                $select_post_status_option = $_POST['select_post_status_option'];
                                
                                switch($select_post_status_option)
                                {
                                        case"published";
                                        
                                        $query = "UPDATE posts SET post_status = '{$select_post_status_option}' WHERE post_id = {$post_value_id_holder}"; 
                                        $post_status_value = mysqli_query($connection, $query) ; 
                                        Query_Error($post_status_value) ;
                                        break;
                                        
                                        case"draft";
                                        
                                        $query = "UPDATE posts SET post_status = '{$select_post_status_option}' WHERE post_id = {$post_value_id_holder}"; 
                                        $post_status_value = mysqli_query($connection, $query) ; 
                                        Query_Error($post_status_value) ;
                                        break;
                                        
                                        case"delete";
                                        
                                        $query = "DELETE FROM posts WHERE post_id = {$post_value_id_holder}"; 
                                        $post_delete = mysqli_query($connection, $query) ; 
                                        Query_Error($post_delete) ;
                                        break;
                                        
                                }
                            }
                            
                        }
                        
                    ?>

                   
                   
                    <form action="" method="post"> 
                       
                      <div id="bulkOptionContainer" class="col-xs-4">
                          <select name="select_post_status_option" id="" class="form-control">
                              <option value="draft">choose</option>
                              <option value="published">Published</option>
                              <option value="draft">Draft</option>
                              <option value="delete">Delete</option>
                          </select>
                      </div>       
                       <div class="col-xs-4">
                              <input name="submit" value="Apply" type="submit" class="btn btn-success">
                              <a href="posts.php?source=add_post" class="btn btn-primary">Add Post</a>
                              </div>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><input id="selectAlBoxes"type="checkbox"></th>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Tags</th> 
                                    <th>Status</th>
                                    <th>Comments</th>
                                    <th>Delete</th> 
                                    <th>Edit</th>     
                                </tr>
                            </thead>
                            <Tbody>
                               <?php
                               $query = "SELECT * FROM posts ";
                                    $select_all_posts = mysqli_query($connection,$query);
                                    
                                    while($row = mysqli_fetch_assoc($select_all_posts))
                                    {
                                        $post_id = $row['post_id'];
                                        $post_category_id = $row['post_category_id'];
                                        $post_title = $row['post_title'];
                                        $post_author = $row['post_author'];
                                        $post_image = $row['post_image'];
                                        $post_date = $row['post_date'];
                                        $post_tags = $row['post_tags'];
                                        $post_status = $row['post_status'];
                                        $post_comment_count = $row['post_comment_count'];
                                        ?>
                                <tr>
                                    <th><input type="checkbox" class="checkbooxs" name="asos[]" value="<?php echo $post_id ?>"></th>
                                    
                                    <th><?php echo $post_id ?></th>
                                    
                                    <th>
                                    <?php
                                            $query = "SELECT * FROM categories WHERE cat_id ={$post_category_id}  ";
                                            $show_cat_query = mysqli_query($connection,$query);
                                            while($row = mysqli_fetch_assoc($show_cat_query))
                                            {
                                                $cat_id = $row['cat_id'];   
                                                $cat_title = $row['cat_title'];  
                                                echo $cat_title;
                                            }
                                    ?>
                                    
                                    
                                    </th>
                                    
                                    
                                    <th><a href="../post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a></th>
                                    <th><?php echo $post_author ?></th>
                                    <th><img width='100' src='../images/<?php echo $post_image; ?>'></th>
                                    <th><?php echo $post_date ?></th>
                                    <th><?php echo $post_tags ?></th>
                                    <th><?php echo $post_status ?></th>
                                    <th><?php echo $post_comment_count ?></th>
                                    <th><a href="posts.php?delete=<?php echo $post_id?>">Delete</a></th>
                                    <th><a href="posts.php?source=edit_post&p_id=<?php echo $post_id?>">Edit</a></th>
                                </tr>
                                
                              <?php }  ?>
                              <?php
                                    if(isset($_GET['delete']))
                                    {
                                        $the_post_id = $_GET['delete'];
                                        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
                                        $delete_query = mysqli_query($connection,$query);
                                    }
                                
                                
                                ?>
                                <?php
                                    if(isset($_GET['edit']))
                                    {
                                        $query = "";
                                    }
                                
                                ?>
                            </Tbody>
                        </table>
                    </form>               
                        
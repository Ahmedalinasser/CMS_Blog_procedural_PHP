<?php
        if(isset($_GET['p_id']))
        {
            $get_post_id = $_GET['p_id'];
        
            $query = "SELECT * FROM posts WHERE post_id = {$get_post_id}";
            $select_all_posts_by_id = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_all_posts_by_id))
            {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];
                $post_comment_count = $row['post_comment_count'];
            }
        }

                if(isset($_POST['update_post']))
                {
                    
                    $post_category_id = $_POST['post_category_id'];
                    $post_title = $_POST['title'];
                    $post_author = $_POST['author'];
                    $post_image = $_FILES['image']['name'];
                    $post_image_temp = $_FILES['image']['tmp_name'];
                    $post_tags = $_POST['post_tag'];
                    $post_status = $_POST['post_status'];
                    $post_content = $_POST['post_content'];
                    
                    move_uploaded_file($post_image_temp, "../images/$post_image");
                    
                     if(empty($post_image))
                    {
                        $query = "SELECT post_image FROM posts WHERE post_id = $post_id";
                        $keep_image_query = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($keep_image_query))
                        {
                            $post_image = $row['post_image'];
                        }
//                        Query_Error($update_post_query);
                    }
                    
                    $query = "UPDATE posts SET ";
                    $query.= "	post_category_id ='{$post_category_id}', ";
                    $query.= "	post_title ='{$post_title}', ";
                    $query.= "	post_author ='{$post_author}', ";
                    $query.= "  post_date = now(), ";
                    $query.= "	post_image ='{$post_image}', ";
                    $query.= "	post_content ='{$post_content}', ";
                    $query.= "	post_tags ='{$post_tags}', ";
                    $query.= "	post_status ='{$post_status}' ";
                    $query.= "	WHERE post_id = '{$post_id}' ";
                    
                    $update_post_query = mysqli_query($connection,$query);
                    Query_Error($update_post_query);
                   
                }
        

?>
  
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
       
        <select name="post_category_id" id="">
            
            <?php
                        $query = "SELECT * FROM categories";
                        $select_to_choose_cat_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_to_choose_cat_query))
                        {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

            ?>
            
            <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
            <?php }?>
        </select>
    </div>
    <p>kiclk to <a href="../post.php?p_id=<?php echo $get_post_id ?>">View Post</a> Or <a href="posts.php">More Edit</a></p>
    
   
    <div class="form-group">
        <label for="title"> Post Title   </label>
        <input  value="<?php echo $post_title?>" type="text" class="form-control" name="title" >
    </div>
    
    
    
    
    <div class="form-group">
        <label for="title">  Post Author  </label>
        <input value="<?php echo $post_author ?>" type="text" class="form-control" name="author" >
    </div>
    
    
    <div class="form-group">
        <div><label for="post_image">  Post Image  </label></div>   
        <img width="100" src="../images/<?php echo $post_image?>" alt="">
        <input type="file" name="image" >
    </div>
    
       
    <div class="form-group">
        <label for="post_tag"> Post tag   </label>
        <input value="<?php echo $post_tags?>" type="text" class="form-control" name="post_tag" >
    </div>
    
      
      
      <div class="form-group">
      <div>
      <label for="post_status">  Post status  </label>
      </div>
      
       <select name="post_status" id="">
                          
           <option value="<?php echo $post_status?>"><?php echo $post_status?></option>

             
        <?php 
           if($post_status == "published")
           { 
              echo " <option value='draft'>draft</option>";             
            }  
           
            else
           { 
                echo  "<option value='published'>published</option>";    
            }
        ?>
           
       </select>
    </div>
      
      
       
<!--
    <div class="form-group">
        <label for="post_status">  Post status  </label>
        <input value="<?php echo $post_status?>" type="text" class="form-control" name="post_status" >
    </div>
-->
   
       
        
    <div class="form-group">
        <label for="post_content">  Post Content  </label>
        <textarea type="text" name="post_content" class="form-control" id="" cols="30" row="10" ><?php echo $post_content ?>
        </textarea>
        
    </div>
   
       
    <div class="form-group">
            <!--  submite butten-->
        <input type="submit" class="tbn btn-primary" name="update_post"  value="Publish post">
    </div>
    
    
    
</form>



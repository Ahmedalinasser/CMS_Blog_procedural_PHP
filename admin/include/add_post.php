

<?php

                if(isset($_POST['create_post']))
                {
                    $post_category_id = $_POST['post_category_id'];
                    $post_title = $_POST['title'];
                    $post_author = $_POST['author'];
                    $post_date = date('d-m-y');                               
                    
                    $post_image = $_FILES['image']['name'];
                    $post_image_tamp = $_FILES['image']['tmp_name'];
                    
                    $post_content = $_POST['post_content'];
                    $post_tag = $_POST['post_tag'];
                    $post_status = $_POST['post_status'];
//                    $post_comment_count = $_POST[''];
                    move_uploaded_file($post_image_tamp, "../images/$post_image"); 
                    
//$query = "INSERT INTO          posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status)";
//$query .= "VALUES ('{$post_category_id}','{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tag}', '{$post_status}', '{$post_comment_count}')";


                    
                   
                        
$query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, 	post_content, post_tags, post_status) VALUES ({$post_category_id}, '{$post_title}','{$post_author}',now() ,'{$post_image}','{$post_content}','{$post_tag}','{$post_status}')";
                    
                    $create_query = mysqli_query($connection, $query);
                     
                    Query_Error($create_query);
                    
                    
                }


?>


<p> <a href="../post.php?p_id=<?php echo $get_post_id ?>">View Post</a> Or <a href="posts.php">More Edit</a></p>

<form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
       <div> <label for="post_categories"> Choose Category   </label></div>

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
   
    <div class="form-group">
        <label for="title"> Post Title   </label>
        <input type="text" class="form-control" name="title" >
    </div>
    
    
    
    
    <div class="form-group">
        <label for="title">  Post Author  </label>
        <input type="text" class="form-control" name="author" >
    </div>
    
    
    <div class="form-group">
        <label for="post_image">  Post Image  </label>
        <input type="file" name="image" >
    </div>
    
       
    <div class="form-group">
        <label for="post_tag"> Post tag   </label>
        <input type="text" class="form-control" name="post_tag" >
    </div>
    
    <div class="form-group">
      <div>
      <label for="post_status">  Post status  </label>
      </div>
      
       <select name="post_status" id="">
            <option value='draft'>draft</option> 
             
             <?php
           if($post_status !== "published")
           { 
            
                echo  "<option value='draft'>draft</option>";  
            }  
           ?>
           
       </select>
    </div>
   
        
    <div class="form-group">
        <label for="post_content">  Post Content  </label>
        <textarea type="text" name="post_content" class="form-control" id="body" cols="30" row="10" ></textarea>
        
    </div>
   
       
    <div class="form-group">
            <!--  submite butten-->
        <input type="submit" class="tbn btn-primary" name="create_post"  value="Publish post">
    </div>
    
    
    
</form>


<?php

                if(isset($_POST['create_account']))
                {
                    $username = $_POST['username'];
                    $user_firstname = $_POST['firstname'];
                    $user_lastname = $_POST['lastname'];
                    $user_password = $_POST['password'];
                    $user_email = $_POST['user_email'];
                    $user_role = $_POST['user_role'];
                    $user_image = $_FILES['user_image']['name'];
                    $user_image_tamp = $_FILES['user_image']['tmp_name'];
                    
                   
                    
                    move_uploaded_file ($user_image_tamp , "../images/$user_image");
                    
                    
//                    $post_category_id = $_POST['post_category_id'];
//                    $post_title = $_POST['title'];
//                    $post_author = $_POST['author'];
//                    $post_date = date('d-m-y');                               
//                    
//                    $post_image = $_FILES['image']['name'];
//                    $post_image_tamp = $_FILES['image']['tmp_name'];
//                    
//                    $post_content = $_POST['post_content'];
//                    $post_tag = $_POST['post_tag'];
//                    $post_status = '';
////                    $post_comment_count = $_POST[''];
//                    move_uploaded_file($post_image_tamp, "../images/$post_image"); 
                    
//$query = "INSERT INTO          posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status)";
//$query .= "VALUES ('{$post_category_id}','{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tag}', '{$post_status}', '{$post_comment_count}')";


                    
                   
                        
$query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_image, user_role) VALUES ('{$username}', '{$user_password}','{$user_firstname}', '{$user_lastname}','{$user_email}','{$user_image}','{$user_role}')";
                    
                    $create_query = mysqli_query($connection, $query);
                     
                    Query_Error($create_query);
                    
                    echo "user created: " . " " . "<a href = 'users.php'> View users</a> " ;
                    
                }


?>



<form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
      
      
       <div class="form-group">
        <label for="title"> User Name   </label>
        <input type="text" class="form-control" name="username" >
    </div>
    
    
    
    
    <div class="form-group">
        <label for="title">  First Name  </label>
        <input type="text" class="form-control" name="firstname" >
    </div>

       
           
    <div class="form-group">
        <label for="title">  Last Name  </label>
        <input type="text" class="form-control" name="lastname" >
    </div>
    
     
     
     <div class="form-group">
        <label for="post_tag"> Password   </label>
        <input type="text" class="form-control" name="password" >
    </div>
      
       
       
    <div class="form-group">
        <label for="post_status">  Email  </label>
        <input type="text" class="form-control" name="user_email" >
    </div>
   
       
       <div class="form-group">
        <select name="user_role" id="">
            
            <?php
//                        $query = "SELECT * FROM users";
//                        $select_to_choose_user_role = mysqli_query($connection, $query);
//
//                        while($row = mysqli_fetch_assoc($select_to_choose_user_role))
//                        {
//                        $user_id = $row['user_id'];
//                        $user_role = $row['user_role'];

            ?>
            
<!--            <option value="<?php //echo $user_id ?>"><?php //echo $user_role ?></option>-->
           <optgroup label="Role">
           <option>admin</option>
           <option>subscriper</option>
           </optgroup>
            <?php //}?>
        </select>
        </div>
    </div>
   
   
    
    
    <div class="form-group">
        <label for="post_image">  User Image  </label>
        <input type="file" name="user_image" >
    </div>
    
       
    
   
        
<!--
    <div class="form-group">
        <label for="post_content">  Post Content  </label>
        <textarea type="text" name="post_content" class="form-control" id="" cols="30" row="10" ></textarea>
        
    </div>
-->
   
       
    <div class="form-group">
            <!--  submite butten-->
        <input type="submit" class="tbn btn-primary" name="create_account"  value="Create Account">
    </div>
    
    
    
</form>
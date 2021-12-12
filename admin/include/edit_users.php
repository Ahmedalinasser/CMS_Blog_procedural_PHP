

<?php

                if(isset($_GET['u_id']))
                {
                    $the_user_id_from_url = $_GET['u_id'];
                
    
                $query = "SELECT * FROM users WHERE user_id = {$the_user_id_from_url} ";
                $select_all_info_from_user = mysqli_query($connection, $query);
                if($row = mysqli_fetch_assoc($select_all_info_from_user))
                {
                    $username = $row['username'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_password = $row['user_password'];
                    $user_email = $row['user_email'];
                    $user_role = $row['user_role'];
                    $user_image = $row['user_image'];
                    
                    $user_salt = 4;
                    Query_Error($select_all_info_from_user);
                }}  

                if(isset($_POST['edit_user']))
                {
                    $username = $_POST['username'];
                    $user_firstname = $_POST['firstname'];
                    $user_lastname = $_POST['lastname'];
                    $user_password = $_POST['password'];
                    $user_email = $_POST['user_email'];
                    $user_role = $_POST['user_role'];
                    $user_image = $_FILES['user_image']['name'];
                    $user_image_tamp = $_FILES['user_image']['tmp_name'];
                    
                    $user_salt = 4;
                    
                    move_uploaded_file ($user_image_tamp , "../images/$user_image");
                    

                    
                    $query = "UPDATE users set ";
                    $query.= " username = '{$username}', ";
                    $query.= " user_firstname = '{$user_firstname}', ";
                    $query.= " user_lastname = '{$user_lastname}', ";
                    $query.= " user_password = '{$user_password}', ";
                    $query.= " user_email = '{$user_email}', ";
                    $query.= " user_image = '{$user_image}' ";
                    $query.= " WHERE user_id = '{$the_user_id_from_url}'";
                    
                    $update_query = mysqli_query($connection, $query);
                    Query_Error($update_query);
               
                   
                    
                    
                }


?>



<form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
      
      
       <div class="form-group">
        <label for="title"> User Name   </label>
        <input type="text" value="<?php echo $username?>" class="form-control" name="username" >
    </div>
    
    
    
    
    <div class="form-group">
        <label for="title">  First Name  </label>
        <input type="text" value="<?php echo $user_firstname?>" class="form-control" name="firstname" >
    </div>

       
           
    <div class="form-group">
        <label for="title">  Last Name  </label>
        <input type="text" value="<?php echo $user_lastname?>" class="form-control" name="lastname" >
    </div>
    
     
     
     <div class="form-group">
        <label for="post_tag"> Password   </label>
        <input type="text" value="<?php echo $user_password?>" class="form-control" name="password" >
    </div>
      
       
       
    <div class="form-group">
        <label for="post_status">  Email  </label>
        <input type="text" value="<?php echo $user_email?>" class="form-control" name="user_email" >
    </div>
   
       
       <div class="form-group">
        <select name="user_role" id="">
            <optgroup label="Role">
            <option value="default"><?php echo $user_role?></option>
            <?php
                if($user_role == 'admin')
                {
                   echo "<option value='subscriper'>subscriper</option>";  
                }
                else
                {
                  echo "<option value = 'admin'>admin</option>";
                }
            ?>
           </optgroup>
           
        </select>
        </div>
    </div>
   <?php echo $user_image?>
   
    
    
    <div class="form-group">
        <div><label for="post_image">  User Image  </label></div>
        <img width="100" src="../images/<?php echo $user_image?>" alt="">
        <input type="file" name="user_image" >
    </div>
    
          
    <div class="form-group">
            <!--  submite butten-->
        <input type="submit" class="tbn btn-primary" name="edit_user"  value="Save">
    </div>
    
    
    
</form>
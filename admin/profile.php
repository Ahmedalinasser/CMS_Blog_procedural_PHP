<!-- Header-->

    <?php include"include/admin_header.php"?>

    
                    
    <?php
        if(isset($_SESSION['username']))
        {
            $username = $_SESSION['username'];
        }

        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $select_user_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_user_query))
         {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_password = $row['user_password'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];
                $user_image = $row['user_image'];
         }
        
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
            
            
                $query = "UPDATE users SET ";
                $query.= "username = '{$username}', ";
                $query.= "user_firstname = '{$user_firstname}', ";
                $query.= " user_lastname = '{$user_lastname}', ";
                $query.= " user_password = '{$user_password}', ";
                $query.= " user_email = '{$user_email}', ";
                $query.= " user_image = '{$user_image}' ";
                $query.= " WHERE user_id = '{$user_id}'";
            
                $update_query = mysqli_query($connection, $query);
                Query_Error($update_query);

        }
    
    ?>


<!-- Header-->

<body>

    <div id="wrapper">

            
             <!-- Navigation -->

              <?php  include "include/admin_navigation.php"?>
                    


             <!-- Navigation -->


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                   
                   
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['username']?></small>
                        </h1>

                      
      
                       
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
        <input type="password" value="<?php echo $user_password?>" class="form-control" name="password" >
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
                       
                        
                   </div>
                   
                   
                   
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"?>
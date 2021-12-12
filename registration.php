<?php  include "includes/DP.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php
    if(isset($_POST['submit']))
    {

        $username   = $_POST['username'];
        $firstname   = $_POST['firstname'];
        $lastname   = $_POST['lastname'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        
        if(!empty($username) && !empty($email) && !empty($password) && !empty($firstname) && !empty($lastname))
        {
        
        $username   = mysqli_real_escape_string($connection, $username);
        $firstname  = mysqli_real_escape_string($connection, $firstname);
        $lastname   = mysqli_real_escape_string($connection, $lastname);
        $email      = mysqli_real_escape_string($connection, $email);
        $password   = mysqli_real_escape_string($connection, $password);
        
        $query = "SELECT user_salt FROM users";
        $select_randsalt_query = mysqli_query($connection, $query);
        
        $row = mysqli_fetch_assoc($select_randsalt_query);
        
             $salt = $row['user_salt'];
            $password = crypt($password, $salt);
       
    
        echo $password;
        
        $query = "INSERT INTO users (username, user_firstname, user_lastname, user_email, user_password, user_role)";
        $query.= "VALUES ('{$username}', '{$firstname}', '{$lastname}', '{$email}', '{$password}', 'subscriber')";
        $registering_new_users = mysqli_query($connection, $query); 
        if(!$registering_new_users)
        {
            die("QUERY FAILED". mysqli_error($connection) . ' ' . mysqli_errno($connection));        
        }
            
            
     $massage = "Your registered succsesfuly ";
    }
    else
    {
     $massage = "Plaese fill the empty places ";
    }
    
    }
    else
    {
        $massage = "";
    }


    

    ?>
    
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h4><?php  echo $massage ?></h4>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                        </div>
                        
                        <div class="form-group">
                            <label for="first_name" class="sr-only">First Name </label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
                        </div>
                        
                        <div class="form-group">
                            <label for="last_name" class="sr-only">Last Name</label>
                            <input type="<text></text>" name="lastname" id="last_name" class="form-control" placeholder="Last Name">
                        </div>
                        
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>

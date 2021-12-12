<?php include"DP.php";?>
<?php session_start();?>

<?php
            if(isset($_POST['login']))
            {
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                
                $username = mysqli_real_escape_string($connection, $username);
                $password = mysqli_real_escape_string($connection, $password);
                
                $query = "SELECT * FROM users WHERE username = '{$username}' AND user_password = '{$password}' ";
                $select_from_users= mysqli_query($connection, $query);
                
                if(!$select_from_users)
                {
                    die("Falid Query ". mysqli_error($connection));
                }
                
                while($row = mysqli_fetch_assoc($select_from_users))
                {
                     $diff_user_id = $row['user_id'];
                     $diff_username = $row['username'];
                     $diff_password = $row['user_password'];
                     $diff_firstname = $row['user_firstname'] ;
                     $diff_lastname= $row['user_lastname'] ;
                     $diff_user_role= $row['user_role'] ;
                    
                }
                
                
                if($username === $diff_username && $password === $diff_password )
                {
                
                    $_SESSION['username'] = $diff_username;
                    $_SESSION['firstname'] = $diff_firstname;
                    $_SESSION['lastname'] = $diff_lastname;
                    $_SESSION['user_role'] = $diff_user_role;
                    
                    header("location:../admin");
                     
                }
                 
                else
                {
                    header("location:../index.php"); 
                    
                }
                   
            }


?>
 
                    
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th> 
                                    <th>Image</th>
                                    <th>status</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <Tbody>
                               <?php
                               $query = "SELECT * FROM users ";
                                    $select_all_users = mysqli_query($connection,$query);
                                    
                                    while($row = mysqli_fetch_assoc($select_all_users))
                                    {
                                        $user_id = $row['user_id'];
                                        $username = $row['username'];
                                        $user_password = $row['user_password'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname = $row['user_lastname'];
                                        $user_email = $row['user_email'];
                                        $user_image = $row['user_image'];
                                        $user_role = $row['user_role'];
                                        
                                        ?>
                                <tr>
                                    <th><?php echo $user_id ?></th>
                                    <th><?php echo $username ?></th>
                                    <th><?php echo $user_firstname ?></th>
                                    <th><?php echo $user_lastname ?></th>
                                    <th><?php echo $user_email ?></th>
                                    <th><?php echo $user_role ?></th>
                                    
                                    <th><img width='100' src='../images/<?php echo $user_image; ?>'></th>
                                    
<!--                                    <th>-->
                                    <?php
//                                            $query = "SELECT * FROM users WHERE user_id = {$user_id}";
//                                            $change_user_query = mysqli_query($connection,$query);
//                                            while($row = mysqli_fetch_assoc($change_user_query))
//                                            {
//                                                $user_id = $row['user_id'];   
//                                                $user_role = $row['user_role'];  
//                                                echo $user_role;
//                                            }
                                    ?>
                                    
                                    
<!--                                    </th>-->
                                    
                                    
                                    <!-- <th><?php //echo $post_comment_count ?></th> -->
                                    <th><a href="users.php?monamor=<?php echo $user_id?>">Admin</a>
                                        <div>
                                            <a href="users.php?loveyou=<?php echo $user_id?>">Subscriper</a>
                                        </div>
                                    </th>
                                    <th><a href="users.php?source=edit_users&u_id=<?php echo $user_id?>">Edit</a></th>
                                    <th><a href="users.php?delete=<?php echo $user_id?>">Delete</a></th>
                                </tr>
                                
                              <?php }  ?>
                              <?php
                                    if(isset($_GET['delete']))
                                    {
                                        $user_id = $_GET['delete'];
                                        $query = "DELETE FROM users WHERE user_id = {$user_id}";
                                        $delete_query = mysqli_query($connection,$query);
                                        header("location:users.php");
                                    }
                                    if(isset($_GET['monamor']))
                                    {
                                        $user_id = $_GET['monamor'];
                                        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$user_id}";
                                        $approve_query = mysqli_query($connection, $query);
                                        header("location:users.php");
                                    }
                                    
                                    if(isset($_GET['loveyou']))
                                    {
                                        $user_id = $_GET['loveyou'];
                                        $query = "UPDATE users SET user_role = 'subscriper' WHERE user_id = {$user_id}";
                                        $usb_user_query = mysqli_query($connection, $query);
                                        header("location:users.php");
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
                        
                        
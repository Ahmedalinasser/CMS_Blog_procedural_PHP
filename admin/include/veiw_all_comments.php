                    
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Comments</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date</th> 
                                    <th>In Response To</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th> 
                                    
                                </tr>
                            </thead>
                            <Tbody>
                               <?php
                               $query = "SELECT * FROM comments ";
                                    $select_all_comments = mysqli_query($connection,$query);
                                    
                                    while($row = mysqli_fetch_assoc($select_all_comments))
                                    {
                                        $comment_id = $row['comment_id'];
                                        $comment_post_id = $row['comment_post_id'];
                                        $comment_author = $row['comment_author'];
                                        $comment_email = $row['comment_email'];
                                        $comment_content = $row['comment_content'];
                                        $comment_status = $row['comment_status'];
                                        $comment_date = $row['comment_date'];
                                      
                                        ?>
                                <tr>
                                    <th><?php echo $comment_id ?></th>
                                    <th><?php echo $comment_content ?></th>
                                    
<!--                                    <th>-->
                                   
                                    
                                    
<!--                                    </th>-->
                                    
                                    
                                    <th><?php echo $comment_author ?></th>
                                    <th><?php echo $comment_email ?></th>
                                    
                                    <th><?php echo $comment_status ?></th>
                                    <th><?php echo $comment_date ?></th>
                                    
                                    <?php
                                            
                                            $query2 = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                                            $select_post_title = mysqli_query($connection,$query2);
                                                while($row = mysqli_fetch_assoc($select_post_title))
                                                    {   
                                                        $the_post_id = $row['post_id'];
                                                        $post_title = $row['post_title'];
                                                    
//                                                        echo"<th><a href='../post.php?p_id=$the_post_id'>$post_title title</a>   </th>";
                                                    }   
                                    ?>
                                    
                                        
                                
                                    
                                    
                                    
                                    <th><a href="../post.php?p_id=<?php echo $the_post_id?>"><?php echo $post_title?> </a>   </th>
                                    <th><a href="comments.php?nono=<?php echo $comment_id?>">Approve</a></th>
                                    <th><a href="comments.php?unrooor=<?php echo $comment_id?>">Unapprove</a></th>
                                    <th><a href="comments.php?delete=<?php echo $comment_id?>">Delete</a></th>
                                    
                                </tr>
                                
                              <?php }  ?>
                              <?php
                                    if(isset($_GET['unrooor']))
                                    {
                                        $comment_id = $_GET['unrooor'];
                                        $query = "UPDATE comments SET comment_status = 'Unapprove' WHERE comment_id = {$comment_id}";
                                        $unapprove_query = mysqli_query($connection,$query);
                                        header("location:comments.php");
                                    }
                                
                                    if(isset($_GET['nono']))
                                    {
                                        $comment_id = $_GET['nono'];
                                        $query = "UPDATE comments SET comment_status = 'Approve' WHERE comment_id = {$comment_id}";
                                        $approve_query = mysqli_query($connection,$query);
                                        header("location:comments.php");
                                    }
                                    
                                    if(isset($_GET['delete']))
                                    {
                                        $comment_id = $_GET['delete'];
                                        $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
                                        $delete_query = mysqli_query($connection,$query);
                                        header("location:comments.php");
                                    }
                                
                                
                                ?>
                                
                            </Tbody>
                        </table>
                        
                         
            
                
                
            <div class="col-md-8">

                <?php

                if(isset($_GET['p_id']))
                {
                    $the_post_id = $_GET['p_id'];
                }
                
                
                $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}" ;
                $select_all_from_posts = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_all_from_posts))
                {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                   ?>


                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->


                <h2>
                    <a href=""><?php echo $post_title ?></a>
                </h2>
                <p class="lead">  
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p ><?php echo $post_content ?></p>

                <hr>

            <?php    }?>
              
                    <!-- First Blog Post -->
                    
                    
                    <?php
                
                        if(isset($_POST['create_comment']))
                        {
                            
                            
                            $comment_post_id = $_GET['p_id'];
                            $comment_author = $_POST['author_comment'];
                            $comment_email = $_POST['email_comment'];
                            $comment_content = $_POST['content_comment'];
                            $comment_date = date('d-m-y');
                            $comment_status = "";
                            
                            if(!empty ($comment_author) && !empty($comment_email) && !empty($comment_content))
                            {
                                
                                 $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email,comment_content, comment_status,comment_date) VALUES ($comment_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', '{$comment_status}', now())";

                                $insert_comment_query = mysqli_query($connection, $query);

    //                            Query_Error( $insert_comment_query);
                                if(!$insert_comment_query)
                                {
                                    die("Query FAILED" . mysqli_error($connection));
                                }

                                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                                $query .= "WHERE post_id = $the_post_id";
                                $count_comments_query = mysqli_query($connection, $query);        
                                
                            }
                            else
                            {
                                echo "<script>alert('Fields cannot be empty ')</script>";
                            }
                        }
                
                    ?>
                    
                    
                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    
                    <form  action="" method="post" role="form">
                       
                        <div class="form-group">
                            <label for="">Author Comment</label>
                            <input class="form-control" name="author_comment" type="text">       
                        </div>
                        
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" name="email_comment" type="email">       
                        </div>
                        
                        <div class="form-group">
                            <label for="">Your Comment</label>
                            <textarea class="form-control" name="content_comment" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>

                <hr>
                
                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                    
                
                                
                    $query = "SELECT * FROM comments WHERE  comment_post_id = {$the_post_id}  ";
                    $query .=" AND comment_status = 'Approve' ";
                    $query .=" ORDER BY comment_id DESC";
                    $show_the_comment_query = mysqli_query($connection, $query);
                    while( $row = mysqli_fetch_assoc($show_the_comment_query))
                    {
                        $comment_author = $row['comment_author'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                    
                ?>
                
                
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>

               
               <?php }?>
               
               
               
               
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>
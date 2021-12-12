            <div class="col-md-8">

                <?php


                if(isset($_POST['search']))
                {
                    $search = $_POST['search'];
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $query_select_post_where_tage = mysqli_query($connection, $query);
                    if (!$query_select_post_where_tage)
                    {
                        die( " NOT FOUND ". mysqli_error($connection));

                    }

                    $count = mysqli_num_rows($query_select_post_where_tage);
                    if($count == 0)
                    {   
                        echo "NO RESULT FOUND"
                    }
                    else
                    {   
                           $query = "SELECT * FROM posts" ;
                $select_all_from_posts = mysqli_query($connection , $query);              
                          while($row = mysqli_fetch_assoc($query_select_post_where_tage))
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
                                <a href="#"><?php echo $post_title ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                            <hr>
                            <p ><?php echo $post_content ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>

            <?php 
                }
                }
                }
                
               ?>

              
                    <!-- First Blog Post -->

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
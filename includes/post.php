            <div class="col-md-8">

                <?php
                
                $query = "SELECT * FROM posts";
                $GetAllPosts = mysqli_query($connection, $query);
                $CountPosts = mysqli_num_rows($GetAllPosts);
                $CountPosts = ceil($CountPosts / 3);
                
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                }
                else 
                {
                    $page = "";
                }
                
                
                if($page == "" || $page == 1)
                {
                    $page_1 = 0;
                }
                else 
                {
                    $page_1 = ($page * 3)-3;
                }
                
                $query = "SELECT * FROM posts LIMIT $page_1 ,3" ;
                $select_all_from_posts = mysqli_query($connection , $query);
                while($row = mysqli_fetch_assoc($select_all_from_posts))
                {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,175);
                    $post_status = $row['post_status'];
                    
                     
                    if($post_status == 'published')
                    {
                       
                   ?>
    

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->


                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                
                <a href="post.php?p_id=<?php echo $post_id ?>">
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                </a>
                
                <hr>
                <p ><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php         
                    
                        
                        
                    }}
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
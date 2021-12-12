
<?php include"includes/DP.php"?>
<!-- header -->


                <?php include "includes/header.php"?>


<!-- header -->

<body>

    <!-- Navigation -->

                 <?php include"includes/navigation.php"?>

    <!-- Navigation-->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->



   <div class="col-md-8">

                <?php

               
             if(isset($_POST['search']))
                {
                    $search = $_POST['search'];
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $query_select_post_where_tage = mysqli_query($connection, $query);
                    if (!$query_select_post_where_tage)
                    {
                        die( " NOT FOUND IN DATA BASE " . mysqli_error($connection));

                    }
                    $count = mysqli_num_rows($query_select_post_where_tage);
                    if($count == 0)
                    {
                        echo " NOT FOUND IN DATA BASE ";
                    }

                    else
                    {
                     while($row = mysqli_fetch_assoc($query_select_post_where_tage))
                    {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,175);
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

            <?php    }
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




            <!-- Blog Sidebar Widgets Column -->


                            <?php include "includes/sidebar.php"?>


            <!-- Blog Sidebar Widgets Column -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->


                      <?php include"includes/footer.php"?>


        <!-- Footer -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
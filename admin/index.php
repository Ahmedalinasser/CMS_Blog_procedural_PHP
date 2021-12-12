<!-- Header-->

    <?php include"include/admin_header.php"?>

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
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->
                
                 <?php
                            //////// selecting all post not draft \\\\\\\\

                                    $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                                    $select_all_draft_posts = mysqli_query($connection, $query);
                                    $draft_post_count = mysqli_num_rows($select_all_draft_posts);

                        ////////// END of the selecting Code \\\\\\\\\\


                            ////////// selecting all comments not draft \\\\\\\\

                                    $query = "SELECT * FROM comments WHERE comment_status = 'Unapprove'";
                                    $select_all_unapprove_comments = mysqli_query($connection, $query);
                                    $unapprove_comment_count = mysqli_num_rows($select_all_unapprove_comments);

                             ////////// END of the selecting Code \\\\\\\\\\

                            ////////// selecting all sub users not draft \\\\\\\\

                                    $query = "SELECT * FROM users WHERE user_role = 'subscriper'";
                                    $select_all_subscriper_users = mysqli_query($connection, $query);
                                    $subscriper_users_count = mysqli_num_rows($select_all_subscriper_users);

                             //////// END of the selecting Code \\\\\\\\\\
                ?>
                
               
                
                
                       
                <!-- /.row -->
                
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                                            <?php
                                                $query = "SELECT * FROM posts";
                                                $select_all_posts = mysqli_query($connection, $query);
                                                $post_count = mysqli_num_rows($select_all_posts);
                                            ?>
                            
                          <div class='huge'><?php echo $post_count?></div>
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <a href="posts.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                                            <?php
                                                $query = "SELECT * FROM comments";
                                                $select_all_comments = mysqli_query($connection, $query);
                                                $comment_count = mysqli_num_rows($select_all_comments);
                                            ?>
                                                                        
                             <div class='huge'><?php echo $comment_count?></div>
                              <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <a href="comments.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                                        <?php
                                                $query = "SELECT * FROM users";
                                                $select_all_users = mysqli_query($connection, $query);
                                                $users_count = mysqli_num_rows($select_all_users);
                                            ?>
                            
                            <div class='huge'><?php echo $users_count?></div>
                                <div> Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="users.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                               
                                           <?php
                                                $query = "SELECT * FROM categories";
                                                $select_all_categories = mysqli_query($connection, $query);
                                                $categories_count = mysqli_num_rows($select_all_categories);
                                            ?>
                                            
                                <div class='huge'><?php echo $categories_count?></div>
                                 <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <a href="category.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
                <!-- /.row -->

    <!--       //////// Charts from GOOGLE \\\\\\\\\         -->
           
           
           <div class="row">
               
               
           <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Data', 'count',],
                    
                    <?php 
                    
                    $data_name = ['Post','Draft Posts','Comment','Unapproved comments','User','subscriper Users','Category'];
                    $data_number = [$post_count,$draft_post_count,$comment_count,$unapprove_comment_count,$users_count,$subscriper_users_count,$categories_count];
                    for($x =0 ; $x < 7; $x++)
                    {
                        echo"['{$data_name[$x]}'" . "," . "{$data_number[$x]}],";
                    }
                    
                    
                    ?>

                                
                                
                                
                    
                    
                ]);

                var options = {
                  chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                  }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
              }
            </script>
               
            <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

               
           </div>
           
           
           
    <!--       //////// End of GOOGLE Charts  \\\\\\\\         -->
           
           
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"?>
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
                            <small>Author</small>
                        </h1>

                       <?php
                        
                        if(isset($_GET['source']))
                        {
                            $source = $_GET['source']; 
                        } 
                        else
                           {
                               $source = '';
                           }
                           
                           switch($source)
                           {
                                case 'add_post';
                                include "include/add_post.php";
                                break;
                                case 'edit_post';
                                include "include/edit_post.php";
                                break;
                                
                                default;
                                include "include/veiw_all_comments.php";
                                break;
                           }
                        
                        ?>
                       
                       
                        
                   </div>
                   
                   
                   
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"?>
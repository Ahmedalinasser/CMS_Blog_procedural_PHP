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

                        <div class="col-xs-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for = "cat_title"> Add Catagory</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                            
                        <!-- FORM TO UPDATE CATE  -->
                        
                        <?php
                                    //////// QUERY TO EDIT CATES ////////
                            if(isset($_GET['edit']))
                            {
                                $cat_id = $_GET['edit'];
                                include "include/admin_update_category.php";
                            }
                            
                        ?>
                            
                            
                        <!-- FORM TO UPDATE CATE  -->
                            
                            
                        </div>
                        
                    <!--  form table   -->
                        
                    
                        
                        <div class="col-xs-6">
                           
                           <?php
                            
                                                    //////// Query of ////////        
                                    //////// Inserting Values to Add categories feild ////////
                            
                                            insert_into_category();
                            ?>
                           
                           <!--  TABLE of the FORM     -->
                           
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                        ////////  SELECT & DELETE CATES  ////////

                                                select_and_delet_cates() ;  
                                    
                                    ?>
                                </tbody>
                            </table>
                            
                            
                             <!--  TABLE of the FORM     -->
                        </div>
                            
                   <!--  form table   -->
                        
                   </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"?>
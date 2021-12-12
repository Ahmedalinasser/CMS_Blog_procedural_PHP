
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

                            <?php include"includes/post.php"?>


            <!-- Blog Sidebar Widgets Column -->


                            <?php include "includes/sidebar.php"?>


            <!-- Blog Sidebar Widgets Column -->
        </div>
        <!-- /.row -->

        <hr>
        
        
        <ul class="pager">
                     <?php 
            
            for($i=1; $i<= $CountPosts; $i++)
            {       ?>
           
            <li><a href="index.php?page=<?php echo $i?>"><?php echo $i ?></a></li>
            
            <?php }?>
        </ul>
        
        
        
        

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
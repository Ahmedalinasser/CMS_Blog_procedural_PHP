
            <div class="col-md-4">

               
        <!--  ////////login form//////////            -->
               
               <div class="well">
                    <h4>Blog Search</h4>
                    <form action= "includes/login.php" method= "post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="Enter Password">
                   
                   <span class="input-group-btn">
                            <button name="login" class="btn btn-primary" type="submit">Log In 
                            </button>
                    </span> 
                     
                      
                       
                    </div>
                    
                    </form>
                    <div class="input-group-btn">
                        <a href="registration.php">
                            <button name="register" class="btn btn-primary" type="submit">Sign Up 
                            </button>
                        </a>
                    </div>
                     <div class="input-group-btn">
                        <a href="includes/logout2.php"> 
                             <button name="register" class="btn btn-primary" type="submit">logout 
                             </button>
                         </a>
                    </div>
                </div>
               
               
                <!--      ///////End of login form///////        -->
               
               
                <!-- Blog Search Well -->


                <div class="well">
                    <h4>Blog Search</h4>
                    <form action= "lookfor.php" method= "post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span> </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

               <!-- Blog Categories Well -->

               				<?php 

               				$query = "SELECT * FROM categories ";
							$select_all_cates_query = mysqli_query($connection,$query);

               				?>

                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-l6">
                            <ul class="list-unstyled">
                            	<?php
									
									while($row = mysqli_fetch_assoc($select_all_cates_query))
									{
									
									$cat_id = $row['cat_id'];
									$cat_title = $row['cat_title'];
									echo "<li><a href='category.php?catee=$cat_id'>{$cat_title}</a></li>";
									}

    							?>
                            </ul>
                        </div>




                        <!-- /.col-lg-6 -->
                       
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->

                <?php include "Widget.php"?>
                
                 <!-- Side Widget Well -->


            </div>

            
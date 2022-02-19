<?php include "includes/header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
   <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bunvenit in sectiunea ADMIN
                            <small>Subheading</small>
                        </h1>

                        <div class="col-xs-6">

                     <?php  insert_categories(); ?>


                            <form action="" method = "POST">
                                <label for="cat_title">Add Category</label>
                                <div class="form-group">
                                        
                                <input class= "form-control" type="text" name="cat_title" id="">
                             </div>

                               <div class="form-group">
                                        
                                <input class = "btn btn-primary" type="submit" name="submit" id="" value ="Add Category">
                             </div>
                            </form>

                            <?php  // update and include
                            
                            if (isset($_GET['edit'])) {

                                   $cat_id = $_GET['edit'];

                                   include "includes/update_categories.php";
                            }

                            ?>

                            
                        </div>

                        <div class="col-xs-6">

                            <table class = "table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category title</th>
                                    </tr>
                                </thead>
                                <tbody>

                                 <?php  
                                 // FIND all categories
                                 
                 findAllCategories();                
                             ?>

                   <!-- //delete query -->

           <?php  deleteCategories();?>
           
               
           
                                   
                                    
                                    
                                   
                                </tbody>
                            </table>
                        </div>
                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php" ?>
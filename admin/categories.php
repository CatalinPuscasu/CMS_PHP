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
                            <form action="">
                                <label for="cat_title">Add Category</label>
                                <div class="form-group">
                                        
                                <input class= "form-control" type="text" name="cat_title" id="">
                             </div>

                               <div class="form-group">
                                        
                                <input class = "btn btn-primary" type="submit" name="submit" id="" value = "Add Category">
                             </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php" ?>
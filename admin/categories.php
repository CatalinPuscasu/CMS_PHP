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

                            <?php
                            
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
                                  $query = "SELECT * FROM categories"; // FIND all categories
                                  $select_categories = mysqli_query($connection, $query);
                  
                                 
                                 while ($row = mysqli_fetch_assoc($select_categories))  {

                                     
              $cat_id = $row['cat_id'];
      
              $cat_title = $row['cat_title'];
            echo "<tr>";
             echo " <td>{$cat_id}</td>";
             echo "<td>{$cat_title}</td>";
             echo "<td><a href = 'categories.php?delete={$cat_id}'>Delete</a></td>";
             echo "<td><a href = 'categories.php?edit={$cat_id}'>Edit</a></td>";
             echo "</tr>";


           }    
           ?>

           <?php  //delete query
           
           if (isset($_GET['delete'])) {

             // cand ajunge la GET, putem numi o variabila(cat_id) gen diferit
            $the_cat_id = $_GET['delete'];

            $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";

            $delete_query = mysqli_query($connection, $query);

            header("Location: categories.php");

           }
           
           
           
           ?>
                                   
                                    
                                    
                                   
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
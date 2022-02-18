  <form action="" method = "POST">
                                <label for="cat_title">Update Category</label>

                             <?php   

                             if (isset($_GET['edit']))  {

                                  $category_id = $_GET['edit'];


                                $query = "SELECT * FROM categories WHERE cat_id = $category_id "; // update all categories
                              $select_categories_id = mysqli_query($connection, $query);

                              //am schimbat putin  numele pentru a evita un conflict
                  
                                 
                            while ($row = mysqli_fetch_assoc($select_categories_id))  {
                           
                                     
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            
                           ?>

                             <input value = "<?php if(isset($cat_title)) {echo $cat_title;} ?>" class= "form-control" type="text" name="cat_title" id="">
                           
                             
                    <?php   }}  ?>

                        
                         <?php  // UPDATE
                         
                          if (isset($_POST['update_category'])) {

             // cand ajunge la GET, putem numi o variabila(cat_id) gen diferit
            $the_cat_title = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";

            $update_query = mysqli_query($connection, $query);
                          }
                         
                         ?>   
                              

                             
                
                              
                             
                    

                                <div class="form-group">
                                        
                               
                             </div>

                               <div class="form-group">
                                        
                                <input class = "btn btn-primary" type="submit" name="update_category" id="" value ="Update Category">
                             </div>
                            </form>
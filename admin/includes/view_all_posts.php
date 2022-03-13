    
    <form action="" method="post">
    
    <table class = "table table-bordered table-hover">

    <div id="bulkOptionsContainer" class="col-xs-4">

        <select name="" id="" class="form-control">
          <option value="">Select options</option>
          <option value="">Publish</option>
          <option value="">Draft</option>
          <option value="">Delete</option>
        </select>
    </div>

    <div class="col-xs-4">
      <input type="submit" name="submit" class="btn btn-success" value="Apply">
      <a href="add_post.php" class="btn btn-primary">Add new</a>
    </div>


                             <thead>
                                 <tr>
                                   <th><input type="checkbox" name="" id="selectAllBoxes"></th>
                                     <th>ID</th>
                                     <th>Author</th>
                                     <th>Title</th>
                                     <th>Category</th>
                                     <th>Status</th>
                                     <th>Image</th>
                                     <th>Tags</th>
                                     <th>Comments</th>
                                     <th>Date</th>
                                     <th>Edit</th>
                                     <th>Delete</th>
                                 </tr>
                             </thead>
                             <tbody>
                              
                          <?php  
                          
                          $query = "SELECT * FROM postari"; 
                          $select_posts = mysqli_query($connection, $query);
                  
                                 
                          while ($row = mysqli_fetch_assoc($select_posts))  {

                              
                          $post_id = $row['post_id'];
                          $post_author = $row['post_author'];
                          $post_title = $row['post_title'];                          
                          $post_category_id = $row['post_category_id'];
                          $post_status = $row['post_status'];
                          $post_image = $row['post_image'];
                          $post_tags = $row['post_tags'];
                          $post_comment_count = $row['post_comment_count'];
                          $post_date = $row['post_date'];


                          echo "<tr>";

                          ?>
                          <td><input type='checkbox' name='checkBoxArray[]' class='checkBoxes' value='<?php echo $post_id; ?>'></td>

                          <!-- doar prin array putem trimite datele din postarile alese cu checkbox, prin POST -->

                          <?php
                          echo "<td>{$post_id}</td>"; 
                          echo "<td>{$post_author}</td>"; 
                          echo "<td>{$post_title}</td>"; 

                              $query = "SELECT * FROM categorii WHERE cat_id = {$post_category_id} "; //relational
                              $select_categories_id = mysqli_query($connection, $query);

                              //am schimbat putin  numele pentru a evita un conflict
                  
                                 
                            while ($row = mysqli_fetch_assoc($select_categories_id))  {
                           
                                     
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            


                          
                                  }

                          echo "<td>{$cat_title}</td>"; 



                          echo "<td>{$post_status}</td>"; 
                          echo "<td><img width = '100' src='../images/{$post_image}'></td>"; 
                          echo "<td>{$post_tags}</td>"; 
                          echo "<td>{$post_comment_count}</td>"; 
                          echo "<td>{$post_date}</td>"; 
                          echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>EDIT</a></td>";
                          echo "<td><a href='posts.php?delete={$post_id}'>DELETE</a></td>"; 
                          echo "</tr>";
                          }
                          
                          ?>

                             
                             </tbody>
                         </table>

                         </form>

                         <?php   
                         
                         if (isset($_GET['delete']))  {
                              
                           header("Location : posts.php"); // ca sa nu mai apas de 2 ori ca sa sterg cv

                           $the_post_id = $_GET['delete'];

                           $query = "DELETE FROM postari WHERE post_id = {$the_post_id} ";
                           $delete_query = mysqli_query($connection, $query);

                         }  
                         
                         
                         
                         
                         
                         ?>
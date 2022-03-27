<?php  

if(isset($_POST['checkBoxArray'])) {

    foreach($_POST['checkBoxArray'] as $postValueId)  {

         $bulkOptions = $_POST['bulk_options'];

         switch ($bulkOptions) {

         case 'published':

          $query ="UPDATE postari SET post_status = '{$bulkOptions}' WHERE post_id = {$postValueId} ";
          $update_to_published = mysqli_query($connection, $query);

          break;

          case 'draft':

          $query ="UPDATE postari SET post_status = '{$bulkOptions}' WHERE post_id = {$postValueId} ";
          $update_to_draft = mysqli_query($connection, $query);

          break;

          case 'delete':

          $query ="DELETE FROM postari WHERE post_id = {$postValueId} ";
          $update_to_delete = mysqli_query($connection, $query);

          break;

          case 'clone':

             $query = "SELECT * FROM postari WHERE post_id = '{$postValueId}' "; 
                          $select_posts_query = mysqli_query($connection, $query);
                  
                                 
                          while ($row = mysqli_fetch_assoc($select_posts_query))  {

                              
                          $post_id = $row['post_id'];
                          $post_author = $row['post_author'];
                          $post_title = $row['post_title'];                          
                          $post_category_id = $row['post_category_id'];
                          $post_status = $row['post_status'];
                          $post_image = $row['post_image'];
                          $post_tags = $row['post_tags'];
                          $post_date = $row['post_date'];
                          $post_content = $row['post_content'];
                          }
        
          $query = "INSERT INTO postari(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";

   $query.= "VALUES ('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' ) ";
          
          $copy_query = mysqli_query($connection, $query);

          break;

         }

         

    }


}


?>    


    <form action="" method="post">
    
    <table class = "table table-bordered table-hover">

    <div id="bulkOptionsContainer" class="col-xs-4">

        <select name="bulk_options" id="" class="form-control">
          <option value="">Select options</option>
          <option value="published">Publish</option>
          <option value="draft">Draft</option>
          <option value="delete">Delete</option>
          <option value="clone">Clone</option>
        </select>
    </div>

    <div class="col-xs-4">
      <input type="submit" name="submit" class="btn btn-success" value="Apply">
      <a href="posts.php?source=add_post" class="btn btn-primary">Add new</a>
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
                                     <th>View post</th>
                                     <th>Edit</th>
                                     <th>Delete</th>
                                     <th>Post views</th>
                                 </tr>
                             </thead>
                             <tbody>
                              
                          <?php  
                          
                          $query = "SELECT * FROM postari ORDER BY post_id DESC"; 
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
                          $post_view_count = $row['post_view_count'];


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

                          $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                          $send_query_count = mysqli_query($connection, $query);
                          $row = mysqli_fetch_array($send_query_count);
                          $comment_id = $row['comment_id'];
                          $count_comments = mysqli_num_rows($send_query_count);


                          echo "<td><a href='post_comments.php?id=$post_id'>{$count_comments}</a></td>"; 


                          echo "<td>{$post_date}</td>"; 
                          echo "<td><a href='../post.php?p_id={$post_id}'>VIEW POST</a></td>";
                          echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>EDIT</a></td>";
                          echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$post_id}'>DELETE</a></td>"; 
                          echo "<td><a href='posts.php?reset={$post_id}'>{$post_view_count}</a></td>";
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

                         if (isset($_GET['reset']))  {
                              
                           header("Location : posts.php"); // ca sa nu mai apas de 2 ori ca sa sterg cv

                           $the_post_id = $_GET['reset'];

                           $reset_views_query = "UPDATE postari SET post_view_count = 0 WHERE post_id = {$the_post_id} ";
                           $reset_query = mysqli_query($connection, $reset_views_query);

                         } 
                         
                         
                         
                         
                         
                         ?>
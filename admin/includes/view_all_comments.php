      <table class = "table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th>ID</th>
                                     <th>Author</th>
                                     <th>Comment</th>
                                     <th>Email</th>
                                     <th>Status</th>
                                     <th>In response to</th>
                                     <th>Date</th>
                                     <th>Approve</th>
                                     <th>Unapprove</th>
                                     <th>Delete</th>
                                 </tr>
                             </thead>
                             <tbody>
                              
                          <?php  
                          
                          $query = "SELECT * FROM comments"; 
                          $select_comments = mysqli_query($connection, $query);
                  
                                 
                          while ($row = mysqli_fetch_assoc($select_comments))  {

                              
                          $comment_id = $row['comment_id'];
                          $comment_author = $row['comment_author'];
                          $comment_email = $row['comment_email'];                          
                          $comment_post_id = $row['comment_post_id'];
                          $comment_status = $row['comment_status'];
                          $comment_content = $row['comment_content'];
                          $comment_date = $row['comment_date'];
                          


                          echo "<tr>";
                          echo "<td>{$comment_id}</td>"; 
                          echo "<td>{$comment_author}</td>"; 
                          echo "<td>{$comment_content}</td>"; 

                        //       $query = "SELECT * FROM categorii WHERE cat_id = {$post_category_id} "; //relational
                        //       $select_categories_id = mysqli_query($connection, $query);

                        //       //am schimbat putin  numele pentru a evita un conflict
                  
                                 
                        //     while ($row = mysqli_fetch_assoc($select_categories_id))  {
                           
                                     
                        //     $cat_id = $row['cat_id'];
                        //     $cat_title = $row['cat_title'];
                            


                          
                        //           }

                        //   echo "<td>{$cat_title}</td>"; 



                          echo "<td>{$comment_email}</td>"; 
                          echo "<td>{$comment_status}</td>"; 

                         $query = "SELECT * FROM postari WHERE post_id = $comment_post_id ";  // relational db
                         $select_post_id_query = mysqli_query($connection, $query);
                         while($row = mysqli_fetch_assoc($select_post_id_query)) {
                          
                          $post_id = $row['post_id'];
                          $post_title = $row['post_title'];

                          echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a> </td>"; 

                         }

                          echo "<td>Comment post ID</td>"; 



                          echo "<td>{$comment_date}</td>"; 
                          echo "<td><a href='posts.php?source=edit_post&p_id='>APPROVE</a></td>";
                          echo "<td><a href='posts.php?delete='>UNAPPROVE</a></td>"; 
                          echo "<td><a href='posts.php?delete='>DELETE</a></td>"; 
                          echo "</tr>";
                          }
                          
                          ?>

                             
                             </tbody>
                         </table>

                         <?php   
                         
                         if (isset($_GET['delete']))  {
                              
                            ob_start(); // ca sa nu mai apas de 2 ori ca sa sterg cv

                           $the_post_id = $_GET['delete'];

                           $query = "DELETE FROM postari WHERE post_id = {$the_post_id} ";
                           $delete_query = mysqli_query($connection, $query);

                         }  
                         
                         
                         
                         
                         
                         ?>
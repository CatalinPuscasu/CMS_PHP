      <table class = "table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th>ID</th>
                                     <th>Username</th>
                                     <th>FirstName</th>
                                     <th>LastName</th>
                                     <th>Email</th>
                                     <th>Role</th>
                                 </tr>
                             </thead>
                             <tbody>
                              
                          <?php  
                          
                          $query = "SELECT * FROM users"; 
                          $select_users = mysqli_query($connection, $query);
                  
                                 
                          while ($row = mysqli_fetch_assoc($select_users))  {

                              
                          $user_id = $row['user_id'];
                          $username = $row['username'];
                          $user_email = $row['user_email'];                          
                          $user_password = $row['user_password'];
                          $user_firstname = $row['user_first_name'];
                          $user_lastname = $row['user_last_name'];
                          $user_image = $row['user_image'];
                          $user_role = $row['user_role'];
                          


                          echo "<tr>";
                          echo "<td>{$user_id}</td>"; 
                          echo "<td>{$username}</td>"; 
                          echo "<td>{$user_firstname}</td>"; 

                        //       $query = "SELECT * FROM categorii WHERE cat_id = {$post_category_id} "; //relational
                        //       $select_categories_id = mysqli_query($connection, $query);

                        //       //am schimbat putin  numele pentru a evita un conflict
                  
                                 
                        //     while ($row = mysqli_fetch_assoc($select_categories_id))  {
                           
                                     
                        //     $cat_id = $row['cat_id'];
                        //     $cat_title = $row['cat_title'];
                            


                          
                        //           }

                        //   echo "<td>{$cat_title}</td>"; 



                          echo "<td>{$user_lastname}</td>"; 
                          echo "<td>{$user_email}</td>"; 

                        //  $query = "SELECT * FROM postari WHERE post_id = $comment_post_id ";  // relational db
                        //  $select_post_id_query = mysqli_query($connection, $query);
                        //  while($row = mysqli_fetch_assoc($select_post_id_query)) {
                          
                        //   $post_id = $row['post_id'];
                        //   $post_title = $row['post_title'];

                        //   echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a> </td>"; 

                        //  }




                          echo "<td>{$user_role}</td>"; 
                          echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                          echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>"; 
                          echo "<td><a href='users.php?delete={$user_id}'>DELETE</a></td>"; 
                          echo "</tr>";
                          }
                          
                          ?>

                             
                             </tbody>
                         </table>

                         <?php 

                         //----------- ADMIN ----------------------------------------------------

                         if (isset($_GET['change_to_admin']))  {
                              

                           $the_admin_id = $_GET['change_to_admin'];

                           $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_admin_id ";
                           $admin_query = mysqli_query($connection, $query);

                            header("Location: users.php"); // ca sa nu mai apas de 2 ori ca sa sterg cv

                            


                         }  

                         //------SUBSCRIBER----------------------------------------------------------------
                         
                          if (isset($_GET['change_to_sub']))  {
                              

                           $the_subscriber_id = $_GET['change_to_sub'];

                           $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_subscriber_id ";
                           $subscriber_query = mysqli_query($connection, $query);

                            header("Location: users.php"); // ca sa nu mai apas de 2 ori ca sa sterg cv

                            


                         }  

                        //-------------------------------------------------------------------------------------------

                        //DELETE
                         
                         if (isset($_GET['delete']))  {

                          if (isset($_SESSION['role'])) {  // to imporve security

                              if ($_SESSION['role'] == 'admin') {  // to prevent URL myswl injection
                         
                              

                           $the_user_id =mysqli_real_escape_string($connection,  $_GET['delete']);

                           $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
                           $delete_user_query = mysqli_query($connection, $query);

                            header("Location: users.php"); // ca sa nu mai apas de 2 ori ca sa sterg cv

                            }

                        }


                 }  
                         
                         
                         
                         
                         
                         ?>
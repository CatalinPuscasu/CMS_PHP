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
                            Bunvenit in sectiunea COMMENTS
                            <small>Subheading</small>
                        </h1>
    
    
    <table class = "table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th>ID</th>
                                     <th>Author</th>
                                     <th>Comment</th>
                                     <th>Email</th>
                                     <th>Status</th>
                                     <th>Date</th>
                                     <th>Approve</th>
                                     <th>Unapprove</th>
                                     <th>Delete</th>
                                 </tr>
                             </thead>
                             <tbody>
                              
                          <?php  

                          if (isset($_GET['id'])) {

                            $post_id = $_GET['id'];
                          }
                          
                          $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
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

                        



                          echo "<td>{$comment_date}</td>"; 
                          echo "<td><a href='post_comments.php?approve=$comment_id'>APPROVE</a></td>";
                          echo "<td><a href='post_comments.php?unapprove=$comment_id'>UNAPPROVE</a></td>"; 
                          echo "<td><a href='post_comments.php?delete=$comment_id'>DELETE</a></td>"; 
                          echo "</tr>";
                          }
                          
                          ?>

                             
                             </tbody>
                         </table>

                         <?php 

                         //----------- APPROVE ----------------------------------------------------

                         if (isset($_GET['approve']))  {
                              

                           $the_comment_id = $_GET['approve'];

                           $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
                           $approve_query = mysqli_query($connection, $query);

                            header("Location: comments.php"); // ca sa nu mai apas de 2 ori ca sa sterg cv

                            


                         }  

                         //------UNAPPROVE----------------------------------------------------------------
                         
                          if (isset($_GET['unapprove']))  {
                              

                           $the_comment_id = $_GET['unapprove'];

                           $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
                           $unapprove_query = mysqli_query($connection, $query);

                            header("Location: comments.php"); // ca sa nu mai apas de 2 ori ca sa sterg cv

                            


                         }  

                        //-------------------------------------------------------------------------------------------

                        //DELETE
                         
                         if (isset($_GET['delete']))  {
                              

                           $the_comment_id = $_GET['delete'];

                           $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
                           $delete_query = mysqli_query($connection, $query);

                            header("Location: post_comments.php"); // ca sa nu mai apas de 2 ori ca sa sterg cv


                         }  
 
                         
                         ?>

                          </div>
            </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php" ?>
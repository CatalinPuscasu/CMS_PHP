<?php include 'includes/header.php' ?>
<?php include 'includes/db.php' ?>

    <!-- Navigation -->
 <?php  include 'includes/navigation.php' ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php  

            if (isset($_GET['p_id'])) {


                $the_post_id = $_GET['p_id'];
                $the_post_author = $_GET['author'];
            }
            
            $query = "SELECT * FROM postari WHERE post_user = '{$the_post_author}' ";  // asta e ca sa ne vina doar posatrea la care am dat click pe titlu

            $select_all_posts_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_posts_query))  {
      
              $post_title = $row['post_title'];
              $post_author = $row['post_user'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = $row['post_content'];
            

                       ?>

                       <!-- // facem asta ca sa repetam continutul -->


       <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    All posts by <?php echo $post_author ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
              

                <hr>



 <?php   } ?>

         
                  <!-- Blog Comments -->

                 <?php 
                 
                 if (isset($_POST['create_comment'])) {

                     $the_post_id = $_GET['p_id'];

                 $comment_author = $_POST['comment_author'];
                 $comment_email = $_POST['comment_email'];
                 $comment_content = $_POST['comment_content'];

                    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ) {

                               $query = "INSERT INTO comments(comment_post_id, comment_author, comment_content, comment_email, comment_status, comment_date) ";
                 $query.="VALUES ($the_post_id, '{$comment_author}', '{$comment_content}', '{$comment_email}', 'unapproved', now()) ";

                 $comment_query = mysqli_query($connection, $query);

                 $comment_count_query = "UPDATE postari SET post_comment_count = post_comment_count + 1 ";
                 $comment_count_query.= "WHERE post_id = $the_post_id ";

                 $update_count = mysqli_query($connection, $comment_count_query);


                 } else {

                    echo "<script>alert('Fields cannot be empty!')</script>";
                 }

                        
                    }

                

          
                 
                 
                 
                 
                 ?>




              
        

      
        

            </div>

            <!-- Blog Sidebar Widgets Column -->
     
   <?php  include 'includes/sidebar.php'  ?>



        </div>
        <!-- /.row -->

        <hr>

  <?php include 'includes/footer.php'  ?>
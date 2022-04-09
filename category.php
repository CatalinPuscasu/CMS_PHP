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
            
            if (isset($_GET['category']))  {

               $the_post_category = $_GET['category'];

            
            $query = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM postari WHERE post_category_id = ? AND post_status = ? ");

            $published = 'published';

            //unele prepare statement snu iau strings, deci trebuie create variabile

            if (isset($query)) {

              mysqli_stmt_bind_param($query, "is", $the_post_category, $published);

              mysqli_stmt_execute($query);

              mysqli_stmt_bind_result($query, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);

              // acum postare respectiva nu se mai vede.... trebuie sa revad asta
            }

            if (mysqli_stmt_num_rows($query)) {
           

              echo "<h1>No categories</h1>";
                 

            

            while (mysqli_fetch_assoc($select_all_posts_query))  {
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = substr($row['post_content'], 0, 100);

            

                       ?>

                       <!-- // facem asta ca sa repetam continutul -->


       <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>



 <?php   } } } else {

     header("Location: index.php");
     
 } ?>

         

        

            </div>

            <!-- Blog Sidebar Widgets Column -->
     
   <?php  include 'includes/sidebar.php'  ?>



        </div>
        <!-- /.row -->

        <hr>

  <?php include 'includes/footer.php'  ?>
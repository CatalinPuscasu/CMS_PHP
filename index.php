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

            if (isset($_GET['page'])) {

                 $page = $_GET['page'];

            } else {

                $page = '';
            }
            

            if ($page == '' || $page ==1) {

              $page_1 = 0;

            } else {
 
              $page_1 = ($page * 5) - 5;
           
            }

            $post_query_count = "SELECT * FROM postari WHERE post_status = 'published' ";
            $find_count = mysqli_query($connection, $post_query_count);
            $count= mysqli_num_rows($find_count);

            if ($count < 1) {

              echo "<h1>No posts</h1>";
            } 

            $count= ceil($count / 5);

            
            $query = "SELECT * FROM postari LIMIT $page_1, 5";

            $select_all_posts_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_posts_query))  {
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_user'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = substr($row['post_content'], 0, 100);
              $post_status = $row['post_status'];

              if ($post_status !== 'published') {

                //   echo "<h1 class ='text-center'>This post is not published! </h1>";

              }  else {



              
            

                       ?>

                       <!-- // facem asta ca sa repetam continutul -->


       <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post/<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <br>
                <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary">Read more</a>
              

                <hr>



 <?php   } } ?>

         

        

            </div>

            <!-- Blog Sidebar Widgets Column -->
     
   <?php  include 'includes/sidebar.php'  ?>



        </div>
        <!-- /.row -->


        <ul class="pager">
           <?php 
           
        for ($i=1; $i <= $count; $i++) {

            if ($i == $page) {

         echo "<li><a class='active_link' href='index.php?page={$i}'> $i </a></li>";

            } else {

           
         echo "<li><a href='index.php?page={$i}'> $i </a></li>";

            }


        }
   
           
           ?>
        </ul>

        <hr>

  <?php include 'includes/footer.php'  ?>
<?php include "includes/header.php" ?>

    <div id="wrapper">

    <?php 
  
       usersOnline();
    ?>



        <!-- Navigation -->
   <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bunvenit in sectiunea ADMIN
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    
                    </div>
                </div>
                <!-- /.row -->



                
       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                     <div class="huge"><?php echo $post_counts = recordCount('postari'); ?></div>

                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <div class="huge"><?php echo $comment_counts = recordCount('comments'); ?></div>

                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                     <div class="huge"><?php echo $user_counts = recordCount('users'); ?></div>
           
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                     <div class="huge"><?php echo $categories_counts = recordCount('categorii'); ?></div>

                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

   <?php   

  
   $published_post_counts = checkStatus('postari', 'post_status', 'published');
   
   $draft_post_counts = checkStatus('postari', 'post_status', 'draft');

   $unapproved_comments_counts = checkStatus('comments', 'comment_status', 'unapproved');

    $subscribers_counts = checkUserRole('users', 'user_role', 'subscriber');
   
   
   
   
   
   ?>




                <div class="row">

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

        <?php  
        
        $element_text = ['All Posts' ,'Active Posts', 'Draft Posts', 'Comments', 'Unapproved comments' , 'Users', 'Subscribers' , 'Categories'];
        $element_count = [$post_counts, $published_post_counts , $draft_post_counts , $comment_counts, $unapproved_comments_counts , $user_counts, $subscribers_counts , $category_counts];

        for ($i = 0; $i < 8; $i++)  {

          echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";


        }

        
        ?>



        //   ['Posts', 1000],
    
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>


                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php" ?>

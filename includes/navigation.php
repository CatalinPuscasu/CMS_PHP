   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">


            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index">CMS HOMEPAGE</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
        
           <?php   
           
           $query = "SELECT * FROM categorii";
           $select_all_categories_query = mysqli_query($connection, $query);
           
           while ($row = mysqli_fetch_assoc($select_all_categories_query))  {
      
              $cat_title = $row['cat_title'];
              $cat_id = $row['cat_id'];

              $category_class = '';

              $registration_class = '';
              $registration = "registration.php";

              $pageName = basename($_SERVER['PHP_SELF']);
              //ca sa stim pe ce pg suntem

              if (isset($_GET['category']) && $_GET['category'] == $cat_id) {

                $category_class = 'active';
                //clasa Bootstrap

              } elseif ($pageName == $registration) {
                           

                $registration_class = 'active';
              }

             echo "<li class='{$category_class}'> <a href='/CMS_PHP/category/{$cat_id}'>{$cat_title}</a></li>";


           }
           
           ?>


                    <li>
                        <a href="/CMS_PHP/admin">Admin</a>
                    </li>

                     <li>
                        <a href="/CMS_PHP/login.php">Login</a>
                    </li>

                      <li class='<?php echo $registration_class; ?>'>
                        <a href="/CMS_PHP/registration">Registration</a>
                    </li>
                      <li>
                        <a href="/CMS_PHP/contact">Contact</a>
                    </li>


                    <?php 
                    
                    if (isset($_SESSION['username'])) {


                        if (isset($_GET['p_id'])) {

                            $the_post_id = $_GET['p_id'];
                                

                              echo "<li><a href='/CMS_PHP/admin/posts.php?source=edit_post&p_id={$the_post_id}'> Edit post </a></li>";

                        }


                    }
                    
                    
                    ?>
              


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
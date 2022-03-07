<?php include "includes/header.php" ?>

<?php 

if(isset($_SESSION['username'])) {

  $username =  $_SESSION['username'];

  $query = "SELECT * FROM users WHERE username = '{$username}' ";

  $select_user_profile = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_array($select_user_profile)) {

                          $user_id = $row['user_id'];
                          $username = $row['username'];
                          $user_email = $row['user_email'];                          
                          $user_password = $row['user_password'];
                          $user_firstname = $row['user_first_name'];
                          $user_lastname = $row['user_last_name'];
                          $user_image = $row['user_image'];
                          $user_role = $row['user_role'];

  }

}



?>

    <div id="wrapper">

        <!-- Navigation -->
   <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                      <h1 class="page-header">
                            Bunvenit in sectiunea ADMIN
                            <small><?php echo $username; ?></small>
                        </h1>

              <form action="" method = "POST" enctype= "multipart/form-data">

    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" name="user_firstname" value="<?php echo $user_firstname ?>" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="author">Lastname</label>
        <input type="text" name="user_lastname" value="<?php echo $user_lastname?>" id="" class = "form-control">
    </div>


   <div class="form-group">
       <select name="user_role" id="">

           <option value="subscriber"><?php echo $user_role;  ?></option>


       <?php  
       
       if ($user_role == 'admin') {

         echo  "<option value='subscriber'>subscriber</option>";
      }  else {

        echo   "<option value='admin'>admin</option>";

      }
       
       
       ?>
       </select>
   </div>

     <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" id="" class = "form-control">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" name="username" value="<?php echo $username ?>" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" name="user_email" value="<?php echo $user_email ?>" id="" class = "form-control">
    </div>

     <div class="form-group">
        <label for="status">Password</label>
        <input type="password" name="user_password" value="<?php echo $user_password ?>" id="" class = "form-control">
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" value="Edit profile" name = "edit_profile">
    </div>

</form>
                 
                </div>
            </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php" ?>
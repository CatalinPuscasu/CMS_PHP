<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php include "./admin/functions.php"; ?>

<?php  

if (isset($_POST['submit'])) {

 $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  $error = [
    'username' => '',
    'email'=> '',
    'password'=> ''
  ];


  if (strlen($username) < 4) {

    $error['username'] = 'username needs to be longer';
  }

  if (strlen($username) == '') {

    $error['username'] = 'username cannot be empty';
  }

  if (usernameExists($username)) {

    $error['username'] = 'username already exists';
  }

 if (strlen($email) == '') {

    $error['email'] = 'email cannot be empty';
  }

  if (emailExists($email)) {

    $error['email'] = 'email already exists, you can log in : <a href="index.php">log in </a>';
  }


  if (strlen($password) == '') {

    $error['$password'] = '$password cannot be empty';
  }

  foreach($error as $key => $value) {

       if (empty($value)) {

        unset($error['$key']);
       }
  }

  if (empty($error)) {
  
        registerUser($username, $email, $password);

    
  }

  if (!registerUser($username, $email, $password)) {

    echo  mysqli_error($connection);
  }


}


?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($username) ? $username : '' ?>">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>">
                            <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>

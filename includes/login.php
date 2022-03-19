<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 

if (isset($_POST['login'])) {
   
   $username = $_POST['username'];
   $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user_query = mysqli_query($connection, $query);


  while ($row = mysqli_fetch_array($select_user_query))  {

        $db_id = $row['user_id'];
        $db_username = $row['username'];
        $db_password = $row['user_password'];
        $db_firstname = $row['user_first_name'];
        $db_lastname = $row['user_last_name'];
        $db_role = $row['user_role'];
  }

// $password = crypt($password, $db_password);

//convertim parola criptata inapoi la aia normala

//nu-mi iese ca parola nu e criptata bine, apare la toti *0


 if($username === $db_username && $password === $db_password) {

   $_SESSION['username'] = $db_username;
   $_SESSION['firstname'] = $db_firstname;
   $_SESSION['lastname'] = $db_lastname;
   $_SESSION['role'] = $db_role;
   //asociez username-ul cu o sesiune


    header("Location: ../admin/index.php");
    

 }    else {

    header("Location: ../index.php");
   

 }


}


?>
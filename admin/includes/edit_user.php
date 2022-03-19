<?php   

if (isset($_GET['edit_user'])) {

      $the_user_id = $_GET['edit_user'];

      //ca sa luam doar datele unui user specific

                          $query = "SELECT * FROM users WHERE user_id = $the_user_id "; 
                          $select_users_query = mysqli_query($connection, $query);

               
                          while ($row = mysqli_fetch_assoc($select_users_query))  {

                              
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

if(isset($_POST['edit_user']))  {

   
   $user_firstname = $_POST['user_firstname'];
   $user_lastname = $_POST['user_lastname'];
   $user_role = $_POST['user_role'];

//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];

   $username = $_POST['username'];
   $user_email = $_POST['user_email'];
   $user_password = $_POST['user_password'];
//    $post_date = date('d-m-y');
//    $post_comment_count = 4;

//    move_uploaded_file($post_image_temp, "../images/$post_image");
// ca sa plece img din temp in folderul destinatie

   $query = "SELECT randSalt FROM users";
   $select_randSalt_query = mysqli_query($connection, $query);

   $row = mysqli_fetch_array($select_randSalt_query);
   $salt = $row['randSalt'];
   $hashed_password = crypt($user_password, $salt);


       $query = "UPDATE users SET ";
                          $query.="user_first_name = '{$user_firstname}', ";
                          $query.="user_last_name = '{$user_lastname}', ";
                          $query.="user_role = '{$user_role}', ";
                          $query.="username = '{$username}', ";
                          $query.="user_email = '{$user_email}', ";
                          $query.="user_password = '{$hashed_password}' ";
                          $query.=" WHERE user_id = {$the_user_id} ";

                          $edit_user_query = mysqli_query($connection, $query);

  


}



?>



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
        <input class = "btn btn-primary" type="submit" value="Edit user" name = "edit_user">
    </div>

</form>
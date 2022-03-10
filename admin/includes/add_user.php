<?php   

if(isset($_POST['create_user']))  {

   
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

   $query = "INSERT INTO users(user_first_name, user_last_name, user_role, username, user_email, user_password) ";

   $query.= "VALUES ( '{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}' ) ";

// uitasem sa creez conexiune, sa trimit efectiv cererea
   $create_user_query = mysqli_query($connection, $query);

  confirmQuery ($create_user_query);

  echo "User has been created!" . "  " . "<a href='users.php'>View user</a>";


}



?>



<form action="" method = "POST" enctype= "multipart/form-data">

    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" name="user_firstname" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="author">Lastname</label>
        <input type="text" name="user_lastname" id="" class = "form-control">
    </div>


   <div class="form-group">
       <select name="user_role" id="">
           <option value="subscriber">Select options</option>
           <option value="admin">Admin</option>
           <option value="subscriber">Subscriber</option>
       </select>
   </div>

     <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" id="" class = "form-control">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" name="username" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" name="user_email" id="" class = "form-control">
    </div>

     <div class="form-group">
        <label for="status">Password</label>
        <input type="password" name="user_password" id="" class = "form-control">
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" value="Add user" name = "create_user">
    </div>

</form>
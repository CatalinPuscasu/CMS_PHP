<?php 

function usersOnline () {

  global $connection;

 $session = session_id();
    $time = time();
    $time_out_in_seconds = 60;
    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session = '$session' ";
    $session_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($session_query);

    if ($count == NULL) {

        mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");

    } else {

        mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session' ");
    }

    $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out' ");

  return  $count_user = mysqli_num_rows($users_online_query);


}

function confirmQuery ($result)  {

  global $connection;
    
    if (!$result) {

      die("QUERY FAILED!" . mysqli_error($connection));

    }

}

function insert_categories () {

    global $connection;

        if (isset($_POST['submit'])) {

                     $cat_title =  $_POST['cat_title'];

                     if ($cat_title == "" || empty($cat_title)) {


                         echo "This field must not be empty";
                     }  else {

                        $query = "INSERT INTO categorii(cat_title) ";
                        $query .= "VALUE('{$cat_title}') ";

                        $create_category_query = mysqli_query($connection, $query);

                        if (!$create_category_query) {

                           die('QUERY FAILED' . mysqli_error($connection));

                        }
                     }

                     }
}

function findAllCategories () {

    global $connection;

     $query = "SELECT * FROM categorii"; 
                                  $select_categories = mysqli_query($connection, $query);
                  
                                 
                                 while ($row = mysqli_fetch_assoc($select_categories))  {

                                     
              $cat_id = $row['cat_id'];
      
              $cat_title = $row['cat_title'];
            echo "<tr>";
             echo " <td>{$cat_id}</td>";
             echo "<td>{$cat_title}</td>";
             echo "<td><a href = 'categories.php?delete={$cat_id}'>Delete</a></td>";
             echo "<td><a href = 'categories.php?edit={$cat_id}'>Edit</a></td>";
             echo "</tr>";


           }    



}


function deleteCategories() {

    global $connection;

      if (isset($_GET['delete'])) {

             // cand ajunge la GET, putem numi o variabila(cat_id) gen diferit
            $the_cat_id = $_GET['delete'];

            $query = "DELETE FROM categorii WHERE cat_id = {$the_cat_id} ";

            $delete_query = mysqli_query($connection, $query);

            header("Location: categories.php");

           }

}

// refactoring, for the display data queries

function recordCount ($table) {

  global $connection;

     $query = "SELECT * FROM " . $table;
     $display_posts_number = mysqli_query($connection, $query);

    $result = mysqli_num_rows($display_posts_number);

    return $result;
}

function checkStatus($table, $column, $status) {

  global $connection;

    $query = "SELECT * FROM $table WHERE $column = '$status' ";

    $result = mysqli_query($connection, $query);

    return mysqli_num_rows($result);

}

function checkUserRole ($table, $column, $role) {

  global $connection;

    $query = "SELECT * FROM $table WHERE $column = '$role' ";
    $display_subcribers = mysqli_query($connection, $query);
    return  mysqli_num_rows($display_subcribers);
   

}


function is_admin($username = '') {


  global $connection;

  $query = "SELECT user_role FROM users WHERE username = '$username' ";

  $result = mysqli_query($connection, $query);

 $row = mysqli_fetch_array($result);

 if ($row=['user_role'] == 'admin') {

   return true;

 }  else {

  return false;
 }

}

function usernameExists($username) {

  global $connection;

  $query = "SELECT username FROM users WHERE username = '$username' ";

  $result = mysqli_query($connection, $query);

 $row = mysqli_fetch_array($result);
 
 if (mysqli_num_rows($result) > 0) {

    return true;

 } else {

   return false;

 }

}



?>
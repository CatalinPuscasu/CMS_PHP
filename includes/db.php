<?php   

// $db ['db_host'] = 'localhost';
// $db ['db_user'] = 'root'; 
// $db ['db_pass'] = ''; 
// $db ['db_name'] = 'cms'; 

// //putem crea constante, pentru securitate

// foreach($db as $key => $value) {

//   define(strtoupper($key), $value);
// }



$connection = mysqli_connect('localhost', 'root', '', 'cms', 4306);
 
// if ($connection)  {

// echo 'we are connected';

// }  else {


//     die("cv" . mysqli_error($connection));
// }



?>
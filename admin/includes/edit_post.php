<?php  

if (isset($_GET['p_id']))  {

  $the_get_post_id = $_GET['p_id'];


}

$query = "SELECT * FROM postari WHERE post_id = $the_get_post_id "; 
                          $select_posts_by_id = mysqli_query($connection, $query);
                  
                                 
                          while ($row = mysqli_fetch_assoc($select_posts_by_id))  {

                              
                          $post_id = $row['post_id'];
                          $post_author = $row['post_author'];
                          $post_title = $row['post_title'];                          
                          $post_category_id = $row['post_category_id'];
                          $post_status = $row['post_status'];
                          $post_image = $row['post_image'];
                          $post_tags = $row['post_tags'];
                          $post_content = $row['post_content'];
                          $post_comment_count = $row['post_comment_count'];
                          $post_date = $row['post_date'];

                          }

                          if (isset($_POST['update_post'])) {

                          $post_author = $_POST['post_author'];
                          $post_title = $_POST['post_title'];
                          $post_category_id = $_POST['post_category'];
                          $post_status = $_POST['post_status'];
                          $post_image = $_FILES['image']['name'];
                          $post_image_temp = $_FILES['image']['tmp_name'];
                          $post_content = $_POST['post_content'];
                          $post_tags = $_POST['post_tags'];

                          move_uploaded_file($post_image_temp, "../images/$post_image");

                          // ca imaginea sa fie prezenta, chiar daca nicuna nu este pusa in formular

                          if(empty($post_image)) {

                            $query = "SELECT * FROM postari WHERE post_id = $the_get_post_id ";

                            $select_image = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_array($select_image)) {

                                 $post_image = $row['post_image'];
                            }

                          }
                          //----------------------------------------------------------------------------------------

                          $query = "UPDATE postari SET ";
                          $query.="post_title = '{$post_title}', ";
                          $query.="post_category_id = '{$post_category_id}', ";
                          $query.="post_date = now(), ";
                          $query.="post_author = '{$post_author}', ";
                          $query.="post_tags = '{$post_tags}', ";
                          $query.="post_status = '{$post_status}', ";
                          $query.="post_content = '{$post_content}', ";
                          $query.="post_image = '{$post_image}' ";  // fara virgula la chestia dinaintea lui WHERE!!
                          $query.=" WHERE post_id = {$the_get_post_id} ";

                          $update_query = mysqli_query($connection, $query);

                          echo "The post has been updated!" . "  " . "<a href='../post.php?p_id={$the_get_post_id}'>View post</a> or <a href='posts.php'>Edit more posts</a>" ;


                          }


?>


<form action="" method = "POST" enctype= "multipart/form-data">

    <div class="form-group">
        <label for="title">Post title</label>
        <input value="<?php echo $post_title ?>" type="text" name="post_title" id="" class = "form-control">
    </div>


    <div class="form-group">
        <label for="post_category">Post Tags</label>
        <input value="<?php echo $post_tags ?>" type="text" name="post_tags" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author ?>" type="text" name="post_author" id="" class = "form-control">
    </div>

  <div class="class-form">
  <select name="post_status" id="">
      <option value=''><?php echo $post_status ?></option>

<?php 

 if($post_status == 'published') {


       echo "<option value='draft'>draft</option>"; 

 }  else {

    echo  "<option value='published'>published</option>"; 
 }


?>
  </select>
  </div>


     <div class="form-group">
       
        <img width="100" src="../images/<?php echo $post_image   ?>" alt="" name ="image" >
        <br>
        <input type="file" name="image" id="">
    </div>

    <div class="form-group">
        <label for="post_category">Post Categories</label>
        <select name="post_category" id="">

<?php  


  $query = "SELECT * FROM categorii "; // update all categories
                              $select_categories = mysqli_query($connection, $query);

                              //am schimbat putin  numele pentru a evita un conflict
                  
                                 
                            while ($row = mysqli_fetch_assoc($select_categories))  {
                           
                                     
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];

                             echo "<option value='{$cat_id}'>{$cat_title}</option>";

                            }

?>


        </select>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class = "form-control" name="post_content" id="summernote" cols="30" rows="10"><?php echo $post_content ?>
            </textarea>
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" value="Update post" name = "update_post">
    </div>

</form>


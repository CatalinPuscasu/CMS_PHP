<?php  

if (isset($_GET['p_id']))  {

  $the_get_post_id = $_GET['p_id'];


}

$query = "SELECT * FROM postari"; 
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


?>


<form action="" method = "POST" enctype= "multipart/form-data">

    <div class="form-group">
        <label for="title">Post title</label>
        <input value="<?php echo $post_title ?>" type="text" name="title" id="" class = "form-control">
    </div>


    <div class="form-group">
        <label for="post_category">Post Category ID</label>
        <input value="<?php echo $post_category_id ?>" type="text" name="post_category_id" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author ?>" type="text" name="author" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <input value="<?php echo $post_status ?>" type="text" name="post_status" id="" class = "form-control">
    </div>

     <div class="form-group">
       
        <img width="100" src="../images/<?php echo $post_image   ?>" alt="">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <select name="post_category" id="post_category">

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
        <textarea class = "form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?>
            </textarea>
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" value="Publish Post" name = "create_post">
    </div>

</form>


<?php   

if(isset($_POST['create_post']))  {

   $post_title = $_POST['title'];
   $post_author = $_POST['author'];
   $post_category_id = $_POST['post_category'];
   $post_status = $_POST['post_status'];

   $post_image = $_FILES['image']['name'];
   $post_image_temp = $_FILES['image']['tmp_name'];

   $post_tags = $_POST['post_tags'];
   $post_content = $_POST['post_content'];
   $post_date = date('d-m-y');
//    $post_comment_count = 4;

   move_uploaded_file($post_image_temp, "../images/$post_image");
// ca sa plece img din temp in folderul destinatie

   $query = "INSERT INTO postari(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";

   $query.= "VALUES ('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' ) ";

// uitasem sa creez conexiune, sa trimit efectiv cererea
   $create_post_query = mysqli_query($connection, $query);

  confirmQuery ($create_post_query);

  $the_get_post_id = mysqli_insert_id($connection);

  //functia scoate ultimul ID creat, in tabel

  echo "The post has been created!" . "  " . "<a href='../post.php?p_id={$the_get_post_id}'>View post</a> or <a href='posts.php'>Edit more posts</a>" ;


}



?>



<form action="" method = "POST" enctype= "multipart/form-data">

    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" name="title" id="" class = "form-control">
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
        <label for="author">Post Author</label>
        <input type="text" name="author" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <select name="post_status" id="">
            <option value="draft">Select Options</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>

     <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class = "form-control" name="post_content" id="summernote" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" value="Publish Post" name = "create_post">
    </div>

</form>
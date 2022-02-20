<?php   

if(isset($_POST['create_post']))  {

   $post_title = $_POST['title'];
   $post_author = $_POST['author'];
   $post_category_id = $_POST['post_category_id'];
   $post_status = $_POST['post_status'];

   $post_image = $_FILES['image']['name'];
   $post_image_temp = $_FILES['image']['tmp_name'];

   $post_tags = $_POST['post_tags'];
   $post_content = $_POST['post_content'];
   $post_date = date('d-m-y');
   $post_comment_count = 4;

   move_uploaded_file($post_image_temp, "../images/$post_image");

}



?>



<form action="" method = "POST" enctype= "multipart/form-data">

    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" name="title" id="" class = "form-control">
    </div>


    <div class="form-group">
        <label for="post_category">Post Category ID</label>
        <input type="text" name="post_category_id" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" name="author" id="" class = "form-control">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" name="post_status" id="" class = "form-control">
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
        <textarea class = "form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" value="Publish Post" name = "create_post">
    </div>

</form>
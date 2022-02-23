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
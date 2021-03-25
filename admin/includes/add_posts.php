<?php 
    if(isset($_POST['create_post'])){
        $post_title= $_POST['post_title'];
        $post_author= $_POST['post_author'];
        $post_category_id= $_POST['post_category'];
        $post_status= $_POST['post_status'];
        $post_image= $_FILES['post_image']['name'];
        $post_image_temp= $_FILES['post_image']['tmp_name'];
        $post_tags= $_POST['post_tags'];
        $post_date= date('d-m-y');
        $post_comment_count=4;
        $post_content=$_POST['post_content'];

        move_uploaded_file($post_image_temp, "../Images/$post_image");
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";
             
        $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') "; 
               
        $create_post_query = mysqli_query($connection, $query);
        
        
        confirmQuery($create_post_query);
        
    }
?>                             
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">post title</label>
    <input type="text" class="form-control" name="post_title" />
  </div>
 
 
    
  <select name="post_category" id="">
    <?php 
        $query = "SELECT * from categories ";
        $get_category = mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($get_category)){
            $cat_title=$row['cat_title'];
            $cat_id=$row['cat_id'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
    ?>
  </select>
 
  <div class="form-group">
    <label for="author">post author</label>
    <input type="text" class="form-control" name="post_author" />
  </div>
 
  <div class="form-group">
    <label for="post_status"> Post status</label>
    <input type="text" class="form-control" name="post_status" />
  </div>
 
  <div class="form-group">
    <label for="post_image">post image</label>
    <input type="file" name="post_image" />
  </div>
 
  <div class="form-group">
    <label for="post_tags">post tags</label>
    <input type="text" class="form-control" name="post_tags" />
  </div>
 
  <div class="form-group">
    <label for="post_content">post content</label>
      <textarea class="form-control" name="post_content"  rows="10" cols="30"></textarea>
    </div>
 
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_post" value="add post">
    </div>
</form>
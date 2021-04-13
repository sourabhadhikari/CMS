<?php
if (isset($_POST['add_user'])) {
    
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];

    //$user_image = $_POST['user_image'];
    $user_role = $_POST['user_role'];

    // move_uploaded_file($post_image_temp, "../Images/$post_image");
    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) ";

    $query .= "VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}') ";

    $create_user_query = mysqli_query($connection, $query);


    confirmQuery($create_user_query);
}
?>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" class="form-control" name="user_firstname" />
    </div>

    <div class="form-group">
        <label for="post_status"> Last Name</label>
        <input type="text" class="form-control" name="user_lastname" />
    </div>

    <!-- <div class="form-group">
    <label for="post_image">user image</label>
    <input type="file" name="post_image" />
  </div> -->

    <select name="user_role" id="">
        <option value="subscriber">subscriber</option>
        <option value="admin">Admin</option>
    </select>

    <div class="form-group">
        <label for="title">username</label>
        <input type="text" class="form-control" name="username" />
    </div>



    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email" />
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input class="form-control" type="password" name="user_password"></input>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_user" value="add user">
    </div>
</form>
<?php

if (isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * from users WHERE user_id=$the_user_id";
    $get_user_query = mysqli_query($connection, $query);

    confirmQuery($get_user_query);

    while ($row = mysqli_fetch_assoc($get_user_query)) {

        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];

        //$user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}
if (isset($_POST['edit_user'])) {
    
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];

    //$user_image = $_POST['user_image'];
    $user_role = $_POST['user_role'];

    // move_uploaded_file($post_image_temp, "../Images/$post_image");
    $query = "UPDATE users SET ";
    $query .= "username='{$username}', ";
    $query .= "user_password='{$user_password}', ";
    
    $query .= "user_firstname='{$user_firstname}', ";
    $query .= "user_lastname='{$user_lastname}', ";
    $query .= "user_email='{$user_email}', ";
    $query .= "user_role='{$user_role}' ";
    $query .= "WHERE user_id={$the_user_id} ";
    

    $update_user = mysqli_query($connection, $query);
    confirmQuery(($update_user));
    header("Location:users.php");
}
?>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname" />
    </div>

    <div class="form-group">
        <label for="post_status"> Last Name</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname" />
    </div>

    <!-- <div class="form-group">
    <label for="post_image">user image</label>
    <input type="file" name="post_image" />
  </div> -->

    <select name="user_role" id="">
        <option value="admin"><?php echo $user_role; ?></option>
        <?php
        if ($user_role == 'admin') {
            echo "<option value='subscriber'>subscriber</option>";
        }
        if ($user_role == 'subscriber') {
            echo "<option value='admin'>Admin</option>";
        }
        ?>


    </select>

    <div class="form-group">
        <label for="title">username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username" />
    </div>



    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email" />
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input class="form-control" value="<?php echo $user_password; ?>" type="password" name="user_password"></input>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="edit user">
    </div>
</form>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>user name</th>
            <th>first name</th>
            <th>last name</th>
            <th>email</th>
            <th>role</th>

            
            
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * from users";
        $select_users = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];

            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            

            echo "<tr>";
            echo "<td>{$user_id}</td>";
            
            echo "<td>$username</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";

            // $query = "SELECT * from categories WHERE cat_id=$post_category_id";
            // $select_category_id = mysqli_query($connection,$query);
            // while($row=mysqli_fetch_assoc($select_category_id)){
            //     $cat_id=$row['cat_id'];
            //     $cat_title=$row['cat_title'];
            //     echo "<td>$cat_title</td>";
            // }

            //echo "<td><img width='100' src='../Images/$post_image' ></td>";
            echo "<td> $user_email</td>";
            echo "<td> $user_role</td>";
            
            // $query = "SELECT * FROM posts WHERE post_id=$comment_post_id ";
            // $select_post_id_query = mysqli_query($connection,$query);
            // while($row=mysqli_fetch_assoc($select_post_id_query)){
            //     $post_id=$row['post_id'];
            //     $post_title=$row['post_title'];

            //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            // }
            
           
           
            echo "<td><a href='users.php?source&change_to_admin=$user_id'>change to admin</a></td>";
            echo "<td><a href='users.php?source&change_to_subscriber=$user_id'>change to subscriber</a></td>";
            echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>edit</a></td>";
            echo "<td><a href='users.php?source&delete=$user_id'>delete</a></td>";

            echo "</tr>";
        }
        ?>



    </tbody>
</table>
<?php 
    if(isset($_GET['delete'])){
        $the_user_id = $_GET['delete'];
        $query="DELETE FROM users where user_id=$the_user_id";
        $delete_user_query=mysqli_query($connection,$query);
        header("Location:users.php");
        confirmQuery($delete_user_query);
    }
?>
<?php 
    if(isset($_GET['change_to_admin'])){
        $the_user_id = $_GET['change_to_admin'];
        $query="UPDATE users SET user_role = 'admin' WHERE user_id=$the_user_id  ";
        $change_to_admin_query=mysqli_query($connection,$query);
        header("Location:users.php");
        confirmQuery($change_to_admin_query);
    }
?>
<?php 
    if(isset($_GET['change_to_subscriber'])){
        $the_user_id = $_GET['change_to_subscriber'];
        $query="UPDATE users SET user_role = 'subscriber' WHERE user_id=$the_user_id  ";
        $change_to_admin_query=mysqli_query($connection,$query);
        header("Location:users.php");
        confirmQuery($change_to_admin_query);
    }
?>
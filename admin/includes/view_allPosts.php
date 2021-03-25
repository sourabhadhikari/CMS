<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Post ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Date</th>
            <th>comments</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * from posts";
        $select_posts = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_category_id = $row['post_category_id'];
            $post_image = $row['post_image'];
            $post_status = $row['post_status'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];

            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>$post_author</td>";

            $query = "SELECT * from categories WHERE cat_id=$post_category_id";
            $select_category_id = mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_category_id)){
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
                echo "<td>$cat_title</td>";
            }

            echo "<td><img width='100' src='../Images/$post_image' ></td>";
            echo "<td> $post_status</td>";
            echo "<td> $post_tags</td>";
            echo "<td>$post_comment_count</td>";
            echo "<td>$post_date</td>";
            echo "<td><a href='posts.php?source&delete=$post_id'>delete</a></td>";
            echo "<td><a href='posts.php?source=edit_post&edit=$post_id'>edit</a></td>";
            echo "</tr>";
        }
        ?>



    </tbody>
</table>
<?php 
    if(isset($_GET['delete'])){
        $the_post_id = $_GET['delete'];
        $query="DELETE FROM posts where post_id=$the_post_id";
        $delete_post_query=mysqli_query($connection,$query);
        
        confirmQuery($delete_post_query);
    }
?>
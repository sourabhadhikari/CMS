<?php
function insert_categories()
{
    global $connection;
    if (isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title)) {
            echo "this field should not be empty";
        } else {
            $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
            $add_category_query = mysqli_query($connection, $query);
            header('Location: ' . $_SERVER['PHP_SELF']); //prevents from adding redundant data on refresh
            if (!$add_category_query) {
                die('addition failed' . mysqli_error($connection));
            }
        }
    }
}

function delete_category()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $delete_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id}";
        $delete_category_query = mysqli_query($connection, $query);
        header('Location: ' . $_SERVER['PHP_SELF']); //prevents from adding redundant data on refresh
        if (!$delete_category_query) {
            die('deletion failed' . mysqli_error($connection));
        }
    }
}

function findAllCategories()
{
    global $connection;
    $query = "SELECT * from categories";
    $select_category_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_category_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr><td>" . $cat_id . "</td><td>" . $cat_title . "</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>EDIT</a></td></tr>";
    }
}
function confirmQuery($result){
    global $connection;
    if(!$result){
        die('addition failed'.mysqli_error($connection));
    }
}
?>
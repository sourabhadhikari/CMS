<form action="" method="post">
    <label for="">Edit Category</label>
<?php 
     if(isset($_GET['edit'])){
        $cat_id=$_GET['edit'];
        $query = "SELECT * from categories WHERE cat_id=$cat_id";
        $select_category_id = mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_category_id)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];
?>
    <div class="form-group">
    <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" class="form-control" type="text" name="cat_title">
    </div>    
<?php
                                        
        }}
                                     
?>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update" value="Update Category">
    </div>
</form>
<?php 
    if(isset($_POST['update'])){
        
            
            $cat_title=$_POST['cat_title'];
                                            
            $query="UPDATE categories SET cat_title='$cat_title' WHERE cat_id=$cat_id";
            $update_category_query=mysqli_query($connection,$query);
            header('Location: '.$_SERVER['PHP_SELF']);
            if(!$update_category_query){
                die('updation failed'.mysqli_error($connection));
            }
        
    }
?>                               
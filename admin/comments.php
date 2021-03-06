<?php include "includes/adminHeader.php"; ?>


<div id="wrapper">

    <?php include "includes/adminNav.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        WELCOME TO POSTS
                        <small>Author</small>
                    </h1>

                    <?php 
                        if(isset($_GET['source'])){
                            $source=$_GET['source'];
                            switch($source){
                                case 'add_post': include "includes/add_posts.php";
                                    break;
                                case 'edit_post': include "includes/edit_post.php";
                                    break;
                                default:
                                    include "includes/view_allComments.php";
                                break;
                            }
                        }
                        else {
                            include "includes/view_allComments.php";
                            
                        }
                        
                    ?>
                   
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/adminFooter.php"; ?>
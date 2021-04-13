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
                                case 'add_user': include "includes/add_users.php";
                                    break;
                                case 'edit_user': include "includes/edit_users.php";
                                    break;
                                default:
                                    include "includes/view_allUsers.php";
                                break;
                            }
                        }
                        else {
                            include "includes/view_allUsers.php";
                            
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
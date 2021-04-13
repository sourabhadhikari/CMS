<?php include "includes/adminHeader.php"; ?>
    <div id="wrapper">
    
        <?php include "includes/adminNav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO ADMIN
                            
                            <small><?php echo $_SESSION['username']?></small>
                        </h1>
                       
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

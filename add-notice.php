<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    if (isset($_POST['submit'])) {
        $ntitle = $_POST['noticetitle'];
        $ndetails = $_POST['noticedetails'];
        $sql = "INSERT INTO  tblnotice(noticeTitle,noticeDetails) VALUES(:ntitle,:ndetails)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':ntitle', $ntitle, PDO::PARAM_STR);
        $query->bindParam(':ndetails', $ndetails, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo '<script>alert("Notice added succesfully")</script>';
            echo "<script>window.location.href ='manage-notices.php'</script>";
        } else {
            echo '<script>alert("Something went wrong. Please try again.")</script>';
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <?php include('includes/heading.php'); ?>
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            .succWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }
        </style>
    </head>

    <body class="top-navbar-fixed" style= "background:#ffff">
        <div class="main-wrapper">

            <?php include('includes/topbar.php'); ?>

            <div class="content-wrapper">
                <div class="content-container">


                    <?php include('includes/leftbar.php'); ?>


                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Add Notice</h2>
                                </div>

                            </div>

                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="#">Notices</a></li>
                                        <li class="active">Add Notice</li>
                                    </ul>
                                </div>

                            </div>

                        </div>


                        <section class="section">
                            <div class="container-fluid">





                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel" style="box-shadow: 0 1rem 2rem #d3cccc;   border-radius: 25px;margin-top:20px; ">
                                            <div class="panel-heading">
                                                <div class="panel-title"style="font-family:'Poppins', sans-serif ;text-align:center">
                                                    <h5>Add Notice</h5>
                                                </div>
                                            </div>

                                            <div class="panel-body">

                                                <form method="post">
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Notice Title</label>
                                                        <div class="">
                                                            <input type="text" name="noticetitle" class="form-control" required="required" id="noticetitle">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Notice Details</label>
                                                        <div class="">
                                                            <textarea class="form-control" name="noticedetails" required rows="5"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group has-success">

                                                        <div class="">
                                                            <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                        </div>



                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </section>

                    </div>

                </div>
            </div>

        </div>
        <?php include('includes/footbar.php'); ?> 
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <script src="js/prism/prism.js"></script>

        <script src="js/main.js"></script>



    </body>

    </html>
<?php  } ?>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if ($_SESSION['alogin'] != '') {
    $_SESSION['alogin'] = '';
}
if (isset($_POST['register'])) {
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "INSERT INTO admin(UserName,Password) VALUES(:uname,:password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':uname', $uname, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $msg = "Registration successfull";
    } else {
        $error = "Something went wrong. Please try again";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include('includes/heading.php'); ?>
</head>

<body class="" style= "background:#ffff">
    <div class="main-wrapper">

        <div class="">
        <?php include('includes/topbar.php'); ?>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <section class="section">
                        <div class="row mt-40">
                            <div class="col-md-10 col-md-offset-1 pt-50">

                                <div class="row mt-30 ">
                                    <div class="col-md-11">
                                        <div class="panel" style="box-shadow: 0 1rem 2rem #d3cccc;   border-radius: 25px;margin-top:20px; ">
                                            <div class="panel-heading">
                                                <div class="panel-title text-center" style="font-family:'Poppins', sans-serif ;text-align:center">
                                                    <h4>Admin Registration</h4>
                                                </div>
                                            </div>

                                            <div class="panel-body p-20">
                                                <?php if ($msg) { ?>
                                                    <div class="alert alert-success left-icon-alert" role="alert">
                                                        <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                                    </div><?php } else if ($error) { ?>
                                                    <div class="alert alert-danger left-icon-alert" role="alert">
                                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                                    </div>
                                                <?php } ?>
                                                <form class="form-horizontal" method="post">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="username" class="form-control" id="inputEmail3" required="required" placeholder="UserName">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" name="password" class="form-control" id="inputPassword3" required="required" placeholder="Password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group mt-20">
                                                        <div class="col-sm-offset-2 col-sm-10">

                                                            <button type="submit" name="register" class="btn btn-success btn-labeled pull-right">Register<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="col-sm-6">
                                                    <a href="index.php">Back to Home</a>
                                                </div>

                                            </div>
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
    <footer class="footer1" style="background-color: #fff;color: gray;text-align: center;font-size: 15px;font-weight: 400;border-top: .2rem solid rgba(0, 0, 0, .2);padding: 1rem;padding-top: 2rem;margin-top: 20rem;">
            <div class="container">
                <p class="copyright">Copyright &copy; created by <span> </span> Niger_Alam | All rights reserved!</p>
            </div>
        </footer>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(function() {

        });
    </script>

</body>

</html>
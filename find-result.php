<?php
session_start();
include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('includes/heading.php'); ?>
</head>

<body class="" style="background:#fff">
   
    <div class="main-wrapper">
    <?php include('includes/topnavs.php'); ?>
        <div class="login-bg-color bg-white-300">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <div class="panel login-box" style="box-shadow: 0 1rem 2rem #d3cccc;   border-radius: 25px; ">
                        <div class="panel-heading">
                        <div class="panel-title text-center" style="font-family:'Poppins', sans-serif">
                                <h3>Find Your Result</h3>
                            </div>
                        </div>
                        <div class="panel-body p-20">



                            <form action="result.php" method="post">
                                <div class="form-group">
                                    <label for="rollid">Enter your Student Id</label>
                                    <input type="text" class="form-control" id="rollid" placeholder="Student Id" autocomplete="off" name="rollid">
                                </div>
                                <div class="form-group">
                                    <label for="default" class="col-sm-2 control-label">Session</label>
                                    <select name="class" class="form-control" id="default" required="required">
                                        <option value="">Select Session</option>
                                        <?php $sql = "SELECT * from tblclasses";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {   ?>
                                                <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>


                                <div class="form-group mt-20">
                                    <div class="">

                                        <button type="submit" class="btn btn-success btn-labeled pull-right">Search<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <a href="index.php">Back to Home</a>
                                </div>
                            </form>

                            <hr>

                        </div>
                    </div>
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

    <script src="js/icheck/icheck.min.js"></script>

    <script src="js/main.js"></script>
    <script>
        $(function() {
            $('input.flat-blue-style').iCheck({
                checkboxClass: 'icheckbox_flat-blue'
            });
        });
    </script>

</body>

</html>
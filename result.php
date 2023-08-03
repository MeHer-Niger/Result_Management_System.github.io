<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('includes/heading.php'); ?>
</head>

<body style= "background:#ffff">
    <div class="main-wrapper">
    <?php include('includes/topnavs.php'); ?>
        <div class="content-wrapper">
            <div class="content-container">
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-12">
                               
                            </div>
                        </div>

                    </div>

                    <section class="section" id="exampl">
                        <div class="container-fluid">

                            <div class="row">



                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel" style="box-shadow: 0 1rem 2rem #d3cccc;   border-radius: 25px;margin-top:20px; ">
                                        <div class="panel-heading">
                                            <div class="panel-title" style="font-family:'Poppins', sans-serif ;text-align:center">
                                                <h3 style="align=center;"> Result Details</h3>
                                                <hr />
                                                <?php
                                                $rollid = $_POST['rollid'];
                                                $classid = $_POST['class'];
                                                $_SESSION['rollid'] = $rollid;
                                                $_SESSION['classid'] = $classid;
                                                $qery = "SELECT   tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId=:rollid and tblstudents.ClassId=:classid ";
                                                $stmt = $dbh->prepare($qery);
                                                $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                                                $stmt->bindParam(':classid', $classid, PDO::PARAM_STR);
                                                $stmt->execute();
                                                $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($stmt->rowCount() > 0) {
                                                    foreach ($resultss as $row) {   ?>
                                                        <p><b>Student Name :</b> <?php echo htmlentities($row->StudentName); ?></p>
                                                        <p><b>Student Id :</b> <?php echo htmlentities($row->RollId); ?>
                                                        <p><b>Student Session:</b> <?php echo htmlentities($row->ClassName); ?>
                                                        <?php }

                                                        ?>
                                            </div>
                                            <div class="panel-body p-20">



                                                <table class="table table-hover table-bordered" border="1" width="100%">
                                                    <thead>
                                                        <tr style="text-align: center">
                                                            <th style="text-align: center">No.</th>
                                                            <th style="text-align: center"> Course</th>
                                                            <th style="text-align: center">Marks</th>
                                                        </tr>
                                                    </thead>




                                                    <tbody>
                                                        <?php

                                                        $query = "select t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=:rollid and t.ClassId=:classid)";
                                                        $query = $dbh->prepare($query);
                                                        $query->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                                                        $query->bindParam(':classid', $classid, PDO::PARAM_STR);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;
                                                        if ($countrow = $query->rowCount() > 0) {
                                                            foreach ($results as $result) {

                                                        ?>

                                                                <tr>
                                                                    <th scope="row" style="text-align: center"><?php echo htmlentities($cnt); ?></th>
                                                                    <td style="text-align: center"><?php echo htmlentities($result->SubjectName); ?></td>
                                                                    <td style="text-align: center"><?php echo htmlentities($totalmarks = $result->marks); ?></td>
                                                                </tr>
                                                            <?php
                                                                $totlcount += $totalmarks;
                                                                $cnt++;
                                                            }
                                                            ?>
                                                            <tr>
                                                                <th scope="row" colspan="2" style="text-align: center">Total Marks</th>
                                                                <td style="text-align: center"><b><?php echo htmlentities($totlcount); ?></b> out of <b><?php echo htmlentities($outof = ($cnt - 1) * 100); ?></b></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" colspan="2" style="text-align: center">Percentage</th>
                                                                <td style="text-align: center"><b><?php echo  htmlentities($totlcount * (100) / $outof); ?> %</b></td>
                                                            </tr>

                                                            <tr>

                                                                <td colspan="3" align="center"><i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)"></i></td>
                                                            </tr>

                                                        <?php } else { ?>
                                                            <div class="alert alert-warning left-icon-alert" role="alert">
                                                                <strong>Notice!</strong> Your result is not declare yet
                                                            <?php }
                                                            ?>
                                                            </div>
                                                        <?php
                                                    } else { ?>

                                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                                strong>Oh snap!</strong>
                                                            <?php
                                                            echo htmlentities("Invalid Student Id");
                                                        }
                                                            ?>
                                                            </div>



                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-6">
                                            <a href="index.php">Back to Home</a>
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
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <script src="js/prism/prism.js"></script>

    <script src="js/main.js"></script>
    <script>
        $(function($) {

        });


        function CallPrint(strid) {
            var prtContent = document.getElementById("exampl");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>

    </script>

</body>

</html>
<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Result Management System</title>
    <link rel="icon" href="asset/img/logo.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="asset/css/main.css">
</head>

<body>


    <header class="header" >
 
            <img src="asset/img/logo1.png" height="60" alt="logo">
       
        <h4 style="padding-right:0.4px;color:gray;font-size: 2rem;"> Department of Information & <br>Communication Technology || Comilla University</h4>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="find-result.php">Student</a>
            <a href="admin-login.php">Admin</a>
            <a href="#">Contact</a>
        </nav>
        <div id="menu-bars" class="fas fa-bars"></div>
    </header>


    <section class="home" id="home">
        <img src="asset/img/banner.png" alt="banner" class="responsive">
       
    </section>

    <section class="content" id="content">
        <h1 style="     text-align: center;padding-bottom: 2rem;font-size: 4rem; color:var(--black);text-shadow: var(--text-shadow);padding-top:5px"><b>About Us </b></h1>
        <p class="para" style="width: 100%;text-align: justify;padding: 30px;margin: 30px;display: block;font-size: 1.17em;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;font-weight: bold;box-shadow: 0 1rem 2rem #d3cccc;line-height: 1.5;border-radius: 25px;background: #fff;height:auto;color:gray;">
       Welcome to the Department of Information and Communication Technology (ICT), Comilla University. The ICT department is committed to ensure a collegial atmosphere and a good curriculum to produce highly qualified students under outstanding highly skilled faculty members who have both teaching and research experiences.

            Our faculty members contribute to developing new and highly innovative research not only with the students of the Department of ICT at Comilla University but also they are doing collaborative research with the Professors of other Universities. Our students and teachers are publishing research articles in high impact journals and conferences. As a recognition, two of our students received ICT research fellowships for the first time in Comilla University in 2018 and 2020, respectively. In 2022, a number of students were awarded NST research awards.

            The ICT Department has adequate resources and facilities to ensure quality education in both theoretical and applied fields of communication, networking, artificial intelligence, and robotics which might meet up the demands of the fourth industrial revolution (4IR). Our achievements have not gone unnoticed. Our students are working collaboratively with the Comilla DC office to develop a humanoid robot named "SHEENA and NIKO" which has received countrywide recognition. Students also are achieving good ranking in national and ICPC programming contests (e.g. 1st in Chittagong division [2022]) as we arrange programming contests and project showcasing regularly in our Department.

            Alumni of our department are working with good reputation and success at renowned national and international companies (e.g. Japan and Thailand), private and public organizations (such as banking, BREB, and so on), and educational institutions (many as a faculty member in public and private universities, schools and colleges). </p>

    </section>
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Notice Board</h2>
                    <hr color="#000" />
                    <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul>
                            <?php $sql = "SELECT * from tblnotice";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {   ?>
                                    <li><a href="notice-details.php?nid=<?php echo htmlentities($result->id); ?>" target="_blank"><?php echo htmlentities($result->noticeTitle); ?></li>
                            <?php }
                            } ?>

                        </ul>
                    </marquee>

                </div>
            </div>
        </div>
    </section>


    <section class="footer">
     <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="#home"> <i class="fas fa-chevron-right"></i> Home</a>
                <a href="#about"> <i class="fas fa-chevron-right"></i> About US</a>
                <a href="#services"> <i class="fas fa-chevron-right"></i> Our Programms </a>
                <a href="#galary"> <i class="fas fa-chevron-right"></i> Galary </a>
                <a href="#review"> <i class="fas fa-chevron-right"></i> Review </a>

            </div>

            <div class="box">
                <h3>Our Programms</h3>
                <a href="#"> <i class="fas fa-chevron-right"></i> Bachelor in ICT </a>
                <a href="#"> <i class="fas fa-chevron-right"></i> Masters in ICT</a>
                <a href="#"> <i class="fas fa-chevron-right"></i> Evening MSc in ICT</a>


            </div>

            <div class="box">
                <h3>Contact Us</h3>
                <a href="#"> <i class="fas fa-phone"></i> +8802334411145 </a>
                <a href="#"> <i class="fas fa-envelope"></i> ict_office@cou.ac.bd</a>
                <a href="#"> <i class="fas fa-envelope"></i> ict.cou@gmail.com </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i>Faculty Of Engineering</a>
            </div>

            <div class="box">
                <h3>Follow Us</h3>
                <a href="https://www.facebook.com/ict.association.cou/"> <i class="fab fa-facebook"></i> Facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
                <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
            </div>
        </div>

        <?php include('includes/footbar.php'); ?>
    </section>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="asset/js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
   
</body>

</html>
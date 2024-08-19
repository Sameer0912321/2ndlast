<?php 
include './conn.php';
session_start();
?>
<?php
    if(!isset($_SESSION['id'])){
        header('location:./login.php?from=sendusertoservice');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Hub</title>

</head>
<style>
  #services {
    background-color: white !important;

  }

  h1,
  h2,
  h3,
  a {
    color: black !important;
  }
</style>



<body>


<header>



<div class="header">
    <a href="index.html" style="text-decoration: none; color: black; font-weight: bolder; font-style: italic;">
        <div class="logo" style="color: white !important;"><img src="./brand4.png" alt=""
                style="height: 50px; width: 120px; margin: 0%; padding: 0%; "></div>
    </a>
    <nav>
        <a id="anchor" href="#home">Home</a>
        <a id="anchor" href="#about">About</a>
        <a id="anchor" href="#services">Services</a>
        <a id="anchor" href="#hiring">Welcoming</a>
        <a id="anchor" href="#contactt">Contact</a>
        <a id="anchor" href="career.php">Careers</a>
        <!-- <a id="anchor" href="dashboard.html">Dashboard</a> -->
    </nav>

    <?php
     $email = mysqli_real_escape_string($connection,$_SESSION['email']);
     $query = "SELECT * FROM signup WHERE email = '$email'";
     $res = mysqli_query($connection,$query);
     $info = mysqli_fetch_array($res);
        if(!isset($_SESSION['email'])){
                echo"
                <div class='icons'>
    <a href='login.php' style='text-decoration:none;width:5em;background-color:orange; height:1.5em;font-size:1rem; text-align:center;padding:0%; margin:0%;' class='btn '>Login</a>
        <a href='user.php' style='gap: 3px;'><i class='fa fa-user'><span
                    style='color:rgb(255, 255, 255);'></span></i></a>
    </div>        
            ";
            
          

        }
        else if(isset($_SESSION['email'])){
           
        if($_SESSION['role'] == 'Job Seeking'){
            if($_SESSION['photo'] !== null){
              $name = mysqli_real_escape_string($connection,$_SESSION['name']);
              $sel = "SELECT * FROM signup WHERE name = '$name'";
              $res = mysqli_query($connection,$sel);
              $info = mysqli_fetch_array($res); 
                echo "
            <div class='icons'>
        <a href='' style='text-decoration:none;width:8em; height:1.5em;font-size:1rem; text-align:center;padding:0%; margin:0%; margin-left:3em;' class='name ' >Hi, $info[1]</a>
            <a href='user.php' style='gap: 3px;'><div style=' width: 2em;
            height: 2em;
             border-radius: 45px;' id='profile'>
            <img class='profileIcon' style='width: 100% !important;
             height: 100% !important;margin:0% !important;  border-radius: 45px;' src='$info[11]' alt=''>
            </div></a>
    </div>
";
            }
            else if($_SESSION['profile'] == null){
                echo "
            <div class='icons'>
        <a href='' style='text-decoration:none;width:8em; height:1.5em;font-size:1rem; text-align:center;padding:0%; margin:0%; margin-left:3em;' class='name ' >Hi, $info[1]</a>
        <a href='user.php' style='gap: 3px;'><i class='fa fa-user'><span
                    style='color:rgb(255, 255, 255);'></span></i></a>
    </div>        
    </div>
";
            }
        }              
        else if($_SESSION['role'] == 'Hiring'){
            if($_SESSION['photo'] !== 'null'){
                echo "
            <div class='icons'>
        <a href='' style='text-decoration:none;width:8em; height:1.5em;font-size:1rem; text-align:center;padding:0%; margin:0%; margin-left:3em;' class='name ' >Hi, $info[1]</a>
            <a href='user.php' style='gap: 3px;'><div style=' width: 2em;
            height: 2em;
             border-radius: 45px;' id='profile'>
            <img class='profileIcon' style='width: 100% !important;
             height: 100% !important;margin:0% !important;  border-radius: 45px;' src='$info[11]' alt=''>
            </div></a>
    </div>
";
            }
            else if($_SESSION['profile'] == null){
                echo "
            <div class='icons'>
        <a href='' style='text-decoration:none;width:8em; height:1.5em;font-size:1rem; text-align:center;padding:0%; margin:0%; margin-left:3em;' class='name ' >Hi, $info[1]</a>
        <a href='user.php' style='gap: 3px;'><i class='fa fa-user'><span
                    style='color:rgb(255, 255, 255);'></span></i></a>
    </div>        
    </div>
";
            }
        }
        }
        ?>
         <!-- // <a href='login.php' style='text-decoration:none;width:5em;background-color:orange; height:1.5em;font-size:1rem; text-align:center;padding:0%; margin:0%;' class='btn '>Login</a> -->
<div class="menu-toggle" onclick="toggleMenu()" style="color: orange;">&#9776;</div>
</div>
<div class="sub-header">
    <div class="contact-infoo">
        <p id="info-head"><span style="color: rgb(255, 255, 255);">info@serviceshub.com</span></p>
        <p id="number">Phone: +123 456 7890</p>
    </div>
    <div class="social-icons">
        <a href="#"><i class="fa fa-facebook" style="color: white;"></i></a>
        <a href="#"><i class="fa fa-twitter" style="color: white;"></i></a>
        <a href="#"><i class="fa fa-instagram" style="color: white;"></i></a>
    </div>
</div>



</header>




  <!-- service section -->

  <section class="service-section" id="services">
    <h2 class="section-title" style="color: rgb(0, 0, 0) !important; padding-top: 60px;">Our Services</h2>
    <div class="card-grid mt-5">
      <!-- Card 1 -->
      <?php
                $sel = 'SELECT * FROM hiring';
                $responceserve = mysqli_query($connection,$sel);
                if($responceserve){
                    while($row = mysqli_fetch_assoc($responceserve)){
                        $fullname = $row['fullname'];
                        // $description = $row['description'];
                        $position = $row['position'];
                        $description = $row['coverletter'];
                        $profile = $row['profile'];
                        
                        $id = $row['id'];
                    echo"<div class='card'>
                    <img src='$profile' alt='Service 1' class='card-image'>
                    <h3 class='card-title'>$position</h3>
                    <p class='card-description'>$description</p>
                    <a href='booking.php?id=$id' class='card-button'>View More</a>
                    </div>";
                    }
                } 
            ?>;
    </div>
    <div class="view-more-button">
      <a href="#">View More</a>
    </div>
  </section>







  <!-- Footer Section -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2024 Services-Hub. All rights reserved.</p>
      <!-- <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#about">About</a></li>
                </ul>
            </nav> -->
      <div class="social-media">
        <a href="https://www.facebook.com/ServiceHub" target="_blank">Facebook</a>
        <a href="https://www.twitter.com/ServiceHub" target="_blank">Twitter</a>
        <a href="https://www.instagram.com/ServiceHub" target="_blank">Instagram</a>
        <a href="https://www.linkedin.com/company/ServiceHub" target="_blank">LinkedIn</a>
      </div>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  <!-- gsap link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

  <script src="main.js"></script>
</body>

</html>
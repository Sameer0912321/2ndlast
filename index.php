<?php
include 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @media(max-width:768px){
            .name{
                display:none;
        }
        }
    </style>
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
                    $email = mysqli_real_escape_string($connection,$_SESSION['email']);
                    $query = "SELECT * FROM signup WHERE email = '$email'";
                    $res = mysqli_query($connection,$query);
                    $info = mysqli_fetch_array($res);
                if($_SESSION['role'] == 'Job Seeking'){
                    if($_SESSION['photo'] !== null){
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

    <section class="hero" id="home">
        <div class="hero-content">
            <div class="hero-text">
                <h1 style="font-style: italic; ">Welcome to Service Hub</h1>
                <p style="font-style: italic; text-align: left; ">Your trusted partner for comprehensive solutions. <br>
                    » Where
                    Commitment Meets
                    Quality.</p>
                <a style="border-radius: none !important; margin-right: 10px;" href="login.php?from=tocareer" class="btn">Seeking Job</a>
                <span>
                    <button id="join-btn"><a href="login.php?from=toservice" id="join-btn"
                            style="border: none !important; background-color: transparent !important;">I'm Hiring</a></button>

                </span>
            </div>
        </div>
        <div class="hero-overlay" id="hero-overlay"></div>
    </section>

    <!-- About Us Section -->
    <section class="section about-us" id="about">
        <div class="section-content">
            <h2><i class="fas fa-users"></i>About Us</h2>
            <p>
                At Service Hub, we specialize in providing top-notch services that cater to the diverse needs of our
                clients.
                Our team of dedicated professionals is committed to delivering exceptional results and exceeding
                expectations.
            </p>
        </div>
    </section>

    <!-- Our Goals Section -->
    <section class="section our-goals">
        <div class="section-content">
            <h2><i class="fas fa-bullseye"></i>Our Goals</h2>
            <p>
                Our primary goal is to achieve customer satisfaction by offering reliable and efficient services.
                We continuously strive to innovate and improve, ensuring that we stay ahead in the industry and provide
                our
                clients with the best possible solutions.
            </p>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="section our-services">
        <div class="section-content">
            <h2><i class="fas fa-cogs"></i>Our Services</h2>
            <p>
                We offer a wide range of services, from professional consulting to hands-on support.
                Our expertise spans various industries, allowing us to tailor our services to meet the unique needs of
                each client.
            </p>
        </div>
    </section>

    <!-- Why Trust Us Section -->
    <section class="section why-trust-us">
        <div class="section-content">
            <h2><i class="fas fa-thumbs-up"></i>Why Trust Us</h2>
            <p>
                Trust is the cornerstone of our business. We build strong, lasting relationships with our clients based
                on integrity,
                transparency, and mutual respect. Our proven track record speaks volumes about our commitment to
                excellence.
            </p>
        </div>
    </section>




    <!-- service section -->

    <section class="service-section" id="services">
        <h2 class="section-title" style="color: white !important; padding-top: 60px;">Our Services</h2>
        <div class="card-grid">
            <!-- Card 1 -->

            <?php
                include './conn.php';
                $sel = 'SELECT * FROM hiring LIMIT 4';
                $responceserve = mysqli_query($connection,$sel);
                if($responceserve){
                    while($row = mysqli_fetch_assoc($responceserve)){
                        $fullname = $row['fullname'];
                        $profile = $row['profile'];
                        // $description = $row['description'];
                        $position = $row['position'];
                        $description = $row['coverletter'];
                        $id = $row['id'];
                    echo"<div class='card'>
                    <img src='$profile' alt='Service 1' class='card-image'>
                    <h3 class='card-title'>$position</h3>
                    <p class='card-description'> $description</p>
                    <a href='booking.php?id=$id' class='card-button'>View More</a>
                    </div>";
                    }
                } 
            ?>;

        </div>
        <div class="view-more-button">
            <a href="services.php">View More</a>
        </div>
    </section>




    <section class="hiring-section" id="hiring">
        <h1 style="width: 100%; display: flex; align-items: center; justify-content: center;">Now Hiring</h1>
        <p>
            We are looking for talented individuals to join our team. To apply, please review the job descriptions below
            and submit job application form <a style="color: rgb(0, 0, 0);" href="career">Careers</a>.
        </p>
        <a href="login.php?from=creation" id="job-link">
            <div class="job-cards">
                <div class="job-card">
                    <h3>Software Engineer</h3>
                    <p>
                        We are seeking a Software Engineer with a passion for developing innovative solutions.
                        Required skills: Python, JavaScript, and React.
                    </p>
                </div>
        </a>
        <a href="login.php?from=creation" id="job-link">
            <div class="job-card">
                <h3>Project Manager</h3>
                <p>
                    Join our team as a Project Manager and lead exciting projects.
                    Required skills: Leadership, communication, and problem-solving.
                </p>
            </div>
        </a>
        <a href="login.php?from=creation" id="job-link">
            <div class="job-card">
                <h3>Graphic Designer</h3>
                <p>
                    We are looking for a creative Graphic Designer to produce engaging visual content.
                    Required skills: Adobe Creative Suite, creativity, and attention to detail.
                </p>
            </div>
        </a>
        <a href="login.php?from=creation" id="job-link">
            <div class="job-card">
                <h3>Customer Support Specialist</h3>
                <p>
                    Become a Customer Support Specialist and provide exceptional service to our clients.
                    Required skills: Communication, patience, and problem-solving.
                </p>
            </div>
        </a>
        </div>
        <button class="apply-button"><a href="login.php?from=creation"
                style="text-decoration: none; color: white;">Apply
                Now</a></button>
    </section>






    <!-- Reviews Section -->
    <section class="reviews">
        <h2>Customer Reviews</h2>
        <div class="slider">
            <button class="arrow left" onclick="moveSlide(-1)">&#10094;</button>
            <div class="review-container">
                <?php
                $selection = "SELECT name,feedback FROM feedback";
                $result = mysqli_query($connection,$selection);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $name = $row['name'];
                        $feedback = $row['feedback'];
                        echo "
                         <div class='review'>
                    <p>'$feedback'</p>
                    <span>$name</span>
                </div>";
                    }
                }
            ?>
            </div>
            <button class="arrow right" onclick="moveSlide(1)">&#10095;</button>
        </div>
        <button class="add-review-btn"><a href="feedback.php" style="text-decoration: none; color: black;">Send your
                Feedback</a></button>

    </section>

    <section class="contact-section" id="contactt">

        <!-- main heading if needed uncomm-->

        <!-- <h2>Contact Us</h2> -->

        <div class="contact-container">
            <div class="contact-info">
                <h2>Contact Information</h2>
                <p style="text-align: left !important;"><strong>Email:</strong> <a
                        href="mailto:support@servicehub.com">support@servicehub.com</a></p>
                <p style="text-align: left !important;"><strong>Phone:</strong> +1-800-123-4567</p>
                <p style="text-align: left !important;"><strong>Address:</strong> 1234 Service Lane, Suite 567,
                    Springfield, IL 62704, United States</p>
                <div class="business-hours">
                    <h3>Business Hours</h3>
                    <p style="text-align: left !important;">Monday - Friday: 9:00 AM - 5:00 PM CST</p>
                    <p style="text-align: left !important;">Saturday: 10:00 AM - 4:00 PM CST</p>
                    <p style="text-align: left !important;">Sunday: Closed</p>
                </div>
                <div class="social-media">
                    <h3>Follow Us</h3>
                    <a href="https://www.facebook.com/ServiceHub" target="_blank">Facebook</a>
                    <a href="https://www.twitter.com/ServiceHub" target="_blank">Twitter</a>
                    <a href="https://www.instagram.com/ServiceHub" target="_blank">Instagram</a>
                    <a href="https://www.linkedin.com/company/ServiceHub" target="_blank">LinkedIn</a>
                </div>
            </div>
            <div class="contact-form">
                <h2>Contact Form</h2>
                <form>
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="text" name="subject" placeholder="Subject" required>
                    <textarea name="message" placeholder="Your Message" required></textarea>
                    <input type="submit" value="Send Message">
                </form>
            </div>
        </div>
    </section>




    <!-- Contact Section For Map  -->
    <section id="contact">
        <div class="content-container">


            <!-- contact form same like feedback -->
            <!-- <div class="form-container" style=" margin-top: 100px; width: 100%;">
                <h3 style="
    
      font-style: oblique;
      margin-bottom: 1em;
      font-size: 1.5rem;

    " id="contact">
                    Contact Us </h3>
                <form action="https://formsubmit.co/kkabdull98@gmail.com" method="POST">
                    <input type="text" name="name" placeholder="Your Name" required />
                    <input type="email" name="email" placeholder="Your Email" required />
                    <textarea name="message" placeholder="Write your quries" required></textarea>
                    <button type="submit" style="width: fit-content;">Send</button>
                </form>
            </div> -->




            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28947.88991935453!2d67.0099514104099!3d24.91550028459394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33fbd469d9bcd%3A0x749325c6e39952f3!2sNazimabad%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1721026764652!5m2!1sen!2s"
                    width="100%" height="100%" style="border:none; margin-top: 40px;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>


            <!-- feedback form  open it if needed   -->
            <!-- <div class="form-container" style=" margin-top: 100px; width: 100%;">
                <h3 style="
  
  font-style: oblique;
  margin-bottom: 1em;
  display: flex;
  align-items: center;
  justify-content: left;
  font-size: 1.5rem;
" id="contact">
                    Give us FeedBack  </h3>
                <form action="https://formsubmit.co/kkabdull98@gmail.com" method="POST">
                    <input type="text" name="name" placeholder="Your Name" required />
                    <input type="email" name="email" placeholder="Your Email" required />
                    <textarea name="message" placeholder="Write your feedback" required></textarea>
                    <button type="submit">Send</button>
                </form>  
            </div>
             -->

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
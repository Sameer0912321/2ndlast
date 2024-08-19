<?php
    include 'conn.php';
    session_start();
?>
<?php
    if(!isset($_SESSION['name'])){
        header('location:./login.php?from=tobooking');
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($_SESSION['role'] == "Hiring"){
            $name = $_POST['name'];
            $service = $_POST['service'];
            $time = $_POST['time'];
            $date = $_POST['date'];
            $location = $_POST['location'];
            $addinotes = $_POST['notes'];
            $query = "INSERT INTO booking VALUES (null,'$name','$service','$date','$time','$location','$addinotes')";
            $res = mysqli_query($connection,$query);
            if($res){
                echo"
                    <script>  const form = document.getElementById('bookingForm');
            if (form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent the form from submitting the traditional way
    
                    // Perform AJAX request here if needed
    
                    openModal();</script>
                ";            
                header('locaton:./user.php');
            }
        }
        else if($_SESSION['role'] == "Job Seeking"){
            echo "<script>
                alert('You Are A Job Seeker, You Can't Hire Anyone');
            </script>";
        }
    }
?>
<?php
    $id = $_GET['id']??"";
    $selquery = "SELECT * FROM hiring WHERE id = '$id'";
    $res = mysqli_query($connection,$selquery);
    while ($info = mysqli_fetch_array($res)){
?>       

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Booking</title>
    <link rel="stylesheet" href="booking.css">
    <style>
        /* Basic CSS for demo purposes */
        body {
            font-family: Arial, sans-serif;
            font-style: italic;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #000000;
            color: #fff;
            text-align: center;
            position: relative;
            width: 100%;
        }

        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10x;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            padding: 5px 10px;
        }

        .navbar ul li a:hover {
            color: orange;
            text-decoration: underline;
            /* border-radius: 5px; */
            transition: background-color 0.3s;
        }

        .logo {
            display: block;
            margin: 10px auto;
            max-width: 150px;
        }

        .hero {
           
            background-color: rgb(255, 255, 255);
            color: orange;
            padding: 50px 0;
            text-align: center;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            animation: fadeIn 1s ease-in-out forwards;
            height: auto;
            font-size: 1rem;

        }


         /* #home{
            background-image: url(./Painter.jpg);
            background-size: cover;
         } */



        .booking-form {
            background-color: #000000;
            color: white;
            padding: 10px;
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            display: inline-block;
            background-color: orange;
            color: rgb(255, 255, 255);
            padding: 10px 20px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn:hover {
            background-color: rgba(255, 166, 0, 0.911);
            transform: scale(1.05);
        }

        .hero-advertisement {
            position: relative;
            overflow: hidden;
        }

        .hero-advertisement .advertisement-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* semi-transparent black overlay */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
        }

       

        /* Keyframes for animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

      

        /* Modal CSS */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Contact section */
        .contact-section {
            background-color: white;
            padding: 50px 0;
            text-align: center;
        }

        .contact-section h2 {
            margin-bottom: 20px;
        }

        /* Footer */
        footer {
            background-color: #000000;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        footer p {
            margin: 0;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }


        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
        <a href="index.php">
        <img src="./brand4.png" alt="Logo" class="logo">

        </a>
        <nav class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php #services">Book Now</a></li>
                    <li><a href="index.php #contact">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="home" class="hero">
        <div class="container">
            <h2>Special Offer! <br>Book now and get 10% off on your first service. </h2>
        </div>
    </section>

    <section id="details">
        <h2 style="text-align: center;">Candidate Details</h2>
        <div id="outer">
            <div class="inner">
                <img src="<?php echo "$info[8]";?>" alt="">
            </div>
            <div class="inner">
                <p style='color: gray; margin-bottom: 0;'><?php 
                echo "$info[5]";?></p>
                <h2 style='margin-bottom: 0;'><?php 
                echo "$info[1]";?></h2>
                <button>View Resume</button>
                <p style='color: gray; margin-bottom: 0;'><b style='color: black;'>Level of education: </b><?php 
                echo "$info[9]";?></p>
                <p style=' margin-bottom: 0; color: gray;'><b style='color: black;'>Price: </b><?php 
                echo "$info[6]";?></p>
                <p style=' margin-bottom: 0; color: gray;'><b style='color: black;'>References: </b> <?php 
                echo "$info[12]";?> </p>
                <p style=' margin-bottom: 0; color: gray;'><b style='color: black;'>Available start date: </b> <?php 
                echo "$info[11]";?> </p>
                <p style=' margin-bottom: 0; color: gray;'><b style='color: black;'>Address: </b><?php 
                echo "$info[4]";?> </p>
                <p style=' margin-bottom: 0; color: gray;'><b style='color: black;'>Phone No: </b> +923132688912 </p>
                <p style=' margin-bottom: 0; color: gray;'><b style='color: black;'>Email address: </b> <?php 
                echo "$info[2]";?></p>
                <a href="user.php?id=<?php echo $id; ?>">
                <button>View On Profile</button>
                </a>



                
            </div>
        </div>
    
    </section>

    <section id="services" class="booking-form">
        <div class="container">
            <h3>Book a Service</h3>
            <form method="post" id="bookingForm">
                <div class="form-group">
                   <label for="serviceSelect">Select a Service:</label>
        <input type="hidden" name="service" value="<?php echo $info[5]; ?>">
        <select id="serviceSelect" style="background-color:white;" disabled>
            <option value="<?php echo $info[5]; ?>"><?php echo $info[5]; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="hidden" name="name" value="<?php echo $_SESSION['name'];  ?>">
        <input type="text" id="name"  disabled  placeholder="<?php echo $_SESSION['name']; ?>" style="background-color:white;" required>
    </div>

                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="time">Time:</label>
                    <input type="time" id="time" name="time" required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" placeholder="Enter your location" required>
                </div>
                <div class="form-group">
                    <label for="notes">Additional Notes:</label>
                    <textarea id="notes" name="notes" placeholder="Any additional information"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </section>
   
    <?php
            };
    ?>


    <section id="contact" class="contact-section">
        <div class="container">
            <h2>Contact Us</h2>
            <p>If you have any questions or need further assistance, feel free to contact us:</p>
            <ul>
                <li>Email: info@servicehub.com</li>
                <li>Phone: 123-456-7890</li>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Service Hub All rights reserved.</p>
        </div>
    </footer>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Your service booking has been booked!</p>
            <p>We will serve you shortly.</p>
            <button class="btn"><a href="booking.html">Book Another Person</a></button>
            <span>
                <button class="btn"><a href="index.html">Home Page</a></button>
            </span>
        </div>
    </div>

    <script>
        // JavaScript for opening and closing the modal
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        // JavaScript for smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const target = document.querySelector(this.getAttribute('href'));
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // JavaScript for form submission handling (placeholder)

    </script>
</body>
</html>

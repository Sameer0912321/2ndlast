<?php
  $conn = mysqli_connect("localhost","root","","service_hub");
  if($_SERVER['REQUEST_METHOD']== "POST"){
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $feedback= $_POST['feedback'];
    $insertion = "INSERT INTO feedback VALUES (null,'$name','$email','$feedback')";
    $result = mysqli_query($conn,$insertion);
    if($result){
      header('location:./index.php');
    }
    else{
      echo "Error";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Opportunities</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1,
        h2,
        h3 {
            color: orange;
            margin-top: 0;
        }

        /* Header Styles */
        .header {
            background-color: #000000;
            color: #fff;
            /* padding: 20px 0; */
            text-align: center;
            position: relative;
            width: 100%;
        }

        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 15px;
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
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .logo {
            display: block;
            margin: 10px auto;
            max-width: 150px;
            height: auto;
        }


        /* Hiring Details Styles */
        .hiring-details {
            background-color: #fff;
            padding: 40px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .job-listings {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .job-card {
            background-color: #fafafa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .job-card h3 {
            margin-bottom: 10px;
        }

        /* Hiring Form Styles */
        .hiring-form {
            background-color: #fff;
            padding: 40px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
            min-width: 250px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1em;
        }

        .form-group textarea {
            resize: vertical;
        }

        .submit-button {
            background-color: orange;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: rgba(255, 166, 0, 0.822);
        }

        /* Contact Section Styles */
        .contact-section {
            background-color: #fff;
            padding: 40px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            text-align: center;
        }

        .contact-section a {
            color: #000000;
            text-decoration: none;
            font-weight: bold;
        }

        .contact-section a:hover {
            font-weight: bold;
            color: orange;
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


        /* Footer Styles */
        .footer {
            background-color: #000000;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
        }

        .footer p {
            margin: 0;
        }

        /* Responsive Styles */
        @media (min-width: 768px) {
            .job-listings {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 992px) {
            .form-row {
                flex-wrap: nowrap;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container">
        <a href="index.php">
        <img src="./brand4.png" alt="Logo" class="logo">

        </a>
        <nav class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php #apply-now">Feedback form</a></li>
                    <li><a href="index.php #contact">Contact Us</a></li>
                </ul>
            </nav>


        </div>
    </header>

    <!-- Main Content Section -->
    <main>
        <!-- Hiring Details Section -->
        <section class="hiring-details" id="open-positions">
            <div class="container">
                <h2>Your Feedback Matters</h2>
                <p>We value your feedback and are always looking for ways to improve. If you have any suggestions or
                    comments about your experience with our website, please let us know. Your input helps us enhance our
                    services and provide you with a better experience.

                    Thank you for choosing Service Hub. We look forward to serving you!</p>


            </div>
        </section>

        <!-- Hiring Form Section -->
        <section class="hiring-form" id="apply-now">
            <div class="container">
                <div class="feedback-container">
                    <h1>Feedback Form</h1>
                    <form method="post" id="feedbackForm">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="feedback">Feedback:</label>
                            <textarea id="feedback" name="feedback" required></textarea>
                        </div>
                        <a href="index.php"> 
                        <button type="submit" class="submit-btn btn">Submit</button>

                        </a>
                    </form>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section" id="contact">
            <div class="container">
                <h2>Contact Us</h2>
                <p>If you have any questions about the application process or open positions, please contact our HR team
                    at <a href="mailto:hr@servicehub.com">hr@servicehub.com</a> or call us at (123) 456-7890.</p>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Service Hub. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // JavaScript for smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const target = document.querySelector(this.getAttribute('href'));
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });


    </script>



</body>







</html>
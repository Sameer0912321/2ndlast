<?php 
include './conn.php';
session_start();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $position = $_POST['position'];
    $price = $_POST['price'];
    $resume = $_FILES['resume']['name'];
    $tmpresume = $_FILES['resume']['tmp_name'];
    $path = "upload/" . $resume;
    $profile = $_FILES['profile']['name'];
    $tmpprofile = $_FILES['profile']['tmp_name'];
    $profilepath = "upload/" . $profile;


    if (move_uploaded_file($tmpresume, $path) && move_uploaded_file($tmpprofile, $profilepath)) {
        $coverletter = $_POST['coverletter'];
        $edu = $_POST['edu'];
        $experience = $_POST['experience'];
        $startdate = $_POST['startdate'];
        $reference = $_POST['reference'];

        $insertion = "INSERT INTO hiring VALUES(null, '$fullname', '$email', '$phone', '$address', '$position', '$price', '$path','$profilepath', '$coverletter', '$edu', '$experience', '$startdate', '$reference')";

        if ($res = mysqli_query($connection, $insertion)) {
            $sel = "SELECT * FROM hiring WHERE email = '$email'";
            $sm = mysqli_query($connection, $sel);
            $ressel = mysqli_fetch_assoc($sm);
            if ($ressel) {
                $_SESSION['hireId'] = $ressel['id'];
                $_SESSION['resume'] = $ressel['resume'];
                $_SESSION['address'] = $ressel['address'];
                $_SESSION['description'] = $ressel['coverletter'];
                $_SESSION['position'] = $ressel['position'];
                $_SESSION['profilehire'] = $ressel['profile'];

                header('Location: ./user.php');
                exit();  // Make sure to stop script execution after redirection
            }
        } else {
            echo "Error in inserting data: " . mysqli_error($connection);
        }
    } else {
        echo "Error in uploading the file.";
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
                    <li><a href="#apply-now">Apply Now</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>


        </div>
    </header>
    <h1 style="margin-top: 4px; width: 100%; display: flex; justify-content: center; align-items: center;">Join Our Team
    </h1>

    <!-- Main Content Section -->
    <main>
        <!-- Hiring Details Section -->
        <section class="hiring-details" id="open-positions">
            <div class="container">
                <h2>We're Hiring!</h2>
                <p>Explore exciting opportunities to join our innovative team. We are looking for talented individuals
                    who are passionate about their work and eager to make a difference. Review the available positions
                    below and find your perfect fit.</p>

                <!-- Job Listings -->
                <!-- <div class="job-listings">
                    <div class="job-card">
                        <h3>Software Engineer</h3>
                        <p>Responsibilities include developing scalable applications, collaborating with
                            cross-functional teams, and maintaining high code quality. Required skills: Python,
                            JavaScript, and React.</p>
                    </div>
                    <div class="job-card">
                        <h3>Project Manager</h3>
                        <p>Lead exciting projects with clear objectives and deliverables. Manage project resources,
                            timelines, and stakeholders effectively. Required skills: Leadership, communication, and
                            problem-solving.</p>
                    </div>
                    <div class="job-card">
                        <h3>Graphic Designer</h3>
                        <p>Produce engaging visual content for our digital platforms. Work closely with marketing teams
                            to enhance our brand. Required skills: Adobe Creative Suite, creativity, and attention to
                            detail.</p>
                    </div>
                    <div class="job-card">
                        <h3>Customer Support Specialist</h3>
                        <p>Provide exceptional support to our clients. Resolve issues efficiently and ensure customer
                            satisfaction. Required skills: Communication, patience, and problem-solving.</p>
                    </div>
                </div> -->
            </div>
        </section>

        <!-- Hiring Form Section -->
        <section class="hiring-form" id="apply-now">
            <div class="container">
                <h2>Apply Now</h2>
<form method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" value = <?php echo $_SESSION['name']?> id="name" name="fullname" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" value = <?php echo $_SESSION['email']?> id="email" name="email" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" value = <?php echo $_SESSION['phone']?> id="phone" name="phone" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="position">Service You Will Provide</label>
           <input type="text" name = 'position' placeholder="Enter Your Service">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="price">Enter Your Monthly Price In PKR</label>
           <input type="number" name = 'price' placeholder="Enter The Price">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="resume">Upload Resume</label>
            <input type="file" id="resume" name="resume">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="profilepic">Upload Your Picture For The Service</label>
            <input type="file" id="image" name="profile">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="cover-letter">About You</label>
            <textarea id="cover-letter" name="coverletter" rows="4" required placeholder="My name is Abdullah and i can clean homes.. etc"></textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="edu">Highest Level of Education</label>
            <select id="education" name="edu" required>
                <option value="">Select Education Level</option>
                <option value="high-school">High School Diploma</option>
                <option value="associate-degree">Associate Degree</option>
                <option value="bachelor-degree">Bachelor's Degree</option>
                <option value="master-degree">Master's Degree</option>
                <option value="doctorate">Doctorate</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="experience">Years of Experience in the Relevant Field</label>
            <input type="number" id="experience" name="experience" min="0" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="availability">Available Start Date</label>
            <input type="date" id="availability" name="startdate" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="references">Name Of References (Optional)</label>
            <textarea id="references" name="reference" rows="3" placeholder="Provide names of a reference"></textarea>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="submit-button">Submit Application</button>
</div>
</form>

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
            anchor.addEventListener('click', function(e) {
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

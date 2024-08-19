<?php
  include './conn.php';
  session_start();
?>
<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $selquery = "SELECT * FROM signup WHERE email = '$email'";
    $ressel = mysqli_query($connection,$selquery);
    $row = mysqli_fetch_assoc($ressel);
    if($email == "admin@gmail.com" && $pass == "admin123" ){
      header('location:./dashboard.html');
    }
    else{
      if(password_verify($pass,$row['pass'])){
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['nic'] = $row['nic'];
        $_SESSION['phone'] = $row['pho'];
        $_SESSION['age'] = $row['age'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['photo'] = $row['profilePicture'];



        if(isset($_GET['from']) && $_GET['from'] == "creation"){
          header('location:./career.php');

          exit();
      }
      if(isset($_GET['from']) && $_GET['from'] == "sendusertoservice"){
        header('location:./services.php');

        exit();
    }
      if(isset($_GET['from']) && $_GET['from'] == "tobooking"){
        header('location:./booking.php');

        exit();
    }
      if(isset($_GET['from']) && $_GET['from'] == "senduser"){
        header('location:./user.php');

        exit();
    }
    if(isset($_GET['from']) && $_GET['from'] == "toservice"){
      header('location:./services.php');

      exit();
  }
    
    if(isset($_GET['from']) && $_GET['from'] == "tocareer"){
      header('location:./user.php');

      exit();
  }
        if($row['role'] == "Job Seeking"){
          header('location:./career.php');
          exit();
          
        }
        else if($row['role'] == "Hiring"){
          header('location:./services.php');
          exit();
        
        }
      }
      else{

      }
  
    }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Services Hub</title>
    <link rel="stylesheet" href="login.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>

<!-- login outer -->
   <div class="login-outer">

    <div class="login-img">
      <img src="./assets/login vector.jpg" height="450px" width="auto" alt="">
    </div>

    <!-- form start -->
    <div class="form-container">
      <form method = "post">
        <h2>Login</h2>

        <div class="input-outer">
          <input type="email" class="input-field" id="form2Example1" name="email" />
          <label for="Name" class="input-label">Email</label>
          <p id="emailerror" class="error"></p>

        </div>

        <div class="input-outer">
            <input type="password" class="input-field" id="form2Example2" name="pass" />
            <label for="Name" class="input-label">Password</label>
          <p id="passerror" class="error"></p>
        </div>

        <div id="msg" class="error" style="padding-bottom: 0.5em; text-align: center;"></div>
        <button  type="submit" id="login-btn">Login</button>
       
        <div class="switch-form">
            <p style="font-weight: bold; border-top: 1px solid black; padding-top: 1em;">Don't have an account? <a href="signup.php" style="text-decoration: underline;">Register</a></p>
        </div>
      </form>
    </div>
   </div>


    <script src="login.js"></script>

    
    <script>

      let inputFields = document.querySelectorAll('.input-field');
      let inputLabels = document.querySelectorAll('.input-label');
      
      inputFields.forEach((inputField, index) => {
        let inputLabel = inputLabels[index];
      
        inputField.addEventListener('input', () => {
          if (inputField.value !== '') {
            inputLabel.style.top = '1px';
          } else {
          inputLabel.style.top = '20px';
          }
        });
      
        if (inputField.value !== '') {
          inputLabel.style.top = '1px';
        } else {
          inputLabel.style.top = '20px';
        }
      });
      
      
      
          </script>
  </body>
</html>

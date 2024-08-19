<?php
  include './conn.php';
?>
<?php
  if($_SERVER['REQUEST_METHOD'] == "POST" ){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $nic = $_POST['nic'];
    $pho = $_POST['pho'];
    $dates = $_POST['dates'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $hashpass = password_hash($pass,PASSWORD_DEFAULT);
    $hashcpass = password_hash($cpass,PASSWORD_DEFAULT);
    if($pass == $cpass){
      $check = "SELECT * FROM signup WHERE email = '$email'";
      $rescheck = mysqli_query($connection,$check);
      if(mysqli_num_rows($rescheck) > 0){
        echo "Email Already Exists";
      }
      else{
        $insertion = "INSERT INTO signup VALUES (null,'$name ', '$email','$hashpass','$hashcpass','$nic','$pho','$dates','$age','$gender','$role',null)";
        $res = mysqli_query($connection,$insertion);
        if($res){
          header('location:./login.php');
        }
        else{
          echo"Not Inserted";
        }

      }     
    }
    else{
      echo "Passwords not matched";
    }
    


  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup - Services Hub</title>
    <link rel="stylesheet" href="signup.css" />
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
 
 

<!-- signup outer -->
<div class="outer-div">

  <div class="inner-img">
    <img src="./assets/signup vector.jpg" height="450px" width="auto" alt="">
  </div>

 <!-- form start -->
 <div class="form-container">
  <form method="post">
    <h2>Signup</h2>

    <div class="input-outer">
      <input type="text" class="input-field" id="fullname" name = 'name' />
      <label for="Name" class="input-label">Name</label>
      <p id="nameerror" class="error"></p>
    </div>

    <div class="input-outer">
      <input type="email" id="email" class="input-field" name = 'email' />
      <label for="Email" class="input-label">Email</label>
      <p id="emailerror" class="error"></p>
    </div>

    <div class="input-outer">
      <input type="password" id="pass" class="input-field" name = 'pass'  />
      <label for="Password" class="input-label">Password</label>
      <p id="passerror" class="error"></p>
    </div>
    <div class="input-outer">
      <input type="password" id="pass" class="input-field"name = 'cpass'  />
      <label for="Password" class="input-label">Confirm Password</label>
      <p id="passerror" class="error"></p>
    </div>

    <div class="input-outer">
      <input type="text" id="cnic" class="input-field" name = 'nic' />
      <label for="CNIC" class="input-label">CNIC</label>
      <p id="cnicerror" class="error"></p>
    </div>

  <div style="display: flex; gap: 1em">
    <div>
      <select id="countryCode" name="countryCode">
        <option value="+1">+92</option>
        <option value="+44">+44</option>
        <option value="+91">+91</option>
        <option value="+61">+61</option>
        <option value="+81">+81</option>
        <option value="+33">+33</option>
        <option value="+49">+49</option>
        <option value="+55">+55</option>
        <option value="+7">+7</option>
        <option value="+86">+86</option>
        <option value="+92">+1</option>
    </select>
      <p id="numerror" class="error"></p>
    </div>

    <div class="input-outer">
      <input type="text" id="phoneNumber" class="input-field" name='pho' />
      <label for="PhoneNumber" class="input-label">PhoneNumber</label>
      
    </div>
  </div>
   

  <div class="input-outer">
    <input type="date" id="d-o-b" class="input-field" name='dates' />
    <!-- <label for="Name" class="input-label">Name</label> -->
    <p id="cnicerror" class="error"></p>
  </div>

    <div style="display: flex; align-items: center; gap: 1em">
      <div class="input-outer">
        <input type="number" id="age" class="input-field" name='age'  />
      <label for="Age" class="input-label">Age</label>
        <p id="ageerror" class="error"></p>
      </div>


      <div>
        <select id="gender" name='gender'>
          <option value="Gender">Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
    </div>
    <div>
      <select id="role" name="role" style="width: 100%; margin-top: 0.5em;">
        <option value="">I'm here for...</option>
        <option value="Hiring">Hiring</option>
        <option value="Job Seeking">Job Seeking</option>
      </select>
    </div>

    <div id="msg" class="error" style="padding-bottom: 0.5em; text-align: center;"></div>
    

    <button type="submit" id="signup-btn" >Sign Up</button>

    <div class="switch-form">
      <p style="font-weight: bold; border-top: 1px solid black; padding-top: 1em;" id="already">Already have an account? <a href="login.php" style="text-decoration: underline;">Login here</a></p>
    </div>
  </form>
</div>
</div>



   
    
    <script>

let inputFields = document.querySelectorAll('.input-field');
let inputLabels = document.querySelectorAll('.input-label');

inputFields.forEach((inputField, index) => {
  let inputLabel = inputLabels[index];

  inputField.addEventListener('input', () => {
    if (inputField.value !== '') {
      inputLabel.style.top = '-3px';
    } else {
    inputLabel.style.top = '20px';
    }
  });

  if (inputField.value !== '') {
    inputLabel.style.top = '-3px';
  } else {
    inputLabel.style.top = '20px';
  }
});



    </script>

    <script src="signup.js"></script>
  </body>
</html>

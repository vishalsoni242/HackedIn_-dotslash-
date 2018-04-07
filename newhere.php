<?php
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $db     = 'healthify';
  $link  = mysqli_connect($dbhost,$dbuser,'',$db);
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $name = mysqli_real_escape_string($link,$_POST['name']);
    $contact = mysqli_real_escape_string($link,$_POST['contact']);
    $gender = mysqli_real_escape_string($link,$_POST['gender']);
    $dob = mysqli_real_escape_string($link,$_POST['dob']);
    $bg = mysqli_real_escape_string($link,$_POST['bg']);
    //$email = mysqli_real_escape_string($link,$_POST['email']);
    $sql = "INSERT INTO patients Values ('$email','$password','$name','$dob','$contact','$gender','$bg')";
    if(mysqli_query($link,$sql)) {
      echo "success";
      header("location: index.php");
    } else {
      echo "fail";
    }


  }
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Healthify</title>

  <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

      <link rel="stylesheet" href="css/style.css">


</head>

<body>

  <div class="container_n">
  <div class="content-container">
  <form action="" method = "post">
    <label for="name">Name</label><br>
    <input name="name" type="text" placeholder="Tim Cook" required>

    <label for="contact">Contact</label><br>
    <input name="contact" type="contact" placeholder="9876543210" required>

    <label for="email">E-mail</label><br>
    <input name="email" type="text" placeholder="example@gmail.com" required>

    <label for="password">Password</label><br>
    <input name="password" type="password" placeholder="*****" pattern=".{3,10}" title="Password should be between 3 and 10 characters.">

    <label for="gender">Gender</label><br>
    <input name="gender" type="text" placeholder="M" required>

    <label for="dob">DOB</label><br>
    <input name="dob" type="text" placeholder="24/02/1999" required>

    <label for="bg">Blood_Group</label><br>
    <input name="bg" type="text" placeholder="O+" required>
    <button class="login">SIGN UP</button>
    </form>

    <!-- <button class="media fb"><i class="fa fa-facebook" aria-hidden="true"></i></button>
    <button class="media g"><i class="fa fa-google" aria-hidden="true"></i></button> -->
  </div>
</div>



</body>

</html>

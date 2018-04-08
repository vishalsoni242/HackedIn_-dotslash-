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
    $contact = mysqli_real_escape_string($link,$_POST['address']);
    $gender = mysqli_real_escape_string($link,$_POST['specialization']);
    $dob = mysqli_real_escape_string($link,$_POST['hospital']);
    //$bg = mysqli_real_escape_string($link,$_POST['bg']);
    //$email = mysqli_real_escape_string($link,$_POST['email']);
    $sql = "INSERT INTO doctor Values ('$email','$name','$password','$dob','$contact','$gender')";
    if(mysqli_query($link,$sql)) {
      //echo "success";
      $msg = "Registration Done";
      //echo "<script type='text/javascript'> alert('$msg'); location: index.php </script>";
      //header("location: index.php");
      echo "<script type=\"text/javascript\">
      alert(\"Registration Done\");
      location=\"profile.html\";
      </script>";
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

      <link rel="stylesheet" href="css/style2.css">


</head>

<body>

  <div class="container_n">
  <div class="content-container">
  <form action="" method = "post">

    <label for="name">Name</label><br>
    <input name="name" type="text" placeholder="Tim Cook" required>

    <label for="email">E-mail</label><br>
    <input name="email" type="text" placeholder="D001" required>

    <label for="password">Password</label><br>
    <input name="password" type="password" placeholder="*****" pattern=".{3,10}" title="Password should be between 3 and 10 characters.">

    <label for="hospital">Hospital</label><br>
    <input name="hospital" type="text" placeholder="Hospital Name" required>

    <label for="address">Address</label><br>
    <input name="address" type="text" placeholder="Address" required>

    <label for="specialization">Specialization</label><br>
    <input name="specialization" type="text" placeholder="Dentist" required>
    <button class="login">SIGN UP</button>
    </form>

    <!-- <button class="media fb"><i class="fa fa-facebook" aria-hidden="true"></i></button>
    <button class="media g"><i class="fa fa-google" aria-hidden="true"></i></button> -->
  </div>
</div>



</body>

</html>

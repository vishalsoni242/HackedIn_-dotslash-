<?php
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $db     = 'healthify';
  $link  = mysqli_connect($dbhost,$dbuser,'',$db);
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $sql = "SELECT email FROM patients WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if($count == 1) {
         //session_register("email");
         //$_SESSION['login_user'] = $email;
         $_SESSION['login_user']= $email;
         echo $_SESSION['login_user'];
         //if(isset($_SESSION['login-user']))
        header("location: \login\profile.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo "<script type=\"text/javascript\"> alert(\"Invalid email or password\") </script>";
         //echo $error;
      }
  }
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Healthify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

      <link rel="stylesheet" href="css/style.css">
  <script>
          function openWin() {
              window.open("/login/newhere.php");
          }
  </script>
  <style>
  #hello{
    padding-left:10px;
  }
  </style>
  <br /> <br /> <br /> <br /> <br />
  <div id="hello" align="center">
  <h1 style="color:#00ff00">Patient's Login</h1>
</div>
</head>

<body>

  <div class="container">
  <div class="content-container">
    <form action="" method = "post">
      <label for="email">E-mail</label><br>
      <input name="email" type="text" placeholder="example@gmail.com" required>
      <label for="password">Password</label><br>
      <input name="password" type="password" placeholder="*****" pattern=".{3,10}" title="Password should be between 3 and 10 characters.">
    <!-- <a class="frg-password" href="#">Forgot password ?</a><br> -->
    <button class="login">LOG IN</button>
    <input type="button" value="New Here ?" class="new" onclick="openWin()">
    </form>

    <!-- <button class="media fb"><i class="fa fa-facebook" aria-hidden="true"></i></button>
    <button class="media g"><i class="fa fa-google" aria-hidden="true"></i></button> -->
  </div>
</div>



</body>

</html>

<?php
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $db     = 'healthify';
  $link  = mysqli_connect($dbhost,$dbuser,'',$db);
  session_start();
  if(!isset($_SESSION['login_userd'])) {
    header('location:\login\doctor.php');
  }
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $date = mysqli_real_escape_string($link,$_POST['date']);
    $disease = mysqli_real_escape_string($link,$_POST['disease']);
    $medicines = mysqli_real_escape_string($link,$_POST['medicines']);
    $diagnosis = mysqli_real_escape_string($link,$_POST['diagnosis']);
    //$dob = mysqli_real_escape_string($link,$_POST['dob']);
    //$bg = mysqli_real_escape_string($link,$_POST['bg']);
    //$email = mysqli_real_escape_string($link,$_POST['email']);
    $emaild = $_SESSION['login_userd'];
    $sql = "INSERT INTO patient_data Values ('$emaild','$email','$date','$disease','$medicines','$diagnosis')";
    if(mysqli_query($link,$sql)) {
      //echo "success";
      $msg = "Inserted successfully";
      //echo "<script type='text/javascript'> alert('$msg'); location: index.php </script>";
      //header("location: index.php");
      echo "<script type=\"text/javascript\">
      alert(\"Inserted successfully\");
      //location=\"index.php\";
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

      <link rel="stylesheet" href="css/style.css">


</head>

<body>

  <div class="container_n">
  <div class="content-container">
  <form action="" method = "post">
    <label for="email">Email of Patient</label><br>
    <input name="email" type="text" placeholder="abc@xyz.com" required>

    <label for="date">Date</label><br>
    <input name="date" type="date" placeholder="2018-04-08" required>

    <label for="disease">Disease</label><br>
    <input name="disease" type="text" placeholder="Fever" required>

    <label for="diagnosis">Diagnosis</label><br>
    <input name="diagnosis" type="text" placeholder="Treatment" required>

    <label for="medicines">Medicines</label><br>
    <input name="medicines" type="text" placeholder="Crocin" required>

    <button class="login">Insert</button>
    </form>

    <br /> <br />
    <button class="login" onclick="openOut()">Logout</button>
    <script>
    function openOut() {
      location="/login/home.html";
    }
    </script>

    <!-- <button class="media fb"><i class="fa fa-facebook" aria-hidden="true"></i></button>
    <button class="media g"><i class="fa fa-google" aria-hidden="true"></i></button> -->
  </div>
</div>



</body>

</html>

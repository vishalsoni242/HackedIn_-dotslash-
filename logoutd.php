<?php
  session_start();

  if(session_destroy())
  header("location:home.html");
  //echo $_SESSION['login_user'];
  /*if(isset($_SESSION['login_user'])) {
    unset($_SESSION['login_user']);
  }*/
?>

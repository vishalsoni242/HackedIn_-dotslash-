<?php
  //session_destroy();
  if(isset($_SESSION['login_user'])) {
    unset($_SESSION['login-user']);
  }
?>

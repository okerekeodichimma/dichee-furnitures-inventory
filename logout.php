<?php
session_destroy();    
// Logout function

  unset($_SESSION['username']);
  header('Location: login.php');
?>
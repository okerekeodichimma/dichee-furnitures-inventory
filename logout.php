<?php
session_start();    
// Logout function

  unset($_SESSION['username']);
  header('Location: login.php');
?>
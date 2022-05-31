<?php
   session_start();
   unset($_SESSION['login']);
   unset($_SESSION['cID']);
   unset($_SESSION['name']);
   unset($_SESSION['account']);
   unset($_SESSION['password']);
   unset($_SESSION['phone']);
   unset($_SESSION['address']);
   header("Location: index.php");
   
?>
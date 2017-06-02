<?
  session_start();

  unset($_SESSION['cart']);

  header("location: user-item-list.php");

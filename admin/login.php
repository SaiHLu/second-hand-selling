<?
 session_start();

 $name = $_POST['name'];
 $password = $_POST['password'];

 if ($name == 'admin' and $password == 'sai1997118'){
 	$_SESSION['auth'] = true;
 	header("location: item-list.php");
 }else{
 	header("location: index.php?login=failed");
 }
<?
	session_start();
	include("admin/confs/config.php");

	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];

	$result = mysqli_query($conn, "INSERT INTO users (name, email, address, phone, created_date, modified_date) VALUES ('$name', '$email', '$address', '$phone', now(), now() )");

	$_SESSION['id'] = mysqli_insert_id($conn);

	header("location: user-insert-items.php");

<?
	session_start();
	include("admin/confs/config.php");

	$email = $_POST['email'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT * FROM users");
	while($row = mysqli_fetch_assoc($result)) {
		if($row['email'] == "$email" and $row['password'] == "$password" ) {
			$_SESSION['id'] = $row['id'];
			header("location: user-insert-items.php");
			exit();
		}else {
			header("location: login.php?login=failed");
		}
	}
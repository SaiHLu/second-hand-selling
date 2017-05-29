<?
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "second_hand_selling";

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

	mysqli_select_db($conn, $dbname);
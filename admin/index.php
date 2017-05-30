<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Admin Login</h1>

	<div class="form">
		<? if (isset($_GET['login']) and $_GET['login']=="failed"):?>
		<div class="login-fail">Please Check Your User Name Or Password! </div>
		<?endif;?>
		<form action="login.php" method="post">
			<label for="name">Name</label>
			<input type="text" name="name" id="name">

			<label for="password">Password</label>
			<input type="password" name="password" id="password">

			<input type="submit" value="Login" name="login">
		</form>
	</div>
</body>
</html>
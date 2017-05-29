<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Login</h1>

	<div class="form">
		<form action="login-process.php" method="post">
			<? if(isset($_GET['login']) and $_GET['login'] == 'failed'):?>
				<div class="error">Please check your name or password and try again!</div>
			<?endif;?>
			<label for="email">Email</label>
			<input type="text" name="email" id="email" placeholder="Your email">

			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="Your password">

			<input type="submit" value="Login" name="Login">
			<a href="sign.php" class="have">Don't have account? Sign Up</a>
		</form>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script>
		$(function(){
			$("form").validate({
				rules: {
					"email": {
						required: true,
						email: true
					},
					"password": "required"
				},
				messages: {
					"email": {
						required: "Please provide email address",
						email: "Email should be a valid email"
					},
					"password": "Please provide your password"
				}
			});
		});
	</script>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Sign Up</h1>

	<div class="form">
		<form action="process.php" method="post">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" placeholder="Your name">

			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="Password">

			<label for="email">Email</label>
			<input type="text" name="email" id="email" placeholder="Your email">

			<label for="address">Address</label>
			<textarea id="address" name="address" placeholder="Your address"></textarea>

			<label for="phone">Phone No.</label>
			<input type="text" name="phone" id="phone" placeholder="Your phone no.">

			<input type="submit" value="Sign Up" name="signUp">
			<a href="login.php" class="have">Already have account?</a>
		</form>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script>
		$(function(){
			$("form").validate({
				rules: {
					"name": "required",
					"password": "required",
					"email": {
						required: true,
						email: true
					},
					"address": "required",
					"phone": "required"
				},
				messages: {
					"name": "Please provide your name",
					"password": "Please provide your password",
					"email": {
						required: "Please provide email address",
						email: "Email should be a valid email"
					},
					"address": "Please provide your address",
					"phone": "Please provide your phone no."
				}
			});
		});
	</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>New Category</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>New Category</h1>

	<form action="cat-add.php" method="post">
		<label for="name">Cateogry Name</label>
		<input type="text" name="name" id="name" placeholder="Category Name">

		<label for="remark">Remark</label>
		<textarea name="remark" id="remark" placeholder="Remark"></textarea>

		<input type="submit" name="add" value="Add">
	</form>

	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script>
		$(function(){
			$("form").validate({
				rules: {
					"name": "required"
				},
				messages: {
					"name": "Please provide category's name"
				}
			});
		});
	</script>
</body>
</html>
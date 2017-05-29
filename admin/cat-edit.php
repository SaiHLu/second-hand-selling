<?
	include("confs/config.php");

	$id = $_GET['id'];

	$result = mysqli_query($conn, "SELECT * FROM categories WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Category</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Edit Category</h1>

	<form action="cat-update.php" method="post">
		<input type="hidden" name="id" value="<?= $row['id']; ?>">

		<label for="name">Cateogry Name</label>
		<input type="text" name="name" id="name" value="<?= $row['name'];?>">

		<label for="remark">Remark</label>
		<textarea name="remark" id="remark"><?= $row['remark']; ?></textarea>

		<input type="submit" name="add" value="UPDATE">
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
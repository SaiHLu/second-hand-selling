<?
	include("confs/config.php");

	$result = mysqli_query($conn, "SELECT * FROM categories");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>New Item</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>New Item</h1>

	<form action="item-add.php" method="post" enctype="multipart/form-data">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" placeholder="Your name">

		<label for="desc">Description</label>
		<textarea name="desc" id="desc" placeholder="Your description"></textarea>

		<label for="category_id">Category</label>
		<select id="category_id" name="category_id">
			<option value="0">--Choose Category--</option>

			<? while($row = mysqli_fetch_assoc($result)): ?>
			<option value="<?= $row['id'];?>">
				<?= $row['name'];?>
			</option>
			<?endwhile;?>
		</select>

		<? 
			$id = $_GET['id'];
			$user = mysqli_query($conn, "SELECT * FROM users WHERE id = $id"); 
			$user_detail = mysqli_fetch_assoc($user);
		?>
		<input type="hidden" id="id" name="id" value="<?= $row['id']; ?>">

		<label for="cover">Covers</label>
		<input type="file" id="cover" name="cover">

		<input type="submit" class="add" value="Upload">
	</form>
</body>
</html>
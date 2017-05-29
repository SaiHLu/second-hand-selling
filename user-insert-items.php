<?
	session_start();
	include("admin/confs/config.php");

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

	<div class="form">
		<form action="user-item-add.php" method="post" enctype="multipart/form-data">
			<label for="model">Object's Name</label>
			<input type="text" name="model" id="model" placeholder="Object's name">

			<label for="desc">Description</label>
			<textarea name="desc" id="desc" placeholder="Your description"></textarea>

			<label for="price">Price</label>
			<input type="text" id="price" name="price" placeholder="Price">

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
					$id = $_SESSION['id'];
					
					$user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'"); 
					$user_detail = mysqli_fetch_assoc($user);
				
			?>
			<input type="hidden" id="id" name="id" value="<?= $user_detail['id']; ?>">

			<label for="cover">Covers</label>
			<input type="file" id="cover" name="cover">

			<input type="submit" class="add" value="Upload">
		</form>
	</div>
</body>
</html>
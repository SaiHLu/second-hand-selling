<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Category List</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Category List</h1>

	<ul class="menu">
		<li><a href="item-list.php">Manage Items</a></li>
		<li><a href="cat-list.php">Manage Categories</a></li>
		<li><a href="orders.php">Manage Orders</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>

	<ul class="list">
		<? 
			include("confs/config.php");
			$result = mysqli_query($conn, "SELECT * FROM categories");
			while($row = mysqli_fetch_assoc($result)):
		?>
		<li title="<?= $row['remark'];?>">
			[<a href="cat-del.php?id=<?= $row['id']; ?>" onclick="return confirm('Are You Sure?');" class="del">del</a>]
			[<a href="cat-edit.php?id=<?= $row['id']; ?>" class="edit">edit</a>]
			<?= $row['name'];?>
		</li>
		<?endwhile;?>
		
	</ul>

	<a href="cat-new.php" class="add">New Category</a>
	<div style="clear: both;"></div>
</body>
</html>
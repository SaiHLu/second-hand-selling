<? include("confs/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Items List</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Items List</h1>

	<ul class="menu">
		<li><a href="item-list.php">Manage Items</a></li>
		<li><a href="cat-list.php">Manage Categories</a></li>
		<li><a href="orders.php">Manage Orders</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>

	<ul class="main">
		<?
			$result = mysqli_query($conn, "SELECT items.*, users.name FROM items INNER JOIN users ON items.user_id = users.id ") ;

			while($row = mysqli_fetch_assoc($result)):
		?>
			<li>
				<? if(!is_dir("../covers/{$row['cover']}") and file_exists("../covers/{$row['cover']}")): ?>
				<img src="../covers/<?= $row['cover']; ?>" alt="" align="right" height="150">
				<?else:?>
				<img src="../covers/no-cover.gif" alt="" align="right" height="150">
				<?endif;?>

				<h2><?= $row['model']; ?></h2>
				<i><?= $row['name']; ?></i>
				<span>($<?= $row['price']; ?>)</span>
				<p><?= $row['description']; ?></p>

				[<a href="item-del.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')" class="del">del</a>]
				[<a href="item-detail.php?id=<?= $row['id']; ?>">detail</a>]
				<div style="clear: both"></div>
			</li>

		<?endwhile;?>
	</ul>
</body>
</html>
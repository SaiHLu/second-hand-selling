<?
	include("confs/config.php");

	#pagination
	$total = mysqli_query($conn, "SELECT id FROM items");
	$total = mysqli_num_rows($total);

	$start = 0;
	$limit = 3;

	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}

	$next = $start + $limit;
	$previous = $start - $limit;
?>
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
			$result = mysqli_query($conn, "SELECT items.*, users.name FROM items LEFT JOIN users ON items.user_id = users.id ORDER BY created_date DESC LIMIT $start, $limit") ;

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

				[<a href="item-del.php?item_id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')" class="del">del</a>]
				[<a href="item-detail.php?item_id=<?= $row['id']; ?>">detail</a>]
				<div style="clear: both"></div>
			</li>

		<?endwhile;?>
	</ul>

	<div class="pagination">
		<? if($previous < 0): ?>
			<span class="prev">&laquo;Prev</span>
		<?else:?>
			<a href="?start=<?= $previous; ?>" class="prev">&laquo;Prev</a>
		<?endif;?>

		<? if($next >= $total): ?>
			<span class="next">&raquo;Next</span>
		<?else:?>
			<a href="?start=<?= $next; ?>" class="next">&raquo;Next</a>
		<?endif;?>
	</div>

	<div style="clear: both;"></div>
</body>
</html>

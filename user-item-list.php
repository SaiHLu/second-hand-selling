<?
	session_start();
	include("admin/confs/config.php");

	$sql = mysqli_query($conn, "SELECT * FROM categories");

	$cart = 0;
	if(isset($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $qty){
			$cart += $qty;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>USER ITEM LIST</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>User Items List</h1>
	<div class="info"><a href="view-cart.php"> (<?= $cart; ?>) items in your cart</a></div>

	<div class="sidebar">
		<ul class="cats">
			<li>
				<a href="user-item-list.php">All Categories</a>
			</li>
			<?
				while($cat = mysqli_fetch_assoc($sql)):
			?>
			<li>
				<a href="user-item-list.php?id=<?= $cat['id']; ?>"><?= $cat['name']; ?></a>
			</li>
			<?endwhile;?>
		</ul>
	</div>

	<div class="main">
		<ul class="item-list">
			<?
			#pagination

			$total = mysqli_query($conn, "SELECT id FROM items");
			$total = mysqli_num_rows($total);

			$limit = 6;
			$start = 0;

			if(isset($_GET['start'])){
				$start = $_GET['start'];
			}

			$next = $start + $limit;
			$prev = $start - $limit;
			#end pagination

			if(isset($_GET['id'])){
				$id = $_GET['id'];

				$sql = mysqli_query($conn, "SELECT * FROM items WHERE category_id = $id ORDER BY created_date DESC LIMIT $start,$limit");
			}else{
				$sql = mysqli_query($conn, "SELECT * FROM items ORDER BY created_date DESC LIMIT $start,$limit");
			}

			while($row = mysqli_fetch_assoc($sql)):
			?>
			<li>
					<? if(!is_dir("covers/{$row['cover']}") and file_exists("covers/{$row['cover']}")): ?>
					<img src="covers/<?= $row['cover'];?>" alt="" height="150">
					<?else:?>
						<img src="covers/no-cover.gif" alt="" height="150">
					<?endif;?>

					<h2><?= $row['model']; ?></h2>
					<i>(<?= $row['price']; ?>)</i>

					<a href="add-to-cart.php?id=<?= $row['id']; ?>" class="add">Add to cart</a>
			</li>
			<?endwhile;?>
		</ul>

		<div class="pagination">
			<? if($prev < 0): ?>
				<span class="prev">&laquo;Prev</span>
			<?else:?>
				<a href="?start=<?= $prev; ?>" class="prev">&laquo;Prev</a>
			<?endif;?>
			<? if($next >= $total): ?>
				<span class="next">&raquo;Next</span>
			<?else:?>
				<a href="?start=<?= $next; ?>" class="next">&raquo;Next</a>
			<?endif;?>
		</div>
	</div>
	<div style="clear: both;"></div>

	<div class="footer">
		<?= date("Y")?> copyright&copy;. All right reserved.
	</div>
</body>
</html>

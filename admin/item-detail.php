<? 	session_start();
	include("confs/config.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Item Detail</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Item Detail</h1>

	<a href="item-list.php" class="back">&laquo;Go Back</a>

	<ul class="detail">
		<? 
			$id = $_GET['item_id'];
			$result = mysqli_query($conn, "SELECT * FROM items WHERE id = $id");
			$row = mysqli_fetch_assoc($result);
		?>
		<li>
			<? if(!is_dir("../covers/{$row['cover']}") and file_exists("../covers/{$row['cover']}")): ?>
				<img src="../covers/<?= $row['cover']; ?>" alt="" align="left" height="150">
			<?else:?>
				<img src="../covers/no-cover.gif" alt="" align="left" height="150">
			<?endif;?>
			<h2><?= $row['model']; ?></h2>
			<? 
				$user_id = $_SESSION['id'];
				$user = mysqli_query($conn, "SELECT name FROM users WHERE id = $user_id");
				$user_detail = mysqli_fetch_assoc($user);
			?>
			<i><?= $user_detail['name']; ?></i>
			<span>$(<?= $row['price']; ?>)</span>
			<p><?= $row['description']; ?></p>
		</li>
	</ul>
</body>
</html>
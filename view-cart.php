<?
	session_start();
	include("admin/confs/config.php");

  if(!isset($_SESSION['cart'])){
    header("location: user-item-list.php");
  }

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
      <li><a href="user-item-list.php" class="continue">&laquo; Continue Shopping</a></li>
      <li><a href="clear-cart.php" class="clear">&times; Clear</a></li>
		</ul>
	</div>

	<div class="main">


	</div>

	<div style="clear: both;"></div>

	<div class="footer">
		<?= date("Y")?> copyright&copy;. All right reserved.
	</div>
</body>
</html>

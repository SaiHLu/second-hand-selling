<? 
	session_start();
	include("admin/confs/config.php");

	$user_id = $_POST['id'];
	$model = $_POST['model'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	$category_id = $_POST['category_id'];
	$cover = $_FILES['cover']['name'];
	$tmp_name = $_FILES['cover']['tmp_name'];

	if($cover){
		move_uploaded_file("$tmp_name", "covers/$cover");

		mysqli_query($conn, "INSERT INTO items (model, description, price, category_id, user_id, cover, created_date, modified_date) VALUES ('$model', '$desc', '$price', $category_id, $user_id, '$cover', now(), now() )");
	}else{
		mysqli_query($conn, "INSERT INTO items (model, description, price, category_id, user_id, created_date, modified_date) VALUES ('$model', '$desc', '$price', $category_id, $user_id, now(), now() )");
	}

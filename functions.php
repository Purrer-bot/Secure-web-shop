<?php
function hw(){
	echo "Поделочные и драгоценные камни";
	}
// Информация для всех страниц
function get_all($conn){
	$sql = "SELECT `goods`.id, title, description, price, image_url FROM `goods` inner join `goods_image` on `goods_image`.id_good = `goods`.id";
	$result = $conn->query($sql);
	return $result;
}
// Информация на отдельной странице
function get_info($id, $conn){

	$sql = "SELECT title, description, price, image_url  FROM `goods` inner join `goods_image` where `goods`.id='$id' and `goods`.id = id_good;" ;
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
	return $row;
}
function get_main_menu($conn){
	$sql = "SELECT id, name from category where category_id is NULL";
	$result = $conn->query($sql);
  return $result;
}
function get_sub_menu($id, $conn){
	$sql = "SELECT id, name from category where category_id = '$id'";
	$result = $conn->query($sql);
	// $row = mysqli_fetch_array($result);
  return $result;
}
function get_category_info($id, $conn){
	 $sql = "SELECT `goods`.id, title, description, price, image_url FROM `goods` inner join `goods_image` on `goods_image`.id_good = `goods`.id where id_category = '$id'";
	 $result = $conn->query($sql);
	 return $result;
}
function get_commentary($id, $conn){
	$sql = "SELECT username, comm_text, send_date FROM `commentary` where goods_id = '$id'";
	$result = $conn->query($sql);
	return $result;
}
function send_commentary($username, $good_id, $text, $conn){
	// echo $username;
	// echo $good_id;
	// echo $text;
	$sql = "INSERT INTO `commentary` (`id`, `username`, `comm_text`, `send_date`, `goods_id`) VALUES (NULL, '$username', '$text', NULL, '$good_id')";
	$result = $conn->query($sql);
	return $result;
}
?>

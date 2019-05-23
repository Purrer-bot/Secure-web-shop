<?php
	session_start();
  require_once("db_connector.php");
	require_once("functions.php");
	if(!empty($_GET["action"])) {
		$amount = $_POST["amount"];
		$id = $_GET["id"];
		switch($_GET["action"]) {
			case "add":
				if(!empty($_POST["amount"])) {
					$_SESSION['cart'][$id]=$_SESSION['cart'][$id]+$amount;
					// header('location: index.php');
				}
			break;
			case "delete":
			  if(!empty($_POST["amount"])) {
			    if($_SESSION['cart'][$id]>0){
			      $_SESSION['cart'][$id]=$_SESSION['cart'][$id]-$amount;}
			  }
			  else{
			    $key=array_search($id,$_SESSION['cart']);
			    if($key!==false)
			      unset($_SESSION['cart'][$key]);
			    // $_SESSION["cart"] = array_values($_SESSION["cart"]);
			    // $_SESSION['cart'][$id]=0;
			  }
			break;
			case "clear":
			  $_SESSION = array();
			  // header("Location:/index.php");
			break;
}
}
?>
<?php
	require_once('header.php');
?>
    <div class="container">
      <div class="main-content">
        <div class="content-wrap">
          <h1><?php hw();?></h1>
		  <?php if(isset($_SESSION['cart'])){
				$all_sum =0;
				foreach($_SESSION['cart'] as $productId=>$quantity){
					$row = get_info($productId, $conn);
					$total = $quantity*$row['price'];
					$id = $productId;
					$allsum +=$total;
					if ($quantity!=0){?>

						<section class="products">
							<div class="product-image cart-info-image">
								<img src="<?php echo $row['image_url'];?>" alter='Картинка-картиночка'>
							</div>
							<div class="product-info cart-info-page">
								<h5><?php echo $row['title']; ?></h5>
								<h6><?php echo "Общая цена $total"; ?></h6>
								<h6><?php echo "Количество $quantity";?></h6>

							</div>



						</section>
						<form method='post' action="cart.php?action=delete&id=<?php echo $id; ?>">
							<input type="hidden" class="product-quantity" name="amount" value="1" size="2" />
							<input type="submit" value="Удалить " class='buy-button' />
						</form>
						<hr />
				<?php	} }	 ?>
					<form method='post' action="cart.php?action=clear">
						<input type="submit" value="Очистить все" class='buy-button' />
					</form>
				<?php	} else{
				  echo "В вашей корзине пока пусто";
			  }
			  ?>
		  	<?php if ( isset($_SESSION['cart'])){?>
		  	<div class='bottom-cart'>
					<h5><?php echo "Всего товара на: $allsum"; ?></h5>

		  	</div>
		  	<?php }?>
        </div>
				<?php require_once('aside.php')?>
      </div>
    </div>
    <?php require_once('footer.php') ?>
  </body>

</html>

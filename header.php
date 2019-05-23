<?php
	session_start();
    require_once("db_connector.php");
		require_once("functions.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Магазин камушков</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
		<script>

			function ColorChange(){
		 		document.getElementById("cart").style.background = '#f64a16';
				}
				</script>
				<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
			$(function() {
         $('form').submit(function(e) {
					 e.preventDefault();
         $.ajax({
            type: 'POST',
            url: 'cart.php',
            data: $('form').serialize(),
        });
        return false;
    });
})
	  </script> -->
  </head>
  <body>
    <header><a href='/index.php'>StoneHenge (здесь будет логотип)</a></header>
		<?php if(!empty($_SESSION['login']) && !empty($_SESSION['password']) )
		{
		    $name = $_SESSION['login']; ?>
		    <div class= 'reg'>
		        <?php echo "Вы вошли как $name"; ?>
		        <a href='/result.php'>На секретную страницу</a></br>
		        <a href='/logout.php'>Выйти</a>
		    </div>
		<?php }
		  else{ ?>
		    <div class= 'reg'>
		      <?php echo "У девочки нет лица"; ?></br>
		      <a href='/result.php'>Секретная страница (вам туда не попасть)</a>
		    </div>
		<?php	}?>
	<div class='cart' id='cart'>
	  <a href="cart.php">Корзина</a>
	</div>

<?php
	require_once('header.php');
?>
    <div class="container">
      <div class="main-content">
        <div class="content-wrap">

          <h1><?php hw();?></h1>
					<?php if(empty($_SESSION['login']) && empty($_SESSION['password'])) {?>
					<p>Перейти к  <a href = 'register.php'>регистрации</a></p> или к <a href = 'login.php'>входу</a>
					<?php }?>
          <section class="products">
            <?php
							// Функция выбоки всего
              $result = get_all($conn);
              //$row = mysqli_fetch_array($result);

              if ($result->num_rows > 0) {
               // output data of each row
			   	 			while ($row = mysqli_fetch_array($result)) {
				   				$id = $row['id'];
            ?>

            <div class="product-card">
				<!-- <form method='post' action="cart.php?action=add&id=<?php echo $id; ?>" name='sender'> -->

					<div class="product-image">
						<img src="<?php echo $row['image_url'];?>" alter='Картинка-картиночка'>
					</div>
					<div class="product-info">
						<!--Переход к конкретной странице  и формирование GET-->
						<a href='page.php?id=<?php echo $id;?>'><h4><?php echo $row['title']; ?></h4></a>
						<h4><?php
						$price =$row['price'];
						echo "Цена: $price"; ?></h4>
					<form method='post' action="cart.php?action=add&id=<?php echo $id; ?>" name='sender'>
						<input type="text" class='product-amount' name="amount" value="1" size="2" />
						<!-- <input type="hidden" class='product-id' name="id" value=<?php echo $id;?> /> -->
						<input type="submit" value="Купить" class='buy-button' onclick = "ColorChange()" />

				</form>
					</div>
            </div>
          <?php } }?>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
					<script>
							$(function() {
								$('form').submit(function(e) {
										var $form = $(this);
										$.ajax({
											type: $form.attr('method'),
											url: $form.attr('action'),
											data: $form.serialize()
										}).done(function() {
											console.log('success');
											console.log($form.serialize());
										}).fail(function() {
											console.log('fail');
										});
			//отмена действия по умолчанию для кнопки submit
							e.preventDefault();
							});
						});
					</script>


				</section>
        </div>
				<?php require_once('aside.php')?>
      </div>
    </div>
		<?php  require_once('footer.php') ?>

  </body>

</html>

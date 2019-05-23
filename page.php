<?php
	require_once('header.php');
?>
    <div class="container">
      <div class="main-content">
        <div class="content-wrap">
          <h1><?php hw();?></h1>
					<!--Результат выборки из БД попадает в GET  -->
		  <?php if(!empty($_GET['id'])) {
			  $id = $_GET['id'];
				// Функция запроса конкретного товара
			  $row = get_info($id, $conn);
			  ?>
          <section class="products">
              <div class="product-image product-info-image">
                <img src="<?php echo $row['image_url'];?>" alter='Картинка-картиночка'>
              </div>
              <div class="product-info product-info-page">
                <h3><?php echo $row['title']; ?></h3>
								<h4>Описание товара</h4>
								<p><?php echo $row['description']; ?></p>
                <h4><?php $price =$row['price'];
													echo "Цена: $price"; ?></h4>
              </div>
							<form method='post' action="cart.php?action=add&id=<?php echo $id; ?>"  >
							  <input type="hidden" class='product-amount' name="amount" value="1" size="2" />
							</form>

			</section>
		  <?php }?>
			<div class = 'commentary'>
				<h2>Комментарии</h2>
				<?php
					$result = get_commentary($id, $conn);
					if ($result->num_rows > 0) {
					 // output data of each row
						while ($row = mysqli_fetch_array($result)) {
							$username = $row['username'];
							$commentary = $row['comm_text'];
							$date = $row['send_date'];
				?>
						<h3><?php echo $username;?></h3><hr>
						<?php if($date){?>
						<p><?php echo $date;?></p><?php }?>
						<p><?php echo $commentary;?></p>

			<?php }}?>
			<hr>
        </div>
					<h2>Добавить комментарий</h2>
					<div class = 'add-commentary' name = 'comm_form'>
						<form method = "POST" action = "page.php?id=<?php echo $id;?>">
							<label>Username</label>
							<input type="text" name = 'user'autocomplete="off"/><br>
							<label>Комментарий</label>
							<input type = "text" name = 'c_text' autocomplete="off"/><br>
							<input type = 'submit' value = 'Отправить'/>
						</form>
					</div>
					<?php if (isset($_POST['user']) && isset($_POST['c_text']))
					{
						// $c = $_POST['c_text'];
						// echo "POSTcomm = $c";
						$result = send_commentary($_POST['user'], $id, $_POST['c_text'],  $conn);
						if($result){
							echo "Комментарий отправлен";
						}
						else{
							echo "Ошибка записи";
						}
					}?>

				</div>
        <?php require_once('aside.php')?>
      </div>
    </div>
  <?php  require_once('footer.php') ?>
  </body>

</html>

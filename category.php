<?php
	require_once('header.php');
?>
    <div class="container">
      <div class="main-content">
        <div class="content-wrap">
          <h1><?php hw();?></h1>
          <section class="products">
            <?php if(!empty($_GET['id'])){
              $id_cat = $_GET['id'];
            }

              $result = get_category_info($id_cat, $conn);
              //$row = mysqli_fetch_array($result);

              if ($result->num_rows > 0) {
               // output data of each row
			   	 			while ($row = mysqli_fetch_array($result)) {
				   				$id = $row['id'];
            ?>

            <div class="product-card">
							<form method='post' action="cart.php?action=add&id=<?php echo $id; ?>" name='sender'>
								<div class="product-image">
									<img src="<?php echo $row['image_url'];?>" alter='Картинка-картиночка'>
								</div>
								<div class="product-info">
									<a href='page.php?id=<?php echo $id;?>'><h4><?php echo $row['title']; ?></h4></a>

									<h4><?php $price =$row['price'];
										echo "Цена: $price"; ?></h4>
									</div>
								</form>
            </div>
          <?php } }?>

					</section>
        </div>
				<?php require_once('aside.php')?>
      	</div>

    </div>
		<?php  require_once('footer.php') ?>

  </body>

</html>

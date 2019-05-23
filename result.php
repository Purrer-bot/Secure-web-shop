<?php
  session_start();
  require_once('header.php');
  if (isset($_SESSION['login']) && isset($_SESSION['password'])){
?>
    <div class="container">
      <div class="main-content">
        <div class="content-wrap">

          <p>Ура вы на секретной странице!</p>

				<?php require_once('aside.php')?>
      </div>
    </div>
		<?php  require_once('footer.php') ?>
<?php }

  else{ ?>
      <p>Доступ на секретную страницу запрещен</p>

<?php  }?>
  </body>

</html>

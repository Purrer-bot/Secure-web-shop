<?php
	require_once('header.php');
	// if(isset($_SESSION['login']) && isset($_SESSION['password'])){
	// 	header('location: index.php');
	// }
?>
    <div class="container">
      <div class="main-content">
        <div class="content-wrap">
          <h1>Выкидыш логина</h1>
					<form action="log_spec.php" id="registerform" method="post" name="registerform" >
						<p><label for="user_login">Логин<br>
							<input class="input" id="login" name="login" size="32"  type="text" value="" required="required"></label></p>
						<p><label for="user_pass">Пароль<br>
							<input class="input" id="password" name="password" size="32"   type="hidden" value='' ></label></p>


          <div class = "key-wrapper" id = 'wrapper'>
            <?php for($i = 0; $i < 25; $i++){?>
             <div class='g-key' id ='<?php echo $i;?>' ></div>
            <?php } ?>
          <div class='get-pass' id='get-pass'>Создать пароль</div>
          </div>
					<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Войти"></p>
					<p class="regtext">Уже зарегистрированы? <a href= "login.php">Введите имя пользователя</a>!</p>
			 </form>
        </div>
        <script >
				function sortfunction(a, b){
  				return a - b;
				}
					let div = document.getElementById('wrapper');
					let key_ids = [];
					let password;
					div.onclick = function(event) {
					  let target = event.target; // где был клик
					  if(target.className == 'get-pass'){
							console.log(key_ids);
							key_ids = key_ids.sort(sortfunction);
							console.log(key_ids);
					    password = key_ids.join('r');
							password+='r';
					    console.log(password);
					    return password;
					  }

					  if (target.className != 'g-key'){
					    return;
					  }

					  target.style.background = '#f64a16';
					  let id = target.id;
					  key_ids.push(+id)
					};
				</script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script>
					$(document).ready(function(){
					  $('#get-pass').click(function(){
					    $.ajax({type: 'POST',
							url: 'result.php',
					    data: {password:password},
							success: function(result)
								{
					      	console.log(password);
									$("#password").val(password);
									$("#get-pass").detach();
					    	}
							});
					  });
					});
				</script>

				<?php require_once('aside.php')?>
      </div>
    </div>
		<?php  require_once('footer.php') ?>

  </body>

</html>

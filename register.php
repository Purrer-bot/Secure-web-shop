<?php
	require_once('header.php');
?>
    <div class="container">
      <div class="main-content">
        <div class="content-wrap">
          <h1>Выкидыш регистрации</h1>
					<?php if (isset($_SESSION['login']) && isset($_SESSION['password'])){
						echo "Вы уже в системе";
					}
					else{
					?>
					<form action="register.php" id="registerform" method="post" name="registerform" >
						<p><label for="user_login">Логин<br>
							<input class="input" id="login" name="login" size="32"  type="text" value="" required="required"></label></p>
						<p><label for="user_pass">Пароль<br>
							<input class="input" id="password" name="password" size="32"   type="hidden" value='' ></label></p>
						<!-- <p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p> -->


	 <!-- </form> -->
          <div class = "key-wrapper" id = 'wrapper'>
            <?php for($i = 0; $i < 25; $i++){?>
             <div class='g-key' id ='<?php echo $i;?>' ></div>
            <?php } ?>
          <div class='get-pass' id='get-pass'>Создать пароль</div>
          </div>
					<div class="div-form">
					<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
						<p class="regtext">Уже зарегистрированы? <a href= "login.php">Введите имя пользователя</a>!</p> </div>
					 </form>
        </div>
        <script>
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

				<? if(!empty($_POST['register']) && isset($_POST["register"]) ){
						$login = htmlspecialchars($_POST['login']);
						$password = htmlspecialchars($_POST['password']);
						$login = md5($login);
						$password = md5($password);
						$query = "SELECT * FROM `users` WHERE login = '$login'";
						$result = $conn->query($query);
						if($result->num_rows == 1){
							$message = "This login already taken";
						}
						else{
							$sql = "INSERT INTO `users` (login, pass) values ('$login', '$password')";
							$new_result = $conn->query($sql);
							if ($new_result){
								$message = "Successfully created";
							}
							else{
								$message = "Something wrong";
							}
						}
				}

				?>
				<?php
					if(!empty($message)){ ?>
							<span><?php echo $message;?></span>
				<?php	}
			}
				?>

				<?php require_once('aside.php')?>
      </div>
    </div>
		<?php  require_once('footer.php') ?>

  </body>

</html>

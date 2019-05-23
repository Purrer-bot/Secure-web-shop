<?php require_once('db_connector.php');
session_start();
if(!empty($_POST['register']) && isset($_POST["register"]) ){
      $login = $_POST['login'];
      $login = md5($login);
      $password = $_POST['password'];
      $password = md5($password);
      $l_query = "SELECT login from users where login = '$login'";
      $p_query = "SELECT pass from users where pass = '$password'";
      $l_res = $conn->query($l_query);
      $p_res = $conn->query($p_query);
      if (($l_res->num_rows == 1) && ($p_res->num_rows == 1)){
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        $message = 'Вы вошли в систему';
        header('location: index.php');
        // exit();
      }
      else{
          $message = "Один из параметров неверен";
      }
    }
?>

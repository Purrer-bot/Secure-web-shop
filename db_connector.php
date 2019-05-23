<?php
    $server = "127.0.0.1";
    $username = "";
    $password = "";
    $database = "";

    $conn = new mysqli($server, $username, $password, $database);

    // Проверяем успешность соединения.
    if (mysqli_connect_errno()) {
        echo "<p><strong>Ошибка подключения к БД</strong>. Описание ошибки: ".mysqli_connect_error()."</p>";
        exit();
    }
?>

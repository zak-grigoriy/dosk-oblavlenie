<!DOCTYPE html>

<html>
<body>

<?php
$ocenka = $_POST["ocenka"];
$coment = $_POST["text"];
$adres = $_POST["adres"];
$user = $_POST["user"];
//echo $ocenka; 
//echo $coment;
//echo $adres;
//echo $user;
//include ("bd.php"); //подключение к базе данных
// Подключение к MySQL
$servername = "localhost"; // локалхост
$username = "root"; // имя пользователя
$password = ""; // пароль если существует
$dbname = "bookmarks"; // база данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);
// Проверка соединения 
if ($conn->connect_error) {
   die("Ошибка подключения: " . $conn->connect_error);
}

// Установка данных в таблицу
$sql = "INSERT INTO imgocenka (ocenka, coment_ocenki, ipg_obyavl, username  )
VALUES ('$ocenka', '$coment', '$adres', '$user' )";

if ($conn->query($sql) === TRUE) {
   echo "Успешно создана новая запись";
} else {
   echo "Ошибка1: " . $sql . "<br>" . $conn->error;
}

// Закрыть подключение
$conn->close();

?>
</body>
</html>
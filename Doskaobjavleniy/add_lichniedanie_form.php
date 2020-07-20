<link rel="stylesheet" type="text/css" href="style.css"/>
<?php
require_once('bookmark_fns.php'); 
require_once("bd.php"); //подключение к базе данных
do_html_header('Загрузите личные данные');
display_site_info();
@session_start();
?>




<table style="width:100%"><tr>
<td style="width:30%">
<form name='form' enctype='multipart/form-data' method='post'
action='add_lichniedanie.php'>
Загрузить свое фото: 
<input type='file' name='myfile' id='myfile' class='input'><br><br>
Логин<br> пользователя:<input type='text' name='namemy' value='<? echo stripslashes($_SESSION['valid_user']); ?>'><br>
<p>Комментарий о себе:.</p>
<textarea name="message" rows="5" cols="30">Введите свой комментарий….</textarea>
<p><input type="submit" name="submit" value="Отправить">
</form>
</td>
<td>
<?php
$mysqli = new mysqli("localhost", "root", "", "bookmarks");
// проверяем соединение 
if (mysqli_connect_errno()) {
    printf("Подключиться к БД не удалось: %s\n", mysqli_connect_error());
    exit();
}
$user = stripslashes($_SESSION['valid_user']);
//echo $user;
//создаем и выполняем запрос к таблице пользователей
$query = "SELECT username, ipg_my, coment_my  FROM lichniedanie WHERE username = '$user' ";
$result = $mysqli->query($query);
//выводим данные
while($row = $result->fetch_array()) {
//    echo $row['ipg_my'];
$img = $row['ipg_my'];
$coment_my = $row['coment_my'];
}
// очищаем result-объект 
$result->close();
// закрываем соединение 
$mysqli->close();
?>
<img src="<?= $img?> " style="width:350px;height:450px;">
</td>
<td style="width:35%">
<?= "$coment_my" ?>
лдорлордр
</td>
</tr>
</table>
<?php

display_user_menu()
?>

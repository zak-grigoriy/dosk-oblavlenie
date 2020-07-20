<link rel="stylesheet" type="text/css" href="style.css"/>
<?php
require_once('bookmark_fns.php'); 
require_once("bd.php"); //подключение к базе данных
do_html_header('');
display_site_info();
//display_login_form();
//require_once('new 1.php');
?>

<?php


$adres=  $_GET["adres"];


//require_once('bookmark_fns.php');
@session_start();
?>

  <body>
 <table>
   <tr><td><img src="<?= $adres?> " style="width:350px;height:450px;"></td>
   <!--<tr><td><img src="img/small/1593538546_1.jpg" style="width:500px;height:650px;"></td> --!>
   <td>
   <form action="/add_ocenka_coment.php" method="post">
   Логин пользователя: <input type='text' name='user' value='<? echo stripslashes($_SESSION['valid_user']); ?>'><br><br>
   Адрес фото:<input type='text' name='adres' value='<?= $adres ?>'><br>
   Оценка <br> объявления (от 1 до 5):
  <input type="number" name="ocenka" min="1" max="5" value='5'>
  <p>Комментарий к объявлению  :</p>
  <textarea name="text" cols="24" rows="4">Введите свой комментарий…</textarea><br><br>
  <input type="submit" name="submit" value="Отправить">
 </form>
	   
		   <td>
		   
		   </td>
		   </tr>
		   
		   
 </table>
  </body>
</html>

<!-- <img src= <?= $adres?> > --!>

<!-- new3.php?adres=img/small/1593538546_1.jpg --!>
<?php
require_once('bookmark_fns.php'); 
display_user_menu();
?>
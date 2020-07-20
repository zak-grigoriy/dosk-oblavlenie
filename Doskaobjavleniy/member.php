<?php

// Включить файлы функций для данного приложения
require_once('bookmark_fns.php'); 
require_once("bd.php"); //подключение к базе данных
require_once('bookmark_fns.php'); 
session_start();

// Создать короткие имена переменных
$username = $_POST['username'];
$passwd = $_POST['passwd'];

if ($username && $passwd) {
// Пользователь только что попытался войти в систему
  try {
    login($username, $passwd);
    // Если пользователь записан в базе данных, 
    // зарегистрировать его идентификатор
    $_SESSION['valid_user'] = $username;
  }
  catch (Exception $e) {
    // Неудачный вход в систему
    do_html_header('Проблема:');
    echo 'Вход в систему невозможен. '
         .'Для просмотра этой страница необходимо войти в систему.';
    do_html_url('login.php', 'Вход');
    do_html_footer();
    exit;
  }      
}

do_html_header('Домашняя страница');
check_valid_user();
// Извлечь все закладки, сохраненные этим пользователем
if ($url_array = get_user_urls($_SESSION['valid_user'])) {
  display_user_urls($url_array);
}

// Вывести меню опций
//display_user_menu();

//do_html_footer();

?>
<br><br>
<?
//Динамичесие модули таблиц формата 5 на 4 и пагинации с 20 страницами.
//Переменные для формирования начала и конца последних страниц пагинации. 
$sql = $result->query("SELECT  ipg_obyavl FROM objavlenies");
$p =0; 
while ($imeg = mysqli_fetch_row($sql))
{
$p++;
}
//echo всего . фото . $p;
//echo "<br>";
// Переменные с формы
$nachal=  $_GET["nachal"];
$conec=  $_GET["conec"];
//echo Нач . $nachal;
//echo "<br>";	
//echo Кон . $conec;
if ($conec)
//если есть страницы от гипер ссылок от пагинации то выдаем интервале фото.	
{	$sql = $result->query("SELECT  ipg_obyavl FROM objavlenies worker LIMIT $nachal, $conec ");}
//если нет то выдаем последних 20 фото.
else {
$nachal = $p - 20;
//echo "<br>";
//echo $nachal;
$conec = $p;	
$sql = $result->query("SELECT  ipg_obyavl FROM objavlenies worker LIMIT $nachal, $conec ");}
//echo после. иф . $nachal;
//модуль для формированя таблиц 5 на 4 итого 20 на страницу
// Выбор из базы данных полей и imeg
$i =0;
$arr = [];
while ($imeg = mysqli_fetch_row($sql))
{$arr[] = 	$imeg[0];
$f++; //всего количество фото
}
//echo всего . количество . фото . $f;
$nachal= 0;
$conec=  0;
?><!-- new3.php?adres=img/small/1593538546_1.jpg --!>

		<div class="container">
			<table class="table">		
			<?php foreach( array_chunk($arr, 12) as $value): ?>
				<tr>
					<?php foreach($value as $item): ?>
						<td><a href="add_ocenka_coment_form.php?adres=<?= $item ?>"><img src=<?= $item ?> style=width:100px; height:300px;></a></td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
			<table>
		</div>
		

<table style="width:100%"><tr>
<td></td>
<?php
//главный модуль для формирования пагинации
$k =0;
$sql = $result->query("SELECT  ipg_obyavl FROM objavlenies");
$i =0;
while ($imeg = mysqli_fetch_row($sql))
{
$i++;
}
//echo  $i;

//echo "<br>";
$ii = $i/20;
$iii = ceil($ii);
//echo $ii;
//echo "<br>";
//echo $iii;
$ciclov =18;

for($scht=1 ;$scht <= min($iii, $ciclov); $scht++)
{
	
echo "<td>стр.";
?>
<a href="member.php?nachal=<?= 0 + ($k * 20)?>&conec=<?= 20 ?>"><?= $scht?></a>
<?
echo  "</td>";
$k++;
}
?>
<td></td></tr></table><br>


</td><td></td></tr></table><br>
</td>
</tr>
</table>
<?php

display_user_menu()
?>
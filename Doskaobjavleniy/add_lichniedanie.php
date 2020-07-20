<link rel="stylesheet" type="text/css" href="style.css"/>

<?php
require_once("bd.php"); //подключение к базе данных
require_once('bookmark_fns.php'); 
do_html_header('Загрузите личные данные');
display_site_info();
@session_start();
include ("bd.php"); //подключение к базе данных

$namemy =  $_POST["namemy"];
$message = $_POST['message'];


// Если поле выбора картинки не пустое - закачиваем её на сервер
$maxwidth = "500"; // максимальная ширина картинок на превью
$fotos_dir = "img/small/"; // Директория для фотографий товаров
$foto_name = $fotos_dir.time()."_".basename($_FILES['myfile']
['name']); // Полное имя файла вместе с путем
$foto_light_name = time()."_".basename($_FILES['myfile']['name']);
 // Имя файла исключая путь
$foto_tag = "<img src=\"$foto_name\" border=\"0\">";
// Готовый тэг для вставки картинки на страницу
$foto_tag_preview = "<img src=\"$foto_name\" border=\"0\"
width=\"$maxwidth\">"; // Тот же тэг, но для превью
   
// Текст ошибок
$error_by_mysql = "<label class=\"label\">
Ошибка при добавлении данных в базу, логин лица записан в базу</span>";
$error_by_file = "<label class=\"label\">
Невозможно загрузить файл в директорию. Возможно её не существует</span>";

// Начало
if(isset($_FILES["myfile"]))
{
$myfile = $_FILES["myfile"]["tmp_name"];
$myfile_name = $_FILES["myfile"]["name"];
$myfile_size = $_FILES["myfile"]["size"];
$myfile_type = $_FILES["myfile"]["type"];
$error_flag = $_FILES["myfile"]["error"];
  
// Если ошибок не было
if($error_flag == 0)
{
$DOCUMENT_ROOT = $_SERVER['DOCMENT_ROOT'];
$upfile = getcwd()."/img/small/" . time()."_".basename
($_FILES["myfile"]["name"]);
 
if ($_FILES['myfile']['tmp_name'] /* and $_FILES['myfiles']['tmp_name']*/)
{

//Если не удалось загрузить файл

if (!move_uploaded_file($_FILES['myfile']['tmp_name'], $upfile))
{
echo "$error_by_file";
exit;
}

}
else
{
    echo 'Проблема: возможна атака через загрузку файла. ';
    echo $_FILES['myfile']['name'];
    exit;
}

$q = "INSERT INTO lichniedanie(username, ipg_my, coment_my) VALUES
('$namemy', '$foto_name', '$message')";
$query = mysqli_query($result, $q);
// Данные успешно внесены в базу данных, выводим сообщение
if ($query == 'true') {
echo "
<div class='text'>
<p>Картинки успешно загружены на сервер!</p><br><br>
<table>
<tr>
<td>


</td>
</tr>
</table>
</div>
";
}

// В противном случае, выводим ошибку при добавлении в базу данных
else {
echo "$error_by_mysql";
}
}
}
elseif ($myfile_size == 0) {
echo "<br><label class='label'>Картинки не выбраны!<br><br>
Вернитесь и выберите картинки!</label><br><br>
<a href='add_images_form.php' class='add_images'>
<div class='add_images_text'>ВЫБРАТЬ КАРТИНКИ</div></a>";
}

display_user_menu()
?>

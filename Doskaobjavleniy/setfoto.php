<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Сохранение бинарных данных в базе данных MySQL</title>
</head>
<body>
<?php
 
// Код, который будет выполняться, если форма была оправлена:
if ($_POST['submit']) {
 
    // подключение к базе данных
    // (возможно, вам придется настроить имя хоста, имя пользователя и пароль)
    $dbh = new mysqli("localhost", "root", "", "imagesstore");
 
    if(mysqli_connect_errno())
    {
        exit("Ошибка подключения к базе данных MySQL: Сервер база данных не доступен!<br>
        Проверте параметры подключения к базе данных.");
    }
 
    $data = addslashes(fread(fopen($_FILES['file']['tmp_name'], "r"), 
    filesize($_FILES['file']['tmp_name'])));
 
    $_POST['form_description'] = trim($_POST['form_description']);
    $size = filesize ($_FILES['file']['tmp_name']);
 
    $result=$dbh->prepare("INSERT INTO binary_data (description,bin_data,filename,filesize,filetype) 
  "."VALUES ('".$_POST['form_description']."',
  '".$data."',
  '".$_FILES["file"]["name"]."',
  '".$size."',
  '".$_FILES["file"]["type"]."')");
  
 
  if(!$result) exit("Ошибка выполнения SQL запроса!");
 
  $result->execute(); 
  $id = $dbh->prepare();
 
  echo "<p>Этот файл имеет следующий идентификатор (ID) в базе данных: <b>".$id."</b>";
 
} else {
 
  // отображаем форму для оправки новых данных:
?>
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
Описание файла: <input type="text" name="form_description" size="40">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
Файл для загрузки/хранения в базе данных: <input type="file" name="file" size="40">
<p><input type="submit" name="submit" value="Отправить">
</form>
<?php
 
}
 
?> 
</body>
</html>
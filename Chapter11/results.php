<html>
<head>
  <title>Магазин "Буквофил" – Результаты поиска</title>
</head>
<body>
<h1>Магазин "Буквофил" - Результаты поиска</h1>
<?php
  // создание коротких имен переменных
  $searchtype = $_POST['searchtype'];
  $searchterm = trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
     echo 'Вы не ввели параметры поиска. Вернитесь' .
          ' на предыдущую страницу и повторите ввод.';
     exit;
  }

  //***if (!get_magic_quotes_gpc()) {
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
 //*** }

 // $db = new mysqli('localhost', 'root', '', 'bookorama');
 $db = mysqli_connect('localhost', 'root', '', 'bookorama');
  $errn = mysqli_connect_errno();
 // echo $errn
  if (mysqli_connect_errno()) {
     echo 'Ошибка: Не удалось установить соединение' . 
          ' с базой данных. Повторите попытку позже.';
     exit;
  }
  mysqli_select_db($db, "bookorama"); 
  $query = "select * from bookorama where ".$searchtype." like '%".$searchterm."%'";
  $result = mysqli_query($db, $query);
  $num_results = $result->num_rows;
  echo $num_results;
  echo "<p>Найдено книг: ".$num_results."</p>";

  for ($i = 0; $i < $num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Название: ";
     echo htmlspecialchars (stripslashes($row['title']));
     echo "</strong><br />Автор: ";
     echo stripslashes($row['author']);
     echo "<br />ISBN: ";
     echo stripslashes($row['isbn']);
     echo "<br />Цена: ";
     echo stripslashes($row['price']);
     echo "</p>";
  }

 // $result->free();
 // $db->close();
?>

</body>
</html>

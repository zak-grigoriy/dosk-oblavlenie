<html>
<head>
  <title>Магазин "Буквофил" – Результаты поиска</title>
</head>
<body>
<h1>Магазин "Буквофил" – Результаты поиска</h1>
<?php
  // создание коротких имен переменных
  $searchtype=$_POST['searchtype'];
  $searchterm=$_POST['searchterm'];
  $searchterm = trim($searchterm);

  if (!$searchtype || !$searchterm) {
     echo 'Вы не ввели параметры поиска. Вернитесь' .
          ' на предыдущую страницу и повторите ввод.';
     exit;
  }
  
  if (!get_magic_quotes_gpc()) {    
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }

  // настройка для использования PEAR MDB2
  require_once('MDB2.php');
  $user = 'bookorama';
  $pass = 'bookorama123';
  $host = 'localhost';
  $db_name = 'books';

  // настройка строки универсального соединения или DSN
  $dsn = "mysqli://".$user.":".$pass."@".$host."/".$db_name";

  // соединение с базой данных
  $db = &MDB2::connect($dsn);

  // проверка работоспособности соединения
  if (MDB2::isError($db)) {    
    echo $db->getMessage();
    exit;
  }

  // выполнение запроса
  $query = "select * from books where ".$searchtype." like '%" .
    $searchterm."%'";
  $result = $db->query($query);

  // проверка, что запрос выполнен правильно
  if (MDB2::isError($result)) { 
    echo $db->getMessage();
    exit;
  }

  // получение количества возвращенных строк
  $num_results = $result->numRows();

  // вывод каждой возвращенной строки
  for ($i=0; $i < $num_results; $i++) {
     $row = $result->fetchRow(DB_FETCHMODE_ASSOC);
     echo "<p><strong>".($i+1).". Название: ";
     echo htmlspecialchars(stripslashes($row['title']));
     echo "</strong><br />Автор: ";
     echo stripslashes($row['author']);
     echo "<br />ISBN: ";
     echo stripslashes($row['isbn']);
     echo "<br />Цена: ";
     echo stripslashes($row['price']);
     echo "</p>";
  }

  // отсоединение от базы данных
  $db->disconnect();
?>
</body>
</html>

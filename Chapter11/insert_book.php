<html>
<head>
  <title>Магазин "Буквофил" — Результат ввода новой книги</title>
</head>
<body>
<h1>Магазин "Буквофил" — Результат ввода новой книги</h1>
<?php
  // создание коротких имен переменных
  $isbn=$_POST['isbn'];
  $author=$_POST['author'];
  $title=$_POST['title'];
  $price=$_POST['price'];

  if (!$isbn || !$author || !$title || !$price) {
    echo "Вы ввели не все необходимые сведения.<br />" .
         "Вернитесь на предыдущую страницу и повторите ввод.";
    exit;
  }

  if (!get_magic_quotes_gpc()) {
    $isbn   = addslashes($isbn);
    $author = addslashes($author);
    $title  = addslashes($title);
    $price  = doubleval($price);
  }

  @ $db = new mysqli('localhost', 'root', '', 'bookorama');
  //@ $db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');
  if (mysqli_connect_errno()) {
     echo "Ошибка: Не удалось установить соединение" . 
          " с базой данных. Повторите попытку позже.";
     exit;
  }

  $query = "insert into books values 
           ('".$isbn."', '".$author."', '".$title."', '".$price."')";
  $result = $db->query($query);

  if ($result) {
    echo  $db->affected_rows." книга добавлена в базу данных.";
  } else {
    echo "Произошла ошибка. Книга не занесена.";
  }

  $db->close();
?>
</body>
</html>

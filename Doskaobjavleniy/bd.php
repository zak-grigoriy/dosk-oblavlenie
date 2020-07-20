<?
//$db = new mysqli ('localhost', 'root', '');
//mysqli_select_db ('bookmarks', $db);
//if (!$db) echo mysql_error();
$result = new mysqli('localhost', 'root', '', 'bookmarks'); 
  if (!$result)
    throw new Exception('Невозможно подключиться к серверу баз данных');
  else
    return $result;
?>

<?php

function db_connect() {
  $result = new mysqli('localhost', 'root', '', 'bookmarks'); 
  if (!$result)
    throw new Exception('Невозможно подключиться к серверу баз данных');
  else
    return $result;
}

?>

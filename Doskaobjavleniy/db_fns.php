<?php

function db_connect() {
  $result = new mysqli('localhost', 'root', '', 'bookmarks'); 
  if (!$result)
    throw new Exception('���������� ������������ � ������� ��� ������');
  else
    return $result;
}

?>

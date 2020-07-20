<?php

// Включить файлы функций для этого приложения
require_once('bookmark_fns.php'); 
session_start();
$old_user = $_SESSION['valid_user'];  
// Сохранить для проверки, если кто-то вошел в систему *ранее*
unset($_SESSION['valid_user']);
$result_dest = session_destroy();

// Начать вывод html-содержимого
do_html_header('Выход');

if (!empty($old_user)) {
  if ($result_dest) {
    // Если пользователь вошел в систему и теперь выходит из нее
    echo 'Успешный выход из системы.<br />';
    do_html_url('login.php', 'Вход');
  } else {
    // Пользователь вошел в систему и не может выйти из нее
    echo 'Выход из системы невозможен.<br />';
  }
} else {
  // Если пользователь не входил в систему, но каким-то образом попал на эту страницу
  echo 'Вы не входили в систему, поэтому и выходить из нее не нужно.<br />';
  do_html_url('login.php', 'Вход');
}

do_html_footer();

?>

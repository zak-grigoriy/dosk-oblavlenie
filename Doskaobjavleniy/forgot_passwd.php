<?php
  require_once('bookmark_fns.php');
  do_html_header('Переустановка пароля');

  // Создать короткие имена переменных
  $username = $_POST['username'];

  try {
    $password = reset_password($username);
    notify_password($username, $password);
    echo 'Новый пароль отправлен по адресу электронной почты, '
         .'который вы указали при регистрации.';
  }
  catch (Exception $e) {
    echo 'Пароль не может быть переустановлен. '
         .'Повторите попытку позже.';
  }
  do_html_url('login.php', 'Вход');
  do_html_footer();
?>

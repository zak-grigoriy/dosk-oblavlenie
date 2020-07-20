<?php

function do_html_header($title) {
  // Вывести заголовок HTML
?>
  <html>
  <head>
    <title><?php echo $title;?></title>
    <style>
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #3333cc; width=300; text-align=left }
      a { color: #000000 }
    </style>
  </head>
  <body>
  <img src="php.gif" alt="Логотип PHPbookmark" border=0
       align="left" valign="bottom" height="55" width="57" />
  <h1>&nbsp;ДОСКА ОБЪЯВЛЕНИЙ</h1>
  <hr />
<?php
  if($title)
    do_html_heading($title);
}

function do_html_footer() {
  // Вывести нижний колонтитул HTML
?>
  </body>
  </html>
<?php
}

function do_html_heading($heading) {
  // Вывести верхний колонтитул HTML
?>
  <h2><?php echo $heading;?></h2>
<?php
}

function do_html_URL($url, $name) {
  // Вывести URL-адрес в виде ссылки и дескриптор новой строки
?>
  <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
<?php
}

function display_site_info() {
  // Вывод некоторой маркетинговой информации
?>
  <ul>
    <li>Сохраните свое объявление в онлайновом режиме!
    <li>Посмотрите, что выставляют  другие пользователи!
    
  </ul>
<?php
}

function display_login_form() {
?>
  <a href="register_form.php">Зарегистрироваться</a>
  <form method="post" action="member.php">
  <table bgcolor="#cccccc">
    <tr>
      <td colspan=2>Вход для зарегистрированных пользователей:</td>
    </tr>
    <tr>
      <td>Имя:</td>
      <td><input type="text" name="username"></td>
    </tr>
    <tr>
      <td>Пароль:</td>
      <td><input type="password" name="passwd"></td>
    </tr>
    <tr>
      <td colspan=2 align="center">
      <input type="submit" value="Вход"></td>
    </tr>
    <tr>
      <td colspan=2><a href="forgot_form.php">Забыли пароль?</a></td>
    </tr>
  </table>
  </form>
<?php
}

function display_registration_form() {
?>
  <form method="post" action="register_new.php">
  <table bgcolor="#cccccc">
    <tr>
      <td>Адрес электронной почты:</td>
      <td><input type="text" name="email" size=30 maxlength=100></td>
    </tr>
    <tr>
      <td>Предпочитаемое имя <br />(до 16 символов):</td>
      <td valign="top">
        <input type="text" name="username" size=16 maxlength=16>
      </td>
    </tr>
    <tr>
      <td>Пароль <br />(более 6 символов):</td>
      <td valign="top">
        <input type="password" name="passwd" size=16 maxlength=16>
      </td>
    </tr>
    <tr>
      <td>Подтверждение пароля:</td>
      <td>
        <input type="password" name="passwd2" size=16 maxlength=16>
      </td>
    </tr>
    <tr>
      <td colspan=2 align="center">
        <input type="submit" value="Зарегистрироваться">
      </td>
    </tr>
  </table>
  </form>
<?php 
}

function display_user_urls($url_array) {
  // Вывести таблицу URL-адресов

  // Установить глобальную переменную, чтобы впоследствии 
  // проверить, находимся ли мы на данной странице
  global $bm_table;
  $bm_table = true;
?>
  <br />
  <form name="bm_table" action="delete_bms.php" method="post">
  <table width=300 cellpadding=2 cellspacing=0>
<?php
  $color = "#cccccc";
  echo "<tr bgcolor='$color'><td><strong>Закладка</strong></td>";
  echo "<td><strong>Удалить?</strong></td></tr>";
  if (is_array($url_array) && count($url_array) > 0) {
    foreach ($url_array as $url) {
      if ($color == "#cccccc")
        $color = "#ffffff";
      else
        $color = "#cccccc";
      // обязательно вызвать htmlspecialchars() при выводе пользовательских данных
      echo "<tr bgcolor='$color'><td><a ref=\"$url\">" .         htmlspecialchars($url) . "</a></td>";
      echo "<td><input type='checkbox' name=\"del_me[]\"value=\"$url\"></td>";
      echo "</tr>"; 
    }
  } else
    echo "<tr><td>Нет сохраненных закладок</td></tr>";
?>
  </table> 
  </form>
<?php
}

function display_user_menu() {
  // Выводит меню опций для данной страницы
?>
  <hr />
  <a href="member.php">Главная</a>&nbsp;|&nbsp;
  <a href="add_objav_form.php">Добавить объявление</a>&nbsp;|&nbsp;
  <a href="add_lichniedanie_form.php">Личные данные</a>&nbsp;|&nbsp;
<?php
  // Опция удаления будет только тогда, когда на странице выведена таблица закладок
  global $bm_table;
  if($bm_table == true)
    echo "<a href='#' onClick='bm_table.submit();'>Удалить объявление</a>&nbsp;|&nbsp;"; 
  else
    echo "<font color='#cccccc'>Удалить объявление</font>&nbsp;|&nbsp;"; 
?>
  <a href="change_passwd_form.php">Сменить пароль</a>
  <br />
  <a href="logout.php">Выход</a> 
  <hr />
<?php
}

function display_add_bm_form() {
  // Отображает форму для ввода нового объявления
?>
  <form name="bm_table" action="add_bms.php" method="post">
  <table width=250 cellpadding=2 cellspacing=0 bgcolor="#cccccc">
    <tr>
      <td>Новая<br />закладка:</td>
      <td>
        <input type="text" name="new_url" value="http://" size=30 maxlength=255>
      </td>
    </tr>
    <tr>
      <td colspan=2 align="center">
        <input type="submit" value="Добавить объявление">
      </td>
    </tr>
  </table>
  </form>
<?php
}
function display_add_foto_form() {
  // Отображает форму для ввода нового объявления 
?>
  <form name="foto_table" action="add_fotos.php" method="post">
  <table width=250 cellpadding=2 cellspacing=0 bgcolor="#cccccc">
    <tr>
      <td>Новое<br />объявление:</td>
      <td>
        <input type="text" name="new_url" value="http://" size=30 maxlength=255>
      </td>
    </tr>
    <tr>
      <td colspan=2 align="center">
        <input type="submit" value="Добавить закладку">
      </td>
    </tr>
  </table>
  </form>
<?php
}
function display_password_form() {
  // Выводит HTML-форму изменения пароля
?>
  <br />
  <form action="change_passwd.php" method="post">
  <table width=250 cellpadding=2 cellspacing=0 bgcolor="#cccccc">
    <tr>
      <td>Старый пароль:</td>
      <td><input type="password" name="old_passwd" size=16 maxlength=16></td>
    </tr>
    <tr>
      <td>Новый пароль:</td>
      <td><input type="password" name="new_passwd" size=16 maxlength=16></td>
    </tr>
    <tr>
      <td>Подтверждение нового<br/>пароля:</td>
      <td><input type="password" name="new_passwd2" size=16 maxlength=16></td>
    </tr>
    <tr>
      <td colspan=2 align="center"><input type="submit" value="Изменить пароль"></td>
    </tr>
  </table>
  <br />
<?php
};

function display_forgot_form() {
  // Вывод HTML-формы для переустановки и отправке пароля по электронной почте
?>
  <br />
  <form action="forgot_passwd.php" method="post">
  <table width=250 cellpadding=2 cellspacing=0 bgcolor='#cccccc'>
    <tr>
      <td>Введите имя:</td>
      <td><input type="text" name="username" size=16 maxlength=16></td>
    </tr>
    <tr>
      <td colspan=2 align="center">
        <input type="submit" value="Переустановить пароль">
      </td>
    </tr>
  </table>
  <br />
<?php
};

function display_recommended_urls($url_array) {
  // Выводит информацию подобно функции display_user_urls().
  // Вместо вывода закладок конкретного пользователя выводит рекомендуемые ему закладки
?>
  <br />
  <table width=300 cellpadding=2 cellspacing=0>
<?php
  $color = "#cccccc";
  echo "<tr bgcolor=$color><td><strong>Рекомендации</strong></td></tr>";
  if (is_array($url_array) && count($url_array) > 0) {
    foreach ($url_array as $url) {
      if ($color == "#cccccc")
        $color = "#ffffff";
      else
        $color = "#cccccc";
      echo "<tr bgcolor='$color'><td><a ref=\"$url\">" .         htmlspecialchars($url) . "</a></td></tr>";
    }
  } else
    echo "<tr><td>На сегодня рекомендаций нет.</td></tr>";
?>
  </table>
<?php
};

?>

<?php
  require_once('bookmark_fns.php');
  session_start();
  do_html_header('����� ������');
 
  // ������� �������� ����� ����������
  $old_passwd = $_POST['old_passwd'];
  $new_passwd = $_POST['new_passwd'];
  $new_passwd2 = $_POST['new_passwd2'];
 
  try { 
    check_valid_user();
    if (!filled_out($_POST))
      throw new Exception('�� �� ��������� ��������� �����. '
                          .'����������� ��� ���.';
    if ($new_passwd != $new_passwd2)
      throw new Exception('��������� ������ �� ���������. '
                          .'��������� ����������.';
    if (strlen($new_passwd) < 6)
      throw new Exception('����� ������ ������ ����� �����, ��� �������, '
                          .'6 ��������. ��������� �������.';

    // ������� �������� ��
    change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);
    echo '������ �������.';
  }
  catch (Exception $e) {
    echo $e->getMessage();
  }

  display_user_menu(); 
  do_html_footer();
?>

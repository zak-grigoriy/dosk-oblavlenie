<html>
<head>
  <title>Магазин "Буквофил" – Занесение новой книги</title>
</head>

<body>
  <h1>Магазин "Буквофил" – Форма ввода новой книги</h1>
  <form action="insert_book.php" method="post">
    <table border="0">
      <tr>
        <td>ISBN</td>
        <td><input type="text" name="isbn" maxlength="13" size="13"></td>
      </tr>
      <tr>
        <td>Автор</td>
        <td><input type="text" name="author" maxlength="30" size="30"></td>
      </tr>
      <tr>
        <td>Название</td>
        <td><input type="text" name="title" maxlength="60" size="30"></td>
      </tr>
      <tr>
        <td>Цена, $</td>
        <td><input type="text" name="price" maxlength="7" size="7"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Занести"></td>
      </tr>
    </table>
  </form>
</body>
</html>

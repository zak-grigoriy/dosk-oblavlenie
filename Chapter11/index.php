<html>
<head>
  <title>Магазин "Буквофил" – Поиск в каталоге</title>
</head>

<body>
  <h1>Магазин "Буквофил" - Поиск в каталоге</h1>
  <form action="results.php" method="post">
    Выберите тип поиска:<br />
    <select name="searchtype">
      <option value="author">По автору</option>
      <option value="title">По названию</option>
      <option value="isbn">По ISBN</option>
    </select>
    <br />
    Введите информацию для поиска:<br />
    <input type="text" name="searchterm" size="40" />
    <br />
    <input type="submit" name="submit" value="Найти" />
  </form>

</body>
</html>

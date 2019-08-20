<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>

  <form method="get">
    введите слово : <input type="text" name="word"><br>
    <div>
      <input type="radio" name="language" value="eng" checked>
      <label for="eng">english</label>
    </div>

    <div>
      <input type="radio" name="language" value="rus">
      <label for="rus">русский</label>
    </div>
    <input type="submit">
  </form>

  <?php
  // 2. Дано слово, состоящее только из строчных латинских букв. Проверить, является ли оно палиндромом. При решении этой задачи нельзя пользоваться циклами.
  // Добавила еще и для русского языка, по идее так будет работать для всех не-латинских языков, у которых буква весит больше байта

  session_start(); // Начинаем сессию

  if ($_GET["word"] === null) {
    echo " вы не ввели слово!! ";
  } else {
    $string = $_GET["word"];
    if ($_GET["language"] === 'eng') {
      palindrome($string);
    } elseif ($_GET["language"] === 'rus') {
      palindromeRu($string);
    }
  }

  function palindrome($string)
  {
    // конечная точка рекурсии, если это условие верно, иначе продолжаем запускать функцию
    if ((strlen($string) == 1) || (strlen($string) == 0)) {
      echo "это палиндром";
    } else {
      //если крайние буквы слова равны, запускаем функцию снова, если нет - выходим
      if (substr($string, 0, 1) == substr($string, (strlen($string) - 1), 1)) {
        return palindrome(substr($string, 1, strlen($string) - 2));
      } else {
        echo " это не палиндром";
      }
    }
  }

  function palindromeRu($string)
  {
    // конечная точка рекурсии, если это условие верно, иначе продолжаем запускать функцию
    if ((mb_strlen($string) == 1) || (mb_strlen($string) == 0)) {
      echo "это палиндром";
    } else {
      //если крайние буквы слова равны, запускаем функцию снова, если нет - выходим
      if (mb_substr($string, 0, 1) == mb_substr($string, (mb_strlen($string) - 1), 1)) {
        return palindromeRu(mb_substr($string, 1, mb_strlen($string) - 2));
      } else {
        echo " это не палиндром";
      }
    }
  }

  ?>
</body>

</html>
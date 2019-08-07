<?php
    //3.*Создать PHP-демон, который принимает от пользователя сообщения. Создать отдельный интерфейс с кнопкой, возвращающей самое старое сообщение на экран и удаляющее его. Базы данных, файлы и иные хранилища не использовать.

?>

<!DOCTYPE html>
 <head>
   <meta charset="utf-8" />
   <title>Задание 3</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   <div id="container">
    <h1>Оставьте сообщение</h1>
    <form action="" method="post">

       <textarea class="input-group-text" style="margin-bottom: 20px;" name="message" placeholder="и я хотел сказать вам что" cols="45" rows="15"></textarea>
       <input type="submit" class="btn btn-primary" name="sendMessage" value=" отправить сообщение" />

   </form>

  </div>
 </body>
</html>


     


<?php


function getMessage() {
    if (isset($_POST['message'] )) {
    $message = $_REQUEST['message'];
    echo '<script type="text/javascript">alert("Сообщение ушло! :) ")</script>';  
    return $message;
} else {
    echo '<script type="text/javascript">alert("Напишите чего-нибудь")</script>';
}
}



//var_dump() ;



$q = new SplStack();
$q->push(getMessage());
$q->push(5);
var_dump($q->bottom()); 

?>
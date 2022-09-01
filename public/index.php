<?php
session_start();
require '../vendor/autoload.php';


use App\classes\Mailer;
if (isset($_POST['send'])){

    Mailer::mail($_POST['name'], $_POST['phone'], $_POST['email']);

}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="messages active">
    Сообщение отправлено
</div>
<div class="form" >
    <h1>Оставьте сообщение</h1>
    <div class="box">
        <div class="item">
            <label for="">Имя:</label>
            <input type="text" name="name" class="name">
        </div>
        <div class="item">
            <label for="">Телефон:</label>
            <input type="text" name="phone" class="phone">
        </div>
        <div class="item">
            <label for="">Почта:</label>
            <input type="email" name="email" class="email">
        </div>
        <div class="btn-box">
            <button type="submit" name="send" class="send">Отправить </button>
            <span class="load active"></span>
        </div>
    </div>
</div>
<div class="circle"></div>

<script>
   $(document).ready(function (){
      $('button.send').on('click', function (){
          let name = $('input.name').val();
          let email = $('input.email').val();
          let phone = $('input.phone').val();
          let btn = $('button.send').val();

          $('button.send').text("");
          $('span.load').removeClass('active');


          $.ajax({
              method: "POST",
              url: "/",
              data: { name: name, email: email, phone: phone, send: btn }
          })
              .done(function( msg ) {
                  $('input.name').val('');
                  $('input.email').val('');
                  $('input.phone').val('');
                  $('span.load').addClass('active');
                  $('button.send').text("Отправить");
                  $('div.messages').removeClass('active').delay(3000).fadeOut();


              });


      });
   });
</script>
</body>
</html>

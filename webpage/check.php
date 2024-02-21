<?php
  $login= filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $email= filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
  $pass= filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

  if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
  }else if(mb_strlen($email) < 3 || mb_strlen($email) > 50) {
    echo "Недопустимая длина почты";
    exit();
  }else if(mb_strlen($pass) < 8 || mb_strlen($pass) > 16) {
    echo "Недопустимая длина пароля (от 8 до 16 символов)";
    exit();
  }

  $pass = md5($pass."hiferhifurie");

  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
  $mysql->query("INSERT INTO `users` (`login`, `email`, `pass`)
  VALUES('$login', '$email', '$pass')");

  $mysql->close();

  header('Location: /');

 ?>

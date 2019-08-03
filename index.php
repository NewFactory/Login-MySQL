<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="conteiner mt-4">
      <?php
      ini_set('display_errors','On'); - выводить информацию об ошибке
      error_reporting(E_ALL|E_STRICT); - выводить информацию об ошибке

      if ($_COOKIE['user'] == ''):
       ?>
     <h1>Havework</h1><br>
      <form action="validation-form/auth.php" method="post">
        <input type="text" class="form-control" name="login_user"
        id="login_user" placeholder="Login"><br>
        <input type="password" class="form-control" name="password_user"
        id="password_user" placeholder="Password"><br>
        <button class="btn btn-success"type="submit">Log in</button>
        </form>
    </div>
    <div class="conteiner mt-4">
      <form action="registration.html" method="post">
      <button class="btn btn-success"type="submit">Chek in</button>
    </form>
    </div>
  <?php else:?>
      <p> Hi <?=$_COOKIE['user']?>. <a href="/exit.php"> EXIT </a></p>
  <?php endif;?>
  </body>
</html>

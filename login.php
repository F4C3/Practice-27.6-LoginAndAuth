<?php
// Страница авторизации 
// Формирование Токена
session_start();
$wrong = $_SESSION['wrong'] ?? null;
$error = $_SESSION['error'] ?? null;
$new_user = $_SESSION['new'] ?? null;
if($wrong == 1)
{
    echo "<script>alert ('Не верный логин или пароль')</script>";
    $_SESSION['wrong'] = null;
}
if($error == true)
{

     foreach($error AS $err)
        {
            echo "<script>alert ('$err')</script>";
        }
    $_SESSION['error'] = null;
}
if($new_user == 1)
{
    echo "<script>alert ('Спасибо за регистрацию! Введите логин и пароль')</script>";
    $_SESSION['new'] = null;
}
$token = hash('gost-crypto', random_int(0,999999));
$_SESSION["CSRF"] = $token;
?>
<form method="POST" action="login_controller.php">
Логин <input name="login" type="text" required><br>
Пароль <input name="password" type="password" required><br>
<button name="auth" formaction="auth_controller.php">Зарегестрироваться</button>
<input type="hidden" name="token" value="<?=$token?>"> <br/>
<input name="submit" type="submit" value="Войти"><br>
Запомнить меня <input type="checkbox" name="memo">

</form>
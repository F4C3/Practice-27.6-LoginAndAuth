<?
// Страница регистрации нового пользователя 
// Соединяемся с БД
session_start();

$link=mysqli_connect("localhost", "root", "", "test"); 
if(isset($_POST['auth']))
{
    $err = [];
    // проверяем логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    } 
    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    } 
    // проверяем, не существует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT USER_ID FROM users WHERE LOGIN='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    } 
    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        $login = $_POST['login'];
        // Убираем лишние пробелы и делаем хэширование (используем старый метод md5)
        $password =  md5(trim($_POST['password'])."MEGASECRET"); 
        mysqli_query($link,"INSERT INTO users SET LOGIN='".$login."', PASSWORD='".$password."'");
        $_SESSION['new'] = 1;
        header("Location: login.php"); exit();
    }
    else
    {
        $_SESSION['error'] = $err;
        header("Location: login.php");
    }
}
?> 
<?
// Скрипт проверки 
// Соединяемся с БД

$link=mysqli_connect("localhost", "root", "", "test");
 
if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
    $query = mysqli_query($link, "SELECT * FROM users WHERE USER_ID = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
 
    if(($userdata['COOKIE'] !== $_COOKIE['cookie']) or ($userdata['USER_ID'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("cookie", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
        print "Хм, что-то не получилось";
        $log = date('Y-m-d H:i:s') . ' Проблема с куками';
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);

    }
    else
    {
        session_start();
        $_SESSION['isauth'] = true;
        $crypt = $_SESSION['role'];
        header('Location: index.php');
    }
}
else
{
    session_start();
    $_SESSION['isauth'] = true;
    $crypt = $_SESSION['role'];
    header('Location: index.php');
}


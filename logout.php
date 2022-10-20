<?
if(isset($_COOKIE["cookie"]))
{
    session_start();
    $_SESSION['isauth'] = null;
    session_destroy();
    header("Location: login.php"); exit;
}
else{

    // Страница разавторизации 
    // Удаляем куки
    session_start();
    $_SESSION['isauth'] = null;
    setcookie("cookie", "", 1);
    setcookie("id", "", 1);
    session_destroy();
    // Переадресовываем браузер на страницу проверки нашего скрипта
    header("Location: index.php"); exit; 

}
?>
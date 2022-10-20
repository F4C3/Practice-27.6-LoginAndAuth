<?
    // Страница разавторизации 
    // Удаляем куки
    session_start();
    $_SESSION['isauth'] = null;
    session_destroy();
    // Переадресовываем браузер на страницу проверки нашего скрипта
    header("Location: index.php"); exit; 

?>
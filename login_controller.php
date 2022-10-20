<?php
session_start();



if($_POST["token"] == $_SESSION["CSRF"])
{
// Начинаем проверку логина и пароля в БД
    // Функция для генерации случайной строки
    function generateCode($length=6) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
                $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    } 
    // Соединяемся с БД
    $link=mysqli_connect("localhost", "root", "", "test");
    if(isset($_POST['submit']))
    {
        // Вытаскиваем из БД запись, у которой логин равняется введенному
        $query = mysqli_query($link,"SELECT USER_ID, PASSWORD, ROLE FROM users WHERE LOGIN='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
        $data = mysqli_fetch_assoc($query); 
        // Сравниваем пароли
        if($data['PASSWORD'] === md5(($_POST['password'])."MEGASECRET"))
        {
            // Генерируем случайное число и шифруем его
            $hash = md5(generateCode(10));
            // Если пользователя выбрал "Запомнить меня"
            if(!empty($_POST['memo']))
            {
                setcookie("id", $data['USER_ID'], time()+60*60*24*30, "/");
                setcookie("cookie", $hash, time()+60*60*24*30, "/", null, null, true); // httponly !!!

                // Записываем в БД куку
                mysqli_query($link, "UPDATE users SET COOKIE='".$hash."' WHERE USER_ID='".$data['USER_ID']."'");
            } 
            // Переадресовываем браузер на страницу проверки нашего скрипта
            $_SESSION['role'] = $data['ROLE'];
            $_SESSION['name'] = $_POST['login'];
            header("Location: check.php"); exit();
        }
        else
        {
             $_SESSION['wrong'] = 1;
             $log = date('Y-m-d H:i:s') . ' Не верный логин или пароль';
             file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
             header("Location: login.php");           
        }
    }
}
else
{
    echo "<script>alert ('Токен не прошёл проверку!!')</script>";
    header("Location: login.php"); 
}
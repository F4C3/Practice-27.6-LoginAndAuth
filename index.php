<?php  
session_start(); 
$_SESSION['wrong'] = null;
$isauth = $_SESSION['isauth'] ?? null ;
$role = $_SESSION['role'] ?? null ;
$_POST['memo'] = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php  if($isauth == false): ?>
        <h2>Добро пожаловать!</h2>
        <a href="login.php">Авторизуйтесь</a>
    <?php  elseif($isauth == true): ?>
        <h1>Добро пожаловать <? echo $_SESSION['name']; ?> </h1> 
        <p><a href="content.php">Страница с контентом</a></p> 
    <?php if ($role == 2) {echo "<button id='priner_id'>Для админа</button>";} ?>
        <script>
        priner_id .addEventListener("click", myFoo1);
        function myFoo1()
        {
        alert ("Добро пожаловать");
        }
        </script> 
        <a href="logout.php">Выйти</a>
    <?php endif ?>    
        
</body>
</html>
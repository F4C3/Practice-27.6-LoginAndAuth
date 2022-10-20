<?  
    session_start();
    $name = $_SESSION['name'];
    if (isset($_REQUEST['someText'])) 
    {
        $fileName = 'someTextFile.txt';
        if (!($fstm = fopen($fileName, "r+")))
        {
            $log = date('Y-m-d H:i:s') . ' Не удалось записать текст';
            file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
            echo "<script>alert ('Файл не найден')</script>";;
        } 
        else 
        {
            fwrite($fstm, $_REQUEST['someText']);
            fclose($fstm);
        }
    }
?>
<p>Добро пожаловать <? echo $name; ?>!</p>
<form method="get" action="content.php">
    <input name="someText" type="text"/>
    <input type="submit" value="click here"/>
</form>
<? if($_SESSION['role'] == 3 or $_SESSION['role'] == 2): ?>
    <?php echo "<img src='../img/i.jpg' alt='Картинка'>";?>  
<?php endif ?> 
<p><a href="index.php">Назад</a></p>
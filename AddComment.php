<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    if (isset($_POST['textcomm'])) { $TextComment = $_POST['textcomm']; if ($TextComment == '') { unset($TextComment);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (empty($TextComment)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    };
    include ("bd.php");
    $today = date("Y-m-d H:i:s"); 
    $result = mysqli_query($db, 'INSERT INTO messages (date, message, post_id, author_id) VALUES ("' . $today . '", "' . $TextComment . '", ' . $_GET["id"] . ', ' . $_SESSION["user_id"] . ')'); 
    $_GET["id"] = $_GET["id"];
    include ('post.php');
?>
<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    if (isset($_POST['title-quest'])) { $TitleQuest = $_POST['title-quest']; if ($TitleQuest == '') { unset($TitleQuest);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['desc-quest'])) { $DescQuest=$_POST['desc-quest']; if ($DescQuest =='') { unset($DescQuest);} }
    if (empty($TitleQuest) or empty($DescQuest)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    };
    include ("bd.php");
    $today = date("Y-m-d H:i:s"); 
    $resultcategory = mysqli_query($db, 'SELECT * FROM category WHERE category_name="' . $_POST["category-quest"] . '"'); 
    $myrow = mysqli_fetch_array($resultcategory);
    $result = mysqli_query($db, 'INSERT INTO posts (date_time, text, title, raiting, post_author_id, category_id) VALUES ("' . $today . '", "' . $DescQuest . '", "' . $TitleQuest . '", 0, ' . $_SESSION["user_id"] . ',' . $myrow["category_id"] .  ')'); 
    include ("new_quest.php"); 
?>
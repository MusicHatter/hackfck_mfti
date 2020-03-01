<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    include ("bd.php");
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
        $_SESSION['logerror']=1;
        include ("index.php");
    }
    else {
        if ($myrow['password']==$password) {
            $_SESSION['login']=$myrow['login']; 
            $_SESSION['user_id']=$myrow['user_id'];
            $_SESSION['logerror']=0;
            header('Refresh: 0; url=index.php');
        }
        else {
            $_SESSION['logerror']=1;
            include ("index.php");
        }
    }
    ?>

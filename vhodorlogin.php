<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    if ($_SESSION['login'] != NULL) {
        echo $_SESSION['login'];}
    else {
        echo "Вход";
    };   ?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache">
    <title>Test</title>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700&display=swap&subset=cyrillic" rel="stylesheet"> 
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header-container">
        <div class="container">
            <nav class="main-navigation">
                <img class="main-logo" src="img/logo.png" width="296" height="96" alt="Логотип МФТИ">

                <ul class="navigation-list">
                    <li class="navigation-item navigation-current-page"><a>Популярные вопросы</a></li>
                    <li class="navigation-item"><a href="new_quest.php">Новые вопросы</a></li>
                    <li class="navigation-item navigation-category-item">
                        <a>Категории</a>
                        <div class="modal-category">
                            <ul class="category-list">
                                <li><a href="category.php?cat=111">Жилищно-коммунальный отдел</a></li>
                                <li><a href="category.php?cat=112">Отдел по работе с иностранными студентами</a></li>
                                <li><a href="category.php?cat=113">Отдел по обеспечению безопасности</a></li>
                                <li><a href="category.php?cat=114">ИТ отдел</a></li>
                                <li><a href="category.php?cat=115">Отдел по созданию природных ресурсов</a></li>
                                <li><a href="category.php?cat=116">Отдел по обеспечению здравоохванения</a></li>
                                <li><a href="category.php?cat=117">Ректорат</a></li>
                                <li><a href="category.php?cat=118">Разное</a></li>
                                <li><a href="category.php?cat=119">Стипендиальный отдел</a></li>
                                <li><a href="category.php?cat=120">Не требует ответа</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <ul class="user-list">
                        <li class="navigation-item navigation-category-item user-list-item">
                            <a id="luboi"><?php include ("vhodorlogin.php") ?> </a>
                            <div class="modal-category">
                                <ul class="category-list user-action-list">
                                    <li><a href="#">Профиль</a></li>
                                    <li class="users-question"><a href="#">Задать вопрос</a></li>
                                    <li><a href="#">Уведомления</a></li>
                                    <li><a href="store.php">Магазин</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
            </nav>
        </div>
    </header>

    <main class="main-containter container">
        <div class="column">
            <div class="main-column">
                <?php include ("postipopular.php"); ?>
            </div>

            <div class="extra-column">
                <section class="find">
                    <h2 class="title-find">Найти вопрос</h2>
                    
                    <form class="find-form">
                        <input class="find-input" type="text" placeholder="Введите вопрос">
                        <p class="find-open">Открыть настройки</p>
                        <div class="find-filter">
                            <label for="filter-famous-form">Сортировка:</label>
                            <select id="filter-famous-form" name="filter-famous">
                                <option>По популярности</option>
                                <option>По новизне</option>
                            </select>
                            <label for="filter-category-form">Категория:</label>
                            <select id="filter-category-form" name="filter-category">
                                <option>Жилищно-коммунальный отдел</option>
								<option>Отдел по работе с иностранными студентами</option>
								<option>Отдел по обеспечению безопасности</option>
								<option>ИТ отдел</option>
								<option>Отдел по созданию и сохранению природных ресурсов</option>
								<option>Отдел по обеспечению здравоохванения</option>
								<option>Ректорат</option>
								<option>Разное</option>
								<option>Стипендиальный отдел</option>
								<option>Не требует ответа</option>
                            </select>
                        </div>
                        <button type="button" class="find-button">Поиск</input>
                    </form>
                </section>
            </div>
        </div>
    </main>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-contact">
                <ul class="footer-news-list">
                    <li><a class="footer-news-item">Новости</a></li>
                    <li><a class="footer-news-item">Правила сайта</a></li>
                    <li><a class="footer-news-item">Сотрудничество</a></li>
                </ul>
            </div>
            <div class="footer-networks">
                <b>Давайте дружить!</b>
                <ul class="footer-networks-list">
                    <li>
                        <a class="button-networks button-networks-vk" href="https://vk.com"><span class="visually-hidden">Вконтакте</span>
                        </a>
                    </li>     
                    <li>
                        <a class="button-networks button-networks-facebook" href="http://facebook.com/"><span class="visually-hidden">Фейсбук</span></a>
                    </li>
                    <li>
                        <a class="button-networks button-networks-instagram" href="https://www.instagram.com"><span class="visually-hidden">Инстаграм</span></a>
                    </li>
                </ul>
            </div>
            <p class="footer-copyright">
                <b>Разработано:</b>
                <a class="footer-copyright-button" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">YesYouCan.</a>
            </p>
        </div>
    </footer>

    <section class="modal modal-login">
        <h2>Личный кабинет</h2>
        <p class="modal-description">Введите пожалуйста свой логин и пароль</p>
        <?php 
        if ($errorlogin = 1) {
             echo '<div class="login-error">Ошибка! Вы ввели неверный логин или пароль!</div>';
        }; 
         ?>
        <form name="user-logging" action="testreg.php" method="post">
            <p>
                <label class="visually-hidden" for="modal-login-input">Логин</label>
                <input class="modal-icon-login" id="modal-login-input" name="login" type="text" placeholder="Логин" size="15" maxlength="15" required>
            </p>
            <p>
                <label class="visually-hidden" for="modal-login-password">Пароль</label>
                <input class="modal-icon-password" id="modal-login-password" name="password" type="password" placeholder="Пароль" size="15" maxlength="15" required>
            </p>
            <p class="login-password-info">
                <label>
                    <input type="checkbox" class="visually-hidden" name="remember">
                    <span class="checkbox-indicator"></span>
                    Запомните меня
                </label>
                <a class="login-password-restore" href="#">Я забыл пароль!</a>
            </p>
            <input class="button" type="submit" name="submit" value="Войти">
        </form>

        <button class="modal-close" type="button"><span class="visually-hidden">Закрыть окно</span></button>
    </section>
    
	<section class="modal modal-question">
            <h2>Задать вопрос</h2>
            
            <form class="temp-form" method="POST" action="sendquestion.php">
                <input type="text" name="title-quest" placeholder="Название">
                <textarea rows="5" cols="45" name="desc-quest" placeholder="Вопрос"></textarea>
                <select id="quest-category-form" name="category-quest">
                    <option>Жилищно-коммунальный отдел</option>
                    <option>Отдел по работе с иностранными студентами</option>
                    <option>Отдел по обеспечению безопасности</option>
                    <option>ИТ отдел</option>
                    <option>Отдел по созданию и сохранению природных ресурсов</option>
                    <option>Отдел по обеспечению здравоохванения</option>
                    <option>Ректорат</option>
                    <option>Разное</option>
                    <option>Стипендиальный отдел</option>
                    <option>Не требует ответа</option>
                </select>
                <button class="button" type="submit">Отправить</button>
            </form>
            <button class="question-close" type="button"><span class="visually-hidden">Закрыть окно</span></button>
        </section>
    
    <script src="/js/main.js"></script>
</body>
</html>

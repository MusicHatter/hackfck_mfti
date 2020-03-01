   <?php
        include ("bd.php");
        $result = mysqli_query($db, 'SELECT posts.*, count(DISTINCT messages.message_id) as MessagesCount, count(DISTINCT official_answer.answ_id) as AnswersCount, category.category_name FROM posts LEFT JOIN category ON posts.category_id = category.category_id LEFT JOIN messages ON posts.post_id = messages.post_id LEFT JOIN official_answer ON posts.post_id = official_answer.answ_post_id WHERE posts.post_id=' . $_GET["id"] . ' GROUP BY posts.post_id');
        $array = mysqli_fetch_array($result);
        if ($array["post_id"] == NULL) {
            $error = 1;
        }
        else {
            if ($array["AnswersCount"] > 0) {
                $resolve = "Есть ответ";
            }
            else {
                $resolve = "Нет ответа";
            }; 
            
            if ($array["image_1"] == NULL)
            {
                $image = "";
            }
            else {
                $image = '<img src=' . $array["image_1"] . '>';
            };
                      echo '<section class="post">
                        <div class="post-content">
                            <h2 class="post-title">' . $array["title"] . '</h2>
                            <p class="post-description">' . $array["text"]  . ' ' . $image . '
                            </p>
                        </div>
                        <div class="post-info">
                            <ul class="info-list">
                                <li class="info-item-category">' . $array["category_name"] . '</li>
                                <li class="info-item-answer">' . $resolve . '</li>
                                <li class="info-item-comments">' . "Комментарии " . $array["MessagesCount"] . '</li>
                                <li class="info-item-rate">Рейтинг ' . $array["raiting"] . '</li class="info-item-category">
                            </ul>
                        </div>
                    </section>';
                    
                    if ($array["AnswersCount"] > 0) {
                    echo '<div class="post-reply">
                        <p class="post-reply-title">Официальный ответ представительства</p>';
                    $answerresult = mysqli_query($db, 'SELECT * FROM official_answer LEFT JOIN users ON official_answer.answ_user_id = users.user_id WHERE answ_post_id=' . $_GET["id"] . ' ORDER BY answ_time');
                    while($arrayanswer = mysqli_fetch_array($answerresult)) {                
                    echo '<span class="comment-name-reply">' . $arrayanswer["first_name"] . ' ' . $arrayanswer["last_name"] . '</span>
                    <time class="comment-time" datetime="2020-02-22T12:23:02">(21 февраля 12:23)</time>
                    <div class="post-reply-value">'
                           . $arrayanswer["answ_text"] .  
                        '</div>'; };
                     echo '</div>'; };   
            echo ' <div class="post-reply-сomment">
                        <p class="post-comment-title">Комментарии</p>
                        <div class="post-comments">';
            $commentresult = mysqli_query($db, 'SELECT * FROM messages LEFT OUTER JOIN users ON messages.author_id = users.user_id WHERE post_id=' . $_GET["id"] . ' ORDER BY messages.date');
            while($arraycomment = mysqli_fetch_array($commentresult)) {
            echo '<div class="comment">
                    <span class="comment-name">' . $arraycomment["first_name"] . ' ' . $arraycomment["last_name"] . '</span>
                    <time class="comment-time" datetime="2020-02-21T12:23:02">(21 февраля 12:23)</time>
                    <p class="comment-value">' . $arraycomment["message"] . '</p>
                  </div>'; };
                  
            echo ' </div>
                </div>'; }
                ?> 

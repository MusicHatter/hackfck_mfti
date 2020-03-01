   <?php
    include ("bd.php");
    $result = mysqli_query($db, "SELECT posts.*, count(DISTINCT messages.message_id) as MessagesCount, count(DISTINCT official_answer.answ_id) as AnswersCount, category.category_name FROM posts LEFT JOIN category ON posts.category_id = category.category_id LEFT JOIN messages ON posts.post_id = messages.post_id LEFT JOIN official_answer ON posts.post_id = official_answer.answ_post_id GROUP BY posts.post_id ORDER BY posts.raiting DESC");
    while($row = mysqli_fetch_array($result))
    {
        if ($row["AnswersCount"] > 0) {
            $resolve = "Есть ответ";
        }
        else {
            $resolve = "Нет ответа";
        } 
        
        if ($row["image_1"] == NULL)
        {
            $image = "";
        }
        else {
            $image = '<img src=' . $row["image_1"] . '>';
        }
        
        echo '<section class="post">
                        <div class="post-content">
                            <a href="post.php?id='. $row["post_id"] . '"> <h2 class="post-title">' . $row["title"] . '</h2> </a>
                            <time class="post-time" datetime="' . $row["date_time"] . '">20 февраля 08:23</time>
                            <p class="post-description">' . $row["text"] .' ' . $image . '
                            </p>
                        </div>
                        <div class="post-info">
                            <ul class="info-list">
                                <li class="info-item-category">' . $row["category_name"] . '</li>
                                <li class="info-item-answer">' . $resolve . '</li>
                                <li class="info-item-comments">' . "Комментарии " . $row["MessagesCount"] . '</li>
                                <li class="info-item-rate">Рейтинг вопроса ' . $row["raiting"] . '</li class="info-item-category">
                            </ul>
                        </div>
                    </section>';
    }
    ?>

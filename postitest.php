    <?php include ("bd.php"); ?>
    <?php $result = mysqli_query($db, "SELECT * FROM posts"); ?>
    <?php while($row = mysqli_fetch_array($result)) { ?>
    <?php 
        if ($row["resolve"] == "1") {
            $resolve = "Есть офф. ответ";
        }
        else {
            $resolve = "Нет офф. ответа";
        }; ?> 
        
        <section class="post">
            <div class="post-content">
                <h2 class="post-title"><? echo $row["title"] ?></h2>
                <p class="post-description"><? echo $row["text"] ?>
                </p>
            </div>
            <div class="post-info">
                <ul class="info-list">
                <li class="info-item-category"><? echo $row["problem_theme"] ?></li>
                <li class="info-item-answer"><? echo $resolve ?></li>
                <li class="info-item-comments">Комментарии:<? echo $row["comments_count"] ?></li>
                <li class="info-item-rate">Рейтинг вопроса:<? echo $row["raiting"] ?></li class="info-item-category">
                </ul>
            </div>
        </section>
   <?php } ?>


    
    

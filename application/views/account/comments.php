<div class="col-lg-8 col-sm-9 mt-3">
    <div class="row">
        <div class="col-3 profile">
            <img src="/public/images/avatar.png" alt="#">
        </div>
        <div class="col-9">
            <h1><span class="badge text-bg-dark"><a href="/category/hits/" class="text-light">User1</a></span></h1>
            <div class="row">
                <div class="col-auto">
                    <h4><span class="badge text-bg-dark">Дата регистрации:</span></h4>
                </div>
                <div class="col-6 mt-1">
                    <p>17 Мая 2015 г.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <h4><span class="badge text-bg-dark">Количество комментариев:</span></h4>
                </div>
                <div class="col-6 mt-1">
                    <p>205</p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <h4><span class="badge text-bg-dark">Окончание премиум-подписки:</span></h4>
                </div>
                <div class="col-6 mt-1">
                    <p>16 ноября 2023</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <section>
                <h4><span class="badge text-bg-dark">Комментарии</span></h4>
                <?php foreach ($comments as $comment) : ?>
                    <div class="row">
                        <div class="col">
                            <div class="profile-films">
                                <img src="<?php echo ($comment['img']) ?>" alt="">
                                <div class="row comment ms-2">
                                    <a href="<?php echo (PATH) . '/filmpage/' . $comment['film_id']; ?>">
                                        <h5 class=""><?php echo ($comment['title']) ?> (<?php echo ($comment['date']) ?>) </h5>
                                    </a>
                                    <div class="text"><?php echo ($comment['text']) ?></div>
                                    <div class="date"><?php echo ($comment['comment_date']) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </section>
        </div>
    </div>
</div>
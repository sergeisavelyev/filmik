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
                <h4><span class="badge text-bg-dark">Понравилось</span></h4>
                <div class="row">
                    <?php foreach ($ratedFilms as $film) : ?>
                        <div class="col-3">
                            <a href="<?php echo (PATH) . '/filmpage/' . $film['id']  ?>">
                                <div class="profile-films">
                                    <img src="<?php echo ($film['img']) ?>" alt="">
                                    <h5 class="ms-2"><?php echo ($film['title']) ?> (<?php echo ($film['date']) ?>)</h5>
                                </div>
                                <hr>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <hr>
            </section>
        </div>
    </div>
</div>
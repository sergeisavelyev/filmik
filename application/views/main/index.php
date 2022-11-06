<div class="col-lg-8 col-sm-9 mt-3">
    <div class="row">
        <h2><span class="badge text-bg-dark"><a href="<?php echo (PATH) . '/category/hits/'; ?>" class="text-light">Новинки</a></span></h2>
        <?php foreach ($filmsHits as $film) : ?>
            <div class="col-lg-3 col-sm-6">
                <div class="film-card">
                    <a href="/filmpage/<?php echo $film['id']; ?>">
                        <img src="<?php echo (($film['img'])); ?>" alt="">
                        <h4><?php echo (($film['title'])); ?></h4>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <h2><span class="badge text-bg-dark"><a href="<?php echo (PATH) . '/category/films/'; ?>" class="text-light">Фильмы</a></span></h2>
        <div class="row">
            <?php foreach ($films as $film) : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="film-card">
                        <a href="/filmpage/<?php echo $film['id']; ?>">
                            <img src="<?php echo (($film['img'])); ?>" alt="">
                            <h4><?php echo (($film['title'])); ?></h4>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row">
        <h2><span class="badge text-bg-dark"><a href="<?php echo (PATH) . '/category/serials/'; ?>" class="text-light">Сериалы</a></span></h2>
        <div class="row">
            <?php foreach ($serials as $serial) : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="film-card">
                        <a href="/filmpage/<?php echo $serial['id']; ?>">
                            <img src="<?php echo (($serial['img'])); ?>" alt="">
                            <h4><?php echo (($serial['title'])); ?></h4>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
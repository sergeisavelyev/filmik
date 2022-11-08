<?php if (empty($results)) : ?>
    <div class="col-lg-8 col-sm-9 mt-3">
        <h1><span class="badge text-bg-dark">По вашему запросу ничего не найдено</span></h1>
    </div>
<?php else : ?>
    <div class="col-lg-8 col-sm-9 mt-3">
        <div class="row">
            <h1><span class="badge text-bg-dark">Результаты поиска:</span></h1>
        </div>
        <div class="row mt-3">
            <div class="col">
                <section>
                    <div class="row">
                        <?php foreach ($results as $item) : ?>
                            <div class="col-3">
                                <a href="<?php echo (PATH) . '/filmpage/' . $item['id']  ?>">
                                    <div class="profile-films">
                                        <img src="<?php echo $item['img'] ?>" alt="">
                                        <h5 class="ms-2"><?php echo $item['title'] ?> (<?php echo $item['date'] ?>)</h5>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <hr>
                </section>
            </div>
        </div>
    </div>
<?php endif; ?>
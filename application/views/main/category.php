<div class="col-lg-8 col-sm-9 mt-3">
    <?php foreach ($category_info as $category) : ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2">
                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href=""><?php echo ($category['category_title']); ?></a></li>
            </ol>
        </nav>
    <?php endforeach; ?>
    <div class="row">
        <div class="row">
            <?php foreach ($films as $film) : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="film-card">
                        <a href="/filmpage/<?php echo ($film['id']); ?>">
                            <img src="<?php echo ($film['img']); ?>" alt="">
                            <h4><?php echo ($film['title']); ?></h4>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
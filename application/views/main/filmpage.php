<?php if (empty($film_info)) : ?>
    <h3>Фильм не найден</h3>
<?php else : ?>
    <?php foreach ($film_info as $film_data) : ?>
        <div class="col-lg-8 col-sm-9 mt-3">
            <?php if (empty($category_info)) : ?>
                <h3>Ошибка</h3>
            <?php else : ?>
                <?php foreach ($category_info as $category_data) : ?>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-2">
                            <li class="breadcrumb-item"><a href="/"><i class="fas fa-home link-dark"></i></a></li>
                            <li class="breadcrumb-item"><a href="/category/<?php echo ($category_data['slug']); ?>"><?php echo ($category_data['category_title']); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo ($film_data['title']); ?></li>
                        </ol>
                    </nav>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo ($film_data['img']); ?>" alt="">
                </div>
                <div class="col-md-8">
                    <h3>
                        <?php echo ($film_data['title']) . ' ';
                        echo  '(' . ($film_data['date']) . ')'; ?>
                    </h3>
                    <div><?php echo ($film_data['content']); ?></div>
                    <h4 class="my-3">Смотреть онлайн:</h4>
                    <div class="play">
                        <video width="95%" src="/public/trailers/films/thor.mp4" type="video/mp4" controls="controls">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col d-flex align-items-center">
                        <p class="h3">Оценить:</p>
                        <div class="rating">
                            <?php if (!$check_liked) : ?>
                                <a class="d-flex align-self-center mx-3 mt-3 rating-like" href="/rating/like?id=<?= $film_data['id'] ?>" data-id="<?= $film_data['id']; ?>">
                                    <p class="counter"><?php echo ($film_rating); ?></p>
                                    <i class="icon fa-solid fa-thumbs-up mx-2 mt-1"></i>
                                    Нравится
                                </a>
                            <?php else : ?>
                                <a class="d-flex align-self-center mx-3 mt-3 rating-like" href="/rating/like?id=<?= $film_data['id'] ?>" data-id="<?= $film_data['id']; ?>">
                                    <p class="counter"><?php echo ($film_rating); ?></p>
                                    <i class="icon fa-regular fa-thumbs-up mx-2 mt-1"></i>
                                    Нравится
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="disrating">
                            <?php if (!$check_disliked) : ?>
                                <a class="d-flex align-self-center mt-3 rating-dislike" href="/rating/dislike?id=<?= $film_data['id'] ?>" data-id="<?= $film_data['id']; ?>">
                                    <p class="dis-counter"><?php echo ($film_disrating); ?></p>
                                    <i class="dis-icon fa-solid fa-thumbs-down mx-2 mt-1"></i>
                                    Не нравится
                                </a>
                            <?php else : ?>
                                <a class="d-flex align-self-center mt-3 rating-dislike" href="/rating/dislike?id=<?= $film_data['id'] ?>" data-id="<?= $film_data['id']; ?>">
                                    <p class="dis-counter"><?php echo ($film_disrating); ?></p>
                                    <i class="dis-icon fa-regular fa-thumbs-down mx-2 mt-1"></i>
                                    Не нравится
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Оставьте комментарий</label>
                        <textarea class="form-control text" name="text" id="<?= $film_data['id'] ?>" rows="3"></textarea>
                        <button type="submit" class="comment btn btn-dark my-3">Отправить</button>
                    </div>
                </div>
                <div class="comments">
                    <?php if (!empty($comments)) : ?>
                        <?php foreach ($comments as $comment) : ?>
                            <div class="row justify-content-between comment-item">
                                <div class="col-auto">
                                    <div class="user"><i class="fa-regular fa-user"></i> <?php echo htmlspecialchars(($comment['user_login']), ENT_QUOTES); ?></div>
                                    <div class="date"><?php echo ($comment['comment_date']); ?></div>
                                </div>
                                <?php if ($comment['user_id'] == ($_SESSION['user_id'] ?? '')) : ?>
                                    <div class="col-auto delete-button">
                                        <a href="" class="delete-comment" id="<?php echo ($comment['id']) ?>">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="text"><?php echo htmlspecialchars(($comment['text']), ENT_QUOTES); ?></div>
                            <hr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
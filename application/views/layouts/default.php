<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="/public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/styles/main.css" rel="stylesheet">
    <link rel="stylesheet" href="/node_modules/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <link rel="icon" type="image.png" sizes="32x32" href="/public/images/logo.png">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5 ">
        <div class="container-fluid mx-5 py-1">
            <a class="navbar-brand" href="/">
                <img src="/public/images/logo.png" alt="" width="40" height="40" class="mb-1">
                Filmik
            </a>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo (PATH) . '/category/hits/1'; ?>">Новинки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo (PATH) . '/category/films/1'; ?>">Фильмы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo (PATH) . '/category/serials/1'; ?>">Сериалы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo (PATH) . '/category/serials/1'; ?>">Документальные</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-user"></i>
                        <?php if (!isset($_SESSION['authorize'])) : ?>
                            Профиль
                        <?php else : ?>
                            <?php echo ($_SESSION['user_login']); ?>
                        <?php endif; ?>
                    </button>
                    <ul class="dropdown-menu">
                        <?php if (!isset($_SESSION['authorize'])) : ?>
                            <li><a class="dropdown-item" href="<?php echo (PATH) . '/authorization/login/'; ?>"><i class="fa-solid fa-right-to-bracket"></i> Авторизация</a></li>
                            <li><a class="dropdown-item" href="<?php echo (PATH) . '/authorization/registration/'; ?>"><i class="fa-regular fa-address-card"></i> Регистрация</a></li>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="<?php echo (PATH) . '/account'; ?>">Мой профиль</a></li>
                            <li><a class="dropdown-item" href="<?php echo (PATH) . '/authorization/logout/'; ?>">Выйти</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <form action="<?php echo PATH . '/search/results'; ?>" method="POST" class="d-flex mx-3 search" role="search">
                    <input class="form-control me-2" id="live_search" type="search" name="input" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn btn-outline-light" type="submit">Поиск</button>
                </form>
            </div>
        </div>
    </nav>
    <ul class="list-group searchresult" id="searchresult">
    </ul>

    <div class="container-fluid">
        <div class="row wrapper">
            <div class="col-lg-2 col-sm-3">
                <div class="sidebar ">
                    <ul class="list-group">
                        <?php if (isset($_SESSION['authorize'])) : ?>
                            <li class="list-group-item sidebar-title "><a href="<?php echo (PATH) . '/account'; ?>" class="text-light"><i class="fa-regular fa-user"></i> Профиль</a></li>
                            <li class="list-group-item"><i class="fa-solid fa-display"></i> Я смотрю</li>
                            <li class="list-group-item"><i class="fa-regular fa-bookmark"></i> Закладки</li>
                            <li class="list-group-item">
                                <a href="<?php echo (PATH) . '/account/playlists'; ?>">
                                    <i class="fa-solid fa-list-ul"></i> Плейлисты
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="<?php echo (PATH) . '/account/comments'; ?>">
                                    <i class="fa-regular fa-comments"></i> Комментарии
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="<?php echo (PATH) . '/account/liked'; ?>">
                                    <i class="fa-regular fa-thumbs-up"></i> Понравилось
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="<?php echo (PATH) . '/account/disliked'; ?>">
                                    <i class="fa-regular fa-thumbs-down"></i> Не понравилось
                                </a>
                            </li>
                            <li class="list-group-item"><i class="fa-regular fa-clock"></i> История</li>
                        <?php else : ?>
                            <li class="list-group-item sidebar-title disabled bg-dark text-light"><i class="fa-regular fa-user"></i> Профиль</li>
                            <li class="list-group-item"><i class="fa-solid fa-display"></i> Я смотрю</li>
                            <li class="list-group-item"><i class="fa-regular fa-bookmark"></i> Закладки</li>
                            <li class="list-group-item"><i class="fa-solid fa-list-ul"></i> Плейлисты</li>
                            <li class="list-group-item"><i class="fa-regular fa-comments"></i> Комментарии</li>
                            <li class="list-group-item"><i class="fa-regular fa-thumbs-up"></i> Понравилось</li>
                            <li class="list-group-item"><i class="fa-regular fa-thumbs-down"></i> Не понравилось</li>
                            <li class="list-group-item"><i class="fa-regular fa-clock"></i> История</li>
                        <?php endif; ?>
                    </ul>
                    <ul class="list-group mt-2">
                        <li class="list-group-item sidebar-title"><a href="<?php echo (PATH) . '/category/films/'; ?>" class="text-light"><i class="fa-solid fa-photo-film"></i> Библиотека</a></li>
                        <li class="list-group-item"><i class="fa-solid fa-film"></i> Фильмы</li>
                        <li class="list-group-item"><i class="fa-solid fa-photo-film"></i> Сериалы</li>
                        <li class="list-group-item"><i class="fa-solid fa-book"></i> Документальное</li>
                        <li class="list-group-item"><i class="fa-solid fa-medal"></i> Спортивное</li>
                        <li class="list-group-item"><i class="fa-regular fa-star"></i> ТВ Шоу</li>
                    </ul>
                </div>
            </div>
            <?php echo $content; ?>
            <div class="col-lg-2  mt-4">
                <div class="sidebar">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action bg-dark text-white" aria-current="true"><i class="fa-solid fa-rectangle-ad"></i> Блок рекламы</button>
                        <button type="button" class="list-group-item list-group-item-action">
                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus non nam quae architecto ipsum illo minus, Nostrum quaerat iusto
                            Accusamus dolor repellat labore eius placeat illo modi non officiis necessitatibus adipisci, odio molestias tempore ratione, quae, aut possimus excepturi provident
                            maiores molestiae culpa neque quia sunt est. Facere repudiandae nemo ducimus! Nulla praesentium impedit odit, commodi, assumenda magnam, maiores at aspernatur eveniet
                            <img src="/public/images/adv.jpg" alt="" class="my-2">
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="footer bg-dark text-white mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-3">
                    <img src="/public/images/logo.png" alt="" width="32" height="32" class="mb-1">Filmik — Удобный просмотр различных произведений кино в любое время, в любом месте
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </section>
    </div>

    <script src="https://kit.fontawesome.com/d75bf2db6b.js" crossorigin="anonymous"></script>
    <script src="/public/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/main.js"></script>
    <script src="/public/scripts/popper.js"></script>
    <script src="/public/scripts/bootstrap.js"></script>
    <script src="/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="/public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/styles/main.css" rel="stylesheet">
    <link rel="icon" type="image.png" sizes="32x32" href="/public/images/logo.png">
    <script src="https://kit.fontawesome.com/d75bf2db6b.js" crossorigin="anonymous"></script>
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/popper.js"></script>
    <script src="/public/scripts/bootstrap.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5 ">
        <div class="container-fluid mx-5 py-1">
            <a class="navbar-brand" href="/">
                <img src="/public/images/logo.png" alt="" width="32" height="32" height="32" class="d-inline-block align-text-top">
                Filmik
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Новинки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Фильмы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Сериалы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Документальные</a>
                    </li>
                </ul>

                <form class="d-flex mx-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn btn-outline-light" type="submit">Поиск</button>
                </form>

            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row wrapper">
            <div class="col-lg-2 col-sm mt-4">
                <div class="sidebar">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action bg-dark text-white" aria-current="true"><i class="fa-regular fa-user "></i> Профиль</button>
                        <button type="button" class="list-group-item list-group-item-action">Закладки</button>
                        <button type="button" class="list-group-item list-group-item-action">История</button>
                        <button type="button" class="list-group-item list-group-item-action">Новинки для вас</button>
                        <button type="button" class="list-group-item list-group-item-action">Подборки</button>
                    </div>
                    <div class="list-group mt-3">
                        <button type="button" class="list-group-item list-group-item-action bg-dark text-white" aria-current="true"><i class="fa-regular fa-address-book"></i> Контакты</button>
                        <button type="button" class="list-group-item list-group-item-action">Почта</button>
                        <button type="button" class="list-group-item list-group-item-action">Телеграм</button>
                        <button type="button" class="list-group-item list-group-item-action">Статус</button>
                    </div>
                </div>
            </div>
            <?php echo $content; ?>
            <div class="col-lg-2  col-sm-6 mt-4">
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
</body>

</html>
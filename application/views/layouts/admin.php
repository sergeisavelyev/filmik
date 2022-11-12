<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="/public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/node_modules/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <link href="/public/styles/admin.css" rel="stylesheet">
    <link rel="icon" type="image.png" sizes="32x32" href="/public/images/logo.png">
</head>

<body class="fixed-nav sticky-footer bg-dark">
    <?php if ($this->route['action'] != 'login') : ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand ms-3" href="/admin/films">Панель Администратора</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/films">
                            <i class="fa fa-fw fa-list"></i>
                            <span class="nav-link-text">Фильмы</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/add">
                            <i class="fa fa-fw fa-plus"></i>
                            <span class="nav-link-text">Добавить фильм</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/edit">
                            <i class="fa-regular fa-pen-to-square"></i>
                            <span class="nav-link-text">Редактировать фильм</span>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/delete">
                            <i class="delete-film fa-solid fa-trash-can"></i>
                            <span class="nav-link-text">Удалить фильм</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/logout">
                            <i class="fa fa-fw fa-sign-out"></i>
                            <span class="nav-link-text">Выход</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    <?php endif; ?>
    <?php echo $content; ?>
    <?php if ($this->route['action'] != 'login') : ?>
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>&copy; Filmik</small>
                </div>
            </div>
        </footer>
    <?php endif; ?>
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/main.js"></script>
    <script src="/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="https://kit.fontawesome.com/d75bf2db6b.js" crossorigin="anonymous"></script>
</body>

</html>
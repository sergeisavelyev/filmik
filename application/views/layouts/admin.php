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
</head>

<body class="bg-dark">
    <div class="container mt-5">
        <?php echo $content; ?>
    </div>
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php
spl_autoload_register(function ($vs_class_name) {
    $base_dir = __DIR__ . '/system/';
    $file = $base_dir . str_replace('\\', '/', $vs_class_name) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});


if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION["brahma"] = new brahma;
    $main_controller = &$_SESSION["brahma"];

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    $main_controller->import_active_theme();
    ?>

    <title>ytpepega</title>
</head>
<body>
    <?php $main_controller->build_screen("index");
    ?>
</body>
</html>

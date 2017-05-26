<?php
/**
 * Created by PhpStorm.
 * User: zballos
 * Date: 23/05/17
 * Time: 02:30
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PizzTOP</title>

    <!-- Bootstrap -->
    <link href="view/css/bootstrap.min.css" rel="stylesheet">
    <script src="view/js/jquery-2.1.3.min.js"></script>
    <style type="text/css">
        #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"
        async=""
        defer="defer"
        type="text/javascript"></script>
</head>
<body>
<div class="container">
    <?php
    spl_autoload_register(function ($class) {
        require_once(str_replace('\\', '/', $class . '.class.php'));
    });
    ?>
    <?php require_once "view/container.php"; ?>
    </div>
<script src="view/js/jquery.mask.js"></script>
</body>
</html>
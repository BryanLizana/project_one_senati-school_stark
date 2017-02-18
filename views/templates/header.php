<?php session_start(); ?>
<?php require_once('../../controllers/functions.php') ?>
<?php valid_login(); ?>
<?php valid_permisos($page_this); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>School Stark</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/views/assets/css/pure.css" rel="stylesheet">
        <link href="/views/assets/css/main.css" rel="stylesheet">
        
        <script src="/views/assets/js/pure.js"></script>
    </head>
    <body>

<body>
    <div id="layout">
    <div>
        <?php require_once('../templates/nav.php') ?>
    </div>

    <div style="height: 150px;">
        
    </div>
<hr>


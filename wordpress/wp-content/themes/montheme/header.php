<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body>
    <nav>
        <a href="#"><?php bloginfo('name') ?></a>
        <?php wp_nav_menu(['theme_location' => 'header']) ?>
    </nav>
    <?= get_search_form() ?>
    <div class="container">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body>
    <nav class="nav">
        <a href="<?php echo home_url(); ?>">
            <div class="container-logo">
                <img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo_marmishlag.png">
            </div>
        </a>
        <?php wp_nav_menu([
            'theme_location' => 'header',
            'container' => 'ul',
            'menu_class' => 'container-ul',
            'add_a_class' => 'a-nav',
        ]) ?>
        <?php if (is_home()) : ?>
            <div class="nav-search">
                <?= get_search_form() ?>
            </div>
        <?php endif; ?>
        <div class="authentification">
            <?php $user = wp_get_current_user(); ?>
            <?php if ($user->ID == 0) : ?>
                <a class="btn-login" href="<?php echo bloginfo('url'); ?>/login">Se connecter</a>
                <a class="btn-register" href="<?php echo bloginfo('url'); ?>/register">S'inscrire</a>
            <?php else : ?>
                <p style="color: black">Salut <?php echo $user->user_login; ?></p>
                <a style="color: black" href="<?php echo bloginfo('url'); ?>/logout">Se déconnecter</a>
                <a style="color: black" href="<?php echo bloginfo('url'); ?>/profil">Mon profil</a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">
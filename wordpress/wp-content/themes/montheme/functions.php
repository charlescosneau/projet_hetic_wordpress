<?php
function montheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');

    add_image_size('card-header', 300, 187.5, true);
}

function montheme_register_assets()
{
    wp_enqueue_style('header-style', get_template_directory_uri() . '/css/header.css');
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/css/footer.css');
    wp_enqueue_style('reset-style', get_template_directory_uri() . '/css/reset.css');
    wp_enqueue_style('allposts-style', get_template_directory_uri() . '/css/allposts.css');
    wp_enqueue_style('first-style', get_template_directory_uri() . '/css/style.css');
	wp_enqueue_style('single-post-style', get_template_directory_uri() . '/css/single-post.css');
	wp_enqueue_style('connexion-style', get_template_directory_uri() . '/css/connexion.css');
}

add_action('wp_enqueue_scripts', 'montheme_register_assets');


function montheme_title_separator()
{
    return '|';
}

function montheme_document_title_parts($title)
{
    return $title;
}

function montheme_pagination()
{
    $pages = paginate_links(['type' => 'array']);;
    if ($pages === null) {
        return;
    }
    echo '<nav>';
    echo '<ul>';
    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class . '">';
        echo $page;
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
}

function montheme_init()
{
    register_taxonomy('recette', 'post', [
        'labels' => [
            'name' => 'Recette',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
    ]);
}
add_action('admin_post_wphetic_form', function () {
    if (!wp_verify_nonce($_POST['random_nonce'], 'random_action')) {
        die('nonce invalide');
    }
    $message = $_POST['message'];
    wp_redirect($_POST['_wp_http_referer'] . "?message=" . $message);
    exit();
});

function remove_admin_bar()
{
    add_filter('show_admin_bar', '__return_false');
}

function site_router()
{
    $root = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
    $url = str_replace($root, '', $_SERVER['REQUEST_URI']);
    $url = explode('/', $url);
    if (count($url) == 1 && $url[0] == 'login') {
        require 'connexion.php';
        die();
    } else if (count($url) == 1 && $url[0] == 'profil') {
        require 'profil.php';
        die();
    } else if (count($url) == 1 && $url[0] == 'logout') {
        wp_logout();
        header('location:' . $root);
        die();
    } else if (count($url) == 1 && $url[0] == 'register') {
        require 'register.php';
        die();
    }
}

add_action('send_headers', 'site_router');
add_action('init', 'montheme_init');
add_action('after_setup_theme', 'remove_admin_bar');
add_action('after_setup_theme', 'montheme_supports');
add_filter('document_title_separator', 'montheme_title_separator');
add_filter('document_title_separator', 'montheme_document_title_parts');

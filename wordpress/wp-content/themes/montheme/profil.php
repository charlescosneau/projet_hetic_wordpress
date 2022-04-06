<?php

/**
 * Template Name: Profil
 */
$user = wp_get_current_user();
if ($user->ID == 0) {
    header('location:login');
}
if (!empty($_POST)) {
    update_user_meta(get_current_user_id(), 'age', $_POST['age']);
}


$currentUser = wp_get_current_user();

$args = array(
    'post_type'      => 'post',
    'author'         => $currentUser->ID,
    'order'          => 'ASC',
    'posts_per_page' => - 1
);

$query = new WP_Query($args);
$current_user_posts = get_posts($args);
$total = count($current_user_posts);


?>
<?php get_header() ?>
<div class="container-profil">
    <div class="informations">
        <h1>Mes informations</h1>
    </div>
    <h3>Vous avez <?= $total; ?> recettes :</h3>
    <div class="card-all-profil">
        <?php while ($query->have_posts()) : ?>
            <div class="card-profil">
                <?php $query->the_post(); ?>
                <h5 class="card-title"><?php the_title() ?></h5>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <li><a href="<?= get_delete_post_link(get_the_ID()) ?>">Supprimer</a></li>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer() ?>
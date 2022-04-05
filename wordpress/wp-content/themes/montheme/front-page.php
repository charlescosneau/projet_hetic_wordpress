<?php get_header() ?>
<div class="background-container">
    <div class="home">
        <div class="home-container">
            <h1 class="home-first-text">Marmishlag</h1>
            <h2 class="home-second-text">Toutes vos recettes de cuisine à portée de main</h2>
        </div>
        <a class="cta-home" href="<?= get_post_type_archive_link('post') ?>">Voir les dernières recettes</a>
    </div>
</div>
<?php get_footer() ?>
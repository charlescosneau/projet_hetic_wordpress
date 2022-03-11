<?php get_header() ?>
<div class="container-all-card">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="card">
            <h5 class="card-title"><?php the_title() ?></h5>
            <h6 class="card-category"><?php the_category() ?></h6>
            <p class="card-text"><?php the_content('En voir plus') ?></p>
            <a class="card-link" href="<?php the_permalink() ?>">Voir plus</a>
            <a href="#" class="card-link">Un autre lien</a>
        </div>
    <?php endwhile ?>
<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>
</div>
<?php get_footer() ?>
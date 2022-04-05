<?php get_header() ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="post">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <h6 class="post-category"><?php the_category(); ?></h6>
            <img class="post-thumbnail" src="<?= the_post_thumbnail_url(); ?>" alt="" />
            <div class="post-content">
                <p class="post-text"><?php the_content(); ?></p>
            </div>
        </div>
    <?php endwhile ?>
<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>
<?php get_footer() ?>
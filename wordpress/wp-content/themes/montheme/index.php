<?php get_header() ?>



<div class="container-all-card">
    <div class="view-container" style="    width: 80vw;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="card" style="max-width: 300px;
border: 1px solid black;
    padding: 10px;     height: 100%;">
                    <?php the_post_thumbnail('post_thumbnail', ['class' => 'card_img_top', 'alt' => '']) ?>
                    <h5 class="card-title" style="margin: 0;"><?php the_title() ?></h5>
                    <h6 class="card-category" style="margin: 0;"><?php the_category() ?></h6>
                    <p class="card-text" style="    padding-left: 10px;     margin: 0;"><?php the_content('En voir plus') ?></p>
                    <a class="card-link" href="<?php the_permalink() ?>">Voir plus</a>
                </div>
            <?php endwhile ?>
        <?php else : ?>
            <h1>Pas d'articles</h1>
        <?php endif; ?>
    </div>
</div>
<?php get_footer() ?>
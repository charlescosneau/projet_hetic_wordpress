<?php get_header() ?>
<?php wp_head() ?>

<?php $recettes = get_terms(['taxonomy' => 'recette']) ?>
<ul>
    <?php foreach ($recettes as $recette) : ?>
        <li>
            <a href="<?php get_term_link($recette) ?>"><?= $recette->name ?></a>
        </li>
    <?php endforeach; ?>
</ul>
<div class="container-all-card">
    <div class="view-container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="card">
                    <h5 class="card-title"><?php the_title() ?></h5>
                    <?php the_post_thumbnail('card-header', ['class' => 'card_img_top', 'alt' => '']) ?>
                    <h6 class="card-category"><?php the_category() ?></h6>
                    <p class="card-text"><?php the_content('En voir plus') ?></p>
                    <p><?php the_terms(get_the_ID(), 'recette') ?></p>
                    <button>
                        <a class="card-link" href="<?php the_permalink() ?>">Voir plus</a>
                    </button>
                </div>
            <?php endwhile ?>
            <?php montheme_pagination() ?>
        <?php else : ?>
            <h1>Pas d'articles</h1>
        <?php endif; ?>
    </div>
</div>
<?php get_footer() ?>
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
               <?php $backgroundurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
               <?php echo'<div class="card" style="background: url('. $backgroundurl.'); background-size: cover;"> '?>
                    <div class="card-content">
                        <h5 class="card-title"><?php the_title() ?></h5>
                        <h6 class="card-category"><?php the_category() ?></h6>
                        <div class="card-text">
                            <?php the_content('En voir plus') ?>
                            <?php the_terms(get_the_ID(), 'recette') ?>
                        </div>
                    </div>
                    <div class="voirplus">
                       <button>
                            <a class="card-link" href="<?php the_permalink() ?>">Voir plus</a>
                        </button> 
                    </div>
                </div>
            <?php endwhile ?>
        <?php else : ?>
            <h1>Pas d'articles</h1>
        <?php endif; ?>
    </div>
    <div class="pagination">
        <?php montheme_pagination() ?>
    </div>
</div>
<?php get_footer() ?>
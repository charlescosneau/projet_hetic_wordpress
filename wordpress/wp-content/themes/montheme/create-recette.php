<?php

/**
 * Template Name: creation d'une recette
 */
$categories = get_categories(array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => false
));

?>

<?php get_header() ?>
<div class="container-recette">
    <h1>Je suis la page de création d'une recette</h1>
    <form action="<?php echo admin_url('admin-post.php'); ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="post_title">Titre de la recette</label><br />
            <input type="text" value="<?php echo isset($d['post_title']) ? $d['post_title'] : ''; ?>" id="post_title" name="post_title">
        </div>
        <div>
            <label for="post_content">Contenu de la recette</label><br />
            <input type="text" value="<?php echo isset($d['post_content']) ? $d['post_content'] : ''; ?>" id="post_content" name="post_content">
        </div>
        <div>
            <label for="post_category">Categories de la recette</label><br />
            <select name="post_category" id="post_category">
                <?php foreach ($categories as $category) {
                    echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
                }  ?>
            </select>
        </div>
        <div>
            <label for="post_img">Image</label>
            <input type="file" name="post_img" id="post_img" multiple="false">
        </div>
        <input type="hidden" name="action" value="create-recette">
        <?php wp_nonce_field('create-recette-action', 'create-recette-name'); ?>
        <input type="submit" value="Créer une recette">
    </form>
</div>
<?php get_footer() ?>
<?php

/**
 * Template Name: Profil
 */
$user = wp_get_current_user();
if ($user->ID == 0) {
    header('location:login');
}
if(!empty($_POST)){
    update_user_meta(get_current_user_id(), 'age', $_POST['age']);
}
?>
<?php get_header() ?>
<div class="container-profil">
    <h1>Mes informations</h1>

    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" methode="POST">
        <label>Votre age</label>
        <input type="text" name="age" value="<?php echo get_user_meta(get_current_user_id(), 'age', true); ?>">
        <input type="submit" value="modifier">
    </form>
</div>
<?php get_footer() ?>
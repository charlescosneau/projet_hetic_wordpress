<?php

/**
 * Template Name: Connexion
 */
$error = false;
if (!empty($_POST)) {
    $user = wp_signon($_POST);
    if (is_wp_error($user)) {
        $error = $user->get_error_message();
    } else {
        header('location:profil');
    }
} else {
    $user = wp_get_current_user();
    if ($user->ID != 0) {
        header('location:profil');
    }
}
?>
<?php get_header() ?>
<div class="container-connexion">
    <h1>Se connecter</h1>
    <?php if ($error) : ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
        <div>
            <label for="user_login">Votre pseudo</label><br />
            <input type="text" id="user_login" name="user_login">
        </div>
        <div>
            <label for="user_password">Votre mot de passe</label><br />
            <input type="passwordd" id="user_password" name="user_password">
        </div>
        <div>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Se souvenir de moi</label><br />
        </div>
        <input type="submit" value="Se connecter">
    </form>
</div>
<?php get_footer() ?>
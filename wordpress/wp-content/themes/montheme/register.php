<?php

/**
 * Template Name: Register
 */
$error = false;
if (!empty($_POST)) {
    $d = $_POST;
    if ($d['user_pass'] != $d['user_pass2']) {
        $error = 'Les deux mots de passes ne correspondent pas';
    } else {
        if (!is_email($d['user_email'])) {
            $error = 'Veuillez entrer un email valide';
        } else {
            $user = wp_insert_user(array(
                'user_login' => $d['user_login'],
                'user_pass' => $d['user_pass'],
                'user_email' => $d['user_email'],
                'user_registered' => date('Y-m-d H:i:s'),
            ));
            if(is_wp_error($user)){
                $error = $user->get_error_message();
            } else {
                $msg = 'Vous êtes maintenant inscrit';
                $headers = 'De: ' . get_option('admin_email')." \r\n";
                wp_mail($d['user_email'], 'Inscription réussie', $msg, $headers);
                $d = array();
                wp_signon($user);
                header('Location:profil');
            }
        }
    }
}
?>
<?php get_header() ?>
<div class="container-connexion">
    <h1 class="connexion-title">S'inscrire</h1>
    <?php if ($error) : ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endif ?>
    <form class="connexion-form" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
        <div>
            <label class="connexion-label" for="user_login">Votre pseudo</label><br />
            <input class="connexion-input" type="text" value="<?php echo isset($d['user_login']) ? $d['user_login'] : ''; ?>" id="user_login" name="user_login">
        </div>
        <div>
            <label class="connexion-label" for="user_email">Votre email</label><br />
            <input class="connexion-input" type="text" value="<?php echo isset($d['user_email']) ? $d['user_email'] : ''; ?>" id="user_email" name="user_email">
        </div>
        <div>
            <label class="connexion-label" for="user_pass">Votre mot de passe</label><br />
            <input class="connexion-input" type="password" id="user_pass" name="user_pass">
        </div>
        <div>
            <label class="connexion-label" for="user_pass2">Confirmer votre mot de passe</label><br />
            <input class="connexion-input" type="password" id="user_pass2" name="user_pass2">
        </div>
        <input class="connexion-submit" type="submit" value="S'inscrire">
    </form>
</div>
<?php get_footer() ?>
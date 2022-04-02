<?php

/**
 * Template Name: inscription
 */
?>
<?php get_header() ?>
<?php 

if(isset($_POST['submit'])) {
    echo 'blabla';
}

?>
<h1>Je suis la page inscription</h1>
<form action="<?php echo the_permalink(); ?>" method="post">
    <div>
        <label for="emailAddress">Email address</label><br />
        <input type="text" id="emailAddress" name="log">
    </div>
    <div>
        <label for="password">Password</label><br />
        <input type="text" id="password" name="pwd">
    </div>
    <div>
        <input type="checkbox" id="checkbox" name="rememberme">
        <label for="checkbox">check me out</label><br />
    </div>
    <button type="submit">Submit</button>
</form>
<?php get_footer() ?>
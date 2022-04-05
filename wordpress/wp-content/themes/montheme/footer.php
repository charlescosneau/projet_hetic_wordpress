</div>
<footer class="footer">
    <div class="container-footer">
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo_marmishlag.png">
            </a>
        </div>
        <?php wp_nav_menu([
            'theme_location' => 'footer',
            'container' => 'ul',
            'menu_class' => 'container-ul-footer',
            'add_a_class' => 'a-nav',
        ]) ?>
    </div>
    <div class="copyright">
        <p>&copy; Copyright 2022 - Marmishlag</p>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>
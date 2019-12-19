</main>

<footer class="footer">

    <div class="wrapper flex">
        <a href="<?php echo get_home_url(); ?>" class="footer__home-link"">
          <h2 class="footer__logo"><?php the_field('footer_logo', 'option'); ?></h2>
        </a>

        <div class="socials">
          <p class="socials__text">Follow us on: </p>
          <?php wp_nav_menu( array(
          'theme_location' => 'footer',
          'container_class' => 'socials__menu',
          'menu_class' => 'socials__list'
          )); ?>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>

</body>

</html>
<?php get_header(); ?>

<div class="main-content">
  <div class="wrapper">
    <section class="content">

      <h1 class="heading--secondary"><?php single_cat_title(); ?></h1>

      <?php
        $category_description = category_description();
        if ( ! empty( $category_description ) )
          echo '' . $category_description . '';
          get_template_part( 'loop', 'category' );
        ?>

    </section> <!-- /.content -->

  </div>
</div>

<?php get_footer(); ?>
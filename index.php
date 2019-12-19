<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>
<section class="main-content">
  <span class="rockets-img"></span>
  <div class="wrapper">
    <div class="content">
      <div class="header-container">
        
            <h1 class="heading--primary"><?php single_post_title(); ?></h1>

          </div>

          <div class="categories-selector">

            <form action="<?php echo get_home_url('/'); ?>" class="categories-selector__form">

              <?php wp_dropdown_categories(); ?>

              <input type="submit" value="Search" class="categories-selector__button visuallyhidden">

            </form>
            
          </div>


      <?php get_template_part( 'loop', 'index' );	?>

    </div> <!--/.content -->

    <!-- <?php get_sidebar(); ?> -->

  </div> 
</section>

<?php get_footer(); ?>
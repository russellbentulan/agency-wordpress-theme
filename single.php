<?php get_header(); ?>

  <div class="main-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <?php $post_category = get_the_category();?>

      <div class="wrapper">
        <nav aria-label="Breadcrumb" class="breadcrumb">
          <ol class="breadcrumb__list">

              <?php foreach( $post_category as $category ) { ?> 

                  <li class="breadcrumb__item">
                      Blog
                  </li>

                  <i class="fas fa-chevron-right"></i>

                  <li class="breadcrumb__item">
                      <?php echo $category->name;?>
                  </li>

                  <i class="fas fa-chevron-right"></i>

                  <li class="breadcrumb__item">
                      <?php the_title(); ?>
                  </li>

              <?php } ?>
          </ol>
        </nav>
      </div>

      <?php
        $thumbnail_id = get_post_thumbnail_id();
        $thumbnail_url = get_the_post_thumbnail_url( 'full' );
        $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
      ?>

      <article class="entry__container">

          <div class="wrapper">
            
            <div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

              <div class="entry__header">

                <div class="entry__info">

                  <p class="entry__category"><?php echo $category->name;?></p>

                  <h1 class="entry__title heading--primary"><?php the_title(); ?></h1>

                  <p class="entry__meta">

                    <?php base_theme_posted_on(); ?>

                  </p><!-- .entry-meta -->

                </div>
                
                <div class="entry__img-container">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php $thumbnail_alt ?>" class="entry__img">
                </div>

              </div>

              <div class="entry__content">

                <?php the_content(); ?>
                <?php wp_link_pages(array(
                  'before' => '<div class="page-link"> Pages: ',
                  'after' => '</div>'
                )); ?>
                
              </div><!-- .entry-content -->
                  
            </div><!-- #post-## -->

          <?php endwhile; // end of the loop. ?>

        </div>

    </article>

</div> <!-- /.content -->
<?php get_footer(); ?>
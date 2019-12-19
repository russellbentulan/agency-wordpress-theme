<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<section class="main-content">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
        <span class="rockets-img"></span>
        
        <div class="header-container">

            <h1 class="heading--primary about-page__heading">
                <?php the_title(); ?>
            </h1>

        </div>

        <div class="wrapper">
            <?php the_content(); ?>
        </div>
        
    <?php endwhile; ?>
    <?php endif; ?>

</section>

<?php get_footer(); ?>
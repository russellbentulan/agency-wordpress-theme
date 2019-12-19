<?php /* Template Name: Services */ ?>

<?php get_header(); ?>

<div class="main-content">
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <span class="rockets-img"></span>
        <section class="services">

            <div class="header-container">


                <h1 class="heading--primary services__heading"><?php the_title(); ?></h1>

            </div>

            <div class="wrapper">
                
                <?php include('services.php'); ?>

            </div>

        </section>

    <?php endwhile; ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
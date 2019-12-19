<?php /* Template Name: Home */ ?>

<?php get_header(); ?>
<div class="main-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <section class="hero">
            
            <span class="rockets-img rockets-img--home"></span>

            <div class="wrapper">
                <?php if (get_field('hero_title')) : ?>
                    <h1 class="heading--primary hero__title"><?php the_field('hero_title'); ?></h1>
                <? endif ?>

                <div class="hero__text">
                        
                    <?php if (get_field('hero_text')) : ?>
                        <?php the_field('hero_text'); ?>
                    <? endif ?>

                    <?php $hero_link = get_field('hero_link'); ?>
                    <?php if (get_field('hero_link')) : ?>
                        <a href="<?php echo $hero_link['url']?>" class="cta-btn hero__btn">
                            <?php echo $hero_link['title']?>
                        </a>
                    <?endif;?>

                </div>
            </div>
        </section>

        <section class="home-about wrapper flex">

            <div class="col-half text-box">

                <?php if (get_field('about_title')) : ?>
                    <h2 class="home-about__title heading--secondary"><?php the_field('about_title'); ?></h2>
                <?php endif; ?>
                
                <div class="home-about__text">

                    <?php if (get_field('about_content')) : ?>
                        <?php the_field('about_content'); ?>
                    <?php endif; ?>

                </div>
                
                <?php $about_link = get_field('about_cta'); ?>
                <a href="<?php echo $about_link['url'] ?>" class="cta-btn home-about__btn">
                    <?php echo $about_link['title'] ?>
                </a>
                
            </div>

            <div class="col-half">

                <?php echo wp_get_attachment_image(
                    get_field('about_image'),
                    'larger_square'
                ); ?>

            </div>

        </section>

        <section class="featured-employee wrapper flex">

            <?php $posts = get_field('featured_employee'); ?>

            <?php if ($posts) : ?>

            <div class="col-half">

                <?php foreach( $posts as $post ) : ?>
                    <? setup_postdata( $post ) ?>

                    <?php the_post_thumbnail('larger_square', array(
                                'class' => 'featured-employee__img'
                            ));?>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>

            </div>
                    
                <div class="col-half flex">
                    
                    <div class="featured-employee__title">
                        
                        <?php $featured_employee_title = get_field('featured_employee_section_title'); ?>
                        <h2 class="featured-employee__heading"><?= $featured_employee_title ?></h2>
                        
                        <?php foreach( $posts as $post ) : ?>

                            <? setup_postdata( $post ) ?>

                            <?php $job_title = get_field('job_title'); ?>

                            <h3 class="featured-employee__name heading--secondary"><?php the_title(); ?></h3>

                    </div>
                    <?php endforeach; ?>
                    

                    <?php wp_reset_postdata(); ?>

                    <div class="featured-employee_text">

                        <?php echo get_field('featured_employee_text'); ?>

                    </div>

                </div>

                <?php endif; ?>

            </section>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
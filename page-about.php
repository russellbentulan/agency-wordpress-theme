<?php /* Template Name: About */ ?>

<?php get_header(); ?>

<div class="main-content">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <span class="rockets-img"></span>
    
        <div class="header-container">


            <h1 class="heading--primary about-page__heading">
                <?php the_title(); ?>
            </h1>

        </div>

        <section class="intro">

            <div class="wrapper flex">
                <div class="col-half">
                    <h2 class="intro__heading"><?= get_field('intro_title'); ?></h2>
                    <?= get_field('intro_text') ?>
                </div>
                <div class="col-half">
                    <?php 
                        $intro_image = get_field('intro_image');
                        echo wp_get_attachment_image( $intro_image['id'], 'larger_square', '', [ 'class' => 'intro__img' ] );
                    ?>
                </div>
            </div>

        </section>

        <section class="mission-statement">
            <div class="wrapper">
                <h2 class="mission-statement__heading"><?= get_field('mission_statement_title'); ?></h2>
                <?= get_field('mission_statement_text') ?>
            </div>
        </section>

        <section class="teams">
            <div class="wrapper">
                <h2 class="teams__heading"><?= get_field('team_members_title') ?></h2>

                <!-- Leadership Team -->
                <?php 
                    // The query
                    $leadership_query = new WP_Query( array(
                        'post_type' => 'team_members',
                        'posts_per_page' => -1,
                        'tax_query' => array( 
                            array  (
                                'taxonomy' => 'team',
                                'field' => 'slug',
                                'terms' => 'leadership'
                            )),
                    ));
                ?>

                <!-- The Loop -->
                <? if ( $leadership_query->have_posts() ) : ?>

                    <div class="team">
                        <h3 class="team__name">Leadership</h3>

                        <?php while( $leadership_query->have_posts() ) : $leadership_query->the_post(); ?>

                            <?php $job_title = get_field('job_title'); ?>
                            
                            <div class="team-member">
                                <a href="<?php the_permalink(); ?>" class="team-member__link">
                                    <?php the_post_thumbnail('square', array(
                                        'class' => 'team-member__thumbnail'
                                    )); ?>
                                    <h4 class="team-member__name"><?php the_title(); ?></h4>
                                </a>
                                <?php if ($job_title) : ?>
                                    <p class="team-member__job-title"><?= $job_title; ?></p>
                                <?php endif; ?>
                            </div>
                    <?php endwhile; ?>
                    <!-- Restore original post data -->
                    <?php wp_reset_postdata(); ?>

                    </div> <!--.team -->

                <?php endif; ?>

                <!-- Development Team -->
                <?php 
                    $development_query = new WP_Query( array(
                        'post-type' => 'team_members',
                        'posts_per_page' => -1,
                        'tax_query' => array(array(
                            'taxonomy' => 'team',
                            'field' => 'slug',
                            'terms' => 'development'
                        ))
                    ));

                    if ($development_query -> have_posts()) : ?>

                        <div class="team">
                            <h3 class="team__name">Development Team</h3>

                            <?php while ( $development_query -> have_posts() ) : $development_query->the_post(); ?>

                                <?php 
                                    $job_title = get_field('job_title');
                                ?>
                                <div class="team-member">
                                    <a href="<?php the_permalink(); ?>" class="team-member__link">
                                        <?php the_post_thumbnail('square', array(
                                            'class' => 'team-member__thumbnail'
                                        )); ?>
                                        <h4 class="team-member__name"><?php the_title(); ?></h4>
                                    </a>
                                    <?php if ($job_title) : ?>
                                        <p class="team-member__job-title"><?= $job_title; ?></p>
                                    <?php endif; ?>
                                </div>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>

                        </div>

                    <?php endif;?>

                <!-- Design Team -->
                <?php 
                    $design_query = new WP_Query( array(
                        'post_type' => 'team_members',
                        'posts_per_page' => -1,
                        'tax_query' => array( array(
                            'taxonomy' => 'team',
                            'field' => 'slug',
                            'terms' => 'design'
                        ))
                    ));
                ?>

                <?php if ( $design_query -> have_posts() ) : ?>
                    
                    <div class="team">
                        <h3 class="team__name">Design Team</h3>

                        <?php while ( $design_query -> have_posts() ) : $design_query -> the_post(); ?>

                                <?php 
                                    $job_title = get_field('job_title');
                                ?>
                                <div class="team-member">
                                    <a href="<?php the_permalink(); ?>" class="team-member__link">
                                        <?php the_post_thumbnail('square', array(
                                            'class' => 'team-member__thumbnail'
                                        )); ?>
                                        <h4 class="team-member__name"><?php the_title(); ?></h4>
                                    </a>
                                    <?php if ($job_title) : ?>
                                        <p class="team-member__job-title"><?= $job_title; ?></p>
                                    <?php endif; ?>
                                </div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>

            </div> <!-- .wrapper -->
        </section> <!-- .teams -->
    <?php endwhile; ?>
    <?php endif; ?>

    <section class="contact-section">
        <div class="wrapper">
            <h2 class="contact-section__heading"><?= get_field('contact_title'); ?></h2>
            <?php $contact_link = get_field('contact_link'); ?>
            <a href="<?= $contact_link['url']; ?>" class="button"><?= $contact_link['title']; ?></a>
        </div>
    </section>
</div>

<?php get_footer(); ?>
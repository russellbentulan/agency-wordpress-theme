<?php get_header(); ?>

<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <div class="main-content">

        <?php 
            $job_title = get_field('job_title');
            $pizza_topping = get_field('favourite_pizza_topping');
            $band = get_field('favourite_band');
            $project = get_field('favourite_project');
            $team = wp_get_post_terms( get_the_ID() , 'team');

            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_url = wp_get_attachment_url( $thumbnail_id );
            $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        ?>

        <?php if ($team) : ?>

            <div class="wrapper">

                <nav aria-label="Breadcrumb" class="breadcrumb">

                    <ol class="breadcrumb__list">
                        <?php foreach( $team as $member ) : ?> 

                            <li class="breadcrumb__item">
                                <?php echo $member->taxonomy;?>
                            </li>

                            <i class="fas fa-chevron-right"></i>

                            <li class="breadcrumb__item">
                                <?php echo $member->name;?>
                            </li>

                            <i class="fas fa-chevron-right"></i>

                            <li class="breadcrumb__item">
                                <?php the_title(); ?>
                            </li>

                        <?php endforeach; ?>
                    </ol>
                </nav> <!-- .breadcrumb -->
            </div>
        <?php endif; ?>

            <article class="team-member">

                <div class="wrapper flex">

                    <div class="member-info">

                        <h1 class="member-info__name heading--primary"><?php the_title(); ?></h1>
                        <h2 class="member-info__job-title"><?php if ($job_title) { echo $job_title; } ?></h2>

                        <?php if ( $pizza_topping || $band || $project ) : ?>

                            <h3 class="member-info__additional">Additional information:</h3>
                            
                            <ul class="member-info__list">
                            
                                <?php if ($pizza_topping) : ?>
                                    <li class="member-info__item">
                                        Favourite Pizza Topping: 
                                        <span class="member-info__text">
                                            <?php echo $pizza_topping; ?>
                                        </span>
                                    </li>
                                <? endif?>
                                
                                
                                <?php if ($band) : ?>
                                    <li class="member-info__item">
                                        Favourite Band: 
                                        <span class="member-info__text">
                                            <?php echo $band; ?>
                                        </span>
                                    </li>
                                <? endif?>       
                                
                                <?php if ($project) : ?>
                                    <li class="member-info__item">
                                        Favourite Project: 
                                        <span class="member-info__text">
                                            <a href="<?php echo $project['url']; ?>" class="member-info__link">
                                                <?php echo $project['title']; ?>
                                            </a>
                                        </span>
                                    </li>
                                <? endif?>

                            </ul>
                                
                        <? endif; ?>
            
                    </div> <!-- .member-info -->
                    
                    <div class="member-info__img-container">
                        <img 
                            src="<? echo $thumbnail_url; ?>" 
                            alt="<?php echo $thumbnail_alt; ?>" 
                            class="member-info__img" >
                    </div>

                </div> <!-- wrapper -->

                <div class="wrapper member-info__content">
                    <?php the_content(); ?>
                </div>

            </article>

                <?php                     
                    $previous_post_id = get_previous_post()->ID;
                    $previous_post_url = get_permalink( $previous_post_id );
                    $previous_post_img = get_the_post_thumbnail( 
                                        $previous_post_id, 
                                        'square', 
                                        [ "class" => "member-selector__img" ]
                                    );
                    $previous_post_name = get_previous_post()->post_title;
                    $previous_post_job_title = get_field( 'job_title', $previous_post_id ); 

                    $next_post_id = get_next_post()->ID;
                    $next_post_url = get_permalink( $next_post_id );
                    $next_post_img = get_the_post_thumbnail( 
                                        $next_post_id, 
                                        'square', 
                                        [ "class" => "member-selector__img" ]
                                    );
                    $next_post_name = get_next_post()->post_title;
                    $next_post_job_title = get_field( 'job_title', $next_post_id ); 
                ?>

                <?php if ( $previous_post_id || $next_post_id ) : ?>

                    <section class="member-selector__container">

                        <div class="wrapper">

                            <?php if ( $previous_post_id ) : ?>
                                <div class="member-selector--previous">

                                    <a href="<?php echo $previous_post_url; ?>" class="member-selector__details">
                                        
                                        <h3 class="member-selector__cta">
                                            <i class="fas fa-chevron-left"></i>
                                            <span class="member-selector__cta-text"> Previous Team Player</span>
                                        </h3>

                                        <p class="member-selector__name"><?php echo $previous_post_name ?></p>

                                        <?php if ( $previous_post_job_title ) : ?>
                                            <p class="member-selector__job-title"><?php echo $previous_post_job_title; ?></p>
                                        <?php endif; ?>
                                    </a>

                                    <div class="member-selector__img-container">
                                        <?php echo $previous_post_img; ?>
                                    </div>
                                </div> <!-- .member-selector--previous -->
                            <?php endif; ?>
                            
                            <?php if ( $next_post_id ) : ?>
                                <div class="member-selector--next">

                                    <div class="member-selector__img-container">
                                        <?php echo $next_post_img; ?>
                                    </div>

                                    <a href="<?php echo $next_post_url; ?>" class="member-selector__details">
                                        <h3 class="member-selector__cta">
                                            <span class="member-selector__cta-text">Next Team Player </span>
                                            <i class="fas fa-chevron-right"></i>
                                        </h3>
                                        <p class="member-selector__name"><?php echo $next_post_name ?></p>

                                        <?php if ( $next_post_job_title ) : ?>
                                            <p class="member-selector__job-title"><?php echo $next_post_job_title; ?></p>
                                        <?php endif; ?>
                                        </a>
                                </div> <!-- .member-selector -->
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endif; ?>


        <?php endwhile; ?>

        <?php endif; ?>

</div> <!-- .main-content -->


<?php get_footer(); ?>
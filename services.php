<?php if ( have_rows('services') ) : ?>

    <ul class="service__container u-relative">

    <?php $post_num = 1; ?>
    <?php while( have_rows('services') ) : the_row(); ?>

        <?php $service_title = get_sub_field('services_title'); ?>

        <li class="service__item">
            <h2 class="service__title service__title--<?php echo $post_num; ?> <?php
                if ( $post_num == 1 ) {
                    echo "service__title--selected";
                }
            ?>">
                <?php echo $service_title ?>
                <span class="icon chevron-down"></span>
            </h2>

            <div class="service__description service__description--<?php echo $post_num; ?>">

                <?php the_sub_field('services_description'); ?>

            </div>
        </li>
        <?php $post_num++; ?>
    <? endwhile; ?>
    </ul>
<? endif; ?>
<?php // If there are no posts to display, such as an empty archive page ?>

<?php if ( ! have_posts() ) : ?>

	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<section class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</section><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>

<?php // if there are posts, Start the Loop. ?>

<?php if ( have_posts() ) : the_post(); ?>

	<div class="flex space-between blog-entries">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php $post_excerpt = get_the_excerpt(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry'); ?>>

					<?php the_post_thumbnail('full'); ?>	

					<div class="blog-entry__text">

						<h2 class="blog-entry__title ">
							<a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
								<?php the_title(); ?>
							</a>
						</h2>

						<h3 class="blog-entry-date">
							<?php the_author(); ?> - <?= get_the_date('m/d/Y'); ?>
						</h3>

						<div class="blog-entry-excerpt">
							<?php the_excerpt(); ?>
						</div><!-- .entry-excerpt -->

					</div>

				</article><!-- #post-## -->

		<?php endwhile; // End the loop. Whew. ?>
	<?php endif; ?>
</div>


<?php
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type' => 'list'
	) );
?>
<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<div class="row">
						<header class="entry-header col-12 offset-md-4 col-md-8">

							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

						</header><!-- .entry-header -->

						

						<div class="entry-content col-12 offset-md-4 col-md-5">

							<?php the_content(); ?>

							<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
								'after'  => '</div>',
							) );
							?>



						</div><!-- .entry-content -->

						<?php if( get_the_post_thumbnail( $post->ID ) ) : ?>
							<footer class="entry-footer col-12 offset-md-4 col-md-8">
							<?php echo get_the_post_thumbnail( $post->ID ); ?>
							</footer>
						<?php endif; ?>
</div><!-- .row end -->

</article>
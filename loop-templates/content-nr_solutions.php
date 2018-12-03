<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>"

	<?php
		$a_fields = get_fields();

		foreach ($a_fields as $key => $val) {
			echo "data-" . $key . "='[";

			$outputfields = "";

			foreach ($val as $attr => $value) {
				$output = '"' . $value . '", ';
				$outputfields = $outputfields . $output; // add this set of values to the var
			}

			// remove the comma after last element and echo
			echo substr($outputfields, 0, -2);
			echo "]' ";
		}

		unset($a_fields);
	?>

>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>

		<?php //development
		the_field('context'); ?>

		<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php
		the_excerpt();
		?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</div><!-- #post-## -->

<?php
/**
 * The home template.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper container" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<div class="main-select-form">
					V/Na
					<select id="context" autofocus>
						<option value="" selected="selected">Izberite kontekst</option>
					</select>
					sem bil_a žrtev/očividka_ec
					<select id="method">
						<option value="" selected="selected">Izberite metodo</option>
					</select>
					zaradi
					<select id="bias">
						<option value="" selected="selected">Izberite bias</option>
					</select>
					. Na koga se lahko obrnem?
				</div>

				<div class="reporting-module row">
					<div class="col-12 col-md-6">
					<h2>Report</h2>
					<p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>
					<p>
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<div class="col-12 col-md-6">
			<?php

			echo do_shortcode( '[contact-form-7 id="5" title="Report-Step-1"]' );

			echo "<script>
						document.addEventListener( 'wpcf7mailsent', function( event ) {
						    location = '" . get_site_url() . "/report-step-2';
						}, false );
					</script>";
			?>
						<div class="privacy-notice">
							<p>Poslali boste anonimne informacije o dogodku. Zabeležili bomo tudi vašo izbiro v zgornjem obrazcu (prostor, metoda, bias).</p>
						</div>
					</div>
				</div>


			<?php
			$args = array('post_type' => 'nr_solutions');
			$loop = new WP_Query($args);

			/* start the loop */
			if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
			?>

						<?php
						/* call the template for this post type */
						get_template_part( 'loop-templates/content', 'nr_solutions' );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

				<?php wp_reset_postdata(); ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>
		

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php echo "<script type='text/javascript' src='";
	echo get_stylesheet_directory_uri();
	echo "/js/main-select-form.js'></script>";
?>

<?php get_footer(); ?>

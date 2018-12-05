<?php
/**
 * Template Name: Front Page
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

<div class="wrapper" id="index-wrapper">

	<div class="" id="content" tabindex="-1">

			<main class="site-main" id="main">

<div class="bg-primary main-select-form-container">
<div class="container">
<div class="row">
				<div class="main-select-form col-12">
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
</div>
</div>
</div>

<div class="container">
		<div class="reporting-module-container">
				<div class="reporting-module row justify-content-center">
					<div class="col-10 col-md-5">
					<h2>Report</h2>
					<p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>
					<p>
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<div class="col-10 col-md-4 offset-md-1">
			<?php

			echo do_shortcode( '[contact-form-7 id="5" title="Report-Step-1"]' );

			echo "<script>
						document.addEventListener( 'wpcf7mailsent', function( event ) {
						    location = '" . get_site_url() . "/report-step-2';
						}, false );
					</script>";
			?>
						<div class="privacy-notice smol">
							<p>Poslali boste anonimne informacije o dogodku. Zabeležili bomo tudi vašo izbiro v zgornjem obrazcu (prostor, metoda, bias).</p>
						</div>
					</div>
				</div>
</div>

<div class="container solutions-container">
<div class="row justify-content-between">

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

			

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>
</div>


<div class="row">

			<div class="col-12 col-sm-6 offset-sm-6">
					<?php while ( have_posts() ) : the_post(); ?>

	<header class="homepage-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="homepage-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

					<?php endwhile; // end of the loop. ?>
			
			</div><!-- #primary -->

		</div><!-- .row -->
</div>

</main><!-- #main -->
	</div><!-- Container end -->

	

</div>

</div><!-- Wrapper end -->

<?php echo "<script type='text/javascript' src='";
	echo get_stylesheet_directory_uri();
	echo "/js/main-select-form.js'></script>";
?>

<?php get_footer(); ?>

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
					sem bil_a <a class="relationship selected" id="victim" href="javascript:;">žrtev</a>/<a class="relationship" id="eyewitness" href="javascript:;">očividka_ec</a>
					<select id="method">
						<option value="" selected="selected">Izberite metodo</option>
					</select>
					zaradi
					<select id="bias">
						<option value="" selected="selected">Izberite bias</option>
					</select>. Na koga se lahko obrnem?
				</div>
</div>
</div>
</div>

<div class="container">
		<div class="reporting-module-container">
			<a class="open-more" href="javascript:;">Prikaži obrazec za prijavo</a>
			<div class="reporting-module-gradient">
			</div>
				<div class="reporting-module row justify-content-center">
					<div class="col-10 col-md-5">
					<h2>Javite na Legebitro</h2>
					<p>Vaša prijava zločina iz sovraštva in diskriminacije omogoča zbiranje podatkov, s katerimi lahko dosežemo spremembe v zakonodaji in pravilnikih.</p>
					<p>Vaša prijava je lahko povsem anonimna, lahko pa vam ponudimo podporo v nadaljnjem prijavnem procesu.</p>
					<p>Prijava na Legebitro ne pomeni avtomatične prijave na policijo.
					</p>
					</div>
					<div class="col-10 col-md-4 offset-md-1">
			<?php

			echo do_shortcode( '[contact-form-7 id="5" title="Report-Step-1"]' );

			echo "<script>
						document.addEventListener( 'wpcf7mailsent', function( event ) {
						    location = '" . get_site_url() . "/dopolnitev-prijave';
						}, false );
					</script>";
			?>
						<div class="privacy-notice smol">
							<div class="anon">
							<?php echo "<img src='";
									echo get_stylesheet_directory_uri();
									echo "/img/ico-anon_b.svg' class='' title='ikona za nivo zasebnosti: anonimno' />";
									?>
							<p>Poslali boste anonimne informacije o dogodku. Zabeležili bomo tudi vašo izbiro v zgornjem obrazcu (prostor, metoda, bias).</p>
							</div>
							<div class="zaupno">
							<?php echo "<img src='";
									echo get_stylesheet_directory_uri();
									echo "/img/ico-zaupno_b.svg' class='' title='ikona za nivo zasebnosti: zaupno' />";
									?>
							<p>Poslali boste informacije o dogodku in svoje kontaktne informacije. Zabeležili bomo tudi vašo izbiro v zgornjem obrazcu (prostor, metoda, bias).</p>
							</div>
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


<div class="row home-content">

	<?php echo "<img src='";
	echo get_stylesheet_directory_uri();
	echo "/img/illustration-front-page-02.svg' class='d-none col-sm-4 d-lg-block front-ilustration-01' title='ilustracija osebe, ki govori' />";
	?>

					<?php while ( have_posts() ) : the_post(); ?>

	<header class="homepage-header col-12 col-lg-8">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->
</div>

<div class="row home-content">
<?php echo "<div class='entry-footer front-ilustration-02 d-none col-md-8 d-md-block'><img src='";
	echo get_stylesheet_directory_uri();
	echo "/img/illustration-front-page-01.svg' title='ilustracija osebe, ki gleda' /></div>";
	?>

	<div class="homepage-content col-12 col-md-4">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

					<?php endwhile; // end of the loop. ?>
			
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

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

<div class="col-12 col-md-6 solution">
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

	<header class="entry-header bg-primary">
<div class="row">
		<div class="nr_name col-8">
			<?php the_title( '<h2>', '</h2>' ); ?>
			<span><?php the_field('kontakt'); ?></span>
		</div>

		<div class="privacy-level col-4">
			<?php
			if (get_field('nivo_zasebnosti')){
				$a;
				$b;

				if (get_field('nivo_zasebnosti')=='javno') {
					$a = "javno";
					$b = "javna obravnava";
				} elseif (get_field('nivo_zasebnosti')=='anonimno') {
					$a = "anon";
					$b = "možnost anonimne prijave";
				} elseif (get_field('nivo_zasebnosti')=='zaupno') {
					$a = "zaupno";
					$b = "zaupna obravnava";
				};

				echo "<img src='" . get_stylesheet_directory_uri() . "/img/ico-" . $a . ".svg' />";
				echo "<div>". $b ."</div>";
			}	
			?>
		</div>
</div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();
		?>

		<?php
		if (get_field("mozen_rezultat")){
			echo "<h5>Možen rezultat:</h5><p>";
			the_field('mozen_rezultat');
			echo "</p>";
		}

		if (get_field("naslednji_korak")){
			echo "<h5>Naslednji korak:</h5><p>";
			the_field('naslednji_korak');
			echo "</p>";
		}
		?>

	</div><!-- .entry-content -->


</div><!-- #post-## -->
</div>

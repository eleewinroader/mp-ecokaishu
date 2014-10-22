<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 1.3
* @since MP-Ecokaishu 0.0
*/
get_header( ); ?>

	<div class="container">
	<div class="twelvecol col last">

	<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<h2><?php the_title(); ?></h2>

		<div class="contents">
			<?php the_content(); ?>
		</div>

		<?php
		global $wpdb;
		$query = "
			SELECT meta_id,post_id,meta_key,meta_value
			FROM $wpdb->postmeta
			WHERE post_id = $post->ID
			ORDER BY meta_id ASC"
		;
		$cf = $wpdb->get_results($query, ARRAY_A); 
		
		$contentsInfo01 = array();
		$contentsInfo02 = array();

		foreach($cf as $row){

			if($row["meta_key"] == "contentsInfo01"){
				array_push($contentsInfo01, $row["meta_value"]);
			}
			if($row["meta_key"] == "contentsInfo02"){
				array_push($contentsInfo02, $row["meta_value"]);
			}

		}

		$contentsInfo01 = array_filter($contentsInfo01, "strlen");
		$contentsInfo01 = array_values($contentsInfo01);
		$contentsInfo02 = array_filter($contentsInfo02, "strlen");
		$contentsInfo02 = array_values($contentsInfo02);

		$length = count($contentsInfo01);

		if($length){

			for($i=0; $i<$length; $i++){
				echo '
				<div class="contents">
					<section>
						<h3>'.$contentsInfo01[$i].'</h3>'.
						$contentsInfo02[$i].
					'</section>
				</div>';
			}

		}?>

	<?php endwhile; endif; ?>

	</div>
	</div>	

<?php get_footer(); ?>
<?php
/**
 * Template part for Portfolios in Grid format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elakisto
 */

?>

<?php
	$id = get_the_id();
	$attachment_ids = get_post_meta( $id, 'hppport_gallery_id', true );
	$title = get_the_title( $id );
	$post_permalink = get_permalink( $id );
	$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'thumbnail' );
	?>
	<div id="portfolio-gallery-<?php echo esc_attr( $id ) ?>" class="porffolio-gallery big-post">
		<a id="thumb-<?php echo esc_attr( $id ) ?>" data-id="<?php echo esc_attr( $id ) ?>" class="thumb big-thumb img-holder" href="<?php echo esc_attr( $post_permalink ) ?>" data-title="<?php echo esc_attr( $title ) ?>" aria-label="<?php echo esc_attr( $title ) ?>">
				<img alt="<?php echo esc_attr( $title ) ?>" src="<?php echo $featured_img[0] ?>" />
				<canvas width="<?php echo esc_attr( $featured_img[1] ) ?>" height="<?php echo esc_attr( $featured_img[2] ) ?>"></canvas>
		</a>
		<div class="header"><h2><a href="<?php echo esc_attr( $post_permalink ) ?>" data-title="<?php echo esc_attr( $title ) ?>"><span><?php echo esc_attr( $title ) ?></span></a></h2></div>
		<?php
		$index = 0;
		if ( $attachment_ids ) {
			$json = "["; //Create variable with prepended bracket ready to append to.
            foreach ( $attachment_ids as $attachment_id ) {
            	$thumb = wp_get_attachment_image_src( $attachment_id, 'elakisto-single-post' );
				$video_url = get_post_meta( $attachment_id, 'video_url', true );
                if ($video_url) {
                    $json .= '{"src" : "' . esc_attr( $video_url ) . '", ';
                } else {
                	$json .= '{"src" : "' . esc_attr( $thumb[0] ) . '", ';
                }
                $json .= '"thumb" : "' . esc_attr( $thumb[0] ) . '" },';
            }
            $json .= "]"; // Finally, close the json with the last square bracket.
			
		//echo $json;
		?>
		<script type="text/javascript">
			jQuery('#portfolio-gallery-<?php echo esc_attr( $id ) ?>').on('click', function(e) {
				e.preventDefault();
				jQuery(this).lightGallery({
					dynamic: true,
					showThumbByDefault: false,
					download: false,
					autoplayFirstVideo: true,
					dynamicEl: <?php echo $json; ?>
				});
			});

		</script>
	<?php } ?>
	</div>
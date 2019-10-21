<?php
/**
 * Template part for Portfolios in Thumb format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elakisto
 */

?>

<?php
	$id = get_the_id();
	$attachment_ids = get_post_meta( $id, 'hppport_gallery_id', true );
	$container_class = apply_filters( 'portfolio_grid_item_container_class', 'small-thumbs' );
	$title = get_the_title( $id );
	$post_permalink = get_permalink( $id );
	?>
	<div id="portfolio-gallery-<?php echo esc_attr( $id ) ?>" class="porffolio-gallery">
		<div class="header"><h2><a href="<?php echo esc_attr( $post_permalink ) ?>" data-title="<?php echo esc_attr( $title ) ?>"><span><?php echo esc_attr( $title ) ?></span></a></h2></div>
		<?php if ( is_single() ) { ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		<?php } ?>
		<div class="<?php echo esc_attr( $container_class ) ?>">

		<?php 
		$index = 0;
		if ( $attachment_ids ) {
			foreach ( $attachment_ids as $attachment_id ) {
			$thumb = wp_get_attachment_image_src( $attachment_id, 'elakisto-single-post' );
			$image = wp_get_attachment_image_src( $attachment_id, 'large' );
			$image_caption = wp_get_attachment_caption( $attachment_id );
			$video_url = get_post_meta( $attachment_id, 'video_url', true );
			$thumb_class = empty($video_url) ? 'small-thumb' : 'small-thumb video-thumb';
			?>
			<div id="thumb-<?php echo esc_attr( $id ) ?>-<?php echo esc_attr( $attachment_id ) ?>" data-id="<?php echo esc_attr( $id ) ?>-<?php echo esc_attr( $attachment_id ) ?>" data-index="<?php echo esc_attr( $index ) ?>" class="thumb <?php echo esc_attr( $thumb_class ) ?>"
			<?php if ($video_url) { ?>
				data-src="<?php echo esc_attr( $video_url ) ?>" data-poster="<?php echo esc_attr( $image[0] ) ?>"
			<?php } else { ?>
				data-src="<?php echo esc_attr( $image[0] ) ?>"
			<?php } ?>
				data-title="<?php echo esc_attr( $title ) ?>" aria-label="<?php echo esc_attr( $title ) ?>">
				<div class="img-holder no-bg">
					<img alt="<?php echo esc_attr( $image_caption) ?>" src="<?php echo esc_attr( $thumb[0] ) ?>" />
					<canvas width="<?php echo esc_attr( $thumb[1] ) ?>" height="<?php echo esc_attr( $thumb[2] ) ?>"></canvas>
				</div>
			</div>
			<?php
			$index++;	
		}
	}
?>
		</div>
	</div>
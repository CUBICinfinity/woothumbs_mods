<?php
/**
 * Loop thumbnail slider images
 *
 * 
 * Modified by cubicinfinity
 * 
 * This file replaces `iconic-woothumbs/templates/loop-thumbnails.php`
 * 
 * The purpose of this and the `loop-images.php` mod is to allow the shop image to be unique from the product page images.
 * 
 * The featured product image will only appear in the woocommerce loop elements (shop pages, related products, etc.).
 * Only gallery images will be used on the product page. (The featured image is skipped.)
 * 
 * This change is not compatible with Woothumbs versions 4.11 and later because they deduplicate product images.
 * However, after my complaints, Iconic to added a hook, `'iconic_woothumbs_dedupe_gallery_images'`, 
 * which will be of use getting this working in future versions of woothumbs.
 * Consider `add_filter( 'iconic_woothumbs_dedupe_gallery_images', '__return_false' );`
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$mode = ( $this->settings['navigation_thumbnails_position'] == "above" || $this->settings['navigation_thumbnails_position'] == "below" ) ? "horizontal" : "vertical";

?>

<?php if ( ! empty( $images ) ) { ?>

	<?php do_action( 'iconic_woothumbs_before_thumbnails_wrap' ); ?>

	<div class="iconic-woothumbs-thumbnails-wrap iconic-woothumbs-thumbnails-wrap--<?php echo $this->settings['navigation_thumbnails_type']; ?> iconic-woothumbs-thumbnails-wrap--<?php echo $mode; ?> iconic-woothumbs-thumbnails-wrap--hidden" style="height: 0;">

		<?php do_action( 'iconic_woothumbs_before_thumbnails' ); ?>

		<div class="iconic-woothumbs-thumbnails">

			<?php $image_count = count( $images ); // BEGIN CHANGES HERE ?>

			<?php if ( $image_count > 2 ) { ?> 
				
				<?php $i = 0;
				foreach ( $images as $image ): ?>
			        <?php if ($i == 0) { $i ++; continue; } ?>
					<div class="iconic-woothumbs-thumbnails__slide <?php if ( $i == 1 ) { ?>iconic-woothumbs-thumbnails__slide--active<?php } ?>" data-index="<?php echo $i - 1; ?>">

						<div class="iconic-woothumbs-thumbnails__image-wrapper">

							<?php do_action( 'iconic_woothumbs_before_thumbnail', $image, $i - 1 ); ?>

							<img class="iconic-woothumbs-thumbnails__image no-lazyload skip-lazy" src="<?php echo $image['gallery_thumbnail_src']; ?>" srcset="<?php echo $image['gallery_thumbnail_srcset']; ?>" sizes="<?php echo $image['gallery_thumbnail_sizes']; ?>" title="<?php echo esc_attr( $image['title'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" width="<?php echo $image['gallery_thumbnail_src_w']; ?>" height="<?php echo $image['gallery_thumbnail_src_h']; ?>" nopin="nopin">

							<?php do_action( 'iconic_woothumbs_after_thumbnail', $image, $i - 1 ); ?>

						</div>

					</div>

					<?php $i ++; endforeach; ?>

				<?php

				// pad out thumbnails if there are less than the number
				// which are meant to be shown.

				if ( $image_count - 1 < $this->settings['navigation_thumbnails_count'] ) {
					$empty_count = $this->settings['navigation_thumbnails_count'] - ($image_count - 1);
					$i           = 0;

					while ( $i < $empty_count - 1 ) { // END CHANGES HERE
						echo "<div></div>";
						$i ++;
					}
				}

				?>

			<?php } ?>

		</div>

		<?php if ( $this->settings['navigation_thumbnails_type'] == "sliding" && $this->settings['navigation_general_controls'] ) { ?>

			<a href="javascript: void(0);" class="iconic-woothumbs-thumbnails__control iconic-woothumbs-thumbnails__control--<?php echo ( $mode == "horizontal" ) ? "left" : "up"; ?>" data-direction="<?php echo ( is_rtl() && $mode == "horizontal" ) ? "next" : "prev"; ?>"><i class="iconic-woothumbs-icon iconic-woothumbs-icon-<?php echo ( $mode == "horizontal" ) ? "left" : "up"; ?>-open-mini"></i></a>
			<a href="javascript: void(0);" class="iconic-woothumbs-thumbnails__control iconic-woothumbs-thumbnails__control--<?php echo ( $mode == "horizontal" ) ? "right" : "down"; ?>" data-direction="<?php echo ( is_rtl() && $mode == "horizontal" ) ? "prev" : "next"; ?>"><i class="iconic-woothumbs-icon iconic-woothumbs-icon-<?php echo ( $mode == "horizontal" ) ? "right" : "down"; ?>-open-mini"></i></a>

		<?php } ?>

		<?php do_action( 'iconic_woothumbs_after_thumbnails' ); ?>

	</div>

	<?php do_action( 'iconic_woothumbs_after_thumbnails_wrap' ); ?>

<?php } ?>

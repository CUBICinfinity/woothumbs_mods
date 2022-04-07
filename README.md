# woothumbs_mods
Modified files for the Woothumbs plugin for WooCommerce


## loop-images.php and loop-thumbnails.php
These files replace the ones in `iconic-woothumbs/templates/`.  
Their purpose is to allow the shop image to be unique from the product page images.

The featured product image will only appear in the woocommerce loop elements (shop pages, related products, etc.).  
Only gallery images will be used on the product page. (The featured image is skipped.)

This change is not compatible with Woothumbs versions 2.11 and later because they deduplicate product images.  
However, after my complaints, Iconic to added a hook, `'iconic_woothumbs_dedupe_gallery_images'`,  
which will be of use getting this working in future versions of woothumbs.  
Consider `add_filter( 'iconic_woothumbs_dedupe_gallery_images', '__return_false' );`

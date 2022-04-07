# woothumbs_mods
Modified files for the Woothumbs plugin for WooCommerce


## loop-images.php and loop-thumbnails.php
These files replace the ones in `iconic-woothumbs/templates/`.  
Their purpose is to allow the shop image to be unique from the product page images.

The featured product image will only appear in the woocommerce loop elements (shop pages, related products, etc.).  
Only gallery images will be used on the product page. (The featured image is skipped.)

This change is not compatible with Woothumbs versions 4.11 and later because they deduplicate product images.  
However, after my complaints, Iconic to added a hook, `'iconic_woothumbs_dedupe_gallery_images'`,  
which will be of use getting this working in future versions of woothumbs.  
Consider `add_filter( 'iconic_woothumbs_dedupe_gallery_images', '__return_false' );`

Related: [My feature request](https://iconicwp.com/feature-requests/allow-separation-of-single-product-page-gallery-and-shop-category-related-wc-product-loop-images/)


## woothumbs-premium.4.10.0.zip 
This is a copy of the compatible Woothumbs version 4.10.0 to be uploaded to WordPress in the usual way.  
It is completely legal to use as this is under GPL v3.

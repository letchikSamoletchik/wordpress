<?php
/**
 * Title: Theme Button
 * Slug: vw-bakery-blocks/theme-button
 * Categories: template
 */
?>
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"white","style":{"color":{"background":"var(--wp--preset--color--primary)"},"typography":{"fontSize":"14px"},"border":{"radius":"0px"}}} -->
<div class="wp-block-button has-custom-font-size" style="font-size:14px"><a class="wp-block-button__link has-white-color has-text-color has-background" style="border-radius:0px;background-color:var(--wp--preset--color--primary)"><?php echo esc_html__('GET STARTED', 'vw-bakery-blocks'); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"white","style":{"color":{"text":"var(--wp--preset--color--primary)"},"typography":{"fontSize":"14px"},"border":{"radius":"0px"}},"className":"banner-btn2"} -->
<div class="wp-block-button has-custom-font-size banner-btn2" style="font-size:14px"><a class="wp-block-button__link has-white-background-color has-text-color has-background" style="border-radius:0px;color:var(--wp--preset--color--primary)"><?php echo esc_html__('CONTACT US', 'vw-bakery-blocks'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
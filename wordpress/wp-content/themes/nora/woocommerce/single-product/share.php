<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="styled-share">
	<div class="styled_facebook_share styled-social-share">
		<span class='st_facebook_hcount' displayText='Facebook'></span>
	</div>

	<div class="styled_twitter_share styled-social-share">
		<span class='st_twitter_hcount' displayText='Tweet'></span>
	</div>

	<div class="styled_linkedin_share styled-social-share">
		<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
	</div>

	<div class="styled_email_share styled-social-share">
		<span class='st_email_hcount' displayText='Email'></span>
	</div>
</div>
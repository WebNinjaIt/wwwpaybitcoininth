<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Homeo
 * @since Homeo 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link rel="profile" href="//gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<script src="https://kit.fontawesome.com/f6c532a9aa.js" crossorigin="anonymous"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-448YSJDN22"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-448YSJDN22');
</script>
</head>
<body <?php body_class(); ?>>
<?php if ( homeo_get_config('preload', true) ) {
	$preload_icon = homeo_get_config('media-preload-icon');
	$styles = array();
	if ( !empty($preload_icon['id']) ) {
		$img = wp_get_attachment_image_src($preload_icon['id'], 'full');
		if ( !empty($img[0]) ) {
			$styles[] = 'background-image: url(\''.$img[0].'\');';
		}
		if ( !empty($img[1]) ) {
			$styles[] = 'width: '.$img[1].'px;';
		}
		if ( !empty($img[1]) ) {
			$styles[] = 'height: '.$img[2].'px;';
		}
    }
    $style_attr = '';
    if ( !empty($styles) ) {
    	$style_attr = 'style="'.implode(' ', $styles).'"';
    }
?>
	<div class="apus-page-loading">
        <div class="apus-loader-inner" <?php echo trim($style_attr); ?>></div>
    </div>
<?php } ?>

<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>
<div id="wrapper-container" class="wrapper-container">
    
	<?php get_template_part( 'headers/mobile/offcanvas-menu' ); ?>
	<?php get_template_part( 'headers/mobile/header-mobile' ); ?>

	<?php
		$header = apply_filters( 'homeo_get_header_layout', homeo_get_config('header_type') );
		if ( !empty($header) ) {
			homeo_display_header_builder($header);
		} else {
			get_template_part( 'headers/default' );
		}
	?>
	<div id="apus-main-content">
		<script>
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn.bitrix24.com/b17300645/crm/site_button/loader_4_bwcyr9.js');
</script>
		
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="theme-color" content="#230F47">

<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/pcl_logo.png">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/pcl_logo.png">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="nav-mount">
<?php echo phildor_get_nav_html(); ?>
</div>
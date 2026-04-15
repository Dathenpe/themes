<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Phildor Consulting Limited - Elite Oil, Gas and Infrastructure Engineering Consultancy. 30+ years of industry leadership delivering world-class technical solutions across Africa.">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/pcl_logo.png">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="nav-mount">
<?php echo phildor_get_nav_html(); ?>
</div>
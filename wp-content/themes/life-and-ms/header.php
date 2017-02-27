<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Life_And_MS
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/inc/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/inc/css/font-awesome.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="row-fluid wow fadeIn animated super-head" data-wow-delay="0.3s" data-wow-duration="0.3s">
		<div id="page" class="site">
			<header id="masthead" class="site-header" role="banner">
				<div class="top-header">
					<div class="container">
						<div class="col-sm-4 redes no-padding-left">
							<?php the_field ('redes_sociales_&_contacto','options'); ?>
						</div>
						<div class="col-sm-4 site-branding">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php the_field ('logo','options'); ?>"></a>
						</div><!-- .site-branding -->
						<div class="col-sm4 idiomas no-padding-right">
							<div class="dropdown">
							  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    English
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							    <li><a href="#">Español</a></li>
							  </ul>
							</div>
						</div>
					</div>
				</div>
				<nav id="site-navigation" role="navigation">
					<div class="container  main-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'container_class' => 'main-navigation' ) ); ?>
						<ul class="nav pull-right navbar-nav">
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search <i class="fa fa-search" aria-hidden="true"></i></a>
					            <ul class="dropdown-menu col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-3 col-md-offset-0">
					              <div class="form-inline">
					              	<?php get_search_form(); ?>
					              </div>
					            </ul>
					        </li>
					     </ul>
					</div>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
		</div>
	</div>
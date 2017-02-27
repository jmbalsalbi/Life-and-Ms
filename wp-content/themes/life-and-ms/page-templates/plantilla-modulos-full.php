<?php
/**
 * Template Name: Full Width Módulos
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lifeandms
 */

get_header(); ?>

	<div class="full-width the-header cabecera-page wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" style="background: url( <?php the_post_thumbnail_url( $size ); ?> )">
		<div class="container">
			
			<div class="title col-md-8 col-md-offset-4">
				<h1><?php the_title (); ?></h1>
				<?php 
				 
				/*
				*  Loop through a Flexible Content field and display it's content with different views for different layouts
				*/
				 
				while(has_sub_field("contenido_flexible")): ?>

					<?php if(get_row_layout() == "frase_de_cabecera"): // layout: Texto destacado Futura 30px ?>		
					
						<span class="frase"><?php the_sub_field('texto');?></span>

					<?php endif; ?>
				 
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<div class="row-fluid breadcrumbs wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
		<div class="container">
			<div typeof="BreadcrumbList" vocab="http://schema.org/">
			    <?php if(function_exists('bcn_display'))
			    {
			        bcn_display();
			    }?>
			</div>
		</div>
	</div>

	<div id="primary" class="wrapper">
		
		<div id="content">
		
			<main id="main" class="site-main" role="main">
				<?php get_template_part('modulos') ?>
			</main><!-- #main -->
			
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
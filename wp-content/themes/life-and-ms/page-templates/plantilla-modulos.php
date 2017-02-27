<?php
/**
 * Template Name: Módulos + Sidebar
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
	<div class="row-fluid breadcrumbs wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s">
		<div class="container">
			<div typeof="BreadcrumbList" vocab="http://schema.org/">
			    <?php if(function_exists('bcn_display'))
			    {
			        bcn_display();
			    }?>
			</div>
		</div>
	</div>

	<div class="row-fluid">
		<div class="container modulos-pagina">
			<div class="col-md-4 no-padding-left wow fadeIn animated" data-wow-delay="0.5s" data-wow-duration="0.5s" >
				<?php 

					/*
					*  Loop through a Flexible Content field and display it's content with different views for different layouts
					*/
					 
					while(has_sub_field("contenido_flexible")): ?>
						<?php if(get_row_layout() == "menu"): // layout: Texto destacado Futura 30px ?>
							<div class="menu-sidebar"><?php the_sub_field ('selecciona_menu');?></div>
						
						<?php elseif(get_row_layout() == "banner_sidebar"): // layout: Título Sección ?>
							<img class="banner-sidebar" src="<?php the_sub_field ('banner');?>">
						<?php endif; ?>
					<?php endwhile; ?>

			</div>
			<div class="col-md-8">
				<?php get_template_part('modulos-pagina-sidebar') ?>
			</div>
		</div>
	</div>	
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
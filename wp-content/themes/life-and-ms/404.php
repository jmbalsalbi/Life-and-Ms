<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Life_And_MS
 */

get_header(); ?>

	<div class="full-width the-header cabecera-page wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" style="background: url( <?php echo get_stylesheet_directory_uri();?>/inc/img/cabecera.jpeg )">
		<div class="container">
			
			<div class="title col-md-8 col-md-offset-4">
				<h1><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'life-and-ms' ); ?></h1>
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
				<div class="menu-sidebar"><?php dynamic_sidebar ('search'); ?></div>

			</div>
			<div class="col-md-8">
				<?php
					if ( have_posts() ) : ?>

			<ul>
				<?php
					
					/* Start the Loop */
					while ( have_posts() ) : the_post();
		
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );
		
					endwhile;
		
					the_posts_navigation();
		
					else :
		
					get_template_part( 'template-parts/content', 'none' );
		
				endif; ?>
			</ul>
			</div>
		</div>
	</div>	
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
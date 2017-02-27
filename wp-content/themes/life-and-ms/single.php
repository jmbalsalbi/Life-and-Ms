<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Life_And_MS
 */

get_header(); ?>

	<div class="full-width the-header cabecera-page wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" style="background: url( <?php echo get_stylesheet_directory_uri();?>/inc/img/head-exercises.jpeg ); padding-bottom: 5em;">
		<div class="container">
			
			<div class="title">
				<center>
				<h1><?php the_title (); ?></h1>
				</center>
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
			<div class="hidden-xs col-sm-4 no-padding-left wow fadeIn animated" data-wow-delay="0.5s" data-wow-duration="0.5s" >
				<div class="menu-sidebar"><?php dynamic_sidebar( 'exercises' ); ?></div>
			</div>
			<div class="col-sm-8">
				<?php
					while ( have_posts() ) : the_post(); ?>
						<?php if ( has_post_thumbnail() ) : ?>
					        <span class="thumbnail-single"><?php the_post_thumbnail( 'single' ); ?></span>
					<?php endif; ?>
					<?php
						get_template_part( 'template-parts/content', get_post_format() );
			
						//the_post_navigation();
			
						// If comments are open or we have at least one comment, load up the comment template.
						//if ( comments_open() || get_comments_number() ) :
						//	comments_template();
						//endif;

					endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>	
		</div>
	</div><!-- #primary -->
<?php
get_footer();

<?php 
 
/*
*  Loop through a Flexible Content field and display it's content with different views for different layouts
*/
 
while(has_sub_field("contenido_flexible")): ?>

	<?php if(get_row_layout() == "texto_color"): // layout: Texto destacado Futura 30px ?>
	
			<div  class="full-width texto-color wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main" style="background-color: <?php the_sub_field ('color_de_fondo') ?>; padding-top: <?php the_sub_field ('margen_hacia_arriba') ?>;">
			
			<div class="row-fluid">	
				<?php the_sub_field('texto');?>
			</div>
		 
		</div>		

	<?php elseif(get_row_layout() == "modulo_noticias"): // layout: Camps +  Listado ?>

		<div class="seccion noticias full-width wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
			<div class="row-fluid">	
				<?php the_sub_field('texto_titulo');?>
				<?php 
				    query_posts(array( 
				        'post_type' => 'post',
				        'showposts' => 1 
				    ) );  
				?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="col-sm-10 latest-news">
						<div class="noticia-home">
							<div class="content col-md-5 no-padding-left">
								<span class="date">
									<div class="col-xs-6">
										<?php the_date('j'); ?>
									</div>
									<div class="col-xs-6">
										<?php echo get_the_date(M); ?><br><?php echo get_the_date(Y); ?>
									</div>
								</span>
							
					        <a class="titulo-noticia" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					        <p class="excerpt"><?php echo excerpt(15) ?></p>
							<span class="boton-gris"><a class="read-more" href="<?php the_permalink() ?>">Leer Más</a></span>
							</div>
							<a href="<?php the_permalink() ?>"><div class="imagen-noticia col-md-7 no-padding" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
								<br>					
							</div></a>
						</div>
				    </div>

				<?php endwhile;?>
				<?php wp_reset_query(); ?>
			</div>
		</div>	
	

	<?php elseif(get_row_layout() == "imagen_full_width"): // layout: Título Sección ?>

		<div class="wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
			<div class="row-fluid imagen-full">
				<img src="<?php the_sub_field ('imagen');?>">
			</div>
		</div>
	<?php elseif(get_row_layout() == "modulo_img_+_boxes_home"): // layout: Título Sección ?>

		<div class="wow fadeIn cover animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main" style="background: url( <?php the_sub_field ('imagen');?> )">
			<div class="row-fluid imagen-full-home">
				<div class="frase-destacada">
					<?php the_sub_field ('texto_destacado');?>
				</div>
				<div class="container boxes">
					<div class="col-sm-4">
						<div class="contenido" style="background: #68b9d5;">
							<?php the_sub_field ('svg_1');?>
							<?php the_sub_field ('box_1');?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="contenido" style="background: #5ac4d2;">
							<?php the_sub_field ('svg_2');?>
							<?php the_sub_field ('box_2');?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="contenido" style="background: #6ec7c6;">
							<?php the_sub_field ('svg_3');?>
							<?php the_sub_field ('box_3');?>
						</div>
					</div>										
				</div>
			</div>
		</div>

	<?php elseif(get_row_layout() == "modulo_box_+_icono_home"): // layout: Módulo Áreas de práctica ?>

		<div class="boxes-home-iconos">
		
			<div class="wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
				<span class="titulo"><?php the_sub_field('texto');?></span>
				<?php if( have_rows('box') ): ?>
	
					<?php while( have_rows('box') ): the_row(); 
						// vars
						$icono = get_sub_field('icono');
						$titulo = get_sub_field('titulo');
						$porcentaje = get_sub_field('porcentaje');
						$texto = get_sub_field('texto');
						$link1 = get_sub_field('link_1');
						$link2 = get_sub_field('link_2');
						$link3 = get_sub_field('link_3');
						$link4 = get_sub_field('link_4');
					?>
					
					<div class="col-md-3 wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
						<div class="blue">
							<div class="cont-box">
								<?php echo $icono; ?>
								<span class="titulo"><?php echo $titulo; ?></span>
								<span class="porcentaje"><?php echo $porcentaje; ?><span style="font-size: 32px">%</span></span>
								<span class="texto"><?php echo $texto; ?></span>
							</div>
							<span class="triangle">
								Recommendations
							</span>
							<div class="links">
								<?php if($link1): ?><span class="link wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main"><?php echo $link1; ?></span><?php endif; ?>	
								<?php if($link2): ?><span class="link wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main"><?php echo $link2; ?></span><?php endif; ?>	
								<?php if($link3): ?><span class="link wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main"><?php echo $link3; ?></span><?php endif; ?>	
								<?php if($link4): ?><span class="link wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main"><?php echo $link4; ?></span><?php endif; ?>	
							</div>
						</div>
					</div>
				
					<?php endwhile; ?>
				</div>
						
				<?php wp_reset_query(); ?>
		    
		    	<?php endif; ?>
		</div>

	<?php elseif(get_row_layout() == "banner_app"): // layout: Título Sección ?>
</div>
</div>
		<div class="wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
			<div class="row-fluid">
				<div class="container app">
					<div class="col-md-10">
						<?php the_sub_field ('texto');?>
						<img class="banner" src="<?php the_sub_field ('img');?>">
					</div>
				</div>
			</div>
		</div>
	
	<?php elseif(get_row_layout() == "modulo_video"): // layout: Título Sección ?>
	
		<div class="full-width texto-color wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
			
			<div class="row-fluid videos">	
				<div class="col-md-3 no-padding-left"><?php the_sub_field('texto');?></div>
				<div class="col-md-9 embed-container"><?php the_sub_field('video');?></div>
			</div>
		 
		</div>	


	<?php elseif(get_row_layout() == "relacion"): // layout: Título Sección ?>
	
		<div class="full-width texto-color wow fadeIn animated" style="margin-top: 2em;" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
			<div class="row-fluid article-rela">
				<div class="col-md-12">
					<div class="col-xs-1 no-padding">
						<img src="<?php the_sub_field('iconos');?>">
					</div>
					<div class="col-xs-11 textos">
						<?php the_sub_field('textos');?>
					</div>
				</div>
				<div class="col-md-12 link">
					<span class="read-link"><?php the_sub_field('links');?></span>
				</div>
			</div>
		</div>		

	<?php elseif(get_row_layout() == "highlighted_text_&_social_media"): // layout: Título Sección ?>
	
	<div class="full-width texto-color wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
			<div class="row-fluid highlited">
				<div class="col-md-12">
					<div class="col-sm-2 no-padding">
						<img src="<?php the_sub_field('icono');?>">
					</div>
					<div class="col-sm-2 porcentajes no-padding">
						<?php the_sub_field('porcentaje');?>
					</div>
					<div class="col-sm-8 textos no-padding-right">
						<?php the_sub_field('texto');?>
					</div>
					<!--<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://www.google.es&p[images][0]=http://www.otlcampaign.org/sites/default/files/journey-for-justice-mlk-memorial.jpg&p[title]=The+Inconvenient+Truth+of+Education+'Reform'!&p[summary]=Recent+events+have+revealed+how+market-driven+education+policies,+deceivingly+labeled+as+%22reform,%22+are+revealing+their+truly+destructive+effects+on+the+streets+and+in+the+corridors+of+government:">hola</a>-->
								
								<!--	<a target="_blank" href="https://www.facebook.com/dialog/feed?app_id=184683071273&link=<?php the_permalink (); ?>%2F&picture=http%3A%2F%2Flocalhost%2Flifeandms%2Fwp-content%2Fuploads%2F2017%2F02%2Fcabecera.jpg&name=<?php the_title (); ?>&caption=%20&description=<?php the_sub_field('texto');?>&redirect_uri=http%3A%2F%2Fwww.facebook.com%2F">hola</a>-->

				</div>
			</div>
		</div>	

	<?php elseif(get_row_layout() == "exercises_posts"): // layout: Título Sección ?>
	
		<div class="full-width exercises wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
			<?php
			  // set up or arguments for our custom query
			  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			  $query_args = array(
			    'post_type' => 'exercises',
			    'posts_per_page' => 3,
			    'paged' => $paged
			  );
			  // create a new instance of WP_Query
			  $the_query = new WP_Query( $query_args );
			?>
			
			<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
			  <article>
			    <div class="col-sm-5 no-padding-left">
				    <img class="icon-exercise" src="<?php echo get_stylesheet_directory_uri();?>/inc/img/exercise.svg" width="26px" >
				    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></h2>
				    <div class="excerpt">
				      <?php echo excerpt(20) ?>
				    </div>
			    </div>
			    <div class="col-sm-7 no-padding">
				    <?php if ( has_post_thumbnail() ) : ?>
					    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					        <?php the_post_thumbnail(); ?>
					    <span class="play-video"><img src="<?php echo get_stylesheet_directory_uri();?>/inc/img/play.svg"></span>
					    </a>
					<?php endif; ?>
			    </div>
			  </article>
			<?php endwhile; ?>
			
			    <!-- pagination here -->
		    <?php
		      if (function_exists(custom_pagination)) {
		        custom_pagination($the_query->max_num_pages,"",$paged);
		      }
		    ?>
			
			<?php else: ?>
			  <article>
			    <h2>Sorry...</h2>
			    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			  </article>
			<?php endif; ?>	
		</div>		
						<?php wp_reset_query(); ?>
		
	<?php elseif(get_row_layout() == "add_boxes"): // layout: Título Sección ?>
</div>
</div>
		<div class="full-width discover wow fadeIn animated" style="margin-top: 2em;" data-wow-delay="0.3s" data-wow-duration="0.3s" role="main">
			<div class="row-fluid">
				<div class="container">
					<?php the_field ('boxes_+__title','options'); ?>
				</div>
			</div>
		</div>									 								
	<?php endif; ?>
<?php endwhile; ?>

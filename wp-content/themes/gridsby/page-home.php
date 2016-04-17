<?php
/**
Template Name: Home Page
 *
 * @package gridsby
 */

get_header(); ?>

	<div class="container home-grid"> 
			<!-- Top Navigation -->
            
    <section class="grid3d horizontal" id="grid3d">
		<div class="grid-wrap">
	    	<div id="gallery-container" class="gridsby infinite-scroll"> 
            
            	<?php if( get_theme_mod( 'active_home_gallery' ) == '') : ?> 
                    
                <?php global $post;
							
					if ( 'option1' == gridsby_sanitize_index_content( get_theme_mod( 'gridsby_post_time_method' ) ) ) :  
    						
						$args = array( 'post_type' => 'post', 'posts_per_page' => 20, 'order' => 'ASC', 'tax_query' => 				
							array(
								array(
      							'taxonomy' => 'post_format',
      							'field' => 'slug',
      							'terms' => 'post-format-image',
    						))); 
								
					else :
							
						$args = array( 'post_type' => 'post', 'posts_per_page' => 20, 'tax_query' => 				
							array(
								array(
      							'taxonomy' => 'post_format',
      							'field' => 'slug',
      							'terms' => 'post-format-image',
    						)));  
							
					endif;
							
				$myposts = get_posts( $args );
				foreach( $myposts as $post ) :	setup_postdata($post); ?>
                            
                        	
					<?php get_template_part( 'content', 'pf-image' ); // Post Format Image ?> 
        
				
				<?php endforeach; ?>
                        
				<?php endif; ?> 
                        
			</div><!-- gallery-container -->
		</div><!-- /grid-wrap -->
				
                <div class="content">
                
				<?php global $post;
							
					if ( 'option1' == gridsby_sanitize_index_content( get_theme_mod( 'gridsby_post_time_method' ) ) ) : 
							 
    					$args = array( 'post_type' => 'post', 'posts_per_page' => 20, 'order' => 'ASC', 'tax_query' => 				
							array(
								array(
      							'taxonomy' => 'post_format',
      							'field' => 'slug',
      							'terms' => 'post-format-image',
    						))); 
							
					else :
							
						$args = array( 'post_type' => 'post', 'posts_per_page' => 20, 'tax_query' => 				
							array(
								array(
      							'taxonomy' => 'post_format',
      							'field' => 'slug',
      							'terms' => 'post-format-image',
    						))); 
					
					endif; 
						
				$myposts = get_posts( $args );  
				foreach( $myposts as $post ) :	setup_postdata($post); ?>
                    
                            
                    <?php get_template_part( 'content', 'pf-lightbox' ); // Post Format Image Content ?>
                        
             
				<?php endforeach; ?>
                        
				<span class="loading"></span>
                    
				<span class="icon close-content">
                	<i class="fa fa-close"></i>
                </span>
                          
			</div><!-- content -->
		</section><!-- grid3d -->
    
	</div><!-- /container -->
    
    <div class="grid grid-pad">
    	<div class="col-1-1">
        
        	<?php if ( get_theme_mod( 'gridsby_view_all_text' ) ) : ?>
    			<a href="<?php echo esc_url( get_page_link(get_theme_mod('gallery_button_url')))?>">
                	<button class="photo-archive">
						<?php echo esc_html( get_theme_mod( 'gridsby_view_all_text' )); ?>
                    </button>
                </a> 
            <?php endif; ?>
            
        </div><!-- col-1-1 -->
    </div><!-- grid -->
    

    <?php if( get_theme_mod( 'active_home_widget' ) == '') : ?>
    
    <section id="home-page-cta" style="background: url(<?php echo esc_url( get_theme_mod( 'gridsby_new_widget_background' )); ?>) no-repeat;">  
        <div class="grid grid-pad">
            <div class="col-1-1">
            
            	<div class="gridsby-home-widget-area"> 
            
            		<?php if ( is_active_sidebar('home-widget') ) : ?>
    					<?php dynamic_sidebar('home-widget'); ?>    
    		 		<?php endif; ?>
                    
                </div><!-- gridsby-home-widget-area -->
                
            </div><!-- col-1-1 -->
            
            
            <div class="col-1-1"> 
                    
            <?php 
				
				$gridsby_int_url = esc_url( get_page_link( get_theme_mod( 'gridsby_widget_button_url' ))); 
				$gridsby_ext_url = esc_url( get_theme_mod( 'gridsby_page_url_text' )); 
                
                	if ( get_theme_mod( 'gridsby_widget_button_url' ) ) : ?>
                     
                        <a href="<?php echo $gridsby_int_url ?>"> 
                        	<?php if ( get_theme_mod( 'gridsby_widget_button_text' ) ) : ?> 
                            
                            	<button class="outline white">
									<?php echo esc_html( get_theme_mod( 'gridsby_widget_button_text' )); ?>
                                </button>
                                
							<?php endif; ?>
                        </a>
                            
                   	<?php elseif ( get_theme_mod( 'gridsby_page_url_text' ) ) : ?>
                         
                        <a href="<?php echo $gridsby_ext_url ?>" target="_blank"> 
                        	<?php if ( get_theme_mod( 'gridsby_widget_button_text' ) ) : ?> 
                            
                            	<button class="outline white">
									<?php echo esc_html( get_theme_mod( 'gridsby_widget_button_text' )); ?>
                                </button>
                                
							<?php endif; ?>
                        </a>
                          
                   	<?php endif; ?> 
               
                </div><!-- col-1-1 -->
                                
            </div><!-- grid -->
    </section><!-- cta -->
    
	<?php endif; ?> 
    
    <?php if( get_theme_mod( 'active_home_blog' ) == '') : ?> 
    
    <section id="home-blog">
    
    	<div class="grid grid-pad">
        	<div class="col-1-1">
            
            	<?php if ( get_theme_mod( 'gridsby_blog_text' ) ) : ?>
            		<h2><?php echo esc_html( get_theme_mod( 'gridsby_blog_text' )); ?></h2>
                <?php endif; ?>
                
            </div><!-- col-1-1 -->
        </div><!-- grid -->
        
    	<div class="grid grid-pad">
    
			<?php
				
			global $post;
			$args = array( 'post_type' => 'post', 'posts_per_page' => 3, 'tax_query' => array(
    			array(
      				'taxonomy' => 'post_format',
      				'field' => 'slug',
      				'terms' => 'post-format-image', 
      				'operator' => 'NOT IN'
    		)));
				
			$myposts = get_posts( $args ); 
			foreach( $myposts as $post ) :	setup_postdata($post); ?>
				
         	<div class="col-1-3">
            	<div class="blog-post">
                                	
                	<div class="blog-post-thumbnail" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) , 'full' ); ?>')"></div>
									
                                    
                    	<a href="<?php the_permalink(); ?>">
                        	<div class="blog-post-content">
                            	<div class="content-container">
                                            
                                	<p class="date"><?php the_time( get_option( 'date_format' ) ); ?></p>
                                    <?php the_title( '<h4>', '</h4>' ); ?> 
                                    <p><?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 15, '...' ); echo $trimmed_content; ?></p>
                                                
                                </div><!-- content-container -->
                            </div><!-- blog-post-content -->
                        </a><!-- permalink -->
                                    
                </div><!-- blog-post -->
        	</div><!-- col-1-3 -->
                	
			<?php endforeach; ?>
                        
    	</div><!-- grid -->
    </section><!-- home-blog -->
    
	<?php endif; ?>
	

<?php get_footer(); ?>

<?php get_header(); ?>

<section>
		<div class="container-fluid" id="welcome">
				<h1 class="text-center"><?php get_theme_mod( 'welcome_title', 'Welcome to Our Business' ); ?></h1>
			
			   <?php
                $recent_posts = new WP_Query();
                $recent_posts->query('orderby=rand&posts_per_page=3');
            ?>
            <?php if ( $recent_posts->have_posts() ) : ?>
            <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="col-sm-4"> 
                  <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                  <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </div><!-- /.cols -->
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="col-xs-12"><p><?php _e( 'No posts have been created yet.<br>
            Add a category and create posts.<br>Be sure to give each post a featured image.' ); ?></p></div><!-- /.col -->
            <?php endif; ?>
            
		</div> <!-- /#welcome --> 
	</section> <!-- section close -->
	
	<section>
		<div class="container-fluid" id="about">
			<div class="row">
				<h1 class="text-center"><?php echo get_theme_mod( 'about-title', 'About' ); ?></h1></div> <!-- /.row -->
            <p><?php echo get_theme_mod( 'about_content', 'No alien land in all the world has any deep, strong charm for me but that one; no other land could so longingly and beseechingly haunt me sleeping and waking, through half a lifetime, as that one has done. Other things leave me, but it abides; other things change but it remains the same. For me its balmy airs are always blowing, its summer seas flashing in the sun...' ); ?></p>
		</div> <!-- /.container-fluid -->
	</section> <!-- section close -->
	
	<section>
		<div class="container-fluid" id="lodging">
				<h1 class="text-center"><?php echo get_theme_mod( 'lodging_title', 'Lodging' ); ?></h1>
			<div class="row">	
				<?php echo get_theme_mod( 'lodging_content', '<div class="col-xs-offset-2 col-xs-2"><p>Hale Huts</p></div>
			</div><!-- /.row -->
			<div class="row">
				<div class="col-xs-offset-2 col-xs-2"><p>Hammocks</p></div>
				<div class="col-xs-offset-4 col-xs-3 lodging-text"><p>Starting at $65/night</p></div>' ); ?>
			</div><!-- /.row -->
			<div class="row">
				<div class="col-xs-offset-2 col-xs-2"><p>Shared</p></div>
			</div><!-- /.row -->
			
		</div> <!-- /.container-fluid-->
		</section> <!-- section close -->

<?php get_sidebar('bottom'); ?>

<?php get_footer(); ?>
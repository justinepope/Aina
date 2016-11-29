<?php get_header(); ?>

<!-- BLOG SECTION -->
	
<section>
	<div id="aina-blog">
	<div class="container">
	<div class="row">

        <div class="col-sm-8 blog-main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
          <div class="blog-post">
			  
            <h2 class="blog-post-title"><?php the_title(); ?></h2>
            <p class="blog-post-meta"><?php echo get_the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>
			  
			  <?php the_content(); ?>
          
			</div><!-- /.blog-post -->
		
			<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

          <nav>
            <ul class="pager">
              <li><?php next_posts_link('&larr; Older Posts'); ?></li>
			  <li><?php previous_posts_link('Newer Posts &rarr;'); ?></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

<!-- SIDEBAR SECTION -->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
         
			<?php get_sidebar('bottom'); ?>
        
		</div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->
	</div> <!-- /#aina-blog -->
</section>

	
	
<?php get_footer(); ?>
		
	
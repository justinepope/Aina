<?php get_header(); ?>

<!-- BLOG SECTION -->
	
<section>
	<div id="aina-blog">
	<div class="container">
	<div class="row">

        <div class="col-sm-8 blog-main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
			  
              <?php the_post_thumbnail(); ?>
              
            <h2 class="blog-post-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			  </h2>

              <?php the_excerpt(); ?>
			 
              <ul class="pager">
				  <li><a href="<?php echo get_permalink(); ?>">Read More</a></li>
			  </ul>
          
			</article><!-- /.blog-post -->
		
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
         
			<?php get_sidebar(); ?>
            <?php
            // Display optional category description
                if ( category_description() ) : ?>
            <div class="archive-meta"><?php echo category_description(); ?></div>
            <?php endif; ?>
		</div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->
	</div> <!-- /#aina-blog -->
</section>

	
	
<?php get_footer(); ?>
		
	
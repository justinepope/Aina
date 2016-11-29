<?php get_header(); ?>

<!-- BLOG SECTION -->
	
<section>
	<div id="aina-blog">
	<div class="container">
	<div class="row">

        <div class="col-sm-8 blog-main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'comments' ); ?>
            
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
			  
            <h2 class="blog-post-title"><?php the_title(); ?></h2>
            <p class="blog-post-meta"><?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
			  
              <?php the_post_thumbnail('medium'); ?>
			  <?php the_content(); ?>
			  <?php wp_link_pages(); ?>
			  <p>Posted in: <?php the_category(', ');?></p>
			  <p><?php the_tags();?></p>
          
			</article><!-- /.blog-post -->
		
			<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

          <nav>
            <ul class="pager">
              <li><?php previous_post_link('%link', '&larr; Previous post in category', TRUE); ?></li>
			  <li><?php next_post_link( '%link', 'Next post in category &rarr;', TRUE); ?></li>
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

<div class="row comments">
     <div class="col-xs-6 col-xs-offset-3 text-center"<?php comments_template(); ?>></div><!-- /.col -->
</div>
	
	
<?php get_footer(); ?>
		
	
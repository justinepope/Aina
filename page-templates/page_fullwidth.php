<?php /* Template Name: Full Width Template */ ?>

<?php get_header(); ?>

<!-- BLOG SECTION -->
	
<section>
	<div id="aina-blog">
	<div class="container">
	<div class="row">

        <div>

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


	
	
<?php get_footer(); ?>
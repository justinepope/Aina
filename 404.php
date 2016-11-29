<?php get_header(); ?>

<!-- BLOG SECTION -->
	
<section>
	<div id="aina-blog">
	<div class="container">
	<div class="row">

        <div class="col-sm-8 blog-main">

		<h1>Page not found.</h1>
        <p>This page no longer exists.</p>
        <br>
        <br>
        </div> <!-- /.blog-main -->

<!-- SIDEBAR SECTION -->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
         
			<?php get_sidebar('right'); ?>
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
		
	
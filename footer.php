<footer>
		
		<div class="container-fluid" id="footer">
			<div class="row">
				<div itemscope itemtype="http://schema.org/LocalBusiness">
				  <?php echo get_theme_mod( 'footer-content', '<p itemprop="name">Aina Theme</p>
				  <address itemprop="address">1234 Paradise Drive<br>Kona, HI 96745</address>
				  <p itemprop="telephone"><a href="tel:+11234567890">(808) 555-5555</a></p>
				</div> <!-- /itemscope -->
					<a class="btn btn-default" href="#" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
					<a class="btn btn-default" href="#" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
					<a class="btn btn-default" href="#" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a>
					<a class="btn btn-default" href="#" target="_blank"><i class="fa fa-youtube fa-lg"></i></a>' ); ?>
			</div> <!-- /.row -->
			<div class="row">
				<div class="text-right copyright">
				<p>Aina Theme &copy; <?php echo date('Y'); ?></p>
				</div> <!-- /.copyright -->
			</div> <!-- /.row -->
		</div> <!-- /.container-fluid -->
	</footer> <!--footer close -->



<?php wp_footer(); ?>

  </body>
</html>
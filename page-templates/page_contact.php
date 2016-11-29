<?php /* Template Name: Contact Page Template */ ?>

<?php get_header(); ?>
	


<section id="contact"> <!-- contact section -->
	<div class="container-fluid">
		<h1 class="text-center">Contact</h1>
		<div class="row">
			<div class="col-xs-4 address well">
			<div itemscope itemtype="http://schema.org/LocalBusiness">
				  <p itemprop="name">Aina Theme</p>
				  <address itemprop="address">1234 Paradise Drive<br>Kona, HI 96745</address>
				  <p itemprop="telephone"><a href="tel:+11234567890">(808) 555-5555</a></p>
				</div> <!-- /itemscope -->
			</div> <!-- /.address-->
			<div class="col-xs-7 col-xs-offset-1"><iframe width="100%" height="600" src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=600&amp;hl=en&amp;q=Kailua-Kona%2C%20HI%2C%20USA+(Aina)&amp;ie=UTF8&amp;t=h&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/fr/creez-une-carte-google/">intégrer carte dans wordpress</a> by <a href="http://www.mapsdirections.info/fr/">Carte Google Maps</a></iframe>
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container-fluid -->
	
	<br><br>
		<?php echo do_shortcode( '[contact-form-7 id="97" title="Contact form 1"]' ); ?>
		  
	</section><!-- close contact -->
	
	
		
<?php get_footer(); ?>
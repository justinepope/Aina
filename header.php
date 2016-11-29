<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
  </head>

<body <?php body_class(); ?>>
		
<header> <!-- header section -->
				
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  
        <?php if ( get_theme_mod( 'aina_logo' ) ) : ?>
            <a class="navbar-brand page-scroll" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <img src="<?php echo esc_url( get_theme_mod( 'aina_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
            <?php else : ?>
            <a class="navbar-brand page-scroll" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>

			<?php
				wp_nav_menu( array(
					'menu'              => 'primary',
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
			'container_id'      => 'bs-example-navbar-collapse-1',
					'menu_class'        => 'nav navbar-nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
				);
			?>
		</div>
	</nav>

	
	<section> <!-- feature section -->
		<div class="container-fluid">
			<div class="row feature">
				<img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/aina.jpg" alt="aina">
				<div class="col-xs-4 feature-text"><p>Aina</p></div> <!-- /.feature-text -->
			</div> <!-- /.row feature -->
		</div> <!-- /.feature section -->
	
	</section>
	  
       <div class="category">     
        <?php
            if(is_tag()) {
           single_tag_title('Tag: ');
         }
         elseif(is_archive()) {
           single_term_title('Category: '); 
            if( is_month() ) {
              echo 'Posts from ';
              single_month_title(' ');
            }
          }
      ?>
    </div><!-- /.category -->
    
</header> <!-- close header -->
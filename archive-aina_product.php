	
        <div class="row product-archive">
            <?php
                $args = array( 'post_type' => 'aina_product' 'posts_per_page' => 6,
                             'orderby' => 'title', 'order' => 'ASC' );
                $product_query = new WP_Query( $args );
                if ( $product_query->have_posts() ) : ?>
                <?php while ($product_query->have_posts() ) : $product_query->the_post(); ?>
                    <div class="col-sm-4">
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                        <a href="<?php the_permalink() ?>"><?php the_post_title(); ?></a>
                    </div> <!-- /.col -->
                <?php endwhile; ?>
                <?php wp_reset_postdata(): ?>
                <?php else : ?>
                    <div class="col-xs-12"><p><?php _e( 'No products have been created yet.<br>Add that category and create posts.<br>Give each product a featured image.' ); ?>
                    </p></div> <!-- /.col -->
                <?php endif; ?>
        </div> <!-- /.row -->
        

        
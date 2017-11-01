

<?php get_header(); ?>

    <main role="main">

      <div class="container">
        <!-- Example row of columns -->
<!--          <div class="row">

            <div class="col-md-12">
              <h1>Portfolio</h1>
              <hr>

            </div>

        </div> -->

        <div class="row">

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="col-sm-8 portfolio-image">
              <?php
                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
              ?>

              <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title();?> graphic"></a></p>

            </div>

            <div class="col-sm-4">

              <h1><?php the_title(); ?></h1>
              <?php the_content(); ?>
              <!--<p><a class="btn btn-large btn-primary" href="<?php the_field('link'); ?>">View Final Piece <span class="glyphicon glyphicon-arrow-right"></span></a></p>-->
              <div class="prev-next">
                <?php previous_post_link( '%link', '<span class="fa fa-angle-double-left"></span>' ); ?>
                <a href="<?php bloginfo('url'); ?>/portfolio"><span class="fa fa-home"></span></a>
                <?php next_post_link( '%link', '<span class="fa fa-angle-double-right"></span>' ); ?>
              </div>
            </div>


          <?php endwhile; else: ?>

            <div class="page-header">
              <h1>Oh no!</h1>
            </div>

            <p>No content is appearing for this page!</p>

          <?php endif; ?>



        </div>

        <hr>

      </div> <!-- /container -->

    </main>

<?php get_footer(); ?>

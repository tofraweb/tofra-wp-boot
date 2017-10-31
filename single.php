<?php get_header(); ?>

    <main role="main">

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-9"> 

            <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="page-header">

                  <h1><?php the_title(); ?></h1>
                  <p><em>
                    By <?php the_author(); ?> 
                    on <?php echo the_time( 'l, F jS, Y' ) ?> 
                    in <?php the_category( ', ' ); ?>
                     - <a href="<?php comments_link(); ?>"> <?php comments_number(); ?> </a> 
                  </em></p>
                  <hr>

                </div>
                <p><?php the_content(); ?></p>
              <hr>
              <p><?php comments_template(); ?></p>

            <?php endwhile; else: ?> 

              <div class="page-header">

                <h1>Hoops..</h1>

              </div>

              <p>No content is available for this page.</p> 

            <?php endif; ?>

          </div>

          <?php get_sidebar( 'blog' ); ?>

        </div>

        <hr>

      </div> <!-- /container -->

    </main>

<?php get_footer(); ?>

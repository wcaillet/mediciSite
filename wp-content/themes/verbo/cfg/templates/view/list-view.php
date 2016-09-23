<?php global $post, $posts_total, $posts_index; ?>
<article <?php post_class( 'row' ); ?>>

    <?php
        $classes = 'post-content col-md-12 col-lg-12';
        if( has_post_thumbnail() ){

            $params = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'list-thumbnail' );
    ?>
            <div class="post-thumbnail col-md-4 col-lg-4">
              <a href="<?php the_permalink(); ?>" style="max-width: <?php echo $params[1] ?>px;">
                <?php echo get_the_post_thumbnail( $post -> ID , 'list-thumbnail' , esc_attr( $post -> post_title ) ); ?>
              </a>
            </div>
    <?php
            $classes = 'post-content col-md-8 col-lg-8';
        }
    ?>

    <div class="<?php echo $classes; ?>">

        <h2 class="post-title">
        <?php if( !empty( $post -> post_title ) ) { ?>
    
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( $post -> post_title ); ?>"><?php the_title(); ?></a>
    
            <?php } else { ?>
        
                <a href="<?php the_permalink() ?>"><?php _e( 'Read more about ..' , 'myThemes' ) ?></a>
        
            <?php } ?>
        </h2>

        <?php get_template_part( 'cfg/templates/meta' ); ?>

        <?php
            if( !empty( $post -> post_excerpt ) ){
                the_excerpt();
                echo '<a href="' . get_permalink( $post -> ID ) . '">' . __( 'Read More' , 'myThemes' ) . ' &rarr;</a>';
            }
            else{
                the_content( 'Read More &rarr;' );    
            }

            /* VIEW COUNTER jetpack PLUGIN */
            if( function_exists( 'stats_get_csv' ) ) {
                $args = array(
                    'days'      => -1,
                    'post_id'   => $post -> ID,
                );

                $result         = stats_get_csv( 'postviews' , $args );
                $views          = $result[0]['views'];

                $nr_views       = number_format_i18n( $views );
                $label_views    = __( 'views' , 'myThemes' );

                if( $nr_views == 1 ){
                    $label_views = __( 'view' , 'myThemes' );
                }
            ?>
                <span class="mythemes-post-views">
                    <strong><?php echo $nr_views ?></strong>
                    <span><?php echo $label_views; ?></span>
                </span>
        <?php
            }
        ?>
    </div>

    <!-- BOTTOM DELIMITER -->
    <div class="clear clearfix"></div>

    <?php if( $posts_total > $posts_index ){ ?>

        <div class="col-lg-12">
          <div class="post-delimiter"></div>  
        </div>

    <?php } ?>


</article>
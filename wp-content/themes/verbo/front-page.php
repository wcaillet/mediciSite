<?php get_header(); ?>

    <div class="content">
        <div class="container">

            <?php
                ob_start();
                get_sidebar( 'front-page-header-first' );
                $first = ob_get_clean();

                ob_start();
                get_sidebar( 'front-page-header-second' );
                $second = ob_get_clean();

                ob_start();
                get_sidebar( 'front-page-header-third' );
                $third = ob_get_clean();

                $sidebar_content = $first . $second . $third;

                if( !empty( $sidebar_content ) ){
            ?>

                    <!-- FEATURES -->
                    <aside class="row mythemes-features">

                        <!-- FEATURE 1 -->
                        <div class="col-md-4 col-lg-4 feature-item feature-sidebar-1">
                            <?php echo $first; ?>
                        </div>

                        <!-- FEATURE 2 -->
                        <div class="col-md-4 col-lg-4 feature-item feature-sidebar-2">
                            <?php echo $second; ?>
                        </div>

                        <!-- FEATURE 3 -->
                        <div class="col-md-4 col-lg-4 feature-item feature-sidebar-3">
                            <?php echo $third; ?>
                        </div>
                    </aside>
                    <div class="row mythemes-delimiter after-header-widgets">
                        <div class="col-lg-12">
                            <div class="delimiter-item"></div>
                        </div>
                    </div>

            <?php
                }
            ?>

            <div class="row">

            <?php
                if( get_option( 'show_on_front' ) == 'page' ){

                    /* GET LAYOUT DETAILS */
                    $myThemes_layout = new mythemes_layout( 'front-page' );

                    /* LEFT SIDEBAR */
                    $myThemes_layout -> echoSidebar( 'left' );
            ?>
                    <!-- CONTENT -->
                    <section class="<?php echo $myThemes_layout -> contentClass(); ?>">
                    <?php

                        /* LEFT WRAPPER */
                        $myThemes_layout ->  contentWrapper( 'left' );

                        /* CONTENT WRAPPER */
                        $wp_query = new WP_Query( array(
                            'p' => get_option( 'page_on_front' ),
                            'post_type' => 'page'
                        ) );
                    ?>
                        <article>

                        <?php

                            if( count( $wp_query -> posts ) ){
                                foreach( $wp_query -> posts as $post ){

                                    $wp_query -> the_post();

                                    if( has_post_thumbnail() ){ ?>

                                        <div class="my-thumbnail">
                                        <?php echo get_the_post_thumbnail( $post -> ID , array( 9999 , 9999 ) , esc_attr( $post -> post_title ) ); ?>
                                        <?php $caption = get_post( get_post_thumbnail_id() ) -> post_excerpt; ?>
                                        <?php
                                            if( !empty( $caption ) ) {
                                        ?>
                                                <footer class="wp-caption">
                                                    <?php echo $caption; ?>
                                                </footer>
                                        <?php
                                            }
                                        ?>
                                        </div>

                                    <?php } ?>

                                    <?php the_content(); ?>

                                    <div class="clearfix"></div>

                                    <?php wp_link_pages( array( 'before' => '<div><p style="color: #000000;">' . __( 'Pages', "myThemes" ) . ':', 'after' => '</p></div>' ) );
                                }
                            }
                        ?>
                        <article>

                    <?php
                        /* RIGHT WRAPPER */
                        $myThemes_layout ->  contentWrapper( 'right' );
                    ?>
                    </section>
            <?php
                    /* RIGHT SIDEBAR */
                    $myThemes_layout -> echoSidebar( 'right' );

                }else{
                    get_template_part( 'cfg/templates/loop' );
                }
            ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
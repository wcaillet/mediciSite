<?php
class my_wdg_meta extends WP_Widget{
    function my_wdg_meta()
    {
        /* INIT CONSTRUCTOR */
        $widget_ops = array(
            'classname'     => 'widget_post_meta', 
            'description'   => __( 'Use only for single template' , 'myThemes' ) 
        );
        
        $this -> WP_Widget( 'my_wdg_meta' , myThemes::group() . ' : ' . __( 'Meta Details' , 'myThemes' ) , $widget_ops );
    }

    function widget( $args, $instance )
    {    
        global $post;

        /* PRINT THE WIDGET */
        extract( $args , EXTR_SKIP );
        $instance = wp_parse_args( (array) $instance, array( 
            'title' => ''
        ));
        
        $title  = esc_attr( $instance[ 'title' ] );
        
        if( !is_single() ){
            return; 
        }
        
        echo $before_widget;
        
        if( !empty( $title ) ) {
            echo $before_title;
            echo apply_filters( 'widget_title' , $title , $instance , $this -> id_base );
            echo $after_title;
        }
        
        $name = get_the_author_meta( 'display_name' , $post -> post_author );
        
        echo '<div class="large-icons">';
        echo '<ul>';
        edit_post_link( '<i class="icon-pencil"></i>' . __( 'Edit' , 'myThemes' ) , '<li>', '</li>' );
        echo '<li><a href="' . get_day_link( get_post_time( 'Y', false , $post -> ID ) , get_post_time( 'm' , false , $post -> ID ) , get_post_time( 'd' , false , $post -> ID ) ) . '">';
        echo '<time datetime="' . get_post_time( 'Y-m-d', false , $post -> ID  ) . '"><i class="icon-calendar"></i>' . get_post_time( get_option( 'date_format' ), false , $post -> ID  ) . '</time></a></li>';
        echo '<li><a href="' . get_author_posts_url( $post-> post_author ) . '" title="' . __( 'Writed by ' , 'myThemes' ) . ' ' . $name . '"><i class="icon-user-5"></i>' . $name . '</a></li>';
        
        if( $post -> comment_status == 'open' ) {
            $nr = get_comments_number( $post -> ID );
            if( $nr == 1){
                $comments = $nr . ' ' . __( 'Comment' , 'myThemes' );
            }
            else{
                $comments = $nr . ' ' . __( 'Comments' , 'myThemes' );
            }
            echo '<li><a href="' . get_comments_link( $post -> ID ). '"><i class="icon-comment"></i>' . $comments . '</a></li>';
        }

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

            echo '<li><i class="icon-eye-2"></i> ' . $nr_views . ' ' . $label_views . '</li>';
        }

        echo '</ul>';
        echo '</div>';

        echo $after_widget;
    }

    function update( $new_instance, $old_instance )
    {
        $instance               = $old_instance;
        $instance[ 'title' ]    = esc_attr( strip_tags( $new_instance[ 'title' ] ) );
        return $instance;
    }

    function form( $instance )
    {
        /* PRINT WIDGET FORM */
        $instance = wp_parse_args( (array) $instance, array( 
            'title' => ''
        ));
        
        $title  = esc_attr( $instance[ 'title' ] );
        
        /* WIDGET TITLE */
        echo '<p>';
        echo '<label for="' . $this -> get_field_id( 'title' ) . '">' . __( 'Title' , 'myThemes' );
        echo '<input type="text" class="widefat" id="' . $this -> get_field_id( 'title' ) . '" name="' . $this -> get_field_name( 'title' ) . '" value="' . $title . '">';
        echo '</label>';
        echo '</p>';
    }
}
?>
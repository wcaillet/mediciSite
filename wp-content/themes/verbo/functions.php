<?php
    include get_template_directory() . '/fw/main.php';

    add_image_size( 'list-thumbnail' , 720 , 360 , true );
    add_image_size( 'grid-thumbnail' , 555 , 440 , true );
    

    function mythemes_hex2rgb( $hex ) {
        $hex = str_replace( "#", "", $hex );

        if( strlen( $hex ) == 3 ) {
            $r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
            $g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
            $b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
        } else {
            $r = hexdec( substr( $hex, 0, 2 ) );
            $g = hexdec( substr( $hex, 2, 2 ) );
            $b = hexdec( substr( $hex, 4, 2 ) );
        }

        $rgb = array( $r, $g, $b );
        return implode( ",", $rgb );
    }

    function mythemes_adjustBrightness( $hex, $steps ){
        // Steps should be between -255 and 255. Negative = darker, positive = lighter
        $steps = max(-255, min(255, $steps));

        // Format the hex color string
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
        }

        // Get decimal values
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));

        // Adjust number of steps and keep it inside 0 to 255
        $r = max(0,min(255,$r + $steps));
        $g = max(0,min(255,$g + $steps));  
        $b = max(0,min(255,$b + $steps));

        $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
        $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
        $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

        return '#'.$r_hex.$g_hex.$b_hex;
    }
    
    add_action( 'after_setup_theme', array( 'myThemes' , 'setup' ) );
    add_action( 'widgets_init' ,  array( 'myThemes' , 'reg_sidebars' ) );
    add_action( 'wp_enqueue_scripts', array( 'myThemes' , 'init_scripts' ) );
    add_filter( 'wp_title', array( 'myThemes' , 'title' ) , 10, 2 );

    add_filter('the_excerpt_rss', array( 'myThemes' , 'rssThumbnail' ) );
    add_filter('the_content_feed', array( 'myThemes' , 'rssThumbnail' ) );
?>
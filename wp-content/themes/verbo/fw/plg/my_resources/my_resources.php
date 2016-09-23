<?php
/*
    custom posts
    custom taxonomy
    custom box
 
 */
function _mytheme_autoload_resources( $classname )
{
    my_resources::load( $classname );
}

class my_resources
{
    static $first_run = true;
    static $res = array( );

    static function init()
    {
        $data = include get_template_directory() . '/fw/plg/my_resources/res.php';

        foreach( $data as $k ) {
            if( isset( myThemes_acfg::$res[ $k ] ) && myThemes_acfg::$res[ $k ] ){
                self::run( $k );
                self::$res[ "my_res_" . $k ] = "fw/plg/my_resources/my_res_{$k}";
            }
        }
    }

    static function load( $classname )
    {
        if( isset( self::$res[ $classname ] ) ) {
            get_template_part( self::$res[ $classname ] );
        }
    }

    static function run( $tag )
    {
        if( self::$first_run ) {
            self::$first_run = false;

            spl_autoload_register( '_mytheme_autoload_resources' );
        }

        $classname = "my_res_$tag";
        if( $tag == 'box' )
            add_action( 'admin_init', array( $classname , "run" ) );
        else    
            add_action( 'init', array( $classname , "run" ) );
    }
}

my_resources::init();
?>
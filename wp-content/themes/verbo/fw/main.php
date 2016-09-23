<?php
    define( 'MYTHEMES_DEV_LOGO', get_template_directory_uri() .'/media/admin/images/mythemes-logo.png' );
    define( 'MYTHEMES_DEV_ICON', get_template_directory_uri() .'/media/admin/images/icon.png' );
    define( 'MYTHEMES_SHORT_PATH' , true ); /* USED FOR DEBUG */

    $themeDir = get_template_directory();
	
    include $themeDir . '/fw/deb.class.php';
    include $themeDir . '/fw/tools.class.php';
    
    include $themeDir . '/fw/header.class.php';
    
    /* READ OPTIONS | META */
    include $themeDir . '/fw/sett.class.php';
    include $themeDir . '/fw/meta.class.php';

    include $themeDir . '/fw/cfg.php';
    include $themeDir . '/fw/mythemes.class.php';
    
    include $themeDir . '/fw/mythemes_layout.class.php';
	
    /* CUSTOM POSTS */
    include $themeDir . '/cfg/admin/resources/boxes.php';
    
    
    /* SET DEFAULT VALUES FOR SETTINGS FROM PAGES */
    include $themeDir . '/cfg/admin/default.php';
    
    /* LOAD THEME ADMIN DATA */
    if( is_admin() ){
        include $themeDir . '/fw/admin/ahtml.class.php';
        
        /* REGISTER PAGES */
        include $themeDir . '/cfg/admin/pages.php'; 
        include $themeDir . '/fw/admin/main.php';
    }
    
    /* load plugins */
    include $themeDir . '/fw/plg.php';
	
    /* INIT ACTIONS, SHORTCODES, AJAX */
    myThemes::init_actions();
    myThemes::init_filters();
    
    /* REGISTER ( MENUS ) */
    myThemes::reg_menus();
?>
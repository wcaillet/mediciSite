<?php
    $bkg = '';
    if( is_admin() ){
        $bkg = 'background-image: url(' . get_header_image() . '); background-position: top center; background-attachment: fixed; background-size: cover; background-repeat: no-repeat;';
    }
?>
<div class="mythemes-header mythemes-bkg-image overflow-wrapper" style="<?php echo $bkg; ?> height: <?php echo myThemes::get( 'header-height' ); ?>px;" data-bkg-color="<?php echo myThemes::get( 'mask-color' ); ?>" data-bkg-image="<?php echo get_header_image(); ?>">
    <div class="valign-cell-wrapper" style="background: rgba( <?php echo mythemes_hex2rgb( myThemes::get( 'mask-color' ) ); ?>, <?php echo (float)myThemes::get( 'mask-opacity' ) / 100; ?> ); height: <?php echo myThemes::get( 'header-height' ); ?>px;">
        <div class="valign-cell">
            
                <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align: center;">
                            <?php
                                /* HEADER TITLE */
                                if( myThemes::get( 'show-header-title' ) ){
                            ?>
                                    <h1 style="color: #<?php echo get_header_textcolor(); ?>"><?php echo myThemes::get( 'header-title' ); ?></h1>
                            <?php
                                }

                                /* HEADER DESCRIPTION */
                                if( myThemes::get( 'show-header-desc' ) ){
                            ?>
                                    <p class="description" style="color: rgba(<?php echo mythemes_hex2rgb( get_header_textcolor() ); ?> , 0.65 );"><?php echo myThemes::get( 'header-desc' ) ?></p>
                            <?php
                                }

                                /* HEADER BUTTONS */
                                if( myThemes::get( 'show-first-button' ) || myThemes::get( 'show-second-button' ) ){
                            ?>

                                    <p class="buttons">
                                        <?php
                                            /* FIRST BUTTON */
                                            if( myThemes::get( 'show-first-button' ) ){
                                        ?>
                                                <a href="<?php echo myThemes::get( 'first-button-url' ) ?>" class="btn first-button" title="<?php echo myThemes::get( 'first-button-desc' ) ?>"><?php echo myThemes::get( 'first-button-label' ) ?></a> 
                                        <?php
                                            }

                                            /* SECOND BUTTON */
                                            if( myThemes::get( 'show-second-button' ) ){
                                        ?>
                                                <a href="<?php echo myThemes::get( 'second-button-url' ) ?>" class="btn second-button" title="<?php echo myThemes::get( 'second-button-desc' ) ?>"><?php echo myThemes::get( 'second-button-label' ) ?></a> 
                                        <?php
                                            }
                                        ?>
                                    </p>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
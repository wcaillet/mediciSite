<?php
    if ( dynamic_sidebar( 'footer-first' ) ){
        /* IF NOT EMPTY */    
    }
    else{
        /* IF EMPTY */
        if( myThemes::get( 'default-content' ) ){
            echo '<div class="widget website-description">';
            echo '<h1>';
            echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="Verbo - premium wordpress theme">Verbo</a>';
            echo '</h1>';
            echo '<p>Verbo is clean white multipurpose WordPress theme with creative design.<br>';
            echo 'Theme comes with nice flat design concept and responsive layout.</p>';
            echo '</div>';
        }
    }
?>
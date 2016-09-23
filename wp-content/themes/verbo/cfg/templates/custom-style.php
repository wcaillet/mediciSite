<style type="text/css">

    body header .mythemes-topper,
    body div.content,
    footer aside{
        background-color: #<?php echo get_background_color(); ?>;
    }
    
    @media ( min-width: 980px ) {
        hgroup .brand img{
            <?php
                $top = (int)myThemes::get( 'logo-top' );
                if( $top < 0 ){
                    ?> margin-bottom: <?php echo (int)$top; ?>px; <?php
                }
            ?>

            margin-top: <?php echo (int)$top; ?>px;

            <?php
                $left = (int)myThemes::get( 'logo-left' );
                if( $left < 0 ){
                    ?> margin-right: <?php echo (int)$left; ?>px; <?php
                }
            ?>

            margin-left: <?php echo (int)$left; ?>px;
        }
    }

    /* BUTTONS */
    .btn,
    .button,
    .btn.second-button.hover-invert:hover,
    .button.second-button.hover-invert:hover,
    button,
    input[type="submit"],
    input[type="button"],
    div#comments  p.form-submit input[type="submit"],
    div.widget_newsletter form button[type="submit"],
    article.hentry input[type="button"],
    article.hentry input[type="submit"],
    article.hentry button,
    div.widget_post_meta ul li span.post-tag,
    div.widget_calendar table th,
    div.comment-respond h3.comment-reply-title small a,
    .content-border article div.post-meta-tags a:hover,
    .content-border article div.post-meta-categories a{
        background-color: <?php echo myThemes::get( 'first-color' ); ?>;
    }
    .btn.second-button,
    .button.second-button,
    .btn.hover-invert:hover,
    .button.hover-invert:hover,
    div.widget_post_tags div.tagcloud a,
    div.widget_tag_cloud div.tagcloud a,
    .content-border article div.post-meta-tags a,
    .content-border article div.post-meta-categories a:hover,
    div.comment-respond h3.comment-reply-title small a:hover{
        background-color: <?php echo myThemes::get( 'second-color' ); ?>;   
    }

    /* LINK */
    a,
    div.widget ul li a:hover,
    div.widget_calendar table td a:hover,
    div.widget_categories ul li a:hover,
    div.comments-list > ol li.pingback header cite a:hover,
    div.comments-list > ol li.comment header cite a:hover,
    div.widget_recent_comments_with_avatar ul li h5 a:hover{
        color:  <?php echo myThemes::get( 'first-color' ); ?>;
    }
    
    a:hover,
    .content-border article h2 a:hover,
    nav.base-nav ul li.current-menu-item > a{
        color:  <?php echo myThemes::get( 'second-color' ); ?>;;
    }

    /* DARK BORDER BOTTOM */
    .btn,
    .btn.second-button.hover-invert:hover,
    .button,
    .button.second-button.hover-invert:hover,
    button,
    input[type="submit"],
    input[type="button"],
    div#comments  p.form-submit input[type="submit"],
    div.widget_newsletter form button[type="submit"],
    article.hentry input[type="button"],
    article.hentry input[type="submit"],
    article.hentry button,
    div.widget_post_meta ul li span.post-tag,
    div.comment-respond h3.comment-reply-title small a,
    .content-border article div.post-meta-tags a:hover,
    .content-border article div.post-meta-categories a{
        border-bottom: 1px solid <?php echo mythemes_adjustBrightness( myThemes::get( 'first-color' ) , -30 ); ?>;
    }

    .btn.second-button,
    .button.second-button,
    .btn.hover-invert:hover,
    .button.hover-invert:hover,
    div.widget_post_tags div.tagcloud a,
    div.widget_tag_cloud div.tagcloud a,
    .content-border article div.post-meta-tags a,
    .content-border article div.post-meta-categories a:hover,
    div.comment-respond h3.comment-reply-title small a:hover{
        border-bottom: 1px solid <?php echo mythemes_adjustBrightness( myThemes::get( 'second-color' ) , -30 ); ?>;
    }

    div.mythemes-header .valign-cell p.buttons a.btn:hover{
        box-shadow: 0px 0px 20px rgba( 0,0,0, <?php echo (((int)myThemes::get( 'button-shadow-opacity' ) ) / 100 ); ?> );
    }

    <?php echo myThemes::get( 'css' ); ?>
</style>
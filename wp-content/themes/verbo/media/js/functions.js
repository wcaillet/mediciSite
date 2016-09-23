function reset_border_bottom(){
    jQuery('nav.base-nav ul.mythemes-menu > li').find('ul').each(function(){
        var width = parseInt( jQuery(this).parent('li').children('a').outerWidth() ) - 2;
        jQuery(this).parent('li').children('span.menu-delimiter') .css( { 'width' : width + 'px' });
    });
}
jQuery(function(){

    /* ADD PLUS AND ARROW FOR MENU ITEMS WITH SUB MENU */
    jQuery('nav.base-nav ul.mythemes-menu > li').find('ul').each(function(){
        if( !jQuery(this).parent('li').hasClass('submenu-arrow') ){
            jQuery(this).parent('li').addClass('submenu-arrow');
            jQuery(this).parent('li').children('a').append('<span class="menu-plus"></span>');
            var width = parseInt( jQuery(this).parent('li').children('a').outerWidth() ) - 2;
            jQuery(this).parent('li').append('<span class="menu-delimiter" style="width: ' + width + 'px;"></span>');
        }
    });

    /* ADD PLUS AND MINUS FOR MENU ITEMS WITH SUB MENU */
    jQuery( '.btn-collapse' ).click(function(){
        
        if( jQuery( this ).hasClass( 'collapsed' ) ){
            jQuery( this ).removeClass( 'collapsed' );
            jQuery( '.nav-collapse.in' ).each(function(){
                jQuery( this ).hide( 'slow' , function(){
                    jQuery( this ).removeClass( 'in' );
                    jQuery( this ).removeAttr( 'style' );
                });
            });
        }
        else{
            jQuery( '.btn-collapse' ).removeClass( 'collapsed' );
            jQuery( this ).addClass( 'collapsed' );

            var nav = jQuery( this ).attr( 'data-toggle' );

            jQuery( '.nav-collapse.in' ).each(function(){
                jQuery( this ).hide( 'slow' , function(){
                    jQuery( this ).removeClass( 'in' );
                    jQuery( this ).removeAttr( 'style' );
                });
            });

            jQuery( nav ).show( 'slow' , function(){
                jQuery( this ).addClass( 'in' );
                jQuery( this ).removeAttr( 'style' );
            });
        }
    });

    /* CHANGE BORDER BOTTOM ON WINDOW RESIZE */
    jQuery( window ).resize(function() {
         reset_border_bottom();
    });

  


    /* TAGS WITH COUNTER */
    jQuery( 'div.widget_tag_cloud div.tagcloud' ).append( '<div class="clear clearfix"></div>' );
    
    jQuery( 'div.widget_tag_cloud div.tagcloud a, div.widget_post_tags div.tagcloud a' ).each(function(){

        jQuery( this ).removeAttr( 'style' );
        jQuery( this ).removeAttr( 'class' );

        var text = jQuery( this ).text();
        var nr   = jQuery( this ).attr( 'title' ).split( " " )[0];


        jQuery( this ).html( '<span>' +
            '<span class="icon"><i class="icon-tag"></i></span>' +
            '<span class="tag-name">' + text + '</span>' +
            '<span class="counter">' + nr + '</span>' +
            '</span>'
        );

        var icon            = jQuery( this ).find( 'span.icon' );
        var name            = jQuery( this ).find( 'span.tag-name' );
        var counter         = jQuery( this ).find( 'span.counter' );

        var icon_width      = icon.outerWidth();
        var counter_width   = counter.outerWidth();

        var diff            = counter_width - icon_width;
        var name_width      = name.outerWidth();
        var width           = 0;

        if( diff < 0 ){
            diff            = 0;
            width           = name_width + icon_width;
            counter.css({ 'width' : icon_width + 'px' });    
        }else{
            width           = name_width + counter_width;
        }

        counter.css({ 'margin-left' : diff + 'px' });
        jQuery( this ).css({ 'width' : width + 'px' });
    });
});

jQuery(document).ready(function(){

    /* BACKGROUND IMAGE AND SCROLLER */
    var h = jQuery(window).height();
    var current = '';
    var bkg = new Array();
    
    jQuery(".mythemes-bkg-image").each(function(i){
        bkg[i] = jQuery( this );
    });

    if( bkg.length > 0 ){
    
        var top = jQuery( window ).scrollTop();
        
        if( top == 0 ){
            if( current !== bkg[0].attr( 'data-bkg-image' ) ){
                current =  bkg[0].attr( 'data-bkg-image' );
                jQuery.backstretch( current );
                jQuery('body').css({ 'background-color' : bkg[0].attr( 'data-bkg-color' ) });
            }
        }else{
            for( var i = 0; i < bkg.length; i++ ){
                var t   = bkg[i].offset().top;
                var h1  = bkg[i].outerHeight();
                if( top >= t && top <= t + h1 ){
                    if( current !== bkg[i].attr( 'data-bkg-image' ) ){
                        current = bkg[i].attr( 'data-bkg-image' );
                        jQuery.backstretch( current );
                        jQuery('body').css({ 'background-color' : bkg[i].attr( 'data-bkg-color' ) });
                    }
                }
            }
        }

        function onScrollEvent( self, bkg , prev ){
            var next = jQuery(self).scrollTop();
            if( next - prev < 0 ){
                for( var i = 0; i < bkg.length; i++ ){
                    var t   = bkg[i].offset().top;
                    var h1  = bkg[i].outerHeight();
                    if( next >= t && next <= t + h1 ){
                        if( current !== bkg[i].attr( 'data-bkg-image' ) ){
                            current =  bkg[i].attr( 'data-bkg-image' );
                            jQuery.backstretch( current );
                            jQuery('body').css({ 'background-color' : bkg[i].attr( 'data-bkg-color' ) });
                        }
                    }
                }
            }
            
            else{
                for( var i = 0; i < bkg.length; i++ ){
                    var t   = bkg[i].offset().top;
                    var h1  = bkg[i].outerHeight();
                    if( next < t && next + h >= t ){
                        
                        if( current !== bkg[i].attr( 'data-bkg-image' ) ){
                            current =  bkg[i].attr( 'data-bkg-image' );
                            jQuery.backstretch( current );
                            jQuery('body').css({ 'background-color' : bkg[i].attr( 'data-bkg-color' ) });
                        }
                    }
                }
            }
            
            return next;
        }

        var prev = top;

        
        jQuery(window).scroll(function(){
            var self = this;
            prev = onScrollEvent( self , bkg , prev );
        });

        jQuery(window).on('scroll', function(){
            var self = this;
            prev = onScrollEvent( self , bkg , prev );
        });

        jQuery(document).on('mousewheel', function(){
            var self = this;
            prev = onScrollEvent( self , bkg , prev );
        });

        document.addEventListener('gesturechange', function(e){
            var self = this;
            prev = onScrollEvent( self , bkg , prev );
        });

        document.addEventListener('touchmove', function(e){
            var self = this;
            prev = onScrollEvent( self , bkg , prev );
        }, true );
    }
});
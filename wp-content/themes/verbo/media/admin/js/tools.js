
var tools = new Object();
tools.r = function( action , method , args ){
    jQuery(function(){
        jQuery.post( ajaxurl , {
            "action" : action,
            "method" : method,
            "args" : args
        } , function( result ){ tools.init( result ); } );
    });
}
tools.init = function( result ){
    return result;
}

/* hide show object */
tools.hs = new Object();
tools.hs.select = function( selector , args ){
    jQuery(function(){
        jQuery( selector ).each(function(){
            jQuery( 'option' , jQuery( this ) ).each(function(){
                if( jQuery(this).is(':selected') ){
                    for (var key in args) {
                        if ( args.hasOwnProperty( key ) ) {
                            if( jQuery( this ).val().trim()  == key ){
                                jQuery( args[ key ] ).hide();
                            }else{
                                jQuery( args[ key ] ).show();
                            }
                        }
                    }
                }
            });
        });
    });
}

tools.hs.imageSelect = function( selector , args ){
    jQuery(function(){
        jQuery( selector + ' input[type="hidden"]' ).each(function(){
            jQuery( 'option' , jQuery( this ) ).each(function(){
                if( jQuery(this).is(':selected') ){
                    for (var key in args) {
                        if ( args.hasOwnProperty( key ) ) {
                            if( jQuery( this ).val().trim()  == key ){
                                jQuery( args[ key ] ).hide();
                            }else{
                                jQuery( args[ key ] ).show();
                            }
                        }
                    }
                }
            });
        });
    });
}

tools.hs.check = function( selector , args ){
    jQuery(function(){
        jQuery( selector ).each(function(){
            if( jQuery( this ).is(':checked') ){
                for (var key in args) {
                    if ( args.hasOwnProperty( key ) ) {
                        if( jQuery( selector ).val().trim()  == key ){
                            jQuery( args[ key ] ).hide();
                        }else{
                            jQuery( args[ key ] ).show();
                        }
                    }
                }
            }
        });
         
    });
}

tools.hs.checkButton = function( selector , args ){
    jQuery(function(){
        jQuery( selector ).each(function(){
            if( jQuery( selector ).parent().children('input[type="hidden"]').val() ){
                for (var key in args) {
                    if ( args.hasOwnProperty( key ) ) {
                        if( jQuery( selector ).parent().children('input[type="hidden"]').val().trim()  == key ){
                            jQuery( args[ key ] ).hide();
                        }else{
                            jQuery( args[ key ] ).show();
                        }
                    }
                }
            }
        });
    });
}

/* show hide object */
tools.sh = new Object();
tools.sh.select = function( selector , args ){
    jQuery(function(){
        jQuery( selector ).each(function(){
            jQuery( 'option' , jQuery( this ) ).each(function(){
                if( jQuery(this).is(':selected') ){
                    for (var key in args) {
                        if ( args.hasOwnProperty( key ) ) {
                            if( jQuery( this ).val().trim()  == key ){
                                jQuery( args[ key ] ).show();
                                
                                if( args[ key ] == '.my-sc-map-settings'){
                                    jQuery( "div#map_canvas" ).gmap( map_args );
                                }
                            }else{
                                jQuery( args[ key ] ).hide();
                            }
                        }
                    }
                }
            });
        });
    });
}

tools.sh.check = function( selector , args ){
    jQuery(function(){
        jQuery( selector ).each(function(){
            if( jQuery( this ).is(':checked') ){
                for (var key in args) {
                    if ( args.hasOwnProperty( key ) ) {
                        if( jQuery( selector ).val().trim()  == key ){
                            jQuery( args[ key ] ).show();
                        }else{
                            jQuery( args[ key ] ).hide();
                        }
                    }
                }
            }
        });
         
    });
}

tools.sh.checkButton = function( selector , args ){
    jQuery(function(){
        jQuery( selector ).each(function(){
            if( jQuery( selector ).parent().children('input[type="hidden"]').val() ){
                for (var key in args) {
                    if ( args.hasOwnProperty( key ) ) {
                        if( jQuery( selector ).parent().children('input[type="hidden"]').val().trim()  == key ){
                            jQuery( args[ key ] ).show();
                        }else{
                            jQuery( args[ key ] ).hide();
                        }
                    }
                }
            }
        });
         
    });
}
tools.sh.check22 = function( s1 , s2 , c2 , c3 ){
    jQuery(function( ){
        jQuery( s1 ).each(function(){
            if( jQuery( this ).is(':checked') ){
                if( jQuery( this ).val().trim() == 'yes' ){
                    jQuery( c2 ).show();
                    jQuery( s2 ).each(function(){
                        if( jQuery( this ).is(':checked') ){
                            if( jQuery( this ).val().trim() == 'yes' ){
                                jQuery( c3 ).show();
                            }else{
                                jQuery( c3 ).hide();
                            }
                        }
                    });
                }else{
                    jQuery( c2 ).hide();
                    jQuery( c3 ).hide();
                }
            }
        });
    });
}
/* special show hide object */
tools.sh_ = new Object();
tools.sh_.select = function( selector , args ){
    jQuery(function(){
        jQuery( selector ).each(function(i){
            jQuery( 'option' , jQuery( this ) ).each(function(i){
                var show = '';
                var show_ = '';
                if( jQuery( this ).is( ':selected' ) ){
                    for( var key in args ) {
                        if ( args.hasOwnProperty( key ) ) {

                            if( jQuery( this ).val().trim()  == key ){
                                show = args[ key ];
                            }else{
                                if( key == 'else' ){
                                    show_ = args[ key ];
                                }
                                jQuery( args[ key ] ).hide();
                            }
                        }
                    }

                    if( show == '' ){
                        jQuery( show_ ).show();
                    }else{
                        jQuery( show ).show();
                    }
                }
            });
        });
    });
}
tools.sh_.check = function( selector , args ){
    jQuery(function(){
        jQuery( selector ).each(function(){
            var show = '';
            var show_ = '';
            if( jQuery( this ).is(':checked') ){
                
                for (var key in args) {
                    if ( args.hasOwnProperty( key ) ) {

                        if( jQuery( this ).val().trim()  == key ){
                            show = args[ key ];
                        }else{
                            if( key == 'else' ){
                                show_ = args[ key ];
                            }
                            jQuery( args[ key ] ).hide();
                        }
                    }
                }
                if( show == '' ){
                    jQuery( show_ ).show();
                }else{
                    jQuery( show ).show();
                }
            }
        });
    });
}
/* special hide show object */
tools.hs_ = new Object();
tools.hs_.select = function( selector , args ){
    jQuery(function(){
        jQuery( selector ).each(function(){
            jQuery( 'option' , jQuery( this ) ).each(function(){
                var hide = '';
                if( jQuery(this).is(':selected') ){
                    for (var key in args) {
                        if ( args.hasOwnProperty( key ) ) {
                            if( jQuery( this ).val().trim()  == key ){
                                hide = args[ key ];
                            }else{
                                jQuery( args[ key ] ).show();
                            }
                        }
                    }	
					jQuery( hide ).hide();
                }
            });
        });
    });
}
tools.hs_.check = function( selector , args ){
    jQuery(function(){
        jQuery( selector ).each(function(){
            var hide = '';
            if( jQuery( this ).is(':checked') ){
                for (var key in args) {
                    if ( args.hasOwnProperty( key ) ) {

                        if( jQuery( this ).val().trim()  == key ){
                            hide = args[ key ];
                        }else{
                            jQuery( args[ key ] ).show();
                        }
                    }
                }

                jQuery( hide ).hide();
            }
        });
    });
}

/* additional method */
tools.v = function( selector ){
    
    var result;
    jQuery(document).ready(function(){
        if( jQuery( selector ).attr('type') == 'checkbox' || jQuery( selector ).attr('type') == 'radio' ){
            jQuery( selector ).each(function(){
                if( jQuery( this ).is(':checked') ){
                    result = jQuery( this ).val();
                }
            });
        }else{
            result = jQuery( selector ).val();
        }
    });
    
    return result;
}

tools.val = function( selector ){
    
    var result;
    if( jQuery( selector ).attr('type') == 'checkbox' || jQuery( selector ).attr('type') == 'radio' ){
        jQuery( selector ).each(function(){
            if( jQuery( this ).is(':checked') ){
                result = jQuery( this ).val();
            }
        });
    }else{
        result = jQuery( selector ).val();
    }
    
    return result;
}

tools.s = function( selector ){
    jQuery(document).ready(function( ){
        jQuery( selector ).show();
    });
}
tools.h = function( selector ){
    jQuery(document).ready(function( ){
        jQuery( selector ).hide();
    });
}
tools.ah = function( selector ){
    jQuery(function(){
        jQuery( selector ).show();
        jQuery( selector ).fadeTo( 2000 , 0 , function(){
            jQuery( selector ).css( 'opacity' , 1 );
            jQuery( selector ).hide();
        });
    });
}
tools.as = function( selector ){
    jQuery(function(){
        jQuery( selector ).hide();
        jQuery( selector ).fadeTo( 'slow' , 1.0 );
    });
}

tools.searchUsers = function( obj , selector ){
    jQuery(function(){
        jQuery.post( ajaxurl , {
            'action' : 'search_users',
            's' : jQuery( obj ).val()
            
        } , function( result ){ 
            jQuery( selector ).html( result );
        } );
    });
}

tools.confirmSubmit = function( text ){
    if( confirm( text ) )
        return true;
    else
        return false;
}

tools.popBox2 = function( selector ){
    jQuery(function(){
        
        var bwidth = jQuery( 'body' ).width();
        var dheight = jQuery( document ).height();
        var width = jQuery( 'div.popup-box' + selector ).width();
        var left = parseInt( ( bwidth - ( width + 20 ) ) / 2 );
        
        jQuery( 'div.popup-box' + selector ).css( { 'left' : left + 'px' } );
        var h = jQuery( 'div.popup-box' + selector ).height();
        h = h - 56;
        jQuery( 'div.popup-box table.shortcode-panel, div.mytheme_sc_settings' ).css( { 'height' : h + 'px' });
        
        
        jQuery( 'div.popup-box-shadow' + selector + '-shadow' ).css( { 'height' : dheight + "px" } );
        jQuery( 'div.popup-box-shadow' + selector + '-shadow' ).show();
        jQuery( 'div.popup-box' + selector ).show();
        
        jQuery( 'div.popup-box-shadow' + selector + '-shadow' ).click(function(){
            tools.popBox2Hide( selector );
        });
    });
}

tools.popBox2Hide = function( selector ){
    jQuery(function(){
        jQuery( 'div.popup-box-shadow' + selector + '-shadow' ).hide();
        jQuery( 'div.popup-box' + selector ).hide();
    });
}

tools.my_sl_post = function( obj , fields ){
    jQuery(function(){
        if( jQuery( obj ).val() == 0 ) {
            return null;
        }
        jQuery.post( ajaxurl , {
            'action' : 'my_sl_manager_post',
            'postID' : jQuery( obj ).val() } ,
            function( rett ){
                rett = eval('(' + rett + ')');
                
                jQuery( fields.title.toString() ).val( rett.title );
                jQuery( fields.image.toString() ).val( rett.image );
                jQuery( fields.url.toString() ).val( rett.url );
                jQuery( fields.description.toString() ).val( rett.description );
            }
        );
    });
}

tools.colorIcons = function( colorSelector , selector ){
    jQuery(function(){
        //alert( jQuery( colorSelector ).val() );
        jQuery( selector ).css( { 'background-color' : jQuery( colorSelector ).val() } );
    });
}
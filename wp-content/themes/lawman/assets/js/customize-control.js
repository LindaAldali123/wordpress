/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function( $, api ) {
    wp.customize.bind('ready', function() {
    	// Show message on change.
        var lawman_settings = ['lawman_slider_num', 'lawman_services_num', 'lawman_projects_num', 'lawman_testimonial_num', 'lawman_blog_section_num', 'lawman_reset_settings', 'lawman_testimonial_num', 'lawman_partner_num'];
        _.each( lawman_settings, function( lawman_setting ) {
            wp.customize( lawman_setting, function( setting ) {
                var lawmanNotice = function( value ) {
                    var name = 'needs_refresh';
                    if ( value && lawman_setting == 'lawman_reset_settings' ) {
                        setting.notifications.add( 'needs_refresh', new wp.customize.Notification(
                            name,
                            {
                                type: 'warning',
                                message: localized_data.reset_msg,
                            }
                        ) );
                    } else if( value ){
                        setting.notifications.add( 'reset_name', new wp.customize.Notification(
                            name,
                            {
                                type: 'info',
                                message: localized_data.refresh_msg,
                            }
                        ) );
                    } else {
                        setting.notifications.remove( name );
                    }
                };

                setting.bind( lawmanNotice );
            });
        });

        /* === Radio Image Control === */
        api.controlConstructor['radio-color'] = api.Control.extend( {
            ready: function() {
                var control = this;

                $( 'input:radio', control.container ).change(
                    function() {
                        control.setting.set( $( this ).val() );
                    }
                );
            }
        } );

        // Sortable sections
        jQuery( "body" ).on( 'hover', '.lawman-drag-handle', function() {
            jQuery( 'ul.lawman-sortable-list' ).sortable({
                handle: '.lawman-drag-handle',
                axis: 'y',
                update: function( e, ui ){
                    jQuery('input.lawman-sortable-input').trigger( 'change' );
                }
            });
        });

        /* On changing the value. */
        jQuery( "body" ).on( 'change', 'input.lawman-sortable-input', function() {
            /* Get the value, and convert to string. */
            this_checkboxes_values = jQuery( this ).parents( 'ul.lawman-sortable-list' ).find( 'input.lawman-sortable-input' ).map( function() {
                return this.value;
            }).get().join( ',' );

            /* Add the value to hidden input. */
            jQuery( this ).parents( 'ul.lawman-sortable-list' ).find( 'input.lawman-sortable-value' ).val( this_checkboxes_values ).trigger( 'change' );

        });

        // Deep linking for counter section to about section.
        jQuery('.lawman-edit').click(function(e) {
            e.preventDefault();
            var jump_to = jQuery(this).attr( 'data-jump' );
            wp.customize.section( jump_to ).focus()
        });

    });
})( jQuery, wp.customize );

<?php
/**
 * Customizer specific functions
 *
 * @package Elakisto
 */

/**
 * Generate divider to use in Customizer page
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

    class WP_Customize_Divider_Control extends WP_Customize_Control {
        public $type = 'divider';

        public function render_content() {
            ?>
            <div class="customizer-divider"></div>
            <?php
        }
    }

endif;


// List 1 - 10
function elakisto_number_of_slides() {

    $results = '';

    for ( $i=1; $i <= 10; $i++ ) {
        $results[ $i ] = $i;
    }

    return $results;

}

<?php
/**
 * Customizer sanitization functions
 *
 * @package elakisto
 */

/**
 * Sanitize checkbox
 */
function elakisto_sanitize_checkbox( $checkbox ) {
    if ( $checkbox ) {
        $checkbox = 1;
    } else {
        $checkbox = false;
    }
    return $checkbox;
}

/**
 * Sanitize radio
 */
function elakisto_sanitize_radio( $input, $setting ) {
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible radio box options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize text
 */
function elakisto_sanitize_text( $text ) {
    return $text;
}

/**
 * Sanitize text
 */
function elakisto_sanitize_numbers( $numbers ) {
    if ($numbers > 1 && $numbers < 21) {
        return $numbers;
    } else {
        return 12;
    }
}

/**
 * Sanitize selection.
 */
function elakisto_sanitize_select( $selection ) {
    return $selection;
}

/**
 * Sanitize portfolio layout radio inputs
 */
function elakisto_sanitize_portfolio_layout( $selection ) {
	if ( !in_array( $selection, array( 'shuffle', 'three-columns', 'four-columns' ) ) ) {
		$selection = 'shuffle';
	} else {
		return $selection;
	}
}

/**
 * Sanitize archive layout radio inputs
 */
function elakisto_sanitize_archive_layout( $selection ) {
    if ( !in_array( $selection, array( 'side', 'masonry', 'list' ) ) ) {
        $selection = 'side';
    } else {
        return $selection;
    }
}

/**
 * Sanitize shop layout radio inputs
 */
function elakisto_sanitize_shop_layout( $selection ) {
    if ( !in_array( $selection, array( 'shuffle', 'masonry-2', 'masonry-3', 'masonry-4' ) ) ) {
        $selection = 'masonry-3';
    } else {
        return $selection;
    }
}

/**
 * Sanitize the value of Logo image.
 *
 * @param string $logo_image.
 * @return string $logo_image.
 */
function elakisto_sanitize_image( $logo_image ) {
    return $logo_image;
}


/**
 * Sanitize portfolio header radio inputs
 */
function elakisto_sanitize_portfolio_header( $selection ) {
    if ( !in_array( $selection, array( 'none', 'slider', 'headline' ) ) ) {
        $selection = 'none';
    } else {
        return $selection;
    }
}

/**
 * Sanitize colors
 */
function elakisto_sanitize_color( $hex, $default = '' ) {
    if ( elakisto_of_validate_hex( $hex ) ) {
        return $hex;
    }
    return $default;
}

function elakisto_of_validate_hex( $hex ) {
    $hex = trim( $hex );
    /* Strip recognized prefixes. */
    if ( 0 === strpos( $hex, '#' ) ) {
        $hex = substr( $hex, 1 );
    }
    elseif ( 0 === strpos( $hex, '%23' ) ) {
        $hex = substr( $hex, 3 );
    }
    /* Regex match. */
    if ( 0 === preg_match( '/^[0-9a-fA-F]{6}$/', $hex ) ) {
        return false;
    }
    else {
        return true;
    }
}


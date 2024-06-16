<?php
/*
 * Plugin Name:         Invitation Codes: Gravityforms Add-on
 * Plugin URI:          https://github.com/peshmerge/invitation-codes-gravityforms-add-on
 * Description:         A simple Gravity Form add-on to enable WordPress users to specify invitation codes on GF forms.
 * Version:             1.3
 * Requires at least:   5.3
 * Requires PHP:        7.4
 * Author:              Peshmerge Morad
 * Author URI:          https://peshmerge.io
 * Text Domain:         gravity-forms-invitation-codes
 * License URI:         https://www.gnu.org/licenses/gpl-3.0.html
 */

// don't load directly
if (!defined('ABSPATH'))
{
    die();
}

const GF_INVITATION_CODE_VERSION = '1.3';


add_action('gform_loaded', ['GF_Invitation_Code_Bootstrap', 'load'], 5);

/**
 * Class GF_Invitation_Code_Bootstrap
 *
 * Handles the loading of the Invitation Code Add-On and registers with the Add-On Framework.
 */
class GF_Invitation_Code_Bootstrap
{
    public static function load()
    {
        if (!method_exists('GFForms', 'include_addon_framework'))
        {
            return;
        }
        require_once 'class-gf-invitation-code.php';
        GFAddOn::register('GFInvitationCode');
    }
}

function gf_invitation_code()
{
    return GFInvitationCode::get_instance();
}

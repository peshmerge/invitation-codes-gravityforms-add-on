<?php
if (!defined('ABSPATH'))
{
	die();
}

/**
 * Plugin Name: Regex Textfield: Gravityforms Add-on
 * Plugin URI: https://github.com/peshmerge/regex-textfield-gravityforms-add-on
 * Description: A simple Gravity Form add-on to enable WordPress users to use Regex strings on textfield input.
 * Version: 1.0
 * Author: Peshmerge Morad 
 * Author URI: https://peshmerge.io
 */
const GF_Regex_Textfield_VERSION = '1.0';
add_action('gform_loaded', ['GF_Regex_Textfield_Bootstrap', 'load'], 5);
/**
 * Class GF_Regex_Textfield_Bootstrap
 *
 * Handles the loading of the Regex Textfield Add-On and registers with the
 * Add-On Framework.
 */
class GF_Regex_Textfield_Bootstrap
{
	public static function load()
	{
		if (!method_exists('GFForms', 'include_addon_framework'))
		{
			return;
		}
		require_once 'class-gf-regex-textfield.php';
		GFAddOn::register('GFRegexTextfield');
	}
}

function gf_regex_textfield()
{
	return GFRegexTextfield::get_instance();
}
<?php
if (!defined('ABSPATH'))
{
	die();
}

GFForms::include_addon_framework();

class GFRegexTextfield extends GFAddOn
{

	public const GF_Regex_Textfield_TEXTDOMAIN =
	'gravity-forms-regex-textfield';

	/**
	 * Class instance
	 *
	 * @var GFRegexTextfield|null $_instance If available, contains an instance
	 *                                       of this class.
	 */
	private static $_instance = null;
	protected $_version = GF_Regex_Textfield_VERSION;
	protected $_min_gravityforms_version = '2.5';
	protected $_slug = 'regex-textfield-gravityforms';
	protected $_path =
	'regex-textfield-gravityforms-add-on/class-gf-regex-textfield-bootstrap.php';
	protected $_full_path = __FILE__;
	protected $_url = 'https://peshmerge.io';
	protected $_title = 'Regex textfield for GravityForms ';
	protected $_short_title = 'GF Regex Textfield';

	/**
	 * Get an instance of this class.
	 *
	 * @return GFRegexTextfield
	 */
	public static function get_instance()
	{
		if (self::$_instance == null)
		{
			self::$_instance = new GFRegexTextfield();
		}

		return self::$_instance;
	}

	/**
	 * Handles anything which requires early initialization.
	 */
	public function pre_init()
	{
		parent::pre_init();

		if ($this->is_gravityforms_supported() && class_exists('GF_Field'))
		{
			require_once 'includes/class-gf-regex-textfield.php';

		}
	}
	/**
	 * Initialize the admin specific hooks.
	 */
	public function init_admin()
	{
		parent::init_admin();
		add_filter('gform_tooltips', array($this, 'tooltips'));

		add_action(
		 'gform_field_standard_settings',
		  array(
		  $this,
		   'field_settings'
		  ),
		   10, 2
		 );
	}

	public function field_Settings($position, $form_id)
	{
		if ($position == 0)
		{
?>
<li class="regex_textfield_setting field_setting">
	<label for="field_regex_textfield" class="section_label">
		<?php esc_html_e(
			'Regular Expression',
			self::GF_Regex_Textfield_TEXTDOMAIN
			);
?>
		<?php gform_tooltip('field_regex_textfield'); ?>
	</label>
	<input type="text" id="field_regex_textfield" />
</li>
<?php
		}
	}
	public function tooltips($tooltips)
	{
		$regextextfield_tooltips = [
		 'field_regex_textfield' =>
		 '<h6>' .
		 esc_html__(
		  'Regular Expression',
		  self::GF_Regex_Textfield_TEXTDOMAIN
		  ) .
		  '</h6>' .
		  esc_html__(
		  'Enter the regex string you want to be used for the current form',
		   self::GF_Regex_Textfield_TEXTDOMAIN
		  )
		  ];
		return array_merge($tooltips, $regextextfield_tooltips);
	}
}
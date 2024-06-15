<?php
if (!defined('ABSPATH')) {
    die();
}

GFForms::include_addon_framework();

class GFInvitationCode extends GFAddOn
{

    public const GF_INVITATION_CODES_TEXTDOMAIN =
        'gravity-forms-invitation-codes';

    /**
     * Class instance
     *
     * @var GFInvitationCode|null $_instance If available, contains an instance
     *                                       of this class.
     */
    private static $_instance = null;
    protected $_version = GF_INVITATION_CODE_VERSION;
    protected $_min_gravityforms_version = '2.5';
    protected $_slug = 'invitation-codes-gravityforms';
    protected $_path = 'invitation-codes-gravityforms-add-on/gf-invitation-code.php';
    protected $_full_path = __FILE__;
    protected $_url = 'https://peshmerge.io';
    protected $_title = 'GravityForms Invitation Codes Add-On';
    protected $_short_title = 'GF Invitation Codes';

    /**
     * Get an instance of this class.
     *
     * @return GFInvitationCode
     */
    public static function get_instance()
    {
        if (self::$_instance == null) {
            self::$_instance = new GFInvitationCode();
        }

        return self::$_instance;
    }

    private function __clone() {
    } /* do nothing */

    /**
     * Handles anything which requires early initialization.
     */
    public function pre_init()
    {
        parent::pre_init();

        if ($this->is_gravityforms_supported() && class_exists('GF_Field')) {
            require_once 'includes/class-gf-field-invitation-code.php';

        }
    }

    /**
     * Initialize the admin specific hooks.
     */
    public function init_admin()
    {
        parent::init_admin();
        add_filter('gform_tooltips', array($this, 'tooltips'));
        add_action('gform_field_standard_settings', array($this, 'field_settings'), 10, 2);
    }

    public function field_Settings($position, $form_id)
    {
        if ($position == 0) {
            ?>
            <li class="invitation_code_settings field_setting">
                <label for="field_invitation_code" class="section_label">
                    <?php esc_html_e('Invitation Code', self::GF_INVITATION_CODES_TEXTDOMAIN); ?>
                    <?php gform_tooltip('field_invitation_code'); ?>
                </label>
                <input type="text" id="field_invitation_code"/>
            </li>
            <li class="invitation_code_settings field_setting">
                <input type="checkbox" id="invitation_code_case"
                       onclick="SetFieldProperty('invitationCodeCaseSensitive', this.checked);"/>
                <label for="invitation_code_case" class="section_label">
                    <?php
                    esc_html_e('Case sensitive invitation code', self::GF_INVITATION_CODES_TEXTDOMAIN);
                    ?>
                    <?php
                    gform_tooltip('invitation_code_case');
                    ?>
                </label>
            </li>
            <?php
        }
    }

    public function tooltips($tooltips)
    {
        $invitationcodes_tooltips = [
            'field_invitation_code' =>
                '<h6>' . esc_html__('Invitation Code', self::GF_INVITATION_CODES_TEXTDOMAIN) . '</h6>'
                . esc_html__(
                    'Enter the Invitation Code(s) you want to be used for the current form. 
                 You can either enter single code or a comma-separated list of invitation codes. Max 200 codes',
                    self::GF_INVITATION_CODES_TEXTDOMAIN
                )
            ,
            'invitation_code_case' =>
                '<h6>' . esc_html__(
                    'Invitation code sensitivity',
                    self::GF_INVITATION_CODES_TEXTDOMAIN) . '</h6>'
                . esc_html__(
                    'Specify if you want to make the field case sensitive. By default, it\'s case insensitive ',
                    self::GF_INVITATION_CODES_TEXTDOMAIN
                )
        ];
        return array_merge($tooltips, $invitationcodes_tooltips);
    }
}
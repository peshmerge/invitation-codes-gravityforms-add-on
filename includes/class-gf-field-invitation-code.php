<?php

if (!class_exists('GFForms') || !defined('ABSPATH'))
{
	die();
}

class GF_Field_Invitation_Code extends GF_Field_Text
{

	public $type = 'invitation_code';

	/**
	 * Returns the field's form editor icon.
	 *
	 * This could be an icon url or a dashicons class.
	 *
	 * @since 3.9.1
	 *
	 * @return string
	 */
	public function get_form_editor_field_icon()
	{
		return gf_invitation_code()->get_base_url() .
		'/img/gf_invitation_code_icon.svg';
	}

	public function get_form_editor_field_title()
	{
		return esc_attr__(
		 'Invitation Code',
		 GFInvitationCode::GF_INVITATION_CODES_TEXTDOMAIN
		);
	}
	/**
	 * Returns the field's form editor description.
	 *
	 * @since 3.9.1
	 *
	 * @return string
	 */
	public function get_form_editor_field_description()
	{
		return esc_attr__(
		 'Allows users to define an invitation code field ',
		  GFInvitationCode::GF_INVITATION_CODES_TEXTDOMAIN
		 );
	}
	/**
	 * Assign the Signature button to the Advanced Fields group.
	 *
	 * @return array
	 */
	public function get_form_editor_button()
	{
		return array(
		 'group' => 'advanced_fields',
		 'text' => $this->get_form_editor_field_title()
		);
	}


	/**
	 * Return the settings which should be available on the field in the 
	 * form editor.
	 *
	 * @return array
	 */
	function get_form_editor_field_settings()
	{
		return array(
		   'admin_label_setting',
		   'conditional_logic_field_setting',
		   'css_class_setting',
		   'description_setting',
		   'error_message_setting',
		   'invitation_code_setting',
		   'label_placement_setting',
		   'label_setting',
		   'prepopulate_field_setting',
		   'size_setting',
		   'visibility_setting',
		);
	}

	public function validate($value, $form)
	{
		if ($value !== $this->invitationCode)
		{
			$this->failed_validation = true;
			if (!empty($this->errorMessage))
			{
				$this->validation_message = $this->errorMessage;
			}
			else
			{
				$this->validation_message = esc_attr__(
				 'Please provide a valid invitation code',
				 GFInvitationCode::GF_INVITATION_CODES_TEXTDOMAIN
				);
			}
		}
	}


	public function get_field_input($form, $value = '', $entry = null)
	{
		$this->isRequired = true;
		return parent::get_field_input($form, $value = '', $entry = null);
	}
	/**
	 * Returns the scripts to be included for this field type in the 
	 * form editor.
	 *
	 * @return string
	 */
	public function get_form_editor_inline_script_on_page_render()
	{
		// set the default field label
		$script = sprintf(
		 "function SetDefaultValues_invitation_code(field) {
			field.label = '%s';}",
		  $this->get_form_editor_field_title()) . PHP_EOL;
		// initialize the fields custom settings
		$script .= "jQuery(document).bind('gform_load_field_settings',
		 function (event, field, form) {" .
		   "var invitationCode = field.invitationCode == undefined ? '' :
		   field.invitationCode;" .
		   "jQuery('#field_invitation_code').val(invitationCode);" .
		  "jQuery('#field_invitation_code').on('input propertychange',
		   function(){SetFieldProperty('invitationCode', this.value);	});" .
		  "jQuery('#field_invitation_code').val(
			field.invitationCode == undefined || 
			field.invitationCode === false ? '' : field.invitationCode);" .
		  "});" . PHP_EOL;
		return $script;
	}

}

GF_Fields::register(new GF_Field_Invitation_Code());
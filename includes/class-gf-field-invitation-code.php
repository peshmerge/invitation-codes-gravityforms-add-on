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
		   'invitation_code_settings',
		   'label_placement_setting',
		   'label_setting',
		   'prepopulate_field_setting',
		   'size_setting',
		   'visibility_setting',
		);
	}

	public function validate($value, $form)
	{
		// if invitationCodeCaseSensitive then, don't do anything
		if ($this->invitationCodeCaseSensitive) {
			$invitation_codes = explode(',',$this->invitationCode);
		} else {
			// if not invitationCodeCaseSensitive convert everything to lowercase
			$invitation_codes = array_map('strtolower',explode(',',$this->invitationCode));
			$value = strtolower($value);
		}
		
		if (is_array($invitation_codes) && !in_array($value ,$invitation_codes))
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
		$field_label = $this->get_form_editor_field_title();
		?>
		<script type="text/javascript">
			// set the default field label
			function SetDefaultValues_invitation_code(field) {
				field.label = "<?php echo $field_label; ?> ";
			}
			
			// initialize the fields General setting settings
			jQuery(document).bind('gform_load_field_settings',function (event, field, form) {
				// Change the value of the textfield to be from the JS var invitationCode
				jQuery('#field_invitation_code').val(field.invitationCode == undefined || field.invitationCode === false ? '' : field.invitationCode);
				// If the value of the text field is changed, change the JS var invitationCode accordingly 
				jQuery('#field_invitation_code').on('input propertychange', function(){
					SetFieldProperty('invitationCode', this.value);
				});
				
				// Change the value of checkbox based on the value of JS var invitationCodeCaseSensitive
				jQuery("#invitation_code_case").prop("checked", field.invitationCodeCaseSensitive ? true : false);

			});
		</script> 
	<?php
	}
		/**
	 * Returns the scripts to be included with the form init scripts on the front-end.
	 *
	 * @param array $form The Form Object currently being processed.
	 *
	 * @return string
	 */
	public function get_form_inline_script_on_page_render( $form ) {
		/**
		 * Get the value of the http parameter we want to populate our custom invitation code field with
		 * to do that we need to get the value of the field Parameter Name from Advanced tab of the invitation code field
		 * Apparently the value can be obtained by using $this->inputName.
		 */
		if ($this->allowsPrepopulate){
			$http_parameter = $this->inputName;
			$field_id = "#input_{$form['id']}_{$this->id}";
			// For some weird reason the values of invitation code field are not populated automatically, thus this hack.
			return "jQuery(document).ready(function(){ 
				jQuery(\"{$field_id}\").val(new URLSearchParams(window.location.search).get('$http_parameter'));
				jQuery(\"{$field_id}\").attr('readonly',true);
			});";	
		}
	}
}


GF_Fields::register(new GF_Field_Invitation_Code());
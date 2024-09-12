# Invitation Codes: Gravityforms Add-on

- Contributors: peshmerge
- Tags: gravityforms, gravity form, invitationcodes
- Donate link: https://buymeacoffee.com/peshmerge
- Requires at least: 5.5
- Tested up to: 6.6
- Stable tag: 1.4
- Requires PHP: 8.0
- License: GPLv3 or later
- License URI: http://www.gnu.org/licenses/gpl-3.0.html

A GravityForms addon to enable users to use custom invitation codes in combination with GravityForms. 

## Description

This plugin is created to enable WordPress site owners to specify a custom invitation code to be used with Gravity Forms.
Once an invitation code is specified on a form, the user can't submit that form until that invitation code is entered in
the field during the form submission. This plugin can be combined with the Gravity Forms User Registration Add-On to make
sure that only people with a correct invitation code can register on your website. 

## Installation

1. Upload the plugin folder to your /wp-content/plugins/ folder.
2. Go to the **Plugins** page and activate the plugin.
3. Create a GravityForm form and go the edit page.
4. Within the Advanced Fields section in the editor, select "Invitation Code".
5. In the General tab of the Field Settings fill in the Invitation Code you want.
6. In the Appearance tab of the Field Settings, you can specify the "Custom Validation Message". This message will be 
shown to the user when a wrong invitation code is submitted.

## Frequently Asked Questions

### How do I use this plugin?

This plugin requires you to have Gravity Forms installed (min version 2.5).
The plugin is tested with Gravity Forms 2.8.12.1

### How to uninstall the plugin?

Simply deactivate and delete the plugin.

## Screenshots
1. General tab of the Invitation Code field in the form editor.
2. General tab of the Invitation Code field with a filled in Invitation Code, and checked option regarding case-sensitive 
invitation codes.
3. Appearance tab of the Invitation Code field with a custom validation message.
4. Form preview with the Invitation Code field with an incorrect input.

### Changelog

### 1.4
* Fixed: 	Changed the invitation codes fields to a text area instead of a simple text field.
* Fixed: 	Run the Plugin Check (PCP) on the plugin and solved the raised issues.



### 1.3 
* Fixed: 	Removed the plugin dependency of GravityForms. WP.org reject the plugin because GF cann't be found on WP.org

### 1.2
* New:      The plugin requires now GravityForms to be installed to activated
* New:      The limit of 200 invitation codes has been imposed in the form editor.
* New:      Placeholder support is added to the field.
* Fixed:    Corrected typos and did some minor reformatting for the code.

### 1.1
* New:      Invitation code can now be a list of comma-separated codes instead of a single code.
* New:      User can make invitation codes input case-sensitive; default is case-insensitive.
* Fixed:    The invitation code field can now be populated dynamically just like other GF fields.
* Fixed:    The Javascript part is rewritten.

### 1.0
* Plugin released.

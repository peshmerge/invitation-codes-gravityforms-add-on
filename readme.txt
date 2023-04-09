=== Invitation Codes: Gravityforms Add-on ===

Contributors: peshmerge
Tags: gravityforms, gravity form, invitation codes
Requires at least: 5.5
Tested up to: 6.2
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A WordPress plugin and GravityForms addon to enable users to use custom 
invitation codes in combination with GravityForms. 

== Description ==

This plugin is created to enable WordPress site owners to specify a custom invitation code to be used with Gravity Forms.
Once an invitation code is specified on a form, the user can't submit that form until that invitation code is entered in the field during the form submission.
This plugin can be combined with the Gravity Forms User Registration Add-On to make sure that only people with a correct invitation code can register on your
website. 

== Installation ==

1. Upload the plugin folder to your /wp-content/plugins/ folder.
2. Go to the **Plugins** page and activate the plugin.
3. Create a GrvityForm form and go the edit page.
4. Within the Advanced Fields section in the editor, select "Invitation Code".
5. In the General tab of the Field Settings fill in the Invitation Code you want.
6. In the Appearance tab of the Field Settings, you can specify the 
"Custom Validation Message". This message will be shown to the user when a wrong
invitation code is submitted.

== Frequently Asked Questions ==

= How do I use this plugin? =

This plugin requires you to have Gravity Forms installed (min version 2.5).
The plugin is tested with Gravity Forms 2.7.3

= How to uninstall the plugin? =

Simply deactivate and delete the plugin.

== Screenshots ==
1. General tab of the Invitation Code field in the form editor.
2. General tab of the Invitation Code field with a filled in Inviation Code, and checked option regarding case sensitive invitation codes.
3. Appearance tab of the Invitation Code field with a custom validation message.
4. Form preview with the the Inviation Code field with an incorrect input.

== Changelog ==
= 1.0 =
* Plugin released.

= 1.1 =
* New: Invitation code can be now a list of comma separated codes instead of single code.
* New: User can make invitation codes input case sensitive, default is case insensitive.
* Fixed: Invitation code field can now be populated automatically just like other GF fields. 
* Fixed: Rewritten the Javascript part.


<?php

/**
 * Functions for the options page in the Back-end
 *
 *
 * @link http://www.elan42.com
 * @since 0.7
 *
 * @package elan42-disclaimer
 */

/////////////////////////////////////////////////////////////////
///// MENU PAGE /////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

function elan42_disclaimer_menu_page() {
	//$elan42-disclaimer_theme_page_hook = add_menu_page( __('ELAN42 Cookies and Policy', 'elan42-disclaimer'), __('ELAN42 Options','elan42-disclaimer'), 'administrator', 'elan42_disclaimer_options_page', 'elan42_disclaimer_options_page_display', 'dashicons-admin-tools', '61.2' );
	$elan42_disclaimer_theme_page_hook = add_submenu_page( 'tools.php',
		__('Disclaimer by ELAN42', 'elan42-disclaimer'),
		__('Disclaimer', 'elan42-disclaimer'),
		'administrator',
		'elan42_disclaimer_options_page',
		'elan42_disclaimer_display_page' );

	//add_action( 'admin_print_scripts-'. $elan42_disclaimer_theme_page_hook, 'elan42-disclaimer_admin_scripts' );
}
add_action( 'admin_menu', 'elan42_disclaimer_menu_page');

/////////////////////////////////////////////////////////////////
///// SCRIPTS /////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

/*function elan42-disclaimer_admin_scripts() {
    wp_enqueue_script( 'elan42-disclaimer-admin-script' );
}*/

/////////////////////////////////////////////////////////////////
///// DISPLAY PAGE LAYOUT ///////////////////////////////////////
/////////////////////////////////////////////////////////////////

function elan42_disclaimer_menu_init() {
	// REGISTER JAVASCRIPT
	// wp_register_script( 'mcd-admin-script', JS_FOLDER.'admin-theme-options-script.js', array('jquery') );

	// REGISTER MENU GROUP
	register_setting('elan42_disclaimer_options_group', 'elan42_disclaimer_options', 'elan42_disclaimer_options_validate');

	// ADD SECTIONS
	add_settings_section( 'elan42-disclaimer-options', __('Disclaimer by ELAN42','elan42-disclaimer'), 'elan42_disclaimer_section', 'elan42_disclaimer_options_page' );

	// ADD FIELDS TO SECTIONS
	add_settings_field( 'company_name', __('Company Name', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'text',
			'id' => 'company_name',
			'explanation' => __('Name of your company, inluding company extension (for instance "srl").', 'elan42-disclaimer'),
			'default' => 'Company Name'
		));
	add_settings_field( 'policy_title', __('Privacy Policy display title', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'text',
			'id' => 'policy_title',
			'explanation' => __('This is the text to display as Privacy Policy. Defaults to "Privacy Policy"', 'elan42-disclaimer'),
			'default' => 'Privacy Policy'
		));

	add_settings_field( 'terms_title', __('Terms &amp; Conditions display title', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'text',
			'id' => 'terms_title',
			'explanation' => __('This is the text to display as Terms &amp; Conditions. Defaults to "Terms &amp; Conditions"', 'elan42-disclaimer'),
			'default' => 'Terms &amp; Conditions'
		));

	add_settings_field( 'return_title', __('Return Policy display title', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'text',
			'id' => 'return_title',
			'explanation' => __('This is the text to display as Return Policy. Defaults to "Return Policy"', 'elan42-disclaimer'),
			'default' => 'Return Policy'
		));

	add_settings_field( 'credits_title', __('Credits display title', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'text',
			'id' => 'credits_title',
			'explanation' => __('This is the text to display as Credits. Defaults to "Credits"', 'elan42-disclaimer'),
			'default' => 'Credits'
		));

	add_settings_field( 'credits_url', __('Credits link url', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'text',
			'id' => 'credits_url',
			'explanation' => __('This is the url for the credits link. Defaults to the Elan42 webpage.', 'elan42-disclaimer'),
			'default' => 'http://example.com'
		));

	add_settings_field( 'agree_text', __('Agree Text', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'text',
			'id' => 'agree_text',
			'explanation' => __('This is the text to show on the agree button. Defaults to "I Agree".', 'elan42-disclaimer'),
			'default' => 'I Agree'
		));

	add_settings_field( 'hover_text', __('Hover Box Text', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'textarea',
			'id' => 'hover_text',
			'explanation' => __('This is the text that will be displayed in the black hover box. To insert the Privacy Policy link please insert {POLICY}, in the output it will be replaced with the text you defined above. The same for the terms and conditions, place {TERMS}.', 'elan42-disclaimer'),
			'default' => 'We use cookies to help provide you with the best possible online experience. Please read our {PRIVACY} and {TERMS} for information about which cookies we use and what information we collect on our site. By continuing to use this site, you agree that we may store and access cookies on your device.'
		));
	add_settings_field( 'policy_text', __('Privacy Policy Text', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'textarea',
			'id' => 'policy_text',
			'explanation' => __('In this field you can add the text to insert into the Privacy Policy Popup. You can use your domanin (www.yoursite.com) by placing {DOMAIN}, and your company name by adding {COMPANY}. There will be replaced with the right value. You can use HTML', 'elan42-disclaimer'),
		));
	add_settings_field( 'terms_text', __('Terms &amp; Conditions Text', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'textarea',
			'id' => 'terms_text',
			'explanation' => __('In this field you can add the text to insert into the Terms &amp; Conditions Popup. You can use your domanin (www.yoursite.com) by placing {DOMAIN}, and your company name by adding {COMPANY}. There will be replaced with the right value. You can use HTML', 'elan42-disclaimer'),
		));
	add_settings_field( 'return_text', __('Return Policy Text', 'elan42-disclaimer'), 'elan42_disclaimer_setting_display', 'elan42_disclaimer_options_page', 'elan42-disclaimer-options', array(
			'type' => 'textarea',
			'id' => 'return_text',
			'explanation' => __('In this field you can add the text to insert into the Return Policy Popup. You can use your domanin (www.yoursite.com) by placing {DOMAIN}, and your company name by adding {COMPANY}. There will be replaced with the right value. You can use HTML', 'elan42-disclaimer'),
		));
}
add_action('admin_init','elan42_disclaimer_menu_init');

function elan42_disclaimer_setting_display($args) {

	extract($args);

	$option_name = 'elan42_disclaimer_options';

	$options = get_option($option_name);


	if(!empty($options[$id])) {
		$options[$id] = stripslashes($options[$id]);
		$options[$id] = esc_attr( $options[$id] );
	}else{
		$options[$id] = '';
	}

	switch ( $type ) {
		case 'text':

			echo "<input class='regular-text' type='text' id='$id' name='".$option_name."[$id]' value='$options[$id]' />";
			echo "<p>$explanation</p>";
			break;

		case 'textarea':

			echo "<textarea id='$id' class='large-text' cols='50' rows='10' name='".$option_name."[$id]'>$options[$id]</textarea>";
			echo "<p>$explanation</p>";
			break;
	}
}

/////////////////////////////////////////////////////////////////
///// SECTION SET-UP ////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

function elan42_disclaimer_section() {
	echo '<p>'.__("Here you can find the options for Disclaimer by ELAN42. Every field has it's own explanation. Please follow them to set-up the plugin in the right way. Thank you.",'elan42-disclaimer').'</p>';
}

function elan42_disclaimer_options_validate($input) {
	return $input;
}

function elan42_disclaimer_display_page() {
	?>
	
	<div class="wrapper">
		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php 

				settings_fields('elan42_disclaimer_options_group');

				do_settings_sections( 'elan42_disclaimer_options_page' );

				submit_button();
			 ?>
		</form>

		<p><?php _e('You can use the following shortcodes and functions to show the links in your site:', 'elan42-disclaimer'); ?></p>
		<ul>
			<li>[elan42_disclaimer] - <?php _e('Use this shortcode to echo (show) the links.', 'elan42-disclaimer'); ?></li>
			<li>[elan42_disclaimer_links] - <?php _e('If you experience problems with the shortcode above, use this one. It returns the links instead of echo them.', 'elan42-disclaimer'); ?></li>
			<li>the_elan42_disclaimer() - <?php _e('Use this php function to echo (show) the links.', 'elan42-disclaimer'); ?></li>
			<li>get_the_elan42_disclaimer() - <?php _e('Use this php function to return the links.', 'elan42-disclaimer'); ?></li>
		</ul>
	</div>

	<?php
}
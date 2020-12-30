<?php
add_action( 'admin_init', 'amtsp_check_lite', 1 );
add_action('admin_menu', 'any_mobile_create_menu_pro');

if (isset($_POST['amtsp_license_submit'])){
	$license_key_return = wp_remote_fopen('http://dnesscarkey.com/any-mobile-theme-switcher-pro/license/validate_key.php?license_key='.$_POST['amtsp_license_key']);
	$license_key_return = json_decode($license_key_return);
	if (!empty($license_key_return)){
		if ($license_key_return->status == 'success'){
			update_option('amtsp_license_key_status', 'activated');
			update_option('amtsp_license_key_valid_till', $license_key_return->valid_till);
			update_option('amtsp_license_key_code', $_POST['amtsp_license_key']);
		}
		$license_message = $license_key_return->msg;
		$license_status	 = $license_key_return->status;
	} else {
		$license_status	 = 'error';
		$license_message = 'Sorry there was an error. Please try again.';
	}
	
	if ($license_status	== 'error'){
		$lic_notice_class	= 'error';
	} else {
		$lic_notice_class	= 'updated';
	}	
}

$amtsp_license_key_status		= get_option('amtsp_license_key_status');
$amtsp_license_key_valid_till	= get_option('amtsp_license_key_valid_till');

function amtsp_check_lite(){
	if (is_plugin_active('any-mobile-theme-switcher/any-mobile-theme-switcher.php')) {
		 echo '<div class="error">
       <p>You must deactivate or remove the lite version of Any Mobile Theme Switcher for Any Mobile Theme Switcher Pro to work.</p></div>';
	}
}

function any_mobile_create_menu_pro() {
	add_options_page('Any Mobile Theme Pro', 'Any Mobile Theme Pro', 'administrator', __FILE__, 'amp_settings_page');
	add_action('admin_init', 'register_mysettings_theme_pro');
}

function register_mysettings_theme_pro() {
	register_setting('amp-settings-group', 'iphone_theme');
	register_setting('amp-settings-group', 'ipad_theme');
	register_setting('amp-settings-group', 'android_theme');
	register_setting('amp-settings-group', 'android_tab_theme');
	register_setting('amp-settings-group', 'blackberry_theme');
	register_setting('amp-settings-group', 'windows_theme');
	register_setting('amp-settings-group', 'opera_theme');
	register_setting('amp-settings-group', 'parm_os_theme');
	register_setting('amp-settings-group', 'other_theme');
	
	register_setting('amp-settings-group', 'iphone_homepage');
	register_setting('amp-settings-group', 'ipad_homepage');
	register_setting('amp-settings-group', 'android_homepage');
	register_setting('amp-settings-group', 'android_tab_homepage');
	register_setting('amp-settings-group', 'blackberry_homepage');
	register_setting('amp-settings-group', 'windows_homepage');
	register_setting('amp-settings-group', 'opera_homepage');
	register_setting('amp-settings-group', 'parm_os_homepage');
	register_setting('amp-settings-group', 'other_homepage');
	
	register_setting('amp-settings-group', 'mobile_view_theme_link_text');
	register_setting('amp-settings-group', 'desktop_view_theme_link_text');
	register_setting('amp-settings-group', 'show_switch_link_for_desktop');
	register_setting('amp-settings-group', 'forced_layout_expire_time');
}

switch ($amtsp_license_key_status){
	case 'trial':
		if (strtotime($amtsp_license_key_valid_till) < strtotime(date('Y-m-d'))){
			add_action('admin_notices', 'amtsp_license_notice_expired');
			update_option('amtsp_license_key_status', 'expired');
		}
	break;
	
	
	case 'trial_expired':
		add_action('admin_notices', 'amtsp_license_notice_trial_expired');
	break;
	
	case 'activated':
		if (strtotime($amtsp_license_key_valid_till) < strtotime(date('Y-m-d'))){
			add_action('admin_notices', 'amtsp_license_notice_expired');
			update_option('amtsp_license_key_status', 'expired');
		}
	break;
	
	
	
	default:
		update_option('amtsp_license_key_status', 'trial');
		$trial_valid_till = date('Y-m-d', strtotime("+999 days"));
		update_option('amtsp_license_key_valid_till', $trial_valid_till);
		update_option('amtsp_license_key_code', '');
		add_action('admin_notices', 'amtsp_license_notice_trial');
	break;	
}

$amtsp_license_key_status		= get_option('amtsp_license_key_status');

function amtsp_license_notice_expired(){
    echo '<div class="error">
       <p>Your License Key of <b>Any Mobile Theme Switcher Pro</b> has been expired. Get the license key from <a href="http://dnesscarkey.com/any-mobile-theme-switcher-pro/license/" target="_blank">Dnesscarkey</a>. If you already have the license key click <a href="options-general.php?page=any-mobile-theme-switcher-pro/plugin_interface.php">here</a> to activate.</p></div>';
}


function amtsp_license_notice_trial(){
    $amtsp_license_key_valid_till	= get_option('amtsp_license_key_valid_till');
	$today_date 				= time();
    $expire_date 				= strtotime($amtsp_license_key_valid_till);
    $datediff 					= $expire_date - $today_date;
    $remainingDays 				= floor($datediff/(60*60*24));
	echo '<div class="error">
       <p>You are using <b>Any Mobile Theme Switcher Pro </b> as a trial. Get the license key from <a href="http://dnesscarkey.com/any-mobile-theme-switcher-pro/license/" target="_blank">Dnesscarkey</a>. If you already have the license key click <a href="options-general.php?page=any-mobile-theme-switcher-pro/plugin_interface.php">here</a> to activate.</p>
	   <p><strong>Remaining Days :</strong> '.$remainingDays.' </p></div>';
}

function amtsp_license_notice_trial_expired(){
    echo '<div class="error">
       <p>Your Trial Period of <b>Any Mobile Theme Switcher Pro</b> has been expired. Get the license key from <a href="http://dnesscarkey.com/any-mobile-theme-switcher-pro/license/" target="_blank">Dnesscarkey</a>. If you already have the license key click <a href="options-general.php?page=any-mobile-theme-switcher-pro/plugin_interface.php">here</a> to activate.</p>
    </div>';
}

function amtsp_make_phone_clickable($content){	
	$content = preg_replace('/<span class="mobile_tel">(.*)<\/span>/isU', "<a rel='external' href='tel:$1'>$1</a>", $content);
	// ATTACH SCRIPT. NEED FOR JQUERY MOBILE
	$attachScript = '<script>
	jQuery(".mobile_tel").replaceWith("<a rel=\'external\' href=\'tel:"+jQuery(".mobile_tel").html()+"\'>"+jQuery(".mobile_tel").html()+"</a>");	
</script>';	
	return $content.$attachScript;
}

function custom_get_themelist(){
	$themes = wp_get_themes();
	$wp_themes = array();

	foreach ( $themes as $theme ) {
		$name = $theme->get('Name');
		if ( isset( $wp_themes[ $name ] ) )
			$wp_themes[ $name . '/' . $theme->get_stylesheet() ] = $theme;
		else
			$wp_themes[ $name ] = $theme;
	}

	return $wp_themes;
}

function amtsp_load_js(){
	wp_enqueue_script( 'jquery');	
}

function amp_settings_page() {	
	global $amts_force_param;
	include('includes/amtsp-header.php');
	include('includes/amtsp-license.php');
	include('includes/amtsp-theme-select.php');
	include('includes/amtsp-force-switch.php');
	include('includes/amtsp-readme.php');
	include('includes/amtsp-footer.php');
}
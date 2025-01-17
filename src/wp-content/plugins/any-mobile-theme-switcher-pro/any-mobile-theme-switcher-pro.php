<?php
/* 
Plugin Name: Any Mobile Theme Switcher Pro
Plugin URI: http://dnesscarkey.com/any-mobile-theme-switcher-pro
Description: This plugin allow you to detect all mobile platform and switch the theme. Supports most of the mobile platform including iphone, ipad, ipod, windows mobile, palm os, blackberry, android, andriod tab.
Author: Dinesh Karki
Version: 2.0
Author URI: http://www.dineshkarki.com.np
*/

/*  Copyright 2012  Dinesh Karki  (email : dnesskarki@gmail.com)*/

$amtsp_mobile_browser 		= '';
$amtsp_status 				= '';
$amtsp_shown_theme 			= '';
$amtsp_mobile_homepage	  	= '';
$amts_force_param 			= defined('AMTS_FORCE_FLAG')?AMTS_FORCE_FLAG:'am_force_theme_layout';

add_action('plugins_loaded', 'amtsp_start', 1);
add_filter('widget_text', 'do_shortcode');
function amtsp_start(){
	global $amtsp_mobile_browser;
	global $amtsp_status;
	global $amtsp_shown_theme;
	global $amtsp_mobile_homepage;
	global $amts_force_param;
	
	$forcedLayoutExpireTime	= get_option('forced_layout_expire_time');
	if (empty($forcedLayoutExpireTime)){
		$time = '0';
	} else {
		$time =	time()+$forcedLayoutExpireTime;
	}
	$normal_cookie_time = time()+60*60*24;;
	
	$url_path = '/';
	
	$checkReturn 			=	amtsp_checkMobile();
	$amtsp_mobile_browser	=	$checkReturn['amtsp_mobile_browser'];
	$amtsp_status			=   $checkReturn['amtsp_status'];
	$amtsp_mobile_homepage	= 	$checkReturn['amtsp_mobile_homepage'];
	
	$forceLayout			= '';
	
	//Force Theme Display request from visitor.
	if (isset($_COOKIE['am_force_theme_layout'])){
		$forceLayout = $_COOKIE['am_force_theme_layout'];
	}
	
	if (isset($_GET[$amts_force_param])){
		if ($_GET[$amts_force_param] == 'mobile'){
			$forceLayout	= 'mobile';
			setcookie('am_force_theme_layout', $_GET[$amts_force_param], $time, $url_path);
		} else {
			$forceLayout	= 'desktop';
			setcookie('am_force_theme_layout', $_GET[$amts_force_param], $time, $url_path);	
		}
	}
	
	$amtsp_license_key_status		= get_option('amtsp_license_key_status');
	if (($amtsp_license_key_status != 'trial_expired') && ($amtsp_license_key_status != 'expired')){	
		if (!empty($forceLayout)){ //IF USER FORCE FOR THE THEME
			if ($forceLayout == 'mobile'){ // IF FORCED THEME IS MOBILE
				$amtsp_mobile_browser 	= get_option('iphone_theme');
				setcookie( 'wptouch_switch_toggle', 'go_mobile', $normal_cookie_time, $url_path);
				setcookie( 'amts_mobile_theme', 'go_mobile', $normal_cookie_time, $url_path);
				add_filter('stylesheet', 'loadMobileStylePro');
				add_filter('template', 'loadMobileThemePro');
				$amtsp_shown_theme = 'mobile';
				add_action('template_redirect', 'amtsp_change_homepage');
				add_filter( 'the_content', 'amtsp_make_phone_clickable', 20);
				add_action( 'wp_enqueue_scripts', 'amtsp_load_js' );
			}
		} else { // NORMAL THEME [PLUGIN DEFAULT]
			if (!empty($amtsp_mobile_browser)){
				setcookie( 'wptouch_switch_toggle', 'go_mobile', $normal_cookie_time, $url_path);
				setcookie( 'amts_mobile_theme', 'go_mobile', $normal_cookie_time, $url_path);
				add_filter('stylesheet', 'loadMobileStylePro');
				add_filter('template', 'loadMobileThemePro');
				$amtsp_shown_theme = 'mobile';	
				add_action('template_redirect', 'amtsp_change_homepage');
				add_filter( 'the_content', 'amtsp_make_phone_clickable', 20);
				add_action( 'wp_enqueue_scripts', 'amtsp_load_js' );
			}
		}
	}
}

function loadMobileStylePro(){
	global $amtsp_mobile_browser;
	$mobileTheme =  $amtsp_mobile_browser;
	$themeList = custom_get_themelist();
	foreach ($themeList as $theme) {
	  if ($theme['Name'] == $mobileTheme) {
		  return $theme['Stylesheet'];
	  }
	}	
}

function loadMobileThemePro(){
	global $amtsp_mobile_browser;
	$mobileTheme =  $amtsp_mobile_browser;
	$themeList = custom_get_themelist();
	foreach ($themeList as $theme) {
	  if ($theme['Name'] == $mobileTheme) {
		  return $theme['Template'];
	  }
	}	
}

function amtsp_change_homepage(){
	global $amtsp_mobile_homepage;
	if (is_front_page()){ // || is_home()
		if ($amtsp_mobile_homepage > 0){
			$newHomeUrl  = get_permalink( $amtsp_mobile_homepage );
			wp_redirect($newHomeUrl);
			exit();
		}
	}	
}

// Embed Switch Links in Theme Via Shortcode
// [show_theme_switch_link]
function show_theme_switch_link_func_pro( $atts ){
 	global $amtsp_shown_theme;
	global $amtsp_status;
	global $amts_force_param;
	$desktopSwitchLink	= get_option('show_switch_link_for_desktop');
	
	if ($amtsp_shown_theme){
		$return = '<a rel="external" data-ajax="false" href="'.get_bloginfo('url').'?'.$amts_force_param.'=desktop" class="am-switch-btn godesktop">'.get_option('desktop_view_theme_link_text').'</a>';		
	} else {
		if ((!empty($amtsp_status)) || ($desktopSwitchLink == 'yes')){
			$return = '<a href="'.get_bloginfo('url').'?'.$amts_force_param.'=mobile" class="am-switch-btn gomobile">'.get_option('mobile_view_theme_link_text').'</a>';
		}
	}
	return $return;
}
add_shortcode('show_theme_switch_link', 'show_theme_switch_link_func_pro');


// [amtsp_qr_code]
function amtsp_get_qr_code( $atts ) {
	extract( shortcode_atts(
		array(
			'size' => '150',
		), $atts )
	);
	return '<img src="http://api.qrserver.com/v1/create-qr-code/?size='.$atts['size'].'x'.$atts['size'].'&data='.get_bloginfo('url').'" alt="Qr Code" />';
}
add_shortcode('amtsp_qr_code', 'amtsp_get_qr_code');


// DETECT MOBILE BROWSER
function amtsp_checkMobile(){
	$amtsp_mobile_browser	  	= '';
	$amtsp_mobile_homepage	  	= '';
	$mobileredirect   			= '';
	$amtsp_status			  	= '';	
	$user_agent       = $_SERVER['HTTP_USER_AGENT']; // get the user agent value - this should be cleaned to ensure no nefarious input gets executed
	$accept           = $_SERVER['HTTP_ACCEPT']; // get the content accept value - this should be cleaned to ensure no nefarious input gets executed
	
	  switch(true){ // using a switch against the following statements which could return true is more efficient than the previous method of using if statements
	
		case (preg_match('/ipad/i',$user_agent)); // we find the word ipad in the user agent
		  $amtsp_mobile_browser 	= get_option('ipad_theme'); // mobile browser is either true or false depending on the setting of ipad when calling the function
		  $amtsp_mobile_homepage 	= get_option('ipad_homepage');
		  $amtsp_status = 'Apple iPad';      
		break; // break out and skip the rest if we've had a match on the ipad // this goes before the iphone to catch it else it would return on the iphone instead
	
		case (preg_match('/ipod/i',$user_agent)||preg_match('/iphone/i',$user_agent)); // we find the words iphone or ipod in the user agent
		  $amtsp_mobile_browser = get_option('iphone_theme'); // mobile browser is either true or false depending on the setting of iphone when calling the function
		  $amtsp_mobile_homepage 	= get_option('iphone_homepage');
		  $amtsp_status = 'Apple';      
		break; // break out and skip the rest if we've had a match on the iphone or ipod
	
		case (preg_match('/android/i',$user_agent));  // we find android in the user agent
		  if (preg_match('/mobile/i',$user_agent)):
			  $amtsp_mobile_browser = get_option('android_theme'); // mobile browser is either true or false depending on the setting of android when calling the function
			  $amtsp_mobile_homepage 	= get_option('android_homepage');
			  $amtsp_status = 'Android';      
		  else :
			  $amtsp_mobile_browser = get_option('android_tab_theme'); // mobile browser is either true or false depending on the setting of android when calling the function
			  $amtsp_mobile_homepage 	= get_option('android_tab_homepage');
			  $amtsp_status = 'Android Tab';      
		  endif;
		  
		break; // break out and skip the rest if we've had a match on android
	
		case (preg_match('/opera mini/i',$user_agent)); // we find opera mini in the user agent
		  $amtsp_mobile_browser = get_option('opera_theme'); // mobile browser is either true or false depending on the setting of opera when calling the function
		  $amtsp_mobile_homepage 	= get_option('opera_homepage');		  
		  $amtsp_status = 'Opera';      
		break; // break out and skip the rest if we've had a match on opera
	
		case (preg_match('/blackberry/i',$user_agent)); // we find blackberry in the user agent
		  $amtsp_mobile_browser = get_option('blackberry_theme'); // mobile browser is either true or false depending on the setting of blackberry when calling the function
		  $amtsp_mobile_homepage 	= get_option('blackberry_homepage');		  
		  $amtsp_status = 'Blackberry';      
		break; // break out and skip the rest if we've had a match on blackberry
	
		case (preg_match('/(pre\/|palm os|palm|hiptop|avantgo|plucker|xiino|blazer|elaine)/i',$user_agent)); // we find palm os in the user agent - the i at the end makes it case insensitive
		  $amtsp_mobile_browser = get_option('parm_os_theme'); // mobile browser is either true or false depending on the setting of palm when calling the function
		  $amtsp_mobile_homepage 	= get_option('parm_os_homepage');		  
		  $amtsp_status = 'Palm';      
		break; // break out and skip the rest if we've had a match on palm os
	
		case (preg_match('/(iris|3g_t|windows ce|opera mobi|windows ce; smartphone;|windows ce; iemobile)/i',$user_agent)); // we find windows mobile in the user agent - the i at the end makes it case insensitive
		  $amtsp_mobile_browser = get_option('windows_theme'); // mobile browser is either true or false depending on the setting of windows when calling the function
		  $amtsp_mobile_homepage 	= get_option('windows_homepage');		  
		  $amtsp_status = 'Windows Smartphone';      
		break; // break out and skip the rest if we've had a match on windows
	
		case (preg_match('/(mini 9.5|vx1000|lge |m800|e860|u940|ux840|compal|wireless| mobi|ahong|lg380|lgku|lgu900|lg210|lg47|lg920|lg840|lg370|sam-r|mg50|s55|g83|t66|vx400|mk99|d615|d763|el370|sl900|mp500|samu3|samu4|vx10|xda_|samu5|samu6|samu7|samu9|a615|b832|m881|s920|n210|s700|c-810|_h797|mob-x|sk16d|848b|mowser|s580|r800|471x|v120|rim8|c500foma:|160x|x160|480x|x640|t503|w839|i250|sprint|w398samr810|m5252|c7100|mt126|x225|s5330|s820|htil-g1|fly v71|s302|-x113|novarra|k610i|-three|8325rc|8352rc|sanyo|vx54|c888|nx250|n120|mtk |c5588|s710|t880|c5005|i;458x|p404i|s210|c5100|teleca|s940|c500|s590|foma|samsu|vx8|vx9|a1000|_mms|myx|a700|gu1100|bc831|e300|ems100|me701|me702m-three|sd588|s800|8325rc|ac831|mw200|brew |d88|htc\/|htc_touch|355x|m50|km100|d736|p-9521|telco|sl74|ktouch|m4u\/|me702|8325rc|kddi|phone|lg |sonyericsson|samsung|240x|x320|vx10|nokia|sony cmd|motorola|up.browser|up.link|mmp|symbian|smartphone|midp|wap|vodafone|o2|pocket|kindle|mobile|psp|treo)/i',$user_agent)); // check if any of the values listed create a match on the user agent - these are some of the most common terms used in agents to identify them as being mobile devices - the i at the end makes it case insensitive
		  $amtsp_mobile_browser 	= get_option('other_theme'); // set mobile browser to true
		  $amtsp_mobile_homepage 	= get_option('other_homepage');
		  $amtsp_status = 'Mobile matched on piped preg_match';
		break; // break out and skip the rest if we've preg_match on the user agent returned true 
	
		case ((strpos($accept,'text/vnd.wap.wml')>0)||(strpos($accept,'application/vnd.wap.xhtml+xml')>0)); // is the device showing signs of support for text/vnd.wap.wml or application/vnd.wap.xhtml+xml
		  $amtsp_mobile_browser 	= get_option('other_theme'); // set mobile browser to true
		  $amtsp_mobile_homepage 	= get_option('other_homepage');
		  $amtsp_status = 'Mobile matched on content accept header';
		break; // break out and skip the rest if we've had a match on the content accept headers
	
		case (isset($_SERVER['HTTP_X_WAP_PROFILE'])||isset($_SERVER['HTTP_PROFILE'])); // is the device giving us a HTTP_X_WAP_PROFILE or HTTP_PROFILE header - only mobile devices would do this
		  $amtsp_mobile_browser 	= get_option('other_theme'); // set mobile browser to true
		  $amtsp_mobile_homepage 	= get_option('other_homepage');
		  $amtsp_status = 'Mobile matched on profile headers being set';
		break; // break out and skip the final step if we've had a return true on the mobile specfic headers
	
		case (in_array(strtolower(substr($user_agent,0,4)),array('1207'=>'1207','3gso'=>'3gso','4thp'=>'4thp','501i'=>'501i','502i'=>'502i','503i'=>'503i','504i'=>'504i','505i'=>'505i','506i'=>'506i','6310'=>'6310','6590'=>'6590','770s'=>'770s','802s'=>'802s','a wa'=>'a wa','acer'=>'acer','acs-'=>'acs-','airn'=>'airn','alav'=>'alav','asus'=>'asus','attw'=>'attw','au-m'=>'au-m','aur '=>'aur ','aus '=>'aus ','abac'=>'abac','acoo'=>'acoo','aiko'=>'aiko','alco'=>'alco','alca'=>'alca','amoi'=>'amoi','anex'=>'anex','anny'=>'anny','anyw'=>'anyw','aptu'=>'aptu','arch'=>'arch','argo'=>'argo','bell'=>'bell','bird'=>'bird','bw-n'=>'bw-n','bw-u'=>'bw-u','beck'=>'beck','benq'=>'benq','bilb'=>'bilb','blac'=>'blac','c55/'=>'c55/','cdm-'=>'cdm-','chtm'=>'chtm','capi'=>'capi','cond'=>'cond','craw'=>'craw','dall'=>'dall','dbte'=>'dbte','dc-s'=>'dc-s','dica'=>'dica','ds-d'=>'ds-d','ds12'=>'ds12','dait'=>'dait','devi'=>'devi','dmob'=>'dmob','doco'=>'doco','dopo'=>'dopo','el49'=>'el49','erk0'=>'erk0','esl8'=>'esl8','ez40'=>'ez40','ez60'=>'ez60','ez70'=>'ez70','ezos'=>'ezos','ezze'=>'ezze','elai'=>'elai','emul'=>'emul','eric'=>'eric','ezwa'=>'ezwa','fake'=>'fake','fly-'=>'fly-','fly_'=>'fly_','g-mo'=>'g-mo','g1 u'=>'g1 u','g560'=>'g560','gf-5'=>'gf-5','grun'=>'grun','gene'=>'gene','go.w'=>'go.w','good'=>'good','grad'=>'grad','hcit'=>'hcit','hd-m'=>'hd-m','hd-p'=>'hd-p','hd-t'=>'hd-t','hei-'=>'hei-','hp i'=>'hp i','hpip'=>'hpip','hs-c'=>'hs-c','htc '=>'htc ','htc-'=>'htc-','htca'=>'htca','htcg'=>'htcg','htcp'=>'htcp','htcs'=>'htcs','htct'=>'htct','htc_'=>'htc_','haie'=>'haie','hita'=>'hita','huaw'=>'huaw','hutc'=>'hutc','i-20'=>'i-20','i-go'=>'i-go','i-ma'=>'i-ma','i230'=>'i230','iac'=>'iac','iac-'=>'iac-','iac/'=>'iac/','ig01'=>'ig01','im1k'=>'im1k','inno'=>'inno','iris'=>'iris','jata'=>'jata','java'=>'java','kddi'=>'kddi','kgt'=>'kgt','kgt/'=>'kgt/','kpt '=>'kpt ','kwc-'=>'kwc-','klon'=>'klon','lexi'=>'lexi','lg g'=>'lg g','lg-a'=>'lg-a','lg-b'=>'lg-b','lg-c'=>'lg-c','lg-d'=>'lg-d','lg-f'=>'lg-f','lg-g'=>'lg-g','lg-k'=>'lg-k','lg-l'=>'lg-l','lg-m'=>'lg-m','lg-o'=>'lg-o','lg-p'=>'lg-p','lg-s'=>'lg-s','lg-t'=>'lg-t','lg-u'=>'lg-u','lg-w'=>'lg-w','lg/k'=>'lg/k','lg/l'=>'lg/l','lg/u'=>'lg/u','lg50'=>'lg50','lg54'=>'lg54','lge-'=>'lge-','lge/'=>'lge/','lynx'=>'lynx','leno'=>'leno','m1-w'=>'m1-w','m3ga'=>'m3ga','m50/'=>'m50/','maui'=>'maui','mc01'=>'mc01','mc21'=>'mc21','mcca'=>'mcca','medi'=>'medi','meri'=>'meri','mio8'=>'mio8','mioa'=>'mioa','mo01'=>'mo01','mo02'=>'mo02','mode'=>'mode','modo'=>'modo','mot '=>'mot ','mot-'=>'mot-','mt50'=>'mt50','mtp1'=>'mtp1','mtv '=>'mtv ','mate'=>'mate','maxo'=>'maxo','merc'=>'merc','mits'=>'mits','mobi'=>'mobi','motv'=>'motv','mozz'=>'mozz','n100'=>'n100','n101'=>'n101','n102'=>'n102','n202'=>'n202','n203'=>'n203','n300'=>'n300','n302'=>'n302','n500'=>'n500','n502'=>'n502','n505'=>'n505','n700'=>'n700','n701'=>'n701','n710'=>'n710','nec-'=>'nec-','nem-'=>'nem-','newg'=>'newg','neon'=>'neon','netf'=>'netf','noki'=>'noki','nzph'=>'nzph','o2 x'=>'o2 x','o2-x'=>'o2-x','opwv'=>'opwv','owg1'=>'owg1','opti'=>'opti','oran'=>'oran','p800'=>'p800','pand'=>'pand','pg-1'=>'pg-1','pg-2'=>'pg-2','pg-3'=>'pg-3','pg-6'=>'pg-6','pg-8'=>'pg-8','pg-c'=>'pg-c','pg13'=>'pg13','phil'=>'phil','pn-2'=>'pn-2','pt-g'=>'pt-g','palm'=>'palm','pana'=>'pana','pire'=>'pire','pock'=>'pock','pose'=>'pose','psio'=>'psio','qa-a'=>'qa-a','qc-2'=>'qc-2','qc-3'=>'qc-3','qc-5'=>'qc-5','qc-7'=>'qc-7','qc07'=>'qc07','qc12'=>'qc12','qc21'=>'qc21','qc32'=>'qc32','qc60'=>'qc60','qci-'=>'qci-','qwap'=>'qwap','qtek'=>'qtek','r380'=>'r380','r600'=>'r600','raks'=>'raks','rim9'=>'rim9','rove'=>'rove','s55/'=>'s55/','sage'=>'sage','sams'=>'sams','sc01'=>'sc01','sch-'=>'sch-','scp-'=>'scp-','sdk/'=>'sdk/','se47'=>'se47','sec-'=>'sec-','sec0'=>'sec0','sec1'=>'sec1','semc'=>'semc','sgh-'=>'sgh-','shar'=>'shar','sie-'=>'sie-','sk-0'=>'sk-0','sl45'=>'sl45','slid'=>'slid','smb3'=>'smb3','smt5'=>'smt5','sp01'=>'sp01','sph-'=>'sph-','spv '=>'spv ','spv-'=>'spv-','sy01'=>'sy01','samm'=>'samm','sany'=>'sany','sava'=>'sava','scoo'=>'scoo','send'=>'send','siem'=>'siem','smar'=>'smar','smit'=>'smit','soft'=>'soft','sony'=>'sony','t-mo'=>'t-mo','t218'=>'t218','t250'=>'t250','t600'=>'t600','t610'=>'t610','t618'=>'t618','tcl-'=>'tcl-','tdg-'=>'tdg-','telm'=>'telm','tim-'=>'tim-','ts70'=>'ts70','tsm-'=>'tsm-','tsm3'=>'tsm3','tsm5'=>'tsm5','tx-9'=>'tx-9','tagt'=>'tagt','talk'=>'talk','teli'=>'teli','topl'=>'topl','hiba'=>'hiba','up.b'=>'up.b','upg1'=>'upg1','utst'=>'utst','v400'=>'v400','v750'=>'v750','veri'=>'veri','vk-v'=>'vk-v','vk40'=>'vk40','vk50'=>'vk50','vk52'=>'vk52','vk53'=>'vk53','vm40'=>'vm40','vx98'=>'vx98','virg'=>'virg','vite'=>'vite','voda'=>'voda','vulc'=>'vulc','w3c '=>'w3c ','w3c-'=>'w3c-','wapj'=>'wapj','wapp'=>'wapp','wapu'=>'wapu','wapm'=>'wapm','wig '=>'wig ','wapi'=>'wapi','wapr'=>'wapr','wapv'=>'wapv','wapy'=>'wapy','wapa'=>'wapa','waps'=>'waps','wapt'=>'wapt','winc'=>'winc','winw'=>'winw','wonu'=>'wonu','x700'=>'x700','xda2'=>'xda2','xdag'=>'xdag','yas-'=>'yas-','your'=>'your','zte-'=>'zte-','zeto'=>'zeto','acs-'=>'acs-','alav'=>'alav','alca'=>'alca','amoi'=>'amoi','aste'=>'aste','audi'=>'audi','avan'=>'avan','benq'=>'benq','bird'=>'bird','blac'=>'blac','blaz'=>'blaz','brew'=>'brew','brvw'=>'brvw','bumb'=>'bumb','ccwa'=>'ccwa','cell'=>'cell','cldc'=>'cldc','cmd-'=>'cmd-','dang'=>'dang','doco'=>'doco','eml2'=>'eml2','eric'=>'eric','fetc'=>'fetc','hipt'=>'hipt','http'=>'http','ibro'=>'ibro','idea'=>'idea','ikom'=>'ikom','inno'=>'inno','ipaq'=>'ipaq','jbro'=>'jbro','jemu'=>'jemu','java'=>'java','jigs'=>'jigs','kddi'=>'kddi','keji'=>'keji','kyoc'=>'kyoc','kyok'=>'kyok','leno'=>'leno','lg-c'=>'lg-c','lg-d'=>'lg-d','lg-g'=>'lg-g','lge-'=>'lge-','libw'=>'libw','m-cr'=>'m-cr','maui'=>'maui','maxo'=>'maxo','midp'=>'midp','mits'=>'mits','mmef'=>'mmef','mobi'=>'mobi','mot-'=>'mot-','moto'=>'moto','mwbp'=>'mwbp','mywa'=>'mywa','nec-'=>'nec-','newt'=>'newt','nok6'=>'nok6','noki'=>'noki','o2im'=>'o2im','opwv'=>'opwv','palm'=>'palm','pana'=>'pana','pant'=>'pant','pdxg'=>'pdxg','phil'=>'phil','play'=>'play','pluc'=>'pluc','port'=>'port','prox'=>'prox','qtek'=>'qtek','qwap'=>'qwap','rozo'=>'rozo','sage'=>'sage','sama'=>'sama','sams'=>'sams','sany'=>'sany','sch-'=>'sch-','sec-'=>'sec-','send'=>'send','seri'=>'seri','sgh-'=>'sgh-','shar'=>'shar','sie-'=>'sie-','siem'=>'siem','smal'=>'smal','smar'=>'smar','sony'=>'sony','sph-'=>'sph-','symb'=>'symb','t-mo'=>'t-mo','teli'=>'teli','tim-'=>'tim-','tosh'=>'tosh','treo'=>'treo','tsm-'=>'tsm-','upg1'=>'upg1','upsi'=>'upsi','vk-v'=>'vk-v','voda'=>'voda','vx52'=>'vx52','vx53'=>'vx53','vx60'=>'vx60','vx61'=>'vx61','vx70'=>'vx70','vx80'=>'vx80','vx81'=>'vx81','vx83'=>'vx83','vx85'=>'vx85','wap-'=>'wap-','wapa'=>'wapa','wapi'=>'wapi','wapp'=>'wapp','wapr'=>'wapr','webc'=>'webc','whit'=>'whit','winw'=>'winw','wmlb'=>'wmlb','xda-'=>'xda-',))); // check against a list of trimmed user agents to see if we find a match
		  $amtsp_mobile_browser 	= get_option('other_theme'); // set mobile browser to true
		  $amtsp_mobile_homepage 	= get_option('other_homepage');
		  $amtsp_status = 'Mobile matched on in_array';
		break; // break even though it's the last statement in the switch so there's nothing to break away from but it seems better to include it than exclude it
		
	} // ends the switch
	
	$return['amtsp_mobile_browser']		= $amtsp_mobile_browser;
	$return['amtsp_mobile_homepage']	= $amtsp_mobile_homepage;
	$return['amtsp_status']				= $amtsp_status;
	return $return;
} // END OF MOBILE CHECK FUNCTION

include('plugin_interface.php'); 
?><?php //BEGIN::SELF_HOSTED_PLUGIN_MOD
					
	/**********************************************
	* The following was added by Self Hosted Plugin
	* to enable automatic updates
	* See http://wordpress.org/extend/plugins/self-hosted-plugins
	**********************************************/
	require "__plugin-updates/plugin-update-checker.class.php";
	$__UpdateChecker = new PluginUpdateChecker('http://dnesscarkey.com/any-mobile-theme-switcher-pro/extend/plugins/any-mobile-theme-switcher-pro/update', __FILE__,'any-mobile-theme-switcher-pro');			
	
//END::SELF_HOSTED_PLUGIN_MOD ?>
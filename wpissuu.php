<?php

/*
Plugin Name: WP Issuu Viewer
Description: Connect to Issuu.com via your wordpress site
Author: Joacim Niden	
Version: 3.0
*/

/*  Copyright 2011  Joacim Niden  (email : jocke@nidenart.se)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
	I am not a distributor of Issuu.com and this plugin is not submitted by issuu.com.
*/

add_action('admin_menu', 'wp_issuu_create_menu');

function wp_issuu_create_menu() {

	//Creates a link on the settings menu
	add_options_page('WP Issuu Settings', 'WP Issuu Viewer', 'manage_options', 'wpissuusettings','wp_issuu_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_wp_issuu_settings' );
}



//The admin interface
function wp_issuu_settings_page() {
echo '
<div id="poststuff" class="wrap-issuu">
	<h2>Wordpress Issuu Viewer</h2>
	<div id="wrap-issuu" class="postbox">
		<h3 class="hndle"><span>Settings</span></h3>
			<div class="inside" style="height: 480px;">
				<form method="post" action="options.php" style="float: left;">';
				   settings_fields( 'wp-issuu-settings-group' );
				   echo '
					<table class="form-table">
						<tr valign="top">
							<th scope="row">Username</th>
							<td><input style="width: 200px;" type="text" name="wp_issuu_user" value="' . get_option('wp_issuu_user') . '" /></td>
						</tr>
						
						<tr valign="top">
							<th scope="row">API Key</th>
							<td><input style="width: 280px;" type="text" name="wp_issuu_api_key" value="' . get_option('wp_issuu_api_key') . '" /></td>
						</tr>
						 
						<tr valign="top">
							<th scope="row">API Signature</th>
							<td><input style="width: 280px;" type="text" name="wp_issuu_api_sign" value="' . get_option('wp_issuu_api_sign') . '" /></td>
						</tr>
						
						<tr valign="top">
								<th scope="row">Height</th>
								<td><input style="width: 200px;" type="text" name="wp_issuu_height" value="' . get_option('wp_issuu_height') . '" /></td>
						</tr>
						
						<tr valign="top">
							<th scope="row">Width</th>
							<td><input style="width: 200px;" type="text" name="wp_issuu_width" value="' . get_option('wp_issuu_width') . '" /></td>
						</tr>
						<tr valign="top">
							<th scope="row">Version of viewer</th>
							<td><select name="wp_issuu_version" value="' . get_option('wp_issuu_version') . '"><option ';
							if(get_option('wp_issuu_version')=='old') {echo 'selected="selected"';} 
							echo 'value="old">Old</option><option '; 
							if(get_option('wp_issuu_version')=='new'){echo 'selected="selected"';}
							echo 'value="new">New</option></select></td>
						</tr>
						<tr valign="top">
							<th scope="row">Fullscreen in same window</th>
							<td><select name="wp_issuu_fs" value="' . get_option('wp_issuu_fs') . '"><option ';
							if(get_option('wp_issuu_fs')=='true') {echo 'selected="selected"';} 
							echo 'value="true">True</option><option '; 
							if(get_option('wp_issuu_fs')=='false'){echo 'selected="selected"';}
							echo 'value="false">False</option></select></td>
						</tr>
						<tr valign="top">
							<th scope="row">Show flipbuttons (only for old version)</th>
							<td><select name="wp_issuu_flipbtn" value="' . get_option('wp_issuu_flipbtn') . '"><option ';
							if(get_option('wp_issuu_flipbtn')=='true') {echo 'selected="selected"';} 
							echo 'value="true">True</option><option '; 
							if(get_option('wp_issuu_flipbtn')=='false'){echo 'selected="selected"';}
							echo 'value="false">False</option></select></td>
						</tr>
						<tr valign="top">
							<th scope="row">Layout</th>
							<td><select name="wp_issuu_layout" value="' . get_option('wp_issuu_layout') . '"><option ';
							if(get_option('wp_issuu_layout')=='2') {echo 'selected="selected"';} 
							echo 'value="2">2 page</option><option '; 
							if(get_option('wp_issuu_layout')=='viewMode=singlePage&'){echo 'selected="selected"';}
							echo 'value="viewMode=singlePage&amp;">Single page</option></select></td>
						</tr>
						
						<!--<tr valign="top">
							<th scope="row">Document types</th>
							<td>
							<input type="checkbox" checked="checked" name="wp_issuu_documenttype" value="' . get_option('wp_issuu_pdf') . '" /> PDF<br />
							 <input type="checkbox" name="wp_issuu_documenttype" value="' . get_option('wp_issuu_odt') . '" /> ODT<br />
							 <input type="checkbox" name="wp_issuu_documenttype" value="' . get_option('wp_issuu_doc') . '" /> DOC<br />
							 <input type="checkbox" name="wp_issuu_documenttype" value="' . get_option('wp_issuu_wpd') . '" /> WPD<br />
							 <input type="checkbox" name="wp_issuu_documenttype" value="' . get_option('wp_issuu_sxw') . '" /> SXW<br />
							 <input type="checkbox" name="wp_issuu_documenttype" value="' . get_option('wp_issuu_sxi') . '" /> SXI<br />
							 <input type="checkbox" name="wp_issuu_documenttype" value="' . get_option('wp_issuu_rtf') . '" /> RTF<br />
							 <input type="checkbox" name="wp_issuu_documenttype" value="' . get_option('wp_issuu_odp') . '" /> ODP<br />
							 <input type="checkbox" name="wp_issuu_documenttype" value="' . get_option('wp_issuu_ppt') . '" /> PPT
							 </td>
						</tr>-->
						
						<tr valign="top">
							<th scope="row">Background color <br /> (write color like this: FFFFFF. NOT #FFFFFF)</th>
							<td><input style="width: 200px;" type="text" name="wp_issuu_bgcolor" value="'.get_option('wp_issuu_bgcolor').'" /></td>
						</tr>
					</table>
					
					<p class="submit">
						<input type="submit" class="button-primary" value="Save Changes" />
					</p>
				</form>
			</div>
				<table style="float: left;">
					<tr>
						<td>
						To use this plugin, you need an API-key and a API-signature which you can get here: <a target="_blank" href="http://issuu.com/services/api/">http://issuu.com/services/api/</a>
						</td>
					</tr>		
				</table>
			
		</div>
</div>
';
}


function register_wp_issuu_settings() {
	//register our settings
	register_setting( 'wp-issuu-settings-group', 'wp_issuu_user' );
	register_setting( 'wp-issuu-settings-group', 'wp_issuu_api_key' );
	register_setting( 'wp-issuu-settings-group', 'wp_issuu_api_sign' );
	register_setting( 'wp-issuu-settings-group', 'wp_issuu_height' );
	register_setting( 'wp-issuu-settings-group', 'wp_issuu_width' );
	register_setting( 'wp-issuu-settings-group', 'wp_issuu_bgcolor' );
	register_setting( 'wp-issuu-settings-group', 'wp_issuu_fs' );
	register_setting('wp-issuu-settings-group', 'wp_issuu_flipbtn');
	register_setting('wp-issuu-settings-group', 'wp_issuu_layout');
	register_setting('wp-issuu-settings-group', 'wp_issuu_version');
	// register_setting( 'wp-issuu-settings-group', 'wp_issuu_documenttype' );
}
//This is the function you put in your template files
function issuu_viewer(){
	
	//The options
	$user 		= get_option('wp_issuu_user');
	$apikey 	= get_option('wp_issuu_api_key');
	$apisign 	= get_option('wp_issuu_api_sign');
	$height 	= get_option('wp_issuu_height');
	$width 		= get_option('wp_issuu_width');
	$bgcolor 	= get_option('wp_issuu_bgcolor');
	$pdf		= get_option('wp_issuu_pdf');
	$odt		= get_option('wp_issuu_odt');
	$doc		= get_option('wp_issuu_doc');
	$wpd		= get_option('wp_issuu_wpd');
	$sxw		= get_option('wp_issuu_sxw');
	$sxi		= get_option('wp_issuu_sxi');
	$rtf		= get_option('wp_issuu_rtf');
	$odp		= get_option('wp_issuu_odp');
	$ppt		= get_option('wp_issuu_ppt');
	$doctypes	= $pdf . $odt .  $doc . $wpd . $sxw. $sxi . $rtf .  $odp . $ppt;
	$fullscreen = get_option('wp_issuu_fs');
	$flipbtn 	= get_option('wp_issuu_flipbtn');
	$layout 	= get_option('wp_issuu_layout');
	$version 	= get_option('wp_issuu_version');
	
	// This connects you to your account
	// DON'T TOUCH THIS ONE
	$signature = md5($apisign . 'actionissuu.documents.listapiKey' . $apikey . 'documentStatesAformatxmlorgDocTypespdfpageSize10startIndex0');
	$xmlapi = 'http://api.issuu.com/1_0?action=issuu.documents.list&apiKey='. $apikey. '&startIndex=0&pageSize=10&documentStates=A&format=xml&orgDocTypes=pdf&signature='. $signature;
	//BELOW HERE YOU CAN MODIFY
	
	$xml = simplexml_load_file($xmlapi);
	//Loop the xml
	foreach($xml->result->children() as $first){
		foreach($first->attributes() as $a => $result){
			//Verify that it is only the right xml string
			if($a == 'documentId'){
				if($version == 'old'){
				$layout = str_replace('viewMode=singlePage&','viewMode=presentation&', $layout);
					echo '<div class="issuu-viewer">
					<object style="width:'.$width.';height:'.$height.';" >
						<param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v1/IssuuViewer.swf
	?mode=embed&amp;layout=http%3A%2F%2Fskin.issuu.com%2Fv%2Fcolor%2Flayout.xml&amp;backgroundColor='.$bgcolor.'&amp;'.$layout.'showFlipBtn='.$flipbtn.'&amp;documentId='.$result.'&amp;username='.$user . '" />
						<param name="allowfullscreen" value="'.$fullscreen.'"/>
						<param name="menu" value="false"/>
						<embed src="http://static.issuu.com/webembed/viewers/style1/v1/IssuuViewer.swf" type="application/x-shockwave-flash" allowfullscreen="'.$fullscreen.'" menu="false" style="width:'.$width.';height:'.$height.'" flashvars="mode=embed&amp;layout=http%3A%2F%2Fskin.issuu.com%2Fv%2Fcolor%2Flayout.xml&amp;'.$layout.'backgroundColor='.$bgcolor.'&amp;showFlipBtn='.$flipbtn.'&amp;documentId='.$result.'&amp;username='.$user.'" />
					</object>
					</div>';
				}elseif($version == 'new'){
				$layout = str_replace('2','', $layout);
					echo '
						<div class="issuu-viewer" id="'.$result.'"><object style="width:'.$width.';height:'.$height.';">
						<param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;embedBackground=%23'.$bgcolor.'&amp;'.$layout.'titleBarEnabled=true&amp;documentId='.$result.'" />
						<param name="allowfullscreen" value="'.$fullscreen.'"/>
						<param name="false" value="false"/><param name="wmode" value="transparent"/>
						<embed src="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf" type="application/x-shockwave-flash" allowfullscreen="'.$fullscreen.'" menu="false" wmode="transparent" style="width:'.$width.';height:'.$height.'" flashvars="mode=mini&amp;embedBackground=%23'.$bgcolor.'&amp;'.$layout.'titleBarEnabled=true&amp;documentId='.$result.'" />
						</object></div><!--[if IE]><script>document.getElementById("'.$result.'").type = "application/x-shockwave-flash";</script><![endif]-->';
				}
			}
		}
	}	
	return;
}
	


?>

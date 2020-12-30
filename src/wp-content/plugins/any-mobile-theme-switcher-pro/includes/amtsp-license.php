<?php
global $license_message;
global $amtsp_license_key_status;
global $amtsp_license_key_valid_till;

if (!empty($license_message)){
	echo '<div class="updated" id="message"><p>'.$license_message.'</p></div>';
}
?>
<form action="options-general.php?page=any-mobile-theme-switcher-pro/plugin_interface.php" method="post" >

<table class="wp-list-table widefat fixed bookmarks">
                <thead>
                    <tr>
                        <th>License Key</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                    	<table class="amtsp_form" width="100%">
                       	<tbody>
                        	<tr>
                            	<td width="200">Status</td>
                                <td><?php echo ucfirst(str_replace('_',' ', $amtsp_license_key_status)); ?></td>
                            </tr>
                            
							<?php if ($amtsp_license_key_status != 'activated'): ?>
                            <tr>
                            	<td>License Key</td>
                                <td><input type="text" maxlength="40" style="width:300px;" name="amtsp_license_key" /><input name="amtsp_license_submit" class="button-primary" type="submit" value="Activate" /></td>
                            </tr>
                            <?php endif; ?>
                         </tbody>
                         </table> 	                 	
                   	</td>
                    
                </tr>
                </tbody>
            </table>
</form>
            <br/>
            
            
<form method="post" action="options.php">
	<?php settings_fields( 'amp-settings-group' ); ?>
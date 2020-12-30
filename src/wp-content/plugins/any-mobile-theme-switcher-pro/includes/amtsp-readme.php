</form>
<table class="wp-list-table widefat fixed bookmarks">
    <thead>
        <tr>
            <th>Read Me Please</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>
        <h3>W3 Total Cache Setup</h3>        
        <a href="http://dnesscarkey.com/any-mobile-theme-switcher-pro/w3-total-cache-setup" target="_blank">Click here to setup W3 Total Cache to work with Any Mobile Theme Switcher Pro</a>
        <p>
        <p>&nbsp;</p>
        
        <h3>QR Code Shortcode</h3>
        Use the shortcode <strong>[amtsp_qr_code size="100"]</strong> in widgets. You can change Qr Code size as per your requirement from size attribute.<br/>    
        You can also use this shortcode in template file. Example: <strong>&lt;?php echo do_shortcode('[amtsp_qr_code size="100"]'); ?&gt;</strong>
        
        <p>&nbsp;</p>
        
        <h3>Phone number click to call</h3>
        Just wrap your phone number with <strong>&lt;span class=&quot;mobile_tel&quot;&gt;<em>123 456 789</em>&lt;/span&gt;</strong>. It will be automatically converted to Click to Call for mobile devices.
        
        <p>&nbsp;</p>
        
        <h3>Force Switch Theme Link</h3>        
        Use the shortcode <strong>[show_theme_switch_link]</strong> in templates to show the theme switch link.    
        <br/>Example: <strong>&lt;?php echo do_shortcode('[show_theme_switch_link]'); ?&gt;</strong>
        <br/><br/>
        You can also add Switch Mobile Theme link to your Menus from Custom Links section under Appearance > Menus.<br />
        Example:<br />
        Url : <strong><?php bloginfo('url'); ?>/?<?php echo $amts_force_param; ?>=desktop</strong> (For Mobile Theme)<br/>
        Url : <strong><?php bloginfo('url'); ?>/?<?php echo $amts_force_param; ?>=mobile</strong>  (For Desktop Theme)<br/>
        Label :  As you wish :)    
        </p>
        <p>&nbsp;</p>
</td></tr></tbody></table>
<?php
/**
 * Generate options page
 */

    if (!current_user_can('manage_options')) {
      wp_die( _e('You do not have sufficient permissions to access this page.', 'animated-login') );
    }

    // See if the user has posted us some information
    if( isset($_POST['greenrope_analytics_save']) ){

    	check_admin_referer( 'likewow_block_referer_save_form', 'likewow_block_referer_name_of_nonce' );
 		 
 		$likewow_block_referers_settings = get_option('likewow_block_referers_settings');

 		//enable plugin option
		//$greenrope_analytics_settings['enable_plugin'] = $_POST['enable_plugin'] ? true : false;
 		//$bad = implode(',', explode( '', htmlspecialchars($_POST['bad_referers']) ) );

		//bad referer option
		$likewow_block_referers_settings['bad_referers'] = htmlspecialchars($_POST['bad_referers']);
				
		update_option('likewow_block_referers_settings', $likewow_block_referers_settings);

		$str = '<div id="message" class="updated fade"><p>'. __('Options saved successfully.', '_analytics') .'</p></div>';

		echo $str;
    	
	}
	
?>
<div class="wrap">
	<h2>Block Referers - settings</h2>
	<div id="page-wrap">
		<div id="inside">
		    <div id="options-div">

				<?php $likewow_block_referers_settings = get_option('likewow_block_referers_settings'); ?>
				
				<form method="post" id="addanalytic_options" name="addanalytic_options" onsubmit="return checkForm()">
					<?php wp_nonce_field( 'likewow_block_referer_save_form', 'likewow_block_referer_name_of_nonce' ); ?>		  
					<fieldset class="options">
						
						<table class="form-table">
							<tr>
							<th scope="row">Bad Referers</th>
								<td>
									<fieldset><legend class="screen-reader-text"><span>Comment Blacklist</span></legend>
									<p>
										<label for="bad_referers">When a visitor (man or machine) comes to your site from any of these URLs they will be blocked. One URL per line.</label>
									</p>
									<p>
										<textarea name="bad_referers" rows="10" cols="50" id="bad_referers" class="large-text code"><?php echo esc_textarea($likewow_block_referers_settings['bad_referers']); ?></textarea>
									</p>
								</td>
							</tr>
						</table>
					</fieldset>
					<p>
					  <input type="submit" name="greenrope_analytics_save" id="greenrope_analytics_save" class="button button-primary" value="Save Settings"  />
					</p>
		    	</form>
			</div><!-- end options div -->
		</div><!-- end inside -->
	<div style="clear: both;"></div>
	</div><!-- end pagewrap -->
</div><!-- end wrap -->
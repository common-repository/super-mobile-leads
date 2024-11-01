<?php
function supermobleads_options_page(){
	/* Assign Variables */
	$supermobleads_phone = get_option('supermobleads_phone_store', '0');
	$supermobleads_phone_value = get_option('supermobleads_phone_value_store', '');
	$supermobleads_whatsapp = get_option('supermobleads_whatsapp_store', '0');
	$supermobleads_whatsapp_value = get_option('supermobleads_whatsapp_value_store', '');
	$supermobleads_desktop = get_option('supermobleads_desktop_store', '0');
	$supermobleads_type = get_option('supermobleads_type_store', '0');
	$supermobleads_whatsapp_phone = get_option('supermobleads_whatsapp_phone_store','');
	$supermobleads_messenger = get_option('supermobleads_phone_store', '0');
	$supermobleads_messenger_value = get_option('supermobleads_messenger_value_store', '');
	?>

	<div class="wrap">
		<h1>Call To Action - Lead Generation Plugin Settings</h1>
		<br>
		<form method="POST">
			<div class="supermobleads_formwrap">
				<div class="supermobleads_grid_item_one">
					<h3>Social Links</h3>
					<div class="supermobleads_group">
						<span class="cta_label">Enable Phone?&nbsp; &nbsp;</span>
						<label class="switch">
							<input type="checkbox" name="supermobleads_phone" value="1" <?php if($supermobleads_phone==1){ echo 'checked="checked"'; } ?>>
							<span class="slider round"></span>
						</label>
						<br>
						<label class="cta_label cta_minor_heightadjust">Phone:
							<br><input type="text" name="supermobleads_phone_value" value="<?php echo $supermobleads_phone_value; ?>">
						</label>
					</div>
					<div class="supermobleads_group">
						<span class="cta_label">Enable Messenger?&nbsp; &nbsp;</span>
						<label class="switch">
							<input type="checkbox" name="supermobleads_messenger" value="1" <?php if($supermobleads_messenger==1){ echo 'checked="checked"'; } ?>>
							<span class="slider round"></span>
						</label>
						<br>
						<label class="cta_label cta_minor_heightadjust">Facebook Messenger Username:
							<br><input type="text" name="supermobleads_messenger_value" value="<?php echo $supermobleads_messenger_value; ?>">
						</label>
					</div>
					<div class="supermobleads_group">
						<span class="cta_label">Enable WhatsApp?&nbsp; &nbsp;</span>
						<br>
						<label class="switch">
							<input type="checkbox" name="supermobleads_whatsapp" value="1" <?php if($supermobleads_whatsapp==1){ echo 'checked="checked"'; } ?>>
							<span class="slider round"></span>
						</label>
						<br>
						<label class="cta_label cta_minor_heightadjust">WhatsApp:</label>
						<br><input type="text" name="supermobleads_whatsapp_phone" value="<?php echo $supermobleads_whatsapp_phone; ?>" placeholder="Whatsapp Phone Number">
						<br><br>
						<label class="cta_label cta_minor_heightadjust">Message:
							<br><input type="text" name="supermobleads_whatsapp_value" value="<?php echo $supermobleads_whatsapp_value; ?>" placeholder="Message that should appear in whatsapp text area.">
						</label>
						</div>
				</div>
				<div class="supermobleads_grid_item_two">
					<h3>Settings</h3>

					<div class="supermobleads_group">
						<span class="cta_label">Enable In Desktop?</span>
						<label class="switch">
							<input type="checkbox" name="supermobleads_desktop" value="1" <?php if($supermobleads_desktop==1){ echo 'checked="checked"'; } ?>>
							<span class="slider round"></span>
						</label>
					</div>

					<div class="supermobleads_group">
						<span class="cta_label">Display Type?</span>
						<br><br>
						Box
						<label class="switch">
							<input type="checkbox" name="supermobleads_type" value="1" <?php if($supermobleads_type==1){ echo 'checked="checked"'; } ?>>
							<span class="slider round"></span>
						</label>
						Floating Circle
					</div>

				</div>
			</div>
			<?php wp_nonce_field( 'supermobleads_action', 'supermobleads_nonce' ); ?>
			<div class="supermobleads_group">
				<input type="submit" name="supermobleads_submit" class="button button-primary button-large" value="Save">
			</div>


		</form>
	</div>

	<div class="wrap">
		<h1>Help</h1>
		<br>
		<div class="supermobleads_formwrap">
			<div class="supermobleads_grid_item_one">
				<p>Whatsapp Number is a full phone number in international format. Omit any zeroes, brackets, or dashes when adding the phone number in international format<br>Examples:<br>Use: 1XXXXXXXXXX<br>Don't use: http+001-(XXX)XXXXXXX</p>
			</div>
			<div class="supermobleads_grid_item_two">
				<p>This is how you can find your facebook url.</p>
				<img src="<?php echo plugins_url().'/super-mobile-leads/images/messenger-help.jpeg'; ?>">	
			</div>
		</div>	
	</div>
	
<?php

if (!current_user_can( 'manage_options' )) {
	wp_die('Unaurthorized User!');
}

if (isset($_POST['supermobleads_submit'])){
	if (!check_admin_referer('supermobleads_action','supermobleads_nonce')) {
		print 'Sorry, Your Nounce Didnt Verify';
		exit;
	}

	if (!isset($_POST['supermobleads_nonce']) || !wp_verify_nonce( $_POST['supermobleads_nonce'], 'supermobleads_action' )) {
		print 'Sorry Your Nounce Did not verify';
		exit;
	}

	if (isset($_POST['supermobleads_messenger'])) {
		$supermobleads_messenger_sanitize = filter_var($_POST['supermobleads_messenger'], FILTER_SANITIZE_NUMBER_INT);
		if (strlen($supermobleads_messenger_sanitize)>3) {
			$supermobleads_messenger_sanitize = substr($supermobleads_messenger_sanitize, 0,2);
		}
		update_option( 'supermobleads_messenger_store', $supermobleads_phone_sanitize );
	}
	else{
		update_option( 'supermobleads_messenger_store', '' );
	}

	$supermobleads_messenger_value_sanitize = sanitize_text_field($_POST['supermobleads_messenger_value']);
	update_option( 'supermobleads_messenger_value_store', $supermobleads_messenger_value_sanitize );

	if (isset($_POST['supermobleads_phone'])) {
		$supermobleads_phone_sanitize = filter_var($_POST['supermobleads_phone'], FILTER_SANITIZE_NUMBER_INT);
		if (strlen($supermobleads_phone_sanitize)>3) {
			$supermobleads_phone_sanitize = substr($supermobleads_phone_sanitize, 0,2);
		}
		update_option( 'supermobleads_phone_store', $supermobleads_phone_sanitize );
	}
	else{
		update_option( 'supermobleads_phone_store', '' );
	}

	$supermobleads_phone_value_sanitize = sanitize_text_field($_POST['supermobleads_phone_value']);
	update_option( 'supermobleads_phone_value_store', $supermobleads_phone_value_sanitize );

	if (isset($_POST['supermobleads_whatsapp'])) {
		$supermobleads_whatsapp_sanitize = filter_var($_POST['supermobleads_whatsapp'], FILTER_SANITIZE_NUMBER_INT);
		if (strlen($supermobleads_whatsapp_sanitize)>3) {
			$supermobleads_whatsapp_sanitize = substr($supermobleads_whatsapp_sanitize, 0,2);
		}
		update_option( 'supermobleads_whatsapp_store', $supermobleads_whatsapp_sanitize);
	}
	else{
		update_option( 'supermobleads_whatsapp_store', '0' );
	}

	$supermobleads_whatsapp_phone_value_sanitize = sanitize_text_field($_POST['supermobleads_whatsapp_phone']);
	update_option( 'supermobleads_whatsapp_phone_store', $supermobleads_whatsapp_phone_value_sanitize );

	$supermobleads_whatsapp_value_sanitize = sanitize_text_field($_POST['supermobleads_whatsapp_value']);
	update_option( 'supermobleads_whatsapp_value_store', $supermobleads_whatsapp_value_sanitize );


	if (isset($_POST['supermobleads_desktop'])) {
		$supermobleads_desktop_sanitize = filter_var($_POST['supermobleads_desktop'],FILTER_SANITIZE_NUMBER_INT);
		if (strlen($supermobleads_desktop_sanitize)>3) {
			$supermobleads_desktop_sanitize = substr($supermobleads_desktop_sanitize, 0,2);
		}
		update_option( 'supermobleads_desktop_store', $supermobleads_desktop_sanitize );
	}
	else{
		update_option( 'supermobleads_desktop_store', '0' );
	}

	if (isset($_POST['supermobleads_type'])) {
		$supermobleads_type_sanitize = filter_var($_POST['supermobleads_type'],FILTER_SANITIZE_NUMBER_INT);
		if (strlen($supermobleads_type_sanitize)>3) {
			$supermobleads_type_sanitize = substr($supermobleads_type_sanitize, 0,2);
		}
		update_option( 'supermobleads_type_store', $supermobleads_type_sanitize );
	}
	else{
		update_option( 'supermobleads_type_store', '0' );
	}
	
	$status = true;
	header("location: " . $_SERVER['REQUEST_URI']);
}

if(isset($status) && $status==true){
	echo '<div class="notice notice-success is-dismissible"><p>Changes has been saved. Please refresh.</p></div>';
}
else if(isset($status) && $status == false) {
	echo '<div class="notice notice-error is-dismissible"><p>Changes not saved. Please refresh.</p></div>';
}

$supermobleads_phone = get_option('supermobleads_phone_store', '0');
$supermobleads_phone_value = get_option('supermobleads_phone_value_store', '');
$supermobleads_whatsapp = get_option('supermobleads_whatsapp_store', '0');
$supermobleads_whatsapp_value = get_option('supermobleads_whatsapp_value_store', '');
$supermobleads_desktop = get_option('supermobleads_desktop_store', '0');
$supermobleads_type = get_option('supermobleads_type_store', '0');
$supermobleads_whatsapp_phone = get_option('supermobleads_whatsapp_phone_store','');
$supermobleads_messenger = get_option('supermobleads_phone_store', '0');
$supermobleads_messenger_value = get_option('supermobleads_messenger_value_store', '');
}?>
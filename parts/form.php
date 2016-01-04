<?php

// SERVER SIDE VALIDATION-------------------------------------------------

$base_browser_is_ie = base_browser_is_ie();
$base_form_errors = false;
$base_form_sent = false;

if (!empty($_REQUEST['submit'])) {
	$form_subject = sanitize_text_field($_REQUEST['form_subject']);
	$form_name = sanitize_text_field($_REQUEST['form_name']);
	$form_email = sanitize_text_field($_REQUEST['form_email']);
	$form_country = sanitize_text_field($_REQUEST['form_country']);
	$form_phone = sanitize_text_field($_REQUEST['form_phone']);
	$form_message = sanitize_text_field($_REQUEST['form_message']);
	if (!empty($form_subject) && !empty($form_name) && !empty($form_email) && !empty($form_country) && !empty($form_phone) && !empty($form_message)) {
		$base_form_sent = wp_mail(
			get_option('admin_email'),
			sprintf(__('Website Form Submission : %s', 'form'), $form_subject),
			base_form_build_message($form_name, $form_email, $form_country, $form_phone, $form_message),
			base_form_build_headers($form_name, $form_email)
		);
	} else {
		$base_form_errors = true;
	}
}

// -----------------------------------------------------------------------

if ($base_form_sent) { ?>
	<div class="base_form_sent">
		<h4><?php echo __('Your message has been sent.', 'form'); ?></h4>
	</div>
<?php } else { ?>
	<?php if ($base_form_errors) { ?>
		<div class="base_form_errors">
			<h4><?php echo __('Please make sure you\'ve filled the form correctly.', 'form'); ?></h4>
		</div>
	<?php } ?>
	<form id="form" name="form" action="<?php the_permalink(); ?>#base_form_anchor" method="post">
		<div class="row">
			<div class="columns small-12">
				<?php if($base_browser_is_ie) { ?>
					<label id="form_subject" for="form_subject"><?php echo __('Subject', 'form'); ?></label>
				<?php } ?>
				<input id="form_subject" name="form_subject" placeholder="<?php echo __('Subject', 'form'); ?>" type="text"/>
			</div>
		</div>
		<div class="row">
			<div class="columns small-12 medium-6">
				<?php if($base_browser_is_ie) { ?>
					<label id="form_name" for="form_name"><?php echo __('Name', 'form'); ?></label>
				<?php } ?>
				<input id="form_name" name="form_name" placeholder="<?php echo __('Name', 'form'); ?>" type="text"/>
			</div>
			<div class="columns small-12 medium-6">
				<?php if($base_browser_is_ie) { ?>
					<label id="form_email" for="form_email"><?php echo __('Email', 'form'); ?></label>
				<?php } ?>
				<input id="form_email" name="form_email" placeholder="<?php echo __('Email', 'form'); ?>" type="text"/>
			</div>
		</div>
		<div class="row">
			<div class="columns small-12 medium-6">
				<?php if($base_browser_is_ie) { ?>
					<label id="form_country" for="form_country"><?php echo __('Country', 'form'); ?></label>
				<?php } ?>
				<input id="form_country" name="form_country" placeholder="<?php echo __('Country', 'form'); ?>" type="text"/>
			</div>
			<div class="columns small-12 medium-6">
				<?php if($base_browser_is_ie) { ?>
					<label id="form_phone" for="form_phone"><?php echo __('Phone', 'form'); ?></label>
				<?php } ?>
				<input id="form_phone" name="form_phone" placeholder="<?php echo __('Phone', 'form'); ?>" type="text"/>
			</div>
		</div>
		<div class="row">
			<div class="columns small-12">
				<?php if($base_browser_is_ie) { ?>
					<label id="form_message" for="form_message"><?php echo __('Message', 'form'); ?></label>
				<?php } ?>
				<textarea id="form_message" placeholder="<?php echo __('Message', 'form'); ?>" name="form_message"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="columns small-12">
				<input name="submit" type="submit" value="<?php echo __('Send', 'form'); ?>"/>
			</div>
		</div>
	</form>
<?php } ?>
<?php

// SERVER SIDE VALIDATION ------------------------------------------------

$base_browser_is_ie = base_browser_is_ie();
$base_form_errors = false;
$base_form_sent = false;
$admin_email = get_option('admin_email');

if (!empty($_REQUEST['submit'])) {

	$base_form_first_name = sanitize_text_field($_REQUEST['base_form_first_name']);
	$base_form_last_name = sanitize_text_field($_REQUEST['base_form_last_name']);
	$base_form_email = sanitize_text_field($_REQUEST['base_form_email']);
	$base_form_phone = sanitize_text_field($_REQUEST['base_form_phone']);
	$base_form_subject = sanitize_text_field($_REQUEST['base_form_subject']);
	$base_form_message = sanitize_text_field($_REQUEST['base_form_message']);

	if (!empty($base_form_first_name) && !empty($base_form_last_name) && !empty($base_form_email) &&  !empty($base_form_phone) && !empty($base_form_subject) && !empty($base_form_message)) {
		$base_form_sent = wp_mail(
			$admin_email,
			sprintf(__('Website Form Submission : %s', 'form'), $base_form_subject),
			base_form_build_message($base_form_first_name, $base_form_last_name, $base_form_phone, $base_form_email, $base_form_message),
			base_form_build_headers($base_form_first_name, $base_form_last_name, $base_form_email, $admin_email)
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
	<form id="base_form" name="base_form" action="<?php the_permalink(); ?>#base_form_anchor" method="post">

		<div class="row">
			<div class="columns small-12">
				<?php if($base_browser_is_ie) { ?>
					<label id="base_form_first_name" for="base_form_first_name"><?php echo __('First Name*', 'form'); ?></label>
				<?php } ?>
				<input id="base_form_first_name" name="base_form_first_name" placeholder="<?php echo __('First Name*', 'form'); ?>" type="text"/>
			</div>
		</div>

		<div class="row">
			<div class="columns small-12">
				<?php if($base_browser_is_ie) { ?>
					<label id="base_form_last_name" for="base_form_last_name"><?php echo __('Last Name*', 'form'); ?></label>
				<?php } ?>
				<input id="base_form_last_name" name="base_form_last_name" placeholder="<?php echo __('Last Name*', 'form'); ?>" type="text"/>
			</div>
		</div>

		<div class="row">
			<div class="columns small-12">
				<?php if($base_browser_is_ie) { ?>
					<label id="base_form_email" for="base_form_email"><?php echo __('Email Address*', 'form'); ?></label>
				<?php } ?>
				<input id="base_form_email" name="base_form_email" placeholder="<?php echo __('Email Address*', 'form'); ?>" type="text"/>
			</div>
		</div>

		<div class="row">
			<div class="columns small-12">
				<?php if($base_browser_is_ie) { ?>
					<label id="base_form_phone" for="base_form_phone"><?php echo __('Phone', 'form'); ?></label>
				<?php } ?>
				<input id="base_form_phone" name="base_form_phone" placeholder="<?php echo __('Phone', 'form'); ?>" type="text"/>
			</div>
		</div>

		<div class="row">
			<div class="columns small-12">
				<?php if($base_browser_is_ie) { ?>
					<label id="base_form_subject" for="base_form_subject"><?php echo __('Subject*', 'form'); ?></label>
				<?php } ?>
				<input id="base_form_subject" name="base_form_subject" placeholder="<?php echo __('Subject*', 'form'); ?>" type="text"/>
			</div>
		</div>

		<div class="row">
			<div class="columns small-12">
				<?php if($base_browser_is_ie) { ?>
					<label id="base_form_message" for="base_form_message"><?php echo __('Your Message*', 'form'); ?></label>
				<?php } ?>
				<textarea id="base_form_message" placeholder="<?php echo __('Your Message*', 'form'); ?>" name="base_form_message"></textarea>
			</div>
		</div>

		<div class="row">
			<div class="columns small-12">
				<input name="submit" type="submit" value="<?php echo __('Send', 'form'); ?>"/>
			</div>
		</div>


	</form>
<?php } ?>
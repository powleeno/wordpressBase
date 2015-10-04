<?php


// SERVER SIDE VALIDATION-------------------------------------------------

function base_form_build_message($first_name, $last_name, $email, $phone, $enterprise, $message)
{
	$body = '<html>';
	$body .= '<table width="100%">';
	$body .= '<tr><td>' . apply_filters('the_content', $message) . '</td></tr>';
	$body .= '<tr><td>&nbsp;</td></tr>';
	$body .= '<tr><td><strong>' . $first_name . ' ' . $last_name . '</strong></td></tr>';
	$body .= '<tr><td><strong>' . $enterprise . '</strong></td></tr>';
	$body .= '<tr><td>' . $email . '</td></tr>';
	if ($phone) {
		$body .= '<tr><td>' . $phone . '</td></tr>';
	}
	$body .= '<tr><td><br/>&nbsp;</td></tr>';
	$body .= '</table>';
	$body .= '</html>';

	return $body;
}


function base_form_build_headers($first_name, $last_name, $email)
{
	$headers = 'From: ' . $first_name . ' ' . $last_name . ' <' . $email . '>' . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n";

	return $headers;
}


$form_errors = false;
$sent_mail = false;

if ($_REQUEST['submit']) {
	$first_name = sanitize_text_field($_REQUEST['first_name']);
	$last_name = sanitize_text_field($_REQUEST['last_name']);
	$email = sanitize_text_field($_REQUEST['email']);
	$phone = sanitize_text_field($_REQUEST['phone']);
	$enterprise = sanitize_text_field($_REQUEST['enterprise']);
	$subject = sanitize_text_field($_REQUEST['subject']);
	$message = sanitize_text_field($_REQUEST['message']);
	if ($first_name && $last_name && $email && $enterprise && $subject && $message) {
		$sent_mail = wp_mail(
			get_option('admin_email'),
			sprintf(__('Website Form Submission : %s', 'form'), $subject),
			base_form_build_message($first_name, $last_name, $email, $phone, $enterprise, $message),
			base_form_build_headers($first_name, $last_name, $email)
		);

	} else {
		$form_errors = true;
	}
}

// -----------------------------------------------------------------------


if ($sent_mail) { ?>
	<div class="base_form_sent">
		<h4><?php echo __('Your message has been sent.', 'form'); ?></h4>
	</div>
<?php } else { ?>
	<?php if ($form_errors) { ?>
		<div class="base_form_errors">
			<h4><?php echo __('Please make sure you\'ve filled the form correctly.', 'form'); ?></h4>
		</div>
	<?php } ?>
	<form id="form" name="form" action="<?php the_permalink(); ?>#base_form_anchor" method="post">
		<div class="row">
			<div class="columns small-12 medium-6">
				<p class="base_form_label"><?php echo __('Last Name *', 'form'); ?></p>
				<input id="last_name" name="last_name" type="text"/>
			</div>
			<div class="columns small-12 medium-6">
				<p class="base_form_label"><?php echo __('First Name *', 'form'); ?></p>
				<input id="first_name" name="first_name" type="text"/>
			</div>
		</div>
		<div class="row">
			<div class="columns small-12 medium-6">
				<p class="base_form_label"><?php echo __('Email *', 'form'); ?></p>
				<input id="email" name="email" type="text"/>
			</div>
			<div class="columns small-12 medium-6">
				<p class="base_form_label"><?php echo __('Phone', 'form'); ?></p>
				<input id="phone" name="phone" type="text"/>
			</div>
		</div>
		<div class="row">
			<div class="columns small-12 medium-6">
				<p class="base_form_label"><?php echo __('Enterprise *', 'form'); ?></p>
				<input id="enterprise" name="enterprise" type="text"/>
			</div>
			<div class="columns small-12 medium-6">
				<p class="base_form_label"><?php echo __('Subject *', 'form'); ?></p>
				<input id="subject" name="subject" type="text"/>
			</div>
		</div>
		<div class="row">
			<div class="columns small-12">
				<p class="base_form_label"><?php echo __('Message *', 'form'); ?></p>
				<textarea id="message" name="message"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="columns small-12">
				<p class="base_form_notice"><?php echo __('* required field', 'form'); ?></p>
				<input name="submit" type="submit" value="<?php echo __('Send', 'form'); ?>"/>
			</div>
		</div>
	</form>
<? }

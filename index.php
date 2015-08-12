<?php

$fields_prefix = base_fields_prefix();
global $post;

get_header();

?>

<section class="row">
    <div class="columns small-12">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php echo __( 'Your theme is up and running. Get developing!', 'welcome message' ); ?></p>
    </div>
</section>

<?php

get_footer();
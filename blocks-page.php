<?php
/* Template Name: Blocks */

get_header();

global $post;
$prefix = '_cmb_';


$banner_section_activation = get_post_meta($post->ID, $prefix.'banner_section_activation');
if( $banner_section_activation[0] == 'active' ){
	$banner_image = get_post_meta($post->ID, $prefix.'banner_image');
	$banner_text = get_post_meta($post->ID, $prefix.'banner_text');
	?>

	<section class="row banner section-margin">
		<div class="columns small-12 wrapper" style="background-image: url(<?php echo $banner_image[0]; ?>);">
			<div class="text-wrapper">
				<div class="text">
					<?php echo apply_filters('the_content', $banner_text[0]); ?>
				</div>
			</div>
		</div>
	</section>

	<?php
}


$blocks_section_activation = get_post_meta($post->ID, $prefix.'blocks_section_activation');
if( $blocks_section_activation[0] == 'active' ){
	$blocks_meta_array = get_post_meta($post->ID, $prefix.'blocks');
	foreach( $blocks_meta_array[0] as $block ){
		$block_layout = $block[$prefix.'block_layout'] ;
		$block_image = $block[$prefix.'block_image'] ;
		$block_float = $block[$prefix.'block_float'] ;
		$block_main_column = $block[$prefix.'block_main_column'] ;
		$block_secondary_column = $block[$prefix.'block_secondary_column'] ;

		if($block_layout == 'full') { ?>
			<!-- full width -->
			<section class="row block full section-margin">
				<div class="columns small-12">
					<?php echo apply_filters('the_content', $block_main_column); ?>
				</div>
			</section>
		<?php } else if($block_layout == 'split') { ?>
			<!-- split width -->
			<section class="row block split section-margin">
				<div class="columns small-12 medium-8 main">
					<?php echo apply_filters('the_content', $block_main_column); ?>
				</div>
				<div class="columns small-12 medium-4 secondary">
					<?php echo apply_filters('the_content', $block_secondary_column); ?>
				</div>
			</section>
		<?php } else if($block_layout == 'box') {
			if($block_float == 'left') { ?>
				<!-- box left -->
				<section class="row block box section-margin">
					<div class="columns small-12 medium-6 medium-push-6 large-8 large-push-4 main">
						<?php echo apply_filters('the_content', $block_main_column); ?>
					</div>
					<div class="columns small-12 medium-6 medium-pull-6 large-4 large-pull-8 secondary left">
						<div class="image-wrapper" style="background-image: url(<?php echo $block_image; ?>);">
						</div>
					</div>
				</section>
			<?php } else if($block_float == 'right') { ?>
				<!-- box right -->
				<section class="row block box section-margin">
					<div class="columns small-12 medium-6 large-8 main">
						<?php echo apply_filters('the_content', $block_main_column); ?>
					</div>
					<div class="columns small-12 medium-6 large-4 secondary right">
						<div class="image-wrapper" style="background-image: url(<?php echo $block_image; ?>);">
						</div>
					</div>
				</section>
		<?php }
		}
	}
}


$galleries_section_activation = get_post_meta($post->ID, $prefix.'galleries_section_activation');
if( $galleries_section_activation[0] == 'active' ){
	$galleries_meta_array = get_post_meta($post->ID, $prefix.'galleries');
	foreach($galleries_meta_array[0] as $gallery ){
		$gallery_title = $gallery[$prefix.'gallery_title'] ;
		$gallery_category = $gallery[$prefix.'gallery_category'] ;
		$postQueryArgs = array(
			'post_type' => 'attachment',
			'posts_per_page' => -1,
			'post_status' => 'published',
			'category_name' => $gallery_category,
		);
		$attachments = get_posts( $postQueryArgs );
		$galContent = array();
		if ( $attachments ) {
			?>
			<section class="row gallery section-margin">
				<h2><?php echo $gallery_title; ?></h2>
				<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
					<?php
					foreach ( $attachments as $post ) {
					?>
						<li>
							<a href="<?php echo $post->guid; ?>" class="fancybox background-image" rel="<?php echo $gallery_category; ?>" title="<?php echo $post->post_title; ?>" style="background-image:url(<?php echo $post->guid; ?>);">
								<img src="<?php echo get_template_directory_uri().'/images/square.png'; ?>" class="square" />
							</a>
						</li>
					<?php
					}
				}
				?>
				</ul>
			</section>
		<?php
		wp_reset_postdata();
	}
}

get_footer();


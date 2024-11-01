<?php

/**
 * Custom Tabs Compatible with WooCommerce
 * 
 * Outputs an extra tab to the default set of info tabs on the single product page.
 */
function custom_tab_options_tab_down() {
	//Options	
		$multitab1 = get_option('multitab1');
?>
	<li class="custom_tab2"><a href="#custom_tab_data2"><?php _e($multitab1, 'woothemes'); ?></a></li>
<?php
}
add_action('woocommerce_product_write_panel_tabs', 'custom_tab_options_tab_down'); 


/**
 * Custom Tab Options
 * 
 * Provides the input fields and add/remove buttons for custom tabs on the single product page.
 */
function custom_tab_options_down() {
	global $post;
	$multitab1 = get_option('multitab1');
	$custom_tab_options_down = array(
		'tttk_hdsd_title' => get_post_meta($post->ID, 'custom_tab_title_down', true),
		'tttk_hdsd_contentb' => get_post_meta($post->ID, 'custom_tab_content_down', true),
		'tttk_hdsd_priority' => get_post_meta($post->ID, 'custom_tab_priority_down', true),
	);
	
?>
	<div id="custom_tab_data2" class="panel woocommerce_options_panel">
		<div class="options_group">
			<p class="form-field">
				<?php woocommerce_wp_checkbox( array( 'id' => 'custom_tab_enabled_down', 'label' => __('Enable Tab?', 'woothemes'), 'description' => __('Enable this option to enable the custom tab on the frontend.', 'woothemes') ) ); ?>
			</p>
		</div>
		
		<div class="options_group custom_tab_options">                								
			<p class="form-field">
				<label><?php _e('Title:', 'woothemes'); ?></label>
				<input type="text" size="5" name="custom_tab_title_down" value="<?php if($custom_tab_options_down['tttk_hdsd_title']){echo @$custom_tab_options_down['tttk_hdsd_title'];}else{echo $multitab1;} ?>" placeholder="<?php _e('Enter your custom tab title', 'woothemes'); ?>" />
			</p>
			<p class="form-field">
				<label><?php _e('Priority:', 'woothemes'); ?></label>
				<input type="text" size="5" name="custom_tab_priority_down" value="<?php if($custom_tab_options_down['tttk_hdsd_priority']){echo @$custom_tab_options_down['tttk_hdsd_priority'];}else{echo '20';} ?>" placeholder="<?php _e('Enter your custom tab priority', 'woothemes'); ?>" />
				<span class="description">Changing the order/priority of single-product tabs value ex: 10, 20, 30</span>
			</p>
			
			<p class="form-field">
				<?php _e('Content:', 'woothemes'); ?>
           	</p>
			
			<table class="form-table">
				<tr>
					<td>
						<?php
								$settings = array(
												'text_area_name'=> 'custom_tab_content_down',
												'quicktags' 	=> true,
												'tinymce' 		=> true,
												'media_butons' 	=> false,
												'textarea_rows' => 98,
												'editor_class'  => 'contra',
												'editor_css'	=> '<style>#wp-custom_tab_content_down-editor-container .wp-editor-area, #custom_tab_content_down_ifr{height:250px !important; width:100%;} #custom_tab_data3 .quicktags-toolbar input {width:auto;}</style>'
												);
												
								$id = 'custom_tab_content_down';

						 wp_editor($custom_tab_content_down['tttk_hdsd_contentb'],$id,$settings);
						 
						 ?>	
						
					</td>
				</tr>   
			</table>
        </div>	
	</div>
<?php
}
add_action('woocommerce_product_write_panels', 'custom_tab_options_down');

/**
 * Process meta
 * 
 * Processes the custom tab options when a post is saved
 */
function process_product_meta_custom_tab_down( $post_id ) {
	update_post_meta( $post_id, 'custom_tab_enabled_down', ( isset($_POST['custom_tab_enabled_down']) && $_POST['custom_tab_enabled_down'] ) ? 'yes' : 'no' );
	update_post_meta( $post_id, 'custom_tab_title_down', $_POST['custom_tab_title_down']);
	update_post_meta( $post_id, 'custom_tab_content_down', $_POST['custom_tab_content_down']);
	update_post_meta( $post_id, 'custom_tab_priority_down', $_POST['custom_tab_priority_down']);
}
add_action('woocommerce_process_product_meta', 'process_product_meta_custom_tab_down', 10, 2);

?>
<?php

/**
 * Custom Tabs. Compatible with WooCommerce
 * This version uses the code editor.
 * 
 * Outputs an extra tab to the default set of info tabs on the single product page.
 */
function custom_tab_options_tab_tools() {
		//Options	
		$multitab3 = get_option('multitab3');
?>
	<li class="custom_tab3"><a href="#custom_tab_data4"><?php _e($multitab3, 'woothemes'); ?></a></li>
<?php
}
add_action('woocommerce_product_write_panel_tabs', 'custom_tab_options_tab_tools'); 


/**
 * Custom Tab Options
 * 
 * Provides the input fields and add/remove buttons for custom tabs on the single product page.
 */
function custom_tab_options_tools() {
	global $post;
	$multitab3 = get_option('multitab3');
	$custom_tab_options_tools = array(
		'udtt_title' => get_post_meta($post->ID, 'custom_tab_title_tools', true),
		'udtt_content' => get_post_meta($post->ID, 'custom_tab_content_tools', true),
		'udtt_priority' => get_post_meta($post->ID, 'custom_tab_priority_tools', true),
	);
	
?>
	<div id="custom_tab_data4" class="panel woocommerce_options_panel">
		<div class="options_group">
			<p class="form-field">
				<?php woocommerce_wp_checkbox( array( 'id' => 'custom_tab_enabled_tools', 'label' => __('Enable tab?', 'woothemes'), 'description' => __('Enable this option to enable the custom tab on the frontend.', 'woothemes') ) ); ?>
			</p>
		</div>
		
		<div class="options_group custom_tab_options">                								
			<p class="form-field">
				<label><?php _e('Title:', 'woothemes'); ?></label>
				<input type="text" size="5" name="custom_tab_title_tools" value="<?php if($custom_tab_options_tools['udtt_title']){ echo @$custom_tab_options_tools['udtt_title'];}else{echo $multitab3;} ?>" placeholder="<?php _e('Enter your custom tab title', 'woothemes'); ?>" />
			</p>
			<p class="form-field">
				<label><?php _e('Priority:', 'woothemes'); ?></label>
				<input type="text" size="5" name="custom_tab_priority_tools" value="<?php if($custom_tab_options_tools['udtt_priority']){ echo @$custom_tab_options_tools['udtt_priority'];}else{echo '20';} ?>" placeholder="<?php _e('Enter your custom tab priority', 'woothemes'); ?>" />
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
 						'text_area_name'=> 'custom_tab_content_tools',
 						'quicktags' 	=> true,
 						'tinymce' 		=> true,
 						'media_butons' 	=> false,
 						'textarea_rows' => 98,
 						'editor_class'  => 'contra',
 						'editor_css'	=> '<style>#wp-custom_tab_content_tools-editor-container .wp-editor-area, #custom_tab_content_tools_ifr{height:250px !important; width:100%;} #custom_tab_data3 .quicktags-toolbar input {width:auto;}</style>'
 						);
 						
 		$id = 'custom_tab_content_tools';

 wp_editor($custom_tab_options_tools['udtt_content'],$id,$settings);
 
 ?>	
					</td>
				</tr>   
			</table>
        </div>	
	</div>
<?php
}
add_action('woocommerce_product_write_panels', 'custom_tab_options_tools');


/**
 * Process meta
 * 
 * Processes the custom tab options when a post is saved
 */
function process_product_meta_custom_tab_tools( $post_id ) {
	update_post_meta( $post_id, 'custom_tab_enabled_tools', ( isset($_POST['custom_tab_enabled_tools']) && $_POST['custom_tab_enabled_tools'] ) ? 'yes' : 'no' );
	update_post_meta( $post_id, 'custom_tab_title_tools', $_POST['custom_tab_title_tools']);
	update_post_meta( $post_id, 'custom_tab_content_tools', $_POST['custom_tab_content_tools']);
	update_post_meta( $post_id, 'custom_tab_priority_tools', $_POST['custom_tab_priority_tools']);
}
add_action('woocommerce_process_product_meta', 'process_product_meta_custom_tab_tools', 10, 2);

?>
<?php
    /*
    Plugin Name: Woocommerce Multiple Tabs
    Plugin URI: http://joomquery.com/how-to-installation-woocommerce-multiple-tabs-plugin-for-wordpress
    Description: Plugin for displaying product Tabs from an Woocommerce shopping cart
    Author: Lamvt - Vu Thanh Lam
    Version: 3.8.1
    Author URI: http://www.joomquery.com
    */
	function multi_tabs_admin() {
		include('inc/multi_tabs_admin.php');
		
	}
	 
	function multi_tabs_admin_actions() {
		add_options_page("Woocommerce Multiple Tabs", "Woocommerce Multiple Tabs", 1, "Woocommerce_Multiple_Tabs", "multi_tabs_admin");
		//Options
		$multitab1 = get_option('multitab1');	
		$multitab2 = get_option('multitab2');	
		$multitab3 = get_option('multitab3');	
		if($multitab1!=''){
			include('inc/thong-tin-tham-khao-hdsd.php');
		}
		if($multitab2!=''){
			include('inc/phu-kien-chon-them.php');
		}
		if($multitab3!=''){
			include('inc/ung-dung-thuc-tien.php');
		}
	}
	 
	add_action('admin_menu', 'multi_tabs_admin_actions');
	
	
	
	/**
 * Display Tab
 * 
 * Display Custom Tab on Frontend of Website for WooCommerce 2.0
 */

add_filter( 'woocommerce_product_tabs', 'woocommerce_product_custom_tab_spec' );


	function woocommerce_product_custom_tab_spec( $tabs ) {
		global $post, $product;

		$custom_tab_options_spec = array(
			'enabled' => get_post_meta($post->ID, 'custom_tab_enabled_spec', true),
			'pkct_title' => get_post_meta($post->ID, 'custom_tab_title_spec', true),
			'pkct_content' => get_post_meta($post->ID, 'custom_tab_content_spec', true),
			'pkct_priority' => get_post_meta($post->ID, 'custom_tab_priority_spec', true),			
		);
		
			if ( $custom_tab_options_spec['enabled'] != 'no' ){
				$tabs['custom-tab-second'] = array(
					'title'    => $custom_tab_options_spec['pkct_title'],
					'priority' => $custom_tab_options_spec['pkct_priority'],
					'callback' => 'custom_product_tabs_panel_content_spec',					
					'content'  => $custom_tab_options_spec['pkct_content']
				);
			}
		return $tabs;
	}

	/**
	 * Render the custom product tab panel content for the callback 'custom_product_tabs_panel_content_spec'
	 */
		 
   function custom_product_tabs_panel_content_spec( $key, $custom_tab_options_spec ) {

		global $post, $product;

		$custom_tab_options_spec = array(
			'enabled' => get_post_meta($post->ID, 'custom_tab_enabled_spec', true),
			'pkct_title' => get_post_meta($post->ID, 'custom_tab_title_spec', true),
			'pkct_content' => get_post_meta($post->ID, 'custom_tab_content_spec', true),			
		);   
   
		echo '<h2>' . $custom_tab_options_spec['pkct_title'] . '</h2>';
		echo $custom_tab_options_spec['pkct_content'];

	}
	
	/**
	 * Display Tab
	 * 
	 * Display Custom Tab on Frontend of Website for WooCommerce 2.0
	 */

	add_filter( 'woocommerce_product_tabs', 'woocommerce_product_custom_tab_down' );


	function woocommerce_product_custom_tab_down( $tabs ) {
		global $post, $product;

		$custom_tab_options_down = array(
			'enabled' => get_post_meta($post->ID, 'custom_tab_enabled_down', true),
			'tttk_hdsd_title' => get_post_meta($post->ID, 'custom_tab_title_down', true),
			'tttk_hdsd_contentb' => get_post_meta($post->ID, 'custom_tab_content_down', true),			
			'tttk_hdsd_priority' => get_post_meta($post->ID, 'custom_tab_priority_down', true),		
		);				
		
			if ( $custom_tab_options_down['enabled'] != 'no' ){
				$tabs['custom-tab-third'] = array(
					'title'    => $custom_tab_options_down['tttk_hdsd_title'],
				    'id' => 'test_multicheckbox',	
					'priority' => $custom_tab_options_down['tttk_hdsd_priority'],
					'callback' => 'custom_product_tabs_panel_content_down',					
					'content'  => $custom_tab_options_down['tttk_hdsd_contentb']
				);
			}

		return $tabs;
	}

	/**
	 * Render the custom product tab panel content for the callback 'custom_product_tabs_panel_content_down'
	 */
	function custom_product_tabs_panel_content_down( $key, $custom_tab_options_down ) {
		global $post, $product;
   
		$custom_tab_options_down = array(
			'enabled' => get_post_meta($post->ID, 'custom_tab_enabled_down', true),
			'tttk_hdsd_title' => get_post_meta($post->ID, 'custom_tab_title_down', true),
			'tttk_hdsd_contentb' => get_post_meta($post->ID, 'custom_tab_content_down', true),			
		);
		
		$downloads = get_post_meta($post->ID, 'custom_tab_content_down', true);
		$nsoutput = do_shortcode( $downloads ) ;		
		   
		echo '<h2>' . $custom_tab_options_down['tttk_hdsd_title'] . '</h2>';
		print $nsoutput;
	}
	
	/**
	 * Display Tab
	 * 
	 * Display Custom Tab on Frontend of Website for WooCommerce 2.0
	 */

	add_filter( 'woocommerce_product_tabs', 'woocommerce_product_custom_tab_tools' );


	function woocommerce_product_custom_tab_tools( $tabs ) {
		global $post, $product;

		$custom_tab_options_tools = array(
			'enabled' => get_post_meta($post->ID, 'custom_tab_enabled_tools', true),
			'udtt_title' => get_post_meta($post->ID, 'custom_tab_title_tools', true),
			'udtt_content' => get_post_meta($post->ID, 'custom_tab_content_tools', true),
			'udtt_priority' => get_post_meta($post->ID, 'custom_tab_priority_tools', true),			
		);
		
			if ( $custom_tab_options_tools['enabled'] != 'no' ){
				$tabs['custom-tab-second'] = array(
					'title'    => $custom_tab_options_tools['udtt_title'],
					'priority' => $custom_tab_options_tools['udtt_priority'],
					'callback' => 'custom_product_tabs_panel_content_tools',					
					'content'  => $custom_tab_options_tools['udtt_content']
				);
			}
		return $tabs;
	}

	/**
	 * Render the custom product tab panel content for the callback 'custom_product_tabs_panel_content_spec'
	 */
		 
   function custom_product_tabs_panel_content_tools( $key, $custom_tab_options_tools ) {

		global $post, $product;

		$custom_tab_options_tools = array(
			'enabled' => get_post_meta($post->ID, 'custom_tab_enabled_tools', true),
			'udtt_title' => get_post_meta($post->ID, 'custom_tab_title_tools', true),
			'udtt_content' => get_post_meta($post->ID, 'custom_tab_content_tools', true),			
		);   
   
		echo '<h2>' . $custom_tab_options_tools['pkct_title'] . '</h2>';
		echo $custom_tab_options_tools['pkct_content'];

	}
<?php
    if($_POST['multitabs_saved'] == 'Y') {
        //Form data sent
        $multitab1 = $_POST['multitab1'];
        $multitab2 = $_POST['multitab2'];
        $multitab3 = $_POST['multitab3'];
        update_option('multitab1', $multitab1);
        update_option('multitab2', $multitab2);
        update_option('multitab3', $multitab3);
		$multitab4='';
		$multitab5='';
		$multitab6='';
		$multitab7='';
		$multitab8='';
		$multitab9='';
		$multitab10='';
		$multitab11='';
		$multitab12='';
		$multitab13='';
		$multitab14='';
		$multitab15='';
         
        ?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
    } else {
        $multitab1 = get_option('multitab1');
        $multitab2 = get_option('multitab2');
        $multitab3 = get_option('multitab3');
		$multitab4='';
		$multitab5='';
		$multitab6='';
		$multitab7='';
		$multitab8='';
		$multitab9='';
		$multitab10='';
		$multitab11='';
		$multitab12='';
		$multitab13='';
		$multitab14='';
		$multitab15='';
    }
	
?>

<div class="wrap">
<?php screen_icon(); ?>
    <?php    echo "<h2>" . __( 'Woocommerce Multiple Tabs Options', 'woocommerce' ) . "</h2>"; ?>
    <div style="width:60%;float:left;"> 
    <form name="multitabs_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="multitabs_saved" value="Y">
        <?php    echo "<h4>" . __( 'Name of your tabs:', 'woocommerce' ) . "</h4>"; ?>
        <p><?php _e("Tab 1: " ); ?><input type="text" name="multitab1" value="<?php echo $multitab1; ?>" size="20"><?php _e(" ex: Tech Specs" ); ?></p>
        <p><?php _e("Tab 2: " ); ?><input type="text" name="multitab2" value="<?php echo $multitab2; ?>" size="20"><?php _e(" ex: Kits" ); ?></p>
        <p><?php _e("Tab 3: " ); ?><input type="text" name="multitab3" value="<?php echo $multitab3; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
		<?php    echo "<h4>" . __( 'Woocommerce Multiple Tabs Settings', 'woocommerce' ) . "</h4>"; ?>
		<p><?php _e("Want more Tabs please contact Woocommerce Multiple Tabs plugin developer" ); ?></p>
        <p><?php _e("Tab 4: " ); ?><input readonly type="text" name="multitab4" value="<?php echo $multitab4; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 5: " ); ?><input readonly type="text" name="multitab5" value="<?php echo $multitab5; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 6: " ); ?><input readonly type="text" name="multitab6" value="<?php echo $multitab6; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 7: " ); ?><input readonly type="text" name="multitab7" value="<?php echo $multitab7; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 8: " ); ?><input readonly type="text" name="multitab8" value="<?php echo $multitab8; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 9: " ); ?><input readonly type="text" name="multitab9" value="<?php echo $multitab9; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 10: " ); ?><input readonly type="text" name="multitab10" value="<?php echo $multitab10; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 11: " ); ?><input readonly type="text" name="multitab11" value="<?php echo $multitab11; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 12: " ); ?><input readonly type="text" name="multitab12" value="<?php echo $multitab12; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 13: " ); ?><input readonly type="text" name="multitab13" value="<?php echo $multitab13; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 14: " ); ?><input readonly type="text" name="multitab14" value="<?php echo $multitab14; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("Tab 15: " ); ?><input readonly type="text" name="multitab15" value="<?php echo $multitab15; ?>" size="20"><?php _e(" ex: Accessories" ); ?></p>
        <p><?php _e("<strong>Support : </strong><a href='http://joomquery.com/contact-us/'>Contact us</a>" ); ?></p>
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'woocommerce' ) ?>" />
        </p>
    </form>
	</div>
	<div style="width:40%;float:left;">
		<div>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="UWPYCDYRGDP9J">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
		<div>
			<p><?php _e("<strong>Support : </strong><a href='http://joomquery.com/contact-us/'>Contact us</a>" ); ?></p>
		</div>
	</div>
</div>

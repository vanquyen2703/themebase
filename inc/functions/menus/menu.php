<?php
/**
 * Edit Nav Menu
 */
add_filter( 'wp_setup_nav_menu_item', 'themebase_setup_custom_nav_fields'  );
add_action( 'wp_update_nav_menu_item', 'themebase_update_custom_nav_fields' , 10, 2 );
add_filter( 'wp_edit_nav_menu_walker', 'themebase_replace_walker_class' , 90, 2 );
add_action( 'wp_nav_menu_item_custom_fields', 'themebase_nav_menu_item_custom_fields' , 99, 4 );
add_filter( 'nav_menu_css_class', 'themebase_add_current_url_menu_class', 10, 3 );
/** 
* Fixed: wrong active menu item. 
*/
function themebase_add_current_url_menu_class( $classes = array(), $item = false ) {
  // Get current URL
	global $wp;
	$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
  	// Get homepage URL
 	$homepage_url = trailingslashit( home_url('/') );
  // Exclude 404 and homepage
  	if( is_404() or $item->url == $homepage_url ){
    	return $classes;
  	}
    unset($classes[array_search('current_page_parent',$classes)]);
    if($item->url && !empty($item->url)) {
      	if ( strstr( $current_url, $item->url) ){
        	$classes[] = 'current-menu-item';
      	}
    }
  	return $classes;
}
/**
 * Setup custom menu item fields before output.
 */
function themebase_setup_custom_nav_fields( $menu_item ) {
	$menu_item->themebase_mega_menu_iconfont = get_post_meta( $menu_item->ID, '_menu_item_themebase_mega_menu_iconfont', true );
	$menu_item->themebase_mega_menu_iconfont_position = get_post_meta( $menu_item->ID, '_menu_item_themebase_mega_menu_iconfont_position', true );
	$menu_item->themebase_mega_menu_iconfont_color = get_post_meta( $menu_item->ID, '_menu_item_themebase_mega_menu_iconfont_color', true );
	$menu_item->tip_label = get_post_meta( $menu_item->ID, '_menu_item_tip_label', true );
    $menu_item->tip_color = get_post_meta( $menu_item->ID, '_menu_item_tip_color', true );
    $menu_item->tip_bg = get_post_meta( $menu_item->ID, '_menu_item_tip_bg', true );
	$menu_item->themebase_menu_modal_box = (bool) get_post_meta( $menu_item->ID, '_menu_item_themebase_menu_modal_box', true ); 
	$menu_item->themebase_menu_modal_static_block = get_post_meta( $menu_item->ID, '_menu_item_themebase_menu_modal_static_block', true );   
	// First level & Mega menu
	$menu_item->themebase_mega_menu_enabled = (bool) get_post_meta( $menu_item->ID, '_menu_item_themebase_mega_menu_enabled', true );
	$menu_item->themebase_mega_menu_fullwidth = (bool) get_post_meta( $menu_item->ID, '_menu_item_themebase_mega_menu_fullwidth', true );
	$menu_item->themebase_mega_menu_width = get_post_meta( $menu_item->ID, '_menu_item_themebase_mega_menu_width', true );
	$menu_item->choose_mega_menu = get_post_meta( $menu_item->ID, '_choose_mega_menu_key', true );
// Second level & Third level
	$menu_item->themebase_menu_hide_title = (bool) get_post_meta( $menu_item->ID, '_menu_item_themebase_menu_hide_title', true );
	$menu_item->themebase_menu_remove_link = (bool) get_post_meta( $menu_item->ID, '_menu_item_themebase_menu_remove_link', true );	
	$menu_item->themebase_menu_start_row = (bool) get_post_meta( $menu_item->ID, '_menu_item_themebase_menu_start_row', true );	
	$menu_item->themebase_mega_menu_block = get_post_meta( $menu_item->ID, '_menu_item_themebase_mega_menu_block', true );	
	return $menu_item;
}

/**
 * Update custom menu item fields.
 */
function themebase_update_custom_nav_fields( $menu_id, $menu_db_id ) {
	if ( ! empty( $_POST['menu-item-iconfont'][ $menu_db_id ] )) {
		update_post_meta( $menu_db_id, '_menu_item_themebase_mega_menu_iconfont', $_POST['menu-item-iconfont'][ $menu_db_id ]  );
	} else {
		delete_post_meta( $menu_db_id, '_menu_item_themebase_mega_menu_iconfont' );
	}
    $check = array('tip_label', 'tip_color', 'tip_bg','themebase_mega_menu_block','themebase_menu_remove_link','themebase_menu_start_row','themebase_menu_modal_box','themebase_menu_modal_static_block','themebase_mega_menu_iconfont_position','themebase_mega_menu_iconfont_color');

    foreach ( $check as $key ) {
        if (isset($_POST['menu-item-'.$key][$menu_db_id])){
            update_post_meta( $menu_db_id, '_menu_item_'.$key, $_POST['menu-item-'.$key][$menu_db_id]);
        }
        else{
            delete_post_meta( $menu_db_id, '_menu_item_'.$key );
        }
    }
	$mega_menu_enabled = isset( $_POST['menu-item-themebase-enable-mega-menu'][ $menu_db_id ] );
	if ( $mega_menu_enabled ) {
		update_post_meta( $menu_db_id, '_menu_item_themebase_mega_menu_enabled', 'on' );
	} else {
		delete_post_meta( $menu_db_id, '_menu_item_themebase_mega_menu_enabled' );
	}

	if ( $mega_menu_enabled && isset( $_POST['menu-item-themebase-fullwidth-menu'][ $menu_db_id ] ) ) {
		update_post_meta( $menu_db_id, '_menu_item_themebase_mega_menu_fullwidth', 'on' );
	} else {
		delete_post_meta( $menu_db_id, '_menu_item_themebase_mega_menu_fullwidth' );
	}

    if ( $mega_menu_enabled && isset( $_POST['menu-item-themebase-width-menu'][ $menu_db_id ] ) ) {
        update_post_meta( $menu_db_id, '_menu_item_themebase_mega_menu_width', $_POST['menu-item-themebase-width-menu'][ $menu_db_id ] );
    } else {
        delete_post_meta( $menu_db_id, '_menu_item_themebase_mega_menu_width' );
    }
	/* choose mega menu*/
	if ( $mega_menu_enabled && ! empty( $_POST['choose-mega-menu'][ $menu_db_id ] ) ) {
		update_post_meta( $menu_db_id, '_choose_mega_menu_key', absint( $_POST['choose-mega-menu'][ $menu_db_id ] ) );
	} else {
		delete_post_meta( $menu_db_id, '_choose_mega_menu_key' );
	}
	//Mega menu background image options
	if ( isset( $_POST['menu-item-themebase-hide-title'][ $menu_db_id ] ) ) {
		update_post_meta( $menu_db_id, '_menu_item_themebase_menu_hide_title', 'on' );
	} else {
		delete_post_meta( $menu_db_id, '_menu_item_themebase_menu_hide_title' );
	}
}
function themebase_replace_walker_class( $walker, $menu_id ) {

	if ( 'Walker_Nav_Menu_Edit' == $walker ) {
		$walker = 'Themebase_Walker_Nav_Menu_Edit';
	}

	return $walker;
}
function themebase_nav_menu_item_custom_fields( $item_id, $item, $depth, $args ) {
	// set default item fields
	$default_mega_menu_fields = array(
		'themebase_mega_menu_iconfont' => '',
		'themebase_mega_menu_enabled' => 0,
		'themebase_mega_menu_fullwidth' => 0,
		'themebase_mega_menu_width' => '',
		'tip_color' => '',
		'tip_label' => '',
		'tip_bg' => '',
		'themebase_mega_menu_block'=> '',
		'themebase_menu_hide_title' => 0,
		'choose_mega_menu' => '0',
	);
	// set defaults
	foreach ( $default_mega_menu_fields as $field=>$value ) {
		if ( !isset($item->$field) ) {
			$item->$field = $value;
		}
	}
	$mega_menu_container_classes = array( 'themebase-mega-menu-fields' );
	$mega_menu_container_classes = implode( ' ', $mega_menu_container_classes );
	?>
	<div class="<?php echo esc_attr( $mega_menu_container_classes ); ?>">
		<p class="field-themebase-iconfont description description-wide">
			<label>
				<?php echo esc_html__('Icon Font Class','themebase'); ?><br />
	            <input type="text" id="edit-menu-item-iconfont-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-iconfont"
	                <?php if (esc_attr( $item->themebase_mega_menu_iconfont )) : ?>
	                    name="menu-item-iconfont[<?php echo esc_attr($item_id); ?>]"
	                <?php endif; ?>
	                   data-name="menu-item-iconfont[<?php echo esc_attr($item_id); ?>]"
	                   value="<?php echo esc_attr( $item->themebase_mega_menu_iconfont ); ?>" />				
			</label>
		</p>
		<p class="description description-wide">
			<?php echo esc_html__('Icon Position: ','themebase'); ?>
			<select name="menu-item-themebase_mega_menu_iconfont_position[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-themebase_mega_menu_iconfont_position-<?php echo esc_attr($item_id); ?>">
				<?php 
				$themebase_menu_icon_pos = array( 
					esc_html__('left','themebase') => 'left',
					esc_html__('top','themebase') => 'top', 
				);
				foreach( $themebase_menu_icon_pos as $title=>$value): ?>
					<option value="<?php echo esc_attr($value); ?>" <?php selected($value, $item->themebase_mega_menu_iconfont_position); ?>><?php echo esc_html($title); ?></option>
				<?php endforeach; ?>
			</select>
		</p>	
		<p class="description description-wide">
			<?php echo esc_html__('Icon Color: ','themebase'); ?>
			<input type="text" id="edit-menu-item-themebase_mega_menu_iconfont_color-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-themebase_mega_menu_iconfont_color"
		                <?php if (esc_attr( $item->themebase_mega_menu_iconfont_color )) : ?>
		                    name="menu-item-themebase_mega_menu_iconfont_color[<?php echo esc_attr($item_id); ?>]"
		                <?php endif; ?>
		                   data-name="menu-item-themebase_mega_menu_iconfont_color[<?php echo esc_attr($item_id); ?>]"
		                   value="<?php echo esc_attr( $item->themebase_mega_menu_iconfont_color ); ?>" />
		</p>		
		<div class="menu-tip-fields description-wide">
		    <p class="description col-1">
		        <label for="edit-menu-item-tip_label-<?php echo esc_attr($item_id); ?>">
		            <?php echo esc_html__('Tip Label','themebase'); ?><br />
		            <input type="text" id="edit-menu-item-tip_label-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-tip_label"
		                <?php if (esc_attr( $item->tip_label )) : ?>
		                    name="menu-item-tip_label[<?php echo esc_attr($item_id); ?>]"
		                <?php endif; ?>
		                   data-name="menu-item-tip_label[<?php echo esc_attr($item_id); ?>]"
		                   value="<?php echo esc_attr( $item->tip_label ); ?>" />
		        </label>
		    </p>
		    <p class="description col-2">
		        <label for="edit-menu-item-tip_color-<?php echo esc_attr($item_id); ?>">
		            <?php echo esc_html__('Tip Text Color','themebase'); ?><br />
		            <input type="text" id="edit-menu-item-tip_color-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-tip_color"
		                <?php if (esc_attr( $item->tip_color )) : ?>
		                    name="menu-item-tip_color[<?php echo esc_attr($item_id); ?>]"
		                <?php endif; ?>
		                   data-name="menu-item-tip_color[<?php echo esc_attr($item_id); ?>]"
		                   value="<?php echo esc_attr( $item->tip_color ); ?>" />
		        </label>
		    </p>
		    <p class="description">
		        <label for="edit-menu-item-tip_bg-<?php echo esc_attr($item_id); ?>">
		            <?php echo esc_html__('Tip BG Color','themebase'); ?><br />
		            <input type="text" id="edit-menu-item-tip_bg-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-tip_bg"
		                <?php if (esc_attr( $item->tip_bg )) : ?>
		                    name="menu-item-tip_bg[<?php echo esc_attr($item_id); ?>]"
		                <?php endif; ?>
		                   data-name="menu-item-tip_bg[<?php echo esc_attr($item_id); ?>]"
		                   value="<?php echo esc_attr( $item->tip_bg ); ?>" />
		        </label>
		    </p>
		</div>
		<p class="field-themebase_menu_modal_box description-wide">
			<label for="edit-menu-item-themebase_menu_modal_box-<?php echo esc_attr($item_id); ?>">
				<input id="edit-menu-item-themebase_menu_modal_box-<?php echo esc_attr($item_id); ?>" type="checkbox" class="edit-menu-item-themebase_menu_modal_box" name="menu-item-themebase_menu_modal_box[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->themebase_menu_modal_box ); ?>/>
				<?php echo esc_html__('	Enable modal box onclick','themebase'); ?>
			</label>
		</p>	
	    <p class="description field-themebase_menu_modal_static_block description-wide">
	        <label for="edit-menu-item-themebase_menu_modal_static_block-<?php echo esc_attr($item_id); ?>">
	            <?php echo esc_html__('Enter unique ID','themebase'); ?><br />
	            <input type="text" id="edit-menu-item-themebase_menu_modal_static_block-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-themebase_menu_modal_static_block"
	                <?php if (esc_attr( $item->themebase_menu_modal_static_block )) : ?>
	                    name="menu-item-themebase_menu_modal_static_block[<?php echo esc_attr($item_id); ?>]"
	                <?php endif; ?>
	                   data-name="menu-item-themebase_menu_modal_static_block[<?php echo esc_attr($item_id); ?>]"
	                   value="<?php echo esc_attr( $item->themebase_menu_modal_static_block ); ?>" />
	        </label>
	        <span class="description"><?php echo esc_html__('Enter ID for your menu link if you want to open static block in modal box. Make sure to add block name in Static Block name field below.','themebase');?></span>
	    </p>		    
		<!-- Mega menu in first level -->
		<div class="themebase-mega-menu-fist-lev description-wide">
			<p class="field-themebase-enable-mega-menu">
				<label for="edit-menu-item-themebase-enable-mega-menu-<?php echo esc_attr($item_id); ?>">
					<input id="edit-menu-item-themebase-enable-mega-menu-<?php echo esc_attr($item_id); ?>" type="checkbox" class="edit-menu-item-use_megamenu" name="menu-item-themebase-enable-mega-menu[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->themebase_mega_menu_enabled ); ?>/>
					<?php echo esc_html__('Enable Mega Menu','themebase'); ?>
				</label>
			</p>
			<p class="field-themebase-fullwidth-menu">
				<label for="edit-menu-item-themebase-fullwidth-menu-<?php echo esc_attr($item_id); ?>">
					<input id="edit-menu-item-themebase-fullwidth-menu-<?php echo esc_attr($item_id); ?>" type="checkbox" name="menu-item-themebase-fullwidth-menu[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->themebase_mega_menu_fullwidth ); ?>/>
					<?php echo esc_html__('Fullwidth','themebase'); ?>
				</label>
			</p>
            <p class="field-themebase-width-menu description description-wide">
                <label>
                    <?php echo esc_html__('Width Mega Menu When Not Select Fullwidth','themebase'); ?><br />
                    <input type="number" id="edit-menu-item-themebase-width-menu-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-themebase-width-menu"
                            name="menu-item-themebase-width-menu[<?php echo esc_attr($item_id); ?>]"
                           value="<?php echo esc_attr( $item->themebase_mega_menu_width ); ?>" />
                </label>
            </p>
            <!--Choose mega menu-->
            <p class="description description-wide">
                <label> <?php echo esc_html__('Choose Mega Menu: ','themebase'); ?></label>
                <select name="choose-mega-menu[<?php echo esc_attr($item_id); ?>]" id="edit-choose-mega-menu-<?php echo esc_attr($item_id); ?>">
                    <?php foreach (themebase_get_save_template() as $key => $value):?>
                        <option value="<?php echo esc_attr($key)?>"  <?php selected($key, $item->choose_mega_menu); ?>><?php echo esc_html($value);?></option>
                    <?php endforeach;?>
                </select>
            </p>

			<div class="field-themebase-menu-background-image">
				<p class="field-themebase-hide-menu-title">
					<label for="edit-menu-item-themebase-hide-title-<?php echo esc_attr($item_id); ?>">
						<input id="edit-menu-item-themebase-hide-title-<?php echo esc_attr($item_id); ?>" type="checkbox" name="menu-item-themebase-hide-title[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->themebase_menu_hide_title ); ?>/>
						<?php echo esc_html__( 'Hide Menu Title', 'themebase' ); ?>
					</label>
				</p>
				<p class="field-themebase_menu_remove_link">
					<label for="edit-menu-item-themebase_menu_remove_link-<?php echo esc_attr($item_id); ?>">
						<input id="edit-menu-item-themebase_menu_remove_link-<?php echo esc_attr($item_id); ?>" type="checkbox" class="edit-menu-item-use_megamenu" name="menu-item-themebase_menu_remove_link[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->themebase_menu_remove_link ); ?>/>
						<?php echo esc_html__('Remove link','themebase'); ?>
					</label>
				</p>													        
			</div>
		</div>
		<div class="themebase-mega-menu-second-lev">
			<p class="field-themebase_menu_start_row">
				<label for="edit-menu-item-themebase_menu_start_row-<?php echo esc_attr($item_id); ?>">
					<input id="edit-menu-item-themebase_menu_start_row-<?php echo esc_attr($item_id); ?>" type="checkbox" class="edit-menu-item-use_megamenu" name="menu-item-themebase_menu_start_row[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->themebase_menu_start_row ); ?>/>
					<?php echo esc_html__('Start new row','themebase'); ?>
				</label>
			</p>			
		</div>

	</div>
	<!-- Mega Menu End -->
	<?php
}
?>
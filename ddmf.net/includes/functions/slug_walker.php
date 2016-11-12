<?php 
class cheader_walker extends Walker_Nav_Menu {
function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		//print_r($item);
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		if($args->has_children) $arrowdown = '<span class="arrowdown"></span>';
		else $arrowdown = '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$term = get_term( $item->object_id, 'category' );
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		if($depth==1)
		$item_output .= apply_filters( 'the_title', $item->title, $item->ID ). $arrowdown ;
		else{ 
		//echo $item->menu_order;
		if($item->menu_order==1) $cclass ='cnews';
		if($item->menu_order==2) $cclass ='chot';
		if($item->menu_order==3) $cclass ='ctmd';
		if($item->menu_order==4) $cclass ='cxdy';
		if($item->menu_order==5) $cclass ='cnht';
		if($item->menu_order==6) $cclass ='cooxx';

		$item_output .= '<div class="cat_icon '.$cclass.'"></div>'.$args->link_before .apply_filters( 'the_title', $item->title, $item->ID ). $arrowdown . $args->link_after;}
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		//print_r ($item->menu_order);
	}
}
class sheader_walker extends Walker_Nav_Menu {
function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		//print_r($item);
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		if($args->has_children) $arrowdown = '<span class="arrowdown"></span>';
		else $arrowdown = '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$term = get_term( $item->object_id, 'category' );
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		if($depth==1)
		$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
		else{ 
		//echo $item->menu_order;
		if($item->menu_order==1) $cclass ='snews';
		if($item->menu_order==2) $cclass ='shot';
		if($item->menu_order==3) $cclass ='stmd';
		if($item->menu_order==4) $cclass ='sxdy';
		if($item->menu_order==5) $cclass ='snht';
		if($item->menu_order==6) $cclass ='sooxx';

		$item_output .= '<span class="sub_icon '.$cclass.'" title="'.apply_filters( 'the_title', $item->title, $item->ID ).'">'.$args->link_before . $args->link_after;}
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		//print_r ($item->menu_order);
	}
}
class header_walker extends Walker_Nav_Menu {
function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		//print_r($item);
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		if($args->has_children) $arrowdown = '<span class="arrowdown"></span>';
		else $arrowdown = '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		if($depth==1)
		$item_output .= apply_filters( 'the_title', $item->title, $item->ID ). $arrowdown ;
		else
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID ). $arrowdown . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		//print_r ($db_fields);

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
?>
<?php 
function pagenavi( $p = 2 ) {
	if ( is_singular() ) return;
	global $wp_query,$paged;
	$paged = ($paged%4==0)? ($paged/4):(floor($paged/4) + 1);
	$max_page = ($wp_query->max_num_pages%4==0 )? ($wp_query->max_num_pages/4):(floor($wp_query->max_num_pages/4)+1);
	if ( empty( $paged ) ) $paged = 1;
	//if ( $paged > 1 ) p_link( $paged - 1, '上一页', '上一页' );
	//if ( $paged > $p + 1 ) p_link( 1, '最前页' );
	//if ( $paged > $p + 2 ) echo '<span class="page-numbers">...</span>';
	for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {
		if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current' data-pre='4' style='display:none;'>{$i}</span> " : '';//p_link( $i )
	}
	//if ( $paged < $max_page - $p - 1 ) echo '<span class="page-numbers">...</span>';
	//if ( $paged < $max_page - $p ) p_link( $max_page, '最末页' );
	if ( $paged < $max_page ) p_link( $paged + 1,'下一页更精彩~', '下一页' );
}
function p_link( $i, $title = '', $linktype = '' ,$class='') {
	//if ( $title == '' ) $title = "第{$i}页";
	//if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }
	if ( $linktype == '下一页' ) { $class = 'nextmore'; } else { $class = ''; }
	echo "<a class='page-numbers {$class}' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a> ";
}
?>
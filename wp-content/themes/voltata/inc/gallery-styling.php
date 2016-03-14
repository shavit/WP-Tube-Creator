<?php
add_filter('post_gallery', 'voltata_post_gallery', 10, 2);
function voltata_post_gallery($output, $attr) {
	global $post;

	if (isset($attr['orderby'])) {
			$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
			if (!$attr['orderby'])
					unset($attr['orderby']);
	}

	extract(shortcode_atts(array(
			'order' => 'ASC',
			'orderby' => 'menu_order ID',
			'id' => $post->ID,
			'itemtag' => 'dl',
			'icontag' => 'dt',
			'captiontag' => 'dd',
			'columns' => 3,
			'size' => 'thumbnail',
			'include' => '',
			'exclude' => ''
	), $attr));

	$id = intval($id);
	if ('RAND' == $order) $orderby = 'none';

	if (!empty($include)) {
			$include = preg_replace('/[^0-9,]+/', '', $include);
			$_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

			$attachments = array();
			foreach ($_attachments as $key => $val) {
					$attachments[$val->ID] = $_attachments[$key];
			}
	}

  if (empty($attachments)) return '';
 
	$output  = '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
	$output .= '<ol class="carousel-indicators">';

		for($i = 0; $i < count($attachments ); $i++){
			if($i == 1){
				$active = ' class="active"';
			}else{
				$active = '';
			}
			$output .= '<li data-target="#carousel-example-generic" data-slide-to="' . $i . '"' . $active . '></li>';
		}

	$output .= '</ol>';
	$output .= '<div class="carousel-inner" role="listbox">';

	// Now you loop through each attachment
	$item = 0;
	foreach ($attachments as $id => $attachment) {
		if($item == 0){
			$active = " active";
		}else{
			$active = "";
		}
		$item++;
			// Fetch all data related to attachment
			$img = wp_prepare_attachment_for_js($id);
			$caption = $attachment->post_excerpt;
			$url = wp_get_attachment_image_src($id, 'full');

			$output .= "<div class='item" . $active . "'>";
			$output .= "<img src=" . $url[0] . " />";
			$output .= '<div class="carousel-caption">' . $caption . '</div>';
			$output .= "</div>";
	}

	$output .= "</div>";

	$output .= '
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">' . __('Previous', 'voltata') . '</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">' . __('Next', 'voltata') . '</span>
		</a>
	';

	$output .= "</div>";

	return $output;
}
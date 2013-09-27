<?php
/**
 * THEME SETTINGS AND EXECUTION FOR THE IMAGES
 *
 */

/********** Code Index
 *
 * -01- CREATE THE SETTINGS ARRAY FOR THE SLIDESHOW 
 * -02- SLIDESHOW CODE
 * -03- PAGE HEADER CODE
 */



/* 
 * -01- CREATE THE SETTINGS ARRAY FOR THE SLIDESHOW 
 * 
 * */


function create_slides_javascript() {

	$op = array(
		'cro_slspeed' => '7000',
		'cro_slideanim' => '800'
		);

	$tlset = get_option( "tlset" );

	if (isset($tlset['cro_slidespeed'])) {
		$op['cro_slspeed'] = $tlset['cro_slidespeed'] * 1000;
	}

	return $op;
}



/* 
* -03- PAGE HEADER CODE
 * 
 * */


function cro_headerimg($id, $type){

	$cclass 		= '';
	$cban 			= '';
	$cbanafter 		= '';
	$headimg 		= get_header_image();
	$defimg  		= get_template_directory_uri() . '/public/styles/images/defimg.jpg';
	$minetitle 		= '';

	if ($headimg) {$defimg = $headimg;}

	if ($type =='page' ) {
		$args = array(
				'post_parent' 		=> $id,
				'post_type' 		=> 'attachment',
				'post_mime_type' 	=> 'image',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'numberposts' => 999
			);

		$images = get_children( $args );				
		if ( $images ) {
			foreach($images as $v){
				$vals = get_post_meta($v->ID. '_cromadefimg'); 
				if (isset($vals['_cromadefimg'][0])) {
					$vvals = $vals['_cromadefimg'][0];
				} else {
					$vvals = 0;
				}
				if ($vvals == 1) {
					$image_img_tag = wp_get_attachment_image_src( $v->ID, 'full' );
					$defimg = $image_img_tag[0];
				}				
			}
		}
		$minetitle = '<h1 class="cro_accent">' . get_the_title($id) . '</h1>';

	} elseif ($type == 'category') {
		$minetitle = '<h1 class="cro_accent">' . single_cat_title('', false) . '</h1>';
	} elseif ($type == 'clear') {
		$minetitle = '';
	} elseif ($type == 'archive') {
		$minetitle = '<h1 class="cro_accent">' . __('Archives: ','localize')  . get_the_date( _x( 'M \'y', 'monthly archives date format', 'localize' ) ) .  '</h1>';
	} elseif ($type == 'tag') {
		$minetitle = '<h1 class="cro_accent">' . __('Tag Archives: ','localize') . single_cat_title('', false) . '</h1>';
	} elseif ($type == 'search') {
		$minetitle =  '<h1 class="cro_accent">' . __( 'Search Results for "', 'localize' ) .  '<span style="font-style: italic;">' . get_search_query() . '"</span></h1>';
	} elseif ($type == '404') {
		$minetitle =  '<h1 class="cro_accent">' . __( 'Page not found', 'localize' ) . '</h1>';
	} elseif ($type == 'post') {
		$args = array(
				'post_parent' 		=> $id,
				'post_type' 		=> 'attachment',
				'post_mime_type' 	=> 'image',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'numberposts' => 999
			);

		$images = get_children( $args );
					
		if ( $images ) {
			foreach($images as $v){
				$vals = get_post_meta($v->ID. '_cromadefimg'); 
				if (isset($vals['_cromadefimg'][0])) {
					$vvals = $vals['_cromadefimg'][0];
				} else {
					$vvals = 0;
				}
				if ($vvals == 1) {
					$image_img_tag = wp_get_attachment_image_src( $v->ID, 'full' );
					$defimg = $image_img_tag[0];
				}				
			}
		}

		$minetitle = '<h2 class="cro_accent">' . get_the_title($id) . '</h2>';
	} elseif ($type == 'event') {
			$args = array(
				'post_parent' 		=> $id,
				'post_type' 		=> 'attachment',
				'post_mime_type' 	=> 'image',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'numberposts' => 999
			);


		$images = get_children( $args );

					
		if ( $images ) {
			foreach($images as $v){
				$vals = get_post_meta($v->ID. '_cromadefimg'); 
				if (isset($vals['_cromadefimg'][0])) {
					$vvals = $vals['_cromadefimg'][0];
				} else {
					$vvals = 0;
				}
				if ($vvals == 1) {
					$image_img_tag = wp_get_attachment_image_src( $v->ID, 'full' );
					$defimg = $image_img_tag[0];
				}				
			}
		}

		$minetitle = '<h2 class="cro_accent">' . get_the_title($id) . '</h2>';
	} 


	if (!empty($minetitle)){
		$minetitle = '<div class="cro_title"><div class="row">' . $minetitle . '</div></div>';
	}

	return '<div class="cro_headerspace ' .  $cclass . '">
				<div class="imgdiv" style="background: url( ' . $defimg . ') no-repeat 50% 0;">					
					' . $minetitle . '
				</div>
			</div>';

}


/* 
* -03- FETCH GALLERY DATA
 * 
 * */

function get_gallery_data($id, $content){

	$regex_pattern = get_shortcode_regex();
	preg_match ('/'.$regex_pattern.'/s', $content, $regex_matches);
	$imgarr = '';


	if (isset($regex_matches[2]) && $regex_matches[2] == 'gallery' && isset($regex_matches[3]) && $regex_matches[3]) {
		$result = str_replace('ids="', '', $regex_matches[3]);
		$result = str_replace('"', '', $result);
		$imgarr = explode(',', $result);

		$scrp = '';
		foreach ( $imgarr as $cro_v ) {
			$tid = wp_get_attachment_image_src( $cro_v, 'thumbnail');
            $fid = wp_get_attachment_image_src( $cro_v, 'full');
            $scrp .=  '<li rel="' .  $tid[0]  . '" contents="' . $fid[0]  . '" title="' . get_the_title($cro_v)  . '"></li>'; 
		}

	} else {

		$scrp = '';
    	$images = get_children( array( 'post_parent' => $id , 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
        foreach ( $images as $attachment_id => $attachment ) {
            $tid = wp_get_attachment_image_src( $attachment_id, 'thumbnail');
            $fid = wp_get_attachment_image_src( $attachment_id, 'full');        
            $scrp .=  '<li rel="' .  $tid[0]  . '" contents="' . $fid[0]  . '" title="' . $attachment->post_title  . '"></li>';

        }
	}

	$op = '<ul class="cro_gallerycontentwidget">' .  $scrp  . '</ul>';
	return $op;
}





function get_frontcontent() {

	$str 	= cro_get_postarray('frontcontents');
	$ctr = 0;
	$op = '';


	if (!empty($str)) {

		while ($ctr <= 2) {
			$img = get_the_post_thumbnail( $str[$ctr], 'banner' );
			$img = get_the_post_thumbnail( $str[$ctr], 'banner' );
			$tttl 	= get_post_meta($str[$ctr], 'cro_imgtitle', true);
			$substring = '';
			$sllink 		= get_post_meta($str[$ctr], 'ss-pagelink', true);
			$altlink 		= get_post_meta($str[$ctr], 'cro_altlink', true);
			$slidelabel 	=  __('More Info','localize');
			$altstring		= '<div class="sliderspan"><a href="' . $altlink  . '">' .  $slidelabel  .  '</a></div>';
			$slidestring 	= ($sllink && $sllink && $sllink !== 0) ? '<div class="sliderspan"><a href="' . get_permalink($sllink)  . '">' .  $slidelabel  .  '</a></div>' : '' ;
			$slidestring	= ($altlink) ? $altstring : $slidestring;


			if (!empty($tttl)) {
				$substring .= '<h3 class="fptitle cro_accent"><a href="">' . $tttl  . '</a></h3>';
			}

			if ($img || !empty($tttl)){
			$op .= '<div class="four columns">
						<div class="cro_fpc cro_fpbig">
							<div class="cro_backgroundmask">&nbsp;</div>'   .  $img   . '<div class="fptitles">'
						. $substring . $slidestring . '
							</div>
						</div>
					</div>';
			}


	
			$ctr++;

		}

	}


	return '<div class="frban clearfix">' . $op . '</div>';

}


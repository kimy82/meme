<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function breadcrumbs($delimiter = " &gt; ")
{
	$CI =& get_instance();
	
	$seg1 = $CI->uri->segment(1);
	$seg2 = $CI->uri->segment(2);
	$seg3 = $CI->uri->segment(3);
	$module_path = APPPATH . 'modules/';
	
	$lang = $CI->config->item('language_abbr');
	$base_url = ($lang == $CI->config->item('default_language')) ? $CI->config->item('base_url') : $CI->config->item('base_url') . $lang . '/';	
	$total = $CI->uri->total_segments();
	
	// get first and second breadcrumb
	$page = ($CI->uri->segment(1) == FALSE) ? '/' : $CI->uri->segment(1);
	$CI->db->select('slug, title')->where_in('slug', array('/', $page))->where('lang', $lang)->order_by('slug', 'asc');
	$page = $CI->db->get('pages')->result_array();
	
	$bc1 = ($seg1 == TRUE) ? '<a href="'.$base_url.'">'.$page[0]['title'].'</a>' : $page[0]['title']; // first breadcrumb
	$bc2 = ($seg2 == TRUE && !is_numeric($seg2)) ? '<a href="'.$base_url.$page[1]['slug'].'">'.$page[1]['title'].'</a>' : $page[1]['title']; // second breadcrumb
	
	// separate the modules
	if (file_exists($module_path . 'gallery') && $seg2 == TRUE) {
		$urls = $CI->config->item('gallery_urls');
		if ($seg1 == $urls[$lang]) { $bc3 = $CI->db->get_where('gallery', array('slug' => $seg2, 'lang' => $lang), 1)->row()->title; }
	}
	if (file_exists($module_path . 'news') && $seg2 == TRUE) {
		$urls = $CI->config->item('news_urls');
		if ($seg1 == $urls[$lang]) { $bc3 = $CI->db->get_where('news', array('slug' => $seg2, 'lang' => $lang), 1)->row()->title; }
	}
	if (file_exists($module_path . 'articles') && $seg2 == TRUE) {
		$urls = $CI->config->item('articles_urls');
		if ($seg1 == $urls[$lang]) {
			$bc3 = $CI->db->get_where('articles_categories', array('slug' => $seg2, 'lang' => $lang), 1)->row();
			$bc3 = ($seg3 == TRUE && !is_numeric($seg3)) ? '<a href="'.$base_url.$urls[$lang].'/'.$bc3->slug.'">'.$bc3->title.'</a>' : $bc3->title; // third breadcrumb		
			$bc4 = $CI->db->get_where('articles', array('slug' => $seg3, 'lang' => $lang), 1)->row()->title; 
		}
	}
	
	// generate the breadcrumbs
	if ($total == 0) {
		$bc = $bc1;
	} else if ($total == 1 or is_numeric($seg2)) {
		$bc = $bc1 . $delimiter . $bc2;
	} else if ($total == 2 || is_numeric($seg3)) {
		$bc = $bc1 . $delimiter . $bc2 . $delimiter . $bc3;
	} else if ($total == 3 || !is_numeric($seg3)) {
		$bc = $bc1 . $delimiter . $bc2 . $delimiter . $bc3 . $delimiter . $bc4;
	}
	
	return $bc;
}

/* End of file breadcrumbs_helper.php */
/* Location: ./application/helpers/breadcrumbs_helper.php */
<?php
class Pagemodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}	
		
	// get page by slug. if slug(first uri segment) is not available, get homepage of the current language
	function get_page($data = FALSE)
	{
		if ($data == FALSE) {
			$slug = $this->uri->segment(1);
			if ($slug == FALSE) {
				$slug = '/';	
			}
		} else if ($data == TRUE && is_numeric($data)) {
			$slug = $this->uri->segment($data);
		} else {
			$slug = $data;
		}
		
		$this->db->select('title, text, seo_title, seo_page_title, slug, meta_keywords, meta_description, tpl');
		return $this->db->get_where('pages', array('slug'=>$slug, 'lang'=>$this->config->item('language_abbr')), 1)->row();
	}
}
?>
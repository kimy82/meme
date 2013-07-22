<?php
class Adminmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}	
	
	function save($id = FALSE) {
		
		$id = $this->uri->segment(4);
		
		$data = array(
					  'title' => $this->input->post('title'),
					  'text' => $this->input->post('text'),
					  'seo_title' => $this->input->post('seo_title'),
					  'seo_page_title' => $this->input->post('seo_page_title'),
					  'slug' => $this->input->post('slug'),
					  'meta_keywords' => $this->input->post('meta_keywords'),
					  'meta_description' => $this->input->post('meta_description'),
					  'lang' => $this->input->post('lang'),
					  'tpl' => $this->input->post('template'),
					  );
		
		if ($id == FALSE) {
			$this->db->set($data);
			$this->db->insert('pages');
		} else {
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('pages');
		}
	}
}
?>
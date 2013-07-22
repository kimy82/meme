<?php
class Adminmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_item_by_id($id)
	{
		$this->db->select('
						  news.*,
						  news_images.name AS image
						  ');		
		$this->db->from('news');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = 1) AS news_images', 'news_images.item_id = news.id', 'left'); 
		$this->db->order_by('news.date', 'desc');
		$this->db->where(array('news.id' => $id), 1);
		return $this->db->get()->row();
	}
	
	function save($id = FALSE)
	{
		
		$id = $this->uri->segment(4);
		
		$data = array(
					  'title' => $this->input->post('title'),
					  'short_text' => $this->input->post('short_text'),
					  'text' => $this->input->post('text'),
					  'date' => $this->input->post('date'),
					  'time' => $this->input->post('time'),
					  'video' => $this->input->post('video'),					  
					  'slug' => $this->input->post('slug'),
					  'seo_title' => $this->input->post('seo_title'),
					  'seo_page_title' => $this->input->post('seo_page_title'),
					  'meta_keywords' => $this->input->post('meta_keywords'),
					  'meta_description' => $this->input->post('meta_description'),
					  'status' => $this->input->post('status'),
					  'lang' => $this->input->post('lang'),
					  );
				
		if ($id == FALSE) {
			$this->db->set($data);
			$this->db->insert('news');
		} else {
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('news');
		}
	}
}
?>
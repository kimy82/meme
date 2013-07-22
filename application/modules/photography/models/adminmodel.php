<?php
class Adminmodel extends CI_Model
{
    
        var $module_images_id = 8;
    
	function __construct()
	{
		parent::__construct();
	}
	
	function get_item_by_id($id)
	{
		$this->db->select('
						  photography.*,
						  photography_images.name AS image
						  ');		
		$this->db->from('photography');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = '.$this->module_images_id.') AS photography_images', 'photography_images.item_id = photography.id', 'left'); 
		$this->db->order_by('photography.date', 'desc');
		$this->db->where(array('photography.id' => $id), 1);
		return $this->db->get()->row();
	}
	
	function save($id = FALSE)
	{
		
		$id = $this->uri->segment(4);
		
		$data = array(
					  'title_es' => $this->input->post('title_es'),
					  'title_en' => $this->input->post('title_en'),
					  'text_es' => $this->input->post('text_es'),
					  'text_en' => $this->input->post('text_en'),
                                          'realized_by_collaborator' => $this->input->post('realized_by_collaborator'),
					  'customer' => $this->input->post('customer'),
					  'location' => $this->input->post('location'),
					  'year' => $this->input->post('year'),
					  'area' => $this->input->post('area'),
					  'photographer' => $this->input->post('photographer'),
					  'team' => $this->input->post('team'),
					  'date' => $this->input->post('date'),
					  'slug_es' => $this->input->post('slug_es'),
					  'slug_en' => $this->input->post('slug_en'),
					  'seo_title_es' => $this->input->post('seo_title_es'),
					  'seo_title_en' => $this->input->post('seo_title_en'),
					  'seo_page_title_es' => $this->input->post('seo_page_title_es'),
					  'seo_page_title_en' => $this->input->post('seo_page_title_en'),
					  'meta_keywords_es' => $this->input->post('meta_keywords_es'),
					  'meta_keywords_en' => $this->input->post('meta_keywords_en'),
					  'meta_description_es' => $this->input->post('meta_description_es'),
					  'meta_description_en' => $this->input->post('meta_description_en'),
					  'status' => $this->input->post('status')
					  );
				
		if ($id == FALSE) {
			$this->db->set($data);
			$this->db->insert('photography');
		} else {
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('photography');
		}
	}
        
	function delete_image($id, $item_id, $position)
	{	
		$this->db->where('id', $id)->delete('images');
		
		$image_id = $this->db->order_by('position', 'asc');
		$image_id = $this->db->get_where('images', array('module' => $this->module_images_id, 'item_id' => $item_id, 'position >' => 0), 1)->row()->id;	
		$data = array('position' => 1);
		$this->db->set($data)->where('id', $image_id)->update('images');	
	}        
}

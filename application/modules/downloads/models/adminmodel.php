<?php
class Adminmodel extends CI_Model
{
    
        var $module_images_id = 12;
    
	function __construct()
	{
		parent::__construct();
	}
	
	function get_item_by_id($id)
	{
		$this->db->select('
						  downloads.*,
						  downloads_images.name AS image,
						  downloads_pdf.name AS pdf
						  ');		
		$this->db->from('downloads');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = '.$this->module_images_id.') AS downloads_images', 'downloads_images.item_id = downloads.id', 'left'); 
		$this->db->join('acms_pdf AS downloads_pdf','downloads_pdf.item_id = acms_downloads.id' ,'left');
		$this->db->order_by('downloads.date', 'desc');
		$this->db->where(array('downloads.id' => $id), 1);
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
					  'year' => $this->input->post('year'),					 					 
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
			$this->db->insert('downloads');
		} else {
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('downloads');
		}
	}
        
	function delete_image_pdf($id, $item_id)
	{	
		System.out.print("pdf");
		
			$this->db->where('id', $id)->delete('images');
			$this->db->where('item_id', $item_id)->delete('pdf');
		
					
	}        
}

<?php
class Adminmodel extends CI_Model
{
    
        var $module_images_id = 7;
        
	function __construct()
	{
		parent::__construct();
	}
	
	function get_item_by_id($id)
	{
		$this->db->select('
						  blog.*,
						  blog_images.name AS image
						  ');		
		$this->db->from('blog');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = '.$this->module_images_id.') AS blog_images', 'blog_images.item_id = blog.id', 'left'); 
		$this->db->order_by('blog.date', 'desc');
		$this->db->where(array('blog.id' => $id), 1);
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
			$this->db->insert('blog');
		} else {
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('blog');
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
?>
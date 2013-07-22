<?php
class Commonmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get($table, $per_page = '', $segment = '')
	{
		$this->db->order_by('id desc');
		return $this->db->get($table, $per_page, $segment)->result();
	}
	
	function get_items_by_language($table)
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get_where($table, array('lang' => $this->config->item('language_abbr')))->result();		
	}
	
	function check_slug($table, $slug, $lang = FALSE)
	{
		$this->db->select('slug');
                
                $params = array();
                $params['slug'] = $slug;
                if($lang !== FALSE)
                    $params['lang'] = $lang;
		return $this->db->get_where($table, $params)->num_rows();
	}
        
	function check_slug_field($table, $slug_field, $slug, $lang = FALSE)
	{
		$this->db->select($slug_field);
                
                $params = array();
                $params[$slug_field] = $slug;
                if($lang !== FALSE)
                    $params['lang'] = $lang;
		return $this->db->get_where($table, $params)->num_rows();
	}        
	
	function get_slug_by_id($table, $id) {
		$this->db->select('slug');
		return $this->db->get_where($table, array('id' => $id))->row()->slug;
	}	
        
	function get_slug_field_by_id($table, $slug_field, $id) {
		$this->db->select($slug_field);
		return $this->db->get_where($table, array('id' => $id))->row()->{$slug_field};
	}        
	
	function get_item_by_id($table, $id)
	{
		return $this->db->get_where($table, array('id' => $id))->row();
	}
	
	function get_item_by_title($table, $title)
	{
		return $this->db->get_where($table, array('title' => $title))->row();
	}	
	
	function get_item_by_slug($table, $slug)
	{
		return $this->db->get_where($table, array('slug' => $slug))->row();
	}	
	
	function insert($table, $data)
	{
		$this->db->set($data);
		$this->db->insert($table);
	}
	
	function update($table, $id, $data)
	{
		$this->db->update($table, $data, array('id'=>$id));
	}
	
	function delete($table, $id, $module = FALSE, $module_id = FALSE)
	{
		$this->db->where('id', $id)->delete($table);
	}
	
	function get_images($id, $module, $limit = 999, $offset = 0)
	{
		$this->db->select('id, name, date, time, title, text, position, layout');
		$this->db->order_by('position', 'asc');
		$this->db->order_by('date', 'desc');
		return $this->db->get_where('images', array('item_id' => $id, 'module' => $module), $limit, $offset)->result();
	}
	function get_images_pdf($id, $module, $limit = 999, $offset = 0)
	{
		$this->db->select('id, name, date, time, title, text, position, layout');
		$this->db->order_by('id', 'asc');
		return $this->db->get_where('images', array('item_id' => $id, 'module' => $module), $limit, $offset)->result();
	}
	function get_pdfs($id, $limit = 999, $offset = 0)
	{
		$this->db->select('id,item_id, name');
		$this->db->order_by('id', 'asc');
		return $this->db->get_where('pdf', array('item_id' => $id), $limit, $offset)->result();
	}
	
	function save_image($image, $item_id, $module, $title = '', $layout = '', $text = '', $description = '',$status = 1, $date = '', $time = '')
	{
		$this->db->select_max('position');
		$position = $this->db->get_where('images', array('item_id' => $item_id, 'module' => $module))->row()->position;
		$data = array(
					  'module' => $module,
					  'item_id' => $item_id,
					  'name' => $image,
                                          'layout' => $layout,
					  'date' => date('Y-m-d'),
					  'time' => date('H:i:s'),
					  'title' => $title,
					  'text' => $text,
					  'status' => $status,
					  'position' => $position + 1
					  );
		$this->db->insert('images', $data);
	}
	
	function save_pdf($image, $item_id)
	{
		$this->db->select_max('position');	
		$data = array(					 
					  'item_id' => $item_id,
					  'name' => $image                      					  
					  );
		$this->db->insert('pdf', $data);
	}
	
	function delete_images($item_id, $module)
	{
		$this->db->where(array('item_id' => $item_id, 'module' => $module))->delete('images');
	}
	
	function delete_pdf($item_id)
	{
		$this->db->where(array('item_id' => $item_id))->delete('pdf');
	}
	function delete_image($id, $module)
	{
		$this->db->where('id', $id)->delete('images');
	}
	
	function encrypt($data)
	{
		 return sha1($this->config->item('encryption_key').$data);
	}	
}
?>
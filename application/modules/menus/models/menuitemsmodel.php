<?php
class Menuitemsmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_items_by_id($menu_id)
	{
		$this->db->order_by('position', 'asc');
		return $this->db->get_where('menu_items', array('menu_id' => $menu_id))->result();
	}	
	
	function new_position()
	{
		$this->db->select_max('position');
		return $this->db->get_where('menu_items', array('menu_id' => $this->uri->segment(3)))->row()->position + 1;	
	}
	
	function insert()
	{
		$data = array(
						'menu_id' => $this->uri->segment(3),
						'title' => $this->input->post('new_title'),
						'url' => $this->input->post('new_url'),
						'position' => $this->new_position(),
						'status' => $this->input->post('new_status'),
						'target' => $this->input->post('new_target'),					 
					  );
		$this->db->insert('menu_items', $data);
	}
}
?>
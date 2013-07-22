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
					  'identifier' => $this->input->post('identifier'),
					  'text' => $this->input->post('text'),
					  'lang' => $this->input->post('lang'),
					  );
				
		if ($id == FALSE) {
			$this->db->set($data);
			$this->db->insert('menus');
		} else {
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('menus');
		}
	}
	
}
?>
<?php
class Adminmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function process($id = FALSE, $type = 'save') {
		
		$id = $this->uri->segment(4);
		
		$identifier = $this->input->post('identifier');
		$lang = $this->input->post('lang');
		$data = array(
					  'identifier' => $identifier,
					  'text' => $this->input->post('text'),
					  'lang' => $lang
					  );
					  		
		switch ($type) {
			case 'save':
				$this->db->set($data);
				$this->db->insert('labels');			
			break;
			case 'update':
				$this->db->set($data);
				$this->db->where('id', $id);
				$this->db->update('labels');
			break;
			case 'delete':
				$result = $this->db->get_where('labels', array('id' => $id), 1)->row();
				$identifier = $result->identifier;
				$lang = $result->lang;
				
				$this->db->where('id', $id);
				$this->db->delete('labels');
			break;
		}
		
		$this->cache->delete('label_'.$identifier.'_'.$lang);
	}
}
?>
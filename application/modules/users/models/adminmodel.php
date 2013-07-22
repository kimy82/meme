<?php
class Adminmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_all_items($per_page = '', $segment = '')
	{
		$this->db->select('
						  cms_users.id,
						  cms_users.group_id,
						  cms_users.username,
						  cms_users.name,
						  groups.description AS user_group_title,
						  ');
		$this->db->order_by('cms_users.id', 'desc');
		$this->db->from('cms_users');
		if ($this->session->userdata('group_id') != 4) {
			$this->db->where('groups.id !=', 4);
		}
		$this->db->join('groups', 'groups.id = cms_users.group_id', 'left');
		$this->db->limit($per_page, $segment);
		return $this->db->get()->result();
	}
	
	function get_groups($role = FALSE)
	{
		//select groups without developer
		$this->db->select('id, title, description');
		$role = $this->session->userdata('group_id');
		if ($role == 4) {
			return $this->db->get_where('groups', array('id >' => 2))->result();	
		} else {
			return $this->db->get_where('groups', array('id' => 3))->result();	
		}
	}
	
	function check_username($username)
	{
		$this->db->select('username');
		return $this->db->get_where('cms_users', array('username' => $username))->num_rows();
	}
	
	function encrypt_password($data)
	{
		 return sha1($this->config->item('encryption_key').$data);
	}
	
	function get_user_password_by_id($id)
	{
		$this->db->select('password');
		return $this->db->get_where('cms_users', array('id' => $id))->row()->password;
	}
	
	function get_item_by_username($username)
	{
		$this->db->select('id, username, name');
		return $this->db->get_where('cms_users', array('username' => $username))->row();
	}
	
	function get_item_by_id($id)
	{
		$this->db->select('id, username, name');
		return $this->db->get_where('cms_users', array('id' => $id))->row();
	}	
	
	function save($id = FALSE) {
		
		$id = ($this->uri->segment(3) == 'profile') ? $this->session->userdata('user_id') : $this->uri->segment(4);
		$password = $this->input->post('password');
		
		$data = array(
					  'username' => $this->input->post('username'),
					  'name' => $this->input->post('name'),
					  );
				
		if ($id == FALSE) {
			$data['password'] = $this->encrypt_password($password);
			$data['group_id'] = $this->input->post('group');
			
			$this->db->set($data);
			$this->db->insert('cms_users');
		} else if ($id == true || $this->uri->segment(3) == 'profile') {
			if ($password != false) {
				$data['password'] = $this->encrypt_password($password);
			}
			if ($this->uri->segment(3) != 'profile') {
				$data['group_id'] = $this->input->post('group');
			}
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('cms_users');
		}
	}	
	
}
?>
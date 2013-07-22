<?php

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language($this->config->item('admin_language'), $this->config->item('admin_language'));
		$this->template->set('controller', $this);
		$this->load->model('commonmodel');
		$this->load->model('adminmodel');
		//$this->output->enable_profiler(TRUE);
	}
	
	private $table = 'cms_users';
	private $per_page = 30;
	private $rules = array(
									array(
										'field'   => 'username',
										'label'   => 'lang:username',
										'rules'   => 'trim|required|valid_email|callback__check_username',
									),
									array(
										'field'   => 'password',
										'label'   => 'lang:password',
										'rules'   => 'trim|required|min_length[8]',
									),
									array(
										'field'   => 'password2',
										'label'   => 'lang:confirm_password',
										'rules'   => 'trim|required|matches[password]',
									),
									array(
										'field'   => 'name',
										'label'   => 'lang:name',
										'rules'   => 'trim|required',
									),
									array(
										'field'   => 'group',
										'label'   => 'lang:user_group',
										'rules'   => 'trim',
									),									
								);			
	
	function index($num = 0)
	{
		$this->auth->restrict(2);
		
		#create pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/users';
		$config['total_rows'] = $this->db->count_all($this->table);
		$config['per_page'] = $this->per_page;
		$this->pagination->initialize($config);
		
		$data['query'] = $this->adminmodel->get_all_items($config['per_page'], $num);		
		$this->template->load_partial('admin/admin_master', 'admin/index', $data);
	}	
	
	function create()
	{	
		$this->auth->restrict(2);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		$data['groups'] = $this->adminmodel->get_groups();

		if ($this->form_validation->run() == FALSE)
		{	
			$this->template->load_partial('admin/admin_master', 'admin/form', $data);
		} else {
			$this->adminmodel->save();
			$this->session->set_flashdata('info', $this->lang->line('success_insert'));
			redirect(base_url() . 'admin/users');			
		}
	}
	
	function edit($id)
	{
		$this->auth->restrict(3);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_rules('password', 'lang:password', 'trim|min_length[8]|matches[password2]');
		$this->form_validation->set_rules('password2', 'lang:confirm_password', 'trim|matches[password]');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');		
		$data['groups'] = $this->adminmodel->get_groups();	
		
		if (!$this->input->post('submit')) {
				$data['query'] = $this->commonmodel->get_item_by_id($this->table, $id);
				$this->template->load_partial('admin/admin_master', 'admin/form', $data);
		} else {
			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load_partial('admin/admin_master', 'admin/form', $data);
			}
			else
			{
				$this->adminmodel->save();
				$this->session->set_flashdata('info', $this->lang->line('success_edit'));
				redirect(base_url() . 'admin/users');					
			}
		}			
	}
       
	
	function profile()
	{
		$this->auth->restrict(1);
		
		$id = $this->session->userdata('user_id');

		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_rules('password', 'lang:password', 'trim|min_length[8]|matches[password2]');
		$this->form_validation->set_rules('password2', 'lang:confirm_password', 'trim|matches[password]');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');		
		$data['groups'] = $this->adminmodel->get_groups();
		
		if (!$this->input->post('submit')) {
				$data['query'] = $this->commonmodel->get_item_by_id($this->table, $id);
				$this->template->load_partial('admin/admin_master', 'admin/form', $data);
		} else {
			if ($this->form_validation->run($this) == FALSE)
			{
				$this->template->load_partial('admin/admin_master', 'admin/form', $data);
			}
			else
			{
				$this->adminmodel->save();
				$this->session->set_flashdata('info', $this->lang->line('success_edit'));
				redirect(base_url() . 'admin/users');					
			}
		}
	}	
	
	function delete($id)
	{
		$this->auth->restrict(2);
		$this->commonmodel->delete($this->table, $id);
		$this->session->set_flashdata('info', $this->lang->line('success_delete'));
		redirect(base_url() . 'admin/users');	
	}	
	
	function _check_username($str)
	{
		$id = ($this->uri->segment(3) == 'profile') ? $this->session->userdata('user_id') : $this->uri->segment(4);
		
		if ($id == FALSE) {
			if ($this->adminmodel->check_username($str) == 0) {
				return true;
			} else {
				$this->form_validation->set_message('_check_username', $this->lang->line('username_exist'));
				return false;
			}		
		} else if ($id == true || $this->uri->segment(3) == 'profile') {
			if ($this->adminmodel->check_username($str) == 0) {
				return true;
			} else {
				if ($str == $this->adminmodel->get_item_by_id($id)->username) {
					return true;
				} else {
					$this->form_validation->set_message('_check_username', $this->lang->line('username_exist'));
					return false;
				}
			}	
		}

	}
}
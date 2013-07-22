<?php

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language($this->config->item('admin_language'), $this->config->item('admin_language'));
		$this->template->set('controller', $this);	
		$this->load->model('commonmodel');		
	}	
	
	private $per_page = 30; 
	private $table = 'menus';
	private $rules = array(
								array(
									'field'   => 'lang',
									'label'   => 'lang:language',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'identifier',
									'label'   => 'lang:identifier',
									'rules'   => 'trim|required',
								),
								array(
									'field'   => 'text',
									'label'   => 'lang:title',
									'rules'   => 'trim',
								),
							);		
	
	function index($num = 0)
	{
		$this->auth->restrict(3); //restrict access to admin and above
		
		#create pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/menus';
		$config['total_rows'] = $this->db->count_all($this->table);
		$config['per_page'] = $this->per_page;
		$this->pagination->initialize($config);
		
		$data['query'] = $this->commonmodel->get($this->table, $config['per_page'], $num);
		
		$this->template->set('title', $this->lang->line('view_menus'));
		$this->template->load_partial('admin/admin_master', 'admin/index', $data);
	}
	
	// create new menu
	function create()
	{	
		$this->auth->restrict(4);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		$this->template->set('title', $this->lang->line('add_menu'));

		if ($this->form_validation->run() == FALSE)
		{	
			$this->template->load_partial('admin/admin_master', 'admin/menu_form');
		} else {
			$this->load->model('adminmodel');
			$this->adminmodel->save();

			$this->session->set_flashdata('info', $this->lang->line('success_insert'));
			redirect(base_url() . 'admin/menus/');	
		}
	}
	
	// edit menu
	function edit($id)
	{		
		$this->auth->restrict(3);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');		
		$this->template->set('title', $this->lang->line('edit_menu'));
		
		if (!$this->input->post('submit')) {
				$data['query'] = $this->commonmodel->get_item_by_id($this->table, $id);
				$this->template->load_partial('admin/admin_master', 'admin/menu_form', $data);
		} else {
			// validate page and update data
			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load_partial('admin/admin_master', 'admin/menu_form');
			}
			else
			{
				$this->load->model('adminmodel');
				$this->adminmodel->save();

				$this->session->set_flashdata('info', $this->lang->line('success_edit'));
				redirect(base_url() . 'admin/menus/');	
			}
		}			
	}
	
	// delete menu
	function delete($id)
	{
		$this->auth->restrict(4);
		$this->commonmodel->delete($this->table, $id);
		$this->session->set_flashdata('info', $this->lang->line('success_delete'));
		redirect(base_url() . 'admin/menus/');	
	}
}
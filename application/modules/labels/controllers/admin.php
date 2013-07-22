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
	
	private $table = 'labels';
	private $per_page = 30;
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
		$config['base_url'] = $this->config->item('base_url') . 'admin/labels';
		$config['total_rows'] = $this->db->count_all($this->table);
		$config['per_page'] = $this->per_page;
		$this->pagination->initialize($config);
		
		$data['query'] = $this->commonmodel->get($this->table, $config['per_page'], $num);		
		$this->template->load_partial('admin/admin_master', 'admin/index', $data);
	}
	
	function create()
	{
		$this->auth->restrict(4);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');

		if ($this->form_validation->run() == FALSE)
		{	
			$this->template->load_partial('admin/admin_master', 'admin/form');
		} else {		
			$this->adminmodel->process();
			$this->session->set_flashdata('info', $this->lang->line('success_insert'));
			redirect($this->config->item('base_url') . 'admin/labels');			
		}
	}
	
	function edit($id)
	{
		$this->auth->restrict(3);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');		
		
		if (!$this->input->post('submit')) {
				$data['query'] = $this->commonmodel->get_item_by_id($this->table, $id);
				$this->template->load_partial('admin/admin_master', 'admin/form', $data);
		} else {
			// validate page and update data
			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load_partial('admin/admin_master', 'admin/form');
			}
			else
			{
				$this->adminmodel->process($id, 'update');
				$this->session->set_flashdata('info', $this->lang->line('success_edit'));
				redirect($this->config->item('base_url') . 'admin/labels');				
			}
		}			
	}
	
	function delete($id)
	{
		$this->auth->restrict(4);
		
		$this->adminmodel->process($id, 'delete');
		$this->session->set_flashdata('info', $this->lang->line('success_delete'));
		redirect($this->config->item('base_url') . 'admin/labels');			
	}
}
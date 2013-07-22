<?php
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language($this->config->item('admin_language'), $this->config->item('admin_language'));
		$this->auth->restrict(3);
		$this->template->set('controller', $this);
		$this->load->model('commonmodel');
		//$this->output->enable_profiler(TRUE);
	}
	
	private $rules = array(
						array(
							'field'   => 'lang',
							'label'   => 'lang:language',
							'rules'   => 'trim',
						),
						array(
							'field'   => 'title',
							'label'   => 'lang:title',
							'rules'   => 'required',
						),
						array(
							'field'   => 'slug',
							'label'   => 'lang:url',
							'rules'   => 'required|callback__check_slug',
						),
						array(
							'field'   => 'homepage',
							'label'   => 'lang:homepage',
							'rules'   => 'trim',
						),
						array(
							'field'   => 'status',
							'label'   => 'lang:published',
							'rules'   => 'trim',
						),
						array(
							'field'   => 'seo_page_title',
							'label'   => 'lang:seo_browser_title',
							'rules'   => 'trim',
						),
						array(
							'field'   => 'seo_title',
							'label'   => 'lang:seo_h1_title',
							'rules'   => 'trim',
						),
						array(
							'field'   => 'meta_keywords',
							'label'   => 'lang:meta_keywords',
							'rules'   => 'trim',
						),
						array(
							'field'   => 'meta_description',
							'label'   => 'lang:meta_description',
							'rules'   => 'trim',
						),
						array(
							'field'   => 'template',
							'label'   => 'lang:template',
							'rules'   => 'trim',
						),
						array(
							'field'   => 'text',
							'label'   => 'lang:text',
							'rules'   => 'trim',
						),
					);
		
	private $per_page = 30;
	private $table = 'pages';
	
	function index($num = 0)
	{
		$this->load->library('pagination');
		$config['base_url'] = $this->config->item('base_url') . 'admin/pages';
		$config['total_rows'] = $this->db->count_all($this->table);
		$config['per_page'] = $this->per_page;
		$this->pagination->initialize($config);
		
		$data['query'] = $this->commonmodel->get($this->table, $config['per_page'], $num);
		$this->template->load_partial('admin/admin_master', 'admin/index', $data);
	}
	
	function create()
	{	
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');

		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->helper($this->config->item('wysiwyg'));
			$this->template->load_partial('admin/admin_master', 'admin/form');
		} else {
			$this->load->model('adminmodel');
			$this->adminmodel->save();
			$this->session->set_flashdata('info', $this->lang->line('success_insert'));
			redirect($this->config->item('base_url') . 'admin/pages');
		}
	}
	
	function edit($id)
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');		
		
		if (!$this->input->post('submit')) {
				$this->load->helper($this->config->item('wysiwyg'));
				$data['query'] = $this->commonmodel->get_item_by_id($this->table, $id);
				$this->template->load_partial('admin/admin_master', 'admin/form', $data);
		} else {
			// validate page and update data
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->helper($this->config->item('wysiwyg'));
				$this->template->load_partial('admin/admin_master', 'admin/form');
			}
			else
			{
				$this->load->model('adminmodel');
				$this->adminmodel->save();
				$this->session->set_flashdata('info', $this->lang->line('success_edit'));
				redirect($this->config->item('base_url') . 'admin/pages');
			}
		}			
	}
	
	function delete($id)
	{
		$this->commonmodel->delete($this->table, $id);
		$this->session->set_flashdata('info', $this->lang->line('page') . ' ' . $this->lang->line('success_delete'));
		redirect($this->config->item('base_url') . 'admin/pages');
	}
	
	function _check_slug($str)
	{	
		$slug = trim(url_title($str, 'dash', TRUE));
		$id = $this->uri->segment(4);
		
		if ($id == FALSE) {
			// if creating a new item, check if slug already exists
			if ($this->commonmodel->check_slug($this->table, $slug, $this->input->post('lang')) == 0) {
				return true;
			} else {
				$this->form_validation->set_message('_check_slug', $this->lang->line("slug_error"));
				return false;
			} 
		} else {
			// if updating an item, check if slug is modified, and if already exists
			if ($this->commonmodel->check_slug($this->table, $slug, $this->input->post('lang')) == 0) {
				return true;
			} else {
				if ($slug == $this->commonmodel->get_slug_by_id($this->table, $id)) {
					return true;
				} else {
					$this->form_validation->set_message('_check_slug', $this->lang->line("slug_error"));
					return false;	
				}
			}		
		}
	}
}
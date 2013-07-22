<?php

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language($this->config->item('admin_language'), $this->config->item('admin_language'));
		$this->auth->restrict(3); //restrict access to admin and above
		$this->template->set('controller', $this);	
		$this->load->model('adminmodel');
		$this->load->model('commonmodel');
		//$this->output->enable_profiler(TRUE);
	}	
	
	var $per_page = 30;
	var $table = 'news';
	private $rules = array(
								array(
									'field'   => 'lang',
									'label'   => 'lang:language',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'date',
									'label'   => 'lang:date',
									'rules'   => 'trim|required',
								),
								array(
									'field'   => 'time',
									'label'   => 'lang:date',
									'rules'   => 'trim|required',
								),
								array(
									'field'   => 'title',
									'label'   => 'lang:title',
									'rules'   => 'trim|required',
								),
								array(
									'field'   => 'slug',
									'label'   => 'lang:url',
									'rules'   => 'trim|required|callback__check_slug',
								),
								array(
									'field'   => 'image',
									'label'   => 'lang:image',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'video',
									'label'   => 'lang:video',
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
									'field'   => 'short_text',
									'label'   => 'lang:short_text',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'text',
									'label'   => 'lang:long_text',
									'rules'   => 'trim|required',
								),
							);			
        
	function index($num = 0)
	{
		#create pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/news';
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
			$this->adminmodel->save();
	
			if (!basename($_FILES['userfile']['name']) == "") {
				$config['upload_path'] = './uploads/news/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size']	= '2048';
				
				$this->load->library('upload', $config);
				$this->upload->do_upload();	
				$upload_data = $this->upload->data();
				
				$id = $this->db->insert_id();
				$this->commonmodel->save_image($upload_data['file_name'], $id, 1, $upload_data['raw_name'], ($upload_data['image_width'] > $upload_data['image_height']) ? 'landscape' : 'portrait');
			}
				
			$this->session->set_flashdata('info', $this->lang->line('success_insert'));
			redirect(base_url() . 'admin/news');
		}
	}
	
	function edit($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
                $data = array();
                
		if (!$this->input->post('submit')) {
			$this->load->helper($this->config->item('wysiwyg'));
			$data['query'] = $this->adminmodel->get_item_by_id($id);
			$this->template->load_partial('admin/admin_master', 'admin/form', $data);
		} else {
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->helper($this->config->item('wysiwyg'));
				$this->template->load_partial('admin/admin_master', 'admin/form', $data);
			}
			else
			{
				$this->adminmodel->save($id);
				
				if (!basename($_FILES['userfile']['name']) == "") {
					$config['upload_path'] = './uploads/news/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size']	= '2048';
					
					$this->load->library('upload', $config);
					$this->upload->do_upload();	
					$upload_data = $this->upload->data();

					$this->commonmodel->delete_images($id, 1);
					$this->commonmodel->save_image($upload_data['file_name'], $id, 1, $upload_data['raw_name'], ($upload_data['image_width'] > $upload_data['image_height']) ? 'landscape' : 'portrait');
				}
					
				$this->session->set_flashdata('info', $this->lang->line('success_edit'));
				redirect('admin/news');
			}
		}
	}	
	
	function delete($id)
	{
		$this->commonmodel->delete($this->table, $id);
		$this->commonmodel->delete_images($id, 1);
		$this->session->set_flashdata('info', $this->lang->line('success_delete'));
		redirect(base_url() . 'admin/news');
	}
	
	
	// ajax - delete image from database
	function delete_news_image()
	{
		$id = $this->input->post('id');
		$this->commonmodel->delete_images($id, 1);
	}
	
	function _check_slug($str)
	{
		$slug = trim(url_title($str, 'dash', TRUE));
		$id = $this->uri->segment(4);

		// check if an item with the same slug already exists
		if ($this->commonmodel->check_slug($this->table, $slug, $this->input->post('lang')) == 0) {
			return true;
		} else {
			// if it does, check if the item is edited or newly submited
			if ($id == FALSE) {
				// if the item is new, show an error
				$this->form_validation->set_message('_check_slug', $this->lang->line("slug_error"));
				return false;
			} else {
				// if the item is edited, allow the currnet slug to be saved 
				// or show an error if the slug is changed to something already existing
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
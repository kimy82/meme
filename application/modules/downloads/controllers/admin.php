<?php

class Admin extends CI_Controller
{
        var $module_images_id = 12;
    
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
	var $table = 'downloads';
	private $rules = array(
								array(
									'field'   => 'date',
									'label'   => 'lang:date',
									'rules'   => 'trim|required',
								),
								array(
									'field'   => 'title_es',
									'label'   => 'lang:title',
									'rules'   => 'trim|required',
								),
								array(
									'field'   => 'title_en',
									'label'   => 'lang:title',
									'rules'   => 'trim|required',
								),            
								array(
									'field'   => 'slug_es',
									'label'   => 'lang:url',
									'rules'   => 'trim|required|callback__check_slug[slug_en]',
								),
								array(
									'field'   => 'slug_en',
									'label'   => 'lang:url',
									'rules'   => 'trim|required|callback__check_slug[slug_en]',
								),            
								array(
									'field'   => 'image',
									'label'   => 'lang:image',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'pdf',
									'label'   => 'PDF',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'status',
									'label'   => 'lang:published',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'seo_page_title_es',
									'label'   => 'lang:seo_browser_title',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'seo_page_title_en',
									'label'   => 'lang:seo_browser_title',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'seo_title_es',
									'label'   => 'lang:seo_h1_title',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'seo_title_en',
									'label'   => 'lang:seo_h1_title',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'meta_keywords_es',
									'label'   => 'lang:meta_keywords',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'meta_keywords_en',
									'label'   => 'lang:meta_keywords',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'meta_description_es',
									'label'   => 'lang:meta_description',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'meta_description_en',
									'label'   => 'lang:meta_description',
									'rules'   => 'trim',
								),
								array(
									'field'   => 'text_es',
									'label'   => 'lang:long_text',
									'rules'   => 'trim|required',
								),
								array(
									'field'   => 'text_en',
									'label'   => 'lang:long_text',
									'rules'   => 'trim|required',
								),
								array(
									'field'   => 'customer',
									'label'   => 'lang:customer',
									'rules'   => 'trim',
								),            								     
								array(
									'field'   => 'year',
									'label'   => 'lang:year',
									'rules'   => 'trim',
								),            								            						       								                  
							);		
	
	function index($num = 0)
	{
		#create pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/downloads';
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
	
                        $id = $this->db->insert_id();
                       
								$config['upload_path'] = './uploads/downloads/';
								$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
								$config['max_size']	= '5120';
				                                
								$this->load->library('upload', $config);
				                                
								for ($i=1; $i<=10; $i++) {
									if (basename($_FILES['image' . $i]['name'] != '')) {
										$this->upload->do_upload("image" . $i);	
										$upload_data = $this->upload->data();
										$description = $this->input->post('image_desc' . $i);
										$this->commonmodel->save_image($upload_data['file_name'], $id, $this->module_images_id, $upload_data['raw_name'], ($upload_data['image_width'] > $upload_data['image_height']) ? 'landscape' : 'portrait', $description);
									}
									if (basename($_FILES['pdf' . $i]['name'] != '')) {
											$this->upload->do_upload("pdf" . $i);	
											$upload_data = $this->upload->data();											
											$this->commonmodel->save_pdf($upload_data['raw_name'], $id);
										}
								}	                                
                        
				
			$this->session->set_flashdata('info', $this->lang->line('success_insert'));
			redirect(base_url() . 'admin/downloads');
		}
	}
	
	
	
	function delete($id)
	{
		$this->commonmodel->delete($this->table, $id);
		$this->commonmodel->delete_images($id, $this->module_images_id);
		$this->commonmodel->delete_pdf($id);
		$this->session->set_flashdata('info', $this->lang->line('success_delete'));
		redirect(base_url() . 'admin/downloads');
	}
	
        
	function edit($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                $this->load->helper('image');
                
                $data['images'] = $this->commonmodel->get_images_pdf($id, $this->module_images_id);
				$data['pdfs'] = $this->commonmodel->get_pdfs($id, $this->module_images_id);
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
                                
                                $config['upload_path'] = './uploads/downloads/';
								$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
								$config['max_size']	= '5120';
				                                
								$this->load->library('upload', $config);
								
				                //numImages =  $this->input->post("numImages");
				               
								for ($i=1; $i<=10; $i++) {
									if (basename($_FILES['image' . $i]['name'] != '')) {
										$this->upload->do_upload("image" . $i);	
										$upload_data = $this->upload->data();
										$description = $this->input->post('image_desc' . $i);
										$this->commonmodel->save_image($upload_data['file_name'], $id, $this->module_images_id, $upload_data['raw_name'], ($upload_data['image_width'] > $upload_data['image_height']) ? 'landscape' : 'portrait', $description);
									}
									if (basename($_FILES['pdf' . $i]['name'] != '')) {
											$this->upload->do_upload("pdf" . $i);	
											$upload_data_pdf = $this->upload->data();											
											$this->commonmodel->save_pdf($upload_data_pdf['raw_name'], $id);
										}
								}	                                
                        
				
			$this->session->set_flashdata('info', $this->lang->line('success_insert'));
			redirect(base_url() . 'admin/downloads');
			}
		}                            
	}	
	       
        
		// ajax - delete image from database
	function delete_image_pdf()
	{
		$id = $this->input->post('id');
		echo $id;
		$item_id = $this->input->post('item_id');
		echo $item_id;
		
		$this->adminmodel->delete_image_pdf($id, $item_id);
	}	
	
		
}
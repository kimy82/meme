<?php

class Admin extends CI_Controller
{
        var $module_images_id = 8;
    
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
	var $table = 'photography';
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
									'field'   => 'location',
									'label'   => 'lang:location',
									'rules'   => 'trim',
								),            
								array(
									'field'   => 'year',
									'label'   => 'lang:year',
									'rules'   => 'trim',
								),            
								array(
									'field'   => 'area',
									'label'   => 'lang:area',
									'rules'   => 'trim',
								),            
								array(
									'field'   => 'photographer',
									'label'   => 'lang:photographer',
									'rules'   => 'trim',
								),            
								array(
									'field'   => 'team',
									'label'   => 'lang:team',
									'rules'   => 'trim',
								),                        
							);		
	
	function index($num = 0)
	{
		#create pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/photography';
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
                        $existing_images = isset($_POST['existing_images']) ? $_POST['existing_images'] : FALSE;
                        
                        if($existing_images!=FALSE) {
                            for($i=1; $i<=5; $i++) {
                                $field = trim($this->input->post('existing_image' . $i));
                                if(!empty($field)) {
                                    $layout = $this->input->post('existing_image_layout' . $i);
                                    $description = $this->input->post('existing_image_desc' . $i);
                                    $this->commonmodel->save_image($field, $id, $this->module_images_id, $field, $layout, $description);
                                }
                            }
                        } else {
				$config['upload_path'] = './uploads/photography/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size']	= '5120';
                                
				$this->load->library('upload', $config);
                                
				for ($i=1; $i<=5; $i++) {
					if (basename($_FILES['image' . $i]['name'] != '')) {
						$this->upload->do_upload("image" . $i);	
						$upload_data = $this->upload->data();
						$description = $this->input->post('image_desc' . $i);
						$this->commonmodel->save_image($upload_data['file_name'], $id, $this->module_images_id, $upload_data['raw_name'], ($upload_data['image_width'] > $upload_data['image_height']) ? 'landscape' : 'portrait', $description);
					}
				}	                                
                        }
				
			$this->session->set_flashdata('info', $this->lang->line('success_insert'));
			redirect(base_url() . 'admin/photography');
		}
	}
	
	function edit($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                $this->load->helper('image');
                
                $data['images'] = $this->commonmodel->get_images($id, $this->module_images_id);
		
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
                                
                                $existing_images = isset($_POST['existing_images']) ? $_POST['existing_images'] : FALSE;
                                if($existing_images != FALSE) {
                                    for($i=1; $i<=5; $i++) {
                                        $field = trim($this->input->post('existing_image' . $i));
                                        if(!empty($field)) {
                                            $layout = $this->input->post('existing_image_layout' . $i);
                                            $description = $this->input->post('existing_image_desc' . $i);
                                            $this->commonmodel->save_image($field, $id, $this->module_images_id, $field, $layout, $description);
                                        }
                                    }
                                } else {
                                        $config['upload_path'] = './uploads/photography/';
                                        $config['allowed_types'] = 'gif|jpg|jpeg|png';
                                        $config['max_size']	= '5120';

                                        $this->load->library('upload', $config);

                                        for ($i=1; $i<=5; $i++) {
                                                if (basename($_FILES['image' . $i]['name'] != '')) {
                                                        $this->upload->do_upload("image" . $i);	
                                                        $upload_data = $this->upload->data();
                                                        $description = $this->input->post('image_desc' . $i);
                                                        $this->commonmodel->save_image($upload_data['file_name'], $id, $this->module_images_id, $upload_data['raw_name'], ($upload_data['image_width'] > $upload_data['image_height']) ? 'landscape' : 'portrait', $description);
                                                }
                                        }	                                
                                }                                
					
				$this->session->set_flashdata('info', $this->lang->line('success_edit'));
				redirect('admin/photography');
			}
		}
	}	
	
	function delete($id)
	{
		$this->commonmodel->delete($this->table, $id);
		$this->commonmodel->delete_images($id, $this->module_images_id);
		$this->session->set_flashdata('info', $this->lang->line('success_delete'));
		redirect(base_url() . 'admin/photography');
	}
	
        
	// ajax - delete image from database
	function delete_photography_image()
	{
		$id = $this->input->post('id');
		$item_id = $this->input->post('item_id');
		$position = $this->input->post('position');
		$this->adminmodel->delete_image($id, $item_id, $position);
	}	
	
	// ajax - reorder images
	function reorder_images()
	{	
		$items = $this->input->post('items');
		$items = explode("&", $items);
		
		$i = 1;
		foreach ($items as $item) {	
			$id = explode("=", $item);
			$id = $id[1];
			$data["position"] = $i;

                        $this->db->update('images', $data, array('id'=>$id, 'module' => $this->module_images_id));
			$i++;
		}
	}
	
	// ajax - update image description
	function update_image()
	{
		$item_id = $this->input->post('item_id');
		$data['text'] = $this->input->post('text');
                $this->db->update('images', $data, array('id'=>$item_id, 'module' => $this->module_images_id));                
	}        
        
	
	function _check_slug($str, $field)
	{
		$slug = trim(url_title($str, 'dash', TRUE));
		$id = $this->uri->segment(4);

		// check if an item with the same slug already exists
		if ($this->commonmodel->check_slug_field($this->table, $field, $slug) == 0) {
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
				if ($slug == $this->commonmodel->get_slug_field_by_id($this->table, $field, $id)) {
					return true;
				} else {
					$this->form_validation->set_message('_check_slug', $this->lang->line("slug_error"));
					return false;	
				}
			}
		}
	}		
}
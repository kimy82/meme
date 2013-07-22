<?php

class Menuitems extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language($this->config->item('admin_language'), $this->config->item('admin_language'));
		$this->auth->restrict(3); //restrict access to admin and above
		$this->template->set('controller', $this);	
		$this->load->model('commonmodel');	
		$this->load->model('menuitemsmodel');
		$this->load->helper('form');
	}	
	
	private $table = 'menu_items';
	
	// list all items from menu
	function index($id = FALSE)
	{
		$count = count($_POST) > 0 ? isset($_POST['id']) ? count($_POST['id']) : 0 : 0;
                
		if ($this->input->post('submit')) {
			for ($i=0; $i<$count; $i++) {
				$id = $_POST['id'][$i];
				$data = array(
							'title' => mysql_real_escape_string($_POST['title'][$i]),
							'url' => mysql_real_escape_string($_POST['url'][$i]),
							'status' => isset($_POST['status'][$i]) ? $_POST['status'][$i] : 0,
							'target' => isset($_POST['target'][$i]) ? $_POST['target'][$i] : 0,
							);			
				$this->commonmodel->update('menu_items', $id, $data);
			}
			
			// if new menu item is entered, save it to database
			if ($this->input->post('new_title') != FALSE && $this->input->post('new_url') != FALSE) {
				$this->menuitemsmodel->insert();
			}

			// delete cache file
			$menudata = $this->commonmodel->get_item_by_id('menus', $this->uri->segment(3));
			$this->cache->delete('menu_'.$menudata->identifier.'_'.$menudata->lang);
			
			// show success message
			$this->session->set_flashdata('info', $this->lang->line('success_edit'));
			redirect($this->uri->uri_string());		
		
		} else if ($this->input->post('delete')) {
			// delete all selected items
			for ($i=0; $i<$count; $i++) {
				$id = mysql_real_escape_string($_POST['select'][$i]);
				$this->commonmodel->delete($this->table, $id);
			}
			
			// delete cache file
			$menudata = $this->commonmodel->get_item_by_id('menus', $this->uri->segment(3));
			$this->cache->delete('menu_'.$menudata->identifier.'_'.$menudata->lang);			
			
			// show success delete message
			$this->session->set_flashdata('info', $this->lang->line('success_edit'));
			redirect($this->uri->uri_string());	
		
		} else {
			$data['query'] = $this->menuitemsmodel->get_items_by_id($id);
			$this->template->set('title', $this->lang->line('view_menu_items'));	
			$this->template->load_partial('admin/admin_master', 'admin/index_items', $data);	
		}
	}
	
	function reorder()
	{
		$this->template->set('title', $this->lang->line('view_menu_items'));	
		$this->template->load_partial('admin/admin_master', 'admin/reorder');		
	}
	
	// ajax - reorder menu items
	function reorder_menuitems()
	{	
		$items = $this->input->post('items');
		$menu_id = $this->input->post('menu_id');

		$i = 0;
		foreach ($items as $item) {	
			$id = $item["item_id"];
			$data["position"] = $i;
			$parent = $item['parent_id'];
			$parent = ($parent == "root") ? $data["parent"] = 0 : $data["parent"] = $parent;

			$this->commonmodel->update('menu_items', $id, $data);
			$i++;
		}
		
		// delete cache file
		$menudata = $this->commonmodel->get_item_by_id('menus', $menu_id);
		$this->cache->delete('menu_'.$menudata->identifier.'_'.$menudata->lang);		
	}

}
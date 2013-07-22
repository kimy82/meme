<?php
class Downloadsmodel extends CI_Model
{
    
        var $module_images_id = 12;
    
	function __construct()
	{
		parent::__construct();
	}
        
        
	function get_all_downloads($per_page = 5, $segment = 2)
	{
		$this->db->select('
						  downloads.*,												
						  ');		
		$this->db->from('downloads');
		//$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = '.$this->module_images_id.') AS downloads_images', 'downloads_images.item_id = downloads.id', 'left'); 
		//$this->db->join('acms_pdf AS downloads_pdf','downloads_pdf.item_id = acms_downloads.id' ,'left');
		$this->db->order_by('downloads.date', 'desc');
		$this->db->where(array('downloads.status' => 1));
		$this->db->limit($per_page, $segment);
		return $this->db->get()->result();
		
		
	}
	
	function get_images_pdf(){
		$this->db->select('id, name, item_id, date, time, title, text, position, layout');
		$this->db->order_by('id', 'asc');
		return $this->db->get_where('images', array('module' => 12), 9999, 0)->result();
	}
	function get_pdfs(){
		$this->db->select('id,item_id, name');
		$this->db->order_by('id', 'asc');
		return $this->db->get_where('pdf', array(), 9999, 0)->result();	
	}
	
	function count_downloads()
	{
		return $this->db->get_where('downloads', array('status' => 1))->num_rows();
	}        
}

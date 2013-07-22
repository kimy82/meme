<?php
class Photographymodel extends CI_Model
{
    
        var $module_images_id = 8;
    
	function __construct()
	{
		parent::__construct();
	}	
	
        function list_photography()
        {
                $lang = $this->config->item('language_abbr');            
		$this->db->select('
                                photography.id, photography.title_'.$lang.' AS title, photography.slug_'.$lang.' AS slug
                            ');
		$this->db->order_by('photography.date', 'desc');                
		$this->db->from('photography');            
		$this->db->where(array('photography.status' => 1));
		return $this->db->get()->result();                
        }
        
        function list_photography_by_type($type)
        {
            $this->db->where('realized_by_collaborator', ($type == 'collaborator') ? '1' : '0');
            return $this->list_photography();
        }
        
        
	function get_all_photography($per_page = 5, $segment = 2)
	{
		$this->db->select('
							photography.*,
							photography_images.name AS image
						  ');
		$this->db->from('photography');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = '.$this->module_images_id.' ORDER BY position ASC) AS photography_images', 'photography_images.item_id = photography.id', 'left');
		$this->db->order_by('photography.date', 'desc');
		$this->db->where(array('photography.status' => 1));
		$this->db->limit($per_page, $segment);
		return $this->db->get()->result();
	}
	
	function count_photography()
	{
		return $this->db->get_where('news', array('status' => 1))->num_rows();
	}
        
	function get_images()
	{
                $lang = $this->config->item('language_abbr');            
		$photography_id = $this->db->get_where('photography', array('slug_'.$lang => $this->uri->segment(2)), 1)->row()->id;
		$this->db->order_by('position', 'asc');
		return $this->db->get_where('images', array('item_id' => $photography_id, 'module' => $this->module_images_id, 'status' => 1))->result();
	}	        
        
	function count_images()
	{
                $lang = $this->config->item('language_abbr');                        
		$photography_id = $this->db->get_where('photography', array('slug_'.$lang => $this->uri->segment(2)), 1)->row()->id;
		return $this->db->get_where('images', array('status' => 1, 'module' => $this->module_images_id, 'item_id' => $photography_id))->num_rows();
	}        
	
	function get_photography()
	{
                $lang = $this->config->item('language_abbr');
		$this->db->select('
                                    photography.*,
                                    photography_images.name AS image
                                ');
		$this->db->from('photography');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = '.$this->module_images_id.' ORDER BY position ASC) AS photography_images', 'photography_images.item_id = photography.id', 'left');
		$this->db->where(array('slug_'.$lang => $this->uri->segment(2)), 1);
		return $this->db->get()->row();		
	}
        
        function get_navigation($photography_id) 
        {
            $lang = $this->config->item('language_abbr');            
            $result = array();
            
            $this->db->select('photography.id');
            $this->db->from('photography');
            $this->db->where(array('photography.status' => 1));
            $this->db->order_by('photography.date', 'asc');
            
            $photography_query = $this->db->get();
            
            $result['total_count'] = $photography_query->num_rows();
            
            $photography = $photography_query->result();
            $trobat = FALSE;
            $i = 0;
            
            
            while(!$trobat && $i < $result['total_count'] )
            {

                if($photography[$i]->id == $photography_id) 
                    $trobat = TRUE;
                else
                    $i++;
            }
            $result['current_page'] = $i + 1;
            
            // get prev
            $this->db->select('photography.id, photography.slug_'.$lang.' AS slug, photography.title_'.$lang.' AS title');
            $this->db->from('photography');
            $this->db->where('photography.id <', $photography_id);
            $this->db->where(array('photography.status' => 1));            
            $this->db->order_by('photography.date', 'desc');
            $this->db->limit(1);
            $query_prev = $this->db->get();
            if($query_prev->num_rows() == 1)
                $result['prev'] = $query_prev->row();
            else
                $result['prev'] = FALSE;
            
            // get next
            $this->db->select('photography.id, photography.slug_'.$lang.' AS slug, photography.title_'.$lang.' AS title');
            $this->db->from('photography');
            $this->db->where('photography.id >', $photography_id);
            $this->db->where(array('photography.status' => 1));            
            $this->db->order_by('photography.date', 'asc');
            $this->db->limit(1);
            $query_next = $this->db->get();
            if($query_next->num_rows() == 1)
                $result['next'] = $query_next->row();
            else
                $result['next'] = FALSE;
            
            return $result;
        }
}

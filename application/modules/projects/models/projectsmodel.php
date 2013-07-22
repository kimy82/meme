<?php
class Projectsmodel extends CI_Model
{
    
        var $module_images_id = 6;
    
	function __construct()
	{
		parent::__construct();
	}	
	
        function list_projects()
        {
                $lang = $this->config->item('language_abbr');            
		$this->db->select('
                                projects.id, projects.title_'.$lang.' AS title, projects.slug_'.$lang.' AS slug
                            ');
		$this->db->order_by('projects.date', 'desc');                
		$this->db->from('projects');            
		$this->db->where(array('projects.status' => 1));
		return $this->db->get()->result();                
        }
        
        function list_projects_by_type($type)
        {
            $this->db->where('realized_by_collaborator', ($type == 'collaborator') ? '1' : '0');
            return $this->list_projects();
        }
        
        
	function get_all_projects($per_page = 5, $segment = 2)
	{
		$this->db->select('
							projects.*,
							projects_images.name AS image
						  ');
		$this->db->from('projects');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = '.$this->module_images_id.' ORDER BY position ASC) AS projects_images', 'projects_images.item_id = projects.id', 'left');
		$this->db->order_by('projects.date', 'desc');
		$this->db->where(array('projects.status' => 1));
		$this->db->limit($per_page, $segment);
		return $this->db->get()->result();
	}
	
	function count_projects()
	{
		return $this->db->get_where('news', array('status' => 1))->num_rows();
	}
        
	function get_images()
	{
                $lang = $this->config->item('language_abbr');            
		$project_id = $this->db->get_where('projects', array('slug_'.$lang => $this->uri->segment(2)), 1)->row()->id;
		$this->db->order_by('position', 'asc');
		return $this->db->get_where('images', array('item_id' => $project_id, 'module' => $this->module_images_id, 'status' => 1))->result();
	}	        
        
	function count_images()
	{
                $lang = $this->config->item('language_abbr');                        
		$project_id = $this->db->get_where('projects', array('slug_'.$lang => $this->uri->segment(2)), 1)->row()->id;
		return $this->db->get_where('images', array('status' => 1, 'module' => $this->module_images_id, 'item_id' => $project_id))->num_rows();
	}        
	
	function get_project()
	{
                $lang = $this->config->item('language_abbr');
		$this->db->select('
                                    projects.*,
                                    projects_images.name AS image
                                ');
		$this->db->from('projects');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = '.$this->module_images_id.' ORDER BY position ASC) AS projects_images', 'projects_images.item_id = projects.id', 'left');
		$this->db->where(array('slug_'.$lang => $this->uri->segment(2)), 1);
		return $this->db->get()->row();		
	}
        
        function get_navigation($project_id) 
        {
            $lang = $this->config->item('language_abbr');            
            $result = array();
            
            $this->db->select('projects.id');
            $this->db->from('projects');
            $this->db->where(array('projects.status' => 1));
            $this->db->order_by('projects.date', 'asc');
            
            $projects_query = $this->db->get();
            
            $result['total_count'] = $projects_query->num_rows();
            
            $projects = $projects_query->result();
            $trobat = FALSE;
            $i = 0;
            
            
            while(!$trobat && $i < $result['total_count'] )
            {

                if($projects[$i]->id == $project_id) 
                    $trobat = TRUE;
                else
                    $i++;
            }
            $result['current_page'] = $i + 1;
            
            // get prev
            $this->db->select('projects.id, projects.slug_'.$lang.' AS slug, projects.title_'.$lang.' AS title');
            $this->db->from('projects');
            $this->db->where('projects.id <', $project_id);
            $this->db->where(array('projects.status' => 1));            
            $this->db->order_by('projects.date', 'desc');
            $this->db->limit(1);
            $query_prev = $this->db->get();
            if($query_prev->num_rows() == 1)
                $result['prev'] = $query_prev->row();
            else
                $result['prev'] = FALSE;
            
            // get next
            $this->db->select('projects.id, projects.slug_'.$lang.' AS slug, projects.title_'.$lang.' AS title');
            $this->db->from('projects');
            $this->db->where('projects.id >', $project_id);
            $this->db->where(array('projects.status' => 1));            
            $this->db->order_by('projects.date', 'asc');
            $this->db->limit(1);
            $query_next = $this->db->get();
            if($query_next->num_rows() == 1)
                $result['next'] = $query_next->row();
            else
                $result['next'] = FALSE;
            
            return $result;
        }
}

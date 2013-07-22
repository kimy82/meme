<?php
class Blogmodel extends CI_Model
{
        var $module_images_id = 7;    
    
	function __construct()
	{
		parent::__construct();
	}	
	
	function get_all_posts()
	{
                $this->_prepare_query_parameters();
            
		$lang = $this->config->item('language_abbr');
		$this->db->select('
							blog.*,
							blog_images.name AS image
						  ');
		$this->db->from('blog');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = '.$this->module_images_id.') AS blog_images', 'blog_images.item_id = blog.id', 'left');
		$this->db->order_by('blog.date', 'desc');
		$this->db->where(array('blog.status' => 1, 'blog.lang' => $lang));
		//$this->db->limit($per_page, $segment);
		return $this->db->get()->result();
	}
	
	function count_posts()
	{
                $this->_prepare_query_parameters();            
		$lang = $this->config->item('language_abbr');
		return $this->db->get_where('blog', array('status' => 1, 'lang' => $lang))->num_rows();
	}
        
	function get_images()
	{
                $lang = $this->config->item('language_abbr');            
		$blog_id = $this->db->get_where('blog', array('slug' => $this->uri->segment(2), 'lang' => $lang), 1)->row()->id;
		$this->db->order_by('position', 'asc');
		return $this->db->get_where('images', array('item_id' => $blog_id, 'module' => $this->module_images_id, 'status' => 1))->result();
	}   
        
	function count_images()
	{
                $lang = $this->config->item('language_abbr');                        
		$blog_id = $this->db->get_where('blog', array('slug' => $this->uri->segment(2), 'lang' => $lang), 1)->row()->id;
		return $this->db->get_where('images', array('status' => 1, 'module' => $this->module_images_id, 'item_id' => $blog_id))->num_rows();
	}          
	
	function get_post()
	{
		$lang = $this->config->item('language_abbr');
		$this->db->select('
							blog.*,
							blog_images.name AS image
						  ');
		$this->db->from('blog');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = '.$this->module_images_id.' ORDER BY position ASC) AS blog_images', 'blog_images.item_id = blog.id', 'left');
		$this->db->where(array('slug' => $this->uri->segment(2), 'lang' => $lang), 1);
		return $this->db->get()->row();		
	}
        
	
	function get_rss_posts($num)
	{
		$lang = $this->config->item('language_abbr');
		$this->db->select('title, short_text, text, date, time, slug');
		$this->db->order_by('date', 'desc');
		return $this->db->get_where('blog', array('status' => 1, 'lang' => $lang), $num)->result();
	}		
        
        function _prepare_query_parameters()
        {
                if($this->uri->segment('3', FALSE) != FALSE)
                        $this->db->where('YEAR('.$this->db->dbprefix('blog').'.date)',$this->uri->segment('3'));
                if($this->uri->segment('4', FALSE) != FALSE)
                        $this->db->where('MONTH('.$this->db->dbprefix('blog').'.date)',$this->uri->segment('4'));
        }
}
?>
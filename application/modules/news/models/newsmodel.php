<?php
class Newsmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}	
	
	function get_all_news($per_page = 5, $segment = 2)
	{
		$lang = $this->config->item('language_abbr');
		$this->db->select('
							news.*,
							news_images.name AS image
						  ');
		$this->db->from('news');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = 1) AS news_images', 'news_images.item_id = news.id', 'left');
                $this->db->group_by('news.id');                
		$this->db->order_by('news.date', 'desc');
		$this->db->where(array('news.status' => 1, 'news.lang' => $lang));
		$this->db->limit($per_page, $segment);
		return $this->db->get()->result();
	}
	
	function count_news()
	{
		$lang = $this->config->item('language_abbr');
		return $this->db->get_where('news', array('status' => 1, 'lang' => $lang))->num_rows();
	}
	
	function get_news()
	{
		$lang = $this->config->item('language_abbr');
		$this->db->select('
							news.*,
							news_images.name AS image
						  ');
		$this->db->from('news');
		$this->db->join('(SELECT '.$this->db->dbprefix('images').'.* FROM '.$this->db->dbprefix('images').' WHERE '.$this->db->dbprefix('images').'.module = 1) AS news_images', 'news_images.item_id = news.id', 'left');
		$this->db->where(array('slug' => $this->uri->segment(2), 'lang' => $lang), 1);
		return $this->db->get()->row();		
	}
	
	function get_rss_news($num)
	{
		$lang = $this->config->item('language_abbr');
		$this->db->select('title, short_text, text, date, time, slug');
		$this->db->order_by('date', 'desc');
		return $this->db->get_where('news', array('status' => 1, 'lang' => $lang), $num)->result();
	}		
}
?>
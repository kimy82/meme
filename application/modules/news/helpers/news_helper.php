<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function latest_news($limit = 5, $offset = 0, $view = 'latest_news', $random = true)
{
	$CI =& get_instance();
	$CI->load->helper('image');
	$CI->load->helper('text');
        
	$lang = $CI->config->item('language_abbr');
	$CI->db->select('
					news.id, 
					news.title, 
					news.short_text, 
					news.text, 
					news.date, 
					news.time, 
					news.slug,
					news_images.name as image,
					news.video
					');
	$CI->db->join('(SELECT '.$CI->db->dbprefix('images').'.* FROM '.$CI->db->dbprefix('images').' WHERE '.$CI->db->dbprefix('images').'.module = 1) AS news_images', 'news_images.item_id = news.id', 'left');
	$random = ($random == FALSE) ? 'desc' : 'random';
        $CI->db->group_by('news.id');        
	$CI->db->order_by('id', $random);
	$data['query'] = $CI->db->get_where('news', array('news.status' => 1, 'news.lang' => $lang), $limit, $offset)->result();
	$CI->load->view($view, $data);
}

function get_news_url($slug)
{
	$CI =& get_instance();
	$langs = $CI->config->item('language_abbr');
	$urls = $CI->config->item('news_urls');
	
	$lang = ($langs == $CI->config->item('default_language')) ? '' : $langs . "/";
	
	echo base_url() . $lang . $urls[$langs] . "/" . $slug;
}

function video_viewer($video, $img_width=230)
{
	$CI =& get_instance();
	$CI->load->library('autoembed');
	$CI->load->helper('html');
	
	if($CI->autoembed->parseUrl($video) )
	{
		return img(array(
          'src' => $CI->autoembed->getImageURL(),
          'alt' => 'video',
          'width' => $img_width,
          'border' => 0
		));
	}
	else
	{
		return '';
	}
	
}

function embed_video($video)
{
	$CI =& get_instance();
	$CI->load->library('autoembed');
	
	if($CI->autoembed->parseUrl($video) )
	{
		return $CI->autoembed->getEmbedCode();
	}
	else
	{
		return '';
	}	
}

/* End of file news_helper.php */
/* Location: ./application/helpers/news_helper.php */
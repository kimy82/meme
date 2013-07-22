<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function blog_menu($view = 'blog/blog_menu')
{
    $CI =& get_instance();
    
    $CI->db->distinct();
    $CI->db->select('YEAR(date) AS year, MONTH(date) AS month');
    $CI->db->order_by('date','desc');
    
    $data = array();    
    $data['query'] = $CI->db->get('blog')->result();
    
    $CI->load->view($view, $data);
}


function latest_posts($limit = 5, $offset = 0, $view = 'latest_posts', $random = true)
{
	$CI =& get_instance();
	$CI->load->helper('image');
	$CI->load->helper('text');
        $CI->load->model('commonmodel');
        
	$lang = $CI->config->item('language_abbr');
	$CI->db->select('
					blog.id, 
					blog.title, 
					blog.short_text, 
					blog.text, 
					blog.date, 
					blog.time, 
					blog.slug,
					blog.video
					');
	//$random = ($random == FALSE) ? 'desc' : 'random';
	$CI->db->order_by('blog.date DESC, blog.time DESC');
        
        $results = $CI->db->get_where('blog', array('blog.status' => 1, 'blog.lang' => $lang), $limit, $offset)->result();
        
        // per a cada post, consultar les imatges. Una mica greedy, però hi ha pocs posts
        foreach($results as $kpost => $post) {
            $results[$kpost]->images = $CI->commonmodel->get_images($post->id, 7);
        }
        
        $data['query'] = $results;
	$CI->load->view($view, $data);
}

function get_post_url($slug)
{
	$CI =& get_instance();
	$langs = $CI->config->item('language_abbr');
	$urls = $CI->config->item('posts_urls');
	
	$lang = ($langs == $CI->config->item('default_language')) ? '' : $langs . "/";
	
	echo base_url() . $lang . $urls[$langs] . "/" . $slug;
}

function blog_video_viewer($video, $img_width=230)
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

function blog_embed_video($video)
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

/* End of file blog_helper.php */
/* Location: ./application/helpers/blog_helper.php */
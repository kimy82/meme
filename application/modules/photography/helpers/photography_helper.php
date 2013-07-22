<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function latest_photography($limit = 5, $offset = 0, $view = 'photography/latest_photography', $random = true)
{
	$CI =& get_instance();
	$CI->load->helper('image');
	$CI->load->helper('text');
        
	$lang = $CI->config->item('language_abbr');
	$CI->db->select('
					photography.id, 
					photography.title_'.$lang.' AS title, 
					photography.text_'.$lang.' AS text, 
					photography.date, 
					photography.slug_'.$lang.' AS slug,
					photography_images.name as image,
                                        photography.customer,
                                        photography.location,
                                        photography.year,
                                        photography.area,
                                        photography.photographer,
                                        photography.team
					');
        $CI->db->join('(SELECT '.$CI->db->dbprefix('images').'.* FROM '.$CI->db->dbprefix('images').' WHERE '.$CI->db->dbprefix('images').'.module = 8 ORDER BY position ASC) AS photography_images', 'photography_images.item_id = photography.id', 'left');         
	//$random = ($random == FALSE) ? 'desc' : 'random';
	$CI->db->order_by('date', 'desc');
        $CI->db->group_by('photography.id');
	$data['query'] = $CI->db->get_where('photography', array('photography.status' => 1), $limit, $offset)->result();
	$CI->load->view($view, $data);
}

function get_photography_url($slug, $out=TRUE)
{
	$CI =& get_instance();
	$langs = $CI->config->item('language_abbr');
	$urls = $CI->config->item('photography_urls');
	
	$lang = ($langs == $CI->config->item('default_language')) ? '' : $langs . "/";
	
        $link = base_url() . $lang . $urls[$langs] . "/" . $slug;
        
        if($out) {
            echo $link;
        }
        else
            return $link;
}

/* End of file photography_helper.php */
/* Location: ./application/helpers/photography_helper.php */
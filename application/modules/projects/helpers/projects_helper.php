<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function latest_projects($limit = 5, $offset = 0, $view = 'projects/latest_projects', $random = true)
{
	$CI =& get_instance();
	$CI->load->helper('image');
	$CI->load->helper('text');
        
	$lang = $CI->config->item('language_abbr');
	$CI->db->select('
					projects.id, 
					projects.title_'.$lang.' AS title, 
					projects.text_'.$lang.' AS text, 
					projects.date, 
					projects.slug_'.$lang.' AS slug,
					projects_images.name as image,
                                        projects.customer,
                                        projects.location,
                                        projects.year,
                                        projects.area,
                                        projects.photographer,
                                        projects.team
					');
        $CI->db->join('(SELECT '.$CI->db->dbprefix('images').'.* FROM '.$CI->db->dbprefix('images').' WHERE '.$CI->db->dbprefix('images').'.module = 6 ORDER BY position ASC) AS projects_images', 'projects_images.item_id = projects.id', 'left');         
	//$random = ($random == FALSE) ? 'desc' : 'random';
	$CI->db->order_by('date', 'desc');
        $CI->db->group_by('projects.id');
	$data['query'] = $CI->db->get_where('projects', array('projects.status' => 1), $limit, $offset)->result();
	$CI->load->view($view, $data);
}

function get_project_url($slug, $out=TRUE)
{
	$CI =& get_instance();
	$langs = $CI->config->item('language_abbr');
	$urls = $CI->config->item('projects_urls');
	
	$lang = ($langs == $CI->config->item('default_language')) ? '' : $langs . "/";
	
        $link = base_url() . $lang . $urls[$langs] . "/" . $slug;
        
        if($out) {
            echo $link;
        }
        else
            return $link;
}

/* End of file projects_helper.php */
/* Location: ./application/helpers/projects_helper.php */
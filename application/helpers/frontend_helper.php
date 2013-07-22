<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function label($identifier, $default = FALSE)
{	
	$CI =& get_instance();
	$lang = ($default == FALSE) ? $CI->config->item('language_abbr') : $CI->config->item('default_language');
	$cache_name = 'label_'.$identifier.'_'.$lang;
	
	if ($CI->cache->get($cache_name) == FALSE) {
		$data = $CI->db->get_where('labels', array('identifier' => $identifier, 'lang' => $lang))->row()->text;	
		$CI->cache->write($data, $cache_name);
		return $data;
	} else {
		return $CI->cache->get($cache_name);
	}
}

function editable_element($identifier, $default = FALSE)
{
	$CI =& get_instance();
	$lang = ($default == FALSE) ? $CI->config->item('language_abbr') : $CI->config->item('default_language');
	$cache_name = 'element_'.$identifier.'_'.$lang;
	
	$element  = $CI->cache->get($cache_name);
	if ($element == FALSE) {
		$data = $CI->db->get_where('elements', array('identifier' => $identifier, 'lang' => $lang))->row()->text;	
		$CI->cache->write($data, $cache_name);
		return $data;
	} else {
		return $CI->cache->get($cache_name);
	}
}

function homepage_link()
{
	$CI =& get_instance();
	$lang = $CI->uri->segment(0);
	$default_lang = $CI->config->item('default_language');
	$lang = ($lang == $default_lang) ? base_url() : base_url() . $lang;
	return $lang;
}

function list_languages($type = 'a', $path = 'images')
{ //<span class="seleccionat"><a href="#">Catal&agrave;</a></span> / <a href="#"> English </a> / <a href="#">Espa&ntilde;ol</a>
	$CI =& get_instance();
        $total_languages = count($CI->config->item('lang_desc'));
        $i = 1;
	foreach ($CI->config->item('lang_desc') as $value=>$key) {
                $current_value = $value;
		$value = ($value == $CI->config->item('default_language')) ? "" : $value;
		if ($type == 'option') { 
			echo '<option value="'.base_url() . $value.'">'.$key.'</option>';
		} elseif ($type == 'li') {
			echo '<li><a href="'.base_url() . $value.'" '.($CI->config->item('language_abbr') == $current_value ? 'class="seleccionat"' : '').' >'.$key.'</a></li>';
                        echo (($i < $total_languages) ? '<li>/</li> ' : '');
		} elseif ($type == 'img') {
			$img = ($value == "") ? $CI->config->item('default_language') : $value;
			echo '<a href="'.base_url() . $value.'" class="'.$value.'"><img src="'.base_url() . $path . "/" . $img.'.png" alt="'.$key.'" title="'.$key.'" /></a>';
		} else {
                        if ($CI->config->item('language_abbr') == $current_value) 
                            echo '<span class="seleccionat">';
			echo '<a href="'.base_url() . $value.'" class="'.$value.'">'.$key.'</a>';
                        if ($CI->config->item('language_abbr') == $current_value) 
                            echo '</span>';
                        echo (($i < $total_languages) ? ' / ' : '');
		}
                $i++;
	}
}

function menu($identifier, $type = 'a')
{
	$CI =& get_instance();
	$lang = $CI->config->item('language_abbr');

	#get id from the choosen menu identificator ($identificator)
	$menu_id = $CI->db->select('id');
	$menu_id = $CI->db->get_where('menus', array('identifier' => $identifier, 'lang' => $lang), 1)->row()->id;
	
	#get all items from the menu with choosen identificator and order by position
	$CI->db->order_by('position', 'asc');
	$query = $CI->db->get_where('menu_items', array('menu_id' => $menu_id, 'parent' => 0, 'status' => 1))->result();
	
	if ($type == 'li') {
		$open_tag = '<li>';
		$close_tag = '</li>';
	} else {
		$open_tag = '';
		$close_tag = '';
	}
	
	foreach($query as $row)
	{			
		$current_language = $CI->config->item('language_abbr');
		$default_language = $CI->config->item('default_language');
		$lang = ($current_language == $default_language) ? "" : $current_language . "/";
		if ($CI->uri->segment(1) == TRUE) {
			$slug = $lang.$CI->uri->segment(1);
		} elseif ($CI->uri->segment(1) == FALSE) {
			$slug = ($current_language == $default_language) ? "/" : $current_language;
		} else {
			$slug = $lang;
		}
		$url = ($row->url == "/") ? base_url() : base_url() . $row->url;
		if (substr($row->url, 0, 7) == "http://" || substr($row->url, 0, 8) == "https://") $url = $row->url;
		
		$target = ($row->target != 0) ? ' target="_blank"' : '';
		//$active = ($slug == $row->url) ? ' class="active"' : '';
                if($slug == $row->url)
                {
                    $active_open_tag = '<span class="menu_seleccionat">';
                    $active_close_tag = '</span>';
                }
                else
                {
                    $active_close_tag = $active_open_tag = '';
                }
		
		echo $open_tag .$active_open_tag .'<a href="'.$url.'" title="'.$row->title.'"'.$target.'><span>'.$row->title.'</span></a>' . $active_close_tag . $close_tag . "\n";			
	}
}	

// ATENCIÓ!! Modificat per a incloure projectes i fotografies

function tree_menu($identifier, $parent = 0)
{ 

        $output = '';
	$CI =& get_instance();
   
        $projects_menu = array('proyectos', 'en/projects');
        $photography_menu = array('fotografia', 'en/photography');
        
	$lang = $CI->config->item('language_abbr');
	$cache_name = 'menu_'.$identifier.'_'.$lang;
	
	if ($CI->cache->get($cache_name) == TRUE) {
		return $CI->cache->get($cache_name);
	} else {		
		$menu_id = $CI->db->get_where('menus', array('identifier' => $identifier, 'lang' => $lang))->row()->id;
		
		$CI->db->order_by('position', 'asc');
		$items = $CI->db->get_where('menu_items', array('menu_id' => $menu_id, 'parent' => $parent, 'status' => 1))->result();
	
		foreach($items as $row)
		{	
			$target = ($row->target != 0) ? ' target="_blank"' : '';

                        $current_language = $CI->config->item('language_abbr');
                        $default_language = $CI->config->item('default_language');
                        $lang = ($current_language == $default_language) ? "" : $current_language . "/";                        
                        
                        if ($CI->uri->segment(1) == TRUE) {
                                $slug = $lang.$CI->uri->segment(1);
                        } elseif ($CI->uri->segment(1) == FALSE) {
                                $slug = ($current_language == $default_language) ? "/" : $current_language;
                        } else {
                                $slug = $lang;
                        }                        
                        
			$url = ($row->url == "/") ? base_url() : base_url() . $row->url;
			if (substr($row->url, 0, 7) == "http://" || substr($row->url, 0, 8) == "https://") $url = $row->url;
                        
                        $output .= '<li><a class="'.($slug == $row->url ? 'seleccionat': '').'" href="'.$url.'"'.$target.'>'.$row->title.'</a>';                        
                        
                        if(in_array($row->url,$projects_menu)) {
                            $CI->load->model('projects/projectsmodel');
                            $output .= '<ul>';
                            $projects_meme = $CI->projectsmodel->list_projects_by_type('meme');
                            $projects_count = count($projects_meme);
                            foreach($projects_meme as $child) {
                                $output .= '<li><a href="'.get_project_url($child->slug, FALSE).'">'.$child->title.'</a></li>';                                                        
                            }
                            $projects_collaborators = $CI->projectsmodel->list_projects_by_type('collaborator');
                            $pintar_fila = ($projects_count > 0) ? TRUE : FALSE;
                            foreach($projects_collaborators as $child) {
                                $output .= '<li '.($pintar_fila ? 'style="border-top:1px solid #CCC"' : '').'><a href="'.get_project_url($child->slug, FALSE).'">'.$child->title.'</a></li>';                                                        
                                $pintar_fila = FALSE;
                            }

                            $output .= '</ul>';
                        } else if(in_array($row->url,$photography_menu)) {
                            $CI->load->model('photography/photographymodel');
                            $output .= '<ul>';
                            $projects_meme = $CI->photographymodel->list_photography_by_type('meme');
                            $projects_count = count($projects_meme);
                            foreach($projects_meme as $child) {
                                $output .= '<li><a href="'.get_photography_url($child->slug, FALSE).'">'.$child->title.'</a></li>';                                                        
                            }
                            $projects_collaborators = $CI->photographymodel->list_photography_by_type('collaborator');
                            $pintar_fila = ($projects_count > 0) ? TRUE : FALSE;
                            foreach($projects_collaborators as $child) {
                                $output .= '<li '.($pintar_fila ? 'style="border-top:1px solid #CCC"' : '').'><a href="'.get_photography_url($child->slug, FALSE).'">'.$child->title.'</a></li>';                                                        
                                $pintar_fila = FALSE;
                            }

                            $output .= '</ul>';                             
                        }                        
                        else {
                            $children = $CI->db->get_where('menu_items', array('parent' => $row->id, 'status' => 1))->num_rows();
                            if ($children > 0) {$output .= '<ul>';}
                            $output .= tree_menu($identifier, $row->id);
                            if ($children > 0) {$output .= '</ul>';}
                        }
			$output .= '</li>';
		}
		//$CI->cache->write($output, $cache_name);
		return $output;
	}	
}

function reorder_items($parent = 0)
{
	$CI =& get_instance();
	$lang = $CI->config->item('language_abbr');	
	$menu_id = $CI->uri->segment(4);
	
	$CI->db->order_by('position', 'asc');
	$items = $CI->db->get_where('menu_items', array('menu_id' => $menu_id, 'parent' => $parent, 'status' => 1))->result();

        $output = '';
        
	foreach($items as $row)
	{	
		$children = $CI->db->get_where('menu_items', array('parent' => $row->id, 'status' => 1))->num_rows();		
		$output .= '<li id="item_'.$row->id.'"><span>'.$row->title.'</span>';
			if ($children > 0) {$output .= '<ul>';}
			$output .= reorder_items($row->id);
			if ($children > 0) {$output .= '</ul>';}
		$output .= '</li>';		
				
	}
	return $output;
}
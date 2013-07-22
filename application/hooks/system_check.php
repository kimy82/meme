<?php

class System_Check {
	function check_loaded_modules()
	{

		$CI =& get_instance();
		$module_path = APPPATH . 'modules/';

		$lang = config_item('language_abbr');

		if($lang == 'es')
	        setlocale(LC_ALL,'es_ES.UTF-8');		
		if($lang == 'en')
	        setlocale(LC_ALL,'en_GB.UTF-8');		                
                
		if (file_exists($module_path . 'blog')) {
			$CI->config->load('blog/config');
			$CI->load->helper('blog/blog');
		}
		if (file_exists($module_path . 'news')) {
			$CI->config->load('news/config');
			$CI->load->helper('news/news');
		}

                if (file_exists($module_path . 'projects')) {
			$CI->config->load('projects/config');
			$CI->load->helper('projects/projects');
		}
                
                if (file_exists($module_path . 'photography')) {
			$CI->config->load('photography/config');
			$CI->load->helper('photography/photography');
		}                
		
		if (file_exists($module_path . 'works')) {
			$CI->load->helper('works/works');
		}                   
                
		if (file_exists($module_path . 'forms')) {
			$CI->load->helper('forms/forms');
		}
                
		if (file_exists($module_path . 'exhibitions')) {
			$CI->load->helper('exhibitions/exhibitions');
		}                                   
	}
}
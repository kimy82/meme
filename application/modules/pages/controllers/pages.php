<?php
class Pages extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->template->set('controller', $this);
		//$this->output->enable_profiler(TRUE);
	}	
	
	function index()
	{	
		$page = $this->pagemodel->get_page();
		
		//choosen template
		$template = ($page->tpl == '') ? 'default' : $page->tpl;
		
		$data = array(
					'page_title' => ($page->seo_page_title == '') ? $page->title : $page->seo_page_title,
					'page_h1' => ($page->seo_title == '') ? $page->title : $page->seo_title,
					'page_text' => htmlspecialchars_decode($page->text),
					'meta_keywords' => ($page->meta_keywords == '') ? '' : '<meta name="keywords" content="'.$page->meta_keywords.'" />' . "\n",
					'meta_description' => ($page->meta_description == '') ? '' : '<meta name="description" content="'.$page->meta_description.'" />' . "\n",
					);

		if ($page->slug != "") {
			$this->template->load_partial('master', $template, $data);
		} else {
			$this->load->view('404');	
		}	
	}
}
?>
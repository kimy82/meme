<?php
class Projects extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('projectsmodel');
		$this->template->set('controller', $this);
		//$this->output->enable_profiler(TRUE);
	}
	
	function _remap()
	{
		$uri2 = $this->uri->segment(2);	
		if (is_numeric($uri2) OR $uri2 == FALSE) {
			$this->index();	
		} else if ($uri2 == 'rss') {
			$this->rss();
		} else {
			$this->detail();
		}
	}
	
	var $paginator = array(  	
							'num_tag_open' => '<span>',
							'num_tag_close' => '</span>',
							'first_tag_open' => '<span>',
							'first_tag_close' => '</span>',
							'last_tag_open' => '<span>',
							'last_tag_close' => '</span>',
							'next_tag_open' => '<span>',
							'prev_tag_open' => '<span>',
							'prev_tag_close' => '</span>',
							'cur_tag_open' => '<span class="current"><strong>',
							'cur_tag_close' => '</strong></span>',
						   );
	
        /*
	function index()
	{			
		$this->load->model('extramodel');
		$this->load->helper('image');
		$projects_per_page = $this->config->item('projects_per_page');
		               
		#create pagination
		$this->load->library('pagination');
		$paginator['base_url'] = $this->extramodel->pagination_base_link();
		$paginator['uri_segment'] = 2;
		$paginator['per_page'] = $projects_per_page;
		$paginator['total_rows'] = $this->projectsmodel->count_projects();
                $paginator['full_tag_open'] = '<ul>';
                $paginator['full_tag_close'] = '</ul>';
                $paginator['num_tag_open'] = '<li>';
                $paginator['num_tag_close'] = '</li>';
		$paginator['cur_tag_open'] = '<li><span class="numeracio_activat"><strong>';
		$paginator['cur_tag_close'] = '</strong></span></li>';
                $paginator['first_tag_open'] = $paginator['last_tag_open'] = $paginator['prev_tag_open'] = $paginator['next_tag_open'] = '<li>';
                $paginator['first_tag_close'] = $paginator['last_tag_close'] = $paginator['prev_tag_close'] = $paginator['next_tag_close'] = '</li>';
		$paginator['last_link'] = $this->lang->line('last');
		$paginator['first_link'] = $this->lang->line('first');		
		$paginator['prev_link'] = label('pagination_previous');
		$paginator['next_link'] = label('pagination_next');
		$this->pagination->initialize($paginator);
               
	                
		$page = $this->pagemodel->get_page();
		$query = $this->projectsmodel->get_all_projects($paginator['per_page'], $this->uri->segment(2));
		
		$data = array(
					'page_title' => ($page->seo_title == '') ? $page->title : $page->seo_page_title,
					'page_h1' => ($page->seo_title == '') ? $page->title : $page->seo_title,
					'page_text' => htmlspecialchars_decode($page->text),
					'meta_keywords' => ($page->meta_keywords == '') ? '' : '<meta name="keywords" content="'.$page->meta_keywords.'" />' . "\n",
					'meta_description' => ($page->meta_description == '') ? '' : '<meta name="description" content="'.$page->meta_description.'" />' . "\n",
					'query' => $query,
					);

		$this->template->load_partial('master', 'index', $data);
	}
	*/
        
	function detail()
	{
		$this->load->helper('image');
		$page = $this->projectsmodel->get_project();
		$lang = $this->config->item('language_abbr');
                
                $images = $this->projectsmodel->get_images();
                
		$data = array(
                        'page_title' => ($page->{'seo_page_title_'.$lang} == '') ? $page->{'title_'.$lang} : $page->{'seo_page_title_'.$lang},
                        'title' => ($page->{'seo_title_'.$lang} == '') ? $page->{'title_'.$lang} : $page->{'seo_title_'.$lang},
                        'meta_keywords' => ($page->{'meta_keywords_'.$lang} == '') ? '' : '<meta name="keywords" content="' . $page->{'meta_keywords_'.$lang} . '" />' . "\n",
                        'meta_description' => ($page->{'meta_description_'.$lang} == '') ? '' : '<meta name="description" content="' . $page->{'meta_description_'.$lang} . '" />' . "\n",
                        'date' => $page->date,
                        'customer' => $page->customer,
                        'location' => $page->location,
                        'year' => $page->year,
                        'area' => $page->area,
                        'photographer' => $page->photographer,
                        'team' => $page->team,
                        'long_text' => htmlspecialchars_decode($page->{'text_'.$lang}),
                        'images' => $images,
                        'opengraph_data' => array(
                            'title' => ($page->{"seo_title_".$lang} == '') ? $page->{'title_'.$lang} : $page->{"seo_title_".$lang},
                            'type' => 'album',
                            'url' => current_url(),
                            'image' => base_url().'images/logoatelier.jpg',
                            'description' => word_limiter(htmlspecialchars_decode($page->{"text_".$lang})),
                        )                                       
					);
		
		$this->template->load_partial('master', 'detail', $data);
	}
	
}

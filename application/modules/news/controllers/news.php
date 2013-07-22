<?php
class News extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('newsmodel');
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
		
	function index()
	{			
		$this->load->model('extramodel');
		$this->load->helper('image');
		$news_per_page = $this->config->item('news_per_page');
		               
		#create pagination
		$this->load->library('pagination');
		$paginator['base_url'] = $this->extramodel->pagination_base_link();
		$paginator['uri_segment'] = 2;
		$paginator['per_page'] = $news_per_page;
		$paginator['total_rows'] = $this->newsmodel->count_news();
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
		$query = $this->newsmodel->get_all_news($paginator['per_page'], $this->uri->segment(2));
		
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
	
	function detail()
	{
		$this->load->helper('image');
		$news = $this->newsmodel->get_news();
		
		$data = array(
                        'page_title' => ($news->seo_page_title == '') ? $news->title : $news->seo_page_title,
                        'title' => ($news->seo_title == '') ? $news->title : $news->seo_title,
                        'meta_keywords' => ($news->meta_keywords == '') ? '' : '<meta name="keywords" content="'.$news->meta_keywords.'" />' . "\n",
                        'meta_description' => ($news->meta_description == '') ? '' : '<meta name="description" content="'.$news->meta_description.'" />' . "\n",
                        'date' => $news->date,
                        'time' => $news->time,
                        'short_text' => htmlspecialchars_decode($news->short_text),
                        'long_text' => htmlspecialchars_decode($news->text),
                        'video' => !empty($news->video) ? $news->video : FALSE,
                        'image' => $news->image,
                        'opengraph_data' => array(
                            'title' => ($news->seo_title == '') ? $news->title : $news->seo_title,
                            'type' => 'blog',
                            'url' => current_url(),
                            'image' => base_url().'images/logoatelier.jpg',
                            'description' => word_limiter(htmlspecialchars_decode($news->text)),
                        )                     
					);
		
		$this->template->load_partial('master', 'detail', $data);
	}
	
	function rss()
	{
		$this->load->helper('xml');
		$lang = $this->config->item('language_abbr');
		
		$page = $this->pagemodel->get_page('news-rss');
		
		$data = array(
					  'feed_name' => $page->title,
					  'feed_description' => strip_tags($page->text),
					  'feed_language' => $lang,
					  'query' => $this->newsmodel->get_rss_news(10),
					  );
		$this->load->view('rss', $data);
	}
        
}
?>
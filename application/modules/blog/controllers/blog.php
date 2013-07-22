<?php
class Blog extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('blogmodel');
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
		} else if ($uri2 == 'archive') {
			$this->archive();
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
		$page = $this->pagemodel->get_page();
		
		$data = array(
					'page_title' => ($page->seo_title == '') ? $page->title : $page->seo_page_title,
					'page_h1' => ($page->seo_title == '') ? $page->title : $page->seo_title,
					'page_text' => htmlspecialchars_decode($page->text),
					'meta_keywords' => ($page->meta_keywords == '') ? '' : '<meta name="keywords" content="'.$page->meta_keywords.'" />' . "\n",
					'meta_description' => ($page->meta_description == '') ? '' : '<meta name="description" content="'.$page->meta_description.'" />' . "\n",
					);

                $this->template->load_partial('master_blog', 'index', $data);
        }
        
	function archive()
	{			
                $this->load->model('commonmodel');
		$this->load->model('extramodel');
		$this->load->helper('image');
		$posts_per_page = $this->config->item('posts_per_page');
                
                /*
                $this->output->enable_profiler(TRUE);
                
                
                echo $this->uri->uri_string();
                
		#create pagination
		$this->load->library('pagination');
                $paginator = array();
		$paginator['base_url'] = $this->extramodel->pagination_base_link('archive');
		$paginator['uri_segment'] = 5;
		$paginator['per_page'] = $posts_per_page;
		$paginator['total_rows'] = $this->blogmodel->count_posts();
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
               */
	                
		$page = $this->pagemodel->get_page();
		//$query = $this->blogmodel->get_all_posts($paginator['per_page'], $this->uri->segment(5));
                $query = $this->blogmodel->get_all_posts();
                
                // No posem imatges a l'arxiu...
                foreach($query as $kpost => $post) {
                    $query[$kpost]->images = array();
                }                
		
		$data = array(
					'page_title' => ($page->seo_title == '') ? $page->title : $page->seo_page_title,
					'page_h1' => ($page->seo_title == '') ? $page->title : $page->seo_title,
					'page_text' => htmlspecialchars_decode($page->text),
					'meta_keywords' => ($page->meta_keywords == '') ? '' : '<meta name="keywords" content="'.$page->meta_keywords.'" />' . "\n",
					'meta_description' => ($page->meta_description == '') ? '' : '<meta name="description" content="'.$page->meta_description.'" />' . "\n",
					'query' => $query,
					);

                
		$this->template->load_partial('master_blog', 'archive', $data);
	}
	
	function detail()
	{
		$this->load->helper('image');
		$post = $this->blogmodel->get_post();
                
                $images = $this->blogmodel->get_images();
		
		$data = array(
                        'page_title' => ($post->seo_page_title == '') ? $post->title : $post->seo_page_title,
                        'title' => ($post->seo_title == '') ? $post->title : $post->seo_title,
                        'meta_keywords' => ($post->meta_keywords == '') ? '' : '<meta name="keywords" content="'.$post->meta_keywords.'" />' . "\n",
                        'meta_description' => ($post->meta_description == '') ? '' : '<meta name="description" content="'.$post->meta_description.'" />' . "\n",
                        'date' => $post->date,
                        'time' => $post->time,
                        'short_text' => htmlspecialchars_decode($post->short_text),
                        'long_text' => htmlspecialchars_decode($post->text),
                        'video' => !empty($post->video) ? $post->video : FALSE,
                        'images' => $images,
                        'opengraph_data' => array(
                            'title' => ($post->seo_title == '') ? $post->title : $post->seo_title,
                            'type' => 'blog',
                            'url' => current_url(),
                            'image' => base_url().'images/logoatelier.jpg',
                            'description' => word_limiter(htmlspecialchars_decode($post->text)),
                        )                     
					);
		
		$this->template->load_partial('master_blog', 'detail', $data);
	}
	
	function rss()
	{
		$this->load->helper('xml');
		$lang = $this->config->item('language_abbr');
		
		$page = $this->pagemodel->get_page('blog-rss');
		
		$data = array(
					  'feed_name' => $page->title,
					  'feed_description' => strip_tags($page->text),
					  'feed_language' => $lang,
					  'query' => $this->blogmodel->get_rss_blog(10),
					  );
		$this->load->view('rss', $data);
	}
        
}

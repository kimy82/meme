<?php

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->lang->load($this->config->item('admin_language'), $this->config->item('admin_language'));
	}
	
	private $rules = array(
						array(
							'field'   => 'username',
							'label'   => 'lang:username',
							'rules'   => 'trim|required|valid_email',
						),
						array(
							'field'   => 'password',
							'label'   => 'lang:password',
							'rules'   => 'trim|required|min_length[8]',
						)
					);
	
	function index()
	{
		$this->load->library('form_validation');
		$redirect_to = $this->config->item('base_url') . 'admin/pages/';
		if ($this->auth->logged_in() == FALSE)
		{
			$data['error'] = FALSE;
			$this->load->library('form_validation');
			$this->form_validation->set_rules($this->rules);
			$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/login', $data);
			} 
			else 
			{	
				$this->auth->login($this->input->post('username'), $this->input->post('password'), $redirect_to, 'admin/login');
			}	
		}
		else 
		{
			redirect($redirect_to);
		}
	}
	
	function logout()
	{
		$this->auth->logout($this->config->item('base_url') . 'admin');
	}
        
        function fillslug()
        {
            $this->load->model('blog/blogmodel');
            $this->load->helper('url');
            $posts = $this->blogmodel->get_all_posts();
            
            foreach($posts as $post)
            {
                $this->db->where('id',$post->id);
                $this->db->update('blog', array('slug' => url_title($post->title)));
            }
            die();
        }      
        
        function slugify()
        {
            $news = $this->db->get('news')->result();
            $this->load->helper('url');            
            foreach($news as $a_news) 
            {
                $this->db->where('id',$a_news->id);
                $this->db->update("news",array('slug' => url_title($a_news->title)));
            }
        }        
}

?>
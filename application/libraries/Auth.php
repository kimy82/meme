<?php

class Auth
{
    var $CI;
    var $_username;
    var $_table = array(
                    'users' => 'cms_users',
                    'groups' => 'groups'
                    );

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->helper('string');
		$this->CI->load->helper('cookie');
	}

    function Auth()
    {
        self::__construct();
    }

    function restrict($restrict_to = NULL, $redirect_to = NULL)
	{
		$redirect_to = ($redirect_to == NULL) ? $this->CI->config->item('base_url') . "admin" : $redirect_to;
		
		if ($restrict_to !== NULL) {
			if ($this->logged_in() == TRUE) {
				if ($this->CI->session->userdata('group_id') >= $restrict_to) {
					return TRUE;
				} else {
					redirect($redirect_to);	
				}
			} else {
				redirect($redirect_to);	
			}
		} else {
			show_error("You do not have sufficient rights to access this page!");
		}
	}

	function username_exists( $username )
	{
		$this->CI->db->select('username');
		$query = $this->CI->db->get_where($this->_table['users'], array('username' => $username), 1);
	
		if ($query->num_rows() !== 1) {
			return FALSE;
		} else {
			$this->_username = $username;
			return TRUE;
		}
	}

	function check_password( $password )
	{
		$this->CI->db->select('password');
		$query = $this->CI->db->where($this->_table['users'], array('username' => $this->_username), 1)->row();
	
		if ($query->password == $this->encrypt($password)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

    function check_string_length( $string )
    {
        $string = trim($string);
        return strlen($string);
    }

    function encrypt( $data )
    {
        if ($this->CI->config->item('encryption_key') !== NULL) {
            return sha1($this->CI->config->item('encryption_key').$data);
        } else {
            show_error('Please set an encryption key in your config file. <a href="javascript:history.back();">back</a>');
        }
    }
	
	function login($username, $password, $redirect_to = NULL, $error_view = NULL)
	{		
		$query = $this->CI->db->get_where('cms_users', 
										array(
											'username' => $username,
											'password' => $this->encrypt($password)
											), 1
									  );
				
		if ($query->num_rows() === 1) {
			$row = $query->row();
			$data = array(
							'logged_in' => TRUE,
							'sess_expire_on_close' => TRUE,
							'username' => $row->username,
							'user_id' => $row->id,
							'name' => $row->name,
							'group_id' => $row->group_id
						  );
			$this->CI->session->set_userdata($data);
			
			$cookie = array(
				'name'   => 'cifm',
				'value'  => md5('fm_pass'),
				'prefix' => 'ci_',
				'expire' => '0',
				'path'   => '/'
			);			
			set_cookie($cookie);
			
			redirect($redirect_to);
		} else {
			if ($error_view != NULL) {
				$data['error'] = $this->CI->lang->line('access_denied');
				$this->CI->load->view($error_view, $data);
			} else {
				redirect($redirect_to);
			}
		}
	}

    function logged_in()
    {
        return $this->CI->session->userdata('logged_in');
    }

    function logout($redirect_to = NULL)
    {
		$this->CI->session->sess_destroy();
		delete_cookie('ci_cifm');
		if ($redirect_to != NULL) {
			redirect($redirect_to);	
		}
    }
	
}

/* End of file Auth.php */
/* Location: ./application/libraries/Auth.php */
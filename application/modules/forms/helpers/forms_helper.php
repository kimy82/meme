<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function contact_form($mail_to = '', $form_view = 'forms/contact_form', $success_view = 'forms/contact_success')
{
	$CI =& get_instance();
	$CI->load->library('form_validation');
	$CI->load->language($CI->config->item('language'));
	
	$mail_to = ($mail_to == FALSE) ? $CI->config->item('base_email') : $mail_to;
	
	if (!$CI->input->post('submit')) {
		$CI->load->view($form_view);
	} else {
		#get input values from the view file
		$name = $CI->input->post('name');
		$email = $CI->input->post('email');
		$subject = $CI->input->post('subject');
		$message = $CI->input->post('message');
		$secure_code = $CI->input->post('secure_code');
		
		#validation
		$CI->form_validation->set_rules('secure_code', 'required');
		$CI->form_validation->set_rules('name', 'lang:name', 'trim|required|min_length[2]');
                $CI->form_validation->set_rules('telephone', 'lang:telephone', 'trim');
                $CI->form_validation->set_rules('fax', 'lang:fax', 'trim');
		$CI->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email');
		$CI->form_validation->set_rules('subject', 'lang:message_title', 'trim|required|min_length[2]');
		$CI->form_validation->set_rules('message', 'lang:message', 'trim|required|min_length[2]');
		$CI->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
		if ($CI->form_validation->run() == FALSE) {
			$CI->load->view($form_view);
		} else {
			if ($secure_code == "siteform") {
				$CI->load->library('email');
				$CI->email->from($email, $name);
				$CI->email->to($mail_to);
				$CI->email->subject($subject);
				$CI->email->message($message);
				
				$CI->email->send();
				
				$CI->load->view($success_view);
			} else {
				redirect($CI->config->item('base_url'));
			}
		}		
	}
}

function newsletter_form($form_view = 'forms/newsletter_form', $success_view = 'forms/newsletter_success', $form_action = '')
{
	$CI =& get_instance();
	$CI->load->library('form_validation');
	$CI->load->language($CI->config->item('language'));
	
	if (!$CI->input->post('submit')) {
		$CI->load->view($form_view, array('form_action' => $form_action));
	} else {
		#get input values from the view file
		$name = $CI->input->post('name');
		$email = $CI->input->post('email');
		$secure_code = $CI->input->post('secure_code');
		
		#validation
		$CI->form_validation->set_rules('secure_code', 'required');
		$CI->form_validation->set_rules('name', 'lang:name', 'trim|required|min_length[2]');
		$CI->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email');
		$CI->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
		if ($CI->form_validation->run() == FALSE) {
			$CI->load->view($form_view, array('form_action' => $form_action));
		} else {
			if ($secure_code == "siteform") {
                            
                            $CI->db->where('email', $email);
                            if($CI->db->count_all_results('acms_newsletter_subscribers') == 0)
                            {
                                $CI->db->insert('acms_newsletter_subscribers', array(
                                    'name' => $name,
                                    'email' => $email,
                                    'created_at' => date('Y-m-d H:i:s')
                                ));
                            }
				$CI->load->view($success_view);
			} else {
				redirect($CI->config->item('base_url'));
			}
		}		
	}
}
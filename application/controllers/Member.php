<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
	/**
	* class Member 
	*/
	class Member extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			if (empty($this->session->userdata('email')) && $this->session->userdata('role') != 'member'){
				$_SESSION['flash_messsage'] = 'You are not allowed to access or your session has been expired';
				$this->session->mark_as_temp('flash_messsage', 1);
				redirect('/');
			}
			$this->load->model('member_model', 'mdl', TRUE); 
		}

		public function index()
		{	
			$data = array(
				'title' => 'Dasboard User',
				'hasil' => $this->mdl->show_api($this->session->userdata('id'))->result_array(),
				'hasil2'=> $this->mdl->order_api()->result_array(),
				'col' 	=>  array(
								'id_order',
								'name',
								'domain',
								'api_keys',
								'last_used',
								'ip',
								'status'
							),
				'col2' 	=>  array(
								'id_order',
								'domain',
								'api_keys',
								'date',
								'price',
								'status'
							)
			);

			$this->page('dashboard',$data);
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('/');
		}

		public function page($page, $data)
		{  
			if (!file_exists(APPPATH.'views/pages/member/'.$page.'.php'))
				show_404();

	        $this->load->view('templates/member/header', $data);
	        $this->load->view('templates/member/menubar', $data);
	        $this->load->view('templates/member/sidebar', $data);
	        $this->load->view('pages/member/'.$page, $data);
	        $this->load->view('templates/member/footer', $data);
	    }

}
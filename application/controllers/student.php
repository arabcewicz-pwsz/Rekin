<?php

if (!defined('BASEPATH'))

	exit('No direct script access allowed');




class Student extends CI_Controller

{

	

	

	function __construct()

	{

		parent::__construct();

		$this->load->database();

		/*cache control*/

		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');

		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

		$this->output->set_header('Pragma: no-cache');

		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	}

	



	public function index()

	{

		if ($this->session->userdata('student_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		if ($this->session->userdata('student_login') == 1)

			redirect(base_url() . 'index.php?student/dashboard', 'refresh');

	}

	


	function dashboard()

	{

		if ($this->session->userdata('student_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = get_phrase('Uczeń');

		$this->load->view('index', $page_data);

	}

	

	
	function view_grades($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('student_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('grades', array(

				'grades_id' => $param2

			))->result_array();

		}

		$page_data['page_name']     = 'view_grades';

		$page_data['page_title']    = get_phrase('Oceny');

		$page_data['gradess'] = $this->db->get_where('grades', array(

			'student_id' => $this->session->userdata('student_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

	/******VIEW subjects LIST*****/

	function view_teacher($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('student_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']  = 'view_teacher';

		$page_data['page_title'] = get_phrase('view_teacher');

		$page_data['teachers']    = $this->db->get('teacher')->result_array();

		

		$this->load->view('index', $page_data);

	}

	


	function manage_profile($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('student_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		if ($param1 == 'update_profile_info') {

			$data['name']        = $this->input->post('name');

			$data['email']       = $this->input->post('email');

			$data['address']     = $this->input->post('address');

			$data['phone']       = $this->input->post('phone');

			$data['sex']         = $this->input->post('sex');

			$data['birth_date']  = $this->input->post('birth_date');

			

			$data['classes'] = $this->input->post('classes');

			

			$this->db->where('student_id', $this->session->userdata('student_id'));

			$this->db->update('student', $data);

			$this->session->set_flashdata('flash_message', get_phrase('Sukcess'));

			redirect(base_url() . 'index.php?student/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['password']             = $this->input->post('password');

			$data['new_password']         = $this->input->post('new_password');

			$data['confirm_new_password'] = $this->input->post('confirm_new_password');

			

			$current_password = $this->db->get_where('student', array(

				'student_id' => $this->session->userdata('student_id')

			))->row()->password;

			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('student_id', $this->session->userdata('student_id'));

				$this->db->update('student', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('Sukcess'));

			} else {

				$this->session->set_flashdata('flash_message', get_phrase('hasła się nie zgadzają'));

			}

			redirect(base_url() . 'index.php?student/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('Profil');

		$page_data['edit_profile'] = $this->db->get_where('student', array(

			'student_id' => $this->session->userdata('student_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

}
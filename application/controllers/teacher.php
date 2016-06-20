<?php

if (!defined('BASEPATH'))

	exit('No direct script access allowed');





class Teacher extends CI_Controller

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

		if ($this->session->userdata('teacher_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		if ($this->session->userdata('teacher_login') == 1)

			redirect(base_url() . 'index.php?teacher/dashboard', 'refresh');

	}

	

	

	function dashboard()

	{

		if ($this->session->userdata('teacher_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = get_phrase('Nauczyciel');

		$this->load->view('index', $page_data);

	}

	

	



	function manage_student($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('teacher_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		if ($param1 == 'create') {

			$data['name']                      = $this->input->post('name');

			$data['email']                     = $this->input->post('email');

			$data['password']                  = $this->input->post('password');

			$data['address']                   = $this->input->post('address');

			$data['phone']                     = $this->input->post('phone');

			$data['sex']                       = $this->input->post('sex');

			$data['birth_date']                = $this->input->post('birth_date');

			$data['classes']               = $this->input->post('classes');

			$data['account_opening_timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

			$this->db->insert('student', $data);

			$this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL

			$this->session->set_flashdata('flash_message', get_phrase('Sukcess'));

			redirect(base_url() . 'index.php?teacher/manage_student', 'refresh');

		}

		if ($param1 == 'edit' && $param2 == 'do_update') {

			$data['name']        = $this->input->post('name');

			$data['email']       = $this->input->post('email');

			$data['password']    = $this->input->post('password');

			$data['address']     = $this->input->post('address');

			$data['phone']       = $this->input->post('phone');

			$data['sex']         = $this->input->post('sex');

			$data['birth_date']  = $this->input->post('birth_date');

			$data['classes'] = $this->input->post('classes');

			

			$this->db->where('student_id', $param3);

			$this->db->update('student', $data);

			$this->session->set_flashdata('flash_message', get_phrase('Sukcess'));

			redirect(base_url() . 'index.php?teacher/manage_student', 'refresh');

			

		} else if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('student', array(

				'student_id' => $param2

			))->result_array();

		}

		if ($param1 == 'delete') {

			$this->db->where('student_id', $param2);

			$this->db->delete('student');

			$this->session->set_flashdata('flash_message', get_phrase('Sukcess'));

			redirect(base_url() . 'index.php?teacher/manage_student', 'refresh');

		}

		$page_data['page_name']  = 'manage_student';

		$page_data['page_title'] = get_phrase('Uczniowie');

		$page_data['students']   = $this->db->get('student')->result_array();

		$this->load->view('index', $page_data);

	}

	


function manage_grades($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('teacher_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		

		if ($param1 == 'create') {

			$data['teacher_id']                  = $this->input->post('teacher_id');

			$data['student_id']                 = $this->input->post('student_id');

			$data['creation_timestamp']         = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

			$data['subjects_id']                = $this->input->post('subjects_id');

			$data['mark_id']                = $this->input->post('mark_id');

			$data['description']                = $this->input->post('description');

			

			$this->db->insert('grades', $data);

			$this->session->set_flashdata('flash_message', get_phrase('Sukcess'));

			

			redirect(base_url() . 'index.php?teacher/manage_grades', 'refresh');

		}

		if ($param1 == 'edit' && $param2 == 'do_update') {

			$data['teacher_id']                  = $this->input->post('teacher_id');

			$data['student_id']                 = $this->input->post('student_id');

			$data['subjects_id']                = $this->input->post('subjects_id');

			$data['mark_id']                = $this->input->post('mark_id');
			
			$data['description']                = $this->input->post('description');

			

			$this->db->where('grades_id', $param3);

			$this->db->update('grades', $data);

			$this->session->set_flashdata('flash_message', get_phrase('grades_updated'));

			redirect(base_url() . 'index.php?teacher/manage_grades', 'refresh');

		} else if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('grades', array(

				'grades_id' => $param2

			))->result_array();

		}

		if ($param1 == 'delete') {

			$this->db->where('grades_id', $param2);

			$this->db->delete('grades');

			$this->session->set_flashdata('flash_message', get_phrase('grades_deleted'));

			

			redirect(base_url() . 'index.php?teacher/manage_grades', 'refresh');

		}

		$page_data['page_name']     = 'manage_grades';

		$page_data['page_title']    = get_phrase('Oceny');

		$page_data['gradess'] = $this->db->get('grades')->result_array();

		$this->load->view('index', $page_data);

	}


	function manage_noticeboard($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('teacher_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		if ($param1 == 'create') {

			$data['notice_title']     = $this->input->post('notice_title');

			$data['notice']           = $this->input->post('notice');

			$data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));

			$this->db->insert('noticeboard', $data);

			$this->session->set_flashdata('flash_message', get_phrase('report_created'));

			

			redirect(base_url() . 'index.php?teacher/manage_noticeboard', 'refresh');

		}

		if ($param1 == 'edit' && $param2 == 'do_update') {

			$data['notice_title']     = $this->input->post('notice_title');

			$data['notice']           = $this->input->post('notice');

			$data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));

			$this->db->where('notice_id', $param3);

			$this->db->update('noticeboard', $data);

			$this->session->set_flashdata('flash_message', get_phrase('notice_updated'));

			

			redirect(base_url() . 'index.php?teacher/manage_noticeboard', 'refresh');

		} else if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('noticeboard', array(

				'notice_id' => $param2

			))->result_array();

		}

		if ($param1 == 'delete') {

			$this->db->where('notice_id', $param2);

			$this->db->delete('noticeboard');

			$this->session->set_flashdata('flash_message', get_phrase('notice_deleted'));

			

			redirect(base_url() . 'index.php?teacher/manage_noticeboard', 'refresh');

		}

		$page_data['page_name']  = 'manage_noticeboard';

		$page_data['page_title'] = get_phrase('Terminarz');

		$page_data['notices']    = $this->db->get('noticeboard')->result_array();

		$this->load->view('index', $page_data);

	}


	

	

	function manage_profile($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('teacher_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		if ($param1 == 'update_profile_info') {

			$data['name']    = $this->input->post('name');

			$data['email']   = $this->input->post('email');

			$data['address'] = $this->input->post('address');

			$data['phone']   = $this->input->post('phone');

			

			$this->db->where('teacher_id', $this->session->userdata('teacher_id'));

			$this->db->update('teacher', $data);

			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			redirect(base_url() . 'index.php?teacher/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['password']             = $this->input->post('password');

			$data['new_password']         = $this->input->post('new_password');

			$data['confirm_new_password'] = $this->input->post('confirm_new_password');

			

			$current_password = $this->db->get_where('teacher', array(

				'teacher_id' => $this->session->userdata('teacher_id')

			))->row()->password;

			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('teacher_id', $this->session->userdata('teacher_id'));

				$this->db->update('teacher', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

			} else {

				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));

			}

			redirect(base_url() . 'index.php?teacher/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('Nauczyciele');

		$page_data['edit_profile'] = $this->db->get_where('teacher', array(

			'teacher_id' => $this->session->userdata('teacher_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

}


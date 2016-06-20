<?php

if (!defined('BASEPATH'))

	exit('No direct script access allowed');


class Admin extends CI_Controller

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

		if ($this->session->userdata('admin_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		if ($this->session->userdata('admin_login') == 1)

			redirect(base_url() . 'index.php?admin/dashboard', 'refresh');

	}

	



	function dashboard()

	{

		if ($this->session->userdata('admin_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = get_phrase('Administrator');

		$this->load->view('index', $page_data);

	}

function manage_classes($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('admin_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		if ($param1 == 'create') {

			$data['name']     = $this->input->post('name');

			$data['profile']    = $this->input->post('profile');

			$data['teacher_name'] = $this->input->post('teacher_name');


			$this->db->insert('classes', $data);

			

			$this->session->set_flashdata('flash_message', get_phrase('Sukcess!'));

			

			redirect(base_url() . 'index.php?admin/manage_classes', 'refresh');

		}

		if ($param1 == 'edit' && $param2 == 'do_update') {

			$data['name']     = $this->input->post('name');

			$data['profile']    = $this->input->post('profile');

			$data['teacher_name'] = $this->input->post('teacher_name');

			$this->db->where('class_id', $param3);

			$this->db->update('classes', $data);

			$this->session->set_flashdata('flash_message', get_phrase('Sukcess'));

			

			redirect(base_url() . 'index.php?admin/manage_classes', 'refresh');

		} else if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('classes', array(

				'class_id' => $param2

			))->result_array();

		}

		if ($param1 == 'delete') {

			$this->db->where('class_id', $param2);

			$this->db->delete('classes');

			$this->session->set_flashdata('flash_message', get_phrase('Sukcess'));

			

			redirect(base_url() . 'index.php?admin/manage_classes', 'refresh');

		}

		$page_data['page_name']  = 'manage_classes';

		$page_data['page_title'] = get_phrase('Klasy');

		$page_data['classess']     = $this->db->get('classes')->result_array();

		$this->load->view('index', $page_data);

		

	}

	



	


	function manage_student($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('admin_login') != 1)

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

			$this->session->set_flashdata('flash_message', get_phrase('Sukcess!'));

			redirect(base_url() . 'index.php?admin/manage_student', 'refresh');

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

			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			redirect(base_url() . 'index.php?admin/manage_student', 'refresh');

			

		} else if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('student', array(

				'student_id' => $param2

			))->result_array();

		}

		if ($param1 == 'delete') {

			$this->db->where('student_id', $param2);

			$this->db->delete('student');

			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));

			redirect(base_url() . 'index.php?admin/manage_student', 'refresh');

		}

		$page_data['page_name']  = 'manage_student';

		$page_data['page_title'] = get_phrase('Uczniowie');

		$page_data['students']   = $this->db->get('student')->result_array();

		$this->load->view('index', $page_data);

	}




	

	


	function manage_teacher($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('admin_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		if ($param1 == 'create') {

			$data['name']     = $this->input->post('name');

			$data['email']    = $this->input->post('email');

			$data['password'] = $this->input->post('password');

			$data['address']  = $this->input->post('address');

			$data['phone']    = $this->input->post('phone');

			$data['subject']    = $this->input->post('subject');

			$this->db->insert('teacher', $data);

			$this->email_model->account_opening_email('teacher', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL

			$this->session->set_flashdata('flash_message', get_phrase('account_opened'));

			

			redirect(base_url() . 'index.php?admin/manage_teacher', 'refresh');

		}

		if ($param1 == 'edit' && $param2 == 'do_update') {

			$data['name']     = $this->input->post('name');

			$data['email']    = $this->input->post('email');

			$data['password'] = $this->input->post('password');

			$data['address']  = $this->input->post('address');

			$data['phone']    = $this->input->post('phone');

			$data['subject']    = $this->input->post('subject');

			$this->db->where('teacher_id', $param3);

			$this->db->update('teacher', $data);

			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			

			redirect(base_url() . 'index.php?admin/manage_teacher', 'refresh');

		} else if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('teacher', array(

				'teacher_id' => $param2

			))->result_array();

		}

		if ($param1 == 'delete') {

			$this->db->where('teacher_id', $param2);

			$this->db->delete('teacher');

			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));

			

			redirect(base_url() . 'index.php?admin/manage_teacher', 'refresh');

		}

		$page_data['page_name']  = 'manage_teacher';

		$page_data['page_title'] = get_phrase('Nauczyciele');

		$page_data['teachers']     = $this->db->get('teacher')->result_array();

		$this->load->view('index', $page_data);

		

	}

	

	
	

	/*******VIEW MEDICINE********/

	

	function manage_email_template($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('admin_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		if ($param2 == 'do_update') {

			$this->db->where('task', $param1);

			$this->db->update('email_template', array(

				'body' => $this->input->post('body'),

				'subject' => $this->input->post('subject')

			));

			$this->session->set_flashdata('flash_message', get_phrase('template_updated'));

			redirect(base_url() . 'index.php?admin/manage_email_template/' . $param1, 'refresh');

		}

		$page_data['page_name']     = 'manage_email_template';

		$page_data['page_title']    = get_phrase('manage_email_template');

		$page_data['template']      = $this->db->get_where('email_template', array(

			'task' => $param1

		))->result_array();

		$page_data['template_task'] = $param1;

		$this->load->view('index', $page_data);

	}

	

	

	function manage_noticeboard($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('admin_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		if ($param1 == 'create') {

			$data['notice_title']     = $this->input->post('notice_title');

			$data['notice']           = $this->input->post('notice');

			$data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));

			$this->db->insert('noticeboard', $data);

			$this->session->set_flashdata('flash_message', get_phrase('report_created'));

			

			redirect(base_url() . 'index.php?admin/manage_noticeboard', 'refresh');

		}

		if ($param1 == 'edit' && $param2 == 'do_update') {

			$data['notice_title']     = $this->input->post('notice_title');

			$data['notice']           = $this->input->post('notice');

			$data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));

			$this->db->where('notice_id', $param3);

			$this->db->update('noticeboard', $data);

			$this->session->set_flashdata('flash_message', get_phrase('notice_updated'));

			

			redirect(base_url() . 'index.php?admin/manage_noticeboard', 'refresh');

		} else if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('noticeboard', array(

				'notice_id' => $param2

			))->result_array();

		}

		if ($param1 == 'delete') {

			$this->db->where('notice_id', $param2);

			$this->db->delete('noticeboard');

			$this->session->set_flashdata('flash_message', get_phrase('notice_deleted'));

			

			redirect(base_url() . 'index.php?admin/manage_noticeboard', 'refresh');

		}

		$page_data['page_name']  = 'manage_noticeboard';

		$page_data['page_title'] = get_phrase('Terminarz');

		$page_data['notices']    = $this->db->get('noticeboard')->result_array();

		$this->load->view('index', $page_data);

	}

	

	



	function system_settings($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('admin_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		if ($param2 == 'do_update') {

			$this->db->where('type', $param1);

			$this->db->update('settings', array(

				'profile' => $this->input->post('profile')

			));

			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

			redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');

		}

		if ($param1 == 'upload_logo') {

			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');

			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

			redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');

		}

		$page_data['page_name']  = 'system_settings';

		$page_data['page_title'] = get_phrase('Ustawienia');

		$page_data['settings']   = $this->db->get('settings')->result_array();

		$this->load->view('index', $page_data);

	}

	


	function backup_restore($operation = '', $type = '')

	{

		if ($this->session->userdata('admin_login') != 1)

			redirect('login', 'refresh');

		

		if ($operation == 'create') {

			$this->crud_model->create_backup($type);

		}

		if ($operation == 'restore') {

			$this->crud_model->restore_backup();

			redirect(base_url() . 'index.php?admin/backup_restore/', 'refresh');

		}

		if ($operation == 'delete') {

			$this->crud_model->truncate($type);

			redirect(base_url() . 'index.php?admin/backup_restore/', 'refresh');

		}

		

		$page_data['page_name']  = 'backup_restore';

		$page_data['page_title'] = get_phrase('backup_restore');

		$this->load->view('index', $page_data);

	}

	


	function manage_profile($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('admin_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		if ($param1 == 'update_profile_info') {

			$data['name']    = $this->input->post('name');

			$data['email']   = $this->input->post('email');

			$data['address'] = $this->input->post('address');

			$data['phone']   = $this->input->post('phone');

			

			$this->db->where('admin_id', $this->session->userdata('admin_id'));

			$this->db->update('admin', $data);

			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			

			redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['password']             = $this->input->post('password');

			$data['new_password']         = $this->input->post('new_password');

			$data['confirm_new_password'] = $this->input->post('confirm_new_password');

			

			$current_password = $this->db->get_where('admin', array(

				'admin_id' => $this->session->userdata('admin_id')

			))->row()->password;

			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('admin_id', $this->session->userdata('admin_id'));

				$this->db->update('admin', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

			} else {

				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));

			}

			

			redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('Profil');

		$page_data['edit_profile'] = $this->db->get_where('admin', array(

			'admin_id' => $this->session->userdata('admin_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

}


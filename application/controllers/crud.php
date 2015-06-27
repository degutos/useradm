<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url'); //load helper url, this allows us to create anchor by codeigniter.
		$this->load->helper('form'); // this allows us to create forms by codeigniter.
		$this->load->helper('array'); // this allows send data array to file_model.
		$this->load->library('form_validation'); //this allows make a form validation.
		$this->load->model('crud_model'); // this allows we send data to crud_model file which is our model
		$this->load->library('session'); //this allows we send message to the screen about database success operations.
		$this->load->library('table');
	}

	
	public function index()
	{
		$data = array(
			'title' => 'CRUD with Codeigniter',
			'screen' => '',
		);
		$this->load->view('crud',$data);
	}

	public function create(){

		// Form Validation //
		$this->form_validation->set_rules('name', 'NAME', 'required|min_length[4]|max_length[50]|ucwords');
		$this->form_validation->set_message('is_unique','This %s already exist in the system');
		$this->form_validation->set_rules('email', 'EMAIL', 'required|max_length[50]|strtolower|valid_email|is_unique[curso_ci.email]');
		$this->form_validation->set_message('is_unique','This %s already exist in the system');
		$this->form_validation->set_rules('login', 'LOGIN', 'required|min_length[3]|max_length[25]|is_unique[curso_ci.login]');
		$this->form_validation->set_rules('password', 'PASSWORD', 'required|min_length[3]');
		$this->form_validation->set_message('matches','Passwords do not matches');
		$this->form_validation->set_rules('password2', 'CONFIRM PASSWORD', 'required|min_length[3]|matches[password]');

		if($this->form_validation->run()==TRUE):
			$data = elements(array('name','email','login','password'),$this->input->post());
			$data['password']=md5($data['password']);
			$this->crud_model->do_insert($data); //this send our $data to our crud_model function do_insert.
		endif;

		$data = array(
			'title' => 'CRUD - Create Page',
			'screen' => 'create',
		);
		$this->load->view('crud', $data);
	}

	public function retrieve() {
		$data = array(
			'title' => 'CRUD - Retrieve Page',
			'screen' => 'retrieve',
			'users' => $this->crud_model->get_all()->result(),
		);
		$this->load->view('crud', $data);
	}

	public function update() {
		// Form Validation //
		$this->form_validation->set_rules('name', 'NAME', 'required|min_length[4]|max_length[50]|ucwords');
		$this->form_validation->set_rules('password', 'PASSWORD', 'required|min_length[3]');
		$this->form_validation->set_message('matches','Passwords do not matches');
		$this->form_validation->set_rules('password2', 'CONFIRM PASSWORD', 'required|min_length[3]|matches[password]');

		if($this->form_validation->run()==TRUE):
			$data = elements(array('name','password'),$this->input->post());
			$data['password']=md5($data['password']);
			$this->crud_model->do_update($data,array('id'=>$this->input->post('useridchosen'))); //this send our $data to our crud_model 
		endif;

		$data = array(
			'title' => 'CRUD - Update Page',
			'screen' => 'update',
		);
		$this->load->view('crud', $data);
	}

	public function delete() {
		if($this->input->post('useridchosen')>0):
			$this->crud_model->do_delete(array('id'=>$this->input->post('useridchosen'))); //this send our $data to our crud_model 
		endif;
		$data = array(
			'title' => 'CRUD - Delete Page',
			'screen' => 'delete',
		);
		$this->load->view('crud', $data);
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

	public function do_insert($data=NULL){
		if($data!=NULL):
			$this->db->insert('curso_ci', $data);
			$this->session->set_flashdata('cadok','User added with success');
			redirect('crud/create');
		endif;
	}

	public function do_update($data=NULL,$condition=NULL){
		if($data!=NULL && $condition!=NULL):
			$this->db->update('curso_ci',$data,$condition);
			$this->session->set_flashdata('updateok','User Updated with Success');
			redirect(current_url());
		endif;
	}

	public function do_delete($condition=NULL){
		if($condition!=NULL):
			$this->db->delete('curso_ci',$condition);
			$this->session->set_flashdata('deleteok', 'Record deleted with success');
			redirect('crud/retrieve');
		endif;
	}

	public function get_all(){
		return $this->db->get('curso_ci');
	}

	public function get_byid($id=NULL){
		if($id!=NULL):
			$this->db->where('id',$id);
			$this->db->limit(1);
			return $this->db->get('curso_ci');
		else:
			return FALSE;
		endif;
	}



}
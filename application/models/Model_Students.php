<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Students extends CI_Model {

	public function addStudent(){
		$gurdian = array(

			'name' => $this->input->post('gname'),
			'nid' => $this->input->post('nIDcard'),
			'birth_reg_no' => $this->input->post('gbrn'),
			'address' => $this->input->post('gaddress'),
			'mobile' => $this->input->post('gmobile'),
			'mobile2' => $this->input->post('gmobile2'),
			'email' => $this->input->post('gemail'),
			'relation' => $this->input->post('relationWith'),
		);

		$result = $this->db->insert('local_guardians',$gurdian);
		$gid = $this->db->insert_id();

		$student = array(

			'name' => $this->input->post('sname'),
			'gender' => $this->input->post('gender'),
			'birth_date' => $this->input->post('dOfB'),
			'birth_reg_no' => $this->input->post('brn'),
			'f_name' => $this->input->post('fname'),
			'm_name' => $this->input->post('mname'),
			'f_mobile' => $this->input->post('fmobile'),
			'm_mobile' => $this->input->post('mmobile'),
			'f_profession' => $this->input->post('f_profession'),
			'm_profession' => $this->input->post('m_profession'),
			'f_est_income' => $this->input->post('fYincome'),
			'm_est_income' => $this->input->post('mYincome'),
			'permanent_address' => $this->input->post('permanentAdd'),
			'present_address' => $this->input->post('presentAdd'),
			'last_school' => $this->input->post('lastSchoolName'),
			'in_class' => $this->input->post('class'),
			'shift' => $this->input->post('shift'),
			'section' => $this->input->post('section'),
			'local_g_id' => $gid,
			'is_active' => 1,
			'add_by' => $this->session->userdata('user_id')
		);

		if($result){
			return $this->db->insert('students',$student);
		}

	}

	public function getAllStudents(){
		$this->db->order_by('id','DESC');
		$this->db->where('is_active','1');
		$query = $this->db->get('students');
		$data = $query->result_array();

		foreach ($data as $key => $value){
			$gid = $value['local_g_id'];
			$genderid = $value['gender'];
			$classid = $value['in_class'];

			$this->db->where('id',$gid);
			$query = $this->db->get('local_guardians');
			$ret = $query->row();
			$gName = $ret->name;
			$gmobile = $ret->mobile;

			$this->db->where('id',$genderid);
			$query = $this->db->get('gender');
			$ret = $query->row();
			$genderName = $ret->name;

			$this->db->where('id',$classid);
			$query = $this->db->get('class');
			$ret = $query->row();
			$className = $ret->name;

			$data[$key]['local_g_name'] = $gName;
			$data[$key]['gmobile'] = $gmobile;
			$data[$key]['gender'] = $genderName;
			$data[$key]['in_class'] = $className;
		}

		return $data;
	}

	public function getDetails($id){
		$this->db->where('id',$id);
		$query = $this->db->get('students');
		$data['students'] = $query->result_array();

		foreach ($data['students'] as $key => $value){
			
			$gid = $value['local_g_id'];
			$this->db->where('id',$id);
			$query = $this->db->get('local_guardians');
			$data['gurdians'] = $query->result_array();

			$genderid = $value['gender'];
			$this->db->where('id',$genderid);
			$query = $this->db->get('gender');
			$ret = $query->row();
			$genderName = $ret->name;
			$data['students'][$key]['gender'] = $genderName;

			$fprofession = $value['f_profession'];
			$this->db->where('id',$fprofession);
			$query = $this->db->get('professions');
			$ret = $query->row();
			$fpname = $ret->name;
			$data['students'][$key]['f_profession'] = $fpname;

			$mprofession = $value['m_profession'];
			$this->db->where('id',$mprofession);
			$query = $this->db->get('professions');
			$ret = $query->row();
			$mpname = $ret->name;
			$data['students'][$key]['m_profession'] = $mpname;

			$classid = $value['in_class'];
			$this->db->where('id',$classid);
			$query = $this->db->get('class');
			$ret = $query->row();
			$clsname = $ret->name;
			$data['students'][$key]['in_class'] = $clsname;

			$shiftid = $value['shift'];
			$this->db->where('id',$shiftid);
			$query = $this->db->get('shifts');
			$ret = $query->row();
			$shiftname = $ret->name;
			$data['students'][$key]['shift'] = $shiftname;

			$secid = $value['section'];
			$this->db->where('id',$secid);
			$query = $this->db->get('section');
			$ret = $query->row();
			$secname = $ret->name;
			$data['students'][$key]['section'] = $secname;
		}

		foreach ($data['gurdians'] as $key => $value){
			$relationid = $value['relation'];
			$this->db->where('id',$relationid);
			$query = $this->db->get('relation');
			$ret = $query->row();
			$rname = $ret->name;
			$data['gurdians'][$key]['relation'] = $rname;
		}

		return $data;
	}

	public function getDetailsForEdit($id){
		$this->db->where('id',$id);
		$query = $this->db->get('students');
		$data['students'] = $query->result_array();

		$data['classes'] = $this->getClasses();
		$data['relations'] = $this->getRelations();
		$data['shifts'] = $this->getShifts();
		$data['professions'] = $this->getProfessions();
		$data['genders'] = $this->getGenders();
		$data['actives'] = $this->getActives();
		$data['sections'] = $this->getSections();

		foreach ($data['students'] as $key => $value){
			$gid = $value['local_g_id'];
			$this->db->where('id',$id);
			$query = $this->db->get('local_guardians');
			$data['guardians'] = $query->result_array();
		}

		return $data;
	}

	public function updateDetails(){
		$guardianID = $this->input->post('guardianID');
		$studentID = $this->input->post('studentID');
		$gurdian = array(

			'name' => $this->input->post('gname'),
			'nid' => $this->input->post('nIDcard'),
			'birth_reg_no' => $this->input->post('gbrn'),
			'address' => $this->input->post('gaddress'),
			'mobile' => $this->input->post('gmobile'),
			'mobile2' => $this->input->post('gmobile2'),
			'email' => $this->input->post('gemail'),
			'relation' => $this->input->post('relationWith'),
		);

		$this->db->where('id',$guardianID);
		$result = $this->db->update('local_guardians',$gurdian);

		$student = array(

			'name' => $this->input->post('sname'),
			'gender' => $this->input->post('gender'),
			'birth_date' => $this->input->post('dOfB'),
			'birth_reg_no' => $this->input->post('brn'),
			'f_name' => $this->input->post('fname'),
			'm_name' => $this->input->post('mname'),
			'f_mobile' => $this->input->post('fmobile'),
			'm_mobile' => $this->input->post('mmobile'),
			'f_profession' => $this->input->post('f_profession'),
			'm_profession' => $this->input->post('m_profession'),
			'f_est_income' => $this->input->post('fYincome'),
			'm_est_income' => $this->input->post('mYincome'),
			'permanent_address' => $this->input->post('permanentAdd'),
			'present_address' => $this->input->post('presentAdd'),
			'last_school' => $this->input->post('lastSchoolName'),
			'in_class' => $this->input->post('class'),
			'section' => $this->input->post('section'),
			'shift' => $this->input->post('shift'),
			'local_g_id' => $guardianID,
			'is_active' => $this->input->post('is_active'),
			'modified_by' => $this->session->userdata('user_id'),
		);

		if($result){
			$this->db->where('id',$studentID);
			return $this->db->update('students',$student);
		}
	}


















	/*GET LOCAL DATABASE DATA*/
	public function getClasses(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('class');
		return $query->result_array();
	}

	public function getRelations(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('relation');
		return $query->result_array();
	}

	public function getShifts(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('shifts');
		return $query->result_array();
	}

	public function getProfessions(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('professions');
		return $query->result_array();
	}

	public function getGenders(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('gender');
		return $query->result_array();
	}

	public function getActives(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('actives');
		return $query->result_array();
	}

	public function getSections(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('section');
		return $query->result_array();
	}



}

/* End of file Model_Students.php */
/* Location: ./application/models/Model_Students.php */
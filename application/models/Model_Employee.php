<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Employee extends CI_Model {

	public function addEmployee(){
		$data = array(

			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'empid' => $this->input->post('empid'),
			'gender' => $this->input->post('gender'),
			'mobile' => $this->input->post('mobile'),
			'mobile2' => $this->input->post('mobile2'),
			'position' => $this->input->post('position'),
			'designation' => $this->input->post('designation'),
			'salary' => $this->input->post('salary'),
			'is_active' => $this->input->post('isactive'),
			'date_of_birth' => $this->input->post('dOfB'),
			'nid' => $this->input->post('nid'),
			'address' => $this->input->post('address'),
			'add_by' => $this->session->userdata('user_id')
		);

		$result = $this->db->insert('employee',$data);
		$empid = $this->db->insert_id();

		$carts = $this->cart->contents();
		foreach ($carts as $key => $cart){
			$educations[$key] = array(

				'emp_id' => $empid,
				'e_level' => $cart['id'],
				'i_name' => $cart['name'],
				'result' => $cart['result'],
				'p_year' => $cart['pyear']
			);
		}

		if($result){
			return $this->db->insert_batch('qualifications', $educations);
		}else{
			return false;
		}

	}

	public function getAllEmployee(){
		$this->db->where('is_active','1');
		$query = $this->db->get('employee');
		$data = $query->result_array();

		foreach($data as $key => $value){
			$genderid = $value['gender'];
			$positionid = $value['position'];
			$designationid = $value['designation'];

			$this->db->where('id',$genderid);
			$query = $this->db->get('gender');
			$ret = $query->row();
			$genderName = $ret->name;

			$this->db->where('id',$positionid);
			$query = $this->db->get('position');
			$ret = $query->row();
			$positionName = $ret->name;

			$this->db->where('id',$designationid);
			$query = $this->db->get('designation');
			$ret = $query->row();
			$designationName = $ret->name;

			$data[$key]['gender'] = $genderName;
			$data[$key]['position'] = $positionName;
			$data[$key]['designation'] = $designationName;
		}

		return $data;
	}

	public function getDetails($id){
		$this->db->where('id',$id);
		$query = $this->db->get('employee');
		$data['basic'] = $query->result_array();

		foreach($data['basic'] as $key => $value){
			$genderid = $value['gender'];
			$positionid = $value['position'];
			$designationid = $value['designation'];
			$isactiveid = $value['is_active'];
			// $addbyid = $value['add_by'];

			$this->db->where('id',$genderid);
			$query = $this->db->get('gender');
			$ret = $query->row();
			$genderName = $ret->name;

			$this->db->where('id',$positionid);
			$query = $this->db->get('position');
			$ret = $query->row();
			$positionName = $ret->name;

			$this->db->where('id',$designationid);
			$query = $this->db->get('designation');
			$ret = $query->row();
			$designationName = $ret->name;

			$this->db->where('id',$isactiveid);
			$query = $this->db->get('designation');
			$ret = $query->row();
			$isActiveName = $ret->name;

			/*$this->db->where('id',$addbyid);
			$query = $this->db->get('users');
			$ret = $query->row();
			$addbyName = $ret->name;*/

			$data['basic'][$key]['gender'] = $genderName;
			$data['basic'][$key]['position'] = $positionName;
			$data['basic'][$key]['designation'] = $designationName;
			$data['basic'][$key]['is_active'] = $isActiveName;
			// $data['basic'][$key]['add_by'] = $addbyName;
		}

		$this->db->where('emp_id',$id);
		$query = $this->db->get('qualifications');
		$data['qualifications'] = $query->result_array();

		foreach($data['qualifications'] as $key => $value){
			$elevelid = $value['e_level'];

			$this->db->where('id',$elevelid);
			$query = $this->db->get('education');
			$ret = $query->row();
			$elevelName = $ret->name;

			$data['qualifications'][$key]['e_level'] = $elevelName;
		}

		return $data;
	}

	public function getBasicForEdit($id){
		$this->db->where('id',$id);
		$query = $this->db->get('employee');
		$data['basic'] = $query->result_array();

		$data['genders'] = $this->getGenders();
		$data['positions'] = $this->getPositions();

		foreach($data['basic'] as $key => $value){
			$pid = $value['position'];
			$this->db->where('position_id',$pid);
			$query = $this->db->get('designation');
			$data['designations'] = $query->result_array();
		}

		return $data;
	}

	public function updateBasicInformation(){
		$id = $this->input->post('id');

		$data = array(

			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'empid' => $this->input->post('empid'),
			'gender' => $this->input->post('gender'),
			'mobile' => $this->input->post('mobile'),
			'mobile2' => $this->input->post('mobile2'),
			'position' => $this->input->post('position'),
			'designation' => $this->input->post('designation'),
			'salary' => $this->input->post('salary'),
			'is_active' => $this->input->post('isactive'),
			'date_of_birth' => $this->input->post('dOfB'),
			'nid' => $this->input->post('nid'),
			'address' => $this->input->post('address'),
			'modified_by' => $this->session->userdata('user_id')
		);

		$this->db->where('id',$id);

		if($this->db->update('employee',$data)){
			return true;
		}else{
			return false;
		}
	}

	public function getSingleQualification($id){
		$this->db->where('id',$id);
		$query = $this->db->get('qualifications');
		$data['basic'] = $query->result_array();
		$data['educations'] = $this->getEducations();

		return $data;
	}

	public function updateSingleQualification(){
		$id = $this->input->post('id');

		$data = array(

			'e_level' => $this->input->post('elevel'),
			'i_name' => $this->input->post('iname'),
			'result' => $this->input->post('result'),
			'p_year' => $this->input->post('pyear'),
		);

		$this->db->where('id',$id);
		if($this->db->update('qualifications',$data)){
			return true;
		}else{
			return false;
		}
	}

	public function addQualifications(){
		$empid = $this->input->post('empid');

		$carts = $this->cart->contents();
		foreach ($carts as $key => $cart){
			$educations[$key] = array(

				'emp_id' => $empid,
				'e_level' => $cart['id'],
				'i_name' => $cart['name'],
				'result' => $cart['result'],
				'p_year' => $cart['pyear']
			);
		}

		if($this->db->insert_batch('qualifications', $educations)){
			return true;
		}else{
			return false;
		}

	}

	public function deleteQualification($id){
		$this->db->where('id', $id);
		if($this->db->delete('qualifications')){
			return true;
		}else{
			return false;
		}
	}

	public function profile(){
		$id = $this->session->userdata('user_id');
		
		$this->db->where('id',$id);
		$query = $this->db->get('users');
		$ret = $query->row();
		$empid = $ret->emp_id;

		$this->db->where('id',$empid);
		$query = $this->db->get('employee');
		$data = $query->result_array();

		foreach($data as $key => $value){
			$genderid = $value['gender'];
			$positionid = $value['position'];
			$designationid = $value['designation'];
			$isactiveid = $value['is_active'];

			$this->db->where('id',$genderid);
			$query = $this->db->get('gender');
			$ret = $query->row();
			$genderName = $ret->name;

			$this->db->where('id',$positionid);
			$query = $this->db->get('position');
			$ret = $query->row();
			$positionName = $ret->name;

			$this->db->where('id',$designationid);
			$query = $this->db->get('designation');
			$ret = $query->row();
			$designationName = $ret->name;

			$this->db->where('id',$isactiveid);
			$query = $this->db->get('actives');
			$ret = $query->row();
			$isActiveName = $ret->name;

			$data[$key]['gender'] = $genderName;
			$data[$key]['position'] = $positionName;
			$data[$key]['designation'] = $designationName;
			$data[$key]['is_active'] = $isActiveName;
		}

		return $data;
	}

	








	/*Get data From DataBase*/
	public function getGenders(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('gender');
		return $query->result_array();
	}

	public function getPositions(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('position');
		return $query->result_array();
	}	

	public function getEducations(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('education');
		return $query->result_array();
	}

	public function getActives(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('actives');
		return $query->result_array();
	}


	/*AJAX MODELS*/
	public function getDesignations($id){
		$sql = "SELECT * FROM designation WHERE position_id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->result_array();
	}

}

/* End of file Model_Employee.php */
/* Location: ./application/models/Model_Employee.php */
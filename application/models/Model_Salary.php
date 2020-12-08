<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Salary extends CI_Model {

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

	public function addSalary(){
		$count = $this->input->post('rownumbers');
		for($i=0; $i<$count;$i++) {
			$data[$i] = array(	
		        'emp_id' => $this->input->post('id')[$i],
		        'salary' => $this->input->post('salary')[$i],
		        'p_status' => $this->input->post('paidstatus')[$i], 
		        'amount' => $this->input->post('amount')[$i],
		        'month' => $this->input->post('month'),
		        'year' => $this->input->post('year'),
				'add_by' => $this->session->userdata('user_id')	
			);
		}
		$result = $this->db->insert_batch('salary', $data);
		if($result){
			return true;
		}else{
			return false;
		}
	}









	/*Get Data From DB*/
	public function getMonths(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('months');
		return $query->result_array();
	}

	public function getPaidStatus(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('paid_status');
		return $query->result_array();
	}

	public function getYears(){
		$this->db->distinct();
		$this->db->select('year');
		$query = $this->db->get('salary');
		return $query->result_array();
	}

	public function checkIfAlreadyThere(){
		$month = date("m");
		$year = date("Y");

		$this->db->where('month',$month);
		$this->db->where('year',$year);

		$query = $this->db->get('salary');
		$data = $query->result_array();

		if($data == NULL){
			return true;
		}else{
			return false;
		}
	}






	/*AJAX Models*/
	public function getEmployeeIDForSearch($search=''){
		if($search)
		{
	 		$sql = "SELECT * FROM  employee WHERE name LIKE '$search%' OR mobile LIKE '$search%' OR empid LIKE '$search%' OR mobile2 LIKE '$search%'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}

	public function getsingleEmployeeRow($id){
		$this->db->where('id',$id);
		$query = $this->db->get('employee',$id);
		return $query->row_array();
	}

	public function getSalarySheetOneByMonth($data){
		$month = $data['month'];

		$this->db->where('month',$month);
		$query = $this->db->get('salary');
		$data = $query->result_array();

		foreach ($data as $key => $value){
			$empid = $value['emp_id'];

			$this->db->where('id',$empid);
			$query = $this->db->get('employee');
			$ret = $query->row();
			$eName = $ret->name;
			$emobile = $ret->mobile;

			$data[$key]['ename'] = $eName;
			$data[$key]['emobile'] = $emobile;
		}

		return $data;
	}

	public function getSalarySheetOneByYear($data){
		$year = $data['year'];

		$this->db->where('year',$year);
		$query = $this->db->get('salary');
		$data = $query->result_array();

		foreach ($data as $key => $value){
			$empid = $value['emp_id'];

			$this->db->where('id',$empid);
			$query = $this->db->get('employee');
			$ret = $query->row();
			$eName = $ret->name;
			$emobile = $ret->mobile;

			$data[$key]['ename'] = $eName;
			$data[$key]['emobile'] = $emobile;
		}

		return $data;
	}

	public function getSalarySheetOneByMonthAndYear($data){
		$month = $data['month'];
		$year = $data['year'];

		$this->db->where('month',$month);
		$this->db->where('year',$year);
		$query = $this->db->get('salary');
		$data = $query->result_array();

		foreach ($data as $key => $value){
			$empid = $value['emp_id'];

			$this->db->where('id',$empid);
			$query = $this->db->get('employee');
			$ret = $query->row();
			$eName = $ret->name;
			$emobile = $ret->mobile;

			$data[$key]['ename'] = $eName;
			$data[$key]['emobile'] = $emobile;
		}

		return $data;

	}

	public function getSalarySheetByEmpID($id){

		$this->db->where('emp_id',$id);
		$query = $this->db->get('salary');
		$data = $query->result_array();

		foreach ($data as $key => $value){
			$empid = $value['emp_id'];

			$this->db->where('id',$empid);
			$query = $this->db->get('employee');
			$ret = $query->row();
			$eName = $ret->name;
			$emobile = $ret->mobile;

			$data[$key]['ename'] = $eName;
			$data[$key]['emobile'] = $emobile;
		}

		return $data;
	}









}

/* End of file Model_Salary.php */
/* Location: ./application/models/Model_Salary.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Position extends CI_Model {

	public function addPosition(){
		$data = array(
			'name' => $this->input->post('name')
		);

		$result = $this->db->insert('position',$data);
		$pid = $this->db->insert_id();

		if($result){
			$carts = $this->cart->contents();
			foreach ($carts as $key => $cart){
				$designation[$key] = array(

					'name' => $cart['name'],
					'position_id' => $pid
				);
			}
			if($this->db->insert_batch('designation', $designation)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
		
	}

	public function addDesignation(){
		$pid = $this->input->post('id');
		$carts = $this->cart->contents();
		foreach ($carts as $key => $cart){
			$designation[$key] = array(

				'name' => $cart['name'],
				'position_id' => $pid
			);
		}

		if($this->db->insert_batch('designation', $designation)){
			return true;
		}else{
			return false;
		}
	}

	public function getAllPositions(){
		$query = $this->db->get('position');
		return $query->result_array();
	}








	/*AJAX MODELS*/
	public function getPositionIDForSearch($search=''){
		if($search)
		{
	 		$sql = "SELECT * FROM  position WHERE name LIKE '$search%'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}

	public function getsinglePositionRow($id){
		$this->db->where('id',$id);
		$query = $this->db->get('position',$id);
		return $query->row_array();
	}

	public function getPositionData($id = null){

		if($id) {
			$sql = "SELECT * FROM position WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function updatePositionName($id = null, $data = array()){
		if($id && $data){
			$this->db->where('id', $id);
			$update = $this->db->update('position',$data);
			return ($update == true) ? true : false;
		}
	}

	public function getDesignations($id){
		$this->db->where('position_id',$id);
		$query = $this->db->get('designation');
		return $query->result_array();
	}

	/*For Designation*/
	public function getSingleDesignationData($id = null){

		if($id) {
			$sql = "SELECT * FROM designation WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function updateDesignationName($id = null, $data = array()){
		if($id && $data){
			$this->db->where('id', $id);
			$update = $this->db->update('designation',$data);
			return ($update == true) ? true : false;
		}
	}	










}

/* End of file Model_Position.php */
/* Location: ./application/models/Model_Position.php */
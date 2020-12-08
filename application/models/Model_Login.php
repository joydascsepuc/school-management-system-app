<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login extends CI_Model {

	public function login($username,$password){

		$this->db->where('username',$username);
		$this->db->where('password',$password);

		$result = $this->db->get('users');
		if($result->num_rows() == 1){ 

			$data = array(
				'id' => $result->row(0)->id,
				'username' => $result->row(1)->username
			);
			return $data;
		}else{
			return false;
		}
	}

}

/* End of file Model_Login.php */
/* Location: ./application/models/Model_Login.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function loadAddEmployee(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$this->cart->destroy();
			$data['genders'] = $this->Model_Employee->getGenders();
			$data['positions'] = $this->Model_Employee->getPositions();
			$data['educations'] = $this->Model_Employee->getEducations();

			$this->load->view('templates/header');
			$this->load->view('pages/employee/addEmployee',$data);
			$this->load->view('templates/footer');
		}
	}

	public function addEmployee(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			if($this->Model_Employee->addEmployee()){
				$this->session->set_flashdata('employee_added','Employee Information Added Successfully.');
				$this->cart->destroy();
				redirect('employee/viewAllEmployee');
			}else{
				$this->session->set_flashdata('employee_not_added','Employee Information not Added.');
				$this->cart->destroy();
				redirect('employee/loadAddEmployee');
			}
		}
	}

	public function viewAllEmployee(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$data['employees'] = $this->Model_Employee->getAllEmployee();

			$this->load->view('templates/header');
			$this->load->view('pages/employee/viewAllEmployee',$data);
			$this->load->view('templates/footer');
		}
	}

	public function getDetails(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$id = $this->uri->segment('3');
			$data['employees'] = $this->Model_Employee->getDetails($id);

			$this->load->view('templates/header');
			$this->load->view('pages/employee/viewDetails',$data);
			$this->load->view('templates/footer');
		}
	}

	public function loadEditBasic(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$id = $this->uri->segment('3');
			$data['employees'] = $this->Model_Employee->getBasicForEdit($id);

			$this->load->view('templates/header');
			$this->load->view('pages/employee/editDetails',$data);
			$this->load->view('templates/footer');
		}
	}

	public function updateInformation(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			if($this->Model_Employee->updateBasicInformation()){
				$this->session->set_flashdata('employee_updated','Employee Information Updated Successfully.');
				redirect('employee/viewAllEmployee');
			}else{
				$this->session->set_flashdata('employee_not_updated','Employee Information not Updated.');
				redirect('employee/viewAllEmployee');
			}
		}
	}

	public function loadEditQualification(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$id = $this->uri->segment('3');
			$data['data'] = $this->Model_Employee->getSingleQualification($id);

			$this->load->view('templates/header');
			$this->load->view('pages/employee/editQualification',$data);
			$this->load->view('templates/footer');
		}
	}

	public function updateQualification(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			if($this->Model_Employee->updateSingleQualification()){
				$this->session->set_flashdata('q_updated','Qualification Updated.');
				redirect('employee/viewAllEmployee');
			}else{
				$this->session->set_flashdata('q_not_updated','Qualification not Updated.');
				redirect('employee/viewAllEmployee');
			}
		}
	}

	public function loadAddQualification(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$this->cart->destroy();
			$data['id'] = $this->uri->segment('3');
			$data['educations'] = $this->Model_Employee->getEducations();

			$this->load->view('templates/header');
			$this->load->view('pages/employee/addQualification',$data);
			$this->load->view('templates/footer');
		}
	}

	public function addQualification(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			if($this->Model_Employee->addQualifications()){
				$this->cart->destroy();
				$this->session->set_flashdata('q_added','Qualification(s) Added.');
				redirect('employee/viewAllEmployee');
			}else{
				$this->cart->destroy();
				$this->session->set_flashdata('q_not_added','Qualification(s) not Added.');
				redirect('employee/viewAllEmployee');
			}
		}
	}

	public function deleteQualification(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$id = $this->uri->segment('3');
			if($this->Model_Employee->deleteQualification($id)){
				$this->session->set_flashdata('q_deleted','Qualification Deleted.');
				redirect('employee/viewAllEmployee');
			}else{
				$this->session->set_flashdata('q_not_deleted','Qualification not Deleted.');
				redirect('employee/viewAllEmployee');
			}
		}
	}

	public function profile(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$data['data'] = $this->Model_Employee->profile();

			$this->load->view('templates/header');
			$this->load->view('pages/employee/profile',$data);
			$this->load->view('templates/footer');
		}
	}




















	/*AJAX CONTROLLERS*/
	public function addEducationList(){
		$id = $this->input->post('id');
		$iname = $this->input->post('iname');
		$result = $this->input->post('result');
		$pyear = $this->input->post('pyear');

		if($id){
			$data = array(
				'id' => $id, 
				'qty' => 1,
				'price' => 0,	
				'name' => $iname,
				'result' => $result,		
	            'pyear' => $pyear,
			);
			$this->cart->insert($data);
			echo json_encode(array('status' => 'ok',
							'data' => $this->cart->contents()
						)
				);
		}else{
			echo json_encode(array('status' => 'error'));
		}
        
	}

	public function deleteEducationList($rowid){

		if($this->cart->remove($rowid)) {
			echo $this->cart->total();
		}else{
			echo "false";
		}

	}

	public function getDesignations(){

		$positionid = $this->input->post('positionid');
		$did =  $this->Model_Employee->getDesignations($positionid);
		if(count($did)>0)
		{
			$pro_select_box = '';
			
			$pro_select_box .= '<option value="">Select Designation</option>';
			foreach ($did as $key => $value) {
				$pro_select_box .='<option value="'.$value['id'].'">'.$value['name'].'</option>';
			}
			echo json_encode($pro_select_box);
		}
		else{
			$pro_select_box = '';
			$pro_select_box .= '<option value="0">None</option>';
			echo json_encode($pro_select_box);
		}
	}


}

/* End of file employee.php */
/* Location: ./application/controllers/employee.php */
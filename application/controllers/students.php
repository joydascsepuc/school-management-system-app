<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function loadAddStudent(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{

			$data['classes'] = $this->Model_Students->getClasses();
			$data['relations'] = $this->Model_Students->getRelations();
			$data['shifts'] = $this->Model_Students->getShifts();
			$data['professions'] = $this->Model_Students->getProfessions();
			$data['genders'] = $this->Model_Students->getGenders();
			$data['sections'] = $this->Model_Students->getSections();

			$this->load->view('templates/header');
			$this->load->view('pages/students/addStudent',$data);
			$this->load->view('templates/footer');
		}

	}

	public function addStudent(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			if($this->Model_Students->addStudent()){
				$this->session->set_flashdata('student_added','Student Information Added Successfully.');
				redirect('students/viewAllStudents');
			}else{
				$this->session->set_flashdata('student_not_added','Student Information not Added.');
				redirect('students/loadAddStudent');
			}
		}
	}

	public function viewAllStudents(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{

			$data['students'] = $this->Model_Students->getAllStudents();

			$this->load->view('templates/header');
			$this->load->view('pages/students/viewAllStudents',$data);
			$this->load->view('templates/footer');
		}
	}


	public function getDetails(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$id = $this->uri->segment('3');
			$data['details'] = $this->Model_Students->getDetails($id);

			$this->load->view('templates/header');
			$this->load->view('pages/students/gDetails',$data);
			$this->load->view('templates/footer');
		}
	}

	public function loadEditInfo(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$id = $this->uri->segment('3');
			$data['details'] = $this->Model_Students->getDetailsForEdit($id);

			$this->load->view('templates/header');
			$this->load->view('pages/students/eDetails',$data);
			$this->load->view('templates/footer');
		}
	}

	public function updateRecord(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			if($this->Model_Students->updateDetails()){
				$this->session->set_flashdata('student_info_updated','Student Information Updated.');
				redirect('students/viewAllStudents');
			}else{
				$this->session->set_flashdata('student_info_not_updated','Student Information not Updated.');
				redirect('students/viewAllStudents');
			}
		}
	}




















}

/* End of file students.php */
/* Location: ./application/controllers/students.php */
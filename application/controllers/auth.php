<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index(){
		$this->session->unset_userdata('logged_in');
		$this->load->view('templates/header.php');
		$this->load->view('pages/auth/login.php');
		$this->load->view('templates/footer.php');	
	}

	public function login(){
		$cango = $this->license();
		if($cango){

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run() === FALSE){
				redirect('auth/index');
			}else{

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$info = $this->Model_Login->login($username,$password);

				if($info){

					$id = $info['id'];
					/*$username = $info['username'];
					$admintype = $info['admintype'];
					$name = $info['name'];*/

					$user_data = array(
						'user_id' => $id,
						/*'username' => $username,
						'admintype' => $admintype,
						'name' => $name,*/
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('login_successfull','Welcome Back.');
					redirect('auth/dashboard');
					
				}else{
					$this->session->set_flashdata('wrong','Combination of username and password is not correct.');
					redirect('auth/index');

				}
			}	
		}else{
			$this->session->set_flashdata('license','Software license expired. Contact Developer.');
			redirect('auth/index');
		}
		

	}

	public function license(){

		$license_till = ('10-01-2021');
		$today=date('d-m-Y');
		$days = (strtotime($license_till) - strtotime($today)) / (60 * 60 * 24);

		if($days<=-1){
			return false;

		}elseif($days<=30){
			$this->session->set_flashdata('license','Software license is about to end in '.$days.' days. Contact Developer Soon.');
			return true;
		}else{
			return true;
		}
	}

	public function dashboard(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$this->load->view('templates/header.php');
			$this->load->view('pages/dashboard/dashboard.php');
			$this->load->view('templates/footer.php');	
		}

	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		redirect('auth/index');
	}







	

}


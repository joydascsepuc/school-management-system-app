<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Positions extends CI_Controller {

	public function loadAddPosition(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$this->cart->destroy();
			$this->load->view('templates/header');
			$this->load->view('pages/positions/addPosition');
			$this->load->view('templates/footer');
		}

	}

	public function addPosition(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			if($this->Model_Position->addPosition()){
				$this->session->set_flashdata('position_added','Position with Designation(s) Added Successfully.');
				$this->cart->destroy();
				redirect('positions/viewAllPositions');
			}else{
				$this->session->set_flashdata('position_not_added','Position with Designation(s) not Added.');
				$this->cart->destroy();
				redirect('positions/loadAddPosition');
			}
		}
	}

	public function loadAddDesignation(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$this->cart->destroy();
			$this->load->view('templates/header');
			$this->load->view('pages/positions/addDeignation');
			$this->load->view('templates/footer');
		}
	}

	public function addDesignation(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			if($this->Model_Position->addDesignation()){
				$this->session->set_flashdata('designation_added','Designation(s) for this position Added.');
				$this->cart->destroy();
				redirect('positions/viewAllPositions');
			}else{
				$this->session->set_flashdata('designation_not_added','Designation(s) for this position not Added.');
				$this->cart->destroy();
				redirect('positions/loadAddDesignation');
			}
		}
	}

	public function viewAllPositions(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$this->load->view('templates/header');
			$this->load->view('pages/positions/viewAllPositions');
			$this->load->view('templates/footer');
		}
	}

	public function getPositions(){
		$data= $this->Model_Position->getAllPositions();
		foreach ($data as $key => $value) {
			// button
			$buttons = '';
			
			$buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i></button>';
		
				
			$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="far fa-trash-alt"></i></button>';

			$buttons .= '<button type="button" class="btn btn-default" onclick="getDFunc('.$value['id'].')" data-toggle="modal" data-target="#getModal"><i class="fas fa-bars"></i></button>';
			

			$result['data'][$key] = array(
				$value['name'],
				$buttons
			);
		}

		echo json_encode($result);
	}












	/*AJAX CONTROLLER*/

	public function addDesignationList(){
		$name = $this->input->post('name');
		
		if($name != ""){
			$data = array(
				'id' => rand(1000,9999),
				'qty' => 1,
				'price' => 0,	
				'name' => $name
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

	public function deleteDesignationList($rowid){

		if($this->cart->remove($rowid)) {
			echo $this->cart->total();
		}else{
			echo "false";
		}

	}

	public function fetchPositionIDForSearch(){
		$search = $this->input->post('search');
		$html='';

		$positions = $this->Model_Position->getPositionIDForSearch($search);

		if (count($positions)>0){

			$html= '<ul class="list-unstyled ulistStyle" id="pID">';
			foreach ($positions as $key => $value) {
 		 		$html.= '<li class="liStyle" id="'.$value['id'].'">'.$value['name'].'</li>';
 		 	}

			$html.= '</ul>';
		}
		
		echo $html;
	}

	public function fetchPosition(){
		$pID = $this->input->post('pID');
		$position = $this->Model_Position->getsinglePositionRow($pID);
		echo json_encode($position);
	}

	/*Modal AJAX*/
	public function fetchPositionDataById($id = null){
		if($id){
			$data = $this->Model_Position->getPositionData($id);
			echo json_encode($data);
		}

	}

	public function updatePositionName($id){

		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}

		$response = array();

		if($id){

			$this->form_validation->set_rules('name', 'Category name', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE){
	        	$data = array(
	        		'name' => $this->input->post('name')
	        	);

	        	$update = $this->Model_Position->updatePositionName($id, $data);

	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the complaint information';
	        	}
	        }else{
	        		$response['success'] = false;
	        		foreach ($_POST as $key => $value) {
	        			$response['messages'][$key] = form_error($key);
	        		}
	        	}
			}else {
				$response['success'] = false;
				$response['messages'] = 'Error please refresh the page again!!';
			}

		echo json_encode($response);
	}

	public function fetchDesignationDataById($id){

		$data = $this->Model_Position->getDesignations($id);

		$html='<tr><th>Designation(s) List</th><th>Action</th></tr>';

		if(count($data)>0){
			foreach($data as $key=>$value){
				$html .= '<tr><td>'.$value['name'].'</td>
						      <td><button type="button" class="btn btn-default" onclick="editDFunc('.$value['id'].')" data-toggle="modal" data-target="#editDModal"><i class="far fa-edit"></i></button></td>
				</tr>';
			}
		}else{
			$html .= '<tr><td>None</td></tr>';
		}
		echo json_encode($html);
	}


	/*For Designation*/
	public function fetchSingleDesignationDataById($id = null){
		if($id){
			$data = $this->Model_Position->getSingleDesignationData($id);
			echo json_encode($data);
		}

	}

	public function updateDesignationName($id){

		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}

		$response = array();

		if($id){

			$this->form_validation->set_rules('d_name', 'Designation name', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE){
	        	$data = array(
	        		'name' => $this->input->post('d_name')
	        	);

	        	$update = $this->Model_Position->updateDesignationName($id, $data);

	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the complaint information';
	        	}
	        }else{
	        		$response['success'] = false;
	        		foreach ($_POST as $key => $value) {
	        			$response['messages'][$key] = form_error($key);
	        		}
	        	}
			}else {
				$response['success'] = false;
				$response['messages'] = 'Error please refresh the page again!!';
			}

		echo json_encode($response);
	}














}

/* End of file Positions.php */
/* Location: ./application/controllers/Positions.php */
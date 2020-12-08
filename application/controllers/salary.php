<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller {

	public function loadSalaryEntry(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$data['employees'] = $this->Model_Salary->getAllEmployee();
			$data['check'] = $this->Model_Salary->checkIfAlreadyThere();
			$data['months'] = $this->Model_Salary->getMonths();
			$data['pstatus'] = $this->Model_Salary->getPaidStatus();

			$this->load->view('templates/header');
			$this->load->view('pages/salary/salaryEntry',$data);
			$this->load->view('templates/footer');
		}
	}

	public function addSalary(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			if($this->Model_Salary->addSalary()){
				$this->session->set_flashdata('salary_added','Salary Sheet Added for the following month.');
				redirect('salary/exploreSalary');
			}else{
				$this->session->set_flashdata('salary_not_added','Salary Sheet not Added for the following month.');
				redirect('salary/exploreSalary');
			}
		}
	}

	public function exploreSalary(){
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}else{
			$data['months'] = $this->Model_Salary->getMonths();
			$data['years'] = $this->Model_Salary->getYears();

			$this->load->view('templates/header');
			$this->load->view('pages/salary/exploreSalary',$data);
			$this->load->view('templates/footer');
		}
	}










	/*AJAX Controllers*/
	public function fetchEmpIDForSearch(){
		$search = $this->input->post('search');
		$html='';

		$employees = $this->Model_Salary->getEmployeeIDForSearch($search);

		if (count($employees)>0){

			$html= '<ul class="list-unstyled ulistStyle" id="eID">';
			foreach ($employees as $key => $value) {
 		 		$html.= '<li class="liStyle" id="'.$value['id'].'">'.$value['name'].'-'.$value['mobile'].'-'.$value['empid'].'</li>';
 		 	}

			$html.= '</ul>';
		}
		
		echo ($html);
	}

	public function fetchEmployee(){
		$empID = $this->input->post('eID');
		$emp = $this->Model_Salary->getsingleEmployeeRow($empID);
		echo json_encode($emp);
	}

	public function getSalarySheetOne(){
		
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$data = array(
			'month' => $month,
			'year' => $year
		);

		if($month == ''){
			$data = $this->Model_Salary->getSalarySheetOneByYear($data);
		}elseif($year == ''){
			$data = $this->Model_Salary->getSalarySheetOneByMonth($data);
		}else{
			$data = $this->Model_Salary->getSalarySheetOneByMonthAndYear($data);
		}
		

		$html='<tr>
					<th>Name</th>
					<th>Mobile</th>
					<th>Salary</th>
					<th>Amount</th>
					<th>Month</th>
					<th>Year</th>
				</tr>';

		if(count($data)>0){
		
			foreach ($data as $key => $value) {	

				$html .= '
				<tr class="width-20">
	                <td class="width-20">'.$value['ename'].'</td>
	                <td class="width-20">'.$value['emobile'].'</td>
	                <td class="width-20">'.$value['salary'].'</td>
	                <td class="width-20">'.$value['amount'].'</td>
	                <td class="width-20">'.$value['month'].'</td>
	                <td class="width-20">'.$value['year'].'</td>
                </tr>';
			}
			echo json_encode($html);
		}else{
			$html .= '';
			echo json_encode($html);
		}
		
	}

	public function getSalarySheetTwo(){
		$id = $this->input->post('id');
		$data = $this->Model_Salary->getSalarySheetByEmpID($id);
	
		$html='<tr>
					<th>Name</th>
					<th>Mobile</th>
					<th>Salary</th>
					<th>Amount</th>
					<th>Month</th>
					<th>Year</th>
				</tr>';

		if(count($data)>0){
		
			foreach ($data as $key => $value) {	

				$html .= '
				<tr class="width-20">
	                <td class="width-20">'.$value['ename'].'</td>
	                <td class="width-20">'.$value['emobile'].'</td>
	                <td class="width-20">'.$value['salary'].'</td>
	                <td class="width-20">'.$value['amount'].'</td>
	                <td class="width-20">'.$value['month'].'</td>
	                <td class="width-20">'.$value['year'].'</td>
                </tr>';
			}
			echo json_encode($html);
		}else{
			$html .= '';
			echo json_encode($html);
		}
	}







}

/* End of file salary.php */
/* Location: ./application/controllers/salary.php */
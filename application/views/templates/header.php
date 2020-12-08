<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="icon" href="<?php echo base_url().'assets/img/icon/icon.png';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/fontawsome/css/all.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/jquery/jquery-ui.css';?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url().'assets/jquery/jquery.min.js';?>"> -->
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.min.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/fontawsome/css/all.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font.css';?>">

    <script src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/popper.min.js'; ?>"></script>
    <!-- <script src="<?php echo base_url().'assets/js/main.js'; ?>"></script> -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
   <!--  <script src="<?php echo base_url().'assets/jquery/external/jquery/jquery.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/jquery/jquery-ui.js'; ?>"></script> -->
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'; ?>"></script>
    

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/css/style.css';?>">

  
    <title>School Management System</title>
</head>
<body>

<?php if($this->session->userdata('logged_in')):?>
  <div class="container">
    <nav class="navbar navbar-expand-md navbar-light">
      <a class="navbar-brand" href="<?php echo base_url();?>auth/dashboard">DashBoard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Students
            </a>
            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url();?>students/loadAddStudent">Add Student</a>
              <a class="dropdown-item" href="<?php echo base_url();?>students/viewAllStudents">View All</a>
              <a class="dropdown-item" href="#">Add Fee</a>
              <a class="dropdown-item" href="#">Due Fee</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Employee
            </a>
            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url()?>employee/loadAddEmployee">Add Employee</a>
              <a class="dropdown-item" href="<?php echo base_url()?>employee/viewAllEmployee">View All</a>
              <a class="dropdown-item" href="<?php echo base_url()?>salary/loadSalaryEntry">Pay Salary</a>
              <a class="dropdown-item" href="<?php echo base_url()?>salary/exploreSalary">Explore Salary Sheet</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Positions
            </a>
            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url(); ?>Positions/loadAddPosition">Add Positions</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>Positions/loadAddDesignation">Add Designation</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>Positions/viewAllPositions">View All</a>
            </div>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown" id="profile">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-user-circle fa-2x"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url();?>employee/profile"><i class="fas fa-user-alt"></i>&nbsp;Profile</a>
              <a class="dropdown-item" href="<?php echo base_url();?>auth/logout"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
<?php endif; ?>


<div class="container-fluid">

  <?php if($this->session->flashdata('license')): ?>
  <?php echo '<p class="alert alert-danger font-weight-bold">'.$this->session->flashdata('license');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_successfull')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('login_successfull');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('student_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('student_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('student_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('student_not_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('student_info_updated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('student_info_updated');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('student_info_not_updated')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('student_info_not_updated');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('employee_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('employee_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('employee_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('employee_not_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('employee_updated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('employee_updated');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('employee_not_updated')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('employee_not_updated');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('q_updated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('q_updated');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('q_not_updated')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('q_not_updated');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('q_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('q_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('q_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('q_not_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('q_deleted')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('q_deleted');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('q_not_deleted')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('q_not_deleted');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('salary_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('salary_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('salary_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('salary_not_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('position_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('position_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('position_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('position_not_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('designation_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('designation_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('designation_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('designation_not_added');'</p>' ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>
  







</div>



<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$autoload['packages'] = array('Packages','Libraries','Drivers','Helper files','Custom config files','Language files', 'Models');


$autoload['libraries'] = array('database', 'email', 'session','form_validation', 'cart');


$autoload['drivers'] = array();


$autoload['helper'] = array('url','file','form','text');


$autoload['config'] = array();


$autoload['language'] = array();


$autoload['model'] = array('Model_Login','Model_Students','Model_Employee','Model_Salary','Model_Position');

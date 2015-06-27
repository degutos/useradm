<?php 
$this->load->view('includes/header');
$this->load->view('includes/menu');
if ($screen!='') $this->load->view('screen/'.$screen);
$this->load->view('includes/footer');
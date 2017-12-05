<?php
if (! Defined ('BASEPATH')) 
	
exit ('No direct script access allowed');

Class EditBuilding extends CI_Controller {
	public function index(){
		$this->load->view('EditBuilding');
	}
}

?>
<?php
if (! Defined ('BASEPATH')) 
	
exit ('No direct script access allowed');

Class AddBuilding extends CI_Controller {
	public function index(){
		$this->load->view('AddBuilding');
	}
}

?>
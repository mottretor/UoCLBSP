<?php
if (! Defined ('BASEPATH')) 
	
exit ('No direct script access allowed');

Class Test extends CI_Controller {
	public function index(){
		$this->load->view('Test');
	}
}

?>
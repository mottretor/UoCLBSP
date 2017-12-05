<?php
if (! Defined ('BASEPATH')) 
	
exit ('No direct script access allowed');

Class SearchPlaceGoogle extends CI_Controller {
	public function index(){
		$this->load->view('SearchPlaceGoogle');
	}
}

?>
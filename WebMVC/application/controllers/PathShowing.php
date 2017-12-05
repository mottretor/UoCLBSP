<?php
if (! Defined ('BASEPATH')) 
	
exit ('No direct script access allowed');

Class PathShowing extends CI_Controller {
	public function index(){
		$this->load->view('PathShowing');
	}
}

?>
<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

class BaseController extends CI_Controller {
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $roleText = '';
	protected $global = array ();
	protected $lastLogin = '';
	
	
	function logout() 
	{
		$this->session->sess_destroy ();
		redirect ( 'login' );
	}

	function adminView($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL)
	{
        $this->load->view('common/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('common/footer', $footerInfo);
    }
}
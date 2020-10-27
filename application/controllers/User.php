<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() { 
        parent::__construct(); 
        $this->load->library('form_validation'); 
        $this->load->model('user_model'); 
    }
	/* User Registration Form */
	public function index()
	{
        $this->load->helper('form');
        $this->load->view('register');
    }
    
    public function adduser()
    {
        $this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[3]|alpha|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.user_email]|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|xss_clean|decimal|callback_chk_latitude');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|xss_clean|decimal|callback_chk_longitude');
        if ($this->form_validation->run() == FALSE)
        {
           $this->load->view('register');
        }
        else
        {
            /* pass the values to db table */
            $name = $this->input->post('user_name');
            $gender = $this->input->post('gender');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $data = array('user_full_name'=>$name,'user_gender'=>$gender,'user_longitude'=>$longitude,'user_latitude'=>$latitude,'user_phone_no'=>$phone,'user_email'=>$email);
            $result = $this->user_model->insertUser($data);
            if(!empty($result))
            {
                $this->session->set_flashdata('success', 'Thank you for registering with us.');
                redirect('user'); 
            }
            else
            {
                $this->session->set_flashdata('error', 'Please try again later.');
                $this->load->view('register');
            }
            
        }
    }

    public function chk_latitude($lat)
    {
        if (preg_match("/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/", $lat)) {
            return true;
        } else {
            $this->form_validation->set_message('chk_latitude', 'Please enter valid latitude');
            return false;
        }
    }

    public function chk_longitude($long)
    {
        if(preg_match("/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}$/",
        $long)) {
          return true;
        } else {
            $this->form_validation->set_message('chk_longitude', 'Please enter valid longitude');
             return false;
        }
    }
}

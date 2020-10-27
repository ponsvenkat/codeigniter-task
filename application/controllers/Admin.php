<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin extends BaseController {

    function __construct() { 
        parent::__construct(); 
        $this->load->library('form_validation'); 
        $this->load->model('user_model'); 
        $this->load->helper('form');
    }
	/**
	 * admin Login Form
	 */
	public function index()
	{
        $this->load->helper('form');
        $chk_login = $this->session->userdata('user_logged_in');
       
        if(!isset($chk_login) || $chk_login != TRUE)
        {
            $this->load->view('admin/login');
        }
        else
        {
            redirect('admin/userlist');
        }
      
    }
    
    /* login form data verification and redirection*/
    public function userlogin()
    {
       $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
       $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
       if ($this->form_validation->run() == FALSE)
        {
           $this->load->view('admin/login');
        }
        else
        {
            /* pass the values to db table */
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
          
            $result = $this->user_model->chkuser($email, $password);
            
            if(!empty($result))
            {
                $sessionArray = array('userId'=>$result->admin_user_id,'user_name'=>$result->admin_user_name,'user_logged_in'=>true);        $this->session->set_userdata($sessionArray);
                unset($sessionArray);
				redirect('admin/userlist');
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                $this->index();
            }
            
        }
    }

    /* get the registered user details for user list page */
    public function userlist()
    {
        $chk_login = $this->session->userdata('user_logged_in');
        if(isset($chk_login) && $chk_login == true)
        {
            $formdata['users'] = $this->user_model->getuserslist();
            $data['page_title'] = "User List";
            $this->adminView('admin/userlist',$data, $formdata, NULL);
        }
        else
        {
            redirect('admin');
        }
    }

    /* admin logout */
    public function logout(){
        $chk_login = $this->session->userdata('user_logged_in');       
        if(isset($chk_login) || $chk_login == TRUE)
        {
            $this->session->unset_userdata('user_logged_in');
            $this->session->unset_userdata('user_name');
            $this->session->unset_userdata('userId');
            redirect('admin');
        }
        else
        {
            redirect('admin');
        }
        
    }

    /* admin - user details edit page */
    public function useredit($id)
    {
        if(!empty($id))
        {
            $id = $this->security->xss_clean($id);
            $user_data = $this->user_model->getsingleuser($id);
            if(!empty($user_data)){
                $formdata['users'] = $user_data[0];
                $data['page_title'] = "Edit User";
                $this->adminView('admin/useredit',$data, $formdata, NULL);
            }

        }
    }

    /* admin user edit page update functioanlity */
    public function updateuser()
    {
        $chk_login = $this->session->userdata('user_logged_in');       
        if(isset($chk_login) || $chk_login == TRUE)
        {
        $this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[3]|alpha|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|xss_clean|decimal|callback_chk_latitude');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|xss_clean|decimal|callback_chk_longitude');
        if ($this->form_validation->run() == FALSE)
        {
            $id = $this->input->post('user_id');
            $id = $this->security->xss_clean($id);
            $user_data = $this->user_model->getsingleuser($id);
            $formdata['users'] = $user_data[0];
            $data['page_title'] = "Edit User";
            $this->adminView('admin/useredit',$data, $formdata, NULL);
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
            $id = $this->input->post('user_id');
            $data = array('user_full_name'=>$name,'user_gender'=>$gender,'user_longitude'=>$longitude,'user_latitude'=>$latitude,'user_phone_no'=>$phone,'user_email'=>$email);
            $result = $this->user_model->updateuser($id,$data);
            if(!empty($result))
            {
                $this->session->set_flashdata('success', 'Updated the user details.');
                redirect('admin/userlist'); 
            }
            else
            {
                $user_data = $this->user_model->getsingleuser($id);
                $formdata['users'] = $user_data[0];
                $data['page_title'] = "Edit User";
                $this->session->set_flashdata('error', 'Please try again later.');
                $this->adminView('admin/useredit',$data, $formdata, NULL);
            }
            
            
        }
    }
    else
    {
        redirect('admin');
    }
    }

 /* Check the latitude validation */
    public function chk_latitude($lat)
    {
        if (preg_match("/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/", $lat)) {
            return true;
        } else {
            $this->form_validation->set_message('chk_latitude', 'Please enter valid latitude');
            return false;
        }
    }

 /* Check the longitude validation */
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

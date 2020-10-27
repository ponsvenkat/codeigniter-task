<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User_model extends CI_Model{ 
    function __construct() { 
        $this->table = 'users'; 
    } 

    /* Insert the user records into users table */
    public function insertUser($data)
    {
        $insert_id = "";
        $this->db->trans_start();
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    /* chk the admin login credentials */
    function chkuser($email, $password)
    {
        $this->db->select('admin_user_id,admin_user_name');
        $this->db->from('admin_user_credentials');
        $this->db->where('admin_user_email', $email);
        $this->db->where('admin_user_pwd', $password);
        $query = $this->db->get();
        $user = $query->row();
        if(!empty($user)){
                return $user;
        } else {
                return array();
        }
        
    }
    
    /* get all the users details */
    function getuserslist($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table); 
        $this->db->order_by('user_id', 'desc'); 
        $query = $this->db->get(); 
        $result = $query->result_array(); 
        return $result; 
    } 

    /* get the single user info from users table */
    public function getsingleuser($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id =', $user_id);
        $query = $this->db->get();
        
        return $query->result_array();
    }

    /* update the user info details */
    public function updateuser($id,$data)
    {
        $this->db->trans_start();
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
        $this->db->trans_complete();
        return true;
       
    }
     
   
}
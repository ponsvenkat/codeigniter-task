<?php
class Template_loader extends CI_Loader {
    
    public function __construct() {
        parent::__construct();
        
        $CI =& get_instance();
        $CI->load = $this;
    }

    public function user_view($view_name,$vars = array(), $return = TRUE)
    {
        $this->view('templates/header',$vars,$return);
        $this->view($view_name,$vars,$return);
        $this->view('templates/footer',$vars,$return);
    }
}

?>
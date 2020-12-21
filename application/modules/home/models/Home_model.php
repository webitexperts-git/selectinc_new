<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Home_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }

    public function user_id()  {
        $id = 0;
        $user_session = $this->session->userdata('user');
        if(!empty($user_session)){
            $id = $user_session->id;
        }
        return $id;
    }





}
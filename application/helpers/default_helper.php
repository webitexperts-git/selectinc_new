<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
// ------------------------------------------------------------------------

/**
 * @access  public
 * @param   mixed   Script src's or an array
 * @param   string  language
 * @param   string  type
 * @param   string  title
 * @param   boolean should index_page be added to the script path
 * @return  string
 */
 // mail function ----
 function send_mail($email,$subject,$message){

    $from = "manjeet@webitexperts.com";
    $sender_name = "Paanduv";
    $ci = &get_instance();
    $config = Array(
        'mailpath' => '/usr/sbin/sendmail',
        'protocol' => 'sendmail',
        'smtp_host' => 'uitgaande.email',
        'smtp_port' => '587',
        'smtp_user' => 'manjeet@webitexperts.com',
        'smtp_pass' => ';5?U]wtLtDi6',
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1',
    );
    $ci->load->library('email');    
    $ci->email->initialize($config);
    $ci->email->from($from, $sender_name);
    $ci->email->to(trim($email));           
    $ci->email->subject($subject);
    $ci->email->message($message);
    if($ci->email->send()){
        return true;
    }else{
        return false;
    }   
}


function user_profile($id){
    $ci =& get_instance();
    $sql = "SELECT id, name, username, redmine_username, redmine_password, email, phone, image FROM user WHERE id = $id";
    $query = $ci->db->query($sql);
    $result = $query->row();
    
    return $result;
}


 




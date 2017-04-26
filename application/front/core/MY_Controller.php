<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
     // echo $this->session->userdata('aileenuser');  echo "hello"; die();
        if (!$this->session->userdata('aileenuser')) {
            redirect('login', 'refresh');
        } else {
            $this->data['userid'] = $this->session->userdata('aileenuser');
        }

        
        $user_id=$this->data['userid'];
        $condition_array=array('status' => '1');
        $this->data['loged_in_user']=$this->common->select_data_by_id('user','user_id',$user_id,'user_name,user_image',$condition_array);
        
        
    }

   public  function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
}

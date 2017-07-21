<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public $data;

    public function __construct() {

      parent::__construct();

        if (!$this->session->userdata('aileen_admin')) 
        {
            redirect('login', 'refresh');
        }
        
        // Get Site Information
        $this->data['title'] = 'Blog | Aileensoul';
        $this->data['section_title'] = 'Blog';

        include('include.php');


    }

 public function list() 
 {

        $this->load->view('blog_tag/list', $this->data);
    }
 public function add()
     {
        $adminid =  $this->session->userdata('aileen_admin');
     
        //For Count Job Register User Data
        $condition_array = array('is_delete' => 0);
        $data="job_id";
        $this->data['job_list'] = $get_users = $this->common->select_data_by_condition('job_reg', $condition_array, $data, $short_by, $order_by, $limit, $offset, $join_str = array());

        //For Count Recruiter Register User Data
        $condition_array = array('is_delete' => 0);
        $data="rec_id";
        $this->data['recruiter_list'] = $get_users = $this->common->select_data_by_condition('recruiter', $condition_array, $data, $short_by, $order_by, $limit, $offset, $join_str = array());

        $this->load->view('blog/add',$this->data);


        // print_r($this->data['art_list']);die();
    }

}

?>
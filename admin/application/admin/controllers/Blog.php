<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends CI_Controller {

    public $data;

    public function __construct() {

      parent::__construct();

        if (!$this->session->userdata('aileen_admin')) 
        {
            redirect('login', 'refresh');
        }
   
        
        // Get Site Information
        $this->data['title'] = 'Blog | Aileensoul';
        $this->data['module_name'] = 'Blog';
        $this->data['section_title'] = 'Blog';

         //Loadin Pagination Custome Config File
         $this->config->load('paging', TRUE);
         $this->paging = $this->config->item('paging');

        include('include.php');
        $adminid =  $this->session->userdata('aileen_admin');


    }

//LIST OF BLOG ADD BY ADMIN START
 public function list() 
 {

        $this->load->view('blog/list', $this->data);
}
//LIST OF BLOG ADD BY ADMIN END

//BLOG ADD BY ADMIN START
 public function add()
     {
     
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
 //BLOG ADD BY ADMIN END

//BLOG ADD INSERT START
 public function blog_insert()
     {
       
        //For Count Job Register User Data
        $condition_array = array('is_delete' => 0);
        $data="job_id";
        $this->data['job_list'] = $get_users = $this->common->select_data_by_condition('job_reg', $condition_array, $data, $short_by, $order_by, $limit, $offset, $join_str = array());

        //For Count Recruiter Register User Data
        $condition_array = array('is_delete' => 0);
        $data="rec_id";
        $this->data['recruiter_list'] = $get_users = $this->common->select_data_by_condition('recruiter', $condition_array, $data, $short_by, $order_by, $limit, $offset, $join_str = array());

        $this->load->view('blog/list',$this->data);
    }
 //BLOG ADD INSERT END

}

?>
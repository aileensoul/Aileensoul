<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public $data;

    public function __construct() {

      parent::__construct();

        $this->data['title'] = 'Dashboard | Aileensoul';

        include('include.php');


    }
 public function index()
     {
        $adminid =  $this->session->userdata('aileen_admin');
        //echo  $adminid;die();
      //  echo "hi";die();
        // $contition_array = array('status' => 1, 'is_delete' => 0);

        //     $this->data['art_list'] = $this->common->select_data_by_search('art_reg', $search_condition, $contition_array, '*', $short_by, $order_by, $limit, $offset);




        $condition_array = array('is_delete =' => '0');

        $this->data['art_list'] = $get_users = $this->common->select_data_by_condition('art_reg', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());


        $condition_array = array('faq_status =' => 1);

        $this->data['faq_list'] = $get_users = $this->common->select_data_by_condition('faq', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());

               

        $condition_array = array('status =' => 1);

        $this->data['job_list'] = $get_users = $this->common->select_data_by_condition('job_reg', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());


         $condition_array = array('status =' => 1);

        $this->data['freelancer_list'] = $get_users = $this->common->select_data_by_condition('freelancer_hire_reg', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());

         $condition_array = array('status =' => 1);

        $this->data['stream_list'] = $get_users = $this->common->select_data_by_condition('stream', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());


         $condition_array1 = array('status =' => '1', 'is_delete =' => '0');


        $this->data['user_list'] = $get_users = $this->common->select_data_by_condition('user', $condition_array1, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());

        $condition_array = array('is_deleted =' => '0');



        $this->data['business_list'] = $get_users = $this->common->select_data_by_condition('business_profile', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());

        $condition_array = array('is_delete =' => '0');



        $this->data['freelance_post'] = $get_users = $this->common->select_data_by_condition('freelancer_post_reg', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());

        $condition_array = array('is_delete =' => '0');


        $this->data['rec_list'] = $get_users = $this->common->select_data_by_condition('recruiter', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());


        $condition_array = array('is_delete =' => '0');

        $this->data['degree'] = $get_users = $this->common->select_data_by_condition('degree', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());

         $condition_array = array('is_delete =' => '0');

        $this->data['business_type'] = $get_users = $this->common->select_data_by_condition('business_type', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());


        $condition_array = array('is_delete =' => '0');

        $this->data['industry_type'] = $get_users = $this->common->select_data_by_condition('industry_type', $condition_array, $data = '*', $short_by, $order_by, $limit, $offset, $join_str = array());




        $this->load->view('dashboard/index',$this->data);





        // print_r($this->data['art_list']);die();
    }
    //logout user
    public function logout() {

        
        // $this->session->set_userdata('aileen_admin', $admin_check[0]['admin_id']);

        if ($this->session->userdata('aileen_admin')) {
            

            $this->session->unset_userdata('aileen_admin');

            redirect('login', 'refresh');
        }
    }
    public function edit_profile() {
        
        if($this->data['loged_in_user'][0]['level']!='1'){
            $this->session->set_flashdata('error','You are not authorized.');
            redirect('dashboard','refresh');
        }
        
        if($this->input->post('email')){
            $email=$this->input->post('email');
            $user_name=$this->input->post('user_name');
            $name=$this->input->post('name');
            $user_id=$this->session->userdata('dollarbid_admin');
            
            $update_result=  $this->common->update_data($this->input->post(),'user','user_id',$user_id);
            if($update_result){
                $this->session->set_flashdata('success','Profile detail successfully updated.');
                redirect('dashboard','refresh');
            }
            else{
                $this->session->set_flashdata('error','Error Occurred. Try Again!');
                redirect('dashboard','refresh');
            }
        }
        
        $this->data['module_name'] = 'Dashboard';
        $this->data['section_title'] = 'Edit Profile';
        $this->load->view('dashboard/edit_profile', $this->data);
    }

    

    public function change_password() {

 
        if($this->input->post('old_pass')){
            
            $user_id = ($this->session->userdata('dollarbid_admin'));
            $old_password=$this->input->post('old_pass');
            $new_password=  $this->input->post('new_pass');
          
            $admin_old_password = $this->common->select_data_by_id('admin','admin_id',1,'admin_password');
            $admin_password = $admin_old_password[0]['admin_password'];

            if($admin_password == md5($old_password)){
                $update_array=array('admin_password'=> md5($new_password));
                $update_result=  $this->common->update_data($update_array,'admin','admin_id',1);
                if($update_result){
                    $this->session->set_flashdata('success','Your password is successfully changed.');
                    redirect('dashboard/change_password','refresh');
                }
                else{
                    $this->session->set_flashdata('error','Error Occurred. Try Again!');
                    redirect('dashboard/change_password','refresh');
                }
            }
            else{
                $this->session->set_flashdata('error','Old password does not match');
                redirect('dashboard/change_password','refresh');
            }
        }
        
        $this->data['module_name'] = 'Dashboard';
        $this->data['section_title'] = 'Change Password';
        $this->load->view('dashboard/change_password', $this->data);
    }

    
    //check old password
    public function check_old_pass() {
        if ($this->input->is_ajax_request() && $this->input->post('old_pass')) {
            $user_id = ($this->session->userdata('dollarbid_admin'));

            $old_pass = $this->input->post('old_pass');
            $check_result = $this->common->select_data_by_id('user','user_id',$user_id,'password');
            if ($check_result[0]['password'] === md5($old_pass)) {
                echo 'true';
                die();
            } else {
                echo 'false';
                die();
            }
        }
    }
    
    public function check_email() {
        if ($this->input->is_ajax_request() && $this->input->post('email')) {
            $user_id = ($this->session->userdata('dollarbid_admin'));

            $email = $this->input->post('email');
            $check_result = $this->common->check_unique_avalibility('user','email',$email,'user_id',$user_id);
            if ($check_result) {
                echo 'true';
                die();
            } else {
                echo 'false';
                die();
            }
        }
    }
    
    public function check_username() {
        if ($this->input->is_ajax_request() && $this->input->post('user_name')) {
            $user_id = ($this->session->userdata('dollarbid_admin'));

            $user_name = $this->input->post('user_name');
            $check_result = $this->common->check_unique_avalibility('user','user_name',$user_name,'user_id',$user_id);
            if ($check_result) {
                echo 'true';
                die();
            } else {
                echo 'false';
                die();
            }
        }
    }

}

?>
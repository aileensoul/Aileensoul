<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stay_connect extends MY_Controller {

    public $data;

    public function __construct() {

         parent::__construct();
        
        include('include.php');
    }

    //display global_community list
    public function index() {

      
        $this->load->view('stay_connect/index');
    }

    
    //Edit global_community
    public function edit() {
        //check post and save data
        
        if ($this->input->post('btn_save')) {
                $update_name = $this->input->post('name');
                $update_description = $this->input->post('description');
                
                $update_data['name'] = $update_name[1];
                $update_data['description'] = $update_description[1];
                $update_data['modify_date'] = date('Y-m-d h:i:s');
                
                $update_result = $this->common->update_data($update_data, 'stay_connect', 'id', 1);
                
                $update_name1 = $this->input->post('name');
                $update_description1 = $this->input->post('description');
                $update_data1['name'] = $update_name1[2];
                $update_data1['description'] = $update_description1[2];
                $update_data1['modify_date'] = date('Y-m-d h:i:s');
                
                $update_result = $this->common->update_data($update_data1, 'stay_connect', 'id', 2);
            
                $this->session->set_flashdata('success', 'Stay Connect successfully updated');
                $redirect_url = site_url('stay_connect');
                redirect($redirect_url, 'refresh');
        } 
    }

    
   

}

?>
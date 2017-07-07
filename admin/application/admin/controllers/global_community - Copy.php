<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Global_community extends MY_Controller {

    public $data;

    public function __construct() {

         parent::__construct();
        
        include('include.php');
    }

    //display global_community list
    public function index() {

            
        $this->load->view('global_community/index');
    }

    

    //Edit global_community
    public function edit() {
        
        //check post and save data
        if ($this->input->post('btn_save')) {
            foreach ($_POST['id'] as $key => $value) {
                $update_data = array();
                $update_data['id'] = $key;
                $update_name = $this->input->post('name');
                $update_link = $this->input->post('link');
                $update_data['name'] = $update_name[$key];
                $update_data['link'] = $update_link[$key];
                $update_data['modify_date'] = date('Y-m-d h:i:s');
                $update_data['status'] = 1;
                
                $update_result = $this->common->update_data($update_data, 'global_community', 'id', $key);
            }
                $this->session->set_flashdata('success', 'Global Community successfully updated');
                $redirect_url = site_url('global_community');
                redirect($redirect_url, 'refresh'); 
        } 
    }

    
}

?>
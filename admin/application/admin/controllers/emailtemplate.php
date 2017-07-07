<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emailtemplate extends MY_Controller {

    public $data;
   

    public function __construct() {

        parent::__construct();
        
        include('include.php');
    }

    //display user list
   public function index() {

       
        $this->load->view('emailtemplate/index');
    }

    //search the user
   

    //add new user
  

    //update the user detail
    public function edit($id = '') {
       
        if ($this->input->post('emailid')) {
          
            $update_array = array(
                'variables'=>trim($this->input->post('variable')),
                'varsubject'=>trim($this->input->post('subject')),
                'varmailformat'=>trim($this->input->post('emailformat')),
            );
           
            
            $update_result = $this->common->update_data($update_array, 'emailtemplate', 'emailid', $this->input->post('emailid'));
           
            if ($this->input->post('redirect_url')) {
                $redirect_url = $this->input->post('redirect_url');
            } else {
                $redirect_url = site_url('emailtemplate') ;
            }

            if ($update_result) {
                
                $this->session->set_flashdata('success', 'EmailTemplate successfully updated.');
                redirect($redirect_url, 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Errorin Occurred. Try Again!');
                redirect($redirect_url, 'refresh');
            }
        }

        $emailtemplate_detail = $this->common->select_data_by_id('emailtemplate', 'emailid', $id, '*');
        if (!empty($emailtemplate_detail)) {
            $this->data['module_name'] = 'EmailTemplate';
            $this->data['section_title'] = 'Edit';
            
            $this->data['emailtemplate_detail'] = $emailtemplate_detail;
            $this->load->view('emailtemplate/edit', $this->data);
        } else {
            $this->session->set_flashdata('error', 'Errorout Occurred. Try Again.');
            redirect('emailtemplate', 'refresh');
        }
    }
   

}

?>
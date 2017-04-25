<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Feedback extends CI_Controller {

   

    public function __construct() 
    {
        parent::__construct();

        //  $this->load->library('form_validation');
        //   $this->load->model('email_model');
        // if (!$this->session->userdata('aileenuser')) {
        //   redirect('login', 'refresh');
        // }
       
        include ('include.php'); 
    }
        
    public function index()
    { 
       
        
          $this->load->view('feedback/feedback', $this->data);
     
    }



    public function feedback_insert() 
     { 
       
      
       
        $this->form_validation->set_rules('contact_email', 'contact email', 'required|valid_email');
        $this->form_validation->set_rules('contact_subject','contact subject', 'required');
        $this->form_validation->set_rules('contact_message','contact message', 'required');
        

                      $data = array(

                       
                         'user_email' => $this->input->post('contact_email'),
                         'subject' => $this->input->post('contact_subject'),
                         'description' => $this->input->post('contact_message'),
                        
               
                ); 
                //echo"<pre>";print_r($data);die();
              $insert_id =   $this->common->insert_data_getid($data,'feedback'); 
                if($insert_id)
                { 
                       $this->session->set_flashdata('success', 'Your feedback sent successfully');
                      redirect('main');
                  
                }
               else
                {
                        $this->session->flashdata('error','Sorry!! Your feedback not sent');
                       redirect('feedback', 'refresh');
                   }
     
}
    
  }
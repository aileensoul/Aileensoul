<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Contact_us extends CI_Controller {

   

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
        $contition_array = array( 'site_id' => 1);
          $this->data['cnt'] = $this->common->select_data_by_condition('site_settings', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           
        
          $this->load->view('contact/contact_us', $this->data);
     
    }



    public function contact_us_insert() 
     { 
   
        $this->form_validation->set_rules('contact_name', 'contact name', 'required');
        $this->form_validation->set_rules('contact_email', 'contact email', 'required|valid_email');
        $this->form_validation->set_rules('contact_subject','contact subject', 'required');
        $this->form_validation->set_rules('contact_message','contact message', 'required');
        

                      $data = array(

                        'contact_name' => $this->input->post('contact_name'),
                         'contact_email' => $this->input->post('contact_email'),
                         'contact_subject' => $this->input->post('contact_subject'),
                         'contact_message' => $this->input->post('contact_message'),
                        
               
                ); 
                //echo"<pre>";print_r($data);die();
              $insert_id =   $this->common->insert_data_getid($data,'contact_us'); 
                if($insert_id)
                { 
                       $this->session->set_flashdata('success', 'successfully');
                      redirect('main');
                  
                }
               else
                {
                        $this->session->flashdata('error','Sorry!! Your data not inserted');
                       redirect('contact_us', 'refresh');
                   }
     
}
    
  }
<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Feedback extends CI_Controller {

   

    public function __construct() 
    {
        parent::__construct();

          $this->load->library('form_validation');
          $this->load->model('email_model');
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
       
        $email = $_POST['email']; 
         $subject = $_POST['subject'];
         $message = $_POST['message']; 
          
           $data = array(
                         'user_email' => $email,
                          'subject' => $subject,
                          'description' => $message,
                         'created_date' => date('Y-m-d', time()),
                         'is_delete' => 0
                        
                ); 
                //echo"<pre>"; print_r($data); die();
              $insert_id =   $this->common->insert_data_getid($data,'feedback'); 
}
    
  }
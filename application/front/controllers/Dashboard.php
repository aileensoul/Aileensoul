<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public $data;

    public function __construct() {

        parent::__construct();
        $this->load->model('email_model');
        include('include.php');

    }

    public function index($id = " ") {
        //   echo '<pre>'; print_r($this->session->all_userdata()); die();
        $this->load->library('form_validation');
        //$userid = $this->session->userdata('aileensoul_front');
        $userid = $this->session->userdata('aileenuser'); 
        // echo $userid; die();
        $this->data['userdata'] = $this->common->select_data_by_id('user', 'user_id', $userid, $data = '*', $join_str = array());
        //echo '<pre>'; print_r($this->data['userdata']); die();
        $this->load->view('dashboard/cover', $this->data);
    }


    public function user_image_insert() { //echo "hii";die();

        $userid = $this->session->userdata('aileenuser');
        

            if($this->input->post('cancel')){  //echo "hii"; die();
                redirect('dashboard', refresh);
              }

             if (empty($_FILES['profilepic']['name']))
             { //echo"hello";
                 $this->form_validation->set_rules('profilepic', 'Upload profilepic', 'required');
            //$picture = '';
            }
            else
            { //echo "hii";die();
                $config['upload_path'] = 'uploads/user_image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|mpeg|mpg|mpe|qt|mov|avi|pdf';
               // $config['file_name'] = $_FILES['picture']['name'];
                $config['file_name'] = $_FILES['profilepic']['name'];
                //$config['max_size'] = '1000000000000000';
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('profilepic'))
                {
                    $uploadData = $this->upload->data();
                    //$picture = $uploadData['file_name']."-".date("Y_m_d H:i:s");
                    $picture = $uploadData['file_name'];
                }
                else
                {
                    $picture = '';
                }

                $data = array(
                    
                    'user_image' =>$picture,
                    'modified_date' => date('Y-m-d',time())
            ); 
                //echo "<pre>"; print_r($data);die();
       
      $updatdata =   $this->common->update_data($data,'user','user_id',$userid);

          if($updatdata){ 
            redirect('dashboard', refresh);
          }else{
             $this->session->flashdata('error','Your data not inserted');
                   redirect('dashboard', refresh);
          }
        }
    }

    public function check_login() {

        $user_name = $this->input->post('user_name');

        $user_password = $this->input->post('user_password');

        if ($user_name != '' && $user_password != '') {

            $admin_check = $this->logins->check_authentication($user_name, $user_password);

            if ($admin_check != 0) {

                $this->session->set_userdata('topgraffiti_admin', $admin_check[0]['admin_id']);

                redirect('dashboard', 'refresh');
            } else {

                $this->session->set_flashdata('error', '<div class="alert alert-danger">Please Enter Valid Credential.</div>');

                redirect('login', 'refresh');
            }
        } else {

            $this->session->set_flashdata('error', '<div class="alert alert-danger">Please Enter Valid Login Detail.</div>');

            redirect('login', 'refresh');
        }
    }

    public function logout() {
       
        if ($this->session->userdata('aileenuser')) {

            $this->session->unset_userdata('aileenuser');

            redirect('main', 'refresh');
        }
    }


  
// cover pic controller

 public function ajaxpro()
    {  
        $userid = $this->session->userdata('aileenuser');
        
      $data = $_POST['image'];

// $img = str_replace('data:image/png;base64,', '', $img);
// $img = str_replace(' ', '+', $img);
// $data = base64_decode($img);
//echo  $data;
// $file = $upload_dir . mktime() . ".png";
// $success = file_put_contents($file, $data);
// print $success ? $file : 'Unable to save the file.';
// die();
//$data = base64_encode($data);
//$imageName = time().'.png';
$imageName = time().'.png';
      $base64string = $data;
file_put_contents('uploads/user_bg/'.$imageName, base64_decode(explode(',',$base64string)[1]));
      
      $data = array(
                'profile_background' => $imageName
                  ); 

      
        $update = $this->common->update_data($data,'user','user_id',$userid);

        $this->data['userdata'] = $this->common->select_data_by_id('user', 'user_id', $userid, $data = '*', $join_str = array());

echo '<img src="' . $this->data['userdata'][0]['profile_background'] . '" />';
    }


public function image()
    { 
             $userid = $this->session->userdata('aileenuser');

                $config['upload_path'] = 'uploads/user_bg';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
               // $config['file_name'] = $_FILES['picture']['name'];
                $config['file_name'] = $_FILES['image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                //echo $this->upload->do_upload('photo'); die();
                if($this->upload->do_upload('image'))
                {
                      
                    $uploadData = $this->upload->data();
                    //$picture = $uploadData['file_name']."-".date("Y_m_d H:i:s");
                    $image = $uploadData['file_name'];
                    //echo $certificate;die();
                }
                else
                {
                   // echo "welcome";die();
                    $image = '';
                }


        $data = array(
                  'profile_background_main' => $image,
                  'modified_date' => date('Y-m-d h:i:s',time())
                  
        ); 
     //  echo "<pre>"; print_r($data); die();
           
      $updatedata =   $this->common->update_data($data,'user','user_id',$userid);

      if($updatedata){ 
        echo $userid;
      }else{
       echo "welcome";
      }

    }

    // cover pic end
// resend email for account verify start

 public function resendverifyaccount()
    {  //echo "falguni"; die();

          $userid = $this->session->userdata('aileenuser');
          $userdata = $this->common->select_data_by_id('user','user_id', $userid, $data = '*', $join_str = array());

         $email= $userdata[0]['user_email'];
            //echo $email;die();
        // $to= $userdata[0]['user_email']; 
         $toemail= "raval.khyati13@gmail.com"; 
            
               
            $msg = "Hey !" . $userdata[0]['user_name'] ."<br/>"; 
           // $msg .=  $userdata[0]['first_name'] .$userdata[0]['last_name']. ',';
           // $msg .= 'Click hear to verify your account';
           // $msg .= "<br>"; 
            // $msg .= "<b><u><a href=" .  base_url('registration/verify/' . $userid) . ">click here</a></b></u>";
            
            $msg = "hi falgui";
          
            $subject = "Verify Your Account";
           
           
            $mail = $this->email_model->do_email($msg, $subject,$toemail,$from);

            if($mail){ echo "hello"; die();

            }
            
          //   if(!$mail) { 

          //  $allowedgmail =  array('gmail.com');

          //  $varifyemail = $userdata[0]['user_email'];
          //  $splitemail = split ("\@", $varifyemail);
          // if(in_array($splitemail[1],$allowedgmail)){ 

          //   redirect('https://accounts.google.com', refresh);

          //  }else{
          //    redirect('https://login.yahoo.com', refresh);
          //  }
          // } 

    }
// resend email for account verify end 

}

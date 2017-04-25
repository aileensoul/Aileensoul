<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Artistic extends MY_Controller {

   

    public function __construct() 
    {
        parent::__construct();

         $this->load->library('form_validation');
          $this->load->model('email_model');
        if (!$this->session->userdata('aileenuser')) {
          redirect('login', 'refresh');
        }
        
        include ('include.php');
    }
        
    public function index()
    {  
          $userid  = $this->session->userdata('aileenuser'); 

           
          $contition_array = array( 'user_id' => $userid, 'is_delete' => '0', 'status' =>'1');
         $artdata = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

         $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
            $this->data['art'] = $this->common->select_data_by_condition('user', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           
        
        if(count($artdata) > 0){

            if($artdata[0]['art_step'] == 1){ 
             redirect('artistic/art_address', refresh);
            }
            else if($artdata[0]['art_step'] == 2){ 
             redirect('artistic/art_information', refresh);
            }
            else if($artdata[0]['art_step'] == 3){
                redirect('artistic/art_portfolio', refresh);
            }
            else if($artdata[0]['art_step'] == 4){
                redirect('artistic/art_post', refresh);
            }
            
         }
            else{ 
             $this->load->view('artistic/art_basic_information', $this->data);  
         
       }

     
    }

    public function comment(){
      $this->load->view('artistic/comment');
    }

     public function abc(){

      $userid  = $this->session->userdata('aileenuser'); 

      $contition_array = array('status' => '1','type' => '2');
      $this->data['skill'] =  $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = 'skill', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

     
      $contition_array = array('status' => '1','user_id' => $userid);
      $this->data['artistic'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

      $skildata = explode(',', $this->data['artistic'][0]['art_skill']);
     $this->data['selectdata'] =  $skildata; 
      $this->load->view('artistic/abc',$this->data);
    
    }


    public function art_basic_information_update()
    { 
            $userid = $this->session->userdata('aileenuser');

            $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
           $userdata = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

           if($userdata){
            $step = $userdata[0]['art_step'];

            if($step == 1 || $step >1)
            {
             $this->data['firstname1'] = $userdata[0]['art_name'];
             $this->data['lastname1'] = $userdata[0]['art_lastname'];
             $this->data['email1'] =  $userdata[0]['art_email'];
             $this->data['phoneno1'] =  $userdata[0]['art_phnno'];
             }
             
             } 

            $this->load->view('artistic/art_basic_information', $this->data);
    }

     public function art_basic_information_insert(){ 
       
        $userid = $this->session->userdata('aileenuser');


        $this->form_validation->set_rules('firstname', 'Please Enter Your Name', 'required');
       
        $this->form_validation->set_rules('email', 'Please Enter Your EmailId', 'required|valid_email');
        $this->form_validation->set_rules('phoneno', 'Please Enter Your Phonenumber', 'required|numeric|min_length[10]|max_length[11]');
       
        if ($this->form_validation->run() == FALSE) { 
         $this->load->view('artistic/art_basic_information'); 
         } 

           
           $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
           $userdata = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

           
         if($userdata)
                 {
                         $data = array(
                          'art_name' => $this->input->post('firstname'),
                          'art_lastname'=>$this->input->post('lastname'),
                          'art_email' => $this->input->post('email'),
                          'art_phnno' => $this->input->post('phoneno'),
                          'modified_date' => date('Y-m-d',time())
                    ); 
               
              $updatdata =   $this->common->update_data($data,'art_reg','user_id',$userid);

                  if($updatdata){ 
                        $this->session->set_flashdata('success', 'Basic Information updated successfully');
                        redirect('artistic/art_address', refresh);
                  }else{
                            $this->session->flashdata('error','Sorry!! Your data not inserted');
                            redirect('artistic/art_basic_information_insert', refresh);
                  }
         }


         else{ 
                        $data = array(
                            'art_name' => $this->input->post('firstname'),
                            'art_lastname'=>$this->input->post('lastname'),
                            'art_email' => $this->input->post('email'),
                            'art_phnno' => $this->input->post('phoneno'),
                            'user_id'=> $userid,
                            'created_date' => date('Y-m-d',time()),
                            'status'=>1,
                            'is_delete'=>0,
                            'art_step'=>1
                    ); 
                   
                        
                       
                    $insert_id =   $this->common->insert_data_getid($data,'art_reg'); 
                   if($insert_id){ 
                       
                          
                            $this->session->set_flashdata('success', 'Basic Information updated successfully');
                         redirect('artistic/art_address', refresh);
                   }else{
                            $this->session->flashdata('error','Sorry!! Your data not inserted');
                           redirect('artistic/art_basic_information_insert', refresh);
                   }
                  
         }
      
    }

//check mail start
public function check_email() { 
       

        $email = $this->input->post('email');

         $userid = $this->session->userdata('aileenuser');

            $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
           $userdata = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

           $email1=$userdata[0]['art_email'];
      
      
           if($email1)
           {
               $condition_array = array('is_delete' => '0', 'user_id !=' => $userid, 'status' =>'1');
        
              $check_result = $this->common->check_unique_avalibility('art_reg', 'art_email', $email, '', '', $condition_array);
           }
          else
          {
       
          $condition_array = array('is_delete' => '0', 'status' =>'1');
        
        $check_result = $this->common->check_unique_avalibility('art_reg', 'art_email', $email, '', '', $condition_array);
     
        }

        if ($check_result) {
        echo 'true';
        die();
        } else {
        echo 'false';
        die();
        }
        }
       

//check mail end


public function art_address(){ 

         $userid = $this->session->userdata('aileenuser');   
        $contition_array = array('status' => 1);
      $this->data['countries'] =  $this->common->select_data_by_condition('countries', $contition_array, $data = '*', $sortby = 'country_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');  

       //for getting state data
            $contition_array = array('status' => 1);
            $this->data['states'] =  $this->common->select_data_by_condition('states', $contition_array, $data = '*', $sortby = 'state_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

             //for getting city data
            $contition_array = array('status' => 1);
            $this->data['cities'] =  $this->common->select_data_by_condition('cities', $contition_array, $data = '*', $sortby = 'city_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           


            $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
           $userdata = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

           if($userdata){
            $step = $userdata[0]['art_step'];

            if($step == 2 || $step > 2 || ($step >= 1 && $step <= 2))
            {
              $this->data['country1'] = $userdata[0]['art_country'];
             $this->data['state1'] = $userdata[0]['art_state'];
             $this->data['city1'] = $userdata[0]['art_city'];
             $this->data['pincode1'] = $userdata[0]['art_pincode'];
             $this->data['address1'] =  $userdata[0]['art_address'];
             }
             
             } 

            
         $this->load->view('artistic/art_address', $this->data);
    }


public function ajax_data() { 
      
       if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){ 
    //Get all state data
         $contition_array = array('country_id' => $_POST["country_id"] , 'status' => 1);
     $state =  $this->data['states'] =  $this->common->select_data_by_condition('states', $contition_array, $data = '*', $sortby = 'state_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
   
    //Count total number of rows
   
    
    //Display states list
    if(count($state) > 0){
        echo '<option value="">Select state</option>';
     foreach($state as $st){
            echo '<option value="'.$st['state_id'].'">'.$st['state_name'].'</option>';
     
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
     $contition_array = array('state_id' => $_POST["state_id"] , 'status' => 1);
     $city =  $this->data['city'] =  $this->common->select_data_by_condition('cities', $contition_array, $data = '*', $sortby = 'city_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
    
    
    //Display cities list
    if(count($city) > 0){
        echo '<option value="">Select city</option>';
        foreach($city as $cit){
            echo '<option value="'.$cit['city_id'].'">'.$cit['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
    }


}
    public function art_address_insert(){

         $userid = $this->session->userdata('aileenuser');

           
            if($this->input->post('next')){  
               
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('pincode', 'Pincode', 'numeric');

        if ($this->form_validation->run() == FALSE) { 
         $this->load->view('artistic/art_address'); 
         } 
         else{
            $data = array(
                'art_country'=> $this->input->post('country'),
                'art_state'=> $this->input->post('state'),
                'art_city'=> $this->input->post('city'),
                'art_address'=> $this->input->post('address'),
                'art_pincode'=> $this->input->post('pincode'),
                'modified_date' => date('Y-m-d',time()),
                'art_step'=>2
        ); 
     
           
      $updatdata =   $this->common->update_data($data,'art_reg','user_id',$userid);
    

      if($updatdata){ 
          $this->session->set_flashdata('success', 'Address updated successfully');
        redirect('artistic/art_information', refresh);
      }else{
         $this->session->flashdata('error','Your data not inserted');
               redirect('artistic/art_address', refresh);
      }
    }
 }
}

    public function art_information(){

        $userid = $this->session->userdata('aileenuser'); 
         $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
           $userdata = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


           $contition_array = array('status' => 1, 'type' => 2);
            $this->data['skill1'] =  $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = 'skill', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

         
           if($userdata){
            $step = $userdata[0]['art_step'];

           if($step == 3 || ($step >= 1 && $step <= 3) || $step > 3)
            {
             $this->data['artname1'] = $userdata[0]['art_yourart'];
             $this->data['desc_art1'] = $userdata[0]['art_desc_art'];
             $this->data['inspire1'] =  $userdata[0]['art_inspire'];
             $this->data['skills1'] = $userdata[0]['art_skill'];
             $this->data['other'] = $userdata[0]['other_skill'];

             }
             
             } 
         
        $skildata = explode(',', $userdata[0]['art_skill']);
        $this->data['selectdata'] =  $skildata;
        $this->load->view('artistic/art_information', $this->data);
        }

     public function art_information_insert(){
             $userid = $this->session->userdata('aileenuser');
             $skill=$this->input->post('skills');
             $otherskill= $this->input->post('other_skill');

             
                    $data = array(
                    'art_yourart' => $this->input->post('artname'),
                    'other_skill' => $this->input->post('other_skill'),
                    'art_skill' => implode(',',$skill),
                    'art_desc_art' => $this->input->post('desc_art'),
                    'art_inspire' => $this->input->post('inspire'),
                    'modified_date' => date('Y-m-d',time()),
                    'art_step'=>3
            ); 
                   
       
      $updatdata =   $this->common->update_data($data,'art_reg','user_id',$userid);

$skilldata = $this->common-> select_data_by_id('skill', 'skill', $otherskill, $data = '*', $join_str = array());
        if($skilldata || $otherskill == ""){}
        else{
       $data1 = array(
                'skill' => $this->input->post('other_skill'),
                'type' => 2,
                'status' => 1
               ); 
        
        $insertid =   $this->common->insert_data_getid($data1,'skill');
          }

        
          
          if($updatdata){ 
            $this->session->set_flashdata('success', 'Information updated successfully');
            redirect('artistic/art_portfolio', refresh);
          }else{
             $this->session->flashdata('error','Your data not inserted');
                   redirect('artistic/art_information', refresh);
          }
       
    }

public function art_portfolio(){

        $userid = $this->session->userdata('aileenuser'); 
         $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
           $userdata = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           
           if($userdata){
            $step = $userdata[0]['art_step'];

           if($step == 4 || ($step >= 1 && $step <= 4) || $step > 4 )
            {
              $this->data['bestofmine1'] = $userdata[0]['art_bestofmine'];
             $this->data['achievmeant1'] = $userdata[0]['art_achievement'];
             $this->data['address1'] = $userdata[0]['art_portfolio'];
             }
             
             } 
           
        $this->load->view('artistic/art_portfolio',$this->data);
        }

     public function art_portfolio_insert(){
           

             $userid = $this->session->userdata('aileenuser');
             $bestmine = $this->input->post('bestmine');
             $achi = $this->input->post('archiver');
            
             //best of mine image upload code start

              $config['upload_path'] = 'uploads/art_images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
              
                $config['file_name'] = $_FILES['bestofmine']['name'];
               
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('bestofmine'))
                {
                 
                    $uploadData = $this->upload->data();
                  
                    $picture = $uploadData['file_name'];
                }
                else
                {
                   
                    $picture = '';
                }
                //best of mine image upload code End

                //Achievement image upload code start
                $config['upload_path'] = 'uploads/art_images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
              
                $config['file_name'] = $_FILES['achievmeant']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('achievmeant'))
                {
                    $uploadData = $this->upload->data();
                    $picture_achiev = $uploadData['file_name'];
                }
                else
                {
                    $picture_achiev = '';
                }
                 //Achievement image upload code End

                if($picture &&  $picture_achiev){
                 

                    $data = array(
                    'art_achievement' =>$picture_achiev,
                    'art_bestofmine' =>$picture,
                    'art_portfolio' => $this->input->post('artportfolio'),
                    'modified_date' => date('Y-m-d',time()),
                    'art_step'=>4                
            ); }
                    elseif($picture){

                    $data = array(
                    'art_achievement' =>$this->input->post('archiver'),
                    'art_bestofmine' =>$picture,
                    'art_portfolio' => $this->input->post('artportfolio'),
                    'modified_date' => date('Y-m-d',time()),
                    'art_step'=>4                
            ); 

                    }
                    elseif($picture_achiev){

                    $data = array(
                    'art_achievement' =>$picture_achiev,
                    'art_bestofmine' =>$this->input->post('bestmine'),
                    'art_portfolio' => $this->input->post('artportfolio'),
                    'modified_date' => date('Y-m-d',time()),
                    'art_step'=>4                
            ); 
                    }

                    else{
                     
                    $data = array(
                    'art_achievement' =>$this->input->post('archiver'),
                    'art_bestofmine' =>$this->input->post('bestmine'),
                    'art_portfolio' => $this->input->post('artportfolio'),
                    'modified_date' => date('Y-m-d',time()),
                    'art_step'=>4

                  
            ); 
                  }
        
       
      $updatdata =   $this->common->update_data($data,'art_reg','user_id',$userid);

          if($updatdata){ 
              $this->session->set_flashdata('success', 'Portfolio updated successfully');
            redirect('artistic/art_post', refresh);
          }else{
             $this->session->flashdata('error','Your data not inserted');
                   redirect('artistic/art_portfolio', refresh);
          }
      
     
    }

    // khyati start
     
     public function art_post(){  
     
             $user_name = $this->session->userdata('user_name');
            
            $userid  = $this->session->userdata('aileenuser');
              $contition_array = array('user_id' => $userid, 'status' =>'1');
             $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

              $art_id =  $this->data['artisticdata'][0]['art_id'];

                //echo $art_id; die();
              //echo "<pre>"; print_r($this->data['artisticdata']); die();

// data fatch using follower start

             $contition_array = array('follow_from' => $art_id, 'follow_status' =>'1',  'follow_type' =>'1');
            $followerdata = $this->data['followerdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

             //echo "<pre>"; print_r($this->data['followerdata']);  die();

             
             foreach ($followerdata  as $fdata) {
           
             $contition_array = array('art_id' => $fdata['follow_to']);

           $this->data['artistic_data'] = $this->common->select_data_by_condition('art_reg', $contition_array, $data='*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

           //echo "<pre>" ; print_r($this->data['business_data']); die();

           $artistic_userid = $this->data['artistic_data'][0]['user_id'];

              $contition_array = array('user_id' => $artistic_userid, 'status' =>'1');


           $this->data['art_data'] = $this->common->select_data_by_condition('art_post', $contition_array, $data='*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

          
           $followerabc[] = $this->data['art_data']; 

         }

          

//data fatch using follower end
//data fatch using skill start

           $userselectskill = $this->data['artisticdata'][0]['art_skill'];
          
           $contition_array = array('art_skill' => $userselectskill, 'status' =>'1');
            $skilldata = $this->data['skilldata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

           

            foreach ($skilldata  as $fdata) {
           
             
              $contition_array = array('art_post.user_id' => $fdata['user_id'], 'art_post.status' =>'1' );

           $this->data['art_data'] = $this->common->select_data_by_condition('art_post', $contition_array, $data='*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');
           $skillabc[] = $this->data['art_data']; 

         } 
//data fatch using skill end


//array merge and get unique value          
           $unique = array_merge($skillabc, $followerabc);

       
          foreach($unique as $ke => $arr) 
          {  
                foreach($arr as $k => $v) 
                 { 
                       
                  $postdata[] = $v;

                 }
          }

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['art_post_id']] = $value;
              }

          $this->data['artdata'] = $new; 
    //echo "<pre>"; print_r($this->data['artdata']); die();

            $this->load->view('artistic/art_post', $this->data);
        }


    // khytyai end


 public function art_manage_post($id){
        
            $userid = $this->session->userdata('aileenuser');
            $user_name = $this->session->userdata('user_name');
            
            if($id ==  $userid || $id == ''){

            $contition_array = array('user_id' => $userid, 'status' =>'1');
             $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $this->data['userdata'] =  $this->common->select_data_by_id('user', 'user_id', $userid, $data = '*', $join_str = array());
           
            $contition_array = array( 'user_id' => $userid);
           $this->data['artsdata'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
         }

         else{

          $contition_array = array('user_id' => $id, 'status' =>'1');
             $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
          

        $this->data['userdata'] =  $this->common->select_data_by_id('user', 'user_id', $id, $data = '*', $join_str = array());
           
            $contition_array = array( 'user_id' => $id);
           $this->data['artdata'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

         }
        
            $this->load->view('artistic/art_savepost', $this->data);
        }
        public function art_addpost()
        {
            $userid  = $this->session->userdata('aileenuser');
              $contition_array = array('user_id' => $userid, 'status' =>'1');
             $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $this->load->view('artistic/art_addpost',$this->data); 
        }


        public function art_post_insert(){ 
             $userid = $this->session->userdata('aileenuser');

              $skill = $this->input->post('skills');
              $otherskill= $this->input->post('other_skill');

                 $this->form_validation->set_rules('postname', 'Post name', 'required');
                 
                 $this->form_validation->set_rules('description', 'Post Descriprtion', 'required');
                 
                 

                 
                 if ($this->form_validation->run() == FALSE) { 
                     $this->load->view('artistic/art_addpost'); 
                    } 


                else{

                $config['upload_path'] = 'uploads/art_images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|pdf';
            
                $config['file_name'] = $_FILES['postattach']['name'];
                $config['upload_max_filesize'] = '40M' ;
                
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('postattach'))
                {
                    $uploadData = $this->upload->data();
                  
                    $picture = $uploadData['file_name'];

                }
                else
                {
                    $picture = '';
                }

                        $data = array(
                        'art_post' => $this->input->post('postname'),
                        'art_category' => implode(',',$skill),
                        'other_skill' => $this->input->post('other_skill'),
                        'art_description' => $this->input->post('description'),
                        'art_attachment' => $picture,
                        'created_date' => date('Y-m-d',time()),
                        'status'=>1,
                        'user_id'=> $userid       
                ); 
                       
           
                $insertdata =   $this->common->insert_data_getid($data,'art_post');

$skilldata = $this->common-> select_data_by_id('skill', 'skill', $otherskill, $data = '*', $join_str = array());

           if($skilldata || $otherskill){}
        else{
                $data1 = array(
                'skill' => $this->input->post('other_skill'),
                'type' => 2,
                'status' => 1
               ); 
           
        $insertid =   $this->common->insert_data_getid($data1,'skill');

      }

              if($insertdata){ 
               
                redirect('artistic/art_post', refresh);
              }else{
                 $this->session->flashdata('error','Your data not inserted');
                       redirect('artistic/art_addpost', refresh);
              }
            }
        }

        public function art_editpost($id)
        { 
            $contition_array = array('art_post_id' => $id);
             $this->data['artdata'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

              $contition_array = array('status' => 1, 'type' => 2);
            $this->data['skill1'] =  $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = 'skill', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $skildata = explode(',', $this->data['artdata'][0]['art_category']);
            
            $this->data['selectdata'] =  $skildata;
            $this->load->view('artistic/art_editpost',$this->data); 
        }
        public function art_editpost_insert($id){

           
            $skill = $this->input->post('skills');
            $skillname = $this->input->post('other_skill');
             

            $this->form_validation->set_rules('postname', 'Post name', 'required');
            
            $this->form_validation->set_rules('description', 'Post description', 'required');

                
             if ($this->form_validation->run() == FALSE) { 
                 $this->load->view('artistic/art_editpost'); 
                }
 
            else{

                $config['upload_path'] = 'uploads/art_images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|pdf';
               
                $config['file_name'] = $_FILES['postattach']['name'];
                $config['upload_max_filesize'] = '40M' ;
               
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('postattach'))
                { 
                    $uploadData = $this->upload->data();
                   
                    $picture = $uploadData['file_name'];

                }
                else
                { 
                    $picture = '';
                }
             
              if($picture){ 
                    $data = array(
                     'art_post' => $this->input->post('postname'),
                     'art_category' => implode(',',$skill),
                     'other_skill' => $this->input->post('other_skill'),
                     'art_description' => $this->input->post('description'),
                     'art_attachment' => $picture,
                     'modifiled_date' => date('Y-m-d',time())
            );}else{ 
                      $data = array(  
                     'art_post' => $this->input->post('postname'),
                     'art_category' => implode(',',$skill),
                     'other_skill' => $this->input->post('other_skill'),
                     'art_description' => $this->input->post('description'),
                     'art_attachment' => $this->input->post('hiddenimg'),
                     'modifiled_date' => date('Y-m-d',time())
                     ); 
                    } 
          
      $updatdata =   $this->common->update_data($data,'art_post','art_post_id',$id);

$skilldata = $this->common-> select_data_by_id('skill', 'skill', $skillname, $data = '*', $join_str = array());

  if($skilldata || $skillname == ""){}
        else{
      $data1 = array(
                'skill' => $this->input->post('other_skill'),
              
               ); 
          
        $insertid =   $this->common->update_data($data1,'skill','skill',$skillname);
      }
          if($updatdata){ 
            redirect('artistic/art_manage_post', refresh);
           }
            else{
             $this->session->flashdata('error','Your data not inserted');
                   redirect('artistic/art_editpost', refresh);
          }
        }
    }


    public function art_deletepost($id)
        { 
             $deletedata =  $this->common->delete_data('art_post','art_post_id',$id);
              

              redirect('artistic/art_manage_post', refresh);
            
        }

 
public function artistic_contactperson($id)
        {
            
            $userid = $this->session->userdata('aileenuser');
            $contition_array = array('user_id' => $id);
             $this->data['contactperson'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $this->load->view('artistic/artistic_contactperson',$this->data); 
        }


    public function artistic_contactperson_query($id)
        {
          

            $userid  = $this->session->userdata('aileenuser');

            $contition_array = array('user_id' => $id);
             $this->data['contactperson'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

             
            $email= $this->input->post('email');
            
            $toemail= $this->input->post('toemail');
            $userdata = $this->common->select_data_by_id('user','user_id', $userid, $data = '*', $join_str = array());
               
            $msg = 'Hey !' . " " .$this->data['contactperson'][0]['art_name'] ."<br/>". 
            $msg .=  $userdata[0]['first_name'] .$userdata[0]['last_name'].'('.$userdata[0]['user_email'] .')'. ',';
            $msg .= 'this person wants to contact with you!!';$msg .= "<br>";
            $msg .= $this->input->post('msg');
            $from='raval.khyati13@gmail.com';
         
            $subject = "contact message";
         
          
            $mail = $this->email_model->do_email($msg, $subject,$toemail,$from);
            

//insert contact start


            $data = array(
                        'contact_from_id' => $userid,
                        'contact_to_id' =>$id,
                        'contact_type' => 1,
                        'created_date' => date('Y-m-d',time()),
                        'status'=>1,
                        'is_delete'=> $userid, 
                        'contact_desc'=>$this->input->post('msg')      
                );

                
   $insertdata =   $this->common->insert_data_getid($data,'contact_person');
    

//insert contact person end 
//insert contact person notification start


                     $data = array(
                                    'not_type' => 7,
                                    'not_from_id' => $userid,
                                    'not_to_id' => $id,
                                    'not_read' => 2,
                                    'not_product_id' => $insertdata,
                                    'not_from' => 3
                                    ); 

    $insert_id =  $this->common->insert_data_getid($data,'notification');

            if($insertdata){ 
               
                redirect('artistic/art_post', refresh);
              }else{
                 $this->session->flashdata('error','Your data not inserted');
                       redirect('artistic/artistic_contactperson/'.$id, refresh);
              } 
//insert contact person notifiaction end           

                
    }

  public function art_user_post($id){
                
            $this->data['userid'] = $id;
            $user_name = $this->session->userdata('user_name');
           

            $this->data['usdata'] =  $this->common->select_data_by_id('user', 'user_id', $id, $data = '*', $join_str = array());


            $contition_array = array( 'user_id' => $id);
           $this->data['artdata'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
          
            $this->load->view('artistic/art_manage_post', $this->data);
        }


        public function user_image_insert() { 

        $userid = $this->session->userdata('aileenuser');
        

            if($this->input->post('cancel1')){ 
                redirect('artistic/art_post', refresh);
              }
              elseif($this->input->post('cancel2')){ 
                redirect('artistic/art_savepost', refresh);
              }
              elseif($this->input->post('cancel3')){ 
                redirect('artistic/art_addpost', refresh);
              }
              elseif($this->input->post('cancel4')){  
                redirect('artistic/artistic_profile', refresh);
              }
              elseif($this->input->post('cancel5')){  
                redirect('artistic/art_manage_post', refresh);
              }
               elseif($this->input->post('cancel6')){  
                redirect('artistic/userlist', refresh);
              }
               elseif($this->input->post('cancel7')){  
                redirect('artistic/following', refresh);
              }
               elseif($this->input->post('cancel8')){  
                redirect('artistic/followers', refresh);
              }

             if (empty($_FILES['profilepic']['name']))
             {
                 $this->form_validation->set_rules('profilepic', 'Upload profilepic', 'required');
            
            }
            else
            { 
                $config['upload_path'] = 'uploads/user_image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|mpeg|mpg|mpe|qt|mov|avi|pdf';
             
                $config['file_name'] = $_FILES['profilepic']['name'];
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('profilepic'))
                {
                    $uploadData = $this->upload->data();
                   
                    $picture = $uploadData['file_name'];
                }
                else
                {
                    $picture = '';
                }

                $data = array(
                    
                    'art_user_image' =>$picture,
                    'modified_date' => date('Y-m-d',time())
            ); 
              
       
      $updatdata =   $this->common->update_data($data,'art_reg','user_id',$userid);

          if($updatdata){ 
                if($this->input->post('hitext') == 1){ 
                redirect('artistic/art_post', refresh);
                }
                elseif($this->input->post('hitext') == 2)
                {
                 redirect('artistic/art_savepost', refresh);
                }
                elseif($this->input->post('hitext') == 3)
                {
                 redirect('artistic/art_addpost', refresh);
                }
                elseif($this->input->post('hitext') == 4)
                {
                 redirect('artistic/artistic_profile', refresh);
                }
                elseif($this->input->post('hitext') == 5)
                {
                 redirect('artistic/art_manage_post', refresh);
                }
                elseif($this->input->post('hitext') == 6)
                {
                 redirect('artistic/userlist', refresh);
                }
                elseif($this->input->post('hitext') == 7)
                {
                 redirect('artistic/following', refresh);
                }
                elseif($this->input->post('hitext') == 8)
                {
                 redirect('artistic/followers', refresh);
                }
          }else{
             $this->session->flashdata('error','Your data not inserted');
                   redirect('artistic/art_post', refresh);
          }
        }
    }


    public function artistic_profile($id) { 

         $userid = $this->session->userdata('aileenuser');
         $this->data['id'] = $id;

         if($id ==  $userid || $id == ''){

         $contition_array = array('user_id' => $userid, 'status' =>'1');
             $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           }
           else
           {

             $contition_array = array('user_id' => $id, 'status' =>'1');
             $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           }
        $this->load->view('artistic/artistic_profile', $this->data);

    }

//keyskill automatic retrieve cobtroller start
    public function keyskill()
    {
        $json = [];
        $where = "type='2' AND status='1'";

     

        if(!empty($this->input->get("q"))){
            $this->db->like('skill', $this->input->get("q"));
            $query = $this->db->select('skill_id as id,skill as text')
                        ->where($where)
                        ->limit(10)
                        ->get("skill");
            $json = $query->result();
        }

        
        echo json_encode($json);
        
    }
//keyskill automatic retrieve cobtroller End

//location automatic retrieve cobtroller start
public function location()
    {
        $json = [];

        if(!empty($this->input->get("q"))){
            $this->db->like('city_name', $this->input->get("q"));
            $query = $this->db->select('city_id as id,city_name as text')
                        ->order_by("city_name", "asc")
                        ->limit(10)
                        ->get("cities");
            $json = $query->result();
        }

        
        echo json_encode($json);
        
    }
//location automatic retrieve cobtroller End

// user list of artistic users

public function userlist()
    {
         $this->data['userid'] =  $userid = $this->session->userdata('aileenuser');
$artdata = $this->data['artdata'] =    $this->common->select_data_by_id('art_reg', 'user_id', $userid, $data = '*');

         $contition_array = array('user_id' => $userid, 'status' =>'1');
             $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        
         $contition_array = array('is_delete' => 0, 'status' => 1 , 'user_id !=' => $userid );
             $this->data['userlist'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


             // followers count
              $join_str[0]['table'] = 'follow';
             $join_str[0]['join_table_id'] = 'follow.follow_to';
             $join_str[0]['from_table_id'] = 'art_reg.art_id';
             $join_str[0]['join_type'] = '';
              $contition_array = array('follow_to' => $artdata[0]['art_id'], 'follow_status' => 1,'follow_type' =>1);
            
             $this->data['followers'] =  count($this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = ''));

             // follow count end

             // fllowing count
             $join_str[0]['table'] = 'follow';
             $join_str[0]['join_table_id'] = 'follow.follow_from';
             $join_str[0]['from_table_id'] = 'art_reg.art_id';
             $join_str[0]['join_type'] = '';

 $contition_array = array('follow_from' =>$artdata[0]['art_id'], 'follow_status' => 1,'follow_type' => 1);
            
             $this->data['following'] =  count($this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = ''));

             //following end
     
      $this->load->view('artistic/artistic_userlist', $this->data);
    
    }


    public function follow($id="")
    {
          $userid = $this->session->userdata('aileenuser');

       $artdata =    $this->common->select_data_by_id('art_reg', 'user_id', $userid, $data = '*');
    
    $contition_array = array('follow_type' => 1, 'follow_from' => $artdata[0]['art_id'], 'follow_to' => $id);
             $follow =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        
     if($follow){
       $data = array(
            'follow_type' => 1,
            'follow_from' => $artdata[0]['art_id'],
            'follow_to' => $id,
            'follow_status' => 1,
            );
       $update = $this->common->update_data($data,'follow','follow_id',$follow[0]['follow_id']);

       // insert notification

           $data = array(
                'not_type' => 8,
                'not_from_id' => $userid,
                'not_to_id' => $id,
                'not_read' => 2,
                'not_product_id' => $follow[0]['follow_id'],
                'not_from' => 3
                ); 
           
        $insert_id =  $this->common->insert_data_getid($data,'notification'); 
        // end notoification


       if($update){
         redirect('artistic/userlist', 'refresh');
       }
       }else{
        $data = array(
            'follow_type' => 1,
            'follow_from' => $artdata[0]['art_id'],
            'follow_to' => $id,
            'follow_status' => 1,
            );
       $insert =   $this->common->insert_data_getid($data,'follow'); 
      
      // insert notification

           $data = array(
                'not_type' => 8,
                'not_from_id' => $userid,
                'not_to_id' => $id,
                'not_read' => 2,
                'not_product_id' => $insert,
                'not_from' => 3
                ); 
             
        $insert_id =  $this->common->insert_data_getid($data,'notification'); 
        // end notoification

       if($insert){
         redirect('artistic/userlist', 'refresh');
       }
     }
    }

     public function unfollow($id="")
    {
          $userid = $this->session->userdata('aileenuser');
 $artdata = $this->common->select_data_by_id('art_reg', 'user_id', $userid, $data = '*');

$contition_array = array('follow_type' => 1, 'follow_from' => $artdata[0]['art_id'], 'follow_to' => $id);
            
             $follow =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        
     if($follow){
       $data = array(
            'follow_type' => 1,
            'follow_from' => $artdata[0]['art_id'],
            'follow_to' => $id,
            'follow_status' => 0,
            );
       $update = $this->common->update_data($data,'follow','follow_id',$follow[0]['follow_id']);
       if($update){
         redirect('artistic/userlist', 'refresh');
       }
       }
    }

    public function followers()
    {
         $this->data['userid'] =  $userid = $this->session->userdata('aileenuser');

$artdata = $this->common->select_data_by_id('art_reg', 'user_id', $userid, $data = '*');
         $contition_array = array('user_id' => $userid);
             $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

             $join_str[0]['table'] = 'follow';
             $join_str[0]['join_table_id'] = 'follow.follow_to';
             $join_str[0]['from_table_id'] = 'art_reg.art_id';
             $join_str[0]['join_type'] = '';

         $contition_array = array('follow_to' => $artdata[0]['art_id'], 'follow_status' => 1,'follow_type' =>1);
            
             $this->data['userlist'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
 

      $this->load->view('artistic/art_followers', $this->data);
    
    }



public function following()
    {
         $this->data['userid'] =  $userid = $this->session->userdata('aileenuser');
$artdata = $this->common->select_data_by_id('art_reg', 'user_id', $userid, $data = '*');

         $contition_array = array('user_id' => $userid, 'status' =>'1');
             $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        
             $join_str[0]['table'] = 'follow';
             $join_str[0]['join_table_id'] = 'follow.follow_from';
             $join_str[0]['from_table_id'] = 'art_reg.art_id';
             $join_str[0]['join_type'] = '';

         $contition_array = array('follow_from' =>$artdata[0]['art_id'], 'follow_status' => 1,'follow_type' => 1);
            
             $this->data['userlist'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
  
      $this->load->view('artistic/art_following', $this->data);
    
    }


// end of user lidt
 //deactivate user start
    public function deactivate($id)
    {
      
       $data = array(
                'status' => 0         
                 ); 
          
        $update =   $this->common->update_data($data,'art_reg','user_id',$id);
     
       if($update){ 

            $this->session->set_flashdata('success', 'You are deactivate successfully.');
             redirect('dashboard', 'refresh');
       }else{
                $this->session->flashdata('error','Sorry!! Your are not deactivate!!');
               redirect('artistic', 'refresh');
       }
    }


// deactivate user end

//Artistic Profile Save Post Start
  public function artistic_save($id){
   
         $userid = $this->session->userdata('aileenuser');

        $contition_array = array('post_id'=>$id,'user_id'=> $userid,'is_delete' => 0);
        $userdata =  $this->common->select_data_by_condition('art_post_save', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = ''); 
       
        $save_id=$userdata[0]['save_id'];
        
         if($userdata)
         {

             $contition_array = array('post_delete' => 1);
             $jobdata =  $this->common->select_data_by_condition('art_post_save', $contition_array, $data = 'save_id', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = ''); 
            
                $data = array(
                  
                 'post_delete'=> 0 ,
                  'post_save'=> 1,
                  'modify_date'=> date('Y-m-d h:i:s',time())
                    ); 
                
                   
                  $updatedata =  $this->common->update_data($data,'art_post_save','save_id',$save_id);
                 

                  if($updatedata){ 
                    
                            redirect('artistic/art_post',refresh);
                   
                  }else{
                     $this->session->flashdata('error','Your data not inserted');
                           redirect('artistic/art_post', refresh);
                  }
         }
         else
        {
       
            $data = array(
                'post_id'=> $id,
                'user_id' => $userid,
                 'created_date'=> date('Y-m-d h:i:s',time()),
                  'is_delete'=> 0,
                  'post_save'=> 1,
                  'post_delete'=> 0 
        ); 
       
           
      $insert_id =   $this->common->insert_data_getid($data,'art_post_save'); 
                if($insert_id)
                { 
                      
                      redirect('artistic/art_post', refresh);
                  
                }
               else
                {
                        $this->session->flashdata('error','Sorry!! Your data not inserted');
                       redirect('artistic/art_post', refresh);
                }
        }

  }

  //Artistic Profile Save Post End


//Artistic Profile Save Post shown Start 
  public function art_savepost()
        {
           $userid = $this->session->userdata('aileenuser');
            $user_name = $this->session->userdata('user_name'); 
           

              $contition_array = array('user_id' => $userid, 'status' =>'1');
             $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

             $join_str[0]['table'] = 'user';
             $join_str[0]['join_table_id'] = 'user.user_id';
             $join_str[0]['from_table_id'] = 'art_post.user_id';
             $join_str[0]['join_type'] = '';

             $data = 'art_post.*,user.first_name,user.last_name';

            $this->data['art_data'] = $this->common->select_data_by_condition('art_post', $contition_array = array(), $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');

             $this->load->view('artistic/art_savepost', $this->data);
            
          
        }
//Artistic Profile Save Post shown End

//Artistic  Profile Remove Save Post Start
public function art_remove_save($id){


  $userid = $this->session->userdata('aileenuser');

            $data = array(
                    'post_save'=> 0,
                   'post_delete'=> 1,
                  'modify_date' => date('Y-m-d h:i:s',time())
                
        ); 
      
      $updatedata =   $this->common->update_data($data,'art_post_save','save_id',$id);
     

      if($updatedata){ 
        
           redirect('artistic/art_savepost');
                        
      }else{
         $this->session->flashdata('error','Your data not inserted');
               redirect('artistic/art_savepost');
      }
}

//Artistic Profile Remove Save Post Start


 public function image_upload_ajax(){
  
    include 'db.php';

session_start();

  $session_uid = $this->session->userdata('aileenuser');

include_once 'getExtension.php';

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP"); 
if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST" && isset($session_uid))
{ 
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];

if($name)
{
$ext = $this->common->getExtension($name); 
if(in_array($ext,$valid_formats))
{
if($size<(1024*1024))
{
$actual_image_name = time().$session_uid.".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];
$bgSave='<div id="uX'.$session_uid.'" class="bgSave wallbutton blackButton">Save Cover</div>';


// khyati start


                $config['upload_path'] = 'uploads/user_image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|mpeg|mpg|mpe|qt|mov|avi|pdf';
                $config['file_name'] = $_FILES['photoimg']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
               
                if($this->upload->do_upload('photoimg'))
                {
                    $uploadData = $this->upload->data();
                     $picture = $uploadData['file_name']; 
                }
                else
                {
                    $picture = '';
                }


     $data = array(
                'profile_background' => $picture
                  ); 
       
        $update = $this->common->update_data($data,'art_reg','user_id',$session_uid); 
if($update){
    $path= base_url('uploads/user_image/');
echo $bgSave.'<img src="'.$path.$picture.'"  id="timelineBGload" class="headerimage ui-corner-all" style="top:0px"/>';

}               
else
{
echo "Fail upload folder with read access.";
}
}
else
echo "Image file size max 1 MB";
}
else
echo "Invalid file format.";
} 

else
echo "Please select image..!";

exit;

}

}

public function image_saveBG_ajax(){
  
 

session_start();

 $session_uid = $this->session->userdata('aileenuser');

if(isset($_POST['position']) && isset($session_uid))
{

$position=$_POST['position'];

 $data = array(
                'profile_background_position' => $position
                  ); 
       
        $update = $this->common->update_data($data,'art_reg','user_id',$session_uid);
if($update){
   
echo $position;


}
}
 

}

    // khyati change end 15 2 

//enter designation start

 public function art_designation(){  

         $userid = $this->session->userdata('aileenuser');
    
            $data = array(
                'designation'=> $this->input->post('designation'),
                'modified_date' => date('Y-m-d',time())
                
        ); 
       
           
       $updatdata =   $this->common->update_data($data,'art_reg','user_id',$userid);

      if($updatdata){ 

          if($this->input->post('hitext') == 1){
                redirect('artistic/art_post', refresh);
                }
          elseif($this->input->post('hitext') == 2)
             {
             	 redirect('artistic/art_addpost', refresh);
             }
          elseif($this->input->post('hitext') == 3)
             {
               redirect('artistic/artistic_profile', refresh);
             }
          elseif($this->input->post('hitext') == 4)
             {
               redirect('artistic/art_savepost', refresh);
             }
          elseif($this->input->post('hitext') == 5)
             {
               redirect('artistic/art_manage_post', refresh);
             }
          elseif($this->input->post('hitext') == 6)
             {
               redirect('artistic/followers', refresh);
             }
          elseif($this->input->post('hitext') == 7)
             {
               redirect('artistic/following', refresh);
             }
          elseif($this->input->post('hitext') == 8)
             {
               redirect('artistic/userlist', refresh);
             }
          
      }else{
         $this->session->flashdata('error','Your data not inserted');
               redirect('artistic/art_post', refresh);
      }

  //}
 }

//designation end


// create pdf start

  public function creat_pdf($id)
    {

           $contition_array = array('art_post_id' => $id, 'status' =>'1');
          $this->data['artdata'] = $this->common->select_data_by_condition('art_post', $contition_array , $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');
          $this->load->view('artistic/art_pdfdispaly', $this->data);

    }
//create pdf end

// Artistic comments like start

 
public function like_comment()
        {

          $userid = $this->session->userdata('aileenuser');
          $post_id =  $_POST["post_id"];  
          
          $contition_array = array('artistic_post_comment_id' =>  $_POST["post_id"], 'status' =>'1');
          $artdata =   $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');
         
            $artistic_comment_likes_count = $artdata[0]['artistic_comment_likes_count'];
            $likeuserarray = explode(',', $artdata[0]['artistic_comment_like_user']);
            
            if(!in_array($userid, $likeuserarray)){

            $user_array =   array_push($likeuserarray,$userid);

                if($artdata[0]['artistic_comment_likes_count'] == 0){ 
                    $userid = implode('', $likeuserarray);
                }else{  
                    $userid = implode(',', $likeuserarray);
                    }

               $data = array(
                    'artistic_comment_likes_count' => $artistic_comment_likes_count + 1,
                    'artistic_comment_like_user' =>   $userid,
                    'modify_date' => date('y-m-d h:i:s')
                  ); 
               

            $updatdata =   $this->common->update_data($data,'artistic_post_comment','artistic_post_comment_id',$post_id );
             $contition_array = array('artistic_post_comment_id' =>  $_POST["post_id"], 'status' =>'1');
          $artdata1 =   $this->data['artdata1'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

            if($updatdata){
            

              $cmtlike1 = '<span>';
              $cmtlike1 .= $artdata1[0]['artistic_comment_likes_count'] . '';
              $cmtlike1 .= '</span>';
              echo $cmtlike1;
            }else{ 
          }
              
            }else{
             
              foreach($likeuserarray as $key=>$val){
                if($val==$userid){ 
             $user_array =  array_splice($likeuserarray,$key,1); 
                }
             } 
                $data = array(
                    'artistic_comment_likes_count' => $artistic_comment_likes_count - 1,
                    'artistic_comment_like_user' =>   implode(',', $likeuserarray),
                    'modify_date' => date('y-m-d h:i:s')
                  ); 
            
            $updatdata =   $this->common->update_data($data,'artistic_post_comment','artistic_post_comment_id',$post_id);
             $contition_array = array('artistic_post_comment_id' =>  $_POST["post_id"], 'status' =>'1');
          $artdata2 =   $this->data['artdata2'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

                       if($updatdata){
                      

                      $cmtlike1 = '<span>';
                      $cmtlike1 .= $artdata2[0]['artistic_comment_likes_count'] . '';
                      $cmtlike1 .= '</span>';
                      echo $cmtlike1;
                    }else{
                  }
               }

           
        }

// Artistic comment like end 
//Artistic comment delete start
public function delete_comment()
        {
          $userid = $this->session->userdata('aileenuser');
          $post_id =  $_POST["post_id"];
          $post_delete =  $_POST["post_delete"];

          $data = array(
                    'status' => 0,
                    
            ); 
                   
       
      $updatdata =   $this->common->update_data($data,'artistic_post_comment','artistic_post_comment_id',$post_id);
        

      $contition_array = array('art_post_id' =>  $post_delete, 'status' =>'1');
          $artdata =   $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data = '*', $sortby = 'artistic_post_comment_id', $orderby = 'DESC', $limit = '3', $offset = '', $join_str= array(), $groupby = '');
                  
// khyati changes start

                     foreach($artdata as $art){

                      $artname =  $this->db->get_where('art_reg',array('user_id' => $art['user_id']))->row()->art_name;

                           $cmtinsert .=  "<b><i>" . $artname . "</i></b>";
                           $cmtinsert .=  '<div id= "showcomment' . $art['artistic_post_comment_id'].'"" >';
                           $cmtinsert .=  $art['comments'];
                           $cmtinsert .=  '</div>';
                           $cmtinsert .=  '<input type="text" name="editcomment" id="editcomment' . $art['artistic_post_comment_id'].'"style="display:none" value="'.$art['comments'].' ">';
                           $cmtinsert .=  '<button id="editsubmit' . $art['artistic_post_comment_id'].'" style="display:none" onClick="edit_comment('.$art['artistic_post_comment_id'].')">Comment</button>';

                           $cmtinsert .=   "<b>" . $art['created_date'] . "</b><br>";

                          $cmtinsert .=  '<button id="' . $art['artistic_post_comment_id'] . '"';
                          $cmtinsert .= 'onClick="comment_like(this.id)">';
                          $cmtinsert .=  '<i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>'; 
                          $cmtinsert .= '<span class="likecomment';
                          $cmtinsert .= '' . $art['artistic_post_comment_id'] . '">';
                          $cmtinsert .=  '' . $art['artistic_comment_likes_count'];
                          $cmtinsert .= '</span>';
                           $cmtinsert .=  '</button>';

                          $cmtinsert .=  '<button id="' . $art['artistic_post_comment_id'] . '"';
                          $cmtinsert .= 'onClick="comment_editbox(this.id)">';
                          $cmtinsert .=  'Edit'; 
                          $cmtinsert .=  '</button>';

                          
                          $cmtinsert .=  '<button id="' . $art['artistic_post_comment_id'] . '"';
                          $cmtinsert .= 'onClick="comment_delete(this.id)">';
                          $cmtinsert .=  'Delete'; 
                          $cmtinsert .=  '</button>'."<br>";

                                 }
                         echo $cmtinsert;

        }

//Artistic comment delete end

//Artistic comment edit start

        
//Artistic comment edit end        

// artistics post like start

 public function like_post()
        {

          $userid = $this->session->userdata('aileenuser');
          $post_id =  $_POST["post_id"];  
         

          $contition_array = array('art_post_id' =>  $_POST["post_id"], 'status' =>'1');
          $artdata =   $this->data['artdata'] = $this->common->select_data_by_condition('art_post', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');
        

            $art_likes_count = $artdata[0]['art_likes_count'];
            $likeuserarray = explode(',', $artdata[0]['art_like_user']);
           
            if(!in_array($userid, $likeuserarray)){  

            $user_array =   array_push($likeuserarray,$userid);

                if($artdata[0]['art_likes_count'] == 0){ 
                    $userid = implode('', $likeuserarray);
                }else{  
                    $userid = implode(',', $likeuserarray);
                    }

               $data = array(
                    'art_likes_count' => $art_likes_count + 1,
                    'art_like_user' =>   $userid,
                    'modifiled_date' => date('y-m-d h:i:s')
                  ); 
              

            $updatdata =   $this->common->update_data($data,'art_post','art_post_id',$post_id );
             $contition_array = array('art_post_id' =>  $_POST["post_id"], 'status' =>'1');
          $artdata1 =   $this->data['artdata1'] = $this->common->select_data_by_condition('art_post', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

            if($updatdata){
              

              $cmtlike = '<span>';
              $cmtlike .= $artdata1[0]['art_likes_count'] . '';
              $cmtlike .= '</span>';
              echo $cmtlike;
            }else{}
              
            }else{
              
              foreach($likeuserarray as $key=>$val){
                if($val==$userid){ //echo $key;
             $user_array =  array_splice($likeuserarray,$key,1); 
                }
             } 
                $data = array(
                    'art_likes_count' => $art_likes_count - 1,
                    'art_like_user' =>   implode(',', $likeuserarray),
                    'modifiled_date' => date('y-m-d h:i:s')
                  ); 
              

            $updatdata =   $this->common->update_data($data,'art_post','art_post_id',$post_id);
             $contition_array = array('art_post_id' =>  $_POST["post_id"], 'status' =>'1');
          $artdata2 =   $this->data['artdata2'] = $this->common->select_data_by_condition('art_post', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

                       if($updatdata){
                      

                      $cmtlike = '<span>';
                      $cmtlike .= $artdata2[0]['art_likes_count'] . '';
                      $cmtlike .= '</span>';
                      echo $cmtlike;
                    }else{}
               }

           
        }
// artistics post  like end

//artistic comment insert start

  public function insert_comment()
    {

          $userid = $this->session->userdata('aileenuser');
        
          $post_id =  $_POST["post_id"]; 
          $post_comment =  $_POST["comment"]; 

          $data = array(
                            'user_id' => $userid,
                            'art_post_id'=>$post_id,
                            'comments' => $post_comment,
                            'created_date' => date('Y-m-d',time()),
                            'status'=>1,
                            'is_delete'=>0
                            
                    ); 
                   
                        
                       
        $insert_id =   $this->common->insert_data_getid($data,'artistic_post_comment');

        $contition_array = array('art_post_id' =>  $_POST["post_id"], 'status' =>'1');
          $artdata =   $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data = '*', $sortby = 'artistic_post_comment_id', $orderby = 'DESC', $limit = '3', $offset = '', $join_str= array(), $groupby = '');
                  
// khyati changes start

                     foreach($artdata as $art){

                      $artname =  $this->db->get_where('art_reg',array('user_id' => $art['user_id']))->row()->art_name;

                           $cmtinsert .=  "<b><i>" . $artname . "</i></b>";
                           $cmtinsert .=  '<div id= "showcomment' . $art['artistic_post_comment_id'].'"" >';
                           $cmtinsert .=  $art['comments'];
                           $cmtinsert .=  '</div>';
                           $cmtinsert .=  '<input type="text" name="editcomment" id="editcomment' . $art['artistic_post_comment_id'].'"style="display:none" value="'.$art['comments'].' ">';
                           $cmtinsert .=  '<button id="editsubmit' . $art['artistic_post_comment_id'].'" style="display:none" onClick="edit_comment('.$art['artistic_post_comment_id'].')">Comment</button>';

                           $cmtinsert .=   "<b>" . $art['created_date'] . "</b><br>";

                          $cmtinsert .=  '<button id="' . $art['artistic_post_comment_id'] . '"';
                          $cmtinsert .= 'onClick="comment_like(this.id)">';
                          $cmtinsert .=  '<i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>'; 
                          $cmtinsert .= '<span class="likecomment';
                          $cmtinsert .= '' . $art['artistic_post_comment_id'] . '">';
                          $cmtinsert .=  '' . $art['artistic_comment_likes_count'];
                          $cmtinsert .= '</span>';
                           $cmtinsert .=  '</button>';

                          $cmtinsert .=  '<button id="' . $art['artistic_post_comment_id'] . '"';
                          $cmtinsert .= 'onClick="comment_editbox(this.id)">';
                          $cmtinsert .=  'Edit'; 
                          $cmtinsert .=  '</button>';

                          
                          $cmtinsert .=  '<button id="' . $art['artistic_post_comment_id'] . '"';
                          $cmtinsert .= 'onClick="comment_delete(this.id)">';
                          $cmtinsert .=  'Delete'; 
                          $cmtinsert .=  '</button>'."<br>";
                                 }
                         echo $cmtinsert;
                     // khyati chande 

      }
        
//artistic comment insert end  

//artistic comment edit start
public function edit_comment_insert()
    { 

          $userid = $this->session->userdata('aileenuser');
          
          $post_id =  $_POST["post_id"]; 
          $post_comment =  $_POST["comment"]; 

             $data = array(
                    'comments' => $post_comment,
                    'modify_date' => date('y-m-d h:i:s')
                  ); 
               
            $updatdata =   $this->common->update_data($data,'artistic_post_comment','artistic_post_comment_id',$post_id);
            if($updatdata){

               $contition_array = array('artistic_post_comment_id' =>  $_POST["post_id"], 'status' =>'1');
          $artdata =   $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');
              
                    $cmtlike = '<div>';
                    $cmtlike .= $artdata[0]['comments'] . "<br>";
                   $cmtlike .= '</div>';
                   echo $cmtlike;
            }
   
    }

//artistic comment edit end 



// cover pic controller

 public function ajaxpro()
    {  
        $userid = $this->session->userdata('aileenuser');
        
      $data = $_POST['image'];


$imageName = time().'.png';

$data = array(
                'profile_background' => $data
                  ); 
       
        $update = $this->common->update_data($data,'art_reg','user_id',$userid);

        $this->data['artdata'] = $this->common->select_data_by_id('art_reg', 'user_id', $userid, $data = '*', $join_str = array());

echo '<img src="' . $this->data['artdata'][0]['profile_background'] . '" />';
    }


public function image()
    {  
             $userid = $this->session->userdata('aileenuser');

                $config['upload_path'] = 'uploads/art_bg';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
               
                $config['file_name'] = $_FILES['image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image'))
                {
                      
                    $uploadData = $this->upload->data();
                   
                    $image = $uploadData['file_name'];
                    
                }
                else
                {
                  
                    $image = '';
                }


        $data = array(
                  'profile_background_main' => $image,
                  'modified_date' => date('Y-m-d h:i:s',time())
                  
        ); 
     
           
      $updatedata =   $this->common->update_data($data,'art_reg','user_id',$userid);

      if($updatedata){ 
        echo $userid;
      }else{
       echo "welcome";
      }

    }

    // cover pic end


}
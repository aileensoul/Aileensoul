<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Search extends CI_Controller {

   

    public function __construct() 
    {
        parent::__construct();

         $this->load->library('form_validation');
          $this->load->helper('form');

        $this->load->model('common');
//        if (!$this->session->userdata('user_id')) {
//            redirect('login', 'refresh');
//        }
        
        
        include ('include.php');
    }
        
    public function index()
    {
      $user_id=$this->session->userdata('user_id');
      $this->load->view('search/recommen_candidate',$this->data); 
    }

     public function execute_search()
    {

       $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

//         // Retrieve the posted search term.
//        //echo "<pre>";print_r($_POST);die();
          $searchskill = trim($this->input->post('skills'));
          $this->data['keyword']=$searchskill; 
         

          // echo $searchskill; die();

          //$searchskill = explode(',',$search_skill);
         //echo"<pre>";print_r($searchskill);die();
          $search_place = $this->input->post('searchplace'); 


      $cache_time  =  $this->db->get_where('cities',array('city_id' => $search_place[0]))->row()->city_name; 
      
      $this->data['keyword1']=$cache_time ;

       $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
         $this->data['city'] = $city = $this->common->select_data_by_condition('art_reg', $contition_array, $data = 'art_city', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           
    
          //echo "hi"; die();
                      $data = array(

                        'search_keyword' => $searchskill,
                         'search_location' => $search_place[0],
                         'user_location' =>  $city[0]['art_city'] ,
                         'user_id'=> $userid,
                         'created_date' => date('Y-m-d h:i:s',time()),
                         'status'=> 1
                ); 

                      // echo"<pre>"; print_r($data); die();
                  
        $insert_id =   $this->common->insert_data_getid($data,'search_info');

      if($this->input->post('skills') == ""){ //echo"falguni";die();
           $contition_array = array('art_city' => $search_place[0], 'status' =>'1');
        $new= $this->data['results'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        // $abc[] = $results;
        // $this->data['falguni'] = 1;        
   
    }
    elseif($this->input->post('searchplace') == "")
      { 
        // echo "skill";

        $contition_array = array('is_delete' => '0', 'status' =>'1','type' =>'2');

           $search_condition = "(skill LIKE '%$searchskill%')";
            
           $skilldata=$artdata['data'] = $this->common->select_data_by_search('skill', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
                // echo "<pre>"; print_r($skilldata); 
              $contion_array = array('status' =>'1');
           $artregdata= $this->data['results'] =  $this->common->select_data_by_condition('art_reg', $contion_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

             // echo "<pre>";print_r($artregdata);
            foreach ($skilldata as $key) {
                    $id=$key['skill_id'];    
                // echo $id; echo "<br>";
               foreach ($artregdata as $postskill) {
                  $skill=explode(',', $postskill['art_skill']);;

                 
                  if (in_array($id,$skill))
                  {
                  // echo "Match found"; echo "</br>";
                  // echo $postskill['post_id'];
                  $artskillpost[] = $postskill; 
                 
                  }
                  
               }

             }
               // echo "<pre>"; print_r($artskillpost); die();

      $contition_array = array('is_delete' => '0', 'status' =>'1');

           $search_condition = "(designation LIKE '%$searchskill%' or other_skill LIKE '%$searchskill%' or art_name LIKE '%$searchskill%' or art_lastname LIKE '%$searchskill%' or art_yourart LIKE '%$searchskill%')";
              // echo $search_condition;
           $otherdata=$other['data'] = $this->common->select_data_by_search('art_reg', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
                 // echo "<pre>"; print_r($otherdata); die();

           
            $join_str[0]['table'] = 'art_reg';
             $join_str[0]['join_table_id'] = 'art_reg.user_id';
             $join_str[0]['from_table_id'] = 'art_post.user_id';
             $join_str[0]['join_type'] = '';

              $search_condition = "(art_post.art_post LIKE '%$searchskill%' or art_post.art_description LIKE '%$searchskill%' or art_post.other_skill LIKE '%$searchskill%')";

          
         $artpost=$artpostdata['data'] = $this->common->select_data_by_search('art_post', $search_condition, $contition_array = array(), $data  = '*' , $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
            // echo "<pre>"; print_r($artpost); die();
         $fullname=explode(" ",$searchskill);

         // echo "<pre>"; print_r($fullname) ;
         if($fullname[1]==""){ 
          // echo "pallavi";

         if(count($artskillpost)==0){
          $unique=array_merge($artpost,$otherdata);

         }
         else{
          $unique=array_merge($artskillpost,$artpost,$otherdata);
         }

          // $unique=array_merge($artpost,$otherdata);
               // echo count($unique);

                foreach($unique as $ke => $arr) 
          {  
                
                  $postdata[] = $arr;
                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['art_id']] = $value;
              }


       
             // echo "<pre>";print_r($new);

         }
         else{
               // echo "panalia";
         $search_condition = "(art_name LIKE '%$fullname[0]%' or art_lastname LIKE '%$fullname[1]%')";

          // echo $search_condition;
         $artfullname=$fullnamedata['data'] = $this->common->select_data_by_search('art_reg', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
              

          // echo "<pre>"; print_r($artfullname);

          if(count($artskillpost)==0){
          $unique=array_merge($artpost,$otherdata,$artfullname);

         }
         else{
          $unique=array_merge($artskillpost,$artpost,$otherdata,$artfullname);
         }

       
              // $unique=array_merge($artskillpost,$artpost,$otherdata,$artfullname);
              // echo count($unique);

                foreach($unique as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['art_id']] = $value;
              }


       
              // echo "<pre>";print_r($new);die();
        
   }
    }else{
      // echo "both";

          $contition_array = array('is_delete' => '0', 'status' =>'1','type' =>'2');

           $search_condition = "(skill LIKE '%$searchskill%')";
            
           $skilldata=$artdata['data'] = $this->common->select_data_by_search('skill', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
              // echo "<pre>"; print_r($skilldata); 
              $contion_array = array('status' =>'1','art_city' => $search_place[0]);
           $artregdata= $this->data['results'] =  $this->common->select_data_by_condition('art_reg', $contion_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            foreach ($skilldata as $key) {
                    $id=$key['skill_id'];    
                // echo $id; echo "<br>";
               foreach ($artregdata as $postskill) {
                  $skill=explode(',', $postskill['art_skill']);;

                 
                  if (in_array($id,$skill))
                  {
                  // echo "Match found"; echo "</br>";
                  // echo $postskill['post_id'];
                  $artskillpost[] = $postskill; 
                 
                  }
                  
               }

             }
             // echo "<pre>"; print_r($artskillpost);

      $contition_array = array('is_delete' => '0', 'status' =>'1','art_city' => $search_place[0]);

           $search_condition = "(designation LIKE '%$searchskill%' or other_skill LIKE '%$searchskill%' or art_name LIKE '%$searchskill%' or art_lastname LIKE '%$searchskill%')";
            
           $otherdata=$other['data'] = $this->common->select_data_by_search('art_reg', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
               // echo "<pre>"; print_r($otherdata); 

        $join_str[0]['table'] = 'art_reg';
             $join_str[0]['join_table_id'] = 'art_reg.user_id';
             $join_str[0]['from_table_id'] = 'art_post.user_id';
             $join_str[0]['join_type'] = '';

              $search_condition = "(art_post.art_post LIKE '%$searchskill%' or art_post.art_description LIKE '%$searchskill%')";

           $contition_array = array('art_reg.art_city' => $search_place[0]);
         $artpost=$artpostdata['data'] = $this->common->select_data_by_search('art_post', $search_condition, $contition_array, $data  = '*' , $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
         // echo "<pre>"; print_r($artpost);

        $fullname=explode(" ",$searchskill);




         // echo $fullname;
         if($fullname[1]==""){

         if(count($artskillpost)==0){
          $unique=array_merge($artpost,$otherdata,$artfullname);

         }
         else{
          $unique=array_merge($artskillpost,$artpost,$otherdata,$artfullname);
         }
              // echo count($unique);

                foreach($unique as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['art_id']] = $value;
              }


       
            // echo "<pre>";print_r($new);

         }
         else{

         $search_condition = "(art_name LIKE '%$fullname[0]%' or art_lastname LIKE '%$fullname[1]%')";

          // echo $search_condition;
          $contition_array = array('art_reg.art_city' => $search_place[0]);
         $artfullname=$fullnamedata['data'] = $this->common->select_data_by_search('art_reg', $search_condition, $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
              

         // echo "<pre>"; print_r($artfullname);


       
              if(count($artskillpost)==0){
          $unique=array_merge($artpost,$otherdata,$artfullname);

         }
         else{
          $unique=array_merge($artskillpost,$artpost,$otherdata,$artfullname);
         }
               // echo count($unique);

                foreach($unique as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['art_id']] = $value;
              }


       
            // echo "<pre>";print_r($new);
        
   }

        
       
    }
      
      $this->data['artuserdata'] = $new;

      // echo "<pre>";print_r($abc);die();
         // echo "<pre>"; print_r($this->data['artuserdata']);die();



         // code for search
          $contition_array = array('status' => '1', 'is_delete' => '0');


         $artdata= $this->data['results'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = 'art_name,art_lastname,designation,other_skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


   $return_array = array(); 
          //  //echo  $return_array;
         
             foreach ($artdata as $get) {
                 $return = array();
                 $return = $get;
           
                 
                 $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
                              unset($return['art_name']);
                 unset($return['art_lastname']);

                 array_push($return_array, $return);
               //echo $returnarray; 

             }
      //        echo "<pre>";print_r($return_array);
      // $unique_items=array_unique($return_array);
      //  echo "<pre>";print_r($unique_items);die();
         // $contition_array = array('status' => '1');

         // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

         $contition_array = array('status' => '1','type' => '2');

         $artpost= $this->data['results'] =  $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
         // echo "<pre>"; print_r($artpost);die();
       

          $uni=array_merge($return_array,$artpost);
      //   echo count($unique);
         

          foreach($uni as $key=>$value){
          foreach($value as $ke=>$val){
            if($val != ""){


            $result[] = $val;
          }
          }
          }
          // $this->data['demo']=$result;

          // echo "<pre>";print_r($return_array);
      $unique_items=array_unique($result);
       // echo "<pre>";print_r($unique_items);die();
      $this->data['demo']=array_values($unique_items);


 


        $this->load->view('artistic/recommen_candidate',$this->data);
    }



 public function business_index()
        {
      $user_id=$this->session->userdata('user_id');
      $this->load->view('search/search_business',$this->data); 
        }

     public function business_search()
      { 

       $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

        // Retrieve the posted search term.
          $search_business = $this->input->post('skills'); 
          $this->data['keyword']=$search_business;

          $search_place = $this->input->post('searchplace'); 


      $cache_time  =  $this->db->get_where('cities',array('city_id' => $search_place[0]))->row()->city_name; 
      
      $this->data['keyword1']=$cache_time ;

       $contition_array = array( 'user_id' => $userid, 'is_deleted' => '0' , 'status' => '1');
         $this->data['city'] = $city = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'city', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           
    
          //echo "hi"; die();
                      $data = array(

                        'search_keyword' => $search_business,
                         'search_location' => $search_place[0],
                         'user_location' =>  $city[0]['city'] ,
                         'user_id'=> $userid,
                         'created_date' => date('Y-m-d h:i:s',time()),
                         'status'=> 1
                ); 

                      // echo"<pre>"; print_r($data); die();
                  
        $insert_id =   $this->common->insert_data_getid($data,'search_info');


      if($this->input->post('skills') == "")
        {
        $contition_array = array('city' => $search_place[0], 'status' =>'1');
        $new= $this->data['results'] =  $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>"; print_r($unique); die();

          }


           elseif($this->input->post('searchplace') == "")
           { 
        
           $condition_array = array('business_profile_id !=' => '', 'status' =>'1');
            //$condition_array = array('status' => '1');

           $searchbusiness =  $this->db->get_where('business_type',array('business_name' => $search_business))->row()->type_id;

           //echo $searchbusiness;

           $searchbusiness1 =  $this->db->get_where('industry_type',array('industry_name' => $search_business))->row()->industry_id;

           //echo $searchbusiness1;

           
            if($searchbusiness1){
            $search_condition = "(industriyal LIKE '%$searchbusiness1%')";
           }elseif($searchbusiness){
         $search_condition = "(business_type LIKE '%$searchbusiness%')";
           }else{ 
            $search_condition = "(company_name LIKE '%$search_business%' or contact_website LIKE '%$search_business%' or other_business_type LIKE '%$search_business%' or other_industrial LIKE '%$search_business%')";
           }
           //echo $search_condition;

         $business_profile= $this->data['results'] =  $this->common->select_data_by_search('business_profile', $search_condition, $condition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');

        // echo "<pre>"; print_r($business_profile);

             $join_str[0]['table'] = 'business_profile';
             $join_str[0]['join_table_id'] = 'business_profile.user_id';
             $join_str[0]['from_table_id'] = 'business_profile_post.user_id';
             $join_str[0]['join_type'] = '';

              $search_condition = "(business_profile_post.product_name LIKE '%$search_business%' or business_profile_post.product_description LIKE '%$search_business%')";
             // echo $search_condition;
          
         $business_post=$post['data'] = $this->common->select_data_by_search('business_profile_post', $search_condition, $contition_array = array(), $data = '*' , $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');

          // echo "<pre>"; print_r($results);die();





         $unique=array_merge($business_post,$business_profile);
        // echo count($business_post).'<br>';
        // echo count($business_profile);
        // echo count($unique);
        // echo "<pre>"; print_r($unique);

        foreach($unique as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['business_profile_id']] = $value;
              }



               
                 // echo "<pre>";print_r($new);die(); 
   
    }
    else
    {

                $condition_array = array('business_profile_id !=' => '', 'status' =>'1','city' => $search_place[0]);
            //$condition_array = array('status' => '1');

           $searchbusiness =  $this->db->get_where('business_type',array('business_name' => $search_business))->row()->type_id;

          // echo $searchbusiness;

           $searchbusiness1 =  $this->db->get_where('industry_type',array('industry_name' => $search_business))->row()->industry_id;

          // echo $searchbusiness1;

           
            if($searchbusiness1){
            $search_condition = "(industriyal LIKE '%$searchbusiness1%')";
           }elseif($searchbusiness){
         $search_condition = "(business_type LIKE '%$searchbusiness%')";
           }else{ 
            $search_condition = "(company_name LIKE '%$search_business%' or contact_website LIKE '%$search_business%' or other_business_type LIKE '%$search_business%' or other_industrial LIKE '%$search_business%')";
           }
           //echo $search_condition;

         $business_profile= $this->data['results'] =  $this->common->select_data_by_search('business_profile', $search_condition, $condition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');

        // echo "<pre>"; print_r($business_profile);die();



             $join_str[0]['table'] = 'business_profile';
             $join_str[0]['join_table_id'] = 'business_profile.user_id';
             $join_str[0]['from_table_id'] = 'business_profile_post.user_id';
             $join_str[0]['join_type'] = '';

              $search_condition = "(business_profile_post.product_name LIKE '%$search_business%' or business_profile_post.product_description LIKE '%$search_business%')";
             // echo $search_condition;
          
         $business_post=$post['data'] = $this->common->select_data_by_search('business_profile_post', $search_condition, $contition_array = array(), $data = '*' , $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');

          // echo "<pre>"; print_r($results);die();



         

           // echo "<pre>"; print_r($business_post);

$unique=array_merge($business_post,$business_profile);
        // echo count($business_post).'<br>';
        // echo count($business_profile);
        // echo count($unique);
        // echo "<pre>"; print_r($unique);

        foreach($unique as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['business_profile_id']] = $value;
              }

         
              
          //}
          }
      
      $this->data['businessuserdata'] = $new;


 $contition_array = array('status' => '1', 'is_deleted' => '0');


         $businessdata= $this->data['results'] =  $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
         // echo "<pre>";print_r($businessdata);die();


           $contition_array = array('status' => '1', 'is_delete' => '0');


         $businesstype= $this->data['results'] =  $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
         // echo "<pre>";print_r($businesstype);

           $contition_array = array('status' => '1', 'is_delete' => '0');


         $industrytype= $this->data['results'] =  $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
          // echo "<pre>";print_r($industrytype);die();
 $unique=array_merge($businessdata,$businesstype,$industrytype);
  foreach($unique as $key=>$value){
          foreach($value as $ke=>$val){
            if($val != ""){


            $result[] = $val;
          }
          }
          }

         $results=array_unique($result);  
            foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }
          
          $this->data['demo']=array_values($result1); 










      

      // echo "<pre>"; print_r($this->data['businessuserdata']); die();
       $this->load->view('business_profile/recommen_business',$this->data);
    }

//recrutier search start




    public function recruiter_index()
    {
      $user_id=$this->session->userdata('user_id');
      $this->load->view('recruiter/rec_search',$this->data); 
    }

    public function recruiter_search()
    {
     
      // echo "<pre>"; print_r($_POST);die();

       $this->data['userid'] = $userid = $this->session->userdata('aileenuser');
       
      $rec_search = trim($this->input->post('skills'));

       $this->data['keyword']=$rec_search;
   
      $search_place = $this->input->post('searchplace'); 

      $cache_time  =  $this->db->get_where('cities',array('city_id' => $search_place[0]))->row()->city_name; 
      
      $this->data['keyword1']=$cache_time ;
      //print_r($this->data['keyword1']); 


       $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 're_status' => '1');
         $this->data['city'] = $city = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_city', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           
    
          //echo "hi"; die();
                      $data = array(

                        'search_keyword' => $rec_search,
                         'search_location' => $search_place[0],
                         'user_location' =>  $city[0]['re_comp_city'] ,
                         'user_id'=> $userid,
                         'created_date' => date('Y-m-d h:i:s',time()),
                         'status'=> 1
                ); 

                       //echo"<pre>"; print_r($data); die();
                  
        $insert_id =   $this->common->insert_data_getid($data,'search_info'); 

      if($this->input->post('skills') == "")


      { 
        //echo "hi"; die();

         $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
); 
      $contition_array = array('job_reg.city_id' => $search_place[0], 'job_reg.status' =>'1');
      
        $unique= $this->data['results'] =  $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str , $groupby = '');

       // echo '<pre>'; print_r($unique); die();
         
     
    }

    elseif($this->input->post('searchplace') == "")
    { 
     
      $contition_array = array('is_delete' => '0', 'status' =>'1');

           $search_condition = "(skill LIKE '%$rec_search%')";
           // echo $search_condition;die();
            
           $skilldata=$artdata['data'] = $this->common->select_data_by_search('skill', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
              // echo "<pre>"; print_r($skilldata); die();

        $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
); 
            $contition_array = array('job_reg.status'=>'1' );
           $jobdata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
            // echo "<pre>"; print_r($jobdata); die();

             foreach ($skilldata as $key) {
                    $id=$key['skill_id'];    
                // echo $id; echo "<br>";
               foreach ($jobdata as $postskill) {
                  $skill=explode(',', $postskill['keyskill']);;

                 
                  if (in_array($id,$skill))
                  {
                  // echo "Match found"; echo "</br>";
                  // echo $postskill['post_id'];
                  $jobskillpost[] = $postskill; 
                 
                  }
                  
               }

             }

                // echo "<pre>"; print_r($jobskillpost); die();
             $this->data['rec_skill'] = $jobskillpost;
      // echo "<pre>"; print_r( $this->data['rec_skill']); die();

        $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);
         
         $contition_array1 = array('job_add_edu.pass_year'=>$rec_search);

         $yeardata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array1, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str , $groupby = '');
         
    // echo "<pre>"; print_r($yeardata); die();

          $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);

          $contition_array2 = array('job_reg.gender'=>$rec_search);

         $genderdata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array2, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

         // echo "<pre>"; print_r($genderdata);

         $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);
           $search_condition = "(job_add_workexp.jobtitle LIKE '%$rec_search%' or job_add_workexp.experience_year LIKE '%$rec_search%' or job_add_workexp.experience_month LIKE '%$rec_search%')";
          
          $results1=$jobprofiledata['data'] = $this->common->select_data_by_search('job_reg', $search_condition, $contition_array = array(), $data , $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
        // echo "<pre>"; print_r($results1); die();

          

         $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);
        
          $contition_array = array('job_reg.designation'=>$rec_search);
  
          $jobdata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


   $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);

          $contition_array = array('job_reg.other_skill'=>$rec_search);
  
          $jobdata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        // echo "<pre>"; print_r($designationdata); die();
         
          
          $recsearch1=  $this->db->get_where('stream',array('stream_name' => $rec_search))->row()->stream_id;

          if ($recsearch1 != "") {
            // echo "pallavi";die();
            
           $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);

          $contition_array = array('job_add_edu.stream' => $recsearch1);


        $yeardata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str , $groupby = '');
         
           
          }
         

        // echo "<pre>"; print_r($streamdata); die();

           $recsearch=  $this->db->get_where('degree',array('degree_name' => $rec_search))->row()->degree_id;

             if ($recsearch != "")
              {

             $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);

           $contition_array = array('job_add_edu.degree' => $recsearch);


        $yeardata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str , $groupby = '');
         
        }
         //echo "<pre>"; print_r($degreedata); 


          foreach($jobskillpost as $ke => $arr) 
          {  
                 
                  $postdata1[] = $arr;

          }
      // echo '<pre>'; print_r($postdata1); 

           $new1 = array();
          foreach ($postdata1 as $value)
          {
                  //echo "hi";
                  $new1[$value['job_id']] = $value;
         }

          // echo '<pre>'; print_r($new1); die();
         
          if(count($new1)  == 0)
          { 
           // echo "pallavi";
              $unique=array_merge($yeardata,$genderdata,$results1,$jobdata);
               // echo count($unique) . "<br>"; die();
                // echo "<pre>"; print_r($unique); die();
         }
        
        else
          {
            // echo "vaghela";
              $unique=array_merge($new1,$yeardata, $genderdata,$results1,$jobdata);

           }
      
      // echo "<pre>"; print_r($unique); die();

  }

     else 
      {

        //echo "hi"; die();

          $contition_array = array('is_delete' => '0', 'status' =>'1');

           $search_condition = "(skill LIKE '%$rec_search%')";
            
           $skilldata=$artdata['data'] = $this->common->select_data_by_search('skill', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
             // echo "<pre>"; print_r($artdata['data']);

               $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
); 
            $contition_array = array('job_reg.status'=>'1', 'job_reg.city_id' => $search_place[0] );
           $jobdata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str , $groupby = '');
            // echo "<pre>"; print_r($recdata); die();

             foreach ($skilldata as $key) {
                    $id=$key['skill_id'];    
                // echo $id; echo "<br>";
               foreach ($jobdata as $postskill) {
                  $skill=explode(',', $postskill['keyskill']);;

                 
                  if (in_array($id,$skill))
                  {
                  // echo "Match found"; echo "</br>";
                  // echo $postskill['post_id'];
                  $jobskillpost[] = $postskill; 
                 
                  }
                  
               }

             }

                //echo "<pre>"; print_r($jobskillpost); die();
             $this->data['rec_skill'] = $jobskillpost;
         //  echo "<pre>"; print_r( $this->data['rec_skill']);  die();




          $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);
         
         $contition_array1 = array('job_add_edu.pass_year'=>$rec_search);

         $adddata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array1, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str , $groupby = '');
         
      // echo "<pre>"; print_r($yeardata);

          $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);
           $contition_array = array('job_reg.designation'=>$recsearch1);
  
          $jobdata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
         // echo "<pre>"; print_r($designationdata);

           $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);

           $contition_array = array('job_reg.other_skill'=>$rec_search);
  
          $jobdata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



            $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);
          $contition_array2 = array('job_reg.gender'=>$rec_search,  'job_reg.city_id' => $search_place[0] );

         $genderdata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array2, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

         // echo "<pre>"; print_r($genderdata);

         

           $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);
            
              $search_condition = "(job_add_workexp.jobtitle LIKE '%$rec_search%' or job_add_workexp.experience_year LIKE '%$rec_search%' or job_add_workexp.experience_month LIKE '%$rec_search%')";
               $contition_array = array('job_add_workexp.city_id' => $search_place[0] );
          
          $results1=$jobprofiledata['data'] = $this->common->select_data_by_search('job_reg', $search_condition, $contition_array, $data , $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
       //echo "<pre>"; print_r($results1); die();


             $recsearch1=  $this->db->get_where('stream',array('stream_name' => $rec_search))->row()->stream_id;

          if ($recsearch1 != "") {
            // echo "pallavi";die();
            
           $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);

          $contition_array = array('job_add_edu.stream' => $recsearch1);


        $adddata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str , $groupby = '');
         
           
          }
         

        // echo "<pre>"; print_r($streamdata); die();

           $recsearch=  $this->db->get_where('degree',array('degree_name' => $rec_search))->row()->degree_id;

             if ($recsearch != "")
              {

             $join_str = array(array(
        'join_type' => '',
        'table' => 'job_add_edu',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_edu.user_id'),
    array(
        'join_type' => '',
        'table' => 'job_add_workexp',
        'join_table_id' => 'job_reg.user_id',
        'from_table_id' => 'job_add_workexp.user_id')
);
           $contition_array = array('job_add_edu.degree' => $recsearch);


        $adddata=$userdata['data'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str , $groupby = '');
         
        }
         //echo "<pre>"; print_r($degreedata); 

         
          foreach($jobskillpost as $ke => $arr) 
          {  
                 
                  $postdata1[] = $arr;

          }

           $new1 = array();
          foreach ($postdata1 as $value)
          {
                  //echo "hi";
                  $new1[$value['job_id']] = $value;
         }

        // echo '<pre>'; print_r($new1); die();
         
          if(count($new1)  == 0)
          {
              $unique=array_merge($adddata,$genderdata,$results1,$jobdata);
               // echo count($unique) . "<br>"; die();
                // echo "<pre>"; print_r($unique); die();
         }
        
        else
          {

            //echo "hi"; die();
             $unique=array_merge($new1,$adddata,$genderdata,$results1,$jobdata);

           }
        // echo "<pre>"; print_r($unique); die();


     
     }

      $this->data['postdetail'] = $unique;
      //echo "<pre>"; print_r($unique); die();

       $contition_array = array('status' => '1', 'is_delete' => '0');


         $recdata= $this->data['results'] =  $this->common->select_data_by_condition('job_reg', $contition_array, $data = 'other_skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

          $contition_array = array('status' => '1');

         $jobdata1= $this->data['results'] =  $this->common->select_data_by_condition('job_add_workexp', $contition_array, $data = 'jobtitle', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

      
         $contition_array = array('status' => '1');

         $degreedata= $this->data['results'] =  $this->common->select_data_by_condition('degree', $contition_array, $data = 'degree_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        $contition_array = array('status' => '1');

         $streamdata= $this->data['results'] =  $this->common->select_data_by_condition('stream', $contition_array, $data = 'stream_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


         $contition_array = array('status' => '1','type' => '1');

         $skill= $this->data['results'] =  $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
         // echo "<pre>"; print_r($artpost);die();
       

          $uni=array_merge($recdata,$jobdata1 ,$degreedata,$streamdata,$skill);
      //   echo count($unique);
         

          foreach($uni as $key=>$value){
          foreach($value as $ke=>$val){
            if($val != ""){

    
            $result[] = $val;
          }
          }
          }
      
       foreach($result as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }
//echo '<pre>'; print_r($result1); die();
         
         $this->data['demo']= array_values($result1);



        $this->load->view('recruiter/recommen_candidate1',$this->data);

 
    }

//recrutier search end



//freelancer hire search start
public function freelancer_hire_index()
    {
      $user_id=$this->session->userdata('user_id');
      $this->load->view('freelancer_hire/freelancer_hire_search',$this->data); 
    }

     public function freelancer_hire_search()
    {
      $userid = $this->session->userdata('aileenuser');

        // Retrieve the posted search term.
       //echo "<pre>";print_r($_POST);die();
          $search_skill = trim($this->input->post('skills')); 
         // echo $search_skill;die();   
        // $searchskill = implode(',',$search_skill);
          $this->data['keyword']=$search_skill;
        
          $search_place = $this->input->post('searchplace');


      $cache_time  =  $this->db->get_where('cities',array('city_id' => $search_place[0]))->row()->city_name; 
      
      $this->data['keyword1']=$cache_time ;
         // $searchplace[] = $search_place;
          //print_r($search_place)  ; die(); 
          //echo $search_place[0]; die();

       $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
         $this->data['city'] = $city = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = 'city', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           
    
          //echo "hi"; die();
                      $data = array(

                        'search_keyword' => $search_skill,
                         'search_location' => $search_place[0],
                         'user_location' =>  $city[0]['city'] ,
                         'user_id'=> $userid,
                         'created_date' => date('Y-m-d h:i:s',time()),
                         'status'=> 1
                ); 

                      // echo"<pre>"; print_r($data); die();
                  
        $insert_id =   $this->common->insert_data_getid($data,'search_info'); 


      if($this->input->post('skills') == ""){ //echo"falguni";die();




         //$contion_array = array('freelancer_post_reg_id !=' => '');
           $contition_array = array('freelancer_post_city' => $search_place[0], 'status' =>'1');
        $unique= $this->data['results'] =  $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        // $abc[] = $results;
        // $this->data['falguni'] = 1;

    }elseif($this->input->post('searchplace') == ""){ 


       $contition_array = array('type' => '1', 'status' =>'1');

         $search_condition = "(skill LIKE '%$search_skill%')";
          // echo "$search_condition";die();
         $skilldata=$skill['data'] = $this->common->select_data_by_search('skill', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');

         // echo "<pre>"; print_r($skilldata);
        
        $contion_array = array('freelancer_post_reg_id !=' => '', 'status' =>'1');
        $results= $this->data['results'] =  $this->common->select_data_by_condition('freelancer_post_reg', $contion_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

         // echo '<pre>'; print_r($results); die();

          foreach ($skilldata as $key) {
                  $id=$key['skill_id'];    
              // echo $id; echo "<br>";
             foreach ($results as $postskill) {
                $skill=explode(',', $postskill['freelancer_post_area']);;

               
                if (in_array($id,$skill))
                {
                // echo "Match found"; echo "</br>";
                // echo $postskill['post_id'];
                $skillpost[] = $postskill; 
               
                }
                
             }

           }

              // echo "<pre>"; print_r($skillpost);die();
           $this->data['rec_skill'] = $skillpost;

           $contition_array = array('type' => '1', 'status' =>'1');

         $search_condition = "(category_name LIKE '%$search_skill%')";
          // echo "$search_condition";die();
         $fielddata=$field['data'] = $this->common->select_data_by_search('category', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
          // echo "<pre>"; print_r($fielddata);
          // echo $fielddata[0]['category_id'];

         $contition_array = array('freelancer_post_field' => $fielddata[0]['category_id']);
            
             $join_str[0]['table'] = 'category';
             $join_str[0]['join_table_id'] = 'category.category_id';
             $join_str[0]['from_table_id'] = 'freelancer_post_reg.freelancer_post_field';
             $join_str[0]['join_type'] = '';

         $fieldfound= $this->data['field'] =  $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby );
       // echo "<pre>"; print_r($fieldfound);

            $contition_array = array('status' =>'1','is_delete'=>'0');

         $search_condition = "(designation LIKE '%$search_skill%' or freelancer_post_otherskill LIKE '%$search_skill%' or freelancer_post_exp_month LIKE '%$search_skill%' or freelancer_post_exp_year LIKE '%$search_skill%')";
            // echo "$search_condition";
         $otherdata=$other['data'] = $this->common->select_data_by_search('freelancer_post_reg', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
          // $p3= chop($str,"World!");
          // echo "<pre>";print_r($otherdata); 


         $p3=str_split($search_skill,6);
         $year=$p3[0]; 
         $p4=str_split($search_skill,7);
          // echo $year."<br>"; 
          $month= $p4[1];
         // echo $month;
         
          $contition_array = array('status' =>'1');

         $search_condition = "(freelancer_post_exp_year  LIKE '%$year%' AND freelancer_post_exp_month LIKE '%$month%')";
            // echo "$search_condition";
         $experidata=$experidata['data'] = $this->common->select_data_by_search('freelancer_post_reg', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');

          // echo "<pre>"; print_r($experidata); die();
         // echo count($experidata);
         // echo count($otherdata);
         // echo count($fieldfound);
         // echo count($skillpost);

         foreach($skillpost as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['freelancer_post_reg_id']] = $value;
              }


         
   if(count($new)  == 0){
    // echo "hello";
              $unique1=array_merge($experidata,$otherdata,$fieldfound);
                // echo count($unique) . "<br>"; die();
                 // echo "<pre>"; print_r($unique); die();

          }else{
              $unique1=array_merge($new,$experidata,$otherdata,$fieldfound);

          }


foreach($unique1 as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new1 = array();
              foreach ($postdata as $value)
              {
                  $unique[$value['freelancer_post_reg_id']] = $value;
              }

         
         // echo "unique". count($unique);
          // echo "<pre>"; print_r($new1);die();

     
   
    }else{
     // echo "ehfkj";

      $contition_array = array('type' => '1', 'status' =>'1');

         $search_condition = "(skill LIKE '%$search_skill%')";
          // echo "$search_condition";die();
         $skilldata=$skill['data'] = $this->common->select_data_by_search('skill', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');

         // echo "<pre>"; print_r($skilldata);
        
        $contion_array = array('freelancer_post_reg_id !=' => '', 'status' =>'1','freelancer_post_city' => $search_place[0]);
        // print_r($contion_array);
        $results= $this->data['results'] =  $this->common->select_data_by_condition('freelancer_post_reg', $contion_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        // echo "<pre>"; print_r($results);

        foreach ($skilldata as $key) {
                  $id=$key['skill_id'];    
              // echo $id; echo "<br>";
             foreach ($results as $postskill) {
                $skill=explode(',', $postskill['freelancer_post_area']);;

               
                if (in_array($id,$skill))
                {
                // echo "Match found"; echo "</br>";
                // echo $postskill['post_id'];
                $skillpost[] = $postskill; 
               
                }
                
             }

           }

     // echo "<pre>"; print_r($skillpost);

$contition_array = array('type' => '1', 'status' =>'1');

         $search_condition = "(category_name LIKE '%$search_skill%')";
          // echo "$search_condition";die();
         $fielddata=$field['data'] = $this->common->select_data_by_search('category', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
         // echo "<pre>"; print_r($fielddata);
          // echo $fielddata[0]['category_id'];

         $contition_array = array('freelancer_post_field' => $fielddata[0]['category_id'],'freelancer_post_city' => $search_place[0]);
            
             $join_str[0]['table'] = 'category';
             $join_str[0]['join_table_id'] = 'category.category_id';
             $join_str[0]['from_table_id'] = 'freelancer_post_reg.freelancer_post_field';
             $join_str[0]['join_type'] = '';

         $fieldfound= $this->data['field'] =  $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby );
         // echo "<pre>"; print_r($fieldfound);

           $contition_array = array('status' =>'1','is_delete'=>'0','freelancer_post_city' => $search_place[0]);

         $search_condition = "(designation LIKE '%$search_skill%' or freelancer_post_otherskill LIKE '%$search_skill%' or freelancer_post_exp_month LIKE '%$search_skill%' or freelancer_post_exp_year LIKE '%$search_skill%')";
           // echo "$search_condition";
         $otherdata=$other['data'] = $this->common->select_data_by_search('freelancer_post_reg', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
          // $p3= chop($str,"World!");
         // echo "<pre>";print_r($otherdata);

$p3=str_split($search_skill,6);
         $year=$p3[0]; 
         $p4=str_split($search_skill,7);
         // echo $year."<br>"; $month= $p4[1];
         // echo $month;
         
          $contition_array = array('status' =>'1','freelancer_post_city' => $search_place[0]);

         $search_condition = "(freelancer_post_exp_year  LIKE '%$year%' AND freelancer_post_exp_month LIKE '%$month%')";
           // echo "$search_condition";
         $experidata=$experidata['data'] = $this->common->select_data_by_search('freelancer_post_reg', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');

         // echo "<pre>"; print_r($experidata);
         // echo count($experidata);
         // echo count($otherdata);
         // echo count($fieldfound);
         // echo count($skillpost);

         foreach($skillpost as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['freelancer_post_reg_id']] = $value;
              }


         
   if(count($new)  == 0){
    // echo "hello";
              $unique1=array_merge($experidata,$otherdata,$fieldfound);
                // echo count($unique) . "<br>"; die();
                 // echo "<pre>"; print_r($unique); die();

          }else{
              $unique1=array_merge($new,$experidata,$otherdata,$fieldfound);

          }

foreach($unique1 as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new1 = array();
              foreach ($postdata as $value)
              {
                  $unique[$value['freelancer_post_reg_id']] = $value;
              }



// echo "<pre>";print_r($unique);die();


      
          
          
       
    }
      
      $this->data['freelancerpostdata'] = $unique;
        // echo "<pre>";print_r($this->data['freelancerpostdata']);die();


// code for search
             $contition_array = array('status' => '1','is_delete' => '0');

         $field= $this->data['results'] =  $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
         

           $contition_array = array('status' => '1','is_delete' => '0');

         $freelancer_postdata= $this->data['results'] =  $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'freelancer_post_otherskill,designation', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
         // echo "<pre>"; print_r($results_recruiter);die();

          $contition_array = array('status' => '1', 'type' => '1');

         $skill= $this->data['skill'] =  $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

          $unique=array_merge($field,$skill,$freelancer_postdata);
         // echo count($unique);
          // $this->data['demo']=$unique;


 foreach($unique as $key=>$value){
          foreach($value as $ke=>$val){
            if($val != ""){


            $result[] = $val;
          }
          }
          }

          foreach($result as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);





// echo "<pre>";print_r($this->data['freelancerpostdata']);die();
       $this->load->view('freelancer/freelancer_hire/recommen_freelancer_hire',$this->data);
    }

//freelancer hire search end 

// freelancer post search start
public function freelancer_post_index()
    {
      $user_id=$this->session->userdata('user_id');
      $this->load->view('freelancer_post/freelancer_post_search',$this->data); 
    }

     public function freelancer_post_search()
    {
      $userid = $this->session->userdata('aileenuser');

        // Retrieve the posted search term.
       //echo "<pre>";print_r($_POST);die();
          $search_skill = trim($this->input->post('skills')); 
         //print_r($search_skill);die();   
        // $searchskill = implode(',',$search_skill);
          $this->data['keyword']=$search_skill;
        
          $search_place = $this->input->post('searchplace'); 

      $cache_time  =  $this->db->get_where('cities',array('city_id' => $search_place[0]))->row()->city_name; 
      
      $this->data['keyword1']=$cache_time ;


      $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
         $this->data['city'] = $city = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'freelancer_post_city', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           
    
          //echo "hi"; die();
                      $data = array(

                        'search_keyword' => $search_skill,
                         'search_location' => $search_place[0],
                         'user_location' =>  $city[0]['freelancer_post_city'] ,
                         'user_id'=> $userid,
                         'created_date' => date('Y-m-d h:i:s',time()),
                         'status'=> 1
                ); 

                    //   echo"<pre>"; print_r($data); die();
                  
        $insert_id =   $this->common->insert_data_getid($data,'search_info'); 

      if($this->input->post('skills') == ""){ //echo"falguni";die();
           $contition_array = array('city' => $search_place[0], 'status' =>'1');
        $new= $this->data['results'] =  $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
          
        // $abc[] = $results;
        // $this->data['falguni'] = 1;

    }elseif($this->input->post('searchplace') == ""){ 

    $contition_array = array('is_delete' => '0', 'status' =>'1');

         $search_condition = "(skill LIKE '%$search_skill%')";
          
         $skilldata=$artdata['data'] = $this->common->select_data_by_search('skill', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
           // echo "<pre>"; print_r($artdata['data']); 
          $contition_array = array('status'=>'1');
         $recdata=$userdata['data'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
          // echo "<pre>"; print_r($recdata); 

           foreach ($skilldata as $key) {
                  $id=$key['skill_id'];    
              // echo $id; echo "<br>";
             foreach ($recdata as $postskill) {
                $skill=explode(',', $postskill['post_skill']);;

               
                if (in_array($id,$skill))
                {
                // echo "Match found"; echo "</br>";
                // echo $postskill['post_id'];
                $freeskillpost[] = $postskill; 
               
                }
                
             }

           }

           //    echo "<pre>"; print_r($freeskillpost);
           // $this->data['rec_skill'] = $freeskillpost;
        //  echo "<pre>"; print_r( $this->data['rec_skill']);  die();


            $search_condition = "(post_name LIKE '%$search_skill%' or post_other_skill LIKE '%$search_skill%' or post_est_time LIKE '%$search_skill%' or post_rate LIKE '%$search_skill%' or  post_exp_year LIKE '%$search_skill%' or  post_exp_month LIKE '%$search_skill%')";
      // $contion_array = array('post_name=' => $search_job );
          
         $freeldata = $this->common->select_data_by_search('freelancer_post', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');

         // echo "<pre>"; print_r($freeldata);

         $p3=str_split($search_skill,6);
         $year=$p3[0]; 
         $p4=str_split($search_skill,7);
         // echo $year."<br>"; $month= $p4[1];
         // echo $month;
         
          $contition_array = array('status' =>'1');

         $search_condition = "(post_exp_year  LIKE '%$year%' AND post_exp_month LIKE '%$month%')";
           // echo "$search_condition";
         $experidata=$experidata['data'] = $this->common->select_data_by_search('freelancer_post', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
         
   if(count($freeskillpost)  == 0){
    // echo "hello";
              $unique=array_merge($freeldata,$experidata);
                // echo count($unique) . "<br>"; die();
                 // echo "<pre>"; print_r($unique); die();

          }else{
              $unique=array_merge($freeskillpost,$freeldata,$experidata);

          }




 foreach($unique as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['post_id']] = $value;
              }


// echo "<pre>";print_r($unique);die();

   
    }else{//echo "ehfkj"; die();

$contition_array = array('is_delete' => '0', 'status' =>'1');

         $search_condition = "(skill LIKE '%$search_skill%')";
          
         $skilldata=$artdata['data'] = $this->common->select_data_by_search('skill', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
           // echo "<pre>"; print_r($artdata['data']); 
          $contition_array = array('status'=>'1', 'post_location' => $search_place[0]);
         $recdata=$userdata['data'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
          // echo "<pre>"; print_r($recdata); 

           foreach ($skilldata as $key) {
                  $id=$key['skill_id'];    
              // echo $id; echo "<br>";
             foreach ($recdata as $postskill) {
                $skill=explode(',', $postskill['post_skill']);;

               
                if (in_array($id,$skill))
                {
                // echo "Match found"; echo "</br>";
                // echo $postskill['post_id'];
                $freeskillpost[] = $postskill; 
               
                }
                
             }

           }

              // echo "<pre>"; print_r($freeskillpost); die();
           // $this->data['rec_skill'] = $freeskillpost;
        //  echo "<pre>"; print_r( $this->data['rec_skill']);  die();


            $search_condition = "(post_name LIKE '%$search_skill%' or post_other_skill LIKE '%$search_skill%' or post_est_time LIKE '%$search_skill%' or post_rate LIKE '%$search_skill%' or  post_exp_year LIKE '%$search_skill%' or  post_exp_month LIKE '%$search_skill%')";
       $contion_array = array('post_name=' => $search_job ,'post_location' => $search_place[0]);
          
         $freeldata = $this->common->select_data_by_search('freelancer_post', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');

         // echo "<pre>"; print_r($freeldata);

         $p3=str_split($search_skill,6);
         $year=$p3[0]; 
         $p4=str_split($search_skill,7);
         // echo $year."<br>"; $month= $p4[1];
         // echo $month;
         
          $contition_array = array('status' =>'1','post_location' => $search_place[0]);

         $search_condition = "(post_exp_year  LIKE '%$year%' AND post_exp_month LIKE '%$month%')";
           // echo "$search_condition";
         $experidata=$experidata['data'] = $this->common->select_data_by_search('freelancer_post', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');


         
   if(count($freeskillpost)  == 0){
    // echo "hello";
              $unique=array_merge($freeldata,$experidata);
                // echo count($unique) . "<br>"; die();
                 // echo "<pre>"; print_r($unique); die();

          }else{
              $unique=array_merge($freeskillpost,$freeldata,$experidata);

          }



 foreach($unique as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['post_id']] = $value;
              }




// echo "<pre>";print_r($unique);
      

          
       
    }
       // echo "<pre>";print_r($unique);die();
      $this->data['freelancerhiredata'] = $new;





                 $contition_array = array('status' => '1','is_delete' => '0');

         $freelancer_postdata= $this->data['results'] =  $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
          // echo "<pre>"; print_r($freelancer_postdata);die();

          $contition_array = array('status' => '1', 'type' => '1');

         $skill= $this->data['results'] =  $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

          $contition_array = array('status' => '1', 'is_delete' => '0');

         $field= $this->data['results'] =  $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

          $uni=array_merge($skill,$freelancer_postdata,$field);
         // echo count($unique);
          // $this->data['demo']=$uni;

           foreach($uni as $key=>$value){
          foreach($value as $ke=>$val){
            if($val != ""){


            $result[] = $val;
          }
          }
          }
 foreach($result as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);


       $this->load->view('freelancer/freelancer_post/recommen_freelancer_post',$this->data);
    }



// freelancer post search end 

// job search start
// public function job_search_index()
//     {
//       $user_id=$this->session->userdata('user_id');
//       $this->load->view('search/search_job',$this->data); 
//     }

    public function job_search()
     {
      // echo "hii";        // Retrieve the posted search term.
       //echo "<pre>";print_r($_POST);die();
      $userid = $this->session->userdata('aileenuser');
       $this->data['userid'] = $userid = $this->session->userdata('aileenuser');
        // $this->data['recdata'] = $this->common->select_data_by_id('recruiter','user_id', $userid, $data = '*', $join_str = array());


          $search_job = trim($this->input->post('skills')); 
          $this->data['keyword']=$search_job; 
         // print_r($search_job);   die();
        // $searchskill = implode(',',$search_skill);
        
          $search_place = $this->input->post('searchplace'); 

      $cache_time  =  $this->db->get_where('cities',array('city_id' => $search_place[0]))->row()->city_name; 
      
      $this->data['keyword1']=$cache_time ;


       $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
         $this->data['city'] = $city = $this->common->select_data_by_condition('job_reg', $contition_array, $data = 'city_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           
    
          //echo "hi"; die();
                      $data = array(

                        'search_keyword' => $search_job,
                         'search_location' => $search_place[0],
                         'user_location' =>  $city[0]['city_id'] ,
                         'user_id'=> $userid,
                         'created_date' => date('Y-m-d h:i:s',time()),
                         'status'=> 1
                ); 

                     //  echo"<pre>"; print_r($data); die();
                  
        $insert_id =   $this->common->insert_data_getid($data,'search_info'); 


      if($this->input->post('skills') == ""){ //echo "hrllo"; echo  $search_place; die();//echo  $search_place; die();
           $contition_array = array(' city' => $search_place[0], 're_status' =>'1');
            
             $join_str[0]['table'] = 'recruiter';
             $join_str[0]['join_table_id'] = 'recruiter.user_id';
             $join_str[0]['from_table_id'] = 'rec_post.user_id';
             $join_str[0]['join_type'] = '';

         $unique= $this->data['results'] =  $this->common->select_data_by_condition('rec_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby);

       // echo '<pre>'; print_r($this->data['results']); die();
        // $unique[] = $results;
        //$this->data['falguni'] = 1;

    }elseif($this->input->post('searchplace') == ""){ 
      // echo "hello";

      $contition_array = array('is_delete' => '0', 'status' =>'1');

         $search_condition = "(skill LIKE '%$search_job%')";
          
         $skilldata=$artdata['data'] = $this->common->select_data_by_search('skill', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
           // echo "<pre>"; print_r($artdata['data']); 
          $contition_array = array('status'=>'1');
         $recdata=$userdata['data'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
          // echo "<pre>"; print_r($recdata); 

           foreach ($skilldata as $key) {
                  $id=$key['skill_id'];    
              // echo $id; echo "<br>";
             foreach ($recdata as $postskill) {
                $skill=explode(',', $postskill['post_skill']);;

               
                if (in_array($id,$skill))
                {
                // echo "Match found"; echo "</br>";
                // echo $postskill['post_id'];
                $recskillpost[] = $postskill; 
               
                }
                
             }

           }

              //echo "<pre>"; print_r($recskillpost);
           $this->data['rec_skill'] = $recskillpost;
        //  echo "<pre>"; print_r( $this->data['rec_skill']);  die();

      //$contion_array = array('post_name=' => $search_job );


             $join_str[0]['table'] = 'recruiter';
             $join_str[0]['join_table_id'] = 'recruiter.user_id';
             $join_str[0]['from_table_id'] = 'rec_post.user_id';
             $join_str[0]['join_type'] = '';

             $data='rec_post.post_name,rec_post.post_description,rec_post.post_skill,rec_post.post_position,rec_post.post_last_date,rec_post.min_month,rec_post.min_year,rec_post.min_sal,rec_post.max_sal,rec_post.other_skill,rec_post.user_id,rec_post.post_id,rec_post.country,rec_post.city,rec_post.interview_process';

              $search_condition = "(rec_post.post_name LIKE '%$search_job%' or rec_post.max_sal LIKE '%$search_job%' or rec_post.min_sal LIKE '%$search_job%' or  recruiter.re_comp_name LIKE '%$search_job%' or recruiter.rec_firstname LIKE '%$search_job%' or recruiter.rec_lastname LIKE '%$search_job%' or rec_post.other_skill LIKE '%$search_job%' )";
          
         $results=$recpostdata['data'] = $this->common->select_data_by_search('rec_post', $search_condition, $contition_array = array(), $data , $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
           //echo "<pre>"; print_r($results);die();


      //     $search_condition = "(rec_firstname LIKE '%$search_job%' or rec_lastname LIKE '%$search_job%')";
      // $contion_array = array('post_name=' => $search_job );
          
      //    $resultsrecruiter = $this->common->select_data_by_search('recruiter', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
      //      // echo "<pre>"; print_r($resultsrecruiter); 


         foreach($recskillpost as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;

                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['post_id']] = $value;
              }


         
   if(count($new)  == 0){
     // echo "hello";
              $unique=$results;
                //echo count($unique) . "<br>"; die();
                 // echo "<pre>"; print_r($unique); die();

          }else{
              $unique=array_merge($new,$results);
            // echo "<pre>"; print_r($unique); die(); 

          }
       
  
   // echo "<pre>"; print_r($unique); die();

     }

     else 
      {

       $search_job = $this->input->post('skills'); 
        //echo $search_job;
       

       $search_place = $this->input->post('searchplace'); 
       // print_r($search_place); die();


      $contition_array = array('is_delete' => '0', 'status' =>'1');

         $search_condition = "(skill LIKE '%$search_job%')";
          
         $skilldata=$artdata['data'] = $this->common->select_data_by_search('skill', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
           // echo "<pre>"; print_r($artdata['data']); 
          $contition_array = array('status'=>'1', 'city' => $search_place[0] );


         $recdata=$userdata['data'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
          // echo "<pre>"; print_r($recdata); 

           foreach ($skilldata as $key) {
                  $id=$key['skill_id'];    
              // echo $id; echo "<br>";
             foreach ($recdata as $postskill) {
                $skill=explode(',', $postskill['post_skill']);;

               
                if (in_array($id,$skill))
                {
                // echo "Match found"; echo "</br>";
                // echo $postskill['post_id'];
                $recskillpost[] = $postskill; 
               
                }
                
             }

           }

              //echo "<pre>"; print_r($recskillpost);
           $this->data['rec_skill'] = $recskillpost;
        //  echo "<pre>"; print_r( $this->data['rec_skill']);  die();


          
      //$contion_array = array('post_name=' => $search_job );


             $join_str[0]['table'] = 'recruiter';
             $join_str[0]['join_table_id'] = 'recruiter.user_id';
             $join_str[0]['from_table_id'] = 'rec_post.user_id';
             $join_str[0]['join_type'] = '';

             $data='rec_post.post_name,rec_post.post_description,rec_post.post_skill,rec_post.post_position,rec_post.post_last_date,rec_post.min_month,rec_post.min_year,rec_post.min_sal,rec_post.max_sal,rec_post.other_skill,rec_post.user_id';

              $search_condition = "(rec_post.post_name LIKE '%$search_job%' or rec_post.max_sal LIKE '%$search_job%' or rec_post.min_sal LIKE '%$search_job%' or  recruiter.re_comp_name LIKE '%$search_job%' or recruiter.rec_firstname LIKE '%$search_job%' or recruiter.rec_lastname LIKE '%$search_job%')";
          
         $results=$recpostdata['data'] = $this->common->select_data_by_search('rec_post', $search_condition, $contition_array, $data , $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
          // echo "<pre>"; print_r($results);die();


      //     $search_condition = "(rec_firstname LIKE '%$search_job%' or rec_lastname LIKE '%$search_job%' or re_comp_name LIKE '%$search_job%')";
      // $contion_array = array('post_name=' => $search_job,);
          
      //    $resultsrecruiter = $this->common->select_data_by_search('recruiter', $search_condition, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str=array(), $groupby = '');
      //      //echo "<pre>"; print_r($resultsrecruiter); 


         foreach($recskillpost as $ke => $arr) 
          {  
                
                      
                  $postdata[] = $arr;
                
          }
//die();
          // echo '<pre>'; print_r($postdata); die();

               $new = array();
              foreach ($postdata as $value)
              {
                  $new[$value['post_id']] = $value;
              }


          
   
   if(count($new)  == 0){
    // echo "hello";
              $unique=$results;

          }
          else
          {
              $unique=array_merge($new,$results);

          }    
    //echo "<pre>"; print_r($unique); die();
       
     }


      //echo "<pre>"; print_r($unique); die();

      $this->data['postdetail'] = $unique;

       // echo "<pre>"; print_r($this->data['postdetail']); die();


// code for search
         $contition_array = array('re_status' => '1');

         $results_recruiter= $this->data['results'] =  $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
         // echo "<pre>"; print_r($results_recruiter);die();

            $contition_array = array('status' => '1');

         $results_post= $this->data['results'] =  $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name,other_skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

           // echo "<pre>"; print_r($results_post);die();

          $contition_array = array('status' => '1', 'type' => '1');

         $skill= $this->data['results'] =  $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
           // echo "<pre>"; print_r($skill);die();
   // $return_array = array(); 
   //        //  //echo  $return_array;
         
   //           foreach ($artdata as $get) {
   //               $return = array();
   //               $return = $get;
           
                 
   //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
   //                            unset($return['art_name']);
   //               unset($return['art_lastname']);

   //               array_push($return_array, $return);
   //             //echo $returnarray; 

   //           }
      
         // $contition_array = array('status' => '1');

         // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

         
       

          $uni=array_merge($results_recruiter,$results_post,$skill);
      //   echo count($unique);
         

          foreach($uni as $key=>$value){
          foreach($value as $ke=>$val){
            if($val != ""){


            $result[] = $val;
          }
          }
          }

        foreach($result as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);

      

        $this->load->view('job/job_all_post1',$this->data);
    }



// job search end     
       
 } 
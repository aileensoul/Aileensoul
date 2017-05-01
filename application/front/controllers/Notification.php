<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Notification extends MY_Controller {

      public $data;

    public function __construct() {
        parent::__construct();
         $this->load->library('form_validation');
          $this->load->model('email_model'); 

  // if ($this->session->userdata('aileensoul_front') == '') {
  //           redirect('login', 'refresh');
  //       }
        include ('include.php');
     }

    // public function index() {
     
    //     $this->load->view('Notification/index', $this->data);
    // }
public function index(){  

$userid = $this->session->userdata('aileenuser');
// 1-5 notification start
// recruiter notfication start

 
$contition_array = array('notification.not_type' => 3, 'notification.not_to_id' => $userid, 'notification.not_read' => 2,'notification.not_from' => 2,'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'job_apply',
        'join_table_id' => 'notification.not_product_id',
        'from_table_id' => 'job_apply.app_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);

$data = array('notification.*','job_apply.*','user.user_id', 'user.first_name','user.user_image','user.last_name');

$this->data['rec_not'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'app_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');

// recruiter notification end

// job notfication start 

$contition_array = array('notification.not_type' => 4, 'notification.not_to_id' => $userid, 'notification.not_read' => 2,'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'job_apply',
        'join_table_id' => 'notification.not_product_id',
        'from_table_id' => 'job_apply.app_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*',' job_apply.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');

$this->data['job_not'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'app_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');

// job notification end

 // freelancer hire  notification start
 $contition_array = array('notification.not_type' => 3,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2,'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');

$join_str = array(
    array(
        'join_type' => '',
        'table' => 'freelancer_apply',
        'join_table_id' => 'notification.not_product_id',
        'from_table_id' => 'freelancer_apply.app_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
      );


$data = array('notification.*','freelancer_apply.*','user.user_id', 'user.first_name','user.user_image','user.last_name');

$this->data['hire_not'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'app_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');
 // freelancer hire notification end

// freelancer post notification start

$contition_array = array('notification.not_type' => 4, 'notification.not_from' => 4,  'notification.not_to_id' => $userid, 'notification.not_read' => 2,'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'job_apply',
        'join_table_id' => 'notification.not_product_id',
        'from_table_id' => 'job_apply.app_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*',' job_apply.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');

$this->data['work_post'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'app_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');
// freelancer post notification end

//artistic notification start
// follow notification start
 
 $contition_array = array('notification.not_type' => 8,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2,'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'follow',
        'join_table_id' => 'notification.not_product_id',
        'from_table_id' => 'follow.follow_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*',' follow.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');

$this->data['artfollow'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'follow_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');
// follow notification end

// comment notification start
 
$contition_array = array('notification.not_type' => 6,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2,'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'artistic_post_comment',
        'join_table_id' => 'notification.not_product_id',
    'from_table_id' => 'artistic_post_comment.artistic_post_comment_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*',' artistic_post_comment.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');

$this->data['artcommnet'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'artistic_post_comment_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');
// comment notification end

// like notification start
 $contition_array = array('notification.not_type' => 5,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2,'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'art_post',
        'join_table_id' => 'notification.not_product_id',
    'from_table_id' => 'art_post.art_post_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*','art_post.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');

$this->data['artlike'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'art_post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');

// like notification end
// artistic notification end

// business profile notification start
// follow notification start
 
 $contition_array = array('notification.not_type' => 8,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2,'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'follow',
        'join_table_id' => 'notification.not_product_id',
        'from_table_id' => 'follow.follow_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*','follow.*','user.user_id', 'user.first_name', 'user.user_image','user.last_name');

$this->data['busifollow'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'follow_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');

// follow notification end

// comment notification start

$contition_array = array('notification.not_type' => 6,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2,'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
    'join_type' => '',
    'table' => 'business_profile_post_comment',
    'join_table_id' => 'notification.not_product_id',
    'from_table_id' => 'business_profile_post_comment.business_profile_post_comment_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
      );
$data = array('notification.*','business_profile_post_comment.*','user.user_id','user.first_name','user.user_image','user.last_name');

$this->data['buscommnet'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'business_profile_post_comment_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');

// comment notification end

// like notification start
$contition_array = array('notification.not_type' => 5,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2,'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'business_profile_post',
        'join_table_id' => 'notification.not_product_id',
    'from_table_id' => 'business_profile_post.business_profile_post_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*',' business_profile_post.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');

$this->data['buslike'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'business_profile_post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');
// like notification end

// business profile notification end
// 1-5 notification end


$this->load->view('notification/index', $this->data);
}
//recruiter post for notification start

    public function recruiter_post($id){
     //echo "falguni"; die(); 
      //echo $id; die();
      $this->data['userid'] = $userid = $this->session->userdata('aileenuser');


       $join_str[0]['table'] = 'recruiter';
            $join_str[0]['join_table_id'] = 'recruiter.user_id';
            $join_str[0]['from_table_id'] = 'rec_post.user_id';
            $join_str[0]['join_type'] = '';


            $contition_array = array('rec_post.user_id' => $userid, 'rec_post.is_delete' => 0,'rec_post.post_id' => $id);
            $this->data['postdata'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'rec_post.*,recruiter.rec_firstname,recruiter.re_comp_name,recruiter.rec_lastname', $sortby = 'post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');

           // echo "<pre>"; print_r($this->data['postdata']); die();
       
      $this->load->view('notification/rec_post1' , $this->data); 
  }
// recruiter post for notifiaction end 


   public function rec_profile($id="") {

        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

        if ($id == $userid || $id == '') {
            $this->data['recdata'] = $this->common->select_data_by_id('recruiter', 'user_id', $userid, $data = '*', $join_str = array());
        } else {
            $this->data['recdata'] = $this->common->select_data_by_id('recruiter', 'user_id', $id, $data = '*', $join_str = array());
        }
//echo '<pre>'; print_r( $this->data['recdata']); die();

        $this->load->view('notification/rec_profile', $this->data);
    }

 public function rec_post($id) { 
        //echo "falguni"; die();
        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

        if ($id == $userid || $id == '') {
            //echo "hii"; die();
            $join_str[0]['table'] = 'recruiter';
            $join_str[0]['join_table_id'] = 'recruiter.user_id';
            $join_str[0]['from_table_id'] = 'rec_post.user_id';
            $join_str[0]['join_type'] = '';


            $contition_array = array('rec_post.user_id' => $userid, 'rec_post.is_delete' => 0);
            $this->data['postdata'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'rec_post.*,recruiter.rec_firstname,recruiter.re_comp_name,recruiter.rec_lastname', $sortby = 'post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');
             // echo "<pre>"; print_r($this->data['postdata']); die();

        } else { 
            //echo "hello"; die();
            
            $join_str[0]['table'] = 'recruiter';
            $join_str[0]['join_table_id'] = 'recruiter.user_id';
            $join_str[0]['from_table_id'] = 'rec_post.user_id';
            $join_str[0]['join_type'] = '';

            $contition_array = array('rec_post.user_id' => $id, 'rec_post.is_delete' => 0);
            $this->data['postdata'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'rec_post.*,recruiter.rec_firstname,recruiter.re_comp_name,recruiter.rec_lastname', $sortby = 'post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');
             // echo "<pre>"; print_r($this->data['postdata']); die();
        }
        
       
        $this->load->view('notification/rec_post', $this->data);
    }

  
//artistic display post from notifiacation  start 


public function art_post($id){ 
     
            $userid = $this->session->userdata('aileenuser');
            $user_name = $this->session->userdata('user_name');
            // $id= $this->input->post('postid');
             //echo $id; die();
        
            //echo $userid;die();
            //$contition_array = array( 'user_id' => $userid);

           
              $contition_array = array('art_post_id' => $id, 'art_post.status' =>'1');
             // $this->data['artisticdata'] =  $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

 //echo "<pre>";print_r($this->data['artisticdata']);die();

             $join_str[0]['table'] = 'user';
             $join_str[0]['join_table_id'] = 'user.user_id';
             $join_str[0]['from_table_id'] = 'art_post.user_id';
             $join_str[0]['join_type'] = '';

            $data = 'art_post.*,user.first_name,user.last_name';

           $this->data['artdata'] = $this->common->select_data_by_condition('art_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
            //$data['result'] = $this->common->select_art_post();
          //echo $artdata[0]['art_post_id']; die();
           //echo "<pre>";print_r($this->data['artdata']);die();
            $this->load->view('notification/art_post', $this->data);
        }

//artistics post end
 //business_profile notification post start


         public function business_post($id){
        
            $userid = $this->session->userdata('aileenuser');
            $user_name = $this->session->userdata('user_name'); 
            //$contition_array = array( 'user_id' => $userid);

             $join_str[0]['table'] = 'user';
             $join_str[0]['join_table_id'] = 'user.user_id';
             $join_str[0]['from_table_id'] = 'business_profile_post.user_id';
             $join_str[0]['join_type'] = '';

            $data = 'business_profile_post.*,user.user_name';

            $contition_array = array('user_id' => $id, 'status' =>'1' );
             $this->data['businessdata'] =  $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

             //echo "<pre>"; print_r( $this->data['businessdata']);die();
           $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');

           //echo "<pre>"; print_r($this->data['business_profile_data']);die();
            //$data['result'] = $this->common->select_art_post();
          //echo $artdata[0]['art_post_id']; die();
            $this->load->view('notification/business_post',$this->data);
        }
    //business _profile notification post end 
        
        public function select_req() 
{
        $userid = $this->session->userdata('aileenuser');
       
            $contition_array = array('not_read' => 2,'not_to_id'=> $userid);
            $result = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            
         //echo '<pre>'; print_r($result); 
           $count = count($result); 
           echo $count;
}

public function update_req()
{
        $userid = $this->session->userdata('aileenuser');
        
       //echo "<pre>"; print_r($data); die();

          $contition_array = array('not_read' => 2,'not_to_id'=> $userid);
            $result = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $data = array(
                'not_read' => 1
                 ); 
            // echo "<pre>"; print_r($result);die();

            foreach($result as $cnt)
            {     $updatedata =   $this->common->update_data($data,'notification','not_id',$cnt['not_id']);                     
                                               
            }
           
         //echo '<pre>'; print_r($result); 
           $count = count($updatedata); 
           echo $count;

}


public function recnot($id=" ")
{
        $userid = $this->session->userdata('aileenuser');
        
       //echo "<pre>"; print_r($data); die();

          $contition_array = array('not_read' => 2,'not_to_id'=> $userid);
        $result = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $data = array(
                'not_read' => 1
                 ); 
            // echo "<pre>"; print_r($result);die();

            foreach($result as $cnt)
            {     $updatedata =   $this->common->update_data($data,'notification','not_id',$cnt['not_id']);                     
                                               
            }
           
         //echo '<pre>'; print_r($result); 
           $count = count($updatedata); 
           echo $count;

}

//artistic display post from notifiacation  start


//Notification count select & update for apply,save,like,comment,contact and follow start
public function select_notification() 
{ //echo "hello"; die();
        $userid = $this->session->userdata('aileenuser');
    $contition_array = array('not_read' => 2,'not_to_id'=> $userid, 'not_type !=' => 1, 'not_type !=' => 2);
            $result = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            
         //echo '<pre>'; print_r($result); 
           $count = count($result); 
           echo $count;
}


public function update_notification()
{
        $userid = $this->session->userdata('aileenuser');
        
       //echo "<pre>"; print_r($data); die();

         $contition_array = array('not_read' => 2,'not_to_id'=> $userid, 'not_type !=' => 1, 'not_type !=' => 2);
            $result = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $data = array(
                'not_read' => 1
                 ); 
            // echo "<pre>"; print_r($result);die();

            foreach($result as $cnt)
            {     $updatedata =   $this->common->update_data($data,'notification','not_id',$cnt['not_id']);                     
                                               
            }
           
         //echo '<pre>'; print_r($result); 
           $count = count($updatedata); 
           echo $count;

}
//Notification count select & update for apply,save,like,comment,contact and follow End

//Notification count select & update for Message start
public function select_msg_noti() 
{ //echo "hello"; die();
        $userid = $this->session->userdata('aileenuser');
    $contition_array = array('not_read' => 2,'not_to_id'=> $userid, 'not_type' => 2);
            $result = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            
         //echo '<pre>'; print_r($result); 
           $count = count($result); 
           echo $count;
}


public function update_msg_noti()
{
        $userid = $this->session->userdata('aileenuser');
        
       //echo "<pre>"; print_r($data); die();

         $contition_array = array('not_read' => 2,'not_to_id'=> $userid, 'not_type' => 2);
            $result = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $data = array(
                'not_read' => 1
                 ); 
            // echo "<pre>"; print_r($result);die();

            foreach($result as $cnt)
            {     $updatedata =   $this->common->update_data($data,'notification','not_id',$cnt['not_id']); 
             }
           
         //echo '<pre>'; print_r($result); 
           $count = count($updatedata); 
           echo $count;

}
//Notification count select & update for Message End
        
        
}
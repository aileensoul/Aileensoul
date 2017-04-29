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

// recruiter notfication start 

$contition_array = array('notification.not_type' => 3, 'notification.not_to_id' => $userid, 'notification.not_read' => 2,'notification.not_from' => 2);
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

 // freelancer hire  notification start
 $contition_array = array('notification.not_type' => 3,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);

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

// artistic notification start
// follow notification start
 
 $contition_array = array('notification.not_type' => 8,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);
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
 
$contition_array = array('notification.not_type' => 6,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);
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
 $contition_array = array('notification.not_type' => 5,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);
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
$data = array('notification.*',' art_post.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');

$this->data['artlike'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'art_post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');

// like notification end
// artistic notification end

// business profile notification start
// follow notification start
 
 $contition_array = array('notification.not_type' => 8,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);
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

$this->data['artfollow'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'follow_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');

// follow notification end

// comment notification start

$contition_array = array('notification.not_type' => 6,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);
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

//echo '<pre>'; print_r($this->data['buscommnet']); die();
// comment notification end

// like notification start
 $contition_array = array('notification.not_type' => 5,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);
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

$this->load->view('notification/index', $this->data);
}

}
<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Blog extends CI_Controller {

   
    public function __construct() 
    {
        parent::__construct();

        include ('include.php'); 
    }
     
    //MAIN INDEX PAGE START   
    public function index()
    { 
        //FOR GETTING ALL DATA
        $condition_array = array('status !=' => 'delete');
        $this->data['blog_detail']  = $this->common->select_data_by_condition('blog', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit, $offset, $join_str = array());

          $this->load->view('blog/index',$this->data);
     
    }
    //MAIN INDEX PAGE END   

    //READ MORE CLICK START
    public function read_more($id)
    { 
        echo $id;die();

    }
    //READ MORE CLICK END

  }  
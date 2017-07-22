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

        //FOR GETTING 5 LAST DATA
        $condition_array = array('status !=' => 'delete');
        $this->data['blog_last']  = $this->common->select_data_by_condition('blog', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit=5, $offset, $join_str = array());

          $this->load->view('blog/index',$this->data);
     
    }
    //MAIN INDEX PAGE END   

    //READ MORE CLICK START
    public function read_more()
    { 
        
        $id=$_POST['blog_id'];

        //FOR INSERT READ MORE BLOG START
        $data = array(
                    'blog_id' => $id,
                    'visiter_date' => date('Y-m-d H:i:s')
                ); 
         $insert_id = $this->common->insert_data_getid($data, 'blog_visit');
               
         //FOR INSERT READ MORE BLOG END

        if ($insert_id) 
        {
            echo 1;
        } 
        else 
        {
            echo 0;
        }

    }
    //READ MORE CLICK END

    //BLOGDETAIL FOR PERICULAR ONE POST START
    public function blogdetail($id)
    { 
         //FOR GETTING ALL DATA
        $condition_array = array('status !=' => 'delete');
        $this->data['blog_all']  = $this->common->select_data_by_condition('blog', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit, $offset, $join_str = array());
      
        //FOR GETTING BLOG
        $condition_array = array('status !=' => 'delete','id' => $id);
        $this->data['blog_detail']  = $this->common->select_data_by_condition('blog', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit, $offset, $join_str = array());
      
         //FOR GETTING 5 LAST DATA
        $condition_array = array('status !=' => 'delete');
        $this->data['blog_last']  = $this->common->select_data_by_condition('blog', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit=5, $offset, $join_str = array());

         $this->load->view('blog/blogdetail',$this->data);
    }
     //BLOGDETAIL FOR PERICULAR ONE POST END

    public function comment_insert()
    {
        $id=$_POST['blog_id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];
        //FOR INSERT READ MORE BLOG START
        $data = array(

                    'blog_id' => $id,
                    'name'=>$name,
                    'email'=>$email,
                    'message'=>$message,
                    'comment_date' => date('Y-m-d H:i:s'),
                    'status'=>'pending'
                ); 
         $insert_id = $this->common->insert_data_getid($data, 'blog_comment');
               
         //FOR INSERT READ MORE BLOG END

        if ($insert_id) 
        {
            echo 1;
        } 
        else 
        {
            echo 0;
        }
    }
  }  
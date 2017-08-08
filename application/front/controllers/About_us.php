<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class About_us extends CI_Controller {

   

    public function __construct() 
    {
        parent::__construct();

        include ('include.php'); 
    }
        
    public function index()
    { 
        $contition_array = array('page_id' => '2', 'page_status' => '1');
        $data='page_name,page_title,short_description,page_description,seo_title,seo_keywords,seo_description';
        $this->data['page_aboutus'] = $this->common->select_data_by_condition('pages', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
       // echo "<pre>"; print_r($this->data['page_aboutus']);die();
          $this->load->view('about_us/index', $this->data);
     
    }

  }
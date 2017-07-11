<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Job extends CI_Controller {

    public $data;

public function __construct()
{

        parent::__construct();


        // Get Site Information

        $this->data['title'] = 'Job Management | Aileensoul';
        $this->data['module_name'] = 'Job Management';

         //Loadin Pagination Custome Config File
         $this->config->load('paging', TRUE);
         $this->paging = $this->config->item('paging');

        include('include.php');

}


public function user() 
{

// This is userd for pagination offset and limoi start
          $limit = $this->paging['per_page'];
        if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {

            $offset = ($this->uri->segment(5) != '') ? $this->uri->segment(5) : 0;

            $sortby = $this->uri->segment(3);

            $orderby = $this->uri->segment(4);

        } else {

            $offset = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : 0;

            $sortby = 'job_id';

            $orderby = 'asc';

        }
  
        $this->data['offset'] = $offset;

       $data='job_id,fname,lname,email,phnno,gender,country_id,state_id,city_id,status,created_date,modified_date,job_user_image';
       $contition_array = array('is_delete' => '0');
        $this->data['users'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str = array(), $groupby = '');
// This is userd for pagination offset and limoi End

       // echo "<pre>";print_r($this->userdata['users'] );die();

        //This if and else use for asc and desc while click on any field start
        if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {

            $this->paging['base_url'] = site_url("job/user/" . $short_by . "/" . $order_by);

        } else {

            $this->paging['base_url'] = site_url("job/user/");

        }

        if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {

            $this->paging['uri_segment'] = 5;

        } else {

            $this->paging['uri_segment'] = 3;

        }
        //This if and else use for asc and desc while click on any field End


        $contition_array = array( 'is_delete =' => '0');
        $this->paging['total_rows'] = count($this->common->select_data_by_condition('job_reg', $contition_array, 'job_id'));

        $this->data['total_rows'] = $this->paging['total_rows'];

        $this->data['limit'] = $limit;

        $this->pagination->initialize($this->paging);

        $this->data['search_keyword'] = '';


        $this->load->view('job/user', $this->data);
}

//deactivate user with ajax Start
public function deactive_user() 
{
     $job_id = $_POST['job_id'];
      $data = array(
            'status' => 0
        );

        $update = $this->common->update_data($data, 'job_reg', 'job_id', $job_id);
         die();
}
//deactivate user with ajax End

//activate user with ajax Start
public function active_user() 
{
     $job_id = $_POST['job_id'];
      $data = array(
            'status' => 1
        );

        $update = $this->common->update_data($data, 'job_reg', 'job_id', $job_id);
        die();
}
//activate user with ajax End

//Delete user with ajax Start
public function delete_user() 
{
     $job_id = $_POST['job_id'];
      $data = array(
            'is_delete' => 1
        );

        $update = $this->common->update_data($data, 'job_reg', 'job_id', $job_id);
        die();
}
//Delete user with ajax End

public function search() 
{ //print_r($_POST);
      if ($this->input->post('search_keyword')) {
//echo "hi";
          $this->data['search_keyword'] = $search_keyword = $this->input->post('search_keyword');

             // This is userd for pagination offset and limoi start
          $limit = $this->paging['per_page'];
        if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {

            $offset = ($this->uri->segment(5) != '') ? $this->uri->segment(5) : 0;

            $sortby = $this->uri->segment(3);

            $orderby = $this->uri->segment(4);

        } else {

            $offset = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : 0;

            $sortby = 'job_id';

            $orderby = 'asc';

        }
  
        $this->data['offset'] = $offset;

       // $data='job_id,fname,lname,email,phnno,gender,country_id,state_id,city_id,status,created_date,modified_date,job_user_image';
       // $contition_array = array('is_delete' => '0');
       //  $this->data['users'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str = array(), $groupby = '');

        
          $data='job_id,fname,lname,email,phnno,gender,country_id,state_id,city_id,status,created_date,modified_date,job_user_image';
           $search_condition = "(fname LIKE '%$search_keyword%' OR email LIKE '%$search_keyword%')";
            $contition_array = array('is_delete' => '0');
            $this->data['users'] = $this->common->select_data_by_search('job_reg', $search_condition, $contition_array,$data, $sortby, $orderby, $limit, $offset);
           // echo "<pre>";print_r( $this->data['users']);die();
// This is userd for pagination offset and limoi End

       // echo "<pre>";print_r($this->userdata['users'] );die();

        //This if and else use for asc and desc while click on any field start
        if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {

            $this->paging['base_url'] = site_url("job/user/" . $short_by . "/" . $order_by);

        } else {

            $this->paging['base_url'] = site_url("job/user/");

        }

        if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {

            $this->paging['uri_segment'] = 5;

        } else {

            $this->paging['uri_segment'] = 3;

        }
        //This if and else use for asc and desc while click on any field End


        $contition_array = array( 'is_delete =' => '0');
        $this->paging['total_rows'] = count($this->common->select_data_by_condition('job_reg', $contition_array, 'job_id'));

        $this->data['total_rows'] = $this->paging['total_rows'];

        $this->data['limit'] = $limit;

        $this->pagination->initialize($this->paging);


    }

        $this->load->view('job/user', $this->data);
}

}

/* End of file welcome.php 

/* Location: ./application/controllers/welcome.php */
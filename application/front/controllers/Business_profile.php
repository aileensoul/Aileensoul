<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Business_profile extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('email_model');
        $this->lang->load('message', 'english');
        $this->load->helper('smiley');
        include ('include.php');
    }

    public function index() {

        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'status' => '0');
        $businessdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        if ($businessdata) {

            $this->load->view('business_profile/reactivate', $this->data);
        } else {
            $userid = $this->session->userdata('aileenuser');

            $contition_array = array('user_id' => $userid, 'is_deleted' => '0', 'status' => '1');
            $userdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('status' => 1);
            $this->data['countries'] = $this->common->select_data_by_condition('countries', $contition_array, $data = '*', $sortby = 'country_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //for gxetting state data
            $contition_array = array('status' => 1);
            $this->data['states'] = $this->common->select_data_by_condition('states', $contition_array, $data = '*', $sortby = 'state_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            //for getting city data
            $contition_array = array('status' => 1);
            $this->data['cities'] = $this->common->select_data_by_condition('cities', $contition_array, $data = '*', $sortby = 'city_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if (count($userdata) > 0) {

                if ($userdata[0]['business_step'] == 1) {
                    redirect('business_profile/contact_information', refresh);
                } else if ($userdata[0]['business_step'] == 2) {
                    redirect('business_profile/description', refresh);
                } else if ($userdata[0]['business_step'] == 3) {
                    redirect('business_profile/image', refresh);
                } else if ($userdata[0]['business_step'] == 4) {
                    //redirect('business_profile/addmore', refresh);
                    redirect('business_profile/business_profile_post', refresh);
                } else if ($userdata[0]['business_step'] == 5) {
                    redirect('business_profile/business_profile_post', refresh);
                }
            } else {
                $this->load->view('business_profile/business_info', $this->data);
            }
        }
    }

    public function ajax_data() {

        //dependentacy industrial and sub industriyal start


        if (isset($_POST["industry_id"]) && !empty($_POST["industry_id"])) {
            //Get all state data
            $contition_array = array('industry_id' => $_POST["industry_id"], 'status' => 1);
            $subindustriyaldata = $this->data['subindustriyaldata'] = $this->common->select_data_by_condition('sub_industry_type', $contition_array, $data = '*', $sortby = 'sub_industry_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            //Count total number of rows
            //Display sub industiyal list
            if (count($subindustriyaldata) > 0) {
                echo '<option value="">Select Sub Industrial</option>';
                foreach ($subindustriyaldata as $st) {
                    echo '<option value="' . $st['sub_industry_id'] . '">' . $st['sub_industry_name'] . '</option>';
                }
            } else {
                echo '<option value="">Subindustriyal not available</option>';
            }
        }

        // dependentacy industrial and sub industriyal end  


        if (isset($_POST["country_id"]) && !empty($_POST["country_id"])) {
            //Get all state data
            $contition_array = array('country_id' => $_POST["country_id"], 'status' => 1);
            $state = $this->data['states'] = $this->common->select_data_by_condition('states', $contition_array, $data = '*', $sortby = 'state_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //Count total number of rows
            //Display states list
            if (count($state) > 0) {
                echo '<option value="">Select state</option>';
                foreach ($state as $st) {
                    echo '<option value="' . $st['state_id'] . '">' . $st['state_name'] . '</option>';
                }
            } else {
                echo '<option value="">State not available</option>';
            }
        }

        if (isset($_POST["state_id"]) && !empty($_POST["state_id"])) {
            //Get all city data
            $contition_array = array('state_id' => $_POST["state_id"], 'status' => 1);
            $city = $this->data['city'] = $this->common->select_data_by_condition('cities', $contition_array, $data = '*', $sortby = 'city_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            //Display cities list
            if (count($city) > 0) {
                echo '<option value="">Select city</option>';
                foreach ($city as $cit) {
                    echo '<option value="' . $cit['city_id'] . '">' . $cit['city_name'] . '</option>';
                }
            } else {
                echo '<option value="">City not available</option>';
            }
        }
    }

    public function business_information_update() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('status' => 1);
        $this->data['countries'] = $this->common->select_data_by_condition('countries', $contition_array, $data = '*', $sortby = 'country_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('user_id' => $userid, 'is_deleted' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //for getting state data
        $contition_array = array('status' => '1', 'country_id' => $userdata[0]['country']);
        $this->data['states'] = $this->common->select_data_by_condition('states', $contition_array, $data = '*', $sortby = 'state_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        // echo "<pre>";print_r($this->data['states']);echo "</pre>";die();
        //for getting city data
        $contition_array = array('status' => '1', 'state_id' => $userdata[0]['state']);
        $this->data['cities'] = $this->common->select_data_by_condition('cities', $contition_array, $data = '*', $sortby = 'city_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($userdata) {
            $step = $userdata[0]['business_step'];

            if ($step == 1 || $step > 1) {

                $this->data['country1'] = $userdata[0]['country'];
                $this->data['state1'] = $userdata[0]['state'];
                $this->data['city1'] = $userdata[0]['city'];
                $this->data['companyname1'] = $userdata[0]['company_name'];
                $this->data['pincode1'] = $userdata[0]['pincode'];
                $this->data['address1'] = $userdata[0]['address'];
            }
        }


// code for search
        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

        $contition_array = array('status' => '1');
        $citiesss = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($citiesss as $key1) {

            $location[] = $key1['city_name'];
        }
        // echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = $loc;
        $this->data['demo'] = array_values($result1);
        $this->load->view('business_profile/business_info', $this->data);
    }

//business automatic retrieve controller start
    public function business() {
        $json = [];


        if (!empty($this->input->get("q"))) {
            $this->db->like('skill', $this->input->get("q"));
            $query = $this->db->select('skill_id as id,skill as text')
                    ->limit(10)
                    ->get("skill");
            $json = $query->result();
        }


        echo json_encode($json);
    }

//business automatic retrieve controller End
    // business prodile slug start

    public function setcategory_slug($slugname, $filedname, $tablename, $notin_id = array()) {
        $slugname = $oldslugname = $this->create_slug($slugname);
        $i = 1;
        while ($this->comparecategory_slug($slugname, $filedname, $tablename, $notin_id) > 0) {
            $slugname = $oldslugname . '-' . $i;
            $i++;
        }return $slugname;
    }

    public function comparecategory_slug($slugname, $filedname, $tablename, $notin_id = array()) {
        $this->db->where($filedname, $slugname);
        if (isset($notin_id) && $notin_id != "" && count($notin_id) > 0 && !empty($notin_id)) {
            $this->db->where($notin_id);
        }
        $num_rows = $this->db->count_all_results($tablename);
        return $num_rows;
    }

    public function create_slug($string) {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(stripslashes($string)));
        $slug = preg_replace('/[-]+/', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }

    // business slug end

    public function business_information_insert() {


        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        if ($this->input->post('next')) {

            $this->form_validation->set_rules('companyname', 'Company Name', 'required');

            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('state', 'state', 'required');

            $this->form_validation->set_rules('business_address', 'Address', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('business_profile/business_info');
            }

            //get data by id only

            $contition_array = array('user_id' => $userid, 'is_deleted' => '0', 'status' => '1');
            $userdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



            $companyname = $this->input->post('companyname');

            if ($userdata) {
                $data = array(
                    'company_name' => $this->input->post('companyname'),
                    'country' => $this->input->post('country'),
                    'state' => $this->input->post('state'),
                    'city' => $this->input->post('city'),
                    'pincode' => $this->input->post('pincode'),
                    'address' => $this->input->post('business_address'),
                    'user_id' => $userid,
                    'business_slug' => $this->setcategory_slug($companyname, 'business_slug', 'business_profile'),
                    'modified_date' => date('Y-m-d', time()),
                    'status' => 1,
                    'is_deleted' => 0
                );

                $updatdata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);
                if ($updatdata) {

                    $this->session->set_flashdata('success', 'Business information updated successfully');
                    redirect('business_profile/contact_information', refresh);
                } else {
                    $this->session->flashdata('error', 'Sorry!! Your data not inserted');
                    redirect('business_profile', refresh);
                }
            } else {

                $data = array(
                    'company_name' => $this->input->post('companyname'),
                    'country' => $this->input->post('country'),
                    'state' => $this->input->post('state'),
                    'city' => $this->input->post('city'),
                    'pincode' => $this->input->post('pincode'),
                    'address' => $this->input->post('business_address'),
                    'user_id' => $userid,
                    'business_slug' => $this->setcategory_slug($companyname, 'business_slug', 'business_profile'),
                    'created_date' => date('Y-m-d H:i:s', time()),
                    'status' => 1,
                    'is_deleted' => 0,
                    'business_step' => 1
                );



                $insert_id = $this->common->insert_data_getid($data, 'business_profile');
                if ($insert_id) {


                    $this->session->set_flashdata('success', 'Business information updated successfully');
                    redirect('business_profile/contact_information', refresh);
                } else {
                    $this->session->flashdata('error', 'Sorry!! Your data not inserted');
                    redirect('business_profile', refresh);
                }
            }
        }
    }

    public function contact_information() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $userid, 'is_deleted' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['business_step'];

            if ($step == 2 || $step > 2 || ($step >= 1 && $step <= 2)) {
                $this->data['contactname1'] = $userdata[0]['contact_person'];
                $this->data['contactmobile1'] = $userdata[0]['contact_mobile'];
                $this->data['contactemail1'] = $userdata[0]['contact_email'];
                $this->data['contactwebsite1'] = $userdata[0]['contact_website'];
            }
        }


        // code for search
        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);

        $this->load->view('business_profile/contact_info', $this->data);
    }

    public function contact_information_insert() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End


        if ($this->input->post('previous')) {
            redirect('business_profile', refresh);
        }


        $this->form_validation->set_rules('contactname', 'Contact person', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('business_profile/contact_info');
        } else {


            $contition_array = array('user_id' => $userid, 'status' => '1');
            $userdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($userdata[0]['business_step'] == 4) {
                $data = array(
                    'contact_person' => $this->input->post('contactname'),
                    'contact_mobile' => $this->input->post('contactmobile'),
                    'contact_email' => $this->input->post('email'),
                    'contact_website' => $this->input->post('contactwebsite'),
                    'modified_date' => date('Y-m-d', time()),
                        //'business_step' => 2
                );
            } else {

                $data = array(
                    'contact_person' => $this->input->post('contactname'),
                    'contact_mobile' => $this->input->post('contactmobile'),
                    'contact_email' => $this->input->post('email'),
                    'contact_website' => $this->input->post('contactwebsite'),
                    'modified_date' => date('Y-m-d', time()),
                    'business_step' => 2
                );
            }
            $updatdata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);


            if ($updatdata) {
                $this->session->set_flashdata('success', 'Contact information updated successfully');
                redirect('business_profile/description', refresh);
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('business_profile/contact_information', refresh);
            }
        }
    }

    public function check_email() {


        $email = $this->input->post('email');

        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_deleted' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $email1 = $userdata[0]['contact_email'];

        if ($email1) {
            $condition_array = array('is_deleted' => '0', 'user_id !=' => $userid, 'status' => '1', 'business_step' => 4);

            $check_result = $this->common->check_unique_avalibility('business_profile', 'contact_email', $email, '', '', $condition_array);
        } else {

            $condition_array = array('is_deleted' => '0', 'status' => '1', 'business_step' => 4);

            $check_result = $this->common->check_unique_avalibility('business_profile', 'contact_email', $email, '', '', $condition_array);
        }

        if ($check_result) {
            echo 'true';
            die();
        } else {
            echo 'false';
            die();
        }
    }

    public function description() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $userid, 'is_deleted' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('status' => 1);
        $this->data['industriyaldata'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = '*', $sortby = 'industry_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $this->data['businesstypedata'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = '*', $sortby = 'business_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        if ($userdata) {
            $step = $userdata[0]['business_step'];

            if ($step == 3 || ($step >= 1 && $step <= 3) || $step > 3) {
                $this->data['business_type1'] = $userdata[0]['business_type'];
                $this->data['industriyal1'] = $userdata[0]['industriyal'];
                $this->data['subindustriyal1'] = $userdata[0]['subindustriyal'];
                $this->data['business_details1'] = $userdata[0]['details'];
                $this->data['other_business'] = $userdata[0]['other_business_type'];
                $this->data['other_industry'] = $userdata[0]['other_industrial'];
            }
        }
        //cho "<pre>"; print_r($this->data['industriyal1']); die();
        // code for search
        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);


        $this->load->view('business_profile/description', $this->data);
    }

    public function description_insert() {

        $userid = $this->session->userdata('aileenuser');

//if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        if ($this->input->post('next')) {

            $this->form_validation->set_rules('business_type', 'Business Type', 'required');
            $this->form_validation->set_rules('industriyal', 'Industriyal', 'required');

            $this->form_validation->set_rules('business_details', 'Details', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('business_profile/description');
            } else {


                $contition_array = array('user_id' => $userid, 'status' => '1');
                $userdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($userdata[0]['business_step'] == 4) {
                    $data = array(
                        'business_type' => $this->input->post('business_type'),
                        'industriyal' => $this->input->post('industriyal'),
                        'subindustriyal' => $this->input->post('subindustriyal'),
                        'other_business_type' => $this->input->post('bustype'),
                        'other_industrial' => $this->input->post('indtype'),
                        'details' => $this->input->post('business_details'),
                        'modified_date' => date('Y-m-d', time()),
                            //'business_step' => 3
                    );
                } else {
                    $data = array(
                        'business_type' => $this->input->post('business_type'),
                        'industriyal' => $this->input->post('industriyal'),
                        'subindustriyal' => $this->input->post('subindustriyal'),
                        'other_business_type' => $this->input->post('bustype'),
                        'other_industrial' => $this->input->post('indtype'),
                        'details' => $this->input->post('business_details'),
                        'modified_date' => date('Y-m-d', time()),
                        'business_step' => 3
                    );
                }
                $updatdata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);

                if ($updatdata) {
                    $this->session->set_flashdata('success', 'Description updated successfully');
                    redirect('business_profile/image', refresh);
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('business_profile/description', refresh);
                }
            }
        }
    }

    public function image() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $userid, 'is_deleted' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['business_step'];

            if ($step == 4 || ($step >= 1 && $step <= 4) || $step > 4) {
                $contition_array = array('user_id' => $userid, 'is_delete' => '0');
                $this->data['busimage'] = $this->common->select_data_by_condition('bus_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            }
        }
// code for search
        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);
        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();
        $contition_array = array('status' => '1', 'is_delete' => '0');
        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);
        $contition_array = array('status' => '1', 'is_delete' => '0');

        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {
                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);



        $this->load->view('business_profile/image', $this->data);
    }

    public function image_insert() {

        $userdata = $this->session->userdata();
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'status' => '1', 'is_deleted' => '0');

        $busin_step_redirect = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $userid, 'is_deleted' => '0');
        $business_slug = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'business_slug', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $business_slug = $business_slug[0]['business_slug'];

        $count1 = count($this->input->post('filedata'));

        for ($x = 0; $x < $count1; $x++) {
            if ($_POST['filedata'][$x] == 'old') {


                $data = array(
                    'image_name' => $_POST['filename'][$x],
                );
                $updatdata = $this->common->update_data($data, 'bus_image', 'image_id', $_POST['imageid'][$x]);
            }

            if ($_POST['filedata'][$x]) {
                $data = array(
                    'modified_date' => date('Y-m-d', time()),
                    'business_step' => 4
                );

                $updatdata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);
            } else {
                $data = array(
                    'modified_date' => date('Y-m-d', time()),
                    'business_step' => 4
                );

                $updatdata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);
            }
        }


        $contition_array = array('user_id' => $userid, 'is_delete' => '0');
        $userdatacon = $this->common->select_data_by_condition('bus_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        if ($this->input->post('next') || $this->input->post('submit')) {


            // changes start 17-5 

            $config = array(
                'upload_path' => $this->config->item('bus_profile_main_upload_path'),
                'max_size' => 1024 * 100,
                'allowed_types' => 'gif|jpeg|jpg|png'
            );
            $images = array();
            $this->load->library('upload');

            $files = $_FILES;
            $count = count($_FILES['image1']['name']);

            // echo "<pre>"; print_r($count); die();

            for ($i = 0; $i < $count; $i++) {

                $_FILES['image1']['name'] = $files['image1']['name'][$i];
                $_FILES['image1']['type'] = $files['image1']['type'][$i];
                $_FILES['image1']['tmp_name'] = $files['image1']['tmp_name'][$i];
                $_FILES['image1']['error'] = $files['image1']['error'][$i];
                $_FILES['image1']['size'] = $files['image1']['size'][$i];

                $fileName = $_FILES['image1']['name'];
                $images[] = $fileName;
                $config['file_name'] = $fileName;
                // echo $config['file_name'];die();

                $this->upload->initialize($config);
                $this->upload->do_upload();

                if ($this->upload->do_upload('image1')) {

                    // $fileData = $this->upload->data();
                    // $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $response['result'][] = $this->upload->data();
                    $business_profile_post_thumb[$i]['image_library'] = 'gd2';
                    $business_profile_post_thumb[$i]['source_image'] = $this->config->item('bus_profile_main_upload_path') . $response['result'][$i]['file_name'];
                    $business_profile_post_thumb[$i]['new_image'] = $this->config->item('bus_profile_thumb_upload_path') . $response['result'][$i]['file_name'];
                    $business_profile_post_thumb[$i]['create_thumb'] = TRUE;
                    $business_profile_post_thumb[$i]['maintain_ratio'] = TRUE;
                    $business_profile_post_thumb[$i]['thumb_marker'] = '';
                    $business_profile_post_thumb[$i]['width'] = $this->config->item('bus_profile_thumb_width');
                    //$product_thumb[$i]['height'] = $this->config->item('product_thumb_height');
                    $business_profile_post_thumb[$i]['height'] = 2;
                    $business_profile_post_thumb[$i]['master_dim'] = 'width';
                    $business_profile_post_thumb[$i]['quality'] = "100%";
                    $business_profile_post_thumb[$i]['x_axis'] = '0';
                    $business_profile_post_thumb[$i]['y_axis'] = '0';
                    $instanse = "image_$i";
                    //Loading Image Library
                    $this->load->library('image_lib', $business_profile_post_thumb[$i], $instanse);
                    $dataimage = $response['result'][$i]['file_name'];
                    //Creating Thumbnail
                    $this->$instanse->resize();
                    $response['error'][] = $thumberror = $this->$instanse->display_errors();

                    $return['data'][] = $imgdata;
                    $return['status'] = "success";
                    $return['msg'] = sprintf($this->lang->line('success_item_added'), "Image", "uploaded");
                } else {
                    $dataimage = '';
                }



                if ($dataimage) {
//echo $uploadData[$i]['file_name'];
                    $data = array(
                        'image_name' => $dataimage,
                        'user_id' => $userid,
                        'created_date' => date('Y-m-d H:i:s'),
                        'is_delete' => 0
                    );

                    $insert_id = $this->common->insert_data_getid($data, 'bus_image');
                }


                if ($dataimage) {
                    $data = array(
                        'modified_date' => date('Y-m-d', time()),
                        'business_step' => 4
                    );

                    $updatdata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);
                } else {
                    $data = array(
                        'modified_date' => date('Y-m-d', time()),
                        'business_step' => 4
                    );

                    $updatdata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);
                }
            }
            // Multiple Image insert code End
            // changes end 17-5    

            if ($updatdata) {
                $this->session->set_flashdata('success', 'Image updated successfully');

                if ($busin_step_redirect[0]['business_step'] == 4) {
                    if ($business_slug != '') {
                        redirect('business_profile/business_resume/' . $business_slug, refresh);
                    } else {
                        redirect('business_profile/business_resume', refresh);
                    }
                } else {
                    redirect('business_profile/business_profile_post', refresh);
                }
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('business_profile/image', refresh);
            }
        }
    }

//end edit skills


    public function addmore() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $userid, 'is_deleted' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['business_step'];

            if ($step == 5 || ($step >= 1 && $step <= 5) || $step > 5) {
                $this->data['addmore1'] = $userdata[0]['addmore'];
            }
        }

        // code for search
        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {
                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);






        $this->load->view('business_profile/addmore', $this->data);
    }

    public function addmore_insert() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $data = array(
            'addmore' => $this->input->post('addmore'),
            'modified_date' => date('Y-m-d', time()),
            'business_step' => 5
        );

        $updatdata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);

        if ($updatdata) {

            redirect('business_profile/business_profile_post', refresh);
        } else {
            $this->session->flashdata('error', 'Your data not inserted');
            redirect('business_profile/addmore', refresh);
        }
    }

//business_profile_post start

    public function business_profile_post() {

        $userid = $this->session->userdata('aileenuser');

        $user_name = $this->session->userdata('user_name');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End


        $contition_array = array('user_id' => $userid, 'status' => '1', 'business_step' => '4');
        $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>"; print_r($this->data['businessdata']); die(); 

        $business_profile_id = $this->data['businessdata'][0]['business_profile_id'];

        $contition_array = array('is_deleted' => 0, 'status' => 1, 'user_id !=' => $userid, 'business_step' => 4);
        $userlist = $this->data['userlist'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = 'business_profile_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//echo '<pre>';
//print_r($userlist);
//exit;
        //echo $business_profile_id; die();
//userlist for followdata strat
        // using category             
        $industriyal = $this->data['businessdata'][0]['industriyal'];
        foreach ($userlist as $rowcategory) {

            if ($industriyal == $rowcategory['industriyal']) {
                $userlistcategory[] = $rowcategory;
            }
        }

        $this->data['userlistview1'] = $userlistcategory;

//using city 


        $businessregcity = $this->data['businessdata'][0]['city'];

        $contition_array = array('is_deleted' => 0, 'status' => 1, 'user_id !=' => $userid, 'industriyal !=' => $industriyal, 'business_step' => 4);
        $userlist2 = $this->data['userlist2'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = 'business_profile_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        foreach ($userlist2 as $rowcity) {



            if ($businessregcity == $rowcity['city']) {
                $userlistcity[] = $rowcity;
            }
        }

        $this->data['userlistview2'] = $userlistcity;

// using state

        $businessregstate = $this->data['businessdata'][0]['state'];

        $contition_array = array('is_deleted' => 0, 'status' => 1, 'user_id !=' => $userid, 'industriyal !=' => $industriyal, 'city !=' => $businessregcity, 'business_step' => 4);
        $userlist3 = $this->data['userlist3'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = 'business_profile_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        foreach ($userlist3 as $rowstate) {



            if ($businessregstate == $rowstate['state']) {
                $userliststate[] = $rowstate;
            }
        }


        $this->data['userlistview3'] = $userliststate;

// using 3 user 

        $contition_array = array('is_deleted' => 0, 'status' => 1, 'user_id !=' => $userid, 'industriyal !=' => $industriyal, 'city !=' => $businessregcity, 'state !=' => $businessregstate, 'business_step' => 4);
        $userlastview = $this->data['userlastview'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = 'business_profile_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $this->data['userlistview4'] = $userlastview;


//userlist for followdata end
//data fatch using follower start

        $contition_array = array('follow_from' => $business_profile_id, 'follow_status' => '1', 'follow_type' => '2');

        $followerdata = $this->data['followerdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>" ; print_r($this->data['followerdata']); die();

        foreach ($followerdata as $fdata) {

            $contition_array = array('business_profile_id' => $fdata['follow_to'], 'business_step' => 4);

            $this->data['business_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            // echo "<pre>" ; print_r($this->data['business_data']); die();

            $business_userid = $this->data['business_data'][0]['user_id'];
            //echo $business_userid; die();
            $contition_array = array('user_id' => $business_userid, 'status' => '1', 'is_delete' => '0');

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //echo "<pre>"; print_r($this->data['business_profile_data']) ; die();

            $followerabc[] = $this->data['business_profile_data'];
        }
        //echo "<pre>" ; print_r($followerabc); die();
//data fatch using follower end
//data fatch using industriyal start

        $userselectindustriyal = $this->data['businessdata'][0]['industriyal'];

        $contition_array = array('industriyal' => $userselectindustriyal, 'status' => '1', 'business_step' => 4);
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        // echo "<pre>"; print_r( $businessprofiledata); die();



        foreach ($businessprofiledata as $fdata) {


            $contition_array = array('business_profile_post.user_id' => $fdata['user_id'], 'business_profile_post.status' => '1', 'business_profile_post.user_id !=' => $userid, 'is_delete' => '0');

            $this->data['business_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $industriyalabc[] = $this->data['business_data'];
        }
//data fatch using industriyal end
//data fatch using login user last post start

        $condition_array = array('user_id' => $userid, 'status' => '1', 'is_delete' => '0');

        $business_datauser = $this->data['business_datauser'] = $this->common->select_data_by_condition('business_profile_post', $condition_array, $data = '*', $sortby = 'business_profile_post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $userabc[][] = $this->data['business_datauser'][0];



//data fatch using login user last post end
//array merge and get unique value  


        if (count($industriyalabc) == 0 && count($business_datauser) != 0) {

            $unique = $userabc;
        } elseif (count($business_datauser) == 0 && count($industriyalabc) != 0) {
            $unique = $industriyalabc;
        } elseif (count($business_datauser) != 0 && count($industriyalabc) != 0) {
            $unique = array_merge($industriyalabc, $userabc);
        }

        //echo "<pre>"; print_r($unique); die();

        if (count($followerabc) == 0 && count($unique) != 0) {
            $unique_user = $unique;
        } elseif (count($unique) == 0 && count($followerabc) != 0) {
            $unique_user = $followerabc;
        } else {
            $unique_user = array_merge($unique, $followerabc);
        }



        foreach ($unique_user as $ke => $arr) {
            foreach ($arr as $k => $v) {

                $postdata[] = $v;
            }
        }

        $postdata = array_unique($postdata, SORT_REGULAR);


        $new = array();
        foreach ($postdata as $value) {
            $new[$value['business_profile_post_id']] = $value;
        }

        $post = array();

        foreach ($new as $key => $row) {
            $post[$key] = $row['business_profile_post_id'];
        }
        array_multisort($post, SORT_DESC, $new);

        $this->data['businessprofiledatapost'] = $new;

        //echo "<pre>"; print_r($this->data['businessprofiledata']) ; die();
// code for search

        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);
        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);
        // echo '<pre>'; print_r($result); die();

        if ($this->data['businessdata']) {

            $this->load->view('business_profile/business_profile_post', $this->data);
        } else {
            redirect('business_profile/');
        }
    }

    public function business_profile_manage_post($id = "") {

        // manage post start
        $userid = $this->session->userdata('aileenuser');
        $user_name = $this->session->userdata('user_name');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $userid, 'status' => '1');
        $this->data['slug_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $slug_id = $this->data['slug_data'][0]['business_slug'];
        if ($id == $slug_id || $id == '') {

            $contition_array = array('business_slug' => $slug_id, 'status' => '1', 'business_step' => '4');
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'status' => 1, 'is_delete' => '0');
            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = 'business_profile_post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //echo "<pre>"; print_r($this->data['business_profile_data']); die();
        } else {

            $contition_array = array('business_slug' => $id, 'status' => '1', 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'status' => 1, 'is_delete' => '0');


            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = 'business_profile_post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //echo "<pre>"; print_r($this->data['business_profile_data']); die();
        }

        //manage post end
// code for search

        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        foreach ($result as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = $result1;
        // echo '<pre>'; print_r($result1); die();
        //echo "<pre>"; print_r($this->data['business_profile_data']); die();


        if (!$this->data['businessdata1'] && !$this->data['business_profile_data']) { //echo "22222222"; die();
            $this->load->view('business_profile/notavalible');
        } else if ($this->data['businessdata1'][0]['business_step'] != 4) {   //echo "hii"; die();
            redirect('business_profile/');
        } else {
            $this->load->view('business_profile/business_profile_manage_post', $this->data);
        }

        // save post end       
    }

    public function business_profile_deletepost() {

        $id = $_POST["business_profile_post_id"];
        //echo $id; die();
        $data = array(
            'is_delete' => 1,
            'modify_date' => date('Y-m-d', time())
        );


        $updatdata = $this->common->update_data($data, 'business_profile_post', 'business_profile_post_id', $id);

        $dataimage = array(
            'is_deleted' => 0,
            'modify_date' => date('Y-m-d', time())
        );

        //echo "<pre>"; print_r($dataimage); die();
        $updatdata = $this->common->update_data($dataimage, 'post_image', 'post_id', $id);

        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');


        $contition_array = array('user_id' => $userid, 'status' => 1, 'is_delete' => '0');
        $otherdata = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $datacount = count($otherdata);



        if (count($otherdata) == 0) {
            $notfound = '<div class="art_no_post_avl" id="art_no_post_avl">
                                        <h3>Business Post</h3>
                                        <div class="art-img-nn">
                                            <div class="art_no_post_img">

                                                <img src="' . base_url('img/bui-no.png') . '">

                                            </div>
                                            <div class="art_no_post_text">
                                                No Post Available.
                                            </div>
                                        </div>
                                    </div>';

            $notvideo = 'Video Not Available';
            $notaudio = 'Audio Not Available';
            $notpdf = 'Pdf Not Available';
            $notphoto = 'Photo Not Available';
        }

        echo json_encode(
                array(
                    "notfound" => $notfound,
                    "notcount" => $datacount,
                    "notvideo" => $notvideo,
                    "notaudio" => $notaudio,
                    "notpdf" => $notpdf,
                    "notphoto" => $notphoto,
        ));
    }

    public function business_profile_deleteforpost() {



        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

        $id = $_POST["business_profile_post_id"];
        //echo $id; die();
        $data = array(
            'is_delete' => 1,
            'modify_date' => date('Y-m-d', time())
        );

//echo "<pre>"; print_r($data); die();
        $updatdata = $this->common->update_data($data, 'business_profile_post', 'business_profile_post_id', $id);

        $dataimage = array(
            'is_deleted' => 0,
            'modify_date' => date('Y-m-d', time())
        );

        //echo "<pre>"; print_r($dataimage); die();
        $updatdata = $this->common->update_data($dataimage, 'post_image', 'post_id', $id);

// for post count start



        $contition_array = array('user_id' => $userid, 'status' => '1');
        $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>"; print_r($this->data['businessdata']); die(); 

        $business_profile_id = $this->data['businessdata'][0]['business_profile_id'];




        $contition_array = array('follow_from' => $business_profile_id, 'follow_status' => '1', 'follow_type' => '2');

        $followerdata = $this->data['followerdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>" ; print_r($this->data['followerdata']); die();

        foreach ($followerdata as $fdata) {

            $contition_array = array('business_profile_id' => $fdata['follow_to'], 'business_step' => 4);

            $this->data['business_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            // echo "<pre>" ; print_r($this->data['business_data']); die();

            $business_userid = $this->data['business_data'][0]['user_id'];
            //echo $business_userid; die();
            $contition_array = array('user_id' => $business_userid, 'status' => '1', 'is_delete' => '0');

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //echo "<pre>"; print_r($this->data['business_profile_data']) ; die();

            $followerabc[] = $this->data['business_profile_data'];
        }
        //echo "<pre>" ; print_r($followerabc); die();
//data fatch using follower end
//data fatch using industriyal start

        $userselectindustriyal = $this->data['businessdata'][0]['industriyal'];

        $contition_array = array('industriyal' => $userselectindustriyal, 'status' => '1', 'business_step' => 4);
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        // echo "<pre>"; print_r( $businessprofiledata); die();



        foreach ($businessprofiledata as $fdata) {


            $contition_array = array('business_profile_post.user_id' => $fdata['user_id'], 'business_profile_post.status' => '1', 'business_profile_post.user_id !=' => $userid, 'is_delete' => '0');

            $this->data['business_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $industriyalabc[] = $this->data['business_data'];
        }
//data fatch using industriyal end
//data fatch using login user last post start

        $condition_array = array('user_id' => $userid, 'status' => '1', 'is_delete' => '0');

        $business_datauser = $this->data['business_datauser'] = $this->common->select_data_by_condition('business_profile_post', $condition_array, $data = '*', $sortby = 'business_profile_post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $userabc[][] = $this->data['business_datauser'][0];



//data fatch using login user last post end
//array merge and get unique value  


        if (count($industriyalabc) == 0 && count($business_datauser) != 0) {

            $unique = $userabc;
        } elseif (count($business_datauser) == 0 && count($industriyalabc) != 0) {
            $unique = $industriyalabc;
        } elseif (count($business_datauser) != 0 && count($industriyalabc) != 0) {
            $unique = array_merge($industriyalabc, $userabc);
        }

        //echo "<pre>"; print_r($unique); die();

        if (count($followerabc) == 0 && count($unique) != 0) {
            $unique_user = $unique;
        } elseif (count($unique) == 0 && count($followerabc) != 0) {
            $unique_user = $followerabc;
        } else {
            $unique_user = array_merge($unique, $followerabc);
        }



        foreach ($unique_user as $ke => $arr) {
            foreach ($arr as $k => $v) {

                $postdata[] = $v;
            }
        }

        $postdata = array_unique($postdata, SORT_REGULAR);


        $new = array();
        foreach ($postdata as $value) {
            $new[$value['business_profile_post_id']] = $value;
        }

        $post = array();

        foreach ($new as $key => $row) {

            $post[$key] = $row['business_profile_post_id'];
        }
        array_multisort($post, SORT_DESC, $new);

        $otherdata = $new;


// for count end


        if (count($otherdata) > 0) {

            foreach ($otherdata as $row) {
                $userid = $this->session->userdata('aileenuser');
                $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1');
                $businessdelete = $this->data['businessdelete'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $contition_array = array('user_id' => $row['user_id'], 'status' => '1');
                $businessdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $likeuserarray = explode(',', $businessdelete[0]['delete_post']);
                if (!in_array($userid, $likeuserarray)) {
                    
                } else {
                    $count[] = "abc";
                }
            }
        }

        if (count($otherdata) > 0) {
            if (count($count) == count($otherdata)) {

                $datacount = "count";


                $notfound = '<div class="art_no_post_avl" id="art_no_post_avl">
                                        <h3>Business Post</h3>
                                        <div class="art-img-nn">
                                            <div class="art_no_post_img">

                                                <img src="' . base_url('img/bui-no.png') . '">

                                            </div>
                                            <div class="art_no_post_text">
                                                No Post Available.
                                            </div>
                                        </div>
                                    </div>';
            }
        } else {

            $datacount = "count";

            $notfound = '<div class="art_no_post_avl" id="art_no_post_avl">
                                        <h3>Business Post</h3>
                                        <div class="art-img-nn">
                                            <div class="art_no_post_img">

                                                <img src="' . base_url('img/bui-no.png') . '">

                                            </div>
                                            <div class="art_no_post_text">
                                                No Post Available.
                                            </div>
                                        </div>
                                    </div>';
        }

        echo json_encode(
                array(
                    "notfound" => $notfound,
                    "notcount" => $datacount,
        ));
    }

    public function business_profile_addpost() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $userid, 'status' => '1');
        $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $this->load->view('business_profile/business_profile_addpost', $this->data);
    }

    public function business_profile_addpost_insert($id = "", $para = "") {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $para, 'status' => '1');
        $this->data['businessdataposted'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'business_slug', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($para == $userid || $para == '') {
            $data = array(
                'product_name' => $this->input->post('my_text'),
                'product_description' => $this->input->post('product_desc'),
                'created_date' => date('Y-m-d H:i:s', time()),
                'status' => 1,
                'is_delete' => 0,
                'user_id' => $userid
            );
        } else {
            $data = array(
                'product_name' => $this->input->post('my_text'),
                'product_description' => $this->input->post('product_desc'),
                'created_date' => date('Y-m-d H:i:s', time()),
                'status' => 1,
                'is_delete' => 0,
                'user_id' => $para,
                'posted_user_id' => $userid
            );
        }
        //CHECK IF IMAGE POST THEN NAME AND DESCRIPTION IS BLANK THAT TIME POST NOT INSERT AT A TIME.
        if ($_FILES['postattach']['name'][0] != '') {
            // CHECK FILE IS PROPER 
            // if ($data['product_name'] != '' && $data['product_description'] != '') {
            if ($_FILES['postattach']['error'][0] != '1') {
                $insert_id = $this->common->insert_data_getid($data, 'business_profile_post');
            }
        } else {
            $insert_id = $this->common->insert_data_getid($data, 'business_profile_post');
        }
        $config = array(
            'upload_path' => $this->config->item('bus_post_main_upload_path'),
            'allowed_types' => $this->config->item('bus_post_main_allowed_types'),
            'overwrite' => true,
            'remove_spaces' => true);
        $images = array();
        $this->load->library('upload');

        $files = $_FILES;
        $count = count($_FILES['postattach']['name']);
        $title = time();

        if ($_FILES['postattach']['name'][0] != '') {

            for ($i = 0; $i < $count; $i++) {

                $_FILES['postattach']['name'] = $files['postattach']['name'][$i];
                $_FILES['postattach']['type'] = $files['postattach']['type'][$i];
                $_FILES['postattach']['tmp_name'] = $files['postattach']['tmp_name'][$i];
                $_FILES['postattach']['error'] = $files['postattach']['error'][$i];
                $_FILES['postattach']['size'] = $files['postattach']['size'][$i];


                if ($_FILES['postattach']['error'] == 0) {

                    $store = $_FILES['postattach']['name'];

                    $store_ext = explode('.', $store);
                    $store_ext = end($store_ext);

                    $fileName = 'file_' . $title . '_' . $this->random_string() . '.' . $store_ext;

                    $images[] = $fileName;
                    $config['file_name'] = $fileName;

                    $this->upload->initialize($config);
                    $this->upload->do_upload();

                    $imgdata = $this->upload->data();

                    if ($this->upload->do_upload('postattach')) {

                        $response['result'][] = $this->upload->data();
                        $business_profile_post_thumb[$i]['image_library'] = 'gd2';
                        $business_profile_post_thumb[$i]['source_image'] = $this->config->item('bus_post_main_upload_path') . $response['result'][$i]['file_name'];
                        $business_profile_post_thumb[$i]['new_image'] = $this->config->item('bus_post_thumb_upload_path') . $response['result'][$i]['file_name'];
                        $business_profile_post_thumb[$i]['create_thumb'] = TRUE;
                        $business_profile_post_thumb[$i]['maintain_ratio'] = TRUE;
                        $business_profile_post_thumb[$i]['thumb_marker'] = '';
                        $business_profile_post_thumb[$i]['width'] = $this->config->item('bus_post_thumb_width');
                        //$product_thumb[$i]['height'] = $this->config->item('product_thumb_height');
                        $business_profile_post_thumb[$i]['height'] = 2;
                        $business_profile_post_thumb[$i]['master_dim'] = 'width';
                        $business_profile_post_thumb[$i]['quality'] = "100%";
                        $business_profile_post_thumb[$i]['x_axis'] = '0';
                        $business_profile_post_thumb[$i]['y_axis'] = '0';
                        $instanse = "image_$i";
                        //Loading Image Library
                        $this->load->library('image_lib', $business_profile_post_thumb[$i], $instanse);
                        $dataimage = $response['result'][$i]['file_name'];
                        //Creating Thumbnail
                        $this->$instanse->resize();
                        $response['error'][] = $thumberror = $this->$instanse->display_errors();

                        $return['data'][] = $imgdata;
                        $return['status'] = "success";
                        $return['msg'] = sprintf($this->lang->line('success_item_added'), "Image", "uploaded");

                        $data1 = array(
                            'image_name' => $fileName,
                            'image_type' => 2,
                            'post_id' => $insert_id,
                            'is_deleted' => 1
                        );

                        //echo "<pre>"; print_r($data1);
                        $insert_id1 = $this->common->insert_data_getid($data1, 'post_image');
                    } else {
                        echo $this->upload->display_errors();
                        exit;
                    }
                } else {
                    $this->session->set_flashdata('error', '<div class="col-md-7 col-sm-7 alert alert-danger1">Something went to wrong in uploded file.</div>');
                    if ($id == manage) {

                        if ($para == $userid || $para == '') {
                            // redirect('business_profile/business_profile_manage_post', refresh);
                        } else {
                            // redirect('business_profile/business_profile_manage_post/' . $this->data['businessdataposted'][0]['business_slug'], refresh);
                        }
                    } else {
                        //   redirect('business_profile/business_profile_post', refresh);
                    }
                }
            } //die();
        }

        if ($id == manage) {

            if ($para == $userid || $para == '') {
                // redirect('business_profile/business_profile_manage_post', refresh);
            } else {
                // redirect('business_profile/business_profile_manage_post/' . $this->data['businessdataposted'][0]['business_slug'], refresh);
            }
        } else {
            // redirect('business_profile/business_profile_post', refresh);
        }
        // new code end
        // return html


        $userid = $this->session->userdata('aileenuser');
        $user_name = $this->session->userdata('user_name');

        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');
        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        $contition_array = array('user_id' => $userid, 'status' => '1');
        $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $business_profile_id = $this->data['businessdata'][0]['business_profile_id'];
        $contition_array = array('is_deleted' => 0, 'status' => 1, 'user_id !=' => $userid, 'business_step' => 4);
        $userlist = $this->data['userlist'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = 'business_profile_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $industriyal = $this->data['businessdata'][0]['industriyal'];
        foreach ($userlist as $rowcategory) {
            if ($industriyal == $rowcategory['industriyal']) {
                $userlistcategory[] = $rowcategory;
            }
        }

        $this->data['userlistview1'] = $userlistcategory;

        $businessregcity = $this->data['businessdata'][0]['city'];
        $contition_array = array('is_deleted' => 0, 'status' => 1, 'user_id !=' => $userid, 'industriyal !=' => $industriyal, 'business_step' => 4);
        $userlist2 = $this->data['userlist2'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = 'business_profile_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        foreach ($userlist2 as $rowcity) {
            if ($businessregcity == $rowcity['city']) {
                $userlistcity[] = $rowcity;
            }
        }

        $this->data['userlistview2'] = $userlistcity;

        $businessregstate = $this->data['businessdata'][0]['state'];

        $contition_array = array('is_deleted' => 0, 'status' => 1, 'user_id !=' => $userid, 'industriyal !=' => $industriyal, 'city !=' => $businessregcity, 'business_step' => 4);
        $userlist3 = $this->data['userlist3'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = 'business_profile_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        foreach ($userlist3 as $rowstate) {
            if ($businessregstate == $rowstate['state']) {
                $userliststate[] = $rowstate;
            }
        }
        $this->data['userlistview3'] = $userliststate;

        $contition_array = array('is_deleted' => 0, 'status' => 1, 'user_id !=' => $userid, 'industriyal !=' => $industriyal, 'city !=' => $businessregcity, 'state !=' => $businessregstate, 'business_step' => 4);
        $userlastview = $this->data['userlastview'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = 'business_profile_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $this->data['userlistview4'] = $userlastview;

        $contition_array = array('follow_from' => $business_profile_id, 'follow_status' => '1', 'follow_type' => '2');
        $followerdata = $this->data['followerdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        foreach ($followerdata as $fdata) {
            $contition_array = array('business_profile_id' => $fdata['follow_to'], 'business_step' => 4);
            $this->data['business_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $business_userid = $this->data['business_data'][0]['user_id'];
            $contition_array = array('user_id' => $business_userid, 'status' => '1', 'is_delete' => '0');
            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $followerabc[] = $this->data['business_profile_data'];
        }
        $userselectindustriyal = $this->data['businessdata'][0]['industriyal'];

        $contition_array = array('industriyal' => $userselectindustriyal, 'status' => '1', 'business_step' => 4);
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        foreach ($businessprofiledata as $fdata) {
            $contition_array = array('business_profile_post.user_id' => $fdata['user_id'], 'business_profile_post.status' => '1', 'business_profile_post.user_id !=' => $userid, 'is_delete' => '0');
            $this->data['business_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $industriyalabc[] = $this->data['business_data'];
        }

        $condition_array = array('user_id' => $userid, 'status' => '1', 'is_delete' => '0');
        $business_datauser = $this->data['business_datauser'] = $this->common->select_data_by_condition('business_profile_post', $condition_array, $data = '*', $sortby = 'business_profile_post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $userabc[][] = $this->data['business_datauser'][0];

        if (count($industriyalabc) == 0 && count($business_datauser) != 0) {
            $unique = $userabc;
        } elseif (count($business_datauser) == 0 && count($industriyalabc) != 0) {
            $unique = $industriyalabc;
        } elseif (count($business_datauser) != 0 && count($industriyalabc) != 0) {
            $unique = array_merge($industriyalabc, $userabc);
        }

        if (count($followerabc) == 0 && count($unique) != 0) {
            $unique_user = $unique;
        } elseif (count($unique) == 0 && count($followerabc) != 0) {
            $unique_user = $followerabc;
        } else {
            $unique_user = array_merge($unique, $followerabc);
        }

        foreach ($unique_user as $ke => $arr) {
            foreach ($arr as $k => $v) {
                $postdata[] = $v;
            }
        }

        $postdata = array_unique($postdata, SORT_REGULAR);
        $new = array();
        foreach ($postdata as $value) {
            $new[$value['business_profile_post_id']] = $value;
        }

        $post = array();

        foreach ($new as $key => $row) {
            $post[$key] = $row['business_profile_post_id'];
        }
        array_multisort($post, SORT_DESC, $new);
        $businessprofiledatapost = $new;

        $row = $businessprofiledatapost[0];

        //foreach ($businessprofiledatapost as $row) {
        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1');
        $businessdelete = $this->data['businessdelete'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('user_id' => $row['user_id'], 'status' => '1');
        $businessdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $likeuserarray = explode(',', $businessdelete[0]['delete_post']);
        if (!in_array($userid, $likeuserarray)) {

            $return_html = '<div id="removepost' . $row['business_profile_post_id'] . '">
                    <div class="col-md-12 col-sm-12 post-design-box">
                        <div  class="post_radius_box">  
                            <div class="post-design-top col-md-12" >  
                                <div class="post-design-pro-img"> 
                                    <div id="popup1" class="overlay">
                                        <div class="popup">
                                            <div class="pop_content">
                                                Your Post is Successfully Saved.
                                                <p class="okk">
                                                    <a class="okbtn" href="#">Ok
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>';

            $companyname = $this->db->get_where('business_profile', array('user_id' => $row['user_id'], 'status' => 1))->row()->company_name;

            $companynameposted = $this->db->get_where('business_profile', array('user_id' => $row['posted_user_id']))->row()->company_name;

            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $row['user_id'], 'status' => 1))->row()->business_user_image;
            $userimageposted = $this->db->get_where('business_profile', array('user_id' => $row['posted_user_id']))->row()->business_user_image;

            $slugname = $this->db->get_where('business_profile', array('user_id' => $row['user_id'], 'status' => 1))->row()->business_slug;
            $slugnameposted = $this->db->get_where('business_profile', array('user_id' => $row['posted_user_id'], 'status' => 1))->row()->business_slug;
            if ($row['posted_user_id']) {

                if ($userimageposted) {
                    $return_html .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $slugnameposted) . '">';

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $userimageposted)) {
                        $a = $companynameposted;
                        $acr = substr($a, 0, 1);

                        $return_html .= '<div class="post-img-div">';
                        $return_html .= ucfirst(strtolower($acr));
                        $return_html .= '</div>';
                    } else {

                        $return_html .= '<img src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $userimageposted) . '" name="image_src" id="image_src" />';
                    }

                    $return_html .= ' </a>';
                } else {
                    $return_html .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $slugnameposted) . '">';

                    $a = $companynameposted;
                    $acr = substr($a, 0, 1);

                    $return_html .= '<div class="post-img-div">';
                    $return_html .= ucfirst(strtolower($acr));
                    $return_html .= '</div>';

                    $return_html .= '</a>';
                }
            } else {
                if ($business_userimage) {
                    $return_html .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $slugname) . '">';

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                        $a = $companyname;
                        $acr = substr($a, 0, 1);

                        $return_html .= '<div class="post-img-div">';
                        $return_html .= ucfirst(strtolower($acr));
                        $return_html .= '</div>';
                    } else {

                        $return_html .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '"  alt="">';
                    }


                    $return_html .= '</a>';
                } else {
                    $return_html .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $slugname) . '">';
                    $a = $companyname;
                    $acr = substr($a, 0, 1);

                    $return_html .= '<div class="post-img-div">';
                    $return_html .= ucfirst(strtolower($acr));
                    $return_html .= '</div>';

                    $return_html .= '</a>';
                }
            }
            $return_html .= '</div>
                                <div class="post-design-name fl col-md-10">
                                    <ul>';

            $slugname = $this->db->get_where('business_profile', array('user_id' => $row['user_id'], 'status' => 1))->row()->business_slug;
            $categoryid = $this->db->get_where('business_profile', array('user_id' => $row['user_id'], 'status' => 1))->row()->industriyal;
            $category = $this->db->get_where('industry_type', array('industry_id' => $categoryid, 'status' => 1))->row()->industry_name;


            $slugnameposted = $this->db->get_where('business_profile', array('user_id' => $row['posted_user_id'], 'status' => 1))->row()->business_slug;

            $return_html .= '<li>
                                        </li>';
            if ($row['posted_user_id']) {
                $return_html .= '<li>
                                                <div class="else_post_d">
                                                    <div class="post-design-product">
                                                        <a class="post_dot_2" href="' . base_url('business_profile/business_profile_manage_post/' . $slugnameposted) . '">' . ucfirst(strtolower($companynameposted)) . '</a>
                                                        <p class="posted_with" > Posted With</p> <a class="other_name name_business post_dot_2"  href="' . base_url('business_profile/business_profile_manage_post/' . $slugname) . '">' . ucfirst(strtolower($companyname)) . '</a>
                                                        <span role="presentation" aria-hidden="true"> · </span> <span class="ctre_date">
                                        ' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($row['created_date']))) . '  
                                                        </span> </div></div>
                                            </li>';
                $category = $this->db->get_where('industry_type', array('industry_id' => $businessdata[0]['industriyal'], 'status' => 1))->row()->industry_name;
            } else {
                $return_html .= '<li>
                                                <div class="post-design-product">
                                                    <a class="post_dot"  href="' . base_url('business_profile/business_profile_manage_post/' . $slugname) . '" title="' . ucfirst(strtolower($companyname)) . '">
                    ' . ucfirst(strtolower($companyname)) . '</a>
                                                    <span role="presentation" aria-hidden="true"> · </span>
                                                    <div class="datespan"> <span class="ctre_date" > 
                    ' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($row['created_date']))) . '

                                                        </span></div>

                                                </div>
                                            </li>';
            }
            $category = $this->db->get_where('industry_type', array('industry_id' => $businessdata[0]['industriyal'], 'status' => 1))->row()->industry_name;


            $return_html .= '<li>
                                            <div class="post-design-product">
                                                <a class="buuis_desc_a" href="javascript:void(0);"  title="Category">';
            if ($category) {
                $return_html .= ucfirst(strtolower($category));
            } else {
                $return_html .= ucfirst(strtolower($businessdata[0]['other_industrial']));
            }

            $return_html .= '</a>
                                            </div>
                                        </li>

                                        <li>
                                        </li> 
                                    </ul> 
                                </div>  
                                <div class="dropdown2">
                                    <a onClick="myFunction1(' . $row['business_profile_post_id'] . ')" class="dropbtn1 dropbtn1 fa fa-ellipsis-v">
                                    </a>
                                    <div id="myDropdown' . $row['business_profile_post_id'] . '" class="dropdown-content2">';

            if ($row['posted_user_id'] != 0) {

                if ($this->session->userdata('aileenuser') == $row['posted_user_id']) {

                    $return_html .= '<a onclick="user_postdelete(' . $row['business_profile_post_id'] . ')">
                                                    <i class="fa fa-trash-o" aria-hidden="true">
                                                    </i> Delete Post
                                                </a>
                                                <a id="' . $row['business_profile_post_id'] . '" onClick="editpost(this.id)">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                                                    </i>Edit
                                                </a>';
                } else {

                    $return_html .= '<a onclick="user_postdelete(' . $row['business_profile_post_id'] . ')">
                                                    <i class="fa fa-trash-o" aria-hidden="true">
                                                    </i> Delete Post
                                                </a>';
                    // <a href="' . base_url('business_profile/business_profile_contactperson/' . $row['posted_user_id']) . '">
                    //     <i class="fa fa-user" aria-hidden="true">
                    //     </i> Contact Person </a>';
                }
            } else {
                if ($this->session->userdata('aileenuser') == $row['user_id']) {
                    $return_html .= '<a onclick="user_postdelete(' . $row['business_profile_post_id'] . ')">
                                                    <i class="fa fa-trash-o" aria-hidden="true">
                                                    </i> Delete Post
                                                </a>
                                                <a id="' . $row['business_profile_post_id'] . '" onClick="editpost(this.id)">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                                                    </i>Edit
                                                </a>';
                } else {
                    $return_html .= '<a onclick="user_postdeleteparticular(' . $row['business_profile_post_id'] . ')">
                                                    <i class="fa fa-trash-o" aria-hidden="true">
                                                    </i> Delete Post
                                                </a>';

                    // <a href="' . base_url('business_profile/business_profile_contactperson/' . $row['user_id']) . '">
                    //     <i class="fa fa-user" aria-hidden="true">
                    //     </i> Contact Person
                    // </a>';
                }
            }

            $return_html .= '</div>
                                </div>
                                <div class="post-design-desc">
                                    <div class="ft-15 t_artd">
                                        <div id="editpostdata' . $row['business_profile_post_id'] . '" style="display:block;">
                                            <a>' . $this->common->make_links($row['product_name']) . '</a>
                                        </div>
                                        <div id="editpostbox' . $row['business_profile_post_id'] . '" style="display:none;">
                                            <input type="text" id="editpostname' . $row['business_profile_post_id'] . '" name="editpostname" placeholder="Product Name" value="' . $row['product_name'] . '" onKeyDown=check_lengthedit(' . $row['business_profile_post_id'] . '); onKeyup=check_lengthedit(' . $row['business_profile_post_id'] . '); onblur=check_lengthedit(' . $row['business_profile_post_id'] . ');>';

            if ($row['product_name']) {
                $counter = $row['product_name'];
                $a = strlen($counter);

                $return_html .= '<input size=1 id="text_num" class="text_num" value="' . (50 - $a) . '" name=text_num readonly>';
            } else {

                $return_html .= '<input size=1 id="text_num" class="text_num" value=50 name=text_num readonly>';
            }

            $return_html .= '</div>
                                    </div>                    
                                    <div id="khyati' . $row['business_profile_post_id'] . '" style="display:block;">';

            $small = substr($row['product_description'], 0, 180);
            $return_html .= $this->common->make_links($small);
            if (strlen($row['product_description']) > 180) {
                $return_html .= '... <span id="kkkk" onClick="khdiv(' . $row['business_profile_post_id'] . ')">View More</span>';
            }

            $return_html .= '</div>
                                    <div id="khyatii' . $row['business_profile_post_id'] . '" style="display:none;">
                                        ' . $row['product_description'] . '</div>
                                    <div id="editpostdetailbox' . $row['business_profile_post_id'] . '" style="display:none;">
                                        <div  contenteditable="true" id="editpostdesc' . $row['business_profile_post_id'] . '"  class="textbuis editable_text margin_btm" name="editpostdesc" placeholder="Description" >' . $row['product_description'] . '</div>
                                    </div>
                                    <div id="editpostdetailbox' . $row['business_profile_post_id'] . '" style="display:none;">
                                        <div contenteditable="true" id="editpostdesc' . $row['business_profile_post_id'] . '" placeholder="Product Description" class="textbuis  editable_text"  name="editpostdesc" onpaste="OnPaste_StripFormatting(this, event);">' . $row['product_description'] . '</div>                  
                                    </div>
                                    <button class="fr" id="editpostsubmit' . $row['business_profile_post_id'] . '" style="display:none;margin: 5px 0; border-radius: 3px;" onClick="edit_postinsert(' . $row['business_profile_post_id'] . ')">Save
                                    </button>
                                </div> 
                            </div>
                            <div class="post-design-mid col-md-12 padding_adust" >
                                <div>';

            $contition_array = array('post_id' => $row['business_profile_post_id'], 'is_deleted' => '1', 'image_type' => '2');
            $businessmultiimage = $this->data['businessmultiimage'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if (count($businessmultiimage) == 1) {

                $allowed = array('gif', 'PNG', 'jpg', 'jpeg', 'png');
                $allowespdf = array('pdf');
                $allowesvideo = array('mp4', 'webm', 'MP4');
                $allowesaudio = array('mp3');
                $filename = $businessmultiimage[0]['image_name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (in_array($ext, $allowed)) {

                    $return_html .= '<div class="one-image">';
                    $return_html .= '<a href="' . base_url('business_profile/postnewpage/' . $row['business_profile_post_id']) . '">
                                                    <img src="' . base_url($this->config->item('bus_post_main_upload_path') . $businessmultiimage[0]['image_name']) . '"> 
                                                </a>
                                            </div>';
                } elseif (in_array($ext, $allowespdf)) {
                    $return_html .= '<div>
                                                <a title="click to open" href="' . base_url('business_profile/creat_pdf/' . $businessmultiimage[0]['image_id']) . '"><div class="pdf_img">
                                                        <img src="' . base_url('images/PDF.jpg') . '" style="height: 100%; width: 100%;">
                                                    </div>
                                                </a>
                                            </div>';
                } elseif (in_array($ext, $allowesvideo)) {
                    $return_html .= '<div>
                                                <video width="100%" height="350" controls>
                                                    <source src="' . base_url($this->config->item('bus_post_main_upload_path') . $businessmultiimage[0]['image_name']) . '" type="video/mp4">
                                                    <source src="' . base_url($this->config->item('bus_post_main_upload_path') . $businessmultiimage[0]['image_name']) . '" type="video/ogg">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>';
                } elseif (in_array($ext, $allowesaudio)) {
                    $return_html .= '<div class="audio_main_div">
                                                <div class="audio_img">
                                                    <img src="' . base_url('images/music-icon.png') . '">  
                                                </div>
                                                <div class="audio_source">
                                                    <audio id="audio_player" width="100%" height="100" controls>
                                                        <source src="' . base_url($this->config->item('bus_post_main_upload_path') . $businessmultiimage[0]['image_name']) . '" type="audio/mp3">
                                                        <source src="movie.ogg" type="audio/ogg">
                                                        Your browser does not support the audio tag.
                                                    </audio>
                                                </div>
                                                <div class="audio_mp3" id="' . "postname" . $row['business_profile_post_id'] . '">
                                                    <p title="' . $row['product_name'] . '">' . $row['product_name'] . '</p>
                                                </div>
                                            </div>';
                }
            } elseif (count($businessmultiimage) == 2) {

                foreach ($businessmultiimage as $multiimage) {

                    $return_html .= '<div  class="two-images">
                                                <a href="' . base_url('business_profile/postnewpage/' . $row['business_profile_post_id']) . '">
                                                    <img class="two-columns" src="' . base_url($this->config->item('bus_post_thumb_upload_path') . $multiimage['image_name']) . '" style="width: 100%; height: 100%;"> 
                                                </a>
                                            </div>';
                }
            } elseif (count($businessmultiimage) == 3) {
                $return_html .= '<div class="three-image-top" >
                                            <a href="' . base_url('business_profile/postnewpage/' . $row['business_profile_post_id']) . '">
                                                <img class="three-columns" src="' . base_url($this->config->item('bus_post_thumb_upload_path') . $businessmultiimage[0]['image_name']) . '" style="width: 100%; height:100%; "> 
                                            </a>
                                        </div>
                                        <div class="three-image" >

                                            <a href="' . base_url('business_profile/postnewpage/' . $row['business_profile_post_id']) . '">
                                                <img class="three-columns" src="' . base_url($this->config->item('bus_post_thumb_upload_path') . $businessmultiimage[1]['image_name']) . '" style="width: 100%; height:100%; "> 
                                            </a>
                                        </div>
                                        <div class="three-image" >
                                            <a href="' . base_url('business_profile/postnewpage/' . $row['business_profile_post_id']) . '">
                                                <img class="three-columns" src="' . base_url($this->config->item('bus_post_thumb_upload_path') . $businessmultiimage[2]['image_name']) . '" style="width: 100%; height:100%; "> 
                                            </a>
                                        </div>';
            } elseif (count($businessmultiimage) == 4) {

                foreach ($businessmultiimage as $multiimage) {

                    $return_html .= '<div class="four-image">
                                                <a href="' . base_url('business_profile/postnewpage/' . $row['business_profile_post_id']) . '">
                                                    <img class="breakpoint" src="' . base_url($this->config->item('bus_post_thumb_upload_path') . $multiimage['image_name']) . '" style="width: 100%; height: 100%;"> 
                                                </a>
                                            </div>';
                }
            } elseif (count($businessmultiimage) > 4) {

                $i = 0;
                foreach ($businessmultiimage as $multiimage) {

                    $return_html .= '<div class="four-image">
                                                <a href="' . base_url('business_profile/postnewpage/' . $row['business_profile_post_id']) . '">
                                                    <img src="' . base_url($this->config->item('bus_post_thumb_upload_path') . $multiimage['image_name']) . '" style="width: 100%; height: 100%;"> 
                                                </a>
                                            </div>';

                    $i++;
                    if ($i == 3)
                        break;
                }

                $return_html .= '<div class="four-image">
                                            <a href="' . base_url('business_profile/postnewpage/' . $row['business_profile_post_id']) . '">
                                                <img src="' . base_url($this->config->item('bus_post_thumb_upload_path') . $businessmultiimage[3]['image_name']) . '" style="width: 100%; height: 100%;"> 
                                            </a>
                                            <a class="text-center" href="' . base_url('business_profile/postnewpage/' . $row['business_profile_post_id']) . '" >
                                                <div class="more-image" >
                                                    <span>View All (+
                     ' . (count($businessmultiimage) - 4) . ')</span>

                                                </div>

                                            </a>
                                        </div>';
            }
            $return_html .= '<div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-design-like-box col-md-12">
                                <div class="post-design-menu">
                                    <ul class="col-md-6 col-sm-6 col-xs-6">
                                        <li class="likepost' . $row['business_profile_post_id'] . '">
                                            <a id="' . $row['business_profile_post_id'] . '" class="ripple like_h_w"  onClick="post_like(this.id)">';

            $userid = $this->session->userdata('aileenuser');
            $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1');
            $active = $this->data['active'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $likeuser = $this->data['active'][0]['business_like_user'];
            $likeuserarray = explode(',', $active[0]['business_like_user']);
            if (!in_array($userid, $likeuserarray)) {

                $return_html .= '<i class="fa fa-thumbs-up" style="color: #999;" aria-hidden="true"></i>';
            } else {
                $return_html .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true"></i>';
            }
            $return_html .= '<span class="like_As_count">';

            if ($row['business_likes_count'] > 0) {
                $return_html .= $row['business_likes_count'];
            }

            $return_html .= '</span>
                                            </a>
                                        </li>
                                        <li id="insertcount' . $row['business_profile_post_id'] . '" style="visibility:show">';

            $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
            $commnetcount = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $return_html .= '<a onClick = "commentall(this.id)" id = "' . $row['business_profile_post_id'] . '" class = "ripple like_h_w">
                    <i class = "fa fa-comment-o" aria-hidden = "true">
                    </i>
                    </a>
                    </li>
                    </ul>
                    <ul class = "col-md-6 col-sm-6 col-xs-6 like_cmnt_count">
                    <li>
                    <div class = "like_count_ext">
                    <span class = "comment_count' . $row['business_profile_post_id'] . '" >';

            if (count($commnetcount) > 0) {
                $return_html .= count($commnetcount);
                $return_html .= '<span> Comment</span>';
            }
            $return_html .= '</span> 

                    </div>
                    </li>

                    <li>
                        <div class="comnt_count_ext">
                            <span class="comment_like_count' . $row['business_profile_post_id'] . '">';
            if ($row['business_likes_count'] > 0) {
                $return_html .= $row['business_likes_count'];

                $return_html .= '<span> Like</span>';
            }
            $return_html .= '</span> 

                        </div></li>
                    </ul>
                    </div>
                    </div>';

            if ($row['business_likes_count'] > 0) {

                $return_html .= '<div class="likeduserlist' . $row['business_profile_post_id'] . '">';

                $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                $likeuser = $commnetcount[0]['business_like_user'];
                $countlike = $commnetcount[0]['business_likes_count'] - 1;
                $likelistarray = explode(',', $likeuser);
                foreach ($likelistarray as $key => $value) {
                    $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
                }

                $return_html .= '<a href="javascript:void(0);"  onclick="likeuserlist(' . $row['business_profile_post_id'] . ')">';
                $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $likeuser = $commnetcount[0]['business_like_user'];
                $countlike = $commnetcount[0]['business_likes_count'] - 1;
                $likelistarray = explode(',', $likeuser);

                $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
                $return_html .= '<div class="like_one_other">';

                if ($userid == $value) {
                    $return_html .= "You";
                    $return_html .= "&nbsp;";
                } else {
                    $return_html .= ucfirst(strtolower($business_fname1));
                    $return_html .= "&nbsp;";
                }

                if (count($likelistarray) > 1) {
                    $return_html .= " and";

                    $return_html .= $countlike;
                    $return_html .= "&nbsp;";
                    $return_html .= "others";
                }
                $return_html .= '</div>
                            </a>
                        </div>';
            }

            $return_html .= '<div class="likeusername' . $row['business_profile_post_id'] . '" id="likeusername' . $row['business_profile_post_id'] . '" style="display:none">';
            $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
            $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $likeuser = $commnetcount[0]['business_like_user'];
            $countlike = $commnetcount[0]['business_likes_count'] - 1;
            $likelistarray = explode(',', $likeuser);
            foreach ($likelistarray as $key => $value) {
                $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
            }
            $return_html .= '<a href="javascript:void(0);"  onclick="likeuserlist(' . $row['business_profile_post_id'] . ')">';
            $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
            $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $likeuser = $commnetcount[0]['business_like_user'];
            $countlike = $commnetcount[0]['business_likes_count'] - 1;
            $likelistarray = explode(',', $likeuser);

            $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;

            $return_html .= '<div class="like_one_other">';

            $return_html .= ucfirst(strtolower($business_fname1));
            $return_html .= "&nbsp;";

            if (count($likelistarray) > 1) {

                $return_html .= "and";

                $return_html .= $countlike;
                $return_html .= "&nbsp;";
                $return_html .= "others";
            }
            $return_html .= '</div>
                        </a>
                    </div>

                    <div class="art-all-comment col-md-12">
                        <div  id="fourcomment' . $row['business_profile_post_id'] . '" style="display:none;">
                        </div>
                        <div id="threecomment' . $row['business_profile_post_id'] . '" style="display:block">
                            <div class="insertcomment' . $row['business_profile_post_id'] . '">';

            $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1');
            $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');
            if ($businessprofiledata) {
                foreach ($businessprofiledata as $rowdata) {
                    $companyname = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->company_name;

                    $slugname1 = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->business_slug;

                    $return_html .= '<div class="all-comment-comment-box">
                                            <div class="post-design-pro-comment-img">';
                    $business_userimage = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->business_user_image;

                    if ($business_userimage) {
                        $return_html .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $slugname1) . '">';

                        if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                            $a = $companyname;
                            $acr = substr($a, 0, 1);

                            $return_html .= '<div class="post-img-div">';
                            $return_html .= ucfirst(strtolower($acr));
                            $return_html .= '</div>';
                        } else {

                            $return_html .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '"  alt="">';
                        }

                        $return_html .= '</a>';
                    } else {
                        $return_html .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $slugname1) . '">';

                        $a = $companyname;
                        $acr = substr($a, 0, 1);

                        $return_html .= '<div class="post-img-div">';
                        $return_html .= ucfirst(strtolower($acr));
                        $return_html .= '</div>';
                        $return_html .= '</a>';
                    }
                    $return_html .= '</div>
                                            <div class="comment-name"><a href="' . base_url('business_profile/business_profile_manage_post/' . $slugname1) . '">
                                                <b title="' . $companyname . '">';
                    $return_html .= $companyname;
                    $return_html .= '</br>';

                    $return_html .= '</b></a>
                                            </div>
                                            <div class="comment-details" id="showcomment' . $rowdata['business_profile_post_comment_id'] . '">';
                    $new_product_comment = $this->common->make_links($rowdata['comments']);
                    $return_html .= nl2br(htmlspecialchars_decode(htmlentities($new_product_comment, ENT_QUOTES, 'UTF-8')));

                    $return_html .= '</div>
                                            <div class="edit-comment-box">
                                                <div class="inputtype-edit-comment">
                                                    <div contenteditable="true" class="editable_text editav_2" name="' . $rowdata['business_profile_post_comment_id'] . '"  id="editcomment' . $rowdata['business_profile_post_comment_id'] . '" placeholder="Enter Your Comment " value= ""  onkeyup="commentedit(' . $rowdata['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $rowdata['comments'] . '</div>
                                                    <span class="comment-edit-button"><button id="editsubmit' . $rowdata['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_comment(' . $rowdata['business_profile_post_comment_id'] . ')">Save</button></span>
                                                </div>
                                            </div>
                                            <div class="art-comment-menu-design"> 
                                                <div class="comment-details-menu" id="likecomment1' . $rowdata['business_profile_post_comment_id'] . '">
                                                    <a id="' . $rowdata['business_profile_post_comment_id'] . '" onClick="comment_like1(this.id)">';

                    $userid = $this->session->userdata('aileenuser');
                    $contition_array = array('business_profile_post_comment_id' => $rowdata['business_profile_post_comment_id'], 'status' => '1');
                    $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                    $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);
                    if (!in_array($userid, $likeuserarray)) {

                        $return_html .= '<i class="fa fa-thumbs-up fa-1x" style="color: #999;" aria-hidden="true"></i>';
                    } else {
                        $return_html .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true">
                                                            </i>';
                    }
                    $return_html .= '<span>';

                    if ($rowdata['business_comment_likes_count']) {
                        $return_html .= $rowdata['business_comment_likes_count'];
                    }

                    $return_html .= '</span>
                                                    </a>
                                                </div>';
                    $userid = $this->session->userdata('aileenuser');
                    if ($rowdata['user_id'] == $userid) {

                        $return_html .= '<span role="presentation" aria-hidden="true"> · 
                                                    </span>
                                                    <div class="comment-details-menu">
                                                        <div id="editcommentbox' . $rowdata['business_profile_post_comment_id'] . '" style="display:block;">
                                                            <a id="' . $rowdata['business_profile_post_comment_id'] . '"   onClick="comment_editbox(this.id)" class="editbox">Edit
                                                            </a>
                                                        </div>
                                                        <div id="editcancle' . $rowdata['business_profile_post_comment_id'] . '" style="display:none;">
                                                            <a id="' . $rowdata['business_profile_post_comment_id'] . '" onClick="comment_editcancle(this.id)">Cancel
                                                            </a>
                                                        </div>
                                                    </div>';
                    }
                    $userid = $this->session->userdata('aileenuser');
                    $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $rowdata['business_profile_post_id'], 'status' => 1))->row()->user_id;
                    if ($rowdata['user_id'] == $userid || $business_userid == $userid) {

                        $return_html .= '<span role="presentation" aria-hidden="true"> · 
                                                    </span>
                                                    <div class="comment-details-menu">
                                                        <input type="hidden" name="post_delete"  id="post_delete' . $rowdata['business_profile_post_comment_id'] . '" value= "' . $rowdata['business_profile_post_id'] . '">
                                                        <a id="' . $rowdata['business_profile_post_comment_id'] . '"   onClick="comment_delete(this.id)"> Delete
                                                            <span class="insertcomment' . $rowdata['business_profile_post_comment_id'] . '">
                                                            </span>
                                                        </a>
                                                    </div>';
                    }
                    $return_html .= '<span role="presentation" aria-hidden="true"> · 
                                                </span>
                                                <div class="comment-details-menu">
                                                    <p>';

                    $return_html .= $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($rowdata['created_date'])));
                    $return_html .= '</br>';

                    $return_html .= '</p>
                                                </div>
                                            </div>
                                        </div>';
                }
            }
            $return_html .= '</div>
                        </div>
                    </div>
                    <div class="post-design-commnet-box col-md-12">
                        <div class="post-design-proo-img">';

            $userid = $this->session->userdata('aileenuser');
            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $userid, 'status' => 1))->row()->business_user_image;
            if ($business_userimage) {

                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                    $a = $companyname;
                    $acr = substr($a, 0, 1);

                    $return_html .= '<div class="post-img-div">';
                    $return_html .= ucfirst(strtolower($acr));
                    $return_html .= '</div>';
                } else {

                    $return_html .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '"  alt="">';
                }
            } else {
                $a = $companyname;
                $acr = substr($a, 0, 1);

                $return_html .= '<div class="post-img-div">';
                $return_html .= ucfirst(strtolower($acr));
                $return_html .= '</div>';
            }
            $return_html .= '</div>

                        <div id="content" class="col-md-12  inputtype-comment cmy_2" >
                            <div contenteditable="true" class="edt_2 editable_text" name="' . $row['business_profile_post_id'] . '"  id="post_comment' . $row['business_profile_post_id'] . '" placeholder="Add a Comment ..." onClick="entercomment(' . $row['business_profile_post_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);"></div>
                        </div>
                      ' . form_error('post_comment') . ' 
                        <div class="comment-edit-butn">       
                            <button id="' . $row['business_profile_post_id'] . '" onClick="insert_comment(this.id)">Comment
                            </button>
                        </div>

                    </div>
                    </div>
                    </div></div>';

            echo $return_html;
        }
        //    }
        // return html         
    }

    public function business_profile_editpost($id) {
        $contition_array = array('business_profile_post_id' => $id);
        $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $this->load->view('business_profile/business_profile_editpost', $this->data);
    }

    public function business_profile_editpost_insert($id) {


        $editimage = $this->input->post('hiddenimg');

        $this->form_validation->set_rules('productname', 'Product name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('business_profile/business_profile_editpost');
        } else {


            $config['upload_path'] = $this->config->item('bus_post_main_upload_path');
            $config['allowed_types'] = $this->config->item('bus_post_main_allowed_types');

            $config['file_name'] = $_FILES['image']['name'];
            $config['upload_max_filesize'] = '40M';

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();

                //Configuring Thumbnail 
                $business_post_thumb['image_library'] = 'gd2';
                $business_post_thumb['source_image'] = $config['upload_path'] . $uploadData['file_name'];
                $business_post_thumb['new_image'] = $this->config->item('user_thumb_upload_path') . $imgdata['file_name'];
                $business_post_thumb['create_thumb'] = TRUE;
                $business_post_thumb['maintain_ratio'] = TRUE;
                $business_post_thumb['thumb_marker'] = '';
                $business_post_thumb['width'] = $this->config->item('user_thumb_width');
                //$user_thumb['height'] = $this->config->item('user_thumb_height');
                $business_post_thumb['height'] = 2;
                $business_post_thumb['master_dim'] = 'width';
                $business_post_thumb['quality'] = "100%";
                $business_post_thumb['x_axis'] = '0';
                $business_post_thumb['y_axis'] = '0';
                //Loading Image Library
                $this->load->library('image_lib', $user_thumb);
                $dataimage = $imgdata['file_name'];
                //Creating Thumbnail
                $this->image_lib->resize();
                $thumberror = $this->image_lib->display_errors();

                $picture = $uploadData['file_name'];
            } else {
                $picture = '';
            }


            if ($picture) {

                $data = array(
                    'product_name' => $this->input->post('productname'),
                    'product_image' => $picture,
                    'product_description' => $this->input->post('description'),
                    'modify_date' => date('Y-m-d', time())
                );
            } else {
                $data = array(
                    'product_name' => $this->input->post('productname'),
                    'product_image' => $this->input->post('hiddenimg'),
                    'product_description' => $this->input->post('description'),
                    'modify_date' => date('Y-m-d', time())
                );
            }

            $updatdata = $this->common->update_data($data, 'business_profile_post', 'business_profile_post_id', $id);

            if ($updatdata) {
                redirect('business_profile/business_profile_manage_post', refresh);
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('business_profile/business_profile_editpost', refresh);
            }
        }
    }

//business_profile_contactperson start


    public function business_profile_contactperson($id) {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $contition_array = array('user_id' => $id, 'status' => '1', 'business_step' => 4);
        $this->data['contactperson'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        // code for search
        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);


        $this->load->view('business_profile/business_profile_contactperson', $this->data);
    }

//business_profile_contactperson _query

    public function business_profile_contactperson_query($id) {
        $userid = $this->session->userdata('aileenuser');

//if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $id, 'business_step' => 4);
        $this->data['contactperson'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $email = $this->input->post('email');

        $toemail = $this->input->post('toemail');

        $userdata = $this->common->select_data_by_id('user', 'user_id', $userid, $data = '*', $join_str = array());


        $msg = 'Hey !' . " " . $this->data['contactperson'][0]['contact_person'] . "<br/>" .
                $msg .= $userdata[0]['first_name'] . $userdata[0]['last_name'] . '(' . $userdata[0]['user_email'] . ')' . ',';
        $msg .= 'this person wants to contact with you!!';
        $msg .= "<br>";
        $msg .= $this->input->post('msg');
        $from = 'raval.khyati13@gmail.com';



        $subject = "contact message";


        $mail = $this->email_model->do_email($msg, $subject, $toemail, $from);


        //insert contact start


        $data = array(
            'contact_from_id' => $userid,
            'contact_to_id' => $id,
            'contact_type' => 2,
            'created_date' => date('Y-m-d H:i:s', time()),
            'status' => 'query',
            //'is_delete' => $userid,
            'contact_desc' => $this->input->post('msg')
        );


        $insertdata = $this->common->insert_data_getid($data, 'contact_person');


//insert contact person end 
//insert contact person notification start


        $data = array(
            'not_type' => 7,
            'not_from_id' => $userid,
            'not_to_id' => $id,
            'not_read' => 2,
            'not_product_id' => $insertdata,
            'not_from' => 3,
            'not_created_date' => date('Y-m-d H:i:s'),
            'not_active' => 1
        );

        $insert_id = $this->common->insert_data_getid($data, 'notification');

        if ($insertdata) {

            $this->session->set_flashdata('success', 'contacted successfully');
            redirect('business_profile/business_profile_post', 'refresh');
        } else {
            $this->session->flashdata('error', 'Your data not inserted');
            redirect('business_profile/business_profile_contactperson/' . $id, refresh);
        }
//insert contact person notifiaction end   
    }

    public function business_profile_save_post() {
        $userid = $this->session->userdata('aileenuser');
        $user_name = $this->session->userdata('user_name');
//if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $contition_array = array('user_id' => $userid);
        $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('user_id' => $userid);
        $savedata = $this->data['savedata'] = $this->common->select_data_by_condition('business_profile_save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>"; print_r($this->data['savedata']); die();

        foreach ($savedata as $savepost) {

            $savepostid = $savepost['post_id'];

            $contition_array = array('business_profile_post_id' => $savepostid, 'status' => '1');
            $this->data['business_post_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $businesssavepost[] = $this->data['business_post_data'];
        }

        $this->data['business_profile_data'] = $businesssavepost;

        //echo "<pre>"; print_r($this->data['business_profile_data']); die();
        $this->load->view('business_profile/business_profile_save_post', $this->data);
    }

    public function user_image_insert() {


        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        if ($this->input->post('cancel2')) {
            redirect('business_profile/business_profile_post', refresh);
        } elseif ($this->input->post('cancel1')) {
            redirect('business_profile/business_profile_save_post', refresh);
        } elseif ($this->input->post('cancel3')) {
            redirect('business_profile/business_profile_addpost', refresh);
        } elseif ($this->input->post('cancel4')) {
            redirect('business_profile/business_resume', refresh);
        } elseif ($this->input->post('cancel5')) {
            redirect('business_profile/business_profile_manage_post', refresh);
        } elseif ($this->input->post('cancel6')) {
            redirect('business_profile/userlist', refresh);
        } elseif ($this->input->post('cancel7')) {
            redirect('business_profile/followers', refresh);
        } elseif ($this->input->post('cancel8')) {
            redirect('business_profile/following', refresh);
        }

        if (empty($_FILES['profilepic']['name'])) {
            $this->form_validation->set_rules('profilepic', 'Upload profilepic', 'required');
        } else {

//            $config['upload_path'] = 'uploads/user_image/';
//            $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|mpeg|mpg|mpe|qt|mov|avi|pdf';
//
//            $config['file_name'] = $_FILES['profilepic']['name'];
//
//            //Load upload library and initialize configuration
//            $this->load->library('upload', $config);
//            $this->upload->initialize($config);
//
//            if ($this->upload->do_upload('profilepic')) {
//                $uploadData = $this->upload->data();
//                $picture = $uploadData['file_name'];
//            } else {
//                $picture = '';
//            }

            $user_image = '';
            $user['upload_path'] = $this->config->item('bus_profile_main_upload_path');
            $user['allowed_types'] = $this->config->item('bus_profile_main_allowed_types');
            $user['max_size'] = $this->config->item('bus_profile_main_max_size');
            $user['max_width'] = $this->config->item('bus_profile_main_max_width');
            $user['max_height'] = $this->config->item('bus_profile_main_max_height');
            $this->load->library('upload');
            $this->upload->initialize($user);
            //Uploading Image
            $this->upload->do_upload('profilepic');
            //Getting Uploaded Image File Data
            $imgdata = $this->upload->data();
            $imgerror = $this->upload->display_errors();


            if ($imgerror == '') {
                //Configuring Thumbnail 
                $user_thumb['image_library'] = 'gd2';
                $user_thumb['source_image'] = $user['upload_path'] . $imgdata['file_name'];
                $user_thumb['new_image'] = $this->config->item('bus_profile_thumb_upload_path') . $imgdata['file_name'];
                $user_thumb['create_thumb'] = TRUE;
                $user_thumb['maintain_ratio'] = TRUE;
                $user_thumb['thumb_marker'] = '';
                $user_thumb['width'] = $this->config->item('bus_profile_thumb_width');
                //$user_thumb['height'] = $this->config->item('user_thumb_height');
                $user_thumb['height'] = 2;
                $user_thumb['master_dim'] = 'width';
                $user_thumb['quality'] = "100%";
                $user_thumb['x_axis'] = '0';
                $user_thumb['y_axis'] = '0';
                //Loading Image Library
                $this->load->library('image_lib', $user_thumb);
                $dataimage = $imgdata['file_name'];
                //Creating Thumbnail
                $this->image_lib->resize();
                $thumberror = $this->image_lib->display_errors();
            } else {
                $thumberror = '';
            }
            if ($imgerror != '' || $thumberror != '') {
                $error[0] = $imgerror;
                $error[1] = $thumberror;
            } else {
                $error = array();
            }
            if ($error) {
                $this->session->set_flashdata('error', $error[0]);
                $redirect_url = site_url('business_profile');
                redirect($redirect_url, 'refresh');
            } else {

                $contition_array = array('user_id' => $userid);
                $user_reg_data = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'business_user_image', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $user_reg_prev_image = $user_reg_data[0]['business_user_image'];

                if ($user_reg_prev_image != '') {
                    $user_image_main_path = $this->config->item('bus_profile_main_upload_path');
                    $user_bg_full_image = $user_image_main_path . $user_reg_prev_image;
                    if (isset($user_bg_full_image)) {
                        unlink($user_bg_full_image);
                    }

                    $user_image_thumb_path = $this->config->item('bus_profile_thumb_upload_path');
                    $user_bg_thumb_image = $user_image_thumb_path . $user_reg_prev_image;
                    if (isset($user_bg_thumb_image)) {
                        unlink($user_bg_thumb_image);
                    }
                }

                $user_image = $imgdata['file_name'];
            }


            $data = array(
                'business_user_image' => $user_image,
                'modified_date' => date('Y-m-d', time())
            );


            $updatdata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);

            if ($updatdata) {
                if ($this->input->post('hitext') == 1) {
                    redirect('business_profile/business_profile_save_post', refresh);
                } elseif ($this->input->post('hitext') == 2) {
                    redirect('business_profile/business_profile_post', refresh);
                } elseif ($this->input->post('hitext') == 3) {
                    redirect('business_profile/business_profile_addpost', refresh);
                } elseif ($this->input->post('hitext') == 4) {
                    redirect('business_profile/business_resume', refresh);
                } elseif ($this->input->post('hitext') == 5) {
                    redirect('business_profile/business_profile_manage_post', refresh);
                } elseif ($this->input->post('hitext') == 6) {
                    redirect('business_profile/userlist', refresh);
                } elseif ($this->input->post('hitext') == 7) {
                    redirect('business_profile/followers', refresh);
                } elseif ($this->input->post('hitext') == 8) {
                    redirect('business_profile/following', refresh);
                } elseif ($this->input->post('hitext') == 9) {
                    redirect('business_profile/business_photos', refresh);
                } elseif ($this->input->post('hitext') == 10) {
                    redirect('business_profile/business_videos', refresh);
                } elseif ($this->input->post('hitext') == 11) {
                    redirect('business_profile/business_audios', refresh);
                } elseif ($this->input->post('hitext') == 12) {
                    redirect('business_profile/business_pdf', refresh);
                }
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('business_profile/business_profile_post', refresh);
            }
        }
    }

    public function business_resume($id = "") {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End


        $contition_array = array('user_id' => $userid, 'status' => '1');
        $this->data['slug_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $slug_id = $this->data['slug_data'][0]['business_slug'];

        if ($id == $this->data['slug_data'][0]['business_slug'] || $id == '') {
            $contition_array = array('business_slug' => $slug_id, 'status' => '1', 'business_step' => 4);
            $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('user_id' => $userid, 'is_delete' => '0');
            $this->data['busimagedata'] = $this->common->select_data_by_condition('bus_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        } else {

            $contition_array = array('business_slug' => $id, 'status' => '1', 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'is_delete' => '0');
            $this->data['busimagedata'] = $this->common->select_data_by_condition('bus_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        }


        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        //echo "<pre>";print_r($this->data['busimagedata']);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();



        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);




        if ($this->data['businessdata1']) {
            $this->load->view('business_profile/business_resume', $this->data);
        } else if (!$this->data['businessdata1'] && $id != $slug_id) {

            $this->load->view('business_profile/notavalible');
        } else if (!$this->data['businessdata1'] && ($id == $slug_id || $id == "")) {
            redirect('business_profile/');
        }
    }

    public function business_user_post($id) {

        $this->data['userid'] = $id;
        $userid = $this->session->userdata('aileenuser');
        $user_name = $this->session->userdata('user_name');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $userid, 'status' => '1');
        $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        $this->data['usdata'] = $this->common->select_data_by_id('user', 'user_id', $id, $data = '*', $join_str = array());


        $contition_array = array('user_id' => $id);
        $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $this->load->view('business_profile/business_profile_manage_post', $this->data);
    }

    //Business Profile Save Post Start
    public function business_profile_save() {

        $id = $_POST['business_profile_post_id'];

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('post_id' => $id, 'user_id' => $userid, 'is_delete' => 0);
        $userdata = $this->common->select_data_by_condition('business_profile_save', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $save_id = $userdata[0]['save_id'];

        if ($userdata) {

            $contition_array = array('business_delete' => 1);
            $jobdata = $this->common->select_data_by_condition('business_profile_save', $contition_array, $data = 'save_id', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $data = array(
                'business_delete' => 0,
                'business_save' => 1
            );


            $updatedata = $this->common->update_data($data, 'business_profile_save', 'save_id', $save_id);


            if ($updatedata) {

                //$savepost = '<div> Saved Post </div>';
                $savepost .= '<i class="fa fa-bookmark" aria-hidden="true"></i>';
                $savepost .= 'Saved Post';
                //$savepost .= '</a>';      
                echo $savepost;
            }
        } else {

            $data = array(
                'post_id' => $id,
                'user_id' => $userid,
                'created_date' => date('Y-m-d H:i:s', time()),
                'is_delete' => 0,
                'business_save' => 1,
                'business_delete' => 0
            );


            $insert_id = $this->common->insert_data_getid($data, 'business_profile_save');
            if ($insert_id) {
                //$savepost = '<div> Saved Post </div>';
                $savepost .= '<i class="fa fa-bookmark" aria-hidden="true"></i>';
                $savepost .= 'Saved Post';
                echo $savepost;
            }
        }
    }

    //Business Profile Save Post End
    //Business Profile Remove Save Post Start
    public function business_profile_delete($id) {

        $id = $_POST['save_id'];
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $data = array(
            'business_save' => 0,
            'business_delete' => 1,
            'modify_date' => date('Y-m-d h:i:s', time())
        );

        $updatedata = $this->common->update_data($data, 'business_profile_save', 'save_id', $id);
    }

    //Business Profile Remove Save Post Start
//location automatic retrieve controller start
    public function location() {
        $json = [];

        $this->load->database('aileensoul');



        if (!empty($this->input->get("q"))) {
            $search_condition = "(city_name LIKE '" . trim($this->input->get("q")) . "%')";

            $tolist = $this->common->select_data_by_search('cities', $search_condition, $contition_array = array(), $data = 'city_id as id,city_name as text', $sortby = 'city_name', $orderby = 'desc', $limit = '', $offset = '', $join_str5 = '', $groupby = '');

//echo '<pre>'; print_r($tolist); die();
        }
        //  echo json_encode($tolist);
        echo json_encode($tolist);
    }

//location automatic retrieve controller End
    // user list of artistic users

    public function userlist() {
        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $artdata = $this->data['artdata'] = $this->common->select_data_by_id('business_profile', 'user_id', $userid, $data = '*');

        $contition_array = array('business_step' => 4, 'user_id' => $userid);
        $this->data['artisticdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('business_step' => 4, 'is_deleted' => 0, 'status' => 1, 'user_id !=' => $userid);
        $this->data['userlist'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//echo '<pre>'; print_r($this->data['userlist']); die();

        $contition_array = array('user_id' => $userid, 'is_deleted' => 0, 'status' => 1);

        $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        // followers count
        $join_str[0]['table'] = 'follow';
        $join_str[0]['join_table_id'] = 'follow.follow_to';
        $join_str[0]['from_table_id'] = 'business_profile.business_profile_id';
        $join_str[0]['join_type'] = '';
        $contition_array = array('follow_to' => $artdata[0]['business_profile_id'], 'follow_status' => 1, 'follow_type' => 1);

        $this->data['followers'] = count($this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = ''));

        // follow count end
        // fllowing count
        $join_str[0]['table'] = 'follow';
        $join_str[0]['join_table_id'] = 'follow.follow_from';
        $join_str[0]['from_table_id'] = 'business_profile.business_profile_id';
        $join_str[0]['join_type'] = '';

        $contition_array = array('follow_from' => $artdata[0]['business_profile_id'], 'follow_status' => 1, 'follow_type' => 1, 'business_profile.business_step' => 4);

        $this->data['following'] = count($this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = ''));

        //following end

        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);
        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();

        $contition_array = array('status' => '1', 'is_delete' => '0');
        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);



        if ($this->data['artisticdata']) {
            $this->load->view('business_profile/business_userlist', $this->data);
        } else {
            redirect('business_profile/');
        }
    }

    public function follow() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $business_id = $_POST["follow_to"];

        $contition_array = array('user_id' => $userid, 'is_deleted' => 0, 'status' => 1);

        $artdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('business_profile_id' => $business_id, 'is_deleted' => 0, 'status' => 1, 'business_step' => 4);

        $busdatatoid = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_to' => $business_id);
        $follow = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($follow) {
            $data = array(
                'follow_type' => 2,
                'follow_from' => $artdata[0]['business_profile_id'],
                'follow_to' => $business_id,
                'follow_status' => 1,
            );
            $update = $this->common->update_data($data, 'follow', 'follow_id', $follow[0]['follow_id']);

            // insert notification

            $contition_array = array('not_type' => 8, 'not_from_id' => $userid, 'not_to_id' => $busdatatoid[0]['user_id'], 'not_product_id' => $follow[0]['follow_id'], 'not_from' => 6);
            $busnotification = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            //echo "<pre>"; print_r($busnotification); die();
            if ($busnotification[0]['not_read'] == 2) { //echo "hi"; die();
            } elseif ($busnotification[0]['not_read'] == 1) { //echo "hddi"; die();
                $datafollow = array(
                    'not_read' => 2,
                    'not_created_date' => date('Y-m-d H:i:s')
                );

                $where = array('not_type' => 8, 'not_from_id' => $userid, 'not_to_id' => $busdatatoid[0]['user_id'], 'not_product_id' => $follow[0]['follow_id'], 'not_from' => 6);
                $this->db->where($where);
                $updatdata = $this->db->update('notification', $datafollow);
            } else {
                $data = array(
                    'follow_type' => 2,
                    'follow_from' => $artdata[0]['business_profile_id'],
                    'follow_to' => $business_id,
                    'follow_status' => 1,
                );
                $insertdata = $this->common->insert_data($data, 'follow');

                $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_status' => 1, 'follow_to' => $business_id);
                $follow_id = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                // insert notification

                $data = array(
                    'not_type' => 8,
                    'not_from_id' => $userid,
                    'not_to_id' => $busdatatoid[0]['user_id'],
                    'not_read' => 2,
                    'not_product_id' => $follow_id[0]['follow_id'],
                    'not_from' => 6,
                    'not_created_date' => date('Y-m-d H:i:s'),
                    'not_active' => 1
                );
                $insert_id = $this->common->insert_data_getid($data, 'notification');
            }


            // $data = array(
            //     'not_type' => 8,
            //     'not_from_id' => $userid,
            //     'not_to_id' => $busdatatoid[0]['user_id'],
            //     'not_read' => 2,
            //     'not_product_id' => $follow[0]['follow_id'],
            //     'not_from' => 6,
            //     'not_created_date' => date('Y-m-d H:i:s'),
            //     'not_active' => 1
            // );
            // $insert_id = $this->common->insert_data_getid($data, 'notification');
            // end notoification

            $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_status' => 1);
            $followcount = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($update) {

                $follow = '<div id="unfollowdiv" class="user_btn">';
                $follow .= '<button class= "bg_following" id="unfollow' . $business_id . '" onClick="unfollowuser(' . $business_id . ')">
                              Following
                      </button>';
                $follow .= '</div>';

                $datacount = '(' . count($followcount) . ')';

                echo json_encode(
                        array(
                            "follow" => $follow,
                            "count" => $datacount,
                ));
            }
        } else {   //echo "hii"; die();
            $data = array(
                'follow_type' => 2,
                'follow_from' => $artdata[0]['business_profile_id'],
                'follow_to' => $business_id,
                'follow_status' => 1,
            );
            $insertdata = $this->common->insert_data($data, 'follow');


            $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_status' => 1, 'follow_to' => $business_id);
            $follow_id = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            // insert notification

            $data = array(
                'not_type' => 8,
                'not_from_id' => $userid,
                'not_to_id' => $busdatatoid[0]['user_id'],
                'not_read' => 2,
                'not_product_id' => $follow_id[0]['follow_id'],
                'not_from' => 6,
                'not_created_date' => date('Y-m-d H:i:s'),
                'not_active' => 1
            );

            $insert_id = $this->common->insert_data_getid($data, 'notification');
            $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_status' => 1);
            $followcount = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            // end notoification
            if ($insertdata) {
                $follow = '<div id="unfollowdiv" class="user_btn">';
                $follow .= '<button class="bg_following" id="unfollow' . $business_id . '" onClick="unfollowuser(' . $business_id . ')">
                               Following
                      </button>';
                $follow .= '</div>';

                $datacount = '(' . count($followcount) . ')';

                echo json_encode(
                        array(
                            "follow" => $follow,
                            "count" => $datacount,
                ));
            }
        }
    }

    public function unfollow() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $business_id = $_POST["follow_to"];

        $contition_array = array('user_id' => $userid, 'is_deleted' => 0, 'status' => 1);

        $artdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_to' => $business_id);

        $follow = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($follow) {
            $data = array(
                'follow_type' => 2,
                'follow_from' => $artdata[0]['business_profile_id'],
                'follow_to' => $business_id,
                'follow_status' => 0,
            );
            $update = $this->common->update_data($data, 'follow', 'follow_id', $follow[0]['follow_id']);


            $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_status' => 1);

            $followcount = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($update) {

                $unfollow = '<div id="followdiv " class="user_btn">';
                //    $unfollow .= '<button style="margin-top: 7px;" id="follow' . $business_id . '" onClick="followuser(' . $business_id . ')">
                $unfollow .= '<button id="follow' . $business_id . '" onClick="followuser(' . $business_id . ')">
                               Follow 
                      </button>';
                $unfollow .= '</div>';

                $datacount = '(' . count($followcount) . ')';

                echo json_encode(
                        array(
                            "follow" => $unfollow,
                            "count" => $datacount,
                ));
            }
        }
    }

    public function follow_two() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $business_id = $_POST["follow_to"];

        $contition_array = array('user_id' => $userid, 'is_deleted' => 0, 'status' => 1);

        $artdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_id' => $business_id, 'is_deleted' => 0, 'status' => 1, 'business_step' => 4);

        $busdatatoid = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_to' => $business_id);
        $follow = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($follow) {
            $data = array(
                'follow_type' => 2,
                'follow_from' => $artdata[0]['business_profile_id'],
                'follow_to' => $business_id,
                'follow_status' => 1,
            );
            $update = $this->common->update_data($data, 'follow', 'follow_id', $follow[0]['follow_id']);

            // insert notification


            $contition_array = array('not_type' => 8, 'not_from_id' => $userid, 'not_to_id' => $busdatatoid[0]['user_id'], 'not_product_id' => $follow[0]['follow_id'], 'not_from' => 6);
            $busnotification = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            //echo "<pre>"; print_r($busnotification); die();
            if ($busnotification[0]['not_read'] == 2) { //echo "hi"; die();
            } elseif ($busnotification[0]['not_read'] == 1) { //echo "hddi"; die();
                $datafollow = array(
                    'not_read' => 2
                );

                $where = array('not_type' => 8, 'not_from_id' => $userid, 'not_to_id' => $busdatatoid[0]['user_id'], 'not_product_id' => $follow[0]['follow_id'], 'not_from' => 6);
                $this->db->where($where);
                $updatdata = $this->db->update('notification', $datafollow);
            } else {


                $data = array(
                    'not_type' => 8,
                    'not_from_id' => $userid,
                    'not_to_id' => $busdatatoid[0]['user_id'],
                    'not_read' => 2,
                    'not_product_id' => $follow[0]['follow_id'],
                    'not_from' => 6,
                    'not_created_date' => date('Y-m-d H:i:s'),
                    'not_active' => 1
                );

                $insert_id = $this->common->insert_data_getid($data, 'notification');
            }
            // end notoification

            if ($update) {

                $follow = '<div class="user_btn follow_btn_' . $business_id . '" id="unfollowdiv">';
                $follow .= '<button class="bg_following" id="unfollow' . $business_id . '" onClick="unfollowuser_two(' . $business_id . ')">
                              Following
                      </button>';
                $follow .= '</div>';
                echo $follow;
            }
        } else {
            $data = array(
                'follow_type' => 2,
                'follow_from' => $artdata[0]['business_profile_id'],
                'follow_to' => $business_id,
                'follow_status' => 1,
            );
            $insert = $this->common->insert_data($data, 'follow');

            // insert notification
            $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_status' => 1, 'follow_to' => $business_id);
            $follow_id = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $datanoti = array(
                'not_type' => 8,
                'not_from_id' => $userid,
                'not_to_id' => $busdatatoid[0]['user_id'],
                'not_read' => 2,
                'not_product_id' => $follow_id[0]['follow_id'],
                'not_from' => 6,
                'not_created_date' => date('Y-m-d H:i:s'),
                'not_active' => 1
            );

            $insert_id = $this->common->insert_data_getid($datanoti, 'notification');
            // end notoification
            if ($insert) {
                $follow = '<div class="user_btn follow_btn_' . $business_id . '" id="unfollowdiv">';
                // $follow = '<button id="unfollow' . $business_id . '" onClick="unfollowuser(' . $business_id . ')">
                //                Following
                //       </button>';
                $follow .= '<button class="bg_following" id="unfollow' . $business_id . '" onClick="unfollowuser_two(' . $business_id . ')"><span>Following</span></button>';
                $follow .= '</div>';
                echo $follow;
            }
        }
    }

    public function unfollow_two() {
        $userid = $this->session->userdata('aileenuser');
        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $business_id = $_POST["follow_to"];

        $contition_array = array('user_id' => $userid, 'is_deleted' => 0, 'status' => 1);

        $artdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_to' => $business_id);

        $follow = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($follow) {
            $data = array(
                'follow_type' => 2,
                'follow_from' => $artdata[0]['business_profile_id'],
                'follow_to' => $business_id,
                'follow_status' => 0,
            );
            $update = $this->common->update_data($data, 'follow', 'follow_id', $follow[0]['follow_id']);
            if ($update) {

                $unfollow = '<div class="user_btn follow_btn_' . $business_id . '" id="followdiv">';
                // $follow = '<button id="unfollow' . $business_id . '" onClick="unfollowuser(' . $business_id . ')">
                //                Following
                //       </button>';
                $unfollow .= '<button class="follow' . $business_id . '" onClick="followuser_two(' . $business_id . ')">Follow</button>';
                $unfollow .= '</div>';
                echo $unfollow;
            }
        }
    }

    public function unfollow_following() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $business_id = $_POST["follow_to"];

        $contition_array = array('user_id' => $userid, 'is_deleted' => 0, 'status' => 1);

        $artdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_to' => $business_id);

        $follow = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($follow) {
            $data = array(
                'follow_type' => 2,
                'follow_from' => $artdata[0]['business_profile_id'],
                'follow_to' => $business_id,
                'follow_status' => 0,
            );
            $update = $this->common->update_data($data, 'follow', 'follow_id', $follow[0]['follow_id']);
            if ($update) {

                $contition_array = array('follow_from' => $artdata[0]['business_profile_id'], 'follow_status' => '1', 'follow_type' => '2');
                $followingotherdata = $this->data['followingotherdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $followingdatacount = count($followingotherdata);


                $unfollow = '<div>(';
                $unfollow .= '' . $followingdatacount . '';
                $unfollow .= ')</div>';


                if (count($followingotherdata) == 0) {
                    $notfound = '<div class="art-img-nn">
                                    <div class="art_no_post_img">

                                        <img src="' . base_url('img/icon_no_following.png') . '">

                                    </div>
                                    <div class="art_no_post_text">
                                        No Following Available.
                                    </div>
                                </div>';
                }

                echo json_encode(
                        array("unfollow" => $unfollow,
                            "notfound" => $notfound,
                            "notcount" => $followingdatacount,
                ));
            }
        }
    }

    public function followers($id = "") {
        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');
        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $userid, 'is_deleted' => 0, 'status' => 1, 'business_step' => '4');

        $artdata = $this->data['artisticdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $slugid = $artdata[0]['business_slug'];

        if ($id == $slugid || $id == '') {



            $contition_array = array('user_id' => $userid, 'is_deleted' => 0, 'status' => 1);

            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $join_str[0]['table'] = 'follow';
            $join_str[0]['join_table_id'] = 'follow.follow_to';
            $join_str[0]['from_table_id'] = 'business_profile.business_profile_id';
            $join_str[0]['join_type'] = '';

            $contition_array = array('follow_to' => $businessdata1[0]['business_profile_id'], 'follow_status' => 1, 'follow_type' => 2, 'business_profile.business_step' => 4);

            $this->data['userlist'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
        } else { //echo "hii"; die();
            $contition_array = array('business_slug' => $id, 'is_deleted' => 0, 'status' => 1, 'business_step' => 4);

            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $join_str[0]['table'] = 'follow';
            $join_str[0]['join_table_id'] = 'follow.follow_to';
            $join_str[0]['from_table_id'] = 'business_profile.business_profile_id';
            $join_str[0]['join_type'] = '';

            $contition_array = array('follow_to' => $businessdata1[0]['business_profile_id'], 'follow_status' => 1, 'follow_type' => 2, 'business_profile.business_step' => 4);

            $this->data['userlist'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');

            //echo "<pre>"; print_r($this->data['userlist']); die();
        }



        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);

        //echo "<pre>"; print_r($this->data['userlist']); die();

        if ($this->data['businessdata1']) {
            $this->load->view('business_profile/business_followers', $this->data);
        } else if (!$this->data['businessdata1'] && $id != $slugid) {

            $this->load->view('business_profile/notavalible');
        } else if (!$this->data['businessdata1'] && ($id == $slugid || $id == "")) {
            redirect('business_profile/');
        }
    }

    public function following($id = "") {
        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('user_id' => $userid, 'is_deleted' => 0, 'status' => 1, 'business_step' => '4');

        $artdata = $this->data['artisticdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $slugid = $artdata[0]['business_slug'];


        if ($id == $slug_id || $id == '') {

            $contition_array = array('user_id' => $userid);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $join_str[0]['table'] = 'follow';
            $join_str[0]['join_table_id'] = 'follow.follow_from';
            $join_str[0]['from_table_id'] = 'business_profile.business_profile_id';
            $join_str[0]['join_type'] = '';

            $contition_array = array('follow_from' => $businessdata1[0]['business_profile_id'], 'follow_status' => 1, 'follow_type' => 2, 'business_profile.business_step' => 4);

            $this->data['userlist'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
        } else {

            $contition_array = array('business_slug' => $id, 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $join_str[0]['table'] = 'follow';
            $join_str[0]['join_table_id'] = 'follow.follow_from';
            $join_str[0]['from_table_id'] = 'business_profile.business_profile_id';
            $join_str[0]['join_type'] = '';

            $contition_array = array('follow_from' => $businessdata1[0]['business_profile_id'], 'follow_status' => 1, 'follow_type' => 2, 'business_profile.business_step' => 4);

            $this->data['userlist'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
        }



// code for search
        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);



        if ($this->data['businessdata1']) {
            $this->load->view('business_profile/business_following', $this->data);
        } else if (!$this->data['businessdata1'] && $id != $slugid) {

            $this->load->view('business_profile/notavalible');
        } else if (!$this->data['businessdata1'] && ($id == $slugid || $id == "")) {
            redirect('business_profile/');
        }
    }

// end of user list
    //deactivate user start
    public function deactivate() {

        $id = $_POST['id'];

        $data = array(
            'status' => 0
        );

        $update = $this->common->update_data($data, 'business_profile', 'user_id', $id);

//        if ($update) {
//
//
//            $this->session->set_flashdata('success', 'You are deactivate successfully.');
//            redirect('dashboard', 'refresh');
//        } else {
//            $this->session->flashdata('error', 'Sorry!! Your are not deactivate!!');
//            redirect('business_profile', 'refresh');
//        }
    }

// deactivate user end

    public function image_upload_ajax() {



        session_start();


        $session_uid = $this->session->userdata('aileenuser');


        include_once 'getExtension.php';

        $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP");
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST" && isset($session_uid)) {
            $name = $_FILES['photoimg']['name'];
            $size = $_FILES['photoimg']['size'];

            if ($name) {
                $ext = $this->common->getExtension($name);
                if (in_array($ext, $valid_formats)) {
                    if ($size < (1024 * 1024)) {
                        $actual_image_name = time() . $session_uid . "." . $ext;
                        $tmp = $_FILES['photoimg']['tmp_name'];
                        $bgSave = '<div id="uX' . $session_uid . '" class="bgSave wallbutton blackButton">Save Cover</div>';


// khyati start


                        $config['upload_path'] = 'uploads/user_image/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|mpeg|mpg|mpe|qt|mov|avi|pdf';

                        $config['file_name'] = $_FILES['photoimg']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('photoimg')) {
                            $uploadData = $this->upload->data();

                            $picture = $uploadData['file_name'];
                        } else {
                            $picture = '';
                        }


                        $data = array(
                            'profile_background' => $picture
                        );

                        $update = $this->common->update_data($data, 'business_profile', 'user_id', $session_uid);
                        if ($update) {
                            $path = base_url('uploads/user_image/');
                            echo $bgSave . '<img src="' . $path . $picture . '"  id="timelineBGload" class="headerimage ui-corner-all" style="top:0px"/>';
                        } else {
                            echo "Fail upload folder with read access.";
                        }
                    } else
                        echo "Image file size max 1 MB";
                } else
                    echo "Invalid file format.";
            } else
                echo "Please select image..!";

            exit;
        }
    }

    public function image_saveBG_ajax() {



        session_start();

        $session_uid = $this->session->userdata('aileenuser');

        if (isset($_POST['position']) && isset($session_uid)) {

            $position = $_POST['position'];

            $data = array(
                'profile_background_position' => $position
            );

            $update = $this->common->update_data($data, 'business_profile', 'user_id', $session_uid);
            if ($update) {

                echo $position;
            }
        }
    }

    // khyati change end 15 2 


    function slug_script() {

        $this->db->select('business_profile_id,company_name');
        $res = $this->db->get('business_profile')->result();
        foreach ($res as $k => $v) {
            $data = array('business_slug' => $this->setcategory_slug($v->company_name, 'business_slug', 'business_profile'));
            $this->db->where('business_profile_id', $v->business_profile_id);
            $this->db->update('business_profile', $data);
        }
        echo "yes";
    }

// create pdf start

    public function creat_pdf1($id) {

        $contition_array = array('business_profile_post_id' => $id, 'status' => '1');
        $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $this->load->view('business_profile/business_pdfdispaly', $this->data);
    }

    public function creat_pdf($id) {

        $contition_array = array('image_id' => $id, 'is_deleted' => '1');
        $this->data['busdata'] = $this->common->select_data_by_condition('post_image', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo "<pre>"; print_r($this->data['artdata']); die();
        $this->load->view('business_profile/business_pdfdispaly', $this->data);
    }

//create pdf end
    // cover pic controller

    public function ajaxpro() {
        $userid = $this->session->userdata('aileenuser');

        // REMOVE OLD IMAGE FROM FOLDER
        $contition_array = array('user_id' => $userid);
        $user_reg_data = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'profile_background,profile_background_main', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $user_reg_prev_image = $user_reg_data[0]['profile_background'];
        $user_reg_prev_main_image = $user_reg_data[0]['profile_background_main'];

        if ($user_reg_prev_image != '') {
            $user_image_main_path = $this->config->item('bus_bg_main_upload_path');
            $user_bg_full_image = $user_image_main_path . $user_reg_prev_image;
            if (isset($user_bg_full_image)) {
                unlink($user_bg_full_image);
            }

            $user_image_thumb_path = $this->config->item('bus_bg_thumb_upload_path');
            $user_bg_thumb_image = $user_image_thumb_path . $user_reg_prev_image;
            if (isset($user_bg_thumb_image)) {
                unlink($user_bg_thumb_image);
            }
        }
        if ($user_reg_prev_main_image != '') {
            $user_image_original_path = $this->config->item('bus_bg_original_upload_path');
            $user_bg_origin_image = $user_image_original_path . $user_reg_prev_main_image;
            if (isset($user_bg_origin_image)) {
                unlink($user_bg_origin_image);
            }
        }

        // REMOVE OLD IMAGE FROM FOLDER
        $data = $_POST['image'];
        /*
          $imageName = time() . '.png';
          $base64string = $data;
          file_put_contents('uploads/bus_bg/' . $imageName, base64_decode(explode(',', $base64string)[1]));
         */
        $user_bg_path = $this->config->item('bus_bg_main_upload_path');
        $imageName = time() . '.png';
        $base64string = $data;
        file_put_contents($user_bg_path . $imageName, base64_decode(explode(',', $base64string)[1]));

        $user_thumb_path = $this->config->item('bus_bg_thumb_upload_path');
        $user_thumb_width = $this->config->item('bus_bg_thumb_width');
        $user_thumb_height = $this->config->item('bus_bg_thumb_height');

        $upload_image = $user_bg_path . $imageName;

        $thumb_image_uplode = $this->thumb_img_uplode($upload_image, $imageName, $user_thumb_path, $user_thumb_width, $user_thumb_height);


        $data = array(
            'profile_background' => $imageName
        );

        $update = $this->common->update_data($data, 'business_profile', 'user_id', $userid);

        $this->data['busdata'] = $this->common->select_data_by_id('business_profile', 'user_id', $userid, $data = '*', $join_str = array());

        echo '<img src="' . $this->data['busdata'][0]['profile_background'] . '" />';
    }

    public function imagedata() {
        $userid = $this->session->userdata('aileenuser');

        $config['upload_path'] = $this->config->item('bus_bg_original_upload_path');
        $config['allowed_types'] = 'jpg|jpeg|png|gif';

        $config['file_name'] = $_FILES['image']['name'];

        //Load upload library and initialize configuration
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {

            $uploadData = $this->upload->data();

            $image = $uploadData['file_name'];
        } else {

            $image = '';
        }


        $data = array(
            'profile_background_main' => $image,
            'modified_date' => date('Y-m-d h:i:s', time())
        );


        $updatedata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);

        if ($updatedata) {
            echo $userid;
        } else {
            echo "welcome";
        }
    }

    // cover pic end
// busienss_profile like comment ajax start

    public function like_comment() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_id = $_POST["post_id"];


        $contition_array = array('business_profile_post_comment_id' => $_POST["post_id"], 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $business_comment_likes_count = $businessprofiledata[0]['business_comment_likes_count'];
        $likeuserarray = explode(',', $businessprofiledata[0]['business_comment_like_user']);

        if (!in_array($userid, $likeuserarray)) { //echo "falguni"; die();
            $user_array = array_push($likeuserarray, $userid);

            if ($businessprofiledata[0]['business_comment_likes_count'] == 0) {
                $userid = implode('', $likeuserarray);
            } else {
                $userid = implode(',', $likeuserarray);
            }

            $data = array(
                'business_comment_likes_count' => $business_comment_likes_count + 1,
                'business_comment_like_user' => $userid,
                'modify_date' => date('y-m-d h:i:s')
            );



            $updatdata = $this->common->update_data($data, 'business_profile_post_comment', 'business_profile_post_comment_id', $post_id);



            // insert notification

            if ($businessprofiledata[0]['user_id'] == $userid) {
                
            } else {

                $contition_array = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $businessprofiledata[0]['user_id'], 'not_product_id' => $post_id, 'not_from' => 6, 'not_img' => 3);
                $busnotification = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                if ($busnotification[0]['not_read'] == 2) {
                    
                } elseif ($busnotification[0]['not_read'] == 1) {

                    $datalike = array(
                        'not_read' => 2
                    );

                    $where = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $businessprofiledata[0]['user_id'], 'not_product_id' => $post_id, 'not_from' => 6, 'not_img' => 3);
                    $this->db->where($where);
                    $updatdata = $this->db->update('notification', $datalike);
                } else {

                    $datacmlike = array(
                        'not_type' => 5,
                        'not_from_id' => $userid,
                        'not_to_id' => $businessprofiledata[0]['user_id'],
                        'not_read' => 2,
                        'not_product_id' => $post_id,
                        'not_from' => 6,
                        'not_img' => 3,
                        'not_created_date' => date('Y-m-d H:i:s'),
                        'not_active' => 1
                    );


                    $insert_id = $this->common->insert_data_getid($datacmlike, 'notification');
                }
            }
            // end notoification


            $contition_array = array('business_profile_post_comment_id' => $_POST["post_id"], 'status' => '1');
            $businessprofiledata1 = $this->data['businessprofiledata1'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($updatdata) {


                $cmtlike1 = '<a id="' . $businessprofiledata1[0]['business_profile_post_comment_id'] . '" onClick="comment_like(this.id)">';
                $cmtlike1 .= ' <i class="fa fa-thumbs-up main_color" aria-hidden="true">';
                $cmtlike1 .= '</i>';
                $cmtlike1 .= '<span> ';
                if ($businessprofiledata1[0]['business_comment_likes_count'] > 0) {
                    $cmtlike1 .= $businessprofiledata1[0]['business_comment_likes_count'] . '';
                }
                $cmtlike1 .= '</span>';
                $cmtlike1 .= '</a>';
                echo $cmtlike1;
            } else {
                
            }
        } else {

            foreach ($likeuserarray as $key => $val) {
                if ($val == $userid) {
                    $user_array = array_splice($likeuserarray, $key, 1);
                }
            }

            $data = array(
                'business_comment_likes_count' => $business_comment_likes_count - 1,
                'business_comment_like_user' => implode(',', $likeuserarray),
                'modify_date' => date('y-m-d h:i:s')
            );


            $updatdata = $this->common->update_data($data, 'business_profile_post_comment', 'business_profile_post_comment_id', $post_id);
            $contition_array = array('business_profile_post_comment_id' => $_POST["post_id"], 'status' => '1');
            $businessprofiledata2 = $this->data['businessprofiledata2'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($updatdata) {

                $cmtlike1 = '<a id="' . $businessprofiledata2[0]['business_profile_post_comment_id'] . '" onClick="comment_like(this.id)">';
                $cmtlike1 .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true">';
                $cmtlike1 .= '</i>';
                $cmtlike1 .= '<span>';
                if ($businessprofiledata2[0]['business_comment_likes_count'] > 0) {
                    $cmtlike1 .= $businessprofiledata2[0]['business_comment_likes_count'] . '';
                }
                $cmtlike1 .= '</span>';
                $cmtlike1 .= '</a>';
                echo $cmtlike1;
            } else {
                
            }
        }
    }

    public function like_comment1() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_id = $_POST["post_id"];


        $contition_array = array('business_profile_post_comment_id' => $_POST["post_id"], 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $business_comment_likes_count = $businessprofiledata[0]['business_comment_likes_count'];
        $likeuserarray = explode(',', $businessprofiledata[0]['business_comment_like_user']);

        if (!in_array($userid, $likeuserarray)) { //echo "falguni"; die();
            $user_array = array_push($likeuserarray, $userid);

            if ($businessprofiledata[0]['business_comment_likes_count'] == 0) {
                $userid = implode('', $likeuserarray);
            } else {
                $userid = implode(',', $likeuserarray);
            }

            $data = array(
                'business_comment_likes_count' => $business_comment_likes_count + 1,
                'business_comment_like_user' => $userid,
                'modify_date' => date('y-m-d h:i:s')
            );



            $updatdata = $this->common->update_data($data, 'business_profile_post_comment', 'business_profile_post_comment_id', $post_id);


            // insert notification

            if ($businessprofiledata[0]['user_id'] == $userid) {
                
            } else {

                $contition_array = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $businessprofiledata[0]['user_id'], 'not_product_id' => $post_id, 'not_from' => 6, 'not_img' => 3);
                $busnotification = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                if ($busnotification[0]['not_read'] == 2) {
                    
                } elseif ($busnotification[0]['not_read'] == 1) {

                    $datalike = array(
                        'not_read' => 2
                    );

                    $where = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $businessprofiledata[0]['user_id'], 'not_product_id' => $post_id, 'not_from' => 6, 'not_img' => 3);
                    $this->db->where($where);
                    $updatdata = $this->db->update('notification', $datalike);
                } else {

                    $data = array(
                        'not_type' => 5,
                        'not_from_id' => $userid,
                        'not_to_id' => $businessprofiledata[0]['user_id'],
                        'not_read' => 2,
                        'not_product_id' => $post_id,
                        'not_from' => 6,
                        'not_img' => 3,
                        'not_created_date' => date('Y-m-d H:i:s'),
                        'not_active' => 1
                    );

                    $insert_id = $this->common->insert_data_getid($data, 'notification');
                }
            }
            // end notoification



            $contition_array = array('business_profile_post_comment_id' => $_POST["post_id"], 'status' => '1');
            $businessprofiledata1 = $this->data['businessprofiledata1'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($updatdata) {


                $cmtlike1 = '<a id="' . $businessprofiledata1[0]['business_profile_post_comment_id'] . '" onClick="comment_like1(this.id)">';
                // $cmtlike1 .= ' <i class="fa fa-thumbs-up" aria-hidden="true">';
                // $cmtlike1 .= '</i>';
                $cmtlike1 .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true">';
                $cmtlike1 .= '</i>';
                $cmtlike1 .= '<span> ';
                if ($businessprofiledata1[0]['business_comment_likes_count'] > 0) {
                    $cmtlike1 .= $businessprofiledata1[0]['business_comment_likes_count'] . '';
                }
                $cmtlike1 .= '</span>';
                $cmtlike1 .= '</a>';
                echo $cmtlike1;
            } else {
                
            }
        } else {

            foreach ($likeuserarray as $key => $val) {
                if ($val == $userid) {
                    $user_array = array_splice($likeuserarray, $key, 1);
                }
            }

            $data = array(
                'business_comment_likes_count' => $business_comment_likes_count - 1,
                'business_comment_like_user' => implode(',', $likeuserarray),
                'modify_date' => date('y-m-d h:i:s')
            );


            $updatdata = $this->common->update_data($data, 'business_profile_post_comment', 'business_profile_post_comment_id', $post_id);
            $contition_array = array('business_profile_post_comment_id' => $_POST["post_id"], 'status' => '1');
            $businessprofiledata2 = $this->data['businessprofiledata2'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($updatdata) {

                $cmtlike1 = '<a id="' . $businessprofiledata2[0]['business_profile_post_comment_id'] . '" onClick="comment_like1(this.id)">';
                $cmtlike1 .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true">';
                $cmtlike1 .= '</i>';

                // $cmtlike1 .= '<i class="fa fa-thumbs-up fa-1x main_color" aria-hidden="true">';
                // $cmtlike1 .= '</i>';
                $cmtlike1 .= '<span> ';
                if ($businessprofiledata2[0]['business_comment_likes_count'] > 0) {
                    $cmtlike1 .= $businessprofiledata2[0]['business_comment_likes_count'] . '';
                }
                $cmtlike1 .= '</span>';
                $cmtlike1 .= '</a>';
                echo $cmtlike1;
            } else {
                
            }
        }
    }

// Business_profile comment like end 
//Business_profile comment delete start
    public function delete_comment() {
        $userid = $this->session->userdata('aileenuser');
        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_id = $_POST["post_id"];
        $post_delete = $_POST["post_delete"];

        $data = array(
            'status' => 0,
        );


        $updatdata = $this->common->update_data($data, 'business_profile_post_comment', 'business_profile_post_comment_id', $post_id);


        $contition_array = array('business_profile_post_id' => $post_delete, 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_post_id' => $post_delete, 'status' => '1');
        $buscmtcnt = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo '<pre>'; print_r($businessprofiledata); die();
// khyati changes start
        if (count($businessprofiledata) > 0) {
            foreach ($businessprofiledata as $business_profile) {

                $companyname = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->company_name;
                $companyslug = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->business_slug;
                $business_userimage = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id'], 'status' => 1))->row()->business_user_image;

                $cmtinsert .= '<div class="all-comment-comment-box">';
                $cmtinsert .= '<div class="post-design-pro-comment-img"><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">';

                if ($business_userimage != '') {

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                        $a = $companyname;
                        $acr = substr($a, 0, 1);

                        $cmtinsert .= '<div class="post-img-div">';
                        $cmtinsert .= ucfirst(strtolower($acr));
                        $cmtinsert .= '</div>';
                    } else {

                        $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                    }


                    $cmtinsert .= '</div>';
                } else {


                    $a = $companyname;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';

                    $cmtinsert .= '</div>';
                }
                $cmtinsert .= '</a><div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . $companyname . '</a></b>';
                $cmtinsert .= '</div>';
                $cmtinsert .= '<div class="comment-details" id= "showcomment' . $business_profile['business_profile_post_comment_id'] . '"" >';
                $cmtinsert .= $this->common->make_links($business_profile['comments']);
                $cmtinsert .= '</div>';
                $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
                //$cmtinsert .= '<textarea type="text" class="textarea" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcomment' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;resize: none;" onClick="commentedit(this.name)">' . $business_profile['comments'] . '</textarea>';
                $cmtinsert .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $business_profile['business_profile_post_comment_id'] . '"  id="editcomment' . $business_profile['business_profile_post_comment_id'] . '" placeholder="Type Message ..." onkeyup="commentedit(' . $business_profile['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $business_profile['comments'] . '</div>';
                $cmtinsert .= '<span class="comment-edit-button"><button id="editsubmit' . $business_profile['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_comment(' . $business_profile['business_profile_post_comment_id'] . ')">Save</button></span>';
                $cmtinsert .= '</div></div>';
//                $cmtinsert .= '<input type="text" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcomment' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;" value="' . $business_profile['comments'] . ' " onClick="commentedit(this.name)">';
//                $cmtinsert .= '<button id="editsubmit' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;" onClick="edit_comment(' . $business_profile['business_profile_post_comment_id'] . ')">Comment</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';
                $cmtinsert .= '<div class="art-comment-menu-design"><div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';
                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_like1(this.id)">';

                $userid = $this->session->userdata('aileenuser');
                $contition_array = array('business_profile_post_comment_id' => $business_profile['business_profile_post_comment_id'], 'status' => '1');
                $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

                if (!in_array($userid, $likeuserarray)) {
                    $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
                } else {
                    $cmtinsert .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true"></i>';
                }


                $cmtinsert .= '<span>';
                if ($business_profile['business_comment_likes_count'] > 0) {
                    $cmtinsert .= ' ' . $business_profile['business_comment_likes_count'];
                }
                $cmtinsert .= '</span>';
                $cmtinsert .= '</a></div>';


                $userid = $this->session->userdata('aileenuser');
                if ($business_profile['user_id'] == $userid) {

                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<div id="editcommentbox' . $business_profile['business_profile_post_comment_id'] . '"style="display:block;">';

                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_editbox(this.id)">';
                    $cmtinsert .= 'Edit';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '<div id="editcancle' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;">';

                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_editcancle(this.id)">';
                    $cmtinsert .= 'Cancel';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '</div>';
                }




                $userid = $this->session->userdata('aileenuser');

                $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $business_profile['business_profile_post_id'], 'status' => 1))->row()->user_id;


                if ($business_profile['user_id'] == $userid || $business_userid == $userid) {

                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<input type="hidden" name="post_delete"';
                    $cmtinsert .= 'id="post_delete' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'value= "' . $business_profile['business_profile_post_id'] . '">';
                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_delete(this.id)">';
                    $cmtinsert .= 'Delete';
                    $cmtinsert .= '</a></div>';
                }

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';
                $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($business_profile['created_date']))) . '</p></div></div></div>';


                // comment aount variable start
                $idpost = $business_profile['business_profile_post_id'];
                $cmtcount = '<a onClick="commentall(this.id)" id="' . $idpost . '">';
                $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
                $cmtcount .= ' ' . count($buscmtcnt) . '';
                $cmtcount .= '</i></a>';

                // comment count variable end 
            }
            if (count($buscmtcnt) > 0) {
                $cntinsert .= '' . count($buscmtcnt) . '';
                $cntinsert .= '<span> Comment</span>';
            }
        } else {
            $idpost = $business_profile['business_profile_post_id'];
            $cmtcount = '<a onClick="commentall(this.id)" id="' . $idpost . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= '</i></a>';
        }
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => $cntinsert
        ));
    }

//second page manage in manage post for function start

    public function delete_commenttwo() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_id = $_POST["post_id"];
        $post_delete = $_POST["post_delete"];

        $data = array(
            'status' => 0,
        );
        $updatdata = $this->common->update_data($data, 'business_profile_post_comment', 'business_profile_post_comment_id', $post_id);


        $contition_array = array('business_profile_post_id' => $post_delete, 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'ASCdelete_commenttwo', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo '<pre>'; print_r($businessprofiledata); die();
// khyati changes start
        if (count($businessprofiledata) > 0) {
            foreach ($businessprofiledata as $business_profile) {

                $companyname = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->company_name;
                $companyslug = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->business_slug;
                
                $business_userimage = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id'], 'status' => 1))->row()->business_user_image;

                $cmtinsert .= '<div class="all-comment-comment-box">';
                $cmtinsert .= '<div class="post-design-pro-comment-img"><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">';
                if ($business_userimage != '') {


                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                        $a = $companyname;
                        $acr = substr($a, 0, 1);

                        $cmtinsert .= '<div class="post-img-div">';
                        $cmtinsert .= ucfirst(strtolower($acr));
                        $cmtinsert .= '</div>';
                    } else {
                        $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                    }

                    $cmtinsert .= '</div>';
                } else {
                    $a = $companyname;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';
                    $cmtinsert .= '</div>';
                }
                $cmtinsert .= '</a><div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . $companyname . '</a></b>';
                $cmtinsert .= '</div>';
                $cmtinsert .= '<div class="comment-details" id="showcommenttwo' . $business_profile['business_profile_post_comment_id'] . '">';
                $cmtinsert .= $this->common->make_links($business_profile['comments']);
                $cmtinsert .= '</div>';
                $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
                //$cmtinsert .= '<textarea type="text" class="textarea" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;resize: none;" onClick="commentedittwo(this.name)">' . $business_profile['comments'] . '</textarea>';
                $cmtinsert .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $business_profile['business_profile_post_comment_id'] . '"  id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '" placeholder="Type Message ..." onkeyup="commentedittwo(' . $business_profile['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $business_profile['comments'] . '</div>';
                $cmtinsert .= '<span class="comment-edit-button"><button id="editsubmittwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_commenttwo(' . $business_profile['business_profile_post_comment_id'] . ')">Save</button></span>';
                $cmtinsert .= '</div></div>';
//                $cmtinsert .= '<input type="text" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;" value="' . $business_profile['comments'] . ' " onClick="commentedittwo(this.name)">';
//                $cmtinsert .= '<button id="editsubmittwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;" onClick="edit_commenttwo(' . $business_profile['business_profile_post_comment_id'] . ')">Comment</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';

                $cmtinsert .= '<div class="art-comment-menu-design"><div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';
                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_like1(this.id)">';

                $userid = $this->session->userdata('aileenuser');
                $contition_array = array('business_profile_post_comment_id' => $business_profile['business_profile_post_comment_id'], 'status' => '1');
                $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

                if (!in_array($userid, $likeuserarray)) {


                    $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
                } else {
                    $cmtinsert .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true"></i>';
                }


                $cmtinsert .= '<span>';
                if ($business_profile['business_comment_likes_count'] > 0) {
                    $cmtinsert .= ' ' . $business_profile['business_comment_likes_count'];
                }
                $cmtinsert .= '</span>';
                $cmtinsert .= '</a></div>';


                $userid = $this->session->userdata('aileenuser');
                if ($business_profile['user_id'] == $userid) {

                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<div id="editcommentboxtwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:block;">';

                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_editboxtwo(this.id)">';
                    $cmtinsert .= 'Edit';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '<div id="editcancletwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;">';

                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_editcancletwo(this.id)">';
                    $cmtinsert .= 'Cancel';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '</div>';
                }




                $userid = $this->session->userdata('aileenuser');

                $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $business_profile['business_profile_post_id'], 'status' => 1))->row()->user_id;


                if ($business_profile['user_id'] == $userid || $business_userid == $userid) {

                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<input type="hidden" name="post_deletetwo"';
                    $cmtinsert .= 'id="post_deletetwo' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'value= "' . $business_profile['business_profile_post_id'] . '">';
                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_deletetwo(this.id)">';
                    $cmtinsert .= 'Delete';
                    $cmtinsert .= '</a></div>';
                }

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';
                $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($business_profile['created_date']))) . '</p></div></div></div>';
                // comment aount variable start
                $idpost = $business_profile['business_profile_post_id'];
                $cmtcount = '<a onClick="commentall1(this.id)" id="' . $idpost . '">';
                $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
                $cmtcount .= ' ' . count($businessprofiledata) . '';
                $cmtcount .= '</i></a>';

                // comment count variable end 
            }

            if (count($businessprofiledata) > 0) {
                $cntinsert .= '' . count($businessprofiledata) . '';
                $cntinsert .= '<span> Comment</span>';
            }
        } else {
            $idpost = $business_profile['business_profile_post_id'];
            $cmtcount = '<a onClick="commentall1(this.id)" id="' . $idpost . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= '</i></a>';
        }
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => $cntinsert,
                    "total_comment_count" => count($businessprofiledata),
        ));
    }

//Business_profile comment delete end     
// Business_profile post like start

    public function like_post() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_id = $_POST["post_id"];

        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $business_likes_count = $businessprofiledata[0]['business_likes_count'];
        $likeuserarray = explode(',', $businessprofiledata[0]['business_like_user']);

        if (!in_array($userid, $likeuserarray)) {

            $user_array = array_push($likeuserarray, $userid);

            if ($businessprofiledata[0]['business_likes_count'] == 0) {
                $useridin = implode('', $likeuserarray);
            } else {
                $useridin = implode(',', $likeuserarray);
            }

            $data = array(
                'business_likes_count' => $business_likes_count + 1,
                'business_like_user' => $useridin,
                'modify_date' => date('y-m-d h:i:s')
            );


            $updatdata = $this->common->update_data($data, 'business_profile_post', 'business_profile_post_id', $post_id);


            // insert notification
            if ($businessprofiledata[0]['user_id'] == $userid || $businessprofiledata[0]['is_delete'] == '1') {
                
            } else {

                $contition_array = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $businessprofiledata[0]['user_id'], 'not_product_id' => $post_id, 'not_from' => 6, 'not_img' => 2);
                $busnotification = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                if ($busnotification[0]['not_read'] == 2) {
                    
                } elseif ($busnotification[0]['not_read'] == 1) {

                    $datalike = array(
                        'not_read' => 2
                    );

                    $where = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $businessprofiledata[0]['user_id'], 'not_product_id' => $post_id, 'not_from' => 6, 'not_img' => 2);
                    $this->db->where($where);
                    $updatdata = $this->db->update('notification', $datalike);
                } else {

                    $datalike = array(
                        'not_type' => 5,
                        'not_from_id' => $userid,
                        'not_to_id' => $businessprofiledata[0]['user_id'],
                        'not_read' => 2,
                        'not_product_id' => $post_id,
                        'not_from' => 6,
                        'not_img' => 2,
                        'not_created_date' => date('Y-m-d H:i:s'),
                        'not_active' => 1
                    );
                    //echo "<pre>"; print_r($data); die();

                    $insert_id = $this->common->insert_data_getid($datalike, 'notification');
                }
            }
            // end notoification




            $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
            $businessprofiledata1 = $this->data['businessprofiledata1'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($updatdata) {
                //echo"add";

                $cmtlike = '<li>';
                $cmtlike .= '<a id="' . $businessprofiledata1[0]['business_profile_post_id'] . '" class="ripple like_h_w" onClick="post_like(this.id)">';
                $cmtlike .= ' <i class="fa fa-thumbs-up main_color" aria-hidden="true">';
                $cmtlike .= '</i>';
                $cmtlike .= '<span class="like_As_count"> ';
                if ($businessprofiledata1[0]['business_likes_count'] > 0) {
                    $cmtlike .= $businessprofiledata1[0]['business_likes_count'] . '';
                }
                $cmtlike .= '</span>';
                $cmtlike .= '</a>';
                $cmtlike .= '</li>';
                //echo $cmtlike;
                //popup box start like user name
                //$cmtlikeuser .= '<div id=popuplike' . $businessprofiledata1[0]['business_profile_post_id'] . ' class="overlay">';
                //$cmtlikeuser .= '<div class="popup">';
                //$cmtlikeuser .= '<div class="pop_content">';

                $contition_array = array('business_profile_post_id' => $businessprofiledata1['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $likeuser = $commnetcount[0]['business_like_user'];
                $countlike = $commnetcount[0]['business_likes_count'] - 1;

                $likelistarray = explode(',', $likeuser);

                foreach ($likelistarray as $key => $value) {
                    $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
                    //  $cmtlikeuser .= '<a href="' . base_url('business_profile/business_resume/' . $value) . '">';
                    //  $cmtlikeuser .= '' . ucwords($business_fname1) . '&nbsp;';
                    //  $cmtlikeuser .= '</a>';
                }

                // $cmtlikeuser .= '<p class="okk"><a class="cnclbtn" href="#">Cancel</a></p>';
                // $cmtlikeuser .= '</div>';
                // $cmtlikeuser .= '</div>';
                // $cmtlikeuser .= '</div>';
//popup box end like user name
//                $cmtlikeuser .= '<a href=#popuplike' . $businessprofiledata1[0]['business_profile_post_id'] . '>';
                //$cmtlikeuser .= '<div style="padding-top: 6px; padding-bottom: 6px;">';
                $cmtlikeuser .= '<div class="like_one_other">';
                $cmtlikeuser .= ' <a href="javascript:void(0);"  onclick="likeuserlist(' . $businessprofiledata1[0]['business_profile_post_id'] . ');">';


                $contition_array = array('business_profile_post_id' => $businessprofiledata1[0]['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $likeuser = $commnetcount[0]['business_like_user'];
                $countlike = $commnetcount[0]['business_likes_count'] - 1;

                $likelistarray = explode(',', $likeuser);
                $likelistarray = array_reverse($likelistarray);

                $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $likelistarray[0], 'status' => 1))->row()->company_name;

                // $cmtlikeuser .= '<div class="fl" style=" padding-left: 22px;" >';


                if ($userid == $likelistarray[0]) {
                    $cmtlikeuser .= 'You ';
                } else {
                    $cmtlikeuser .= '' . ucfirst(strtolower($business_fname1)) . '&nbsp;';
                }


                if (count($likelistarray) > 1) {

//                    $cmtlikeuser .= '<div class="fl" style="padding-right: 5px;">';
                    // $cmtlikeuser .= '<div class="like_one_other">';
                    $cmtlikeuser .= ' and';
                    //$cmtlikeuser .= '</div>';
                    //$cmtlikeuser .= '<div style="padding-left: 5px;">';
                    $cmtlikeuser .= ' ' . $countlike . ' others';
                    //$cmtlikeuser .= '</div>';
                }

                $cmtlikeuser .= '</a>';
                $cmtlikeuser .= '</div>';
                //$cmtlikeuser .= '</div>';
                // $like_user_count = $commnetcount[0]['business_likes_count'];
                if ($commnetcount[0]['business_likes_count'] > 0) {
                    $like_user_count .= '' . $commnetcount[0]['business_likes_count'] . '';
                    $like_user_count .= '<span> Like</span>';
                }
                echo json_encode(
                        array("like" => $cmtlike,
                            "likeuser" => $cmtlikeuser,
                            "like_user_count" => $like_user_count,
                            "like_user_total_count" => $commnetcount[0]['business_likes_count']));
            } else {
                
            }
        } else {

            foreach ($likeuserarray as $key => $val) {
                if ($val == $userid) { //echo $key;
                    $user_array = array_splice($likeuserarray, $key, 1);
                }
            }

            $data = array(
                'business_likes_count' => $business_likes_count - 1,
                'business_like_user' => implode(',', $likeuserarray),
                'modify_date' => date('y-m-d h:i:s')
            );


            $updatdata = $this->common->update_data($data, 'business_profile_post', 'business_profile_post_id', $post_id);
            $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
            $businessprofiledata2 = $this->data['businessprofiledata2'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($updatdata) {

                $cmtlike = '<li>';
                $cmtlike .= '<a id="' . $businessprofiledata2[0]['business_profile_post_id'] . '" class="ripple like_h_w" onClick="post_like(this.id)">';
                $cmtlike .= '<i class="fa fa-thumbs-up" style="color: #999;" aria-hidden="true">';
                $cmtlike .= '</i>';
                $cmtlike .= '<span class="like_As_count">';
                if ($businessprofiledata2[0]['business_likes_count'] > 0) {
                    $cmtlike .= $businessprofiledata2[0]['business_likes_count'] . '';
                }
                $cmtlike .= '</span>';
                $cmtlike .= '</a>';
                $cmtlike .= '</li>';
//echo $cmtlike;
//popup box start like user name
                //popup box start like user name
                // $cmtlikeuser .= '<div id=popuplike' . $businessprofiledata2[0]['business_profile_post_id'] . ' class="overlay">';
                // $cmtlikeuser .= '<div class="popup">';
                //$cmtlikeuser .= '<div class="pop_content">';

                $contition_array = array('business_profile_post_id' => $businessprofiledata2['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $likeuser = $commnetcount[0]['business_like_user'];
                $countlike = $commnetcount[0]['business_likes_count'] - 1;

                $likelistarray = explode(',', $likeuser);
                $likelistarray = array_reverse($likelistarray);
                foreach ($likelistarray as $key => $value) {
                    $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
                    //  $cmtlikeuser .= '<a href="' . base_url('business_profile/business_resume/' . $value) . '">';
                    //  $cmtlikeuser .= '' . ucwords($business_fname1) . '&nbsp;';
                    //  $cmtlikeuser .= '</a>';
                }

                //$cmtlikeuser .= '<p class="okk"><a class="cnclbtn" href="#">Cancel</a></p>';
                //$cmtlikeuser .= '</div>';
                //$cmtlikeuser .= '</div>';
                //$cmtlikeuser .= '</div>';
//popup box end like user name
//                $cmtlikeuser .= '<a href=#popuplike' . $businessprofiledata2[0]['business_profile_post_id'] . '>';
                //$cmtlikeuser .= '<div style="padding-top: 6px; padding-bottom: 6px;">';
                $cmtlikeuser .= '<div class="like_one_other">';

                $cmtlikeuser .= '<a href="javascript:void(0);" class="ripple like_h_w" onclick="likeuserlist(' . $businessprofiledata2[0]['business_profile_post_id'] . ')">';
                $contition_array = array('business_profile_post_id' => $businessprofiledata2[0]['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $likeuser = $commnetcount[0]['business_like_user'];
                $countlike = $commnetcount[0]['business_likes_count'] - 1;

                $likelistarray = explode(',', $likeuser);

                $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $likelistarray[0], 'status' => 1))->row()->company_name;

                //$cmtlikeuser .= '<div class="fl" style=" padding-left: 22px;" >';

                $cmtlikeuser .= '' . ucfirst(strtolower($business_fname1)) . '&nbsp;';



                if (count($likelistarray) > 1) {

                    //$cmtlikeuser .= '<div class="fl" style="padding-right: 5px;">';
                    $cmtlikeuser .= 'and';
                    //$cmtlikeuser .= '</div>';
                    //$cmtlikeuser .= '<div style="padding-left: 5px;">';
                    $cmtlikeuser .= ' ' . $countlike . ' others';
                    //$cmtlikeuser .= '</div>';
                }
                $cmtlikeuser .= '</a>';
                $cmtlikeuser .= '</div>';


                // $like_user_count = $commnetcount[0]['business_likes_count'];


                if ($commnetcount[0]['business_likes_count'] > 0) {
                    $like_user_count .= '' . $commnetcount[0]['business_likes_count'] . '';
                    $like_user_count .= '<span> Like</span>';
                }
//                $like_user_count = $businessprofiledata1[0]['business_likes_count'];
                echo json_encode(
                        array("like" => $cmtlike,
                            "likeuser" => $cmtlikeuser,
                            "like_user_count" => $like_user_count,
                            "like_user_total_count" => $commnetcount[0]['business_likes_count']
                ));
            } else {
                
            }
        }

//jsondata
    }

// business_profile post  like end
//business_profile comment insert start

    public function insert_commentthree() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_id = $_POST["post_id"];
        $post_comment = $_POST["comment"];

        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $busdatacomment = $this->data['busdatacomment'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $data = array(
            'user_id' => $userid,
            'business_profile_post_id' => $post_id,
            'comments' => $post_comment,
            'created_date' => date('Y-m-d H:i:s', time()),
            'status' => 1,
            'is_delete' => 0
        );


        $insert_id = $this->common->insert_data_getid($data, 'business_profile_post_comment');

        // insert notification

        if ($busdatacomment[0]['user_id'] == $userid || $busdatacomment[0]['is_delete'] == '1') {
            
        } else {
            $notificationdata = array(
                'not_type' => 6,
                'not_from_id' => $userid,
                'not_to_id' => $busdatacomment[0]['user_id'],
                'not_read' => 2,
                'not_product_id' => $insert_id,
                'not_from' => 6,
                'not_img' => 1,
                'not_created_date' => date('Y-m-d H:i:s'),
                'not_active' => 1
            );
            //echo "<pre>"; print_r($notificationdata); 
            $insert_id_notification = $this->common->insert_data_getid($notificationdata, 'notification');
        }
        // end notoification

        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');
//echo "<pre>"; print_r($businessprofiledata); die();

        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $buscmtcnt = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
// khyati changes start

        foreach ($businessprofiledata as $business_profile) {

            $company_name = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->company_name;
            $companyslug = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->business_slug;
            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id'], 'status' => 1))->row()->business_user_image;

            // $cmtinsert = '<div class="all-comment-comment-box">';

            $cmtinsert .= '<div class="all-comment-comment-box">';
            $cmtinsert .= '<div class="post-design-pro-comment-img"><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">';
            if ($business_userimage != '') {


                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                    $a = $company_name;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';
                } else {
                    $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                }


                $cmtinsert .= '</div>';
            } else {
                $a = $company_name;
                $acr = substr($a, 0, 1);

                $cmtinsert .= '<div class="post-img-div">';
                $cmtinsert .= ucfirst(strtolower($acr));
                $cmtinsert .= '</div>';
                $cmtinsert .= '</div>';
            }
            $cmtinsert .= '</a><div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . ucfirst(strtolower($company_name)) . '</a></b>';
            $cmtinsert .= '</div>';
            $cmtinsert .= '<div class="comment-details" id="showcomment' . $business_profile['business_profile_post_comment_id'] . '">';
            $cmtinsert .= $this->common->make_links($business_profile['comments']);
            $cmtinsert .= '</div>';

            $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
            //$cmtinsert .= '<textarea type="text" class="textarea" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcomment' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;resize: none;" onClick="commentedit(this.name)">' . $business_profile['comments'] . '</textarea>';
            $cmtinsert .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $business_profile['business_profile_post_comment_id'] . '"  id="editcomment' . $business_profile['business_profile_post_comment_id'] . '" placeholder="Type Message ..." onkeyup="commentedit(' . $business_profile['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $business_profile['comments'] . '</div>';
            $cmtinsert .= '<span class="comment-edit-button"><button id="editsubmit' . $business_profile['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_comment(' . $business_profile['business_profile_post_comment_id'] . ')">Save</button></span>';
            $cmtinsert .= '</div></div>';
            //$cmtinsert .= '<input type="text" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcomment' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;" value="' . $business_profile['comments'] . ' " onClick="commentedit(this.name)">';
            //$cmtinsert .= '<button id="editsubmit' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;" onClick="edit_comment(' . $business_profile['business_profile_post_comment_id'] . ')">Comment</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';

            $cmtinsert .= '<div class="art-comment-menu-design"><div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';
            $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
            $cmtinsert .= 'onClick="comment_like1(this.id)">';

            $userid = $this->session->userdata('aileenuser');
            $contition_array = array('business_profile_post_comment_id' => $business_profile['business_profile_post_comment_id'], 'status' => '1');
            $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

            if (!in_array($userid, $likeuserarray)) {


                $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
            } else {
                $cmtinsert .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true"></i>';
            }


            $cmtinsert .= '<span>';
            if ($business_profile['business_comment_likes_count'] > 0) {
                $cmtinsert .= ' ' . $business_profile['business_comment_likes_count'];
            }
            $cmtinsert .= '</span>';
            $cmtinsert .= '</a></div>';


            $userid = $this->session->userdata('aileenuser');
            if ($business_profile['user_id'] == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<div id="editcommentbox' . $business_profile['business_profile_post_comment_id'] . '"style="display:block;">';

                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editbox(this.id)" class="editbox">';
                $cmtinsert .= 'Edit';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '<div id="editcancle' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;">';

                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editcancle(this.id)">';
                $cmtinsert .= 'Cancel';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '</div>';
            }




            $userid = $this->session->userdata('aileenuser');

            $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $business_profile['business_profile_post_id'], 'status' => 1))->row()->user_id;


            if ($business_profile['user_id'] == $userid || $business_userid == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<input type="hidden" name="post_delete"';
                $cmtinsert .= 'id="post_delete' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'value= "' . $business_profile['business_profile_post_id'] . '">';
                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_delete(this.id)">';
                $cmtinsert .= 'Delete <span class="insertcomment' . $business_profile['business_profile_post_comment_id'] . '"></span>';
                $cmtinsert .= '</a></div>';
            }

            $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
            $cmtinsert .= '<div class="comment-details-menu">';
            $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($business_profile['created_date']))) . '</p></div></div></div>';


            // comment aount variable start
            $idpost = $business_profile['business_profile_post_id'];
            $cmtcount = '<a onClick="commentall(this.id)" id="' . $idpost . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= ' ' . count($buscmtcnt) . '';
            $cmtcount .= '</i></a>';


            if (count($buscmtcnt) > 0) {
                $cntinsert .= '' . count($buscmtcnt) . '';
                $cntinsert .= '<span> Comment</span>';
            }

            // comment count variable end 
        }
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => $cntinsert));
    }

    public function insert_comment() {

        $userid = $this->session->userdata('aileenuser');
        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_id = $_POST["post_id"];
        $post_comment = $_POST["comment"];

        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $busdatacomment = $this->data['busdatacomment'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $data = array(
            'user_id' => $userid,
            'business_profile_post_id' => $post_id,
            'comments' => $post_comment,
            'created_date' => date('Y-m-d H:i:s', time()),
            'status' => 1,
            'is_delete' => 0
        );

        $insert_id = $this->common->insert_data_getid($data, 'business_profile_post_comment');

        // insert notification
        if ($busdatacomment[0]['user_id'] == $userid || $busdatacomment[0]['is_delete'] == '1') {
            
        } else {
            $notificationdata = array(
                'not_type' => 6,
                'not_from_id' => $userid,
                'not_to_id' => $busdatacomment[0]['user_id'],
                'not_read' => 2,
                'not_product_id' => $insert_id,
                'not_from' => 6,
                'not_img' => 1,
                'not_created_date' => date('Y-m-d H:i:s'),
                'not_active' => 1
            );
            //echo "<pre>"; print_r($notificationdata); 
            $insert_id_notification = $this->common->insert_data_getid($notificationdata, 'notification');
        }
        // end notoification



        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo "<pre>"; print_r($businessprofiledata); die();
        // khyati changes start
        $cmtinsert = '<div class="insertcommenttwo' . $post_id . '">';
        foreach ($businessprofiledata as $business_profile) {
            $company_name = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->company_name;
            $companyslug = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->business_slug;
            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id'], 'status' => 1))->row()->business_user_image;

            $cmtinsert .= '<div class="all-comment-comment-box">';
            $cmtinsert .= '<div class="post-design-pro-comment-img"><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">';
            if ($business_userimage) {


                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                    $a = $company_name;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';
                } else {
                    $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                }

                $cmtinsert .= '</div>';
            } else {
                $a = $company_name;
                $acr = substr($a, 0, 1);

                $cmtinsert .= '<div class="post-img-div">';
                $cmtinsert .= ucfirst(strtolower($acr));
                $cmtinsert .= '</div>';
                $cmtinsert .= '</div>';
            }
            $cmtinsert .= '</a><div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . ucfirst(strtolower($company_name)) . '</a></b>';
            $cmtinsert .= '</div>';
            $cmtinsert .= '<div class="comment-details" id= "showcommenttwo' . $business_profile['business_profile_post_comment_id'] . '" >';
            $cmtinsert .= $this->common->make_links($business_profile['comments']);
            $cmtinsert .= '</div>';
            $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
            //$cmtinsert .= '<textarea type="text" class="textarea" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;resize: none;" onclick="commentedittwo(this.name)">' . $business_profile['comments'] . '</textarea>';
            $cmtinsert .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $business_profile['business_profile_post_comment_id'] . '"  id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '" placeholder="Type Message ..." onkeyup="commentedittwo(' . $business_profile['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $business_profile['comments'] . '</div>';
            $cmtinsert .= '<span class="comment-edit-button"><button id="editsubmittwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none" onclick="edit_commenttwo(' . $business_profile['business_profile_post_comment_id'] . ')">Save</button></span>';
            $cmtinsert .= '</div></div>';

//            $cmtinsert .= '<input type="text" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;" value="' . $business_profile['comments'] . ' " onClick="commentedittwo(this.name)">';
//            $cmtinsert .= '<button id="editsubmittwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;" onClick="edit_commenttwo(' . $business_profile['business_profile_post_comment_id'] . ')">Comment</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';

            $cmtinsert .= '<div class="art-comment-menu-design"><div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';
            $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
            $cmtinsert .= 'onClick="comment_like1(this.id)">';

            $userid = $this->session->userdata('aileenuser');
            $contition_array = array('business_profile_post_comment_id' => $business_profile['business_profile_post_comment_id'], 'status' => '1');
            $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

            if (!in_array($userid, $likeuserarray)) {
                $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
            } else {
                $cmtinsert .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true"></i>';
            }

            $cmtinsert .= '<span>';
            if ($business_profile['business_comment_likes_count'] > 0) {
                $cmtinsert .= ' ' . $business_profile['business_comment_likes_count'];
            }
            $cmtinsert .= '</span>';
            $cmtinsert .= '</a></div>';


            $userid = $this->session->userdata('aileenuser');
            if ($business_profile['user_id'] == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<div id="editcommentboxtwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:block;">';

                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editboxtwo(this.id)">';
                $cmtinsert .= 'Edit';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '<div id="editcancletwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;">';

                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editcancletwo(this.id)">';
                $cmtinsert .= 'Cancel';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '</div>';
            }




            $userid = $this->session->userdata('aileenuser');

            $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $business_profile['business_profile_post_id'], 'status' => 1))->row()->user_id;


            if ($business_profile['user_id'] == $userid || $business_userid == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<input type="hidden" name="post_deletetwo"';
                $cmtinsert .= 'id="post_deletetwo' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'value= "' . $business_profile['business_profile_post_id'] . '">';
                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_deletetwo(this.id)">';
                $cmtinsert .= 'Delete';
                $cmtinsert .= '</a></div>';
            }

            $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
            $cmtinsert .= '<div class="comment-details-menu">';
            $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($business_profile['created_date']))) . '</p></div></div></div>';


            // comment aount variable start
            $idpost = $business_profile['business_profile_post_id'];
            $cmtcount = '<a onClick="commentall(this.id)" id="' . $idpost . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= ' ' . count($businessprofiledata) . '';
            $cmtcount .= '</i></a>';



            // comment count variable end 
        }
        if (count($businessprofiledata) > 0) {
            $cntinsert .= '' . count($businessprofiledata) . '';
            $cntinsert .= '<span> Comment</span>';
        }

//        echo $cmtinsert;
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => $cntinsert));

        // khyati chande 
    }

//business_profile comment insert end  
//business_profile comment edit start
    public function edit_comment_insert() {

        $userid = $this->session->userdata('aileenuser');
        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_id = $_POST["post_id"];
        $post_comment = $_POST["comment"];

        $data = array(
            'comments' => $post_comment,
            'modify_date' => date('y-m-d h:i:s')
        );


        $updatdata = $this->common->update_data($data, 'business_profile_post_comment', 'business_profile_post_comment_id', $post_id);
        if ($updatdata) {

            $contition_array = array('business_profile_post_comment_id' => $_POST["post_id"], 'status' => '1');
            $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $cmtlike = '<div>';
            $cmtlike .= $this->common->make_links($businessprofiledata[0]['comments']);
            $cmtlike .= '</div>';
            echo $cmtlike;
        }
    }

//business_profile like commnet ajax end 
// click on post after post open on new page start


    public function postnewpage($id) {

        $userid = $this->session->userdata('aileenuser');
        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $contition_array = array('user_id' => $userid, 'status' => '1', 'business_step' => '4');
        $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_post_id' => $id, 'status' => '1');
        $this->data['busienss_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('status' => '1', 'is_deleted' => '0');


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        foreach ($result as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = $result1;

        //echo "<pre>"; print_r($this->data['art_data']);die();
        if ($this->data['businessdata']) {
            $this->load->view('business_profile/postnewpage', $this->data);
        } else {
            redirect('business_profile/');
        }
    }

// click on post after post open on new page end 
//edit post start

    public function edit_post_insert() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_id = $_POST["business_profile_post_id"];
        $business_post = $_POST["product_name"];
        $business_description = $_POST["product_description"];

        $data = array(
            'product_name' => $business_post,
            'product_description' => $business_description,
            'modify_date' => date('y-m-d h:i:s')
        );

        $updatdata = $this->common->update_data($data, 'business_profile_post', 'business_profile_post_id', $post_id);
        if ($updatdata) {

            $contition_array = array('business_profile_post_id' => $_POST["business_profile_post_id"], 'status' => '1');
            $businessdata = $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //echo "<pre>"; print_r($artdata); die();
            if ($this->data['businessdata'][0]['product_name']) {
                $editpost = '<div><a style="margin-bottom: 0px; font-size: 17px ; color:black;">';
                $editpost .= $businessdata[0]['product_name'] . "";
                $editpost .= '</a></div>';
            }
            if ($this->data['businessdata'][0]['product_description']) {

//                $editpostdes = '<span class="show">';
//                $editpostdes .= $this->common->make_links($businessdata[0]['product_description']) . "<br>";
//                $editpostdes .= '</span>';

                $small = substr($businessdata[0]['product_description'], 0, 180);
                $editpostdes .= $this->common->make_links($small);
                if (strlen($businessdata[0]['product_description']) > 180) {
                    $editpostdes .= '...<span id="kkkk" onClick="khdiv(' . $_POST["business_profile_post_id"] . ')">View More</div>';
                }
            }

            $postname = '<p title="' . $businessdata[0]['product_name'] . '">' . $businessdata[0]['product_name'] . '</p>';
            //echo $editpost;   echo $editpostdes;
            echo json_encode(
                    array("title" => $editpost,
                        "description" => $editpostdes,
                        "postname" => $postname));
        }
    }

//edit post end
//reactivate account start

    public function reactivate() {

        $userid = $this->session->userdata('aileenuser');
        $data = array(
            'status' => 1,
            'modified_date' => date('y-m-d h:i:s')
        );

        $updatdata = $this->common->update_data($data, 'business_profile', 'user_id', $userid);
        if ($updatdata) {

            redirect('business_profile/business_profile_post', refresh);
        } else {

            $this->load->view('business_profile/reactivate', $this->data);
        }
    }

//reactivate accont end    
//delete post particular user start
    public function del_particular_userpost() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_id = $_POST['business_profile_post_id'];

        $contition_array = array('business_profile_post_id' => $post_id, 'status' => '1');
        $businessdata = $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $likeuserarray = explode(',', $businessdata[0]['delete_post']);

        $user_array = array_push($likeuserarray, $userid);

        if ($businessdata[0]['delete_post'] == 0) {
            $userid = implode('', $likeuserarray);
        } else {
            $userid = implode(',', $likeuserarray);
        }

        $data = array(
            'delete_post' => $userid,
            'modify_date' => date('y-m-d h:i:s')
        );

        $updatdata = $this->common->update_data($data, 'business_profile_post', 'business_profile_post_id', $post_id);




        //echo "<pre>"; print_r($this->data['businessdata']); die(); 

        $business_profile_id = $this->data['businessdata'][0]['business_profile_id'];



        // for post count start

        $contition_array = array('follow_from' => $business_profile_id, 'follow_status' => '1', 'follow_type' => '2');

        $followerdata = $this->data['followerdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>" ; print_r($this->data['followerdata']); die();

        foreach ($followerdata as $fdata) {

            $contition_array = array('business_profile_id' => $fdata['follow_to'], 'business_step' => 4);

            $this->data['business_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            // echo "<pre>" ; print_r($this->data['business_data']); die();

            $business_userid = $this->data['business_data'][0]['user_id'];
            //echo $business_userid; die();
            $contition_array = array('user_id' => $business_userid, 'status' => '1', 'is_delete' => '0');

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //echo "<pre>"; print_r($this->data['business_profile_data']) ; die();

            $followerabc[] = $this->data['business_profile_data'];
        }
        //echo "<pre>" ; print_r($followerabc); die();
//data fatch using follower end
//data fatch using industriyal start

        $userselectindustriyal = $this->data['businessdata'][0]['industriyal'];

        $contition_array = array('industriyal' => $userselectindustriyal, 'status' => '1', 'business_step' => 4);
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        // echo "<pre>"; print_r( $businessprofiledata); die();



        foreach ($businessprofiledata as $fdata) {


            $contition_array = array('business_profile_post.user_id' => $fdata['user_id'], 'business_profile_post.status' => '1', 'business_profile_post.user_id !=' => $userid, 'is_delete' => '0');

            $this->data['business_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $industriyalabc[] = $this->data['business_data'];
        }
//data fatch using industriyal end
//data fatch using login user last post start

        $condition_array = array('user_id' => $userid, 'status' => '1', 'is_delete' => '0');

        $business_datauser = $this->data['business_datauser'] = $this->common->select_data_by_condition('business_profile_post', $condition_array, $data = '*', $sortby = 'business_profile_post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $userabc[][] = $this->data['business_datauser'][0];



//data fatch using login user last post end
//array merge and get unique value  


        if (count($industriyalabc) == 0 && count($business_datauser) != 0) {

            $unique = $userabc;
        } elseif (count($business_datauser) == 0 && count($industriyalabc) != 0) {
            $unique = $industriyalabc;
        } elseif (count($business_datauser) != 0 && count($industriyalabc) != 0) {
            $unique = array_merge($industriyalabc, $userabc);
        }

        //echo "<pre>"; print_r($unique); die();

        if (count($followerabc) == 0 && count($unique) != 0) {
            $unique_user = $unique;
        } elseif (count($unique) == 0 && count($followerabc) != 0) {
            $unique_user = $followerabc;
        } else {
            $unique_user = array_merge($unique, $followerabc);
        }



        foreach ($unique_user as $ke => $arr) {
            foreach ($arr as $k => $v) {

                $postdata[] = $v;
            }
        }

        $postdata = array_unique($postdata, SORT_REGULAR);


        $new = array();
        foreach ($postdata as $value) {
            $new[$value['business_profile_post_id']] = $value;
        }

        $post = array();

        foreach ($new as $key => $row) {

            $post[$key] = $row['business_profile_post_id'];
        }
        array_multisort($post, SORT_DESC, $new);

        $otherdata = $new;


// for count end


        if (count($otherdata) > 0) {

            foreach ($otherdata as $row) {
                $userid = $this->session->userdata('aileenuser');
                $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1');
                $businessdelete = $this->data['businessdelete'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $contition_array = array('user_id' => $row['user_id'], 'status' => '1');
                $businessdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $likeuserarray = explode(',', $businessdelete[0]['delete_post']);
                if (!in_array($userid, $likeuserarray)) {
                    
                } else {
                    $count[] = "abc";
                }
            }
        }

        if (count($otherdata) > 0) {
            if (count($count) == count($otherdata)) {

                $datacount = "count";


                $notfound = '<div class="art_no_post_avl" id="art_no_post_avl">
                                        <h3>Business Post</h3>
                                        <div class="art-img-nn">
                                            <div class="art_no_post_img">

                                                <img src="' . base_url('img/bui-no.png') . '">

                                            </div>
                                            <div class="art_no_post_text">
                                                No Post Available.
                                            </div>
                                        </div>
                                    </div>';
            }
        } else {

            $datacount = "count";

            $notfound = '<div class="art_no_post_avl" id="art_no_post_avl">
                                        <h3>Business Post</h3>
                                        <div class="art-img-nn">
                                            <div class="art_no_post_img">

                                                <img src="' . base_url('img/bui-no.png') . '">

                                            </div>
                                            <div class="art_no_post_text">
                                                No Post Available.
                                            </div>
                                        </div>
                                    </div>';
        }

        echo json_encode(
                array(
                    "notfound" => $notfound,
                    "notcount" => $datacount,
        ));
    }

//delete post particular user end  
//multiple image for manage user start


    public function business_photos($id) {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $contition_array = array('user_id' => $userid, 'status' => '1');

        $this->data['slug_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo "<pre>"; print_r($this->data['slug_data']); die();
        $slug_id = $this->data['slug_data'][0]['business_slug'];
        //echo  $slug_id ; die();
        if ($id == $slug_id || $id == '') {

            $contition_array = array('business_slug' => $slug_id, 'status' => '1', 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $join_str[0]['table'] = 'post_image';
            $join_str[0]['join_table_id'] = 'post_image.post_id';
            $join_str[0]['from_table_id'] = 'business_profile_post.business_profile_post_id';
            $join_str[0]['join_type'] = '';


            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'image_type' => 2, 'status' => 1, 'is_delete' => '0');
            $data = 'business_profile_post_id, image_id, image_name';

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
        } else {

            $contition_array = array('business_slug' => $id, 'status' => '1', 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $join_str[0]['table'] = 'post_image';
            $join_str[0]['join_table_id'] = 'post_image.post_id';
            $join_str[0]['from_table_id'] = 'business_profile_post.business_profile_post_id';
            $join_str[0]['join_type'] = '';


            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'image_type' => 2, 'status' => 1, 'is_delete' => '0');

            $data = 'business_profile_post_id, image_id, image_name';

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');
        }

        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        foreach ($result as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = $result1;


        if ($this->data['businessdata1']) {
            $this->load->view('business_profile/business_photos', $this->data);
        } else if (!$this->data['businessdata1'] && $id != $slug_id) {

            $this->load->view('business_profile/notavalible');
        } else if (!$this->data['businessdata1'] && ($id == $slug_id || $id == "")) {
            redirect('business_profile/');
        }
    }

//multiple iamge for manage user end   
    //multiple video for manage user start


    public function business_videos($id) {


        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $contition_array = array('user_id' => $userid, 'status' => '1');

        $this->data['slug_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo "<pre>"; print_r($this->data['slug_data']); die();
        $slug_id = $this->data['slug_data'][0]['business_slug'];
        //echo  $slug_id ; die();
        if ($id == $slug_id || $id == '') {

            $contition_array = array('business_slug' => $slug_id, 'status' => '1', 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'status' => 1, 'is_delete' => '0');

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        } else {

            $contition_array = array('business_slug' => $id, 'status' => '1', 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'status' => 1, 'is_delete' => '0');

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        }
        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        foreach ($result as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = $result1;


        if ($this->data['businessdata1']) {
            $this->load->view('business_profile/business_videos', $this->data);
        } else if (!$this->data['businessdata1'] && $id != $slug_id) {

            $this->load->view('business_profile/notavalible');
        } else if (!$this->data['businessdata1'] && ($id == $slug_id || $id == "")) {
            redirect('business_profile/');
        }
    }

//multiple video for manage user end 
//multiple audio for manage user start


    public function business_audios($id) {


        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $contition_array = array('user_id' => $userid, 'status' => '1');

        $this->data['slug_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo "<pre>"; print_r($this->data['slug_data']); die();
        $slug_id = $this->data['slug_data'][0]['business_slug'];
        //echo  $slug_id ; die();
        if ($id == $slug_id || $id == '') {

            $contition_array = array('business_slug' => $slug_id, 'status' => '1', 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'status' => 1, 'is_delete' => '0');

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        } else {

            $contition_array = array('business_slug' => $id, 'status' => '1', 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'status' => 1, 'is_delete' => '0');

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        }

        // code for search
        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = array_values($result1);



        if ($this->data['businessdata1']) {
            $this->load->view('business_profile/business_audios', $this->data);
        } else if (!$this->data['businessdata1'] && $id != $slug_id) {

            $this->load->view('business_profile/notavalible');
        } else if (!$this->data['businessdata1'] && ($id == $slug_id || $id == "")) {
            redirect('business_profile/');
        }
    }

//multiple audio for manage user end   
//multiple pdf for manage user start


    public function business_pdf($id) {



        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $contition_array = array('user_id' => $userid, 'status' => '1', 'business_step' => 4);

        $this->data['slug_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo "<pre>"; print_r($this->data['slug_data']); die();
        $slug_id = $this->data['slug_data'][0]['business_slug'];
        //echo  $slug_id ; die();
        if ($id == $slug_id || $id == '') {

            $contition_array = array('business_slug' => $slug_id, 'status' => '1');
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'status' => 1, 'is_delete' => '0');

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        } else {

            $contition_array = array('business_slug' => $id, 'status' => '1', 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'status' => 1, 'is_delete' => '0');

            $this->data['business_profile_data'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        }

        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businessdata);die();


        $contition_array = array('status' => '1', 'is_delete' => '0');


        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($businesstype);

        $contition_array = array('status' => '1', 'is_delete' => '0');


        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>";print_r($industrytype);die();
        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        foreach ($result as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }
        //echo "<pre>"; print_r($location);die();
        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        //echo "<pre>"; print_r($loc);die();
        // echo "<pre>"; print_r($loc);
        // echo "<pre>"; print_r($result1);die();

        $this->data['city_data'] = array_values($loc);
        $this->data['demo'] = $result1;


        if ($this->data['businessdata1']) {
            $this->load->view('business_profile/business_pdf', $this->data);
        } else if (!$this->data['businessdata1'] && $id != $slug_id) {

            $this->load->view('business_profile/notavalible');
        } else if (!$this->data['businessdata1'] && ($id == $slug_id || $id == "")) {
            redirect('business_profile/');
        }
    }

//multiple pdf for manage user end 
//multiple images like start
    public function mulimg_like() {
        $post_image = $_POST['post_image_id'];
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('post_image_id' => $post_image, 'user_id' => $userid);
        $likeuser = $this->data['likeuser'] = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('image_id' => $post_image);
        $likeuserid = $this->data['likeuserid'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_post_id' => $likeuserid[0]['post_id']);
        $likepostid = $this->data['likepostid'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if (!$likeuser) {
            $data = array(
                'post_image_id' => $post_image,
                'user_id' => $userid,
                'created_date' => date('Y-m-d H:i:s', time()),
                'is_unlike' => 0
            );
            $insertdata = $this->common->insert_data_getid($data, 'bus_post_image_like');
            // insert notification
            if ($likepostid[0]['user_id'] == $userid) {
                
            } else {

                $data = array(
                    'not_type' => 5,
                    'not_from_id' => $userid,
                    'not_to_id' => $likepostid[0]['user_id'],
                    'not_read' => 2,
                    'not_product_id' => $post_image,
                    'not_from' => 6,
                    'not_img' => 5,
                    'not_created_date' => date('Y-m-d H:i:s'),
                    'not_active' => 1
                );

                $insert_id = $this->common->insert_data_getid($data, 'notification');
            }
            // end notoification


            $contition_array = array('post_image_id' => $_POST["post_image_id"], 'is_unlike' => '0');
            $bdata1 = $this->data['bdata1'] = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($insertdata) {

                $imglike = '<li>';
                $imglike .= '<a id="' . $post_image . '" onClick="mulimg_like(this.id)">';
                $imglike .= ' <i class="fa fa-thumbs-up main_color" aria-hidden="true">';
                $imglike .= '</i>';
                $imglike .= '<span> ';
//                if (count($bdata1) > 0) {
//                    $imglike .= count($bdata1) . '';
//                }
                $imglike .= '</span>';
                $imglike .= '</a>';
                $imglike .= '</li>';

                $contition_array = array('post_image_id' => $post_image, 'is_unlike' => '0');
                $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                $countlike = count($commneteduser) - 1;
                foreach ($commneteduser as $userdata) {
                    $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $userdata['user_id'], 'status' => 1))->row()->company_name;
                }
                $imglikeuser .= '<div class="like_one_other_img">';
                $imglikeuser .= '<a href="javascript:void(0);"  onclick="likeuserlistimg(' . $post_image . ');">';

                $contition_array = array('post_image_id' => $post_image, 'is_unlike' => '0');
                $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                $countlike = count($commneteduser) - 1;
                $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $commneteduser[0]['user_id'], 'status' => 1))->row()->company_name;


                if ($userid == $commneteduser[0]['user_id']) {

                    $imglikeuser .= 'You ';
                } else {

                    $imglikeuser .= '' . ucfirst(strtolower($business_fname1)) . '&nbsp;';
                }

                if (count($commneteduser) > 1) {

                    $imglikeuser .= 'and';
                    $imglikeuser .= ' ' . $countlike . ' others';
                }
                // $imglikeuser .= '</div>';
                $imglikeuser .= '</a>';
                $cmtlikeuser .= '</div>';

                //  $like_user_count = count($commneteduser);
                $like_user_count = '<span class="comment_like_count">';
                if (count($commneteduser) > 0) {
                    $like_user_count .= '' . count($commneteduser) . '';
                    $like_user_count .= '</span>';
                    $like_user_count .= '<span> Like</span>';
                }
                echo json_encode(
                        array("like" => $imglike,
                            "likeuser" => $imglikeuser,
                            "like_user_count" => $like_user_count,
                            "like_user_total_count" => count($commneteduser),
                ));
            }
        } else {

            if ($likeuser[0]['is_unlike'] == 0) {
                $data = array(
                    'modify_date' => date('Y-m-d', time()),
                    'is_unlike' => 1
                );

                $this->db->where('post_image_id', $post_image);
                $this->db->where('user_id', $userid);
                $updatdata = $this->db->update('bus_post_image_like', $data);

                //$updatdata = $this->common->update_data($data, 'bus_post_image_like', 'post_image_id', $post_image);

                $contition_array = array('post_image_id' => $_POST["post_image_id"], 'is_unlike' => '0');
                $bdata2 = $this->data['bdata2'] = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($updatdata) {

                    $imglike1 = '<li>';
                    $imglike1 .= '<a id="' . $post_image . '" onClick="mulimg_like(this.id)">';
                    $imglike1 .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true">';
                    $imglike1 .= '</i>';
                    $imglike1 .= '<span>';
//                    if (count($bdata2) > 0) {
//                        $imglike1 .= count($bdata2) . '';
//                    }
                    $imglike1 .= '</span>';
                    $imglike1 .= '</a>';
                    $imglike1 .= '</li>';

                    // echo $imglike1;

                    $contition_array = array('post_image_id' => $post_image, 'is_unlike' => '0');
                    $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                    $countlike = count($commneteduser) - 1;
                    foreach ($commneteduser as $userdata) {
                        $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $userdata['user_id'], 'status' => 1))->row()->company_name;
                    }

                    $imglikeuser1 .= '<div class="like_one_other_img">';
                    $imglikeuser1 .= '<a href="javascript:void(0);"  onclick="likeuserlistimg(' . $post_image . ');">';

                    $contition_array = array('post_image_id' => $post_image, 'is_unlike' => '0');
                    $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                    $countlike = count($commneteduser) - 1;
                    $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $commneteduser[0]['user_id'], 'status' => 1))->row()->company_name;


                    if ($userid == $commneteduser[0]['user_id']) {

                        $imglikeuser1 .= 'You ';
                    } else {
                        $imglikeuser1 .= '' . ucfirst(strtolower($business_fname1)) . '&nbsp;';
                    }

                    if (count($commneteduser) > 1) {

                        $imglikeuser1 .= 'and';
                        $imglikeuser1 .= ' ' . $countlike . ' others';
                    }


                    $imglikeuser1 .= '</a>';
                    $imglikeuser1 .= '</div>';
                    // $like_user_count1 = count($commneteduser);

                    $like_user_count1 = '<span class="comment_like_count">';
                    if (count($commneteduser) > 0) {
                        $like_user_count1 .= '' . count($commneteduser) . '';
                        $like_user_count1 .= '</span>';
                        $like_user_count1 .= '<span> Like</span>';
                    }

                    echo json_encode(
                            array("like" => $imglike1,
                                "likeuser" => $imglikeuser1,
                                "like_user_count" => $like_user_count1,
                                "like_user_total_count" => count($commneteduser),
                    ));
                }
            } else {
                $data = array(
                    'modify_date' => date('Y-m-d', time()),
                    'is_unlike' => 0
                );

                $this->db->where('post_image_id', $post_image);
                $this->db->where('user_id', $userid);
                $updatdata = $this->db->update('bus_post_image_like', $data);

                //$updatdata = $this->common->update_data($data, 'bus_post_image_like', 'post_image_id', $post_image);
                // insert notification
                if ($likepostid[0]['user_id'] == $userid) {
                    
                } else {
                    $contition_array = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $likepostid[0]['user_id'], 'not_product_id' => $post_image, 'not_from' => 6, 'not_img' => 5);
                    $busnotification = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                    if ($busnotification[0]['not_read'] == 2) {
                        
                    } elseif ($busnotification[0]['not_read'] == 1) {

                        $datalike = array(
                            'not_read' => 2
                        );

                        $where = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $likepostid[0]['user_id'], 'not_product_id' => $post_image, 'not_from' => 6, 'not_img' => 5);
                        $this->db->where($where);
                        $updatdata = $this->db->update('notification', $datalike);
                    } else {


                        $data = array(
                            'not_type' => 5,
                            'not_from_id' => $userid,
                            'not_to_id' => $likepostid[0]['user_id'],
                            'not_read' => 2,
                            'not_product_id' => $post_image,
                            'not_from' => 6,
                            'not_img' => 5,
                            'not_created_date' => date('Y-m-d H:i:s'),
                            'not_active' => 1
                        );

                        $insert_id = $this->common->insert_data_getid($data, 'notification');
                    }
                }
                // end notoification

                $contition_array = array('post_image_id' => $_POST["post_image_id"], 'is_unlike' => '0');
                $bdata2 = $this->data['bdata2'] = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



                if ($updatdata) {

                    $imglike1 = '<li>';
                    $imglike1 .= '<a id="' . $post_image . '" onClick="mulimg_like(this.id)">';
                    $imglike1 .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true">';
                    $imglike1 .= '</i>';
                    $imglike1 .= '<span> ';
//                    if (count($bdata2) > 0) {
//                        $imglike1 .= count($bdata2) . '';
//                    }
                    $imglike1 .= '</span>';
                    $imglike1 .= '</a>';
                    $imglike1 .= '</li>';

                    //echo $imglike1;

                    $contition_array = array('post_image_id' => $post_image, 'is_unlike' => '0');
                    $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                    $countlike = count($commneteduser) - 1;
                    foreach ($commneteduser as $userdata) {
                        $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $userdata['user_id'], 'status' => 1))->row()->company_name;
                    }
                    $imglikeuser1 .= '<div class="like_one_other_img">';
                    $imglikeuser1 .= '<a href="javascript:void(0);"  onclick="likeuserlistimg(' . $post_image . ');">';

                    $contition_array = array('post_image_id' => $post_image, 'is_unlike' => '0');
                    $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                    $countlike = count($commneteduser) - 1;
                    $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $commneteduser[0]['user_id'], 'status' => 1))->row()->company_name;



                    if ($userid == $commneteduser[0]['user_id']) {

                        $imglikeuser1 .= 'You ';
                    } else {
                        $imglikeuser1 .= '' . ucfirst(strtolower($business_fname1)) . '&nbsp;';
                    }

                    if (count($commneteduser) > 1) {

                        $imglikeuser1 .= 'and';
                        $imglikeuser1 .= ' ' . $countlike . ' others';
                    }

                    $imglikeuser1 .= '</a>';
                    $imglikeuser1 .= '</div>';
                    //     $like_user_count1 = count($commneteduser);



                    $like_user_count1 = '<span class="comment_like_count">';
                    if (count($commneteduser) > 0) {
                        $like_user_count1 .= '' . count($commneteduser) . '';
                        $like_user_count1 .= '</span>';
                        $like_user_count1 .= '<span> Like</span>';
                    }

                    echo json_encode(
                            array("like" => $imglike1,
                                "likeuser" => $imglikeuser1,
                                "like_user_count" => $like_user_count1));
                }
            }
        }
    }

//multiple iamges like end 
//multiple images comment strat

    public function mulimg_commentthree() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_image_id = $_POST["post_image_id"];
        $post_comment = $_POST["comment"];



        $contition_array = array('image_id' => $_POST["post_image_id"], 'is_deleted' => '1');
        $busimg = $this->data['busimg'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_post_id' => $busimg[0]["post_id"], 'is_delete' => 0);
        $buspostid = $this->data['buspostid'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');




        $data = array(
            'user_id' => $userid,
            'post_image_id' => $post_image_id,
            'comment' => $post_comment,
            'created_date' => date('Y-m-d H:i:s', time()),
            'is_delete' => 0
        );
        $insert_id = $this->common->insert_data_getid($data, 'bus_post_image_comment');



        // insert notification

        if ($buspostid[0]['user_id'] == $userid) {
            
        } else {
            $datanotification = array(
                'not_type' => 6,
                'not_from_id' => $userid,
                'not_to_id' => $buspostid[0]['user_id'],
                'not_read' => 2,
                'not_product_id' => $insert_id,
                'not_from' => 6,
                'not_img' => 4,
                'not_created_date' => date('Y-m-d H:i:s'),
                'not_active' => 1
            );
            //echo "<pre>"; print_r($datanotification); die();
            $insert_id_notification = $this->common->insert_data_getid($datanotification, 'notification');
        }
        // end notoification



        $contition_array = array('post_image_id' => $post_image_id, 'is_delete' => '0');
        $businesscomment = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');
// count for comment
        $contition_array = array('post_image_id' => $post_image_id, 'is_delete' => '0');
        $buscmtcnt = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>"; print_r($businesscomment); die();
        foreach ($businesscomment as $bus_comment) {

            $company_name = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->company_name;
            $companyslug = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->business_slug;
            
            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id'], 'status' => 1))->row()->business_user_image;

            //$cmtinsert = '<div class="all-comment-comment-box">';
            $cmtinsert .= '<div class="post-design-pro-comment-img"><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">';
            if ($business_userimage != '') {

                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                    $a = $company_name;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';
                } else {

                    $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                }


                $cmtinsert .= '</div>';
            } else {
                $a = $company_name;
                $acr = substr($a, 0, 1);

                $cmtinsert .= '<div class="post-img-div">';
                $cmtinsert .= ucfirst(strtolower($acr));
                $cmtinsert .= '</div>';
                $cmtinsert .= '</div>';
            }
            $cmtinsert .= '</a><div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . $company_name . '</a></b>';
            $cmtinsert .= '</div>';

            $cmtinsert .= '<div class="comment-details" id= "showcomment' . $bus_comment['post_image_comment_id'] . '"" >';
            $cmtinsert .= $this->common->make_links($bus_comment['comment']);
            $cmtinsert .= '</div>';
            $cmtinsert .= '<div contenteditable="true" class="editable_text" name="' . $bus_comment['post_image_comment_id'] . '" id="editcomment' . $bus_comment['post_image_comment_id'] . '" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" onClick="commentedit(' . $bus_comment['post_image_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">';
            $cmtinsert .= $bus_comment['comment'];
            $cmtinsert .= '</div>';


            //$cmtinsert .= '<input type="text" name="' . $bus_comment['post_image_comment_id'] . '" id="editcomment' . $bus_comment['post_image_comment_id'] . '"style="display:none;" value="' . $bus_comment['comment'] . ' " onClick="commentedit(this.name)">';

            $cmtinsert .= '<button id="editsubmit' . $bus_comment['post_image_comment_id'] . '" style="display:none;" onClick="edit_comment(' . $bus_comment['post_image_comment_id'] . ')">Save</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment' . $bus_comment['post_image_comment_id'] . '">';

            $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
            $cmtinsert .= 'onClick="imgcomment_like(this.id)">';

            $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);

            $businesscommentlike1 = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if (count($businesscommentlike1) == 0) {
                $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
            } else {

                $cmtinsert .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true"></i>';
            }

            $cmtinsert .= '<span>';

            $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'is_unlike' => '0');
            $mulcountlike = $this->data['mulcountlike'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            if (count($mulcountlike) > 0) {
                //echo count($mulcountlike); 
            }
            $cmtinsert .= '</span>';
            $cmtinsert .= '</a></div>';

            $userid = $this->session->userdata('aileenuser');
            if ($bus_comment['user_id'] == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<div id="editcommentbox' . $bus_comment['post_image_comment_id'] . '"style="display:block;">';

                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editbox(this.id)">';
                $cmtinsert .= 'Edit';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '<div id="editcancle' . $bus_comment['post_image_comment_id'] . '"style="display:none;">';

                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editcancle(this.id)">';
                $cmtinsert .= 'Cancel';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '</div>';
            }
            $userid = $this->session->userdata('aileenuser');


            $userid = $this->session->userdata('aileenuser');

            $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $bus_comment['post_image_id'], 'status' => 1))->row()->user_id;


            if ($bus_comment['user_id'] == $userid || $business_userid == $userid) {


                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<input type="hidden" name="post_delete"';
                $cmtinsert .= 'id="post_delete' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'value= "' . $bus_comment['post_image_id'] . '">';
                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_delete(this.id)">';
                $cmtinsert .= 'Delete';
                $cmtinsert .= '</a></div>';
            }

            $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
            $cmtinsert .= '<div class="comment-details-menu">';
            $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($bus_comment['created_date']))) . '</p></div></div>';


            // comment aount variable start
            // $idpost = $business_profile['business_profile_post_id'];
            $cmtcount = '<a onClick="commentall(this.id)" id="' . $post_image_id . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= ' ' . count($buscmtcnt) . '';
            $cmtcount .= '</i></a>';

            // comment count variable end 
        }
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => count($buscmtcnt)
        ));
    }

    public function mulimg_comment() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_image_id = $_POST["post_image_id"];
        $post_comment = $_POST["comment"];


        $contition_array = array('image_id' => $_POST["post_image_id"], 'is_deleted' => '1');
        $busimg = $this->data['busimg'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_post_id' => $busimg[0]["post_id"], 'is_delete' => 0);
        $buspostid = $this->data['buspostid'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $data = array(
            'user_id' => $userid,
            'post_image_id' => $post_image_id,
            'comment' => $post_comment,
            'created_date' => date('Y-m-d H:i:s', time()),
            'is_delete' => 0
        );
        $insert_id = $this->common->insert_data_getid($data, 'bus_post_image_comment');



        // insert notification

        if ($buspostid[0]['user_id'] == $userid) {
            
        } else {
            $datanotification = array(
                'not_type' => 6,
                'not_from_id' => $userid,
                'not_to_id' => $buspostid[0]['user_id'],
                'not_read' => 2,
                'not_product_id' => $insert_id,
                'not_from' => 6,
                'not_img' => 4,
                'not_created_date' => date('Y-m-d H:i:s'),
                'not_active' => 1
            );

            $insert_id_notification = $this->common->insert_data_getid($datanotification, 'notification');
        }
        // end notoification



        $contition_array = array('post_image_id' => $post_image_id, 'is_delete' => '0');
        $businesscomment = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
// count for comment
        $contition_array = array('post_image_id' => $post_image_id, 'is_delete' => '0');
        $buscmtcnt = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>"; print_r($businesscomment); die();
        foreach ($businesscomment as $bus_comment) {


            $company_name = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->company_name;
            $companyslug = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->business_slug;
            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id'], 'status' => 1))->row()->business_user_image;

            //$cmtinsert = '<div class="all-comment-comment-box">';
            $cmtinsert .= '<div class="post-design-pro-comment-img"><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">';
            if ($business_userimage != '') {


                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                    $a = $company_name;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';
                } else {
                    $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                }

                $cmtinsert .= '</div>';
            } else {
                $a = $company_name;
                $acr = substr($a, 0, 1);

                $cmtinsert .= '<div class="post-img-div">';
                $cmtinsert .= ucfirst(strtolower($acr));
                $cmtinsert .= '</div>';
                $cmtinsert .= '</div>';
            }
            $cmtinsert .= '</a><div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . $company_name . '</a></b>';
            $cmtinsert .= '</div>';

            $cmtinsert .= '<div class="comment-details" id= "showcomment' . $bus_comment['post_image_comment_id'] . '"" >';
            $cmtinsert .= $this->common->make_links($bus_comment['comment']);
            $cmtinsert .= '</div>';
            //$cmtinsert .= '<input type="text" name="' . $bus_comment['post_image_comment_id'] . '" id="editcomment' . $bus_comment['post_image_comment_id'] . '"style="display:none;" value="' . $bus_comment['comment'] . ' " onClick="commentedit(this.name)">';
            $cmtinsert .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $bus_comment['post_image_comment_id'] . '"  id="editcomment' . $bus_comment['post_image_comment_id'] . '" placeholder="Type Message ..."  onkeyup="commentedittwo(' . $bus_comment['post_image_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $bus_comment['comment'] . '</div>';

            $cmtinsert .= '<button id="editsubmit' . $bus_comment['post_image_comment_id'] . '" style="display:none;" onClick="edit_commenttwo(' . $bus_comment['post_image_comment_id'] . ')">Save</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment' . $bus_comment['post_image_comment_id'] . '">';

            $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
            $cmtinsert .= 'onClick="imgcomment_liketwo(this.id)">';

            $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);

            $businesscommentlike1 = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if (count($businesscommentlike1) == 0) {
                $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
            } else {

                $cmtinsert .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
            }

            $cmtinsert .= '<span>';

            $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'is_unlike' => '0');
            $mulcountlike = $this->data['mulcountlike'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            if (count($mulcountlike) > 0) {
                //echo count($mulcountlike); 
            }
            $cmtinsert .= '</span>';
            $cmtinsert .= '</a></div>';

            $userid = $this->session->userdata('aileenuser');
            if ($bus_comment['user_id'] == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<div id="editcommentbox' . $bus_comment['post_image_comment_id'] . '"style="display:block;">';

                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editbox(this.id)">';
                $cmtinsert .= 'Edit';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '<div id="editcancle' . $bus_comment['post_image_comment_id'] . '"style="display:none;">';

                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editcancle(this.id)">';
                $cmtinsert .= 'Cancel';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '</div>';
            }
            $userid = $this->session->userdata('aileenuser');


            $userid = $this->session->userdata('aileenuser');

            $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $bus_comment['post_image_id'], 'status' => 1))->row()->user_id;


            if ($bus_comment['user_id'] == $userid || $business_userid == $userid) {


                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<input type="hidden" name="post_deletetwo"';
                $cmtinsert .= 'id="post_deletetwo' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'value= "' . $bus_comment['post_image_id'] . '">';
                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_delete(this.id)">';
                $cmtinsert .= 'Delete';
                $cmtinsert .= '</a></div>';
            }

            $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
            $cmtinsert .= '<div class="comment-details-menu">';
            $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($bus_comment['created_date']))) . '</p></div></div>';


            // comment aount variable start
            // $idpost = $business_profile['business_profile_post_id'];
            $cmtcount = '<a onClick="commentall(this.id)" id="' . $post_image_id . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= ' ' . count($buscmtcnt) . '';
            $cmtcount .= '</i></a>';

            // comment count variable end 
        }
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => count($buscmtcnt)
        ));
    }

    public function pnmulimg_comment() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_image_id = $_POST["post_image_id"];
        $post_comment = $_POST["comment"];


        $contition_array = array('image_id' => $_POST["post_image_id"], 'is_deleted' => '1');
        $busimg = $this->data['busimg'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_post_id' => $busimg[0]["post_id"], 'is_delete' => 0);
        $buspostid = $this->data['buspostid'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $data = array(
            'user_id' => $userid,
            'post_image_id' => $post_image_id,
            'comment' => $post_comment,
            'created_date' => date('Y-m-d H:i:s', time()),
            'is_delete' => 0
        );
        $insert_id = $this->common->insert_data_getid($data, 'bus_post_image_comment');


        // insert notification

        if ($buspostid[0]['user_id'] == $userid) {
            
        } else {
            $datanotification = array(
                'not_type' => 6,
                'not_from_id' => $userid,
                'not_to_id' => $buspostid[0]['user_id'],
                'not_read' => 2,
                'not_product_id' => $insert_id,
                'not_from' => 6,
                'not_img' => 4,
                'not_created_date' => date('Y-m-d H:i:s'),
                'not_active' => 1
            );

            $insert_id_notification = $this->common->insert_data_getid($datanotification, 'notification');
        }
        // end notoification


        $contition_array = array('post_image_id' => $post_image_id, 'is_delete' => '0');
        $businesscomment = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('post_image_id' => $post_image_id, 'is_delete' => '0');
        $buscmtcnt = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $cmtinsert .= '<div class="insertimgcommenttwo' . $post_image_id . '">';

        //echo "<pre>"; print_r($businesscomment); die();
        foreach ($businesscomment as $bus_comment) {


            $company_name = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->company_name;
            $companyslug = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->business_slug;
            
            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id'], 'status' => 1))->row()->business_user_image;

            $cmtinsert .= '<div class="all-comment-comment-box">';
            $cmtinsert .= '<div class="post-design-pro-comment-img"><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">';
            if ($business_userimage != '') {


                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                    $a = $company_name;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';
                } else {
                    $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                }

                $cmtinsert .= '</div>';
            } else {
                $a = $company_name;
                $acr = substr($a, 0, 1);

                $cmtinsert .= '<div class="post-img-div">';
                $cmtinsert .= ucfirst(strtolower($acr));
                $cmtinsert .= '</div>';
                $cmtinsert .= '</div>';
            }
            $cmtinsert .= '</a><div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . $company_name . '</a></b>';
            $cmtinsert .= '</div>';

            $cmtinsert .= '<div class="comment-details" id= "imgshowcommenttwo' . $bus_comment['post_image_comment_id'] . '"" >';
            $cmtinsert .= $this->common->make_links($bus_comment['comment']);
            $cmtinsert .= '</div>';
            $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
            $cmtinsert .= '<div contenteditable="true" class= "editable_text" name="' . $bus_comment['post_image_comment_id'] . '" id="imgeditcommenttwo' . $bus_comment['post_image_comment_id'] . '" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" onkeyup="imgcommentedittwo(' . $bus_comment['post_image_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">';
            $cmtinsert .= $bus_comment['comment'];
            $cmtinsert .= '</div>';
            $cmtinsert .= '<span class="comment-edit-button"><button id="imgeditsubmittwo' . $bus_comment['post_image_comment_id'] . '" style="display:none;" onClick="imgedit_commenttwo(' . $bus_comment['post_image_comment_id'] . ')">Save</button></span>';
            $cmtinsert .= '</div></div>';
            $cmtinsert .= '<div class="art-comment-menu-design"> <div class="comment-details-menu" id="imglikecomment' . $bus_comment['post_image_comment_id'] . '">';
            $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
            $cmtinsert .= 'onClick="imgcomment_like(this.id)">';

            $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);

            $businesscommentlike1 = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if (count($businesscommentlike1) == 0) {
                $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
            } else {

                $cmtinsert .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
            }

            $cmtinsert .= '<span>';

            $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'is_unlike' => '0');
            $mulcountlike = $this->data['mulcountlike'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            if (count($mulcountlike) > 0) {
                //echo count($mulcountlike); 
            }
            $cmtinsert .= '</span>';
            $cmtinsert .= '</a></div>';

            $userid = $this->session->userdata('aileenuser');
            if ($bus_comment['user_id'] == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<div id="imgeditcommentboxtwo' . $bus_comment['post_image_comment_id'] . '"style="display:block;">';

                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="imgcomment_editboxtwo(this.id)" class="editbox">';
                $cmtinsert .= 'Edit';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '<div id="imgeditcancletwo' . $bus_comment['post_image_comment_id'] . '"style="display:none;">';

                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="imgcomment_editcancletwo(this.id)">';
                $cmtinsert .= 'Cancel';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '</div>';
            }
            $userid = $this->session->userdata('aileenuser');

            $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $bus_comment['post_image_id'], 'status' => 1))->row()->user_id;


            if ($bus_comment['user_id'] == $userid || $business_userid == $userid) {


                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';
                $cmtinsert .= '<input type="hidden" name="imgpost_deletetwo"';
                $cmtinsert .= 'id="imgpost_deletetwo_' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'value= "' . $bus_comment['post_image_id'] . '">';
                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="imgcomment_deletetwo(this.id)">';
                $cmtinsert .= 'Delete';
                $cmtinsert .= '</a></div>';
            }

            $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
            $cmtinsert .= '<div class="comment-details-menu">';
            $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($bus_comment['created_date']))) . '</p></div></div></div>';

            $cmtcount = '<a onClick="imgcommentall(this.id)" id="' . $post_image_id . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= ' ' . count($buscmtcnt) . '';
            $cmtcount .= '</i></a>';

            // comment count variable end 

            $cntinsert = '<span class="comment_count" >';
            if (count($buscmtcnt) > 0) {
                $cntinsert .= '' . count($buscmtcnt) . '';
                $cntinsert .= '</span>';
                $cntinsert .= '<span> Comment</span>';
            }
        }

        $cmtinsert .= '</div>';
        header('Content-type: application/json');
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => count($buscmtcnt)
        ));
    }

    public function pnmulimgcommentthree() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_image_id = $_POST["post_image_id"];
        $post_comment = $_POST["comment"];


        $contition_array = array('image_id' => $_POST["post_image_id"], 'is_deleted' => '1');
        $busimg = $this->data['busimg'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_post_id' => $busimg[0]["post_id"], 'is_delete' => 0);
        $buspostid = $this->data['buspostid'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $data = array(
            'user_id' => $userid,
            'post_image_id' => $post_image_id,
            'comment' => $post_comment,
            'created_date' => date('Y-m-d H:i:s', time()),
            'is_delete' => 0
        );
        $insert_id = $this->common->insert_data_getid($data, 'bus_post_image_comment');



        // insert notification

        if ($buspostid[0]['user_id'] == $userid) {
            
        } else {
            $datanotification = array(
                'not_type' => 6,
                'not_from_id' => $userid,
                'not_to_id' => $buspostid[0]['user_id'],
                'not_read' => 2,
                'not_product_id' => $insert_id,
                'not_from' => 6,
                'not_img' => 4,
                'not_created_date' => date('Y-m-d H:i:s'),
                'not_active' => 1
            );
            //echo "<pre>"; print_r($datanotification); die();
            $insert_id_notification = $this->common->insert_data_getid($datanotification, 'notification');
        }
        // end notoification



        $contition_array = array('post_image_id' => $post_image_id, 'is_delete' => '0');
        $businesscomment = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('post_image_id' => $post_image_id, 'is_delete' => '0');
        $buscmtcnt = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>"; print_r($businesscomment); die();
        foreach ($businesscomment as $bus_comment) {


            $company_name = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->company_name;
            $companyslug = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->business_slug;
            
            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id'], 'status' => 1))->row()->business_user_image;

            $cmtinsert .= '<div class="all-comment-comment-box">';
            $cmtinsert .= '<div class="post-design-pro-comment-img"><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">';
            if ($business_userimage != '') {


                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                    $a = $company_name;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';
                } else {

                    $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                }

                $cmtinsert .= '</div>';
            } else {
                $a = $company_name;
                $acr = substr($a, 0, 1);

                $cmtinsert .= '<div class="post-img-div">';
                $cmtinsert .= ucfirst(strtolower($acr));
                $cmtinsert .= '</div>';
                $cmtinsert .= '</div>';
            }
            $cmtinsert .= '</a><div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . $company_name . '</a></b>';
            $cmtinsert .= '</div>';

            $cmtinsert .= '<div class="comment-details" id= "imgshowcomment' . $bus_comment['post_image_comment_id'] . '"" >';
            $cmtinsert .= $this->common->make_links($bus_comment['comment']);
            $cmtinsert .= '</div>';
            $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
            $cmtinsert .= '<div contenteditable="true" class= "editable_text" name="' . $bus_comment['post_image_comment_id'] . '" id="imgeditcomment' . $bus_comment['post_image_comment_id'] . '"style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;"  onkeyup="imgcommentedit(' . $bus_comment['post_image_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">';
            $cmtinsert .= $bus_comment['comment'];
            $cmtinsert .= '</div>';
            $cmtinsert .= '<span class="comment-edit-button"><button id="imgeditsubmit' . $bus_comment['post_image_comment_id'] . '" style="display:none;" onClick="imgedit_comment(' . $bus_comment['post_image_comment_id'] . ')">Save</button></span>';
            $cmtinsert .= '</div></div>';
            $cmtinsert .= '<div class="art-comment-menu-design"> <div class="comment-details-menu" id="imglikecomment' . $bus_comment['post_image_comment_id'] . '">';

            $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
            $cmtinsert .= 'onClick="imgcomment_like(this.id)">';

            $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);

            $businesscommentlike1 = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if (count($businesscommentlike1) == 0) {
                $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
            } else {

                $cmtinsert .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
            }

            $cmtinsert .= '<span>';

            $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'is_unlike' => '0');
            $mulcountlike = $this->data['mulcountlike'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            if (count($mulcountlike) > 0) {
                //echo count($mulcountlike); 
            }
            $cmtinsert .= '</span>';
            $cmtinsert .= '</a></div>';

            $userid = $this->session->userdata('aileenuser');
            if ($bus_comment['user_id'] == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<div id="imgeditcommentbox' . $bus_comment['post_image_comment_id'] . '"style="display:block;">';

                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="imgcomment_editbox(this.id)">';
                $cmtinsert .= 'Edit';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '<div id="imgeditcancle' . $bus_comment['post_image_comment_id'] . '"style="display:none;">';

                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="imgcomment_editcancle(this.id)">';
                $cmtinsert .= 'Cancel';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '</div>';
            }
            $userid = $this->session->userdata('aileenuser');

            $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $bus_comment['post_image_id'], 'status' => 1))->row()->user_id;


            if ($bus_comment['user_id'] == $userid || $business_userid == $userid) {


                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';
                $cmtinsert .= '<input type="hidden" name="imgpost_delete"';
                $cmtinsert .= 'id="imgpost_delete_' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'value= "' . $bus_comment['post_image_id'] . '">';
                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="imgcomment_delete(this.id)">';
                $cmtinsert .= 'Delete';
                $cmtinsert .= '</a></div>';
            }

            $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
            $cmtinsert .= '<div class="comment-details-menu">';
            $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($bus_comment['created_date']))) . '</p></div></div></div>';

            $cmtcount = '<a onClick="imgcommentall(this.id)" id="' . $post_image_id . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= ' ' . count($buscmtcnt) . '';
            $cmtcount .= '</i></a>';

            // comment count variable end 

            $cntinsert = '<span class="comment_count" >';
            if (count($buscmtcnt) > 0) {
                $cntinsert .= '' . count($buscmtcnt) . '';
                $cntinsert .= '</span>';
                $cntinsert .= '<span> Comment</span>';
            }
        }
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => $cntinsert
        ));
    }

//multiple images comment end 
//multiple images comment like start
    public function mulimg_comment_like() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_image_comment_id = $_POST["post_image_comment_id"];

        $contition_array = array('post_image_comment_id' => $post_image_comment_id, 'user_id' => $userid);

        $likecommentuser = $this->data['likecommentuser'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');




        $contition_array = array('post_image_comment_id' => $post_image_comment_id);
        $busimglike = $this->data['busimglike'] = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//echo "<pre>"; print_r($busimglike); die();


        $contition_array = array('image_id' => $busimglike[0]['post_image_id'], 'image_type' => '2');
        $buslikeimg = $this->data['buslikeimg'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_post_id' => $buslikeimg[0]["post_id"]);
        $busimglikepost = $this->data['busimglikepost'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

//echo "<pre>"; print_r($busimglikepost); die();

        if (!$likecommentuser) {

            $data = array(
                'post_image_comment_id' => $post_image_comment_id,
                'user_id' => $userid,
                'created_date' => date('Y-m-d H:i:s', time()),
                'is_unlike' => 0
            );
//echo "<pre>"; print_r($data); die();

            $insertdata = $this->common->insert_data_getid($data, 'bus_comment_image_like');


            // insert notification

            if ($busimglike[0]['user_id'] == $userid) {
                
            } else {
                $datanotification = array(
                    'not_type' => 5,
                    'not_from_id' => $userid,
                    'not_to_id' => $busimglike[0]['user_id'],
                    'not_read' => 2,
                    'not_product_id' => $post_image_comment_id,
                    'not_from' => 6,
                    'not_img' => 6,
                    'not_created_date' => date('Y-m-d H:i:s'),
                    'not_active' => 1
                );
                //echo "<pre>"; print_r($datanotification); die();
                $insert_id = $this->common->insert_data_getid($datanotification, 'notification');
            }
            // end notoification

            $contition_array = array('post_image_comment_id' => $_POST["post_image_comment_id"], 'is_unlike' => '0');
            $bdatacm = $this->data['bdatacm'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($insertdata) {


                $imglike .= '<a id="' . $post_image_comment_id . '" onClick="imgcomment_like(this.id)">';
                $imglike .= ' <i class="fa fa-thumbs-up main_color" aria-hidden="true">';
                $imglike .= '</i>';
                $imglike .= '<span> ';
                if (count($bdatacm) > 0) {
                    $imglike .= count($bdatacm) . '';
                }
                $imglike .= '</span>';
                $imglike .= '</a>';


                echo $imglike;
            }
        } else {

            if ($likecommentuser[0]['is_unlike'] == 0) {

                $data = array(
                    'modify_date' => date('Y-m-d', time()),
                    'is_unlike' => 1
                );


                $where = array('post_image_comment_id' => $post_image_comment_id, 'user_id' => $userid);
                $this->db->where($where);
                $updatdata = $this->db->update('bus_comment_image_like ', $data);


                //$updatdata = $this->common->update_data($data, 'bus_comment_image_like', 'post_image_comment_id', $post_image_comment_id);

                $contition_array = array('post_image_comment_id' => $post_image_comment_id, 'is_unlike' => '0');
                $bdata2 = $this->data['bdata2'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



                if ($updatdata) {


                    $imglike1 .= '<a id="' . $post_image_comment_id . '" onClick="imgcomment_like(this.id)">';
                    $imglike1 .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true">';
                    $imglike1 .= '</i>';
                    $imglike1 .= '<span>';
                    if (count($bdata2) > 0) {
                        $imglike1 .= count($bdata2) . '';
                    }
                    $imglike1 .= '</span>';
                    $imglike1 .= '</a>';


                    echo $imglike1;
                }
            } else {

                $data = array(
                    'modify_date' => date('Y-m-d', time()),
                    'is_unlike' => 0
                );


                // $updatdata = $this->common->update_data($data, 'bus_comment_image_like', 'post_image_comment_id', $post_image_comment_id);


                $where = array('post_image_comment_id' => $post_image_comment_id, 'user_id' => $userid);
                $this->db->where($where);
                $updatdata = $this->db->update('bus_comment_image_like ', $data);


                // insert notification

                if ($busimglike[0]['user_id'] == $userid) {
                    
                } else {


                    $contition_array = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $busimglike[0]['user_id'], 'not_product_id' => $post_image_comment_id, 'not_from' => 6, 'not_img' => 6);
                    $busnotification = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                    if ($busnotification[0]['not_read'] == 2) {
                        
                    } elseif ($busnotification[0]['not_read'] == 1) {

                        $datalike = array(
                            'not_read' => 2
                        );

                        $where = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $busimglike[0]['user_id'], 'not_product_id' => $post_image_comment_id, 'not_from' => 6, 'not_img' => 6);
                        $this->db->where($where);
                        $updatdata = $this->db->update('notification', $datalike);
                    } else {

                        $data = array(
                            'not_type' => 5,
                            'not_from_id' => $userid,
                            'not_to_id' => $busimglike[0]['user_id'],
                            'not_read' => 2,
                            'not_product_id' => $post_image_comment_id,
                            'not_from' => 6,
                            'not_img' => 6,
                            'not_created_date' => date('Y-m-d H:i:s'),
                            'not_active' => 1
                        );
                        //echo "<pre>"; print_r($data); die();
                        $insert_id = $this->common->insert_data_getid($data, 'notification');
                    }
                }
                // end notoification 


                $contition_array = array('post_image_comment_id' => $_POST["post_image_comment_id"], 'is_unlike' => '0');
                $bdata2 = $this->data['bdata2'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



                if ($updatdata) {


                    $imglike1 .= '<a id="' . $post_image_comment_id . '" onClick="imgcomment_like(this.id)">';
                    $imglike1 .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true">';
                    $imglike1 .= '</i>';
                    $imglike1 .= '<span> ';
                    if (count($bdata2) > 0) {
                        $imglike1 .= count($bdata2) . '';
                    }
                    $imglike1 .= '</span>';
                    $imglike1 .= '</a>';


                    echo $imglike1;
                }
            }
        }
    }

    public function mulimg_comment_liketwo() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_image_comment_id = $_POST["post_image_comment_id"];

        $contition_array = array('post_image_comment_id' => $post_image_comment_id, 'user_id' => $userid);

        $likecommentuser = $this->data['likecommentuser'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo "<pre>"; print_r($likecommentuser); die();

        $contition_array = array('post_image_comment_id' => $post_image_comment_id);
        $busimglike = $this->data['busimglike'] = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo "<pre>"; print_r($busimglike); die();


        $contition_array = array('image_id' => $busimglike[0]['post_image_id'], 'image_type' => '2');
        $buslikeimg = $this->data['buslikeimg'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_post_id' => $buslikeimg[0]["post_id"]);
        $busimglikepost = $this->data['busimglikepost'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if (!$likecommentuser) {

            $data = array(
                'post_image_comment_id' => $post_image_comment_id,
                'user_id' => $userid,
                'created_date' => date('Y-m-d H:i:s', time()),
                'is_unlike' => 0
            );
//echo "<pre>"; print_r($data); die();

            $insertdata = $this->common->insert_data_getid($data, 'bus_comment_image_like');


            // insert notification

            if ($busimglike[0]['user_id'] == $userid) {
                
            } else {
                $datanotification = array(
                    'not_type' => 5,
                    'not_from_id' => $userid,
                    'not_to_id' => $busimglike[0]['user_id'],
                    'not_read' => 2,
                    'not_product_id' => $post_image_comment_id,
                    'not_from' => 6,
                    'not_img' => 6,
                    'not_created_date' => date('Y-m-d H:i:s'),
                    'not_active' => 1
                );
                //echo "<pre>"; print_r($datanotification); die();
                $insert_id = $this->common->insert_data_getid($datanotification, 'notification');
            }
            // end notoification

            $contition_array = array('post_image_comment_id' => $_POST["post_image_comment_id"], 'is_unlike' => '0');
            $bdatacm = $this->data['bdatacm'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($insertdata) {


                $imglike .= '<a id="' . $post_image_comment_id . '" onClick="imgcomment_liketwo(this.id)">';
                $imglike .= ' <i class="fa fa-thumbs-up main_color" aria-hidden="true">';
                $imglike .= '</i>';
                $imglike .= '<span> ';
                if (count($bdatacm) > 0) {
                    $imglike .= count($bdatacm) . '';
                }
                $imglike .= '</span>';
                $imglike .= '</a>';


                echo $imglike;
            }
        } else {

            if ($likecommentuser[0]['is_unlike'] == 0) {

                $data = array(
                    'modify_date' => date('Y-m-d', time()),
                    'is_unlike' => 1
                );


                $updatdata = $this->common->update_data($data, 'bus_comment_image_like', 'post_image_comment_id', $post_image_comment_id);

                $contition_array = array('post_image_comment_id' => $post_image_comment_id, 'is_unlike' => '0');
                $bdata2 = $this->data['bdata2'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



                if ($updatdata) {


                    $imglike1 .= '<a id="' . $post_image_comment_id . '" onClick="imgcomment_liketwo(this.id)">';
                    $imglike1 .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true">';
                    $imglike1 .= '</i>';
                    $imglike1 .= '<span>';
                    if (count($bdata2) > 0) {
                        $imglike1 .= count($bdata2) . '';
                    }
                    $imglike1 .= '</span>';
                    $imglike1 .= '</a>';


                    echo $imglike1;
                }
            } else {

                $data = array(
                    'modify_date' => date('Y-m-d', time()),
                    'is_unlike' => 0
                );


                // $updatdata = $this->common->update_data($data, 'bus_comment_image_like', 'post_image_comment_id', $post_image_comment_id);


                $where = array('post_image_comment_id' => $post_image_comment_id, 'user_id' => $userid);
                $this->db->where($where);
                $updatdata = $this->db->update('bus_comment_image_like ', $data);



                // insert notification

                if ($busimglike[0]['user_id'] == $userid) {
                    
                } else {

                    $contition_array = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $busimglike[0]['user_id'], 'not_product_id' => $post_image_comment_id, 'not_from' => 6, 'not_img' => 6);
                    $busnotification = $this->common->select_data_by_condition('notification', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                    if ($busnotification[0]['not_read'] == 2) {
                        
                    } elseif ($busnotification[0]['not_read'] == 1) {

                        $datalike = array(
                            'not_read' => 2
                        );

                        $where = array('not_type' => 5, 'not_from_id' => $userid, 'not_to_id' => $busimglike[0]['user_id'], 'not_product_id' => $post_image_comment_id, 'not_from' => 6, 'not_img' => 6);
                        $this->db->where($where);
                        $updatdata = $this->db->update('notification', $datalike);
                    } else {
                        $datanotification = array(
                            'not_type' => 5,
                            'not_from_id' => $userid,
                            'not_to_id' => $busimglike[0]['user_id'],
                            'not_read' => 2,
                            'not_product_id' => $post_image_comment_id,
                            'not_from' => 6,
                            'not_img' => 6,
                            'not_created_date' => date('Y-m-d H:i:s'),
                            'not_active' => 1
                        );

                        $insert_id = $this->common->insert_data_getid($datanotification, 'notification');
                    }
                }
                // end notoification


                $contition_array = array('post_image_comment_id' => $_POST["post_image_comment_id"], 'is_unlike' => '0');
                $bdata2 = $this->data['bdata2'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



                if ($updatdata) {


                    $imglike1 .= '<a id="' . $post_image_comment_id . '" onClick="imgcomment_liketwo(this.id)">';
                    $imglike1 .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true">';
                    $imglike1 .= '</i>';
                    $imglike1 .= '<span> ';
                    if (count($bdata2) > 0) {
                        $imglike1 .= count($bdata2) . '';
                    }
                    $imglike1 .= '</span>';
                    $imglike1 .= '</a>';


                    echo $imglike1;
                }
            }
        }
    }

//multiple images comemnt like end
//multiple images comment edit start
    public function mul_edit_com_insert() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_image_comment_id = $_POST["post_image_comment_id"];
        $post_comment = $_POST["comment"];

        $data = array(
            'comment' => $post_comment,
            'modify_date' => date('y-m-d h:i:s')
        );

        $updatdata = $this->common->update_data($data, 'bus_post_image_comment', 'post_image_comment_id', $post_image_comment_id);
        if ($updatdata) {

            $contition_array = array('post_image_comment_id' => $_POST["post_image_comment_id"], 'is_delete' => '0');
            $buseditdata = $this->data['buseditdata'] = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $cmtlike = '<div>';
            $cmtlike .= $this->common->make_links($buseditdata[0]['comment']) . "";
            $cmtlike .= '</div>';
            echo $cmtlike;
        }
    }

//multiple images comment edit end
//multiple images commnet delete start
    public function mul_delete_comment() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_image_comment_id = $_POST["post_image_comment_id"];
        $post_delete = $_POST["post_delete"];
        $data = array(
            'is_delete' => 1,
            'modify_date' => date('y-m-d h:i:s')
        );


        $updatdata = $this->common->update_data($data, 'bus_post_image_comment', 'post_image_comment_id', $post_image_comment_id);


        $contition_array = array('post_image_id' => $post_delete, 'is_delete' => '0');
        $businesscomment = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');

        // count for comment
        $contition_array = array('post_image_id' => $post_delete, 'is_delete' => '0');
        $buscmtcnt = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>"; print_r($buscmtcnt); die();
        if (count($businesscomment) > 0) {
            foreach ($businesscomment as $bus_comment) {

                $company_name = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->company_name;
                $companyslug = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->business_slug;
                $business_userimage = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id'], 'status' => 1))->row()->business_user_image;

                $cmtinsert .= '<div class="all-comment-comment-box">';
                $cmtinsert .= '<div class="post-design-pro-comment-img"><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">';
                if ($business_userimage != '') {

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                        $a = $company_name;
                        $acr = substr($a, 0, 1);

                        $cmtinsert .= '<div class="post-img-div">';
                        $cmtinsert .= ucfirst(strtolower($acr));
                        $cmtinsert .= '</div>';
                    } else {

                        $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                    }

                    $cmtinsert .= '</div>';
                } else {
                    $a = $company_name;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';
                    $cmtinsert .= '</div>';
                }
                $cmtinsert .= '</a><div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . $company_name . '</a></b>';
                $cmtinsert .= '</div>';

                $cmtinsert .= '<div class="comment-details" id= "imgshowcomment' . $bus_comment['post_image_comment_id'] . '"" >';
                $cmtinsert .= $this->common->make_links($bus_comment['comment']);
                $cmtinsert .= '</div>';

                $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
                $cmtinsert .= '<div contenteditable="true" class="editable_text" name="' . $bus_comment['post_image_comment_id'] . '" id="imgeditcomment' . $bus_comment['post_image_comment_id'] . '"style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;"  onkeyup="imgcommentedit(' . $bus_comment['post_image_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">';
                $cmtinsert .= $bus_comment['comment'];
                $cmtinsert .= '</div>';
                $cmtinsert .= '<span class="comment-edit-button"><button id="imgeditsubmit' . $bus_comment['post_image_comment_id'] . '" style="display:none;" onClick="imgedit_comment(' . $bus_comment['post_image_comment_id'] . ')">Save</button></span>';
                $cmtinsert .= '</div></div>';
                $cmtinsert .= '<div class="art-comment-menu-design"> <div class="comment-details-menu" id="imglikecomment' . $bus_comment['post_image_comment_id'] . '">';

                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="imgcomment_like(this.id)">';

                $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);
                $businesscommentlike1 = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if (count($businesscommentlike1) == 0) {
                    $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
                } else {

                    $cmtinsert .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                }

                $cmtinsert .= '<span> ';

                $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'is_unlike' => '0');
                $mulcountlike = $this->data['mulcountlike'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                if (count($mulcountlike) > 0) {
                    echo count($mulcountlike);
                }
                $cmtinsert .= '</span>';
                $cmtinsert .= '</a></div>';

                $userid = $this->session->userdata('aileenuser');
                if ($bus_comment['user_id'] == $userid) {

                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<div id="imgeditcommentbox' . $bus_comment['post_image_comment_id'] . '"style="display:block;">';

                    $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                    $cmtinsert .= 'onClick="imgcomment_editbox(this.id)">';
                    $cmtinsert .= 'Edit';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '<div id="imgeditcancle' . $bus_comment['post_image_comment_id'] . '"style="display:none;">';

                    $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                    $cmtinsert .= 'onClick="imgcomment_editcancle(this.id)">';
                    $cmtinsert .= 'Cancel';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '</div>';
                }

                $userid = $this->session->userdata('aileenuser');

                $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $bus_comment['post_image_id'], 'status' => 1))->row()->user_id;

                if ($bus_comment['user_id'] == $userid || $business_userid == $userid) {


                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<input type="hidden" name="imgpost_delete"';
                    // $cmtinsert .= 'id="imgpost_delete' . $bus_comment['post_image_comment_id'] . '"';
                    $cmtinsert .= 'id="imgpost_delete_' . $bus_comment['post_image_comment_id'] . '"';
                    $cmtinsert .= ' value= "' . $bus_comment['post_image_id'] . '">';
                    $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                    $cmtinsert .= 'onClick="imgcomment_delete(this.id)">';
                    $cmtinsert .= 'Delete';
                    $cmtinsert .= '</a></div>';
                }

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';
                $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($bus_comment['created_date']))) . '</p></div></div>';

                $cmtcount = '<a onClick="imgcommentall(this.id)" id="' . $bus_comment['post_image_id'] . '">';
                $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
                $cmtcount .= ' ' . count($buscmtcnt) . '';
                $cmtcount .= '</i></a>';

                // comment count variable end 
                $cntinsert = '<span class="comment_count" >';
                if (count($buscmtcnt) > 0) {
                    $cntinsert .= '' . count($buscmtcnt) . '';
                    $cntinsert .= '</span>';
                    $cntinsert .= '<span> Comment</span>';
                }
            }
        } else {
            $idpost = $bus_comment['post_image_id'];
            $cmtcount = '<a onClick="imgcommentall(this.id)" id="' . $idpost . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= '</i></a>';
        }
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => $cntinsert
        ));
    }

    public function mul_delete_commenttwo() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_image_comment_id = $_POST["post_image_comment_id"];
        $post_delete = $_POST["post_delete"];

        $data = array(
            'is_delete' => 1,
            'modify_date' => date('y-m-d h:i:s')
        );

        $updatdata = $this->common->update_data($data, 'bus_post_image_comment', 'post_image_comment_id', $post_image_comment_id);


        $contition_array = array('post_image_id' => $post_delete, 'is_delete' => '0');
        $businesscomment = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>"; print_r($businesscomment); die();
        if (count($businesscomment) > 0) {
            foreach ($businesscomment as $bus_comment) {
                $company_name = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->company_name;
                $companyslug = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id']))->row()->business_slug;
                
                $business_userimage = $this->db->get_where('business_profile', array('user_id' => $bus_comment['user_id'], 'status' => 1))->row()->business_user_image;

                $cmtinsert .= '<div class="all-comment-comment-box">';
                $cmtinsert .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-design-pro-comment-img">';
                if ($business_userimage != '') {

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                        $a = $company_name;
                        $acr = substr($a, 0, 1);

                        $cmtinsert .= '<div class="post-img-div">';
                        $cmtinsert .= ucfirst(strtolower($acr));
                        $cmtinsert .= '</div>';
                    } else {

                        $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                    }


                    $cmtinsert .= '</div></a>';
                } else {
                    $a = $company_name;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div></a>';
                    $cmtinsert .= '</div>';
                }
                $cmtinsert .= '<div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . $company_name . '</a></b>';
                $cmtinsert .= '</div>';

                $cmtinsert .= '<div class="comment-details" id= "imgshowcommenttwo' . $bus_comment['post_image_comment_id'] . '">';
                $cmtinsert .= $this->common->make_links($bus_comment['comment']);
                $cmtinsert .= '</div>';

                $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
                //$cmtinsert .= '<textarea type="text" class="textarea" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcomment' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;resize: none;" onClick="commentedit(this.name)">' . $business_profile['comments'] . '</textarea>';
                $cmtinsert .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $bus_comment['post_image_comment_id'] . '"  id="imgeditcommenttwo' . $bus_comment['post_image_comment_id'] . '" placeholder="Type Message ..."  onkeyup="imgcommentedittwo(' . $bus_comment['post_image_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $bus_comment['comment'] . '</div>';
                $cmtinsert .= '<span class="comment-edit-button"><button id="imgeditsubmittwo' . $bus_comment['post_image_comment_id'] . '" style="display:none" onClick="imgedit_commenttwo(' . $bus_comment['post_image_comment_id'] . ')">Save</button></span>';
                $cmtinsert .= '</div></div>';

//            $cmtinsert .= '<input type="text" name="' . $bus_comment['post_image_comment_id'] . '" id="imgeditcommenttwo' . $bus_comment['post_image_comment_id'] . '"style="display:none;" value="' . $bus_comment['comment'] . ' " onClick="imgcommentedittwo(this.name)">';
//            $cmtinsert .= '<button id="imgeditsubmittwo' . $bus_comment['post_image_comment_id'] . '" style="display:none;" onClick="imgedit_commenttwo(' . $bus_comment['post_image_comment_id'] . ')">Comment</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="imglikecomment1' . $bus_comment['post_image_comment_id'] . '">';

                $cmtinsert .= '<div class="art-comment-menu-design"><div class="comment-details-menu" id="imglikecomment1' . $bus_comment['post_image_comment_id'] . '">';
                $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                $cmtinsert .= 'onClick="imgcomment_liketwo(this.id)">';

                $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);

                $businesscommentlike1 = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if (count($businesscommentlike1) == 0) {
                    $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
                } else {

                    $cmtinsert .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                }

                $cmtinsert .= '<span> ';

                $contition_array = array('post_image_comment_id' => $bus_comment['post_image_comment_id'], 'is_unlike' => '0');
                $mulcountlike = $this->data['mulcountlike'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                if (count($mulcountlike) > 0) {
                    $cmtinsert .= count($mulcountlike);
                }
                $cmtinsert .= '</span>';
                $cmtinsert .= '</a></div>';

                $userid = $this->session->userdata('aileenuser');
                if ($bus_comment['user_id'] == $userid) {

                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<div id="imgeditcommentboxtwo' . $bus_comment['post_image_comment_id'] . '"style="display:block;">';

                    $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                    $cmtinsert .= 'onClick="imgcomment_editboxtwo(this.id)">';
                    $cmtinsert .= 'Edit';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '<div id="imgeditcancletwo' . $bus_comment['post_image_comment_id'] . '"style="display:none;">';

                    $cmtinsert .= '<a id="' . $bus_comment['post_image_comment_id'] . '"';
                    $cmtinsert .= 'onClick="imgcomment_editcancletwo(this.id)">';
                    $cmtinsert .= 'Cancel';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '</div>';
                }
                $userid = $this->session->userdata('aileenuser');

                $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $bus_comment['post_image_id'], 'status' => 1))->row()->user_id;


                if ($bus_comment['user_id'] == $userid || $business_userid == $userid) {


                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    //$cmtinsert .= '<input type="hidden" name="post_deletetwo"';
                    //$cmtinsert .= ' id="post_deletetwo' . $bus_comment['post_image_comment_id'] . '"';
                    $cmtinsert .= '<input type="hidden" name="imgpost_delete1"';
                    $cmtinsert .= ' id="imgpost_deletetwo_' . $bus_comment['post_image_comment_id'] . '"';
                    $cmtinsert .= ' value= "' . $bus_comment['post_image_id'] . '">';
                    $cmtinsert .= ' <a id="' . $bus_comment['post_image_comment_id'] . '"';
                    $cmtinsert .= 'onClick="imgcomment_deletetwo(this.id)">';
                    $cmtinsert .= 'Delete';
                    $cmtinsert .= '</a></div>';
                }

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';
                $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($bus_comment['created_date']))) . '</p></div></div></div>';

                // comment aount variable start
                $idpost = $bus_comment['post_image_id'];
                $cmtcount = '<a onClick="commentall1(this.id)" id="' . $idpost . '">';
                $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
                $cmtcount .= ' ' . count($businesscomment) . '';
                $cmtcount .= '</i></a>';

                $cntinsert = '<span class="comment_count" >';
                if (count($businesscomment) > 0) {
                    $cntinsert .= '' . count($businesscomment) . '';
                    $cntinsert .= '</span>';
                    $cntinsert .= '<span> Comment</span>';
                }
            }
        } else {
            $idpost = $bus_comment['post_image_id'];
            $cmtcount = '<a onClick="commentall1(this.id)" id="' . $idpost . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= '</i></a>';
        }

        //header('Content-type: application/json');
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => $cntinsert));
    }

    //mulitple images commnet delete end  

    public function fourcomment($postid = '') {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        //$post_id =  $postid; 
        $post_id = $_POST['bus_post_id'];

        // html start

        $fourdata = '<div class="insertcommenttwo' . $post_id . '">';

        $contition_array = array('business_profile_post_id' => $post_id, 'status' => '1');
        $busienssdata = $this->data['busienssdata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($busienssdata) {
            foreach ($busienssdata as $rowdata) {

                $companyname = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->company_name;
                $companyslug = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->business_slug;
                $fourdata .= '<div class="all-comment-comment-box">';
                $fourdata .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-design-pro-comment-img">';

                $busienss_userimage = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->business_user_image;

                if ($busienss_userimage) {


                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $busienss_userimage)) {
                        $a = $companyname;
                        $acr = substr($a, 0, 1);

                        $fourdata .= '<div class="post-img-div">';
                        $fourdata .= ucfirst(strtolower($acr));
                        $fourdata .= '</div>';
                    } else {
                        $fourdata .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $busienss_userimage) . '"  alt="">';
                    }
                } else {
                    $a = $companyname;
                    $acr = substr($a, 0, 1);

                    $fourdata .= '<div class="post-img-div">';
                    $fourdata .= ucfirst(strtolower($acr));
                    $fourdata .= '</div>';
                }
                $fourdata .= '</div></a><div class="comment-name"><b>';
                $fourdata .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . ucfirst(strtolower($companyname)) . '</a></br></b></div>';

                $fourdata .= '<div class="comment-details" id= "showcommenttwo' . $rowdata['business_profile_post_comment_id'] . '">';
                $fourdata .= '<div id= "lessmore' . $rowdata['business_profile_post_comment_id'] . '"  style="display:block;">';

                $small = substr($rowdata['comments'], 0, 180);

                $fourdata .= '' . $this->common->make_links($small) . '&nbsp;';

                // echo $this->common->make_links($small);

                if (strlen($rowdata['comments']) > 180) {
                    $fourdata .= '... <span id="kkkk" onClick="seemorediv(' . $rowdata['business_profile_post_comment_id'] . ')">View More</span>';
                }

                $fourdata .= '</div>';


                $fourdata .= '<div id= "seemore' . $rowdata['business_profile_post_comment_id'] . '"  style="display:none;">';

                $fourdata .= '' . $this->common->make_links($rowdata['comments']) . '</div></div>';

                $fourdata .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
                //$fourdata .= '<textarea type="text" class="textarea" name="' . $rowdata['business_profile_post_comment_id'] . '" id="editcommenttwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:none; resize:none;" onClick="commentedittwo(this.name)">' . $rowdata['comments'] . '</textarea>';
                $fourdata .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $rowdata['business_profile_post_comment_id'] . '"  id="editcommenttwo' . $rowdata['business_profile_post_comment_id'] . '" placeholder="Type Message ..."  onkeyup="commentedittwo(' . $rowdata['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $rowdata['comments'] . '</div>';
                $fourdata .= '<span class="comment-edit-button"><button id="editsubmittwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_commenttwo(' . $rowdata['business_profile_post_comment_id'] . ')">Save</button></span>';

//$fourdata .= '<input type="text" name="' . $rowdata['business_profile_post_comment_id'] . '" id="editcommenttwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:none" value="' . $rowdata['comments'] . '" onClick="commentedittwo(this.name)"></div>';
//
//$fourdata .= '<div class="col-md-2 comment-edit-button">';
//$fourdata .= '<button id="editsubmittwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_commenttwo(' . $rowdata['business_profile_post_comment_id'] . ')">Comment</button></div>';

                $fourdata .= '</div></div><div class="art-comment-menu-design">';
                $fourdata .= '<div class="comment-details-menu" id="likecomment' . $rowdata['business_profile_post_comment_id'] . '">';
                $fourdata .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '"   onClick="comment_like(this.id)">';

                $userid = $this->session->userdata('aileenuser');
                $contition_array = array('business_profile_post_comment_id' => $rowdata['business_profile_post_comment_id'], 'status' => '1');
                $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

                if (!in_array($userid, $likeuserarray)) {

                    $fourdata .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
                } else {

                    $fourdata .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                }
                $fourdata .= '<span>';

                if ($rowdata['business_comment_likes_count'] > 0) {
                    $fourdata .= ' ' . $rowdata['business_comment_likes_count'] . '';
                }

                $fourdata .= '</span></a></div>';
                $userid = $this->session->userdata('aileenuser');
                if ($rowdata['user_id'] == $userid) {

                    $fourdata .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $fourdata .= '<div class="comment-details-menu">';

                    $fourdata .= '<div id="editcommentboxtwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:block;">';
                    $fourdata .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '"   onClick="comment_editboxtwo(this.id)" class="editbox">Edit
                                     </a>
                                     </div>';

                    $fourdata .= '<div id="editcancletwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:none;">';
                    $fourdata .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '" onClick="comment_editcancletwo(this.id)">Cancel</a></div></div>';
                }

                $userid = $this->session->userdata('aileenuser');
                $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $rowdata['business_profile_post_id'], 'status' => 1))->row()->user_id;
                if ($rowdata['user_id'] == $userid || $business_userid == $userid) {

                    $fourdata .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $fourdata .= '<div class="comment-details-menu">';
                    $fourdata .= '<input type="hidden" name="post_delete"';
                    $fourdata .= 'id="post_deletetwo' . $rowdata['business_profile_post_comment_id'] . '"; value= "' . $rowdata['business_profile_post_id'] . '">';
                    $fourdata .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '"onClick="comment_deletetwo(this.id)"> Delete<span class="insertcommenttwo' . $rowdata['business_profile_post_comment_id'] . '"></span></a></div>';
                }
                $fourdata .= '<span role="presentation" aria-hidden="true"> · </span>';
                $fourdata .= '<div class="comment-details-menu">';
                //$fourdata .= '<p>' .  $bus_comment['created_date'] . '</br>';
                //$fourdata .= '<p>' . date('Y-m-d H:i:s', strtotime($bus_comment['created_date'])) . '</br>';
                $fourdata .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($rowdata['created_date']))) . '</br>';

                $fourdata .= '</p></div></div></div>';
            }
        } else {
            $fourdata = 'No comments Available!!!';
        }
        $fourdata .= '</div>';

        echo $fourdata;
    }

    public function mulfourcomment($postid) {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        //$post_id =  $postid; 
        $post_id = $_POST['bus_post_id'];

        $fourdata .= '<div class="insertcommenttwo' . $post_id . '">';

        $contition_array = array('post_image_id' => $post_id, 'is_delete' => '0');

        $busmulimage1 = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($busmulimage1) {
            foreach ($busmulimage1 as $rowdata) {

                $companyname = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->company_name;
                $companyslug = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->business_slug;

                $fourdata .= '<div class="all-comment-comment-box">';

                $fourdata .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-design-pro-comment-img">';

                $business_userimage = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->business_user_image;

                if ($business_userimage != '') {

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                        $a = $companyname;
                        $acr = substr($a, 0, 1);

                        $fourdata .= '<div class="post-img-div">';
                        $fourdata .= ucfirst(strtolower($acr));
                        $fourdata .= '</div>';
                    } else {
                        $fourdata .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '"  alt="">';
                    }


                    $fourdata .= '</div></a>';
                } else {
                    $a = $companyname;
                    $acr = substr($a, 0, 1);

                    $fourdata .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-img-div">';
                    $fourdata .= ucfirst(strtolower($acr));
                    $fourdata .= '</div></a>';
                    $fourdata .= '</div>';
                }
                $fourdata .= '<div class="comment-name"><b>';
                $fourdata .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . ucfirst(strtolower($companyname)) . '</br>';
                $fourdata .= '</a></b></div>';
                $fourdata .= '<div class="comment-details" id= "showcommenttwo' . $rowdata['post_image_comment_id'] . '" style="display: block;">';
                $fourdata .= '' . $this->common->make_links($rowdata['comment']) . '</br> </div>';

                $fourdata .= '<div class="col-md-12"><div class="col-md-10">';

                $fourdata .= '<div contenteditable="true" class="editable_text" name="' . $rowdata['post_image_comment_id'] . '" id="editcommenttwo' . $rowdata['post_image_comment_id'] . '" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;"  onClick="commentedittwo(' . $rowdata['post_image_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">';
                $fourdata .= '' . $rowdata['comment'] . '</div>';

                $fourdata .= '</div>  <div class="col-md-2 comment-edit-button">';
                $fourdata .= '<button id="editsubmittwo' . $rowdata['post_image_comment_id'] . '" style="display:none" onClick="edit_commenttwo(' . $rowdata['post_image_comment_id'] . ')">Save</button></div> </div>';

                $fourdata .= '<div class="comment-details-menu" id="likecomment1' . $rowdata['post_image_comment_id'] . '">';

                $fourdata .= '<a id="' . $rowdata['post_image_comment_id'] . '"   onClick="imgcomment_liketwo(this.id)">';

                $userid = $this->session->userdata('aileenuser');
                $contition_array = array('post_image_comment_id' => $rowdata['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);

                $businesscommentlike2 = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if (count($businesscommentlike2) == 0) {
                    $fourdata .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
                } else {
                    $fourdata .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                }
                $fourdata .= '<span> ';

                $contition_array = array('post_image_comment_id' => $rowdata['post_image_comment_id'], 'is_unlike' => '0');
                $mulcountlike1 = $this->data['mulcountlike'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if (count($mulcountlike1) > 0) {
                    echo count($mulcountlike1);
                }


                $fourdata .= '</span></a></div>';
                $userid = $this->session->userdata('aileenuser');
                if ($rowdata['user_id'] == $userid) {

                    $fourdata .= '<div class="comment-details-menu">';
                    $fourdata .= '<div id="editcommentboxtwo' . $rowdata['post_image_comment_id'] . '" style="display:block;">';
                    $fourdata .= '<a id="' . $rowdata['post_image_comment_id'] . '"   onClick="comment_editboxtwo(this.id)" class="editbox">Edit
                                      </a>
                                      </div>';

                    $fourdata .= '<div id="editcancletwo' . $rowdata['post_image_comment_id'] . '" style="display:none;">';
                    $fourdata .= '<a id="' . $rowdata['post_image_comment_id'] . '" onClick="comment_editcancletwo(this.id)">Cancel </a></div>';

                    $fourdata .= '</div>';
                }

                $userid = $this->session->userdata('aileenuser');

                $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $rowdata['post_image_id'], 'status' => 1))->row()->user_id;


                if ($rowdata['user_id'] == $userid || $business_userid == $userid) {

                    $fourdata .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $fourdata .= '<div class="comment-details-menu">';



                    $fourdata .= '<input type="hidden" name="post_deletetwo"';
                    $fourdata .= 'id="post_deletetwo' . $rowdata['post_image_comment_id'] . '" value= "' . $rowdata['post_image_id'] . '">';
                    $fourdata .= '<a id="' . $rowdata['post_image_comment_id'] . '"   onClick="comment_deletetwo(this.id)"> Delete<span class="insertcomment1' . $rowdata['post_image_comment_id'] . '">';
                    $fourdata .= '</span></a></div>';
                }

                $fourdata .= '<span role="presentation" aria-hidden="true"> · </span>';
                $fourdata .= '<div class="comment-details-menu">';
                $fourdata .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($rowdata['created_date']))) . '</br></p></div>';

                $fourdata .= '</div>';
            }
        }
        $fourdata .= '</div></div>';

        echo $fourdata;
    }

    //postnews page controller start

    public function pnfourcomment($postid) {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_id = $_POST['bus_post_id'];

        $fourdata = '<div class="insertcommenttwo' . $post_id . '">';

        $contition_array = array('business_profile_post_id' => $post_id, 'status' => '1');
        $busienssdata = $this->data['busienssdata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($busienssdata) {
            foreach ($busienssdata as $rowdata) {

                $companyname = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->company_name;
                $companyslug = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->business_slug;
                $fourdata .= '<div class="all-comment-comment-box">';
                $fourdata .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-design-pro-comment-img">';

                $busienss_userimage = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->business_user_image;

                if ($busienss_userimage) {

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $busienss_userimage)) {
                        $a = $companyname;
                        $acr = substr($a, 0, 1);

                        $fourdata .= '<div class="post-img-div">';
                        $fourdata .= ucfirst(strtolower($acr));
                        $fourdata .= '</div>';
                    } else {
                        $fourdata .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $busienss_userimage) . '"  alt="">';
                    }
                } else {
                    $a = $companyname;
                    $acr = substr($a, 0, 1);

                    $fourdata .= '<div class="post-img-div">';
                    $fourdata .= ucfirst(strtolower($acr));
                    $fourdata .= '</div>';
                }
                $fourdata .= '</div></a><div class="comment-name"><b>';
                $fourdata .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . ucfirst(strtolower($companyname)) . '</a></br></b></div>';
                $fourdata .= '<div class="comment-details" id= "showcommenttwo' . $rowdata['business_profile_post_comment_id'] . '">';
                $fourdata .= '' . $this->common->make_links($rowdata['comments']) . '</div>';
                $fourdata .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
                $fourdata .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $rowdata['business_profile_post_comment_id'] . '"  id="editcommenttwo' . $rowdata['business_profile_post_comment_id'] . '" placeholder="Type Message ..." onkeyup="commentedittwo(' . $rowdata['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $rowdata['comments'] . '</div>';
                $fourdata .= '<span class="comment-edit-button"><button id="editsubmittwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_commenttwo(' . $rowdata['business_profile_post_comment_id'] . ')">Save</button></span>';
                $fourdata .= '</div></div><div class="art-comment-menu-design">';
                $fourdata .= '<div class="comment-details-menu" id="likecomment' . $rowdata['business_profile_post_comment_id'] . '">';
                $fourdata .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '"   onClick="comment_like(this.id)">';

                $userid = $this->session->userdata('aileenuser');
                $contition_array = array('business_profile_post_comment_id' => $rowdata['business_profile_post_comment_id'], 'status' => '1');
                $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

                if (!in_array($userid, $likeuserarray)) {

                    $fourdata .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
                } else {

                    $fourdata .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                }
                $fourdata .= '<span>';

                if ($rowdata['business_comment_likes_count'] > 0) {
                    $fourdata .= ' ' . $rowdata['business_comment_likes_count'] . '';
                }

                $fourdata .= '</span></a></div>';
                $userid = $this->session->userdata('aileenuser');
                if ($rowdata['user_id'] == $userid) {

                    $fourdata .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $fourdata .= '<div class="comment-details-menu">';

                    $fourdata .= '<div id="editcommentboxtwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:block;">';
                    $fourdata .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '"   onClick="comment_editboxtwo(this.id)" class="editbox">Edit
                                     </a>
                                     </div>';

                    $fourdata .= '<div id="editcancletwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:none;">';
                    $fourdata .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '" onClick="comment_editcancletwo(this.id)">Cancel</a></div></div>';
                }

                $userid = $this->session->userdata('aileenuser');
                $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $rowdata['business_profile_post_id'], 'status' => 1))->row()->user_id;
                if ($rowdata['user_id'] == $userid || $business_userid == $userid) {


                    $fourdata .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $fourdata .= '<div class="comment-details-menu">';
                    $fourdata .= '<input type="hidden" name="post_delete"';
                    $fourdata .= 'id="post_deletetwo' . $rowdata['business_profile_post_comment_id'] . '"; value= "' . $rowdata['business_profile_post_id'] . '">';
                    $fourdata .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '"onClick="comment_deletetwo(this.id)"> Delete<span class="insertcommenttwo' . $rowdata['business_profile_post_comment_id'] . '"></span></a></div>';
                }
                $fourdata .= '<span role="presentation" aria-hidden="true"> · </span>';
                $fourdata .= '<div class="comment-details-menu">';
                $fourdata .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($rowdata['created_date']))) . '</br>';

                $fourdata .= '</p></div></div></div>';
            }
        }
        $fourdata .= '</div>';

        echo $fourdata;
    }

    /*    public function pnfourcomment($postid) {

      $post_id = $_POST['bus_post_id'];

      $contition_array = array('business_profile_post_id' => $post_id, 'status' => '1');
      $busienssdata = $this->data['busienssdata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

      if ($busienssdata) {
      foreach ($busienssdata as $rowdata) {


      $companyname = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->company_name;

      $pnfour .= '<div class="all-comment-comment-box">';
      $pnfour .= '<div class="post-design-pro-comment-img">';
      //  echo $pnfour;

      $business_userimage = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->business_user_image;


      $pnfour .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '"  alt=""></div>';

      $pnfour .= '<div class="comment-name">';
      $pnfour .= '<b>' . $companyname . '</br></b> </div>';

      $pnfour .= '<div class="comment-details" id="showcommenttwo' . $rowdata['business_profile_post_comment_id'] . '">';
      $pnfour .= '' . $rowdata['comments'] . '</br></div>';

      $pnfour .= '<div class="col-md-12"><div class="col-md-10">';

      $pnfour .= '<div contenteditable="true" class="editable_text" name="' . $rowdata['business_profile_post_comment_id'] . '" id="editcommenttwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:none" onClick="commentedittwo(' . $rowdata['business_profile_post_comment_id'] . ')">';
      $pnfour .= '' . $rowdata['comments'] . '';
      $pnfour .= '</div>';

      $pnfour .= '</div>  <div class="col-md-2 comment-edit-button">';
      $pnfour .= '<button id="editsubmittwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_commenttwo(' . $rowdata['business_profile_post_comment_id'] . ')">Save</button>
      </div>';

      $pnfour .= '</div><div class="art-comment-menu-design">';

      $pnfour .= '<div class="comment-details-menu" id="likecomment' . $rowdata['business_profile_post_comment_id'] . '">';

      $pnfour .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '" onClick="comment_like(this.id)">';


      $userid = $this->session->userdata('aileenuser');
      $contition_array = array('business_profile_post_comment_id' => $rowdata['business_profile_post_comment_id'], 'status' => '1');
      $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
      $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

      if (!in_array($userid, $likeuserarray)) {

      $pnfour .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
      } else {
      $pnfour .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
      }
      $pnfour .= '<span>';

      if ($rowdata['business_comment_likes_count'] > 0) {
      $pnfour .= '' . $rowdata['business_comment_likes_count'] . '';
      }

      $pnfour .= '</span></a></div>';

      $userid = $this->session->userdata('aileenuser');
      if ($rowdata['user_id'] == $userid) {

      $pnfour .= '<span role="presentation" aria-hidden="true"> · </span>';
      $pnfour .= '<div class="comment-details-menu">';

      $pnfour .= '<div id="editcommentboxtwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:block;">';
      $pnfour .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '"onClick="comment_editboxtwo(this.id)" class="editbox">Edit</a></div>';

      $pnfour .= '<div id="editcancletwo' . $rowdata['business_profile_post_comment_id'] . '" style="display:none;">';
      $pnfour .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '" onClick="comment_editcancletwo(this.id)">Cancel</a>';
      $pnfour .= '</div></div>';
      }
      $userid = $this->session->userdata('aileenuser');
      $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $rowdata['business_profile_post_id'], 'status' => 1))->row()->user_id;
      if ($rowdata['user_id'] == $userid || $business_userid == $userid) {


      $pnfour .= '<span role="presentation" aria-hidden="true"> · </span>';
      $pnfour .= '<div class="comment-details-menu">';

      $pnfour .= '<input type="hidden" name="post_delete"  id="post_delete"';
      $pnfour .= 'value= "' . $rowdata['business_profile_post_id'] . '">';
      $pnfour .= '<a id="' . $rowdata['business_profile_post_comment_id'] . '"   onClick="comment_deletetwo(this.id)"> Delete<span class="insertcomment' . $rowdata['business_profile_post_comment_id'] . '"></span></a></div>';
      }
      $pnfour .= '<span role="presentation" aria-hidden="true"> · </span>';
      $pnfour .= '<div class="comment-details-menu">';
      $pnfour .= '<p>' . date('d-M-Y', strtotime($rowdata['created_date'])) . '</br>';
      $pnfour .= '</p></div></div></div>';
      }
      }

      echo $pnfour;
      } */

    public function pninsert_commentthree() {

        $userid = $this->session->userdata('aileenuser');
        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_id = $_POST["post_id"];
        $post_comment = $_POST["comment"];


        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $busdatacomment = $this->data['busdatacomment'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $data = array(
            'user_id' => $userid,
            'business_profile_post_id' => $post_id,
            'comments' => $post_comment,
            'created_date' => date('Y-m-d H:i:s', time()),
            'status' => 1,
            'is_delete' => 0
        );


        $insert_id = $this->common->insert_data_getid($data, 'business_profile_post_comment');

        // insert notification

        if ($busdatacomment[0]['user_id'] == $userid) {
            
        } else {
            $notificationdata = array(
                'not_type' => 6,
                'not_from_id' => $userid,
                'not_to_id' => $busdatacomment[0]['user_id'],
                'not_read' => 2,
                'not_product_id' => $insert_id,
                'not_from' => 6,
                'not_img' => 1,
                'not_created_date' => date('Y-m-d H:i:s'),
                'not_active' => 1
            );
            //echo "<pre>"; print_r($notificationdata); 
            $insert_id_notification = $this->common->insert_data_getid($notificationdata, 'notification');
        }
        // end notoification

        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');
//echo "<pre>"; print_r($businessprofiledata); die();

        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $buscmtcnt = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
// khyati changes start

        foreach ($businessprofiledata as $business_profile) {

            $company_name = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->company_name;
            $companyslug = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->business_slug;
            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id'], 'status' => 1))->row()->business_user_image;

            // $cmtinsert = '<div class="all-comment-comment-box">';

            $cmtinsert .= '<div class="all-comment-comment-box">';
            $cmtinsert .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-design-pro-comment-img">';
            if ($business_userimage != '') {


                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                    $a = $company_name;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';
                } else {
                    $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                }


                $cmtinsert .= '</div></a>';
            } else {
                $a = $company_name;
                $acr = substr($a, 0, 1);

                $cmtinsert .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-img-div">';
                $cmtinsert .= ucfirst(strtolower($acr));
                $cmtinsert .= '</div></a>';
                $cmtinsert .= '</div>';
            }
            $cmtinsert .= '<div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . ucfirst(strtolower($company_name)) . '</a></b>';
            $cmtinsert .= '</div>';
            $cmtinsert .= '<div class="comment-details" id="showcomment' . $business_profile['business_profile_post_comment_id'] . '">';
            $cmtinsert .= $this->common->make_links($business_profile['comments']);
            $cmtinsert .= '</div>';

            $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
            //$cmtinsert .= '<textarea type="text" class="textarea" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcomment' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;resize: none;" onClick="commentedit(this.name)">' . $business_profile['comments'] . '</textarea>';
            $cmtinsert .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $business_profile['business_profile_post_comment_id'] . '"  id="editcomment' . $business_profile['business_profile_post_comment_id'] . '" placeholder="Type Message ..." onkeyup="commentedit(' . $business_profile['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $business_profile['comments'] . '</div>';
            $cmtinsert .= '<span class="comment-edit-button"><button id="editsubmit' . $business_profile['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_comment(' . $business_profile['business_profile_post_comment_id'] . ')">Save</button></span>';
            $cmtinsert .= '</div></div>';
            //$cmtinsert .= '<input type="text" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcomment' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;" value="' . $business_profile['comments'] . ' " onClick="commentedit(this.name)">';
            //$cmtinsert .= '<button id="editsubmit' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;" onClick="edit_comment(' . $business_profile['business_profile_post_comment_id'] . ')">Comment</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';

            $cmtinsert .= '<div class="art-comment-menu-design"><div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';
            $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
            $cmtinsert .= 'onClick="comment_like1(this.id)">';

            $userid = $this->session->userdata('aileenuser');
            $contition_array = array('business_profile_post_comment_id' => $business_profile['business_profile_post_comment_id'], 'status' => '1');
            $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

            if (!in_array($userid, $likeuserarray)) {
                $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
            } else {
                $cmtinsert .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
            }

            $cmtinsert .= '<span>';
            if ($business_profile['business_comment_likes_count'] > 0) {
                $cmtinsert .= ' ' . $business_profile['business_comment_likes_count'];
            }
            $cmtinsert .= '</span>';
            $cmtinsert .= '</a></div>';


            $userid = $this->session->userdata('aileenuser');
            if ($business_profile['user_id'] == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<div id="editcommentbox' . $business_profile['business_profile_post_comment_id'] . '"style="display:block;">';

                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editbox(this.id)" class="editbox">';
                $cmtinsert .= 'Edit';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '<div id="editcancle' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;">';

                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editcancle(this.id)">';
                $cmtinsert .= 'Cancel';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '</div>';
            }




            $userid = $this->session->userdata('aileenuser');

            $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $business_profile['business_profile_post_id'], 'status' => 1))->row()->user_id;


            if ($business_profile['user_id'] == $userid || $business_userid == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<input type="hidden" name="post_delete"';
                $cmtinsert .= 'id="post_delete' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'value= "' . $business_profile['business_profile_post_id'] . '">';
                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_delete(this.id)">';
                $cmtinsert .= 'Delete <span class="insertcomment' . $business_profile['business_profile_post_comment_id'] . '"></span>';
                $cmtinsert .= '</a></div>';
            }

            $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
            $cmtinsert .= '<div class="comment-details-menu">';
            $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($business_profile['created_date']))) . '</p></div></div></div>';


            // comment aount variable start
            $idpost = $business_profile['business_profile_post_id'];
            $cmtcount = '<a onClick="commentall(this.id)" id="' . $idpost . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= ' ' . count($buscmtcnt) . '';
            $cmtcount .= '</i></a>';

            // comment count variable end 
            if (count($buscmtcnt) > 0) {
                $cntinsert .= '' . count($buscmtcnt) . '';
                $cntinsert .= '<span> Comment</span>';
            }
        }
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => $cntinsert
        ));
        // khyati chande 
    }

    public function pninsert_comment() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_id = $_POST["post_id"];
        $post_comment = $_POST["comment"];



        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $busdatacomment = $this->data['busdatacomment'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        $data = array(
            'user_id' => $userid,
            'business_profile_post_id' => $post_id,
            'comments' => $post_comment,
            'created_date' => date('Y-m-d H:i:s', time()),
            'status' => 1,
            'is_delete' => 0
        );



        $insert_id = $this->common->insert_data_getid($data, 'business_profile_post_comment');


        // insert notification

        if ($busdatacomment[0]['user_id'] == $userid) {
            
        } else {
            $notificationdata = array(
                'not_type' => 6,
                'not_from_id' => $userid,
                'not_to_id' => $busdatacomment[0]['user_id'],
                'not_read' => 2,
                'not_product_id' => $insert_id,
                'not_from' => 6,
                'not_img' => 1,
                'not_created_date' => date('Y-m-d H:i:s'),
                'not_active' => 1
            );
            //echo "<pre>"; print_r($notificationdata); 
            $insert_id_notification = $this->common->insert_data_getid($notificationdata, 'notification');
        }
        // end notoification



        $contition_array = array('business_profile_post_id' => $_POST["post_id"], 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo "<pre>"; print_r($businessprofiledata); die();
        // khyati changes start
        $cmtinsert = '<div class="insertcommenttwo' . $post_id . '">';
        foreach ($businessprofiledata as $business_profile) {
            $company_name = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->company_name;
            $companyslug = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->business_slug;
            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id'], 'status' => 1))->row()->business_user_image;

            $cmtinsert .= '<div class="all-comment-comment-box">';
            $cmtinsert .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-design-pro-comment-img">';
            if ($business_userimage != '') {

                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                    $a = $company_name;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div>';
                } else {

                    $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                }


                $cmtinsert .= '</div></a>';
            } else {
                $a = $company_name;
                $acr = substr($a, 0, 1);

                $cmtinsert .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-img-div">';
                $cmtinsert .= ucfirst(strtolower($acr));
                $cmtinsert .= '</div></a>';
                $cmtinsert .= '</div>';
            }
            $cmtinsert .= '<div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . ucfirst(strtolower($company_name)) . '</a></b>';
            $cmtinsert .= '</div>';
            $cmtinsert .= '<div class="comment-details" id= "showcommenttwo' . $business_profile['business_profile_post_comment_id'] . '" >';
            $cmtinsert .= $this->common->make_links($business_profile['comments']);
            $cmtinsert .= '</div>';
            $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
            //$cmtinsert .= '<textarea type="text" class="textarea" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;resize: none;" onclick="commentedittwo(this.name)">' . $business_profile['comments'] . '</textarea>';
            $cmtinsert .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $business_profile['business_profile_post_comment_id'] . '"  id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '" placeholder="Type Message ..."  onkeyup="commentedittwo(' . $business_profile['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $business_profile['comments'] . '</div>';
            $cmtinsert .= '<span class="comment-edit-button"><button id="editsubmittwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none" onclick="edit_commenttwo(' . $business_profile['business_profile_post_comment_id'] . ')">Save</button></span>';
            $cmtinsert .= '</div></div>';

//            $cmtinsert .= '<input type="text" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;" value="' . $business_profile['comments'] . ' " onClick="commentedittwo(this.name)">';
//            $cmtinsert .= '<button id="editsubmittwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;" onClick="edit_commenttwo(' . $business_profile['business_profile_post_comment_id'] . ')">Comment</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';

            $cmtinsert .= '<div class="art-comment-menu-design"><div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';
            $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
            $cmtinsert .= 'onClick="comment_like1(this.id)">';

            $userid = $this->session->userdata('aileenuser');
            $contition_array = array('business_profile_post_comment_id' => $business_profile['business_profile_post_comment_id'], 'status' => '1');
            $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

            if (!in_array($userid, $likeuserarray)) {
                $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
            } else {
                $cmtinsert .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
            }

            $cmtinsert .= '<span>';
            if ($business_profile['business_comment_likes_count'] > 0) {
                $cmtinsert .= ' ' . $business_profile['business_comment_likes_count'];
            }
            $cmtinsert .= '</span>';
            $cmtinsert .= '</a></div>';


            $userid = $this->session->userdata('aileenuser');
            if ($business_profile['user_id'] == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<div id="editcommentboxtwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:block;">';

                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editboxtwo(this.id)">';
                $cmtinsert .= 'Edit';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '<div id="editcancletwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;">';

                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_editcancletwo(this.id)">';
                $cmtinsert .= 'Cancel';
                $cmtinsert .= '</a></div>';

                $cmtinsert .= '</div>';
            }




            $userid = $this->session->userdata('aileenuser');

            $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $business_profile['business_profile_post_id'], 'status' => 1))->row()->user_id;


            if ($business_profile['user_id'] == $userid || $business_userid == $userid) {

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';


                $cmtinsert .= '<input type="hidden" name="post_deletetwo"';
                $cmtinsert .= 'id="post_deletetwo' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'value= "' . $business_profile['business_profile_post_id'] . '">';
                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_deletetwo(this.id)">';
                $cmtinsert .= 'Delete';
                $cmtinsert .= '</a></div>';
            }

            $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
            $cmtinsert .= '<div class="comment-details-menu">';
            $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($business_profile['created_date']))) . '</p></div></div></div>';


            // comment aount variable start
            $idpost = $business_profile['business_profile_post_id'];
            $cmtcount = '<a onClick="commentall(this.id)" id="' . $idpost . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= ' ' . count($businessprofiledata) . '';
            $cmtcount .= '</i></a>';

            // comment count variable end 
            // comment count variable end 
        }
        if (count($businessprofiledata) > 0) {
            $cntinsert .= '' . count($businessprofiledata) . '';
            $cntinsert .= '<span> Comment</span>';
        }

//        echo $cmtinsert;
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => $cntinsert
        ));

        // khyati chande 
    }

    //Business_profile comment delete start
    public function pndelete_comment() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_id = $_POST["post_id"];
        $post_delete = $_POST["post_delete"];

        $data = array(
            'status' => 0,
        );


        $updatdata = $this->common->update_data($data, 'business_profile_post_comment', 'business_profile_post_comment_id', $post_id);


        $contition_array = array('business_profile_post_id' => $post_delete, 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('business_profile_post_id' => $post_delete, 'status' => '1');
        $buscmtcnt = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo '<pre>'; print_r($businessprofiledata); die();
// khyati changes start
        if (count($businessprofiledata) > 0) {
            foreach ($businessprofiledata as $business_profile) {

                $companyname = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->company_name;
                $companyslug = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->business_slug;
                
                $business_userimage = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id'], 'status' => 1))->row()->business_user_image;

                $cmtinsert .= '<div class="all-comment-comment-box">';
                $cmtinsert .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-design-pro-comment-img">';

                if ($business_userimage != '') {


                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                        $a = $companyname;
                        $acr = substr($a, 0, 1);

                        $cmtinsert .= '<div class="post-img-div">';
                        $cmtinsert .= ucfirst(strtolower($acr));
                        $cmtinsert .= '</div>';
                    } else {
                        $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                    }
                    $cmtinsert .= '</div></a>';
                } else {
                    $a = $companyname;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div></a>';
                    $cmtinsert .= '</div>';
                }
                $cmtinsert .= '<div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . $companyname . '</a></b>';
                $cmtinsert .= '</div>';
                $cmtinsert .= '<div class="comment-details" id= "showcomment' . $business_profile['business_profile_post_comment_id'] . '"" >';
                $cmtinsert .= $this->common->make_links($business_profile['comments']);
                $cmtinsert .= '</div>';
                $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
                //$cmtinsert .= '<textarea type="text" class="textarea" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcomment' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;resize: none;" onClick="commentedit(this.name)">' . $business_profile['comments'] . '</textarea>';
                $cmtinsert .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $business_profile['business_profile_post_comment_id'] . '"  id="editcomment' . $business_profile['business_profile_post_comment_id'] . '" placeholder="Type Message ..." onkeyup="commentedit(' . $business_profile['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $business_profile['comments'] . '</div>';
                $cmtinsert .= '<span class="comment-edit-button"><button id="editsubmit' . $business_profile['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_comment(' . $business_profile['business_profile_post_comment_id'] . ')">Save</button></span>';
                $cmtinsert .= '</div></div>';
//                $cmtinsert .= '<input type="text" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcomment' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;" value="' . $business_profile['comments'] . ' " onClick="commentedit(this.name)">';
//                $cmtinsert .= '<button id="editsubmit' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;" onClick="edit_comment(' . $business_profile['business_profile_post_comment_id'] . ')">Comment</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';
                $cmtinsert .= '<div class="art-comment-menu-design"><div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';
                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_like1(this.id)">';

                $userid = $this->session->userdata('aileenuser');
                $contition_array = array('business_profile_post_comment_id' => $business_profile['business_profile_post_comment_id'], 'status' => '1');
                $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

                if (!in_array($userid, $likeuserarray)) {


                    $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
                } else {
                    $cmtinsert .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                }


                $cmtinsert .= '<span>';
                if ($business_profile['business_comment_likes_count'] > 0) {
                    $cmtinsert .= ' ' . $business_profile['business_comment_likes_count'];
                }
                $cmtinsert .= '</span>';
                $cmtinsert .= '</a></div>';


                $userid = $this->session->userdata('aileenuser');
                if ($business_profile['user_id'] == $userid) {

                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<div id="editcommentbox' . $business_profile['business_profile_post_comment_id'] . '"style="display:block;">';

                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_editbox(this.id)">';
                    $cmtinsert .= 'Edit';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '<div id="editcancle' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;">';

                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_editcancle(this.id)">';
                    $cmtinsert .= 'Cancel';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '</div>';
                }




                $userid = $this->session->userdata('aileenuser');

                $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $business_profile['business_profile_post_id'], 'status' => 1))->row()->user_id;


                if ($business_profile['user_id'] == $userid || $business_userid == $userid) {

                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<input type="hidden" name="post_delete"';
                    $cmtinsert .= 'id="post_delete' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'value= "' . $business_profile['business_profile_post_id'] . '">';
                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_delete(this.id)">';
                    $cmtinsert .= 'Delete';
                    $cmtinsert .= '</a></div>';
                }

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';
                $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($business_profile['created_date']))) . '</p></div></div></div>';


                // comment aount variable start
                $idpost = $business_profile['business_profile_post_id'];
                $cmtcount = '<a onClick="commentall(this.id)" id="' . $idpost . '">';
                $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
                $cmtcount .= ' ' . count($buscmtcnt) . '';
                $cmtcount .= '</i></a>';

                // comment count variable end 
            }
        } else {
            $idpost = $business_profile['business_profile_post_id'];
            $cmtcount = '<a onClick="commentall(this.id)" id="' . $idpost . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= '</i></a>';
        }
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => count($buscmtcnt)
        ));
    }

    /*
      public function pndelete_commenttwo() {
      $userid = $this->session->userdata('aileenuser');
      $post_id = $_POST["post_id"];
      $post_delete = $_POST["post_delete"];

      $data = array(
      'status' => 0,
      );
      $updatdata = $this->common->update_data($data, 'business_profile_post_comment', 'business_profile_post_comment_id', $post_id);


      $contition_array = array('business_profile_post_id' => $post_delete, 'status' => '1');
      $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

      foreach ($businessprofiledata as $business_profile) {

      $companyname = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->company_name;

      $business_userimage = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id'], 'status' => 1))->row()->business_user_image;

      $cmtinsert .= '<div class="post-design-pro-comment-img">';
      $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">  </div>';
      $cmtinsert .= '<div class="comment-name"><b>' . $companyname . '</b>';
      $cmtinsert .= '</div>';
      $cmtinsert .= '<div class="comment-details" id= "showcommenttwo' . $business_profile['business_profile_post_comment_id'] . '">';
      $cmtinsert .= $business_profile['comments'];
      $cmtinsert .= '</div>';

      $cmtinsert .= '<div contenteditable="true" class="editable_text" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;"  onClick="commentedittwo(' . $business_profile['business_profile_post_comment_id'] . ')">';
      $cmtinsert .= $business_profile['comments'];
      $cmtinsert .= '</div>';

      $cmtinsert .= '<button id="editsubmittwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;" onClick="edit_commenttwo(' . $business_profile['business_profile_post_comment_id'] . ')">Save</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';

      $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
      $cmtinsert .= 'onClick="comment_like1(this.id)">';

      $userid = $this->session->userdata('aileenuser');
      $contition_array = array('business_profile_post_comment_id' => $business_profile['business_profile_post_comment_id'], 'status' => '1');
      $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
      $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

      if (!in_array($userid, $likeuserarray)) {


      $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
      } else {
      $cmtinsert .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
      }


      $cmtinsert .= '<span>';
      if ($business_profile['business_comment_likes_count'] > 0) {
      $cmtinsert .= '' . $business_profile['business_comment_likes_count'];
      }
      $cmtinsert .= '</span>';
      $cmtinsert .= '</a></div>';


      $userid = $this->session->userdata('aileenuser');
      if ($business_profile['user_id'] == $userid) {

      $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
      $cmtinsert .= '<div class="comment-details-menu">';


      $cmtinsert .= '<div id="editcommentboxtwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:block;">';

      $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
      $cmtinsert .= 'onClick="comment_editboxtwo(this.id)">';
      $cmtinsert .= 'Edit';
      $cmtinsert .= '</a></div>';

      $cmtinsert .= '<div id="editcancletwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;">';

      $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
      $cmtinsert .= 'onClick="comment_editcancletwo(this.id)">';
      $cmtinsert .= 'Cancel';
      $cmtinsert .= '</a></div>';

      $cmtinsert .= '</div>';
      }




      $userid = $this->session->userdata('aileenuser');

      $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $business_profile['business_profile_post_id'], 'status' => 1))->row()->user_id;


      if ($business_profile['user_id'] == $userid || $business_userid == $userid) {

      $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
      $cmtinsert .= '<div class="comment-details-menu">';


      $cmtinsert .= '<input type="hidden" name="post_deletetwo"';
      $cmtinsert .= 'id="post_deletetwo"';
      $cmtinsert .= 'value= "' . $business_profile['business_profile_post_id'] . '">';
      $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
      $cmtinsert .= 'onClick="comment_deletetwo(this.id)">';
      $cmtinsert .= 'Delete';
      $cmtinsert .= '</a></div>';
      }

      $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
      $cmtinsert .= '<div class="comment-details-menu">';
      $cmtinsert .= '<p>' . $business_profile['created_date'] . '</p></div></div>';
      // comment aount variable start
      $idpost = $business_profile['business_profile_post_id'];
      $cmtcount = '<a onClick="commentall1(this.id)" id="' . $idpost . '">';
      $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
      $cmtcount .= ' ' . count($businessprofiledata) . '';
      $cmtcount .= '</i></a>';

      // comment count variable end
      }
      echo json_encode(
      array("comment" => $cmtinsert,
      "count" => $cmtcount));
      }
     */

    public function pndelete_commenttwo() {
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $post_id = $_POST["post_id"];
        $post_delete = $_POST["post_delete"];

        $data = array(
            'status' => 0,
        );
        $updatdata = $this->common->update_data($data, 'business_profile_post_comment', 'business_profile_post_comment_id', $post_id);


        $contition_array = array('business_profile_post_id' => $post_delete, 'status' => '1');
        $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        // echo '<pre>'; print_r($businessprofiledata); die();
// khyati changes start
        if (count($businessprofiledata) > 0) {
            foreach ($businessprofiledata as $business_profile) {

                $companyname = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->company_name;
                $companyslug = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id']))->row()->business_slug;
                $business_userimage = $this->db->get_where('business_profile', array('user_id' => $business_profile['user_id'], 'status' => 1))->row()->business_user_image;

                $cmtinsert .= '<div class="all-comment-comment-box">';
                $cmtinsert .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-design-pro-comment-img">';
                if ($business_userimage != '') {

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                        $a = $companyname;
                        $acr = substr($a, 0, 1);

                        $cmtinsert .= '<div class="post-img-div">';
                        $cmtinsert .= ucfirst(strtolower($acr));
                        $cmtinsert .= '</div>';
                    } else {

                        $cmtinsert .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '" alt="">';
                    }
                    $cmtinsert .= '</div></a>';
                } else {
                    $a = $companyname;
                    $acr = substr($a, 0, 1);

                    $cmtinsert .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-img-div">';
                    $cmtinsert .= ucfirst(strtolower($acr));
                    $cmtinsert .= '</div></a>';
                    $cmtinsert .= '</div>';
                }
                $cmtinsert .= '<div class="comment-name"><b><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . $companyname . '</a></b>';
                $cmtinsert .= '</div>';
                $cmtinsert .= '<div class="comment-details" id="showcommenttwo' . $business_profile['business_profile_post_comment_id'] . '">';
                $cmtinsert .= $this->common->make_links($business_profile['comments']);
                $cmtinsert .= '</div>';
                $cmtinsert .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
                //$cmtinsert .= '<textarea type="text" class="textarea" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;resize: none;" onClick="commentedittwo(this.name)">' . $business_profile['comments'] . '</textarea>';
                $cmtinsert .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $business_profile['business_profile_post_comment_id'] . '"  id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '" placeholder="Type Message ..." onkeyup="commentedittwo(' . $business_profile['business_profile_post_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $business_profile['comments'] . '</div>';
                $cmtinsert .= '<span class="comment-edit-button"><button id="editsubmittwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none" onClick="edit_commenttwo(' . $business_profile['business_profile_post_comment_id'] . ')">Save</button></span>';
                $cmtinsert .= '</div></div>';
//                $cmtinsert .= '<input type="text" name="' . $business_profile['business_profile_post_comment_id'] . '" id="editcommenttwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;" value="' . $business_profile['comments'] . ' " onClick="commentedittwo(this.name)">';
//                $cmtinsert .= '<button id="editsubmittwo' . $business_profile['business_profile_post_comment_id'] . '" style="display:none;" onClick="edit_commenttwo(' . $business_profile['business_profile_post_comment_id'] . ')">Comment</button><div class="art-comment-menu-design"> <div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';

                $cmtinsert .= '<div class="art-comment-menu-design"><div class="comment-details-menu" id="likecomment1' . $business_profile['business_profile_post_comment_id'] . '">';
                $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                $cmtinsert .= 'onClick="comment_like1(this.id)">';

                $userid = $this->session->userdata('aileenuser');
                $contition_array = array('business_profile_post_comment_id' => $business_profile['business_profile_post_comment_id'], 'status' => '1');
                $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

                if (!in_array($userid, $likeuserarray)) {


                    $cmtinsert .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
                } else {
                    $cmtinsert .= '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                }


                $cmtinsert .= '<span>';
                if ($business_profile['business_comment_likes_count'] > 0) {
                    $cmtinsert .= ' ' . $business_profile['business_comment_likes_count'];
                }
                $cmtinsert .= '</span>';
                $cmtinsert .= '</a></div>';


                $userid = $this->session->userdata('aileenuser');
                if ($business_profile['user_id'] == $userid) {

                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<div id="editcommentboxtwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:block;">';

                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_editboxtwo(this.id)">';
                    $cmtinsert .= 'Edit';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '<div id="editcancletwo' . $business_profile['business_profile_post_comment_id'] . '"style="display:none;">';

                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_editcancletwo(this.id)">';
                    $cmtinsert .= 'Cancel';
                    $cmtinsert .= '</a></div>';

                    $cmtinsert .= '</div>';
                }




                $userid = $this->session->userdata('aileenuser');

                $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $business_profile['business_profile_post_id'], 'status' => 1))->row()->user_id;


                if ($business_profile['user_id'] == $userid || $business_userid == $userid) {

                    $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $cmtinsert .= '<div class="comment-details-menu">';


                    $cmtinsert .= '<input type="hidden" name="post_deletetwo"';
                    $cmtinsert .= 'id="post_deletetwo' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'value= "' . $business_profile['business_profile_post_id'] . '">';
                    $cmtinsert .= '<a id="' . $business_profile['business_profile_post_comment_id'] . '"';
                    $cmtinsert .= 'onClick="comment_deletetwo(this.id)">';
                    $cmtinsert .= 'Delete';
                    $cmtinsert .= '</a></div>';
                }

                $cmtinsert .= '<span role="presentation" aria-hidden="true"> · </span>';
                $cmtinsert .= '<div class="comment-details-menu">';
                $cmtinsert .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($business_profile['created_date']))) . '</p></div></div></div>';
                // comment aount variable start
                $idpost = $business_profile['business_profile_post_id'];
                $cmtcount = '<a onClick="commentall1(this.id)" id="' . $idpost . '">';
                $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
                $cmtcount .= ' ' . count($businessprofiledata) . '';
                $cmtcount .= '</i></a>';

                // comment count variable end 
            }
        } else {
            $idpost = $business_profile['business_profile_post_id'];
            $cmtcount = '<a onClick="commentall1(this.id)" id="' . $idpost . '">';
            $cmtcount .= '<i class="fa fa-comment-o" aria-hidden="true">';
            $cmtcount .= '</i></a>';
        }
        echo json_encode(
                array("comment" => $cmtinsert,
                    "count" => $cmtcount,
                    "comment_count" => count($businessprofiledata)
        ));
    }

    public function pnmulimagefourcomment() {

        $postid = $_POST['bus_img_id'];
        $mulimgfour = '<div class="insertimgcommenttwo' . $postid . '">';

        $contition_array = array('post_image_id' => $postid, 'is_delete' => '0');
        $busmulimage1 = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        if ($busmulimage1) {
            foreach ($busmulimage1 as $rowdata) {
                $companyname = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->company_name;
                $companyslug = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->business_slug;


                $mulimgfour .= '<div class="all-comment-comment-box">';

                $mulimgfour .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'"><div class="post-design-pro-comment-img">';

                $business_userimage = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->business_user_image;
                if ($business_userimage != '') {

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $business_userimage)) {
                        $a = $companyname;
                        $acr = substr($a, 0, 1);

                        $mulimgfour .= '<div class="post-img-div">';
                        $mulimgfour .= ucfirst(strtolower($acr));
                        $mulimgfour .= '</div>';
                    } else {

                        $mulimgfour .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $business_userimage) . '"  alt="">';
                    }

                    $mulimgfour .= '</div></a>';
                } else {
                    $a = $companyname;
                    $acr = substr($a, 0, 1);

                    $mulimgfour .= '<div class="post-img-div"><a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">';
                    $mulimgfour .= ucfirst(strtolower($acr));
                    $mulimgfour .= '</a></div>';
                    $mulimgfour .= '</div>';
                }
                $mulimgfour .= '<div class="comment-name"><b>';
                $mulimgfour .= '<a href="'.base_url('business_profile/business_profile_manage_post/'.$companyslug).'">' . ucfirst(strtolower($companyname)) . '</a></br></b></div>';
                $mulimgfour .= '<div class="comment-details" id="imgshowcommenttwo' . $rowdata['post_image_comment_id'] . '" style="display: block;">';


                $mulimgfour .= '' . $this->common->make_links($rowdata['comment']) . '</br></div>';


//                $mulimgfour .= '<div class="col-md-12"><div class="col-md-10">';
//                $mulimgfour .= '<input type="text" name="' . $rowdata['post_image_comment_id'] . '" id="imgeditcommenttwo' . $rowdata['post_image_comment_id'] . '" style="display: none;" value="' . $rowdata['comment'] . '" onkeyup="imgcommentedittwo(' . $rowdata['post_image_comment_id'] . ')">';
//
//                $mulimgfour .= '</div><div class="col-md-2 comment-edit-button">';
//                $mulimgfour .= '<button id="imgeditsubmittwo' . $rowdata['post_image_comment_id'] . '" style="display:none" onClick="imgedit_commenttwo(' . $rowdata['post_image_comment_id'] . ')">Save</button></div>';
//
//                $mulimgfour .= '</div>';

                $mulimgfour .= '<div class="edit-comment-box"><div class="inputtype-edit-comment">';
                $mulimgfour .= '<div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="' . $rowdata['post_image_comment_id'] . '"  id="imgeditcommenttwo' . $rowdata['post_image_comment_id'] . '" placeholder="Type Message ..." value= ""  onkeyup="imgcommentedittwo(' . $rowdata['post_image_comment_id'] . ')" onpaste="OnPaste_StripFormatting(this, event);">' . $rowdata['comment'] . '</div>';
                $mulimgfour .= '<span class="comment-edit-button"><button id="imgeditsubmittwo' . $rowdata['post_image_comment_id'] . '" style="display:none" onClick="imgedit_commenttwo(' . $rowdata['post_image_comment_id'] . ')">Save</button></span>';
                $mulimgfour .= '</div></div><div class="art-comment-menu-design">';
                $mulimgfour .= '<div class="comment-details-menu" id="imglikecomment1' . $rowdata['post_image_comment_id'] . '">';

                $mulimgfour .= '<a id="' . $rowdata['post_image_comment_id'] . '"   onClick="imgcomment_liketwo(this.id)">';

                $userid = $this->session->userdata('aileenuser');
                $contition_array = array('post_image_comment_id' => $rowdata['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);

                $businesscommentlike2 = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                //echo "<pre>"; print_r($businesscommentlike); 
                //echo count($businesscommentlike); 
                if (count($businesscommentlike2) == 0) {
                    $mulimgfour .= '<i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>';
                } else {
                    $mulimgfour .= '<i class="fa fa-thumbs-up main_color" aria-hidden="true"></i>';
                }
                $mulimgfour .= '<span> ';

                $contition_array = array('post_image_comment_id' => $rowdata['post_image_comment_id'], 'is_unlike' => '0');
                $mulcountlike1 = $this->data['mulcountlike'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if (count($mulcountlike1) > 0) {
                    $mulimgfour .= count($mulcountlike1);
                }


                $mulimgfour .= '</span></a></div>';

                $userid = $this->session->userdata('aileenuser');
                if ($rowdata['user_id'] == $userid) {
                    $mulimgfour .= '<span role="presentation" aria-hidden="true"> · </span>';
                    $mulimgfour .= '<div class="comment-details-menu">';

                    $mulimgfour .= '<div id="imgeditcommentboxtwo' . $rowdata['post_image_comment_id'] . '" style="display:block;">';
                    $mulimgfour .= '<a id="' . $rowdata['post_image_comment_id'] . '"   onClick="imgcomment_editboxtwo(this.id)" class="editbox">Edit</a></div>';

                    $mulimgfour .= '<div id="imgeditcancletwo' . $rowdata['post_image_comment_id'] . '" style="display:none;">';
                    $mulimgfour .= '<a id="' . $rowdata['post_image_comment_id'] . '" onClick="imgcomment_editcancletwo(this.id)">Cancel</a></div>';

                    $mulimgfour .= '</div>';
                }


                $userid = $this->session->userdata('aileenuser');

                $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $rowdata['post_image_id'], 'status' => 1))->row()->user_id;

                if ($rowdata['user_id'] == $userid || $business_userid == $userid) {

                    $mulimgfour .= '<span role="presentation" aria-hidden="true"> · </span>
                                    <div class="comment-details-menu">';
                    $mulimgfour .= '<input type="hidden" name="imgpost_delete1"  id="imgpost_deletetwo_' . $rowdata['post_image_comment_id'] . '" value= "' . $rowdata['post_image_id'] . '">';
                    $mulimgfour .= '<a id="' . $rowdata['post_image_comment_id'] . '"   onClick="imgcomment_deletetwo(this.id)"> Delete<span class="imginsertcomment1' . $rowdata['post_image_comment_id'] . '"></span></a></div>';
                }


                $mulimgfour .= '<span role="presentation" aria-hidden="true"> · </span>
 <div class="comment-details-menu">';
                $mulimgfour .= '<p>' . $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($rowdata['created_date']))) . '</br></p></div></div></div>';
            }
        }
        $mulimgfour .= '</div>';

        echo $mulimgfour;
    }

    //postnews page controller end

    public function likeuserlist() {
        $post_id = $_POST['post_id'];

        $contition_array = array('business_profile_post_id' => $post_id, 'status' => '1', 'is_delete' => '0');
        $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $likeuser = $commnetcount[0]['business_like_user'];
        $countlike = $commnetcount[0]['business_likes_count'] - 1;

        $likelistarray = explode(',', $likeuser);


        $modal = '<div class="modal-header">';
        //     $modal .=   '<button type="button" class="close" data-dismiss="modal">&times;</button>';
        $modal .= '<h4 class="modal-title">';

        $modal .= '' . count($likelistarray) . ' Likes';

        $modal .= '</h4></div>';
        $modal .= '<div class="modal-body padding_less_right">';
        $modal .= '<div class="like_user_list">';
        $modal .= '<ul>';
        foreach ($likelistarray as $key => $value) {

            $bus_slug = $this->db->get_where('business_profile', array('user_id' => $value))->row()->business_slug;
            $business_fname = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
            $bus_image = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->business_user_image;
            $bus_ind = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->industriyal;

            $bus_cat = $this->db->get_where('industry_type', array('industry_id' => $bus_ind, 'status' => 1))->row()->industry_name;
            if ($bus_cat) {
                $category = $bus_cat;
            } else {
                $category = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->other_industrial;
            }
            $modal .= '<li>';
            $modal .= '<div class="like_user_listq">';
            $modal .= '<a href="' . base_url('business_profile/business_resume/' . $bus_slug) . '" title="' . $business_fname1 . '" class="head_main_name" >';
            $modal .= '<div class="like_user_list_img">';
            if ($bus_image) {

                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $bus_image)) {
                    $a = $business_fname;
                    $acr = substr($a, 0, 1);

                    $modal .= '<div class="post-img-div">';
                    $modal .= ucfirst(strtolower($acr));
                    $modal .= '</div>';
                } else {
                    $modal .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $bus_image) . '"  alt="">';
                }
            } else {
                $a = $business_fname;
                $acr = substr($a, 0, 1);

                $modal .= '<div class="post-img-div">';
                $modal .= ucfirst(strtolower($acr));
                $modal .= '</div>';
            }
            $modal .= '</div>';
            $modal .= '<div class="like_user_list_main_desc">';
            $modal .= '<div class="like_user_list_main_name">';
            $modal .= '' . ucfirst(strtolower($business_fname)) . '';
            $modal .= '</div></a>';
            $modal .= '<div class="like_user_list_current_work">';
            $modal .= '<span class="head_main_work">' . $category . '</span>';
            $modal .= '</div>';
            $modal .= '</div>';
            $modal .= '</div>';
            $modal .= '</li>';
        }
        $modal .= '</ul>';
        $modal .= '</div>';
        $modal .= '<div class="clearfix"></div>';
        $modal .= '</div>';
        //  $modal .=  '<div class="modal-footer">';
        // $modal .=  '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
        //  $modal .=  '</div>';
//        echo '<div class="likeduser">';
//        echo '<div class="likeduser-title">User List</div>';
//        foreach ($likelistarray as $key => $value) {
//
//            $bus_slug = $this->db->get_where('business_profile', array('user_id' => $value))->row()->business_slug;
//
//            $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
//            echo '<div class="likeuser_list"><a href="' . base_url('business_profile/business_resume/' . $bus_slug) . '">';
//            echo ucwords($business_fname1);
//            echo '</a></div>';
//        }
//        echo '<div>';

        echo $modal;
    }

    public function imglikeuserlist() {
        $post_id = $_POST['post_id'];

        $contition_array = array('post_image_id' => $post_id, 'is_unlike' => '0');
        $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $modal = '<div class="modal-header">';
        $modal .= '<button type="button" class="close" data-dismiss="modal">&times;</button>';
        $modal .= '<h4 class="modal-title">';

        $modal .= '' . count($commneteduser) . ' Likes';

        $modal .= '</h4></div>';
        $modal .= '<div class="modal-body padding_less_right">';
        $modal .= '<div class="like_user_list">';
        $modal .= '<ul>';
        foreach ($commneteduser as $userlist) {

            $bus_slug = $this->db->get_where('business_profile', array('user_id' => $userlist['user_id']))->row()->business_slug;
            $business_fname = $this->db->get_where('business_profile', array('user_id' => $userlist['user_id'], 'status' => 1))->row()->company_name;
            $bus_image = $this->db->get_where('business_profile', array('user_id' => $userlist['user_id'], 'status' => 1))->row()->business_user_image;
            $bus_ind = $this->db->get_where('business_profile', array('user_id' => $userlist['user_id'], 'status' => 1))->row()->industriyal;

            $bus_cat = $this->db->get_where('industry_type', array('industry_id' => $bus_ind, 'status' => 1))->row()->industry_name;
            if ($bus_cat) {
                $category = $bus_cat;
            } else {
                $category = $this->db->get_where('business_profile', array('user_id' => $userlist['user_id'], 'status' => 1))->row()->other_industrial;
            }
            $modal .= '<li>';
            $modal .= '<div class="like_user_listq">';
            $modal .= '<a href="' . base_url('business_profile/business_resume/' . $bus_slug) . '" title="' . $business_fname1 . '" class="head_main_name" >';
            $modal .= '<div class="like_user_list_img">';
            if ($bus_image) {

                if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $bus_image)) {
                    $a = $business_fname;
                    $acr = substr($a, 0, 1);

                    $modal .= '<div class="post-img-div">';
                    $modal .= ucfirst(strtolower($acr));
                    $modal .= '</div>';
                } else {


                    $modal .= '<img  src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $bus_image) . '"  alt="">';
                }
            } else {
                $a = $business_fname;
                $acr = substr($a, 0, 1);

                $modal .= '<div class="post-img-div">';
                $modal .= ucfirst(strtolower($acr));
                $modal .= '</div>';
            }
            $modal .= '</div>';
            $modal .= '<div class="like_user_list_main_desc">';
            $modal .= '<div class="like_user_list_main_name">';
            $modal .= '' . ucfirst(strtolower($business_fname)) . '';
            $modal .= '</div></a>';
            $modal .= '<div class="like_user_list_current_work">';
            $modal .= '<span class="head_main_work">' . $category . '</span>';
            $modal .= '</div>';
            $modal .= '</div>';
            $modal .= '</div>';
            $modal .= '</li>';
        }
        $modal .= '</ul>';
        $modal .= '</div>';
        $modal .= '<div class="clearfix"></div>';
        $modal .= '</div>';
        $modal .= '<div class="modal-footer">';
        $modal .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
        $modal .= '</div>';



        echo $modal;

//        echo '<div class="likeduser">';
//        echo '<div class="likeduser-title">User List</div>';
//        foreach ($commneteduser as $userlist) {
//            $bus_slug = $this->db->get_where('business_profile', array('user_id' => $userlist['user_id']))->row()->business_slug;
//
//            $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $userlist['user_id'], 'status' => 1))->row()->company_name;
//            echo '<div class="likeuser_list"><a href="' . base_url('business_profile/business_resume/' . $bus_slug) . '">';
//            echo ucwords($business_fname1);
//            echo '</a></div>';
//        }
//        echo '<div>';
    }

    public function bus_img_delete() {
        $grade_id = $_POST['grade_id'];
        $delete_data = $this->common->delete_data('bus_image', 'image_id', $grade_id);
        if ($delete_data) {
            echo 'ok';
        }
    }

    public function contact_person_query() {

        $userid = $this->session->userdata('aileenuser');
        $to_id = $_POST['toid'];
        $status = $_POST['status'];


        $contition_array = array('contact_type' => 2);
        $search_condition = "((contact_to_id = '$to_id' AND contact_from_id = ' $userid') OR (contact_from_id = '$to_id' AND contact_to_id = '$userid'))";
        $contactperson = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = '', $groupby = '');
        if ($contactperson[0]['status'] == $status) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function contact_person() {
        $to_id = $_POST['toid'];
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End


        $contition_array = array('contact_type' => 2);
        $search_condition = "((contact_to_id = '$to_id' AND contact_from_id = ' $userid') OR (contact_from_id = '$to_id' AND contact_to_id = '$userid'))";
        $contactperson = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = '', $groupby = '');



        // $contition_array = array('contact_to_id' => $to_id, 'contact_from_id' => $userid);
        // $contactperson = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        if ($contactperson) {

            $status = $contactperson[0]['status'];
            $contact_id = $contactperson[0]['contact_id'];

            if ($status == 'pending') {
                $data = array(
                    'modify_date' => date('Y-m-d H:i:s'),
                    'status' => 'cancel'
                );

                //echo "<pre>"; print_r($data); die();
                $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contact_id);

                $contactdata = '<a href="#" onclick="return contact_person_query(' . $to_id . "," . "'" . 'cancel' . "'" . ');" style="cursor: pointer;">';
                $contactdata .= '  <div>   
                                                            <div class="add-contact">
                                                             <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div><span class="cancel_req_busi">   <img src="' . base_url('img/icon_contact_add.png') . '"></span></div>

                                                            </div>
                                                            

                                                            <div class="addtocont">
                                                    <span class="ft-13"><i class="icon-user"></i>
                                                       Add to contact </span>
                                                    </div> 

                                                </div>';
                $contactdata .= '</a>';
            } elseif ($status == 'cancel') {
                $data = array(
                    'contact_from_id' => $userid,
                    'contact_to_id' => $to_id,
                    'contact_type' => 2,
                    'created_date' => date('Y-m-d H:i:s'),
                    'status' => 'pending',
                    'not_read' => 2
                );


                $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contact_id);
                $contactdata = '<a href="#" onclick="return contact_person_query(' . $to_id . "," . "'" . 'pending' . "'" . ');" style="cursor: pointer;">';
                $contactdata .= '<div class="cance_req_main_box">   
                                                            <div class="add-contact">
                                                             <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div>
                                                         <span class="cancel_req_busi"><img src="' . base_url('img/icon_contact_cancel.png') . '"></span>
                                                            </div>

                                                            </div>
                                                            

                                                            <div class="addtocont">
                                                    <span class="ft-13 cl_haed_s">
                                                      Cancel request </span>
                                                    </div> 

                                                </div>
';
                $contactdata .= '</a>';
            } elseif ($status == 'confirm') {
                $data = array(
                    'created_date' => date('Y-m-d H:i:s'),
                    'status' => 'cancel'
                );


                $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contact_id);
                $contactdata = '<a href="#" onclick="return contact_person_query(' . $to_id . "," . "'" . 'cancel' . "'" . ');" style="cursor: pointer;">';
                $contactdata .= ' <div>   
                                                            <div class="add-contact">
                                                             <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div><span class="cancel_req_busi"><img src="' . base_url('img/icon_contact_add.png') . '"></span></div>

                                                            </div>
                                                            

                                                            <div class="addtocont">
                                                    <span class="ft-13"><i class="icon-user"></i>
                                                       Add to contact </span>
                                                    </div> 

                                                </div>';
                $contactdata .= '</a>';
            } elseif ($status == 'reject') {
                $data = array(
                    'contact_from_id' => $userid,
                    'contact_to_id' => $to_id,
                    'contact_type' => 2,
                    'created_date' => date('Y-m-d H:i:s'),
                    'status' => 'pending',
                    'not_read' => 2
                );

                $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contact_id);
                $contactdata = '<a href="#" onclick="return contact_person_query(' . $to_id . "," . "'" . 'pending' . "'" . ');" style="cursor: pointer;">';
                $contactdata .= '<div class="cance_req_main_box">   
                                                            <div class="add-contact">
                                                             <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div>
                                                         <span class="cancel_req_busi">   <img src="' . base_url('img/icon_contact_cancel.png') . '"></span>
                                                            </div>

                                                            </div>
                                                            

                                                            <div class="addtocont">
                                                    <span class="ft-13 cl_haed_s">
                                                      Cancel request </span>
                                                    </div> 

                                                </div>';
                $contactdata .= '</a>';
            }
        } else {

            $data = array(
                'contact_from_id' => $userid,
                'contact_to_id' => $to_id,
                'contact_type' => 2,
                'created_date' => date('Y-m-d H:i:s'),
                'status' => 'pending',
                'not_read' => 2
            );

            // echo "<pre>"; print_r($data); die();

            $insert_id = $this->common->insert_data_getid($data, 'contact_person');

            $contactdata = '<a href="#" onclick="return contact_person_query(' . $to_id . "," . "'" . 'pending' . "'" . ');" style="cursor: pointer;">';
            $contactdata .= '<div class="cance_req_main_box">   
                                                            <div class="add-contact">
                                                             <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div>
                                                         <span class="cancel_req_busi"><img src="' . base_url('img/icon_contact_cancel.png') . '"></span>
                                                            </div>

                                                            </div>
                                                            

                                                            <div class="addtocont">
                                                    <span class="ft-13 cl_haed_s">
                                                      Cancel request </span>
                                                    </div> 

                                                </div>
';
            $contactdata .= '</a>';
        }

        echo $contactdata;
    }

    public function contact_notification() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('contact_to_id' => $userid, 'status' => 'pending');
        $contactperson_req = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('contact_from_id' => $userid, 'status' => 'confirm');
        $contactperson_con = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $unique_user = array_merge($contactperson_req, $contactperson_con);


        $new = array();
        foreach ($unique_user as $value) {
            $new[$value['contact_id']] = $value;
        }

        $post = array();

        foreach ($new as $key => $row) {

            $post[$key] = $row['contact_id'];
        }
        array_multisort($post, SORT_DESC, $new);

        $contactperson = $new;

//echo "<pre>"; print_r($contactperson); die();


        if ($contactperson) {
            foreach ($contactperson as $contact) {


                //echo $busdata[0]['industriyal'];  echo '<pre>'; print_r($inddata); die();
                //$contactdata .= '<ul id="' . $contact['contact_id'] . '">';

                if ($contact['contact_to_id'] == $userid) {

                    $contition_array = array('user_id' => $contact['contact_from_id'], 'status' => '1');
                    $contactperson_from = $this->common->select_data_by_condition('user', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                    if ($contactperson_from) {

                        $busdata = $this->common->select_data_by_id('business_profile', 'user_id', $contact['contact_from_id'], $data = '*', $join_str = array());
                        $inddata = $this->common->select_data_by_id('industry_type', 'industry_id', $busdata[0]['industriyal'], $data = '*', $join_str = array());

                        $contactdata .= '<li>';
                        $contactdata .= '<div class="addcontact-left">';
                        $contactdata .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $busdata[0]['business_slug']) . '">';
                        $contactdata .= '<div class="addcontact-pic">';

                        if ($busdata[0]['business_user_image']) {

                            if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image'])) {
                                $a = $busdata[0]['company_name'];
                                $acr = substr($a, 0, 1);

                                $contactdata .= '<div class="post-img-div">';
                                $contactdata .= ucfirst(strtolower($acr));
                                $contactdata .= '</div>';
                            } else {

                                $contactdata .= '<img src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image']) . '">';
                            }
                        } else {
                            $a = $busdata[0]['company_name'];
                            $acr = substr($a, 0, 1);

                            $contactdata .= '<div class="post-img-div">';
                            $contactdata .= ucfirst(strtolower($acr));
                            $contactdata .= '</div>';
                        }
                        $contactdata .= '</div>';
                        $contactdata .= '<div class="addcontact-text">';
                        $contactdata .= '<span><b>' . ucfirst(strtolower($busdata[0]['company_name'])) . '</b></span>';
                        $contactdata .= '' . $inddata[0]['industry_name'] . '';
                        $contactdata .= '</div>';
                        $contactdata .= '</a>';
                        $contactdata .= '</div>';
                        $contactdata .= '<div class="addcontact-right">';
                        $contactdata .= '<a href="#" class="add-left-true" onclick = "return contactapprove(' . $contact['contact_from_id'] . ',1);"><i class="fa fa-check" aria-hidden="true"></i></a>';
                        $contactdata .= '<a href="#" class="add-right-true"  onclick = "return contactapprove(' . $contact['contact_from_id'] . ',0);"><i class="fa fa-times" aria-hidden="true"></i></a>';
                        $contactdata .= '</div>';
                        $contactdata .= '</li>';
                    }
                } else {



                    $contition_array = array('user_id' => $contact['contact_to_id'], 'status' => '1');
                    $contactperson_to = $this->common->select_data_by_condition('user', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                    if ($contactperson_to) {


                        $busdata = $this->common->select_data_by_id('business_profile', 'user_id', $contact['contact_to_id'], $data = '*', $join_str = array());


                        $inddata = $this->common->select_data_by_id('industry_type', 'industry_id', $busdata[0]['industriyal'], $data = '*', $join_str = array());

                        $contactdata .= '<li>';
                        $contactdata .= '<div class="addcontact-left custome-approved-contact">';
                        $contactdata .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $busdata[0]['business_slug']) . '">';
                        $contactdata .= '<div class="addcontact-pic">';

                        if ($busdata[0]['business_user_image']) {

                            if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image'])) {
                                $a = $busdata[0]['company_name'];
                                $acr = substr($a, 0, 1);

                                $contactdata .= '<div class="post-img-div">';
                                $contactdata .= ucfirst(strtolower($acr));
                                $contactdata .= '</div>';
                            } else {

                                $contactdata .= '<img src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image']) . '">';
                            }
                        } else {
                            $a = $busdata[0]['company_name'];
                            $acr = substr($a, 0, 1);

                            $contactdata .= '<div class="post-img-div">';
                            $contactdata .= ucfirst(strtolower($acr));
                            $contactdata .= '</div>';
                        }
                        $contactdata .= '</div>';
                        $contactdata .= '<div class="addcontact-text">';
                        $contactdata .= '<span><b>' . ucfirst(strtolower($busdata[0]['company_name'])) . '</b> confirmed your contact request</span>';
                        //$contactdata .= '' . $inddata[0]['industry_name'] . '';
                        $contactdata .= '</div>';
                        $contactdata .= '</a>';
                        $contactdata .= '</div>';
                        $contactdata .= '</li>';
                    }
                }
                //$contactdata .= '</ul>';
            }
        } else {

            $contactdata = '<div class="art-img-nn">
                                                <div class="art_no_post_img">
                                                    <img src="'.base_url().'img/No_Contact_Request.png">
                                                </div>
                                                <div class="art_no_post_text_c">
                                                    No Contact Request Available.
                                                </div>
                             </div>';
        }
        echo $contactdata;
    }

    /*public function contact_approve() {

        $toid = $_POST['toid'];
        $status = $_POST['status'];
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('contact_from_id' => $toid, 'contact_to_id' => $userid, 'status' => 'pending');
        $person = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $contactid = $person[0]['contact_id'];
        if ($status == 1) {
            $data = array(
                'modify_date' => date('Y-m-d', time()),
                'status' => 'confirm',
                'not_read' => 2
            );

            $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contactid);
        } else {

            $data = array(
                'modify_date' => date('Y-m-d', time()),
                'status' => 'reject'
            );

            $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contactid);
        }

        $contition_array = array('contact_to_id' => $userid, 'status' => 'pending');
        $contactperson_req = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('contact_from_id' => $userid, 'status' => 'confirm');
        $contactperson_con = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $unique_user = array_merge($contactperson_req, $contactperson_con);

        $new = array();
        foreach ($unique_user as $value) {
            $new[$value['contact_id']] = $value;
        }

        $post = array();

        foreach ($new as $key => $row) {

            $post[$key] = $row['contact_id'];
        }
        array_multisort($post, SORT_DESC, $new);

        $contactperson = $new;


        if ($contactperson) {
            foreach ($contactperson as $contact) {


                //echo $busdata[0]['industriyal'];  echo '<pre>'; print_r($inddata); die();
                $contactdata .= '<ul id="' . $contact['contact_id'] . '">';

                if ($contact['contact_to_id'] == $userid) {


                    $busdata = $this->common->select_data_by_id('business_profile', 'user_id', $contact['contact_from_id'], $data = '*', $join_str = array());
                    $inddata = $this->common->select_data_by_id('industry_type', 'industry_id', $busdata[0]['industriyal'], $data = '*', $join_str = array());


                    $contactdata .= '<li>';
                    $contactdata .= '<div class="addcontact-left">';
                    $contactdata .= '<a href="#">';
                    $contactdata .= '<div class="addcontact-pic">';

                    if ($busdata[0]['business_user_image']) {
                        $contactdata .= '<img src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image']) . '">';
                    } else {
                        $contactdata .= '<img src="' . base_url(WHITEIMAGE) . '">';
                    }
                    $contactdata .= '</div>';
                    $contactdata .= '<div class="addcontact-text">';
                    $contactdata .= '<span><b>' . $busdata[0]['company_name'] . '</b></span>';
                    $contactdata .= '' . $inddata[0]['industry_name'] . '';
                    $contactdata .= '</div>';
                    $contactdata .= '</a>';
                    $contactdata .= '</div>';
                    $contactdata .= '<div class="addcontact-right">';
                    $contactdata .= '<a href="javascript:void(0);" class="add-left-true" onclick = "return contactapprove(' . $contact['contact_from_id'] . ',1);"><i class="fa fa-check" aria-hidden="true"></i></a>';
                    $contactdata .= '<a href="javascript:void(0);"  class="add-right-true" onclick = "return contactapprove(' . $contact['contact_from_id'] . ',0);"><i class="fa fa-times" aria-hidden="true"></i></a>';
                    $contactdata .= '</div>';
                    $contactdata .= '</li>';
                } else {

                    $busdata = $this->common->select_data_by_id('business_profile', 'user_id', $contact['contact_to_id'], $data = '*', $join_str = array());


                    $inddata = $this->common->select_data_by_id('industry_type', 'industry_id', $busdata[0]['industriyal'], $data = '*', $join_str = array());

                    $contactdata .= '<li>';
                    $contactdata .= '<div class="addcontact-left custome-approved-contact">';
                    $contactdata .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $busdata[0]['business_slug']) . '">';
                    $contactdata .= '<div class="addcontact-pic">';

                    if ($busdata[0]['business_user_image']) {

                        if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image'])) {
                            $a = $busdata[0]['company_name'];
                            $acr = substr($a, 0, 1);

                            $contactdata .= '<div class="post-img-div">';
                            $contactdata .= ucfirst(strtolower($acr));
                            $contactdata .= '</div>';
                        } else {

                            $contactdata .= '<img src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image']) . '">';
                        }
                    } else {
                        $a = $busdata[0]['company_name'];
                        $acr = substr($a, 0, 1);

                        $contactdata .= '<div class="post-img-div">';
                        $contactdata .= ucfirst(strtolower($acr));
                        $contactdata .= '</div>';
                    }
                    $contactdata .= '</div>';
                    $contactdata .= '<div class="addcontact-text">';
                    $contactdata .= '<span><b>' . ucfirst(strtolower($busdata[0]['company_name'])) . '</b> confirmed your contact request</span>';
                    //$contactdata .= '' . $inddata[0]['industry_name'] . '';
                    $contactdata .= '</div>';
                    $contactdata .= '</a>';
                    $contactdata .= '</div>';
                    $contactdata .= '</li>';
                }
                $contactdata .= '</ul>';
            }
        } else {

            $contactdata = '<div class="art-img-nn">
                                                <div class="art_no_post_img">
                                                    <img src="http://localhost/aileensoul/img/No_Contact_Request.png">
                                                </div>
                                                <div class="art_no_post_text_c">
                                                    No Contact request Available.
                                                </div>
                             </div>';
        }

        $contition_array = array('contact_type' => 2, 'status' => 'confirm');
        $search_condition = "(contact_from_id = '$userid' OR contact_to_id = '$userid')";
        $contactpersonc = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = '', $groupby = '');
        $countdata = count($contactpersonc);
        $contactpersonc = $countdata;


        $contition_array = array('user_id' => $contactpersonc[0]['contact_from_id'], 'is_delete' => '0');
        $uservalid = $this->common->select_data_by_condition('user', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $cdata = $this->common->select_data_by_id('business_profile', 'user_id', $contactpersonc[0]['contact_from_id'], $data = '*', $join_str = array());

        $contition_array = array('contact_to_id' => $login, 'contact_from_id' => $contactpersonc[0]['contact_from_id'], 'contact_type' => 2);

        $clistuser = $this->common->select_data_by_condition('contact_person', $contition_array, $data = 'status,contact_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        $contactdataview = ' <div class="job-contact-frnd">

                                <div class="profile-job-post-detail clearfix" id="' . "removecontact" . $cdata[0]['user_id'] . '"><div class="profile-job-post-title-inside clearfix">
                                                <div class="profile-job-post-location-name">
                                                    <div class="user_lst"><ul>

                                                            <li class="fl">
                                                                <div class="follow-img">';

        if ($cdata[0]['business_user_image'] != '') {

            $contactdataview .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $cdata[0]['business_slug']) . '">';

            if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $cdata[0]['business_user_image'])) {
                $a = $cdata[0]['company_name'];
                $acr = substr($a, 0, 1);

                $contactdataview .= '<div class="post-img-userlist">';
                $contactdataview .= ucfirst(strtolower($acr));
                $contactdataview .= '</div>';
            } else {

                $contactdataview .= '<img src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $cdata[0]['business_user_image']) . '" height="50px" width="50px" alt="" >';
            }

            $contactdataview .= '</a>';
        } else {


            $contactdataview .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $cdata[0]['business_slug']) . '">';

            $a = $cdata[0]['company_name'];
            $acr = substr($a, 0, 1);
            $contactdataview .= '<div class="post-img-userlist">';
            $contactdataview .= ucfirst(strtolower($acr));
            $contactdataview .= '</div>';

            $contactdataview .= '</a>';
        }
        $contactdataview .= '</div></li>';

        $contactdataview .= '  <li style="width: 67%">
                                                                
                                                                    <div class="follow-li-text " style="padding: 0;">';

        $contactdataview .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $cdata[0]['business_slug']) . '">' . ucfirst(strtolower($cdata[0]['company_name'])) . '</a>';

        $contactdataview .= '</div>';


        $contactdataview .= '<div>';

        $category = $this->db->get_where('industry_type', array('industry_id' => $cdata[0]['industriyal'], 'status' => 1))->row()->industry_name;


        $contactdataview .= '<a>';

        if ($category) {

            $contactdataview .= $category;
        } else {
            $contactdataview .= $cdata[0]['other_industrial'];
        }
        $contactdataview .= '</a></div>';

        $contactdataview .= '</li>';

        $contactdataview .= '<li class="fr">';

        $contactdataview .= '<div class="user_btn cont_req" id="' . "statuschange" . $cdata[0]['user_id'] . '">
                    <button onclick="contact_person_cancle(' . $cdata[0]['user_id'] . ', "confirm")">
                            In contacts
                            </button> 
                             </div>';


        $contactdataview .= '</li>';

        $contactdataview .= '<ul></div></div></div></div></div>';




        echo json_encode(
                array(
                    "contactdata" => $contactdata,
                    "contactcount" => $contactpersonc,
                    "contactdataview" => $contactdataview,
        ));


        //echo $contactdata;
    }
*/
    
    public function contact_approve() {

        $toid = $_POST['toid'];
        $status = $_POST['status'];
        $userid = $this->session->userdata('aileenuser');

//if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
//if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('contact_from_id' => $toid, 'contact_to_id' => $userid, 'status' => 'pending');
        $person = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $contactid = $person[0]['contact_id'];
        if ($status == 1) {
            $data = array(
                'modify_date' => date('Y-m-d', time()),
                'status' => 'confirm',
                'not_read' => 2
            );

            $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contactid);
        } else {

            $data = array(
                'modify_date' => date('Y-m-d', time()),
                'status' => 'reject'
            );

            $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contactid);
        }

        $contition_array = array('contact_to_id' => $userid, 'status' => 'pending');
        $contactperson_req = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('contact_from_id' => $userid, 'status' => 'confirm');
        $contactperson_con = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $unique_user = array_merge($contactperson_req, $contactperson_con);

        $new = array();
        foreach ($unique_user as $value) {
            $new[$value['contact_id']] = $value;
        }

        $post = array();

        foreach ($new as $key => $row) {

            $post[$key] = $row['contact_id'];
        }
        array_multisort($post, SORT_DESC, $new);

        $contactperson = $new;


        if ($contactperson) {
            foreach ($contactperson as $contact) {


//echo $busdata[0]['industriyal'];  echo '<pre>'; print_r($inddata); die();
                $contactdata .= '<ul id="' . $contact['contact_id'] . '">';

                if ($contact['contact_to_id'] == $userid) {


                    $busdata = $this->common->select_data_by_id('business_profile', 'user_id', $contact['contact_from_id'], $data = '*', $join_str = array());
                    $inddata = $this->common->select_data_by_id('industry_type', 'industry_id', $busdata[0]['industriyal'], $data = '*', $join_str = array());


                    $contactdata .= '<li>';
                    $contactdata .= '<div class="addcontact-left">';
                    $contactdata .= '<a href="javascript:void(0);">';
                    $contactdata .= '<div class="addcontact-pic">';

                    if ($busdata[0]['business_user_image']) {
                        $contactdata .= '<img src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image']) . '">';
                    } else {
                        $contactdata .= '<img src="' . base_url(WHITEIMAGE) . '">';
                    }
                    $contactdata .= '</div>';
                    $contactdata .= '<div class="addcontact-text">';
                    $contactdata .= '<span><b>' . $busdata[0]['company_name'] . '</b></span>';
                    $contactdata .= '' . $inddata[0]['industry_name'] . '';
                    $contactdata .= '</div>';
                    $contactdata .= '</a>';
                    $contactdata .= '</div>';
                    $contactdata .= '<div class="addcontact-right">';
                    $contactdata .= '<a href="javascript:void(0);" class="add-left-true" onclick = "return contactapprove(' . $contact['contact_from_id'] . ', 1);"><i class="fa fa-check" aria-hidden="true"></i></a>';
                    $contactdata .= '<a href="javascript:void(0);"  class="add-right-true" onclick = "return contactapprove(' . $contact['contact_from_id'] . ', 0);"><i class="fa fa-times" aria-hidden="true"></i></a>';
                    $contactdata .= '</div>';
                    $contactdata .= '</li>';
                } else {

                    $busdata = $this->common->select_data_by_id('business_profile', 'user_id', $contact['contact_to_id'], $data = '*', $join_str = array());


                    $inddata = $this->common->select_data_by_id('industry_type', 'industry_id', $busdata[0]['industriyal'], $data = '*', $join_str = array());

                    $contactdata .= '<li>';
                    $contactdata .= '<div class="addcontact-left">';
                    $contactdata .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $busdata[0]['business_slug']) . '">';
                    $contactdata .= '<div class="addcontact-pic">';

                    if ($busdata[0]['business_user_image']) {

                        if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image'])) {


                            $contactdata .= '<img  src="' . base_url(NOBUSIMAGE) . '"  alt="">';
                        } else {

                            $contactdata .= '<img src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image']) . '">';
                        }
                    } else {


                        $contactdata .= '<img  src="' . base_url(NOBUSIMAGE) . '"  alt="">';
                    }
                    $contactdata .= '</div>';
                    $contactdata .= '<div class="addcontact-text">';
                    $contactdata .= '<span><b>' . ucfirst(strtolower($busdata[0]['company_name'])) . '</b> confirmed your contact request</span>';
//$contactdata .= '' . $inddata[0]['industry_name'] . '';
                    $contactdata .= '</div>';
                    $contactdata .= '</a>';
                    $contactdata .= '</div>';
                    $contactdata .= '</li>';
                }
                $contactdata .= '</ul>';
            }
        } else {

//            $contactdata = '<ul>';
//            $contactdata .= '<li>';
//            $contactdata .= '<div class="addcontact-left">';
//            $contactdata .= '<a href="#">';
//            $contactdata .= '<div class="addcontact-text">';
//            $contactdata .= 'Not data available...';
//            $contactdata .= '</div>';
//            $contactdata .= '</a>';
//            $contactdata .= '</div>';
//            $contactdata .= '</div>';
//            $contactdata .= '</li>';
//            $contactdata .= '</ul>';

            $contactdata = '<div class="art-img-nn">
                                                <div class="art_no_post_img">
                                                    <img src="'.base_url().'img/No_Contact_Request.png">
                                                </div>
                                                <div class="art_no_post_text_c">
                                                    No Contact request Available.
                                                </div>
                             </div>';
        }
//        echo $contactdata;

        $contition_array = array('contact_type' => 2, 'status' => 'confirm');
        $search_condition = "(contact_from_id = '$userid' OR contact_to_id = '$userid')";
        $contactpersonc = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = '', $groupby = '');
        $countdata = count($contactpersonc);
        $contactpersonc = $countdata;

        echo json_encode(
                array(
                    "contactdata" => $contactdata,
                    "contactcount" => $contactpersonc,
        ));
    }

    public function contact_list() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End
        $bussdata = $this->common->select_data_by_id('business_profile', 'user_id', $userid, $data = '*', $join_str = array());
        //  echo '<pre>'; print_r($bussdata); 

        $join_str[0]['table'] = 'business_profile';
        $join_str[0]['join_table_id'] = 'business_profile.user_id';
        $join_str[0]['from_table_id'] = 'contact_person.contact_from_id';
        $join_str[0]['join_type'] = '';

        $contition_array = array('contact_to_id' => $userid, 'contact_person.status' => 'pending');
        $friendlist_req = $this->data['friendlist_req'] = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str, $groupby = '');


        $join_str[0]['table'] = 'business_profile';
        $join_str[0]['join_table_id'] = 'business_profile.user_id';
        $join_str[0]['from_table_id'] = 'contact_person.contact_to_id';
        $join_str[0]['join_type'] = '';


        $contition_array = array('contact_from_id' => $userid, 'contact_person.status' => 'confirm');
        $friendlist_con = $this->data['friendlist_con'] = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str, $groupby = '');


        //$this->data['friendlist'] = array_merge($friendlist_con, $friendlist_req);
        //    city wise fetch users
//     $contition_array = array('contact_to_id' => $userid);
//     $buslist = $this->data['buslist'] = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = '', $groupby = '');
//      echo '<pre>'; print_r($buslist); 
//     $contition_array = array('city' => $bussdata[0]['city'], 'status' => '1','is_deleted' => 0,'user_id !=' => $userid);
//     $citylist = $this->data['citylist'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = '', $groupby = '');
//       echo '<pre>'; print_r($citylist); 
        //    category wise fetch users
//     $contition_array = array('industriyal' => $bussdata[0]['industriyal'], 'status' => '1','is_deleted' => 0,'user_id !=' => $userid);
//     $catlist = $this->data['catlist'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = '', $groupby = '');
//      echo '<pre>'; print_r($catlist); die();

        $this->load->view('business_profile/contact_list', $this->data);
    }

    public function contact_list_approve() {

        $toid = $_POST['toid'];
        $status = $_POST['status'];
        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $contition_array = array('contact_from_id' => $toid, 'contact_to_id' => $userid, 'status' => 'pending');
        $person = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $contactid = $person[0]['contact_id'];
        if ($status == 1) {
            $data = array(
                'modify_date' => date('Y-m-d', time()),
                'status' => 'confirm'
            );

            $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contactid);
        } else {

            $data = array(
                'modify_date' => date('Y-m-d', time()),
                'status' => 'reject'
            );

            $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contactid);
        }

        $contition_array = array('contact_to_id' => $userid, 'status' => 'pending');
        $contactperson = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($contactperson) {
            foreach ($contactperson as $contact) {

                $busdata = $this->common->select_data_by_id('business_profile', 'user_id', $contact['contact_from_id'], $data = '*', $join_str = array());
                $inddata = $this->common->select_data_by_id('industry_type', 'industry_id', $busdata[0]['industriyal'], $data = '*', $join_str = array());
                //echo $busdata[0]['industriyal'];  echo '<pre>'; print_r($inddata); die();
                $contactdata .= '<li id="' . $contact['contact_from_id'] . '">';
                $contactdata .= '<div class="list-box">';
                $contactdata .= '<div class="profile-img">';
                if ($busdata[0]['business_user_image'] != '') {

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image'])) {
                        $a = $busdata[0]['company_name'];
                        $acr = substr($a, 0, 1);

                        $contactdata .= '<div class="post-img-div">';
                        $contactdata .= ucfirst(strtolower($acr));
                        $contactdata .= '</div>';
                    } else {

                        $contactdata .= '<img src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $busdata[0]['business_user_image']) . '">';
                    }
                } else {
                    $a = $busdata[0]['company_name'];
                    $acr = substr($a, 0, 1);

                    $contactdata .= '<div class="post-img-div">';
                    $contactdata .= ucfirst(strtolower($acr));
                    $contactdata .= '</div>';
                }

                $contactdata .= '</div>';
                $contactdata .= '<div class="profile-content">';
                $contactdata .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $busdata[0]['business_slug']) . '">';
                $contactdata .= '<div class="main_data_cq">   <span title="' . $busdata[0]['company_name'] . '" class="main_compny_name">' . $busdata[0]['company_name'] . '</span></div>';
                $contactdata .= '<div class="main_data_cq"><span class="dc_cl_m" title="' . $inddata[0]['industry_name'] . '"> ' . $inddata[0]['industry_name'] . '</span></div>';
                $contactdata .= '</a></div>';
                $contactdata .= '<div class="fw"><p class="connect-link">';
                $contactdata .= '<a href="javascript:void(0);" class="cr-accept acbutton  ani" onclick = "return contactapprove1(' . $contact['contact_from_id'] . ',1);"><span class="cr-accept1"><i class="fa fa-check" aria-hidden="true"></i></span></a>';
                $contactdata .= '<a href="javascript:void(0);" class="cr-decline" onclick = "return contactapprove1(' . $contact['contact_from_id'] . ',0);"><span class="cr-decline1"><i class="fa fa-times" aria-hidden="true"></i></span></a>';
                $contactdata .= '</p>';
                $contactdata .= '</div>';
                $contactdata .= '</div>';
                $contactdata .= '</li>';
            }
        } else {
//            $contactdata = 'No contact request available...';
            $contactdata = '<li><div class="art-img-nn" id= "art-blank">
                                    <div class="art_no_post_img">

                                        <img src="'.base_url('img/No_Contact_Request.png') .'" width="100">

                                    </div>
        <div class="art_no_post_text" style="font-size: 20px;">
                                        No Notifiaction Available.
                                    </div>
                                    </div></li>';
            
        }
        echo $contactdata;
    }

    /*    public function bus_contact($id = "") {



      $this->data['login'] = $login = $this->session->userdata('aileenuser');
      $contition_array = array('user_id' => $login, 'is_deleted' => 0, 'status' => 1);

      $contition_array = array('user_id' => $login, 'status' => '1');
      $this->data['slug_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

      $slug_id = $this->data['slug_data'][0]['business_slug'];


      if ($id == $slug_id || $id == '') {

      $this->data['busuid'] = $busuid = $this->session->userdata('aileenuser');

      $contition_array = array('business_step' => '4','user_id' => $busuid, 'is_deleted' => 0, 'status' => 1);

      $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

      $slugid = $businessdata1[0]['business_slug'];

      $contition_array = array('contact_person.status' => 'confirm', 'contact_type' => 2);

      $search_condition = "(contact_to_id = '$busuid' OR contact_from_id = '$busuid')";

      $this->data['unique_user'] = $unique_user = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = '', $groupby = '');
      } else {


      $contition_array = array('business_step' => '4', 'business_slug' => $id, 'is_deleted' => 0, 'status' => 1, 'business_step' => 4);

      $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

      $busuid = $this->data['busuid'] = $businessdata1[0]['user_id'];

      $contition_array = array('contact_person.status' => 'confirm', 'contact_type' => 2);

      $search_condition = "(contact_to_id = '$busuid' OR contact_from_id = '$busuid')";

      $this->data['unique_user'] = $unique_user = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = '', $groupby = '');

      //   echo '<pre>'; print_r($unique_user); die();
      }

      $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);


      $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
      // echo "<pre>";print_r($businessdata);die();


      $contition_array = array('status' => '1', 'is_delete' => '0');


      $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
      // echo "<pre>";print_r($businesstype);

      $contition_array = array('status' => '1', 'is_delete' => '0');


      $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
      // echo "<pre>";print_r($industrytype);die();
      $unique = array_merge($businessdata, $businesstype, $industrytype);
      foreach ($unique as $key => $value) {
      foreach ($value as $ke => $val) {
      if ($val != "") {


      $result[] = $val;
      }
      }
      }

      $results = array_unique($result);
      foreach ($results as $key => $value) {
      $result1[$key]['label'] = $value;
      $result1[$key]['value'] = $value;
      }

      $contition_array = array('status' => '1');
      $citiesss = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


      foreach ($citiesss as $key1) {

      $location[] = $key1['city_name'];
      }
      // echo "<pre>"; print_r($location);die();
      foreach ($location as $key => $value) {
      $loc[$key]['label'] = $value;
      $loc[$key]['value'] = $value;
      }

      //echo "<pre>"; print_r($loc);die();
      // echo "<pre>"; print_r($loc);
      // echo "<pre>"; print_r($result1);die();

      $this->data['city_data'] = $loc;
      $this->data['demo'] = array_values($result1);



      //echo "<pre>"; print_r($unique_user); die();


      if($this->data['businessdata1']){
      $this->load->view('business_profile/bus_contact', $this->data);
      }else if(!$this->data['businessdata1'] && $id != $slug_id ){

      $this->load->view('business_profile/notavalible');

      }
      else if(!$this->data['businessdata1'] && ($id == $slug_id  || $id == "")){
      redirect('business_profile/');
      }


      }
     * */

    public function bus_contact($id = "") {
        $this->data['slug_id'] = $id;
        $id = $this->uri->segment(3);

        // CODE FOR SECOND HEADER SEARCH START

        $contition_array = array('status' => '1', 'is_deleted' => '0', 'business_step' => 4);
        $businessdata = $this->data['results'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'company_name,other_industrial,other_business_type', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

// GET BUSINESS TYPE
        $contition_array = array('status' => '1', 'is_delete' => '0');
        $businesstype = $this->data['results'] = $this->common->select_data_by_condition('business_type', $contition_array, $data = 'business_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

// GET INDUSTRIAL TYPE
        $contition_array = array('status' => '1', 'is_delete' => '0');
        $industrytype = $this->data['results'] = $this->common->select_data_by_condition('industry_type', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $unique = array_merge($businessdata, $businesstype, $industrytype);
        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {
                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }

// GET LOCATION DATA
        $contition_array = array('status' => '1');
        $location_list = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        foreach ($location_list as $key1 => $value1) {
            foreach ($value1 as $ke1 => $val1) {
                $location[] = $val1;
            }
        }

        foreach ($location as $key => $value) {
            $loc[$key]['label'] = $value;
            $loc[$key]['value'] = $value;
        }

        $this->data['city_data'] = array_values($loc);

        $this->data['demo'] = array_values($result1);
        
        
        $contition_array = array('user_id' => $userid, 'status' => '1');
        $this->data['slug_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'business_slug', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $slug_id = $this->data['slug_data'][0]['business_slug'];
        if ($id == $this->data['slug_data'][0]['business_slug'] || $id == '') {
            $contition_array = array('business_slug' => $slug_id, 'status' => '1', 'business_step' => 4);
            $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $contition_array = array('user_id' => $userid, 'is_delete' => '0');
            $this->data['busimagedata'] = $this->common->select_data_by_condition('bus_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        } else {

            $contition_array = array('business_slug' => $id, 'status' => '1', 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'is_delete' => '0');
            $this->data['busimagedata'] = $this->common->select_data_by_condition('bus_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        }
        $this->data['business_common'] = $this->load->view('business_profile/business_common', $this->data, TRUE);
        $this->load->view('business_profile/bus_contact', $this->data);
    }

    public function ajax_bus_contact($id = "") {

        $perpage = 5;
        $page = 1;
        if (!empty($_GET["page"]) && $_GET["page"] != 'undefined') {
            $page = $_GET["page"];
        }

        $start = ($page - 1) * $perpage;
        if ($start < 0)
            $start = 0;



        $this->data['login'] = $login = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $login, 'is_deleted' => 0, 'status' => 1);

        $contition_array = array('user_id' => $login, 'status' => '1');
        $slug_data = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $slug_id = $this->data['slug_data'][0]['business_slug'];

        if ($id == $slug_id || $id == '') {

            $busuid = $busuid = $this->session->userdata('aileenuser');
            $contition_array = array('user_id' => $busuid, 'is_deleted' => 0, 'status' => 1);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $slugid = $businessdata1[0]['business_slug'];

            $limit = $perpage;
            $offset = $start;

            $contition_array = array('contact_person.status' => 'confirm', 'contact_type' => 2);
            $search_condition = "(contact_to_id = '$busuid' OR contact_from_id = '$busuid')";
            $unique_user = $unique_user = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit, $offset, $join_str = '', $groupby = '');
            $unique_user1 = $unique_user = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = '', $groupby = '');
        } else {
            $contition_array = array('business_slug' => $id, 'is_deleted' => 0, 'status' => 1, 'business_step' => 4);
            $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $busuid = $this->data['busuid'] = $businessdata1[0]['user_id'];

            $limit = $perpage;
            $offset = $start;

            $contition_array = array('contact_person.status' => 'confirm', 'contact_type' => 2);
            $search_condition = "(contact_to_id = '$busuid' OR contact_from_id = '$busuid')";
            $unique_user = $unique_user = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit, $offset, $join_str = '', $groupby = '');
            $unique_user1 = $unique_user = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = '', $groupby = '');
        }
        $return_html = '';
        if (empty($_GET["total_record"])) {
            $_GET["total_record"] = count($unique_user1);
        }

        $return_html .= '<input type = "hidden" class = "page_number" value = "' . $page . '" />';
        $return_html .= '<input type = "hidden" class = "total_record" value = "' . $_GET["total_record"] . '" />';
        $return_html .= '<input type = "hidden" class = "perpage_record" value = "' . $perpage . '" />';
        if (count($unique_user1) > 0) {
            foreach ($unique_user as $user) {
                if ($busuid == $user['contact_from_id']) {
                    $cdata = $this->common->select_data_by_id('business_profile', 'user_id', $user['contact_to_id'], $data = '*', $join_str = array());
                    $contition_array = array('contact_from_id' => $login, 'contact_to_id' => $user['contact_to_id'], 'contact_type' => 2);
                    $clistuser = $this->common->select_data_by_condition('contact_person', $contition_array, $data = 'status,contact_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                } else {
                    $cdata = $this->common->select_data_by_id('business_profile', 'user_id', $user['contact_from_id'], $data = '*', $join_str = array());
                    $contition_array = array('contact_to_id' => $login, 'contact_from_id' => $user['contact_from_id'], 'contact_type' => 2);
                    $clistuser = $this->common->select_data_by_condition('contact_person', $contition_array, $data = 'status,contact_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                }

                $return_html .= '<div class="job-contact-frnd">
                                                    <div class="profile-job-post-detail clearfix" id="removecontact' . $cdata[0]['user_id'] . '">
                                                        <div class="profile-job-post-title-inside clearfix">
                                                            <div class="profile-job-post-location-name">
                                                                <div class="user_lst"><ul>
                                                                        <li class="fl">
                                                                            <div class="follow-img">';
                if ($cdata[0]['business_user_image'] != '') {
                    $return_html .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $cdata[0]['business_slug']) . '">';

                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $cdata[0]['business_user_image'])) {

                        $return_html .= '<img src="' . base_url(NOBUSIMAGE) . '"  alt="">';
                    } else {

                        $return_html .= '<img src="' . base_url($this->config->item('bus_profile_thumb_upload_path') . $cdata[0]['business_user_image']) . '" height="50px" width="50px" alt="" >';
                    }
                    $return_html .= '</a>';
                } else {
                    $return_html .= '<a href="' . base_url('business_profile/business_profile_manage_post/' . $cdata[0]['business_slug']) . '">
                                                                                          <img  src="' . base_url(NOBUSIMAGE) . '"  alt="">
                                                                                    </a>';
                }
                $return_html .= '</div>
                                                                        </li>
                                                                        <li style="width: 67%">
                                                                            <div class="">
                                                                                <div class="follow-li-text " style="padding: 0;">
                                            <a href="' . base_url('business_profile/business_profile_manage_post/' . $cdata[0]['business_slug']) . '">' . ucfirst(strtolower($cdata[0]['company_name'])) . '</a>
                                                                                </div>
                                                                                <div>';
                $category = $this->db->get_where('industry_type', array('industry_id' => $cdata[0]['industriyal'], 'status' => 1))->row()->industry_name;
                $return_html .= '<a>';
                if ($category) {
                    $return_html .= $category;
                } else {
                    $return_html .= $cdata[0]['other_industrial'];
                }
                $return_html .= '</a>
                                                                                </div>
                                                                        </li>
                                                                        <li class="fr">';

                if ($login == $cdata[0]['user_id']) {
                    
                } else {
                    if ($clistuser[0]['status'] == 'cancel') {
                        $return_html .= '<div class="user_btn" id="statuschange' . $cdata[0]['user_id'] . '">
                            <button onclick="contact_person_menu(' . $cdata[0]['user_id'] . ')">
                                Add to contact
                            </button>
                        </div>';
                    } elseif ($clistuser[0]['status'] == 'pending') {
                        $return_html .= '<div class="user_btn" id="statuschange' . $cdata[0]['user_id'] . '">
                            <button onclick="contact_person_cancle(' . $cdata[0]['user_id'] . ",'pending'" . ')">
                                Cancel request
                            </button>
                        </div>';
                    } else if ($clistuser[0]['status'] == 'confirm') {
                        $return_html .= '<div class="user_btn cont_req" id="statuschange' . $cdata[0]['user_id'] . '">
                            <button onclick="contact_person_cancle(' . $cdata[0]['user_id'] . ", 'confirm'" . ')">
                                In contacts
                            </button> 
                        </div>';
                    } else if ($clistuser[0]['status'] == 'reject') {
                        $return_html .= '<div class="user_btn" id="statuschange' . $cdata[0]['user_id'] . '">
                            <button onclick="contact_person_menu(' . $cdata[0]['user_id'] . ')">
                                Add to contact
                            </button>
                        </div>';
                    } else {
                        $return_html .= '<div class="user_btn" id="statuschange' . $cdata[0]['user_id'] . '">
                            <button onclick="contact_person_menu(' . $cdata[0]['user_id'] . ')">
                                Add to contact
                            </button>
                        </div>';
                    }
                }
                $return_html .= '</li>
                </ul>
                </div>
                </div>
                </div>
                </div>';
            }
            $return_html .= '</div>';
        } else {
            $return_html .= '<div class="art-img-nn">
                <div class="art_no_post_img">
                    <img src="' . base_url('img/No_Contact_Request.png') . '">
    </div>
    <div class="art_no_post_text">
        No Contacts Available.
    </div>
    </div>';
        }

        echo $return_html;
    }

    public function removecontactuser() {


        $to_id = $_POST["contact_id"];
        $showdata = $_POST["showdata"];

        $userid = $this->session->userdata('aileenuser');


        $contition_array = array('contact_type' => 2);
        $search_condition = "((contact_to_id = ' $to_id' AND contact_from_id = ' $userid') OR (contact_from_id = ' $to_id' AND contact_to_id = '$userid'))";
        $contactperson = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = '', $groupby = '');

        $contact_id = $contactperson[0]['contact_id'];
        $contition_array = array('user_id' => $userid, 'is_deleted' => 0, 'status' => 1);
        $businessdata1 = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo $businessdata1[0]['business_slug']; die();
        $data = array(
            'modify_date' => date('Y-m-d H:i:s'),
            'status' => 'cancel'
        );

        //echo "<pre>"; print_r($data); die();
        $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contact_id);

        //$contactdata =  '<button>';
        // for count list user start

        $contition_array = array('contact_person.status' => 'confirm', 'contact_type' => 2);

        $search_condition = "(contact_to_id = '$userid' OR contact_from_id = '$userid')";

        $unique_user = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = '', $groupby = '');

        $datacount = count($unique_user);
        //for count list user end

        $contactdata = '<button onClick="contact_person_menu(' . $to_id . ')">';

        $contactdata .= ' Add to contact';
        $contactdata .= '</button>';


        if (count($unique_user) == 0) {
            $nomsg = '<div class="art-img-nn">
                                    <div class="art_no_post_img">

                                        <img src="' . base_url('img/No_Contact_Request.png') . '">

                                    </div>
                                    <div class="art_no_post_text">
                                        No Contacts Available.
                                    </div>
                                </div>';
        }


        if ($showdata == $businessdata1[0]['business_slug']) {
            echo json_encode(
                    array("contactdata" => $contactdata,
                        "notfound" => 1,
                        "notcount" => $datacount,
                        "nomsg" => $nomsg,
            ));
        } else {
            echo json_encode(
                    array("contactdata" => $contactdata,
                        "notfound" => 2,
                        "notcount" => $datacount,
                        "nomsg" => $nomsg,
            ));
        }
    }

// for contact list function start


    public function contact_person_menu() {

        $to_id = $_POST['toid'];
        $userid = $this->session->userdata('aileenuser');


        $contition_array = array('contact_type' => 2);

        $search_condition = "((contact_to_id = ' $to_id' AND contact_from_id = ' $userid') OR (contact_from_id = ' $to_id' AND contact_to_id = '$userid'))";

        $contactperson = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = '', $groupby = '');

        if ($contactperson) {

            $status = $contactperson[0]['status'];
            $contact_id = $contactperson[0]['contact_id'];

            if ($status == 'pending') {
                $data = array(
                    'modify_date' => date('Y-m-d H:i:s'),
                    'status' => 'cancel'
                );

                $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contact_id);

                $contactdata = '<button onClick="contact_person_menu(' . $to_id . ')">';
                $contactdata .= ' Add to contact';
                $contactdata .= '</button>';
            } elseif ($status == 'cancel') {
                $data = array(
                    'created_date' => date('Y-m-d H:i:s'),
                    'status' => 'pending',
                    'not_read' => 2
                );


                $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contact_id);

                $contactdata = '<button onClick="contact_person_cancle(' . $to_id . "," . "'" . 'pending' . "'" . ')">';


                $contactdata .= 'Cancel request';
                $contactdata .= '</button>';
            } elseif ($status == 'reject') {
                $data = array(
                    'created_date' => date('Y-m-d H:i:s'),
                    'status' => 'pending',
                    'not_read' => 2
                );


                $updatdata = $this->common->update_data($data, 'contact_person', 'contact_id', $contact_id);

                $contactdata = '<button onClick="contact_person_cancle(' . $to_id . "," . "'" . 'pending' . "'" . ')">';


                $contactdata .= 'Cancel request';
                $contactdata .= '</button>';
            }
        } else {

            $data = array(
                'contact_from_id' => $userid,
                'contact_to_id' => $to_id,
                'contact_type' => 2,
                'created_date' => date('Y-m-d H:i:s'),
                'status' => 'pending',
                'not_read' => 2
            );

            // echo "<pre>"; print_r($data); die();

            $insert_id = $this->common->insert_data_getid($data, 'contact_person');

            $contactdata = '<button onClick="contact_person_cancle(' . $to_id . "," . "'" . 'pending' . "'" . ')">';
            $contactdata .= 'Cancel request';
            $contactdata .= '</button>';
        }

        echo $contactdata;
    }

//contact list end
//conatct request count start

    public function contact_count() {

      $userid = $this->session->userdata('aileenuser');

        $contition_array = array('contact_to_id' => $userid, 'status' => 'pending', 'not_read' => '2');
        $contactperson_req = $this->common->select_data_by_condition('contact_person', $contition_array, $data = 'count(*) as total', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
     
        $contition_array = array('contact_from_id' => $userid, 'status' => 'confirm', 'not_read' => '2');
        $contactperson_con = $this->common->select_data_by_condition('contact_person', $contition_array, $data = 'count(*) as total1', $sortby = 'contact_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
      
        //$unique_user = array_merge($contactperson_req, $contactperson_con);
        
        $main_total = $contactperson_req[0]['total'] + $contactperson_con[0]['total1'];
        
        echo $main_total;
    }

    public function update_contact_count() {


        $userid = $this->session->userdata('aileenuser');

        //echo "<pre>"; print_r($data); die();

        $contition_array = array('not_read' => 2, 'contact_to_id' => $userid, 'status' => 'pending');
        $result_req = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('not_read' => 2, 'contact_from_id' => $userid, 'status' => 'confirm');
        $result_con = $this->common->select_data_by_condition('contact_person', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $result = array_merge($result_req, $result_con);


        $data = array(
            'not_read' => 1
        );
        // echo "<pre>"; print_r($result);die();

        foreach ($result as $cnt) {
            $updatedata = $this->common->update_data($data, 'contact_person', 'contact_id', $cnt['contact_id']);
        }

        //echo '<pre>'; print_r($result); 
        $count = count($updatedata);
        echo $count;
    }

//contact request count end


    public function edit_more_insert() {

        $userid = $this->session->userdata('aileenuser');

        //if user deactive profile then redirect to business_profile/index untill active profile start
        $contition_array = array('user_id' => $userid, 'status' => '0', 'is_deleted' => '0');

        $business_deactive = $this->data['business_deactive'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        if ($business_deactive) {
            redirect('business_profile/');
        }
        //if user deactive profile then redirect to business_profile/index untill active profile End

        $post_id = $_POST["business_profile_post_id"];

        $contition_array = array('business_profile_post_id' => $_POST["business_profile_post_id"], 'status' => '1');
        $businessdata = $this->data['businessdata'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>"; print_r($artdata); die();

        if ($this->data['businessdata'][0]['product_description']) {

            $editpostdes .= $this->common->make_links($this->data['businessdata'][0]['product_description']);
        }
        //echo $editpost;   echo $editpostdes;
        echo json_encode(
                array(
                    "description" => $editpostdes
        ));
    }

// chat 15-7 changes start
    public function business_chat() {
        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

        $loginuser = $this->common->select_data_by_id('user', 'user_id', $userid, $data = 'first_name,last_name');

        $this->data['logfname'] = $loginuser[0]['first_name'];
        $this->data['loglname'] = $loginuser[0]['last_name'];

        // last message user fetch

        $contition_array = array('id !=' => '');
        $search_condition = "(message_from = '$userid' OR message_to = '$userid')";

        $lastuser = $this->common->select_data_by_search('messages', $search_condition, $contition_array, $data = 'messages.message_from,message_to,id', $sortby = 'id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = '', $groupby = '');
        if ($lastuser[0]['message_from'] == $userid) {

            $lstusr = $this->data['lstusr'] = $lastuser[0]['message_to'];
        } else {

            $lstusr = $this->data['lstusr'] = $lastuser[0]['message_from'];
        }

        // last user first name last name
        if ($lstusr) {
            $lastuser = $this->common->select_data_by_id('user', 'user_id', $lstusr, $data = 'first_name,last_name');

            $this->data['lstfname'] = $lastuser[0]['first_name'];
            $this->data['lstlname'] = $lastuser[0]['last_name'];
        }
        // slected user chat to

        $contition_array = array('is_delete' => '0', 'status' => '1');

        $join_str1[0]['table'] = 'messages';
        $join_str1[0]['join_table_id'] = 'messages.message_to';
        $join_str1[0]['from_table_id'] = 'user.user_id';
        $join_str1[0]['join_type'] = '';

        $search_condition = "((message_from = '$lstusr' OR message_to = '$lstusr') && (message_to != '$userid'))";
        $seltousr = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_to,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str1, $groupby = '');

        // slected user chat from

        $contition_array = array('is_delete' => '0', 'status' => '1');

        $join_str2[0]['table'] = 'messages';
        $join_str2[0]['join_table_id'] = 'messages.message_from';
        $join_str2[0]['from_table_id'] = 'user.user_id';
        $join_str2[0]['join_type'] = '';

        $search_condition = "((message_from = '$lstusr' OR message_to = '$lstusr') && (message_from != '$userid'))";
        $selfromusr = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_from,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str2, $groupby = '');

        $selectuser = array_merge($seltousr, $selfromusr);
        $selectuser = $this->aasort($selectuser, "id");

        // replace name of message_to in user_id in select user

        $return_arraysel = array();
        $i = 0;
        foreach ($selectuser as $k => $sel_list) {
            $return = array();
            $return = $sel_list;

            if ($sel_list['message_to']) {

                $return['user_id'] = $sel_list['message_to'];
                $return['first_name'] = $sel_list['first_name'];
                $return['user_image'] = $sel_list['user_image'];
                $return['message'] = $sel_list['message'];

                unset($return['message_to']);
            } else {
                $return['user_id'] = $sel_list['message_from'];
                $return['first_name'] = $sel_list['first_name'];
                $return['user_image'] = $sel_list['user_image'];
                $return['message'] = $sel_list['message'];

                unset($return['message_from']);
            }
            array_push($return_arraysel, $return);
            $i++;
            if ($i == 1)
                break;
        }
        // message to user



        $contition_array = array('is_delete' => '0', 'status' => '1', 'message_to !=' => $userid);

        $join_str3[0]['table'] = 'messages';
        $join_str3[0]['join_table_id'] = 'messages.message_to';
        $join_str3[0]['from_table_id'] = 'user.user_id';
        $join_str3[0]['join_type'] = '';

        $search_condition = "((message_from = '$userid') && (message_to != '$lstusr'))";

        $tolist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_to,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str3, $groupby = '');



// uniq array of tolist  
        foreach ($tolist as $k => $v) {
            foreach ($tolist as $key => $value) {
                if ($k != $key && $v['message_to'] == $value['message_to']) {
                    unset($tolist[$k]);
                }
            }
        }

        // replace name of message_to in user_id

        $return_arrayto = array();

        foreach ($tolist as $to_list) {
            if ($to_list['message_to'] != $lstusr) {
                $return = array();
                $return = $to_list;

                $return['user_id'] = $to_list['message_to'];
                $return['first_name'] = $to_list['first_name'];
                $return['user_image'] = $to_list['user_image'];
                $return['message'] = $to_list['message'];

                unset($return['message_to']);
                array_push($return_arrayto, $return);
            }
        }

        // message from user
        $contition_array = array('is_delete' => '0', 'status' => '1', 'message_from !=' => $userid);

        $join_str4[0]['table'] = 'messages';
        $join_str4[0]['join_table_id'] = 'messages.message_from';
        $join_str4[0]['from_table_id'] = 'user.user_id';
        $join_str4[0]['join_type'] = '';

        $search_condition = "((message_to = '$userid') && (message_from != '$lstusr'))";


        $fromlist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,messages.message_from,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str4, $groupby = '');


        // uniq array of fromlist  
        foreach ($fromlist as $k => $v) {
            foreach ($fromlist as $key => $value) {
                if ($k != $key && $v['message_from'] == $value['message_from']) {
                    unset($fromlist[$k]);
                }
            }
        }

// replace name of message_to in user_id

        $return_arrayfrom = array();

        foreach ($fromlist as $from_list) {
            if ($to_list['message_from'] != $lstusr) {
                $return = array();
                $return = $from_list;

                $return['user_id'] = $from_list['message_from'];
                $return['first_name'] = $from_list['first_name'];
                $return['user_image'] = $from_list['user_image'];
                $return['message'] = $from_list['message'];


                unset($return['message_from']);
                array_push($return_arrayfrom, $return);
            }
        }

        $userlist = array_merge($return_arrayto, $return_arrayfrom);



        // uniq array of fromlist  
        foreach ($userlist as $k => $v) {
            foreach ($userlist as $key => $value) {
                if ($k != $key && $v['user_id'] == $value['user_id']) {
                    unset($userlist[$k]);
                }
            }
        }

        $userlist = $this->aasort($userlist, "id");

        $this->data['userlist'] = array_merge($return_arraysel, $userlist);
        // khyati changes end 20-4
// smily start
        $smileys = _get_smiley_array();
        $this->data['smiley_table'] = $smileys;
// smily end
//die();
        $this->load->view('business_profile/business_chat', $this->data);
    }

    public function business_chat_user($id) {
        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_deleted' => '0', 'status' => '1');
        $message_from_profile_id = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'business_profile_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $this->data['message_from_profile_id'] = $message_from_profile_id[0]['business_profile_id'];
        $this->data['message_from_profile'] = $this->data['message_to_profile'] = 5;

        $contition_array = array('user_id' => $id, 'is_deleted' => '0', 'status' => '1');
        $message_to_profile_id = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'business_profile_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $this->data['message_to_profile_id'] = $message_to_profile_id[0]['business_profile_id'];

        // last user if $id is null
        $contition_array = array('id !=' => '');
        $search_condition = "(message_from = '$userid' OR message_to = '$userid')";
        $lastchat = $this->common->select_data_by_search('messages', $search_condition, $contition_array, $data = 'messages.message_from,message_to,id', $sortby = 'id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = '', $groupby = '');

        if ($id) {
            $toid = $this->data['toid'] = $id;
        } elseif ($lastchat[0]['message_from'] == $userid) {
            $toid = $this->data['toid'] = $lastchat[0]['message_to'];
        } else {
            $toid = $this->data['toid'] = $lastchat[0]['message_from'];
        }

        $loginuser = $this->common->select_data_by_id('user', 'user_id', $userid, $data = 'first_name,last_name');

        $this->data['logfname'] = $loginuser[0]['first_name'];
        $this->data['loglname'] = $loginuser[0]['last_name'];

        // last message user fetch
        $contition_array = array('id !=' => '');
        $search_condition = "(message_from = '$id' OR message_to = '$id')";
        $lastuser = $this->common->select_data_by_search('messages', $search_condition, $contition_array, $data = 'messages.message_from,message_to,id', $sortby = 'id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = '', $groupby = '');

        if ($lastuser[0]['message_from'] == $userid) {
            $lstusr = $this->data['lstusr'] = $lastuser[0]['message_to'];
        } else {
            $lstusr = $this->data['lstusr'] = $lastuser[0]['message_from'];
        }
        // last user first name last name

        if ($lstusr) {
            $lastuser = $this->common->select_data_by_id('user', 'user_id', $lstusr, $data = 'first_name,last_name');

            $this->data['lstfname'] = $lastuser[0]['first_name'];
            $this->data['lstlname'] = $lastuser[0]['last_name'];
        }
        // slected user chat to

        $contition_array = array('is_delete' => '0', 'status' => '1');

        $join_str1[0]['table'] = 'messages';
        $join_str1[0]['join_table_id'] = 'messages.message_to';
        $join_str1[0]['from_table_id'] = 'user.user_id';
        $join_str1[0]['join_type'] = '';

        $search_condition = "((message_from = '$id' OR message_to = '$id') && (message_to != '$userid'))";
        $seltousr = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_to,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str1, $groupby = '');

        // slected user chat from

        $contition_array = array('is_delete' => '0', 'status' => '1');

        $join_str2[0]['table'] = 'messages';
        $join_str2[0]['join_table_id'] = 'messages.message_from';
        $join_str2[0]['from_table_id'] = 'user.user_id';
        $join_str2[0]['join_type'] = '';

        $search_condition = "((message_from = '$id' OR message_to = '$id') && (message_from != '$userid'))";
        $selfromusr = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_from,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str2, $groupby = '');

        $selectuser = array_merge($seltousr, $selfromusr);
        $selectuser = $this->aasort($selectuser, "id");

        // replace name of message_to in user_id in select user

        $return_arraysel = array();
        $i = 0;
        foreach ($selectuser as $k => $sel_list) {
            $return = array();
            $return = $sel_list;

            if ($sel_list['message_to']) {
                if ($sel_list['message_to'] == $id) {
                    $return['user_id'] = $sel_list['message_to'];
                    $return['first_name'] = $sel_list['first_name'];
                    $return['user_image'] = $sel_list['user_image'];
                    $return['message'] = $sel_list['message'];

                    unset($return['message_to']);

                    $i++;
                    if ($i == 1)
                        break;
                }
            }else {
                if ($sel_list['message_from'] == $id) {
                    $return['user_id'] = $sel_list['message_from'];
                    $return['first_name'] = $sel_list['first_name'];
                    $return['user_image'] = $sel_list['user_image'];
                    $return['message'] = $sel_list['message'];

                    $i++;
                    if ($i == 1)
                        break;
                }

                unset($return['message_from']);
            }
        } array_push($return_arraysel, $return);

        // message to user
        $contition_array = array('is_delete' => '0', 'status' => '1', 'message_to !=' => $userid);

        $join_str3[0]['table'] = 'messages';
        $join_str3[0]['join_table_id'] = 'messages.message_to';
        $join_str3[0]['from_table_id'] = 'user.user_id';
        $join_str3[0]['join_type'] = '';

        $search_condition = "((message_from = '$userid') && (message_to != '$id'))";
        $tolist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_to,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'ASC', $limit = '', $offset = '', $join_str3, $groupby = '');

        // uniq array of tolist  
        foreach ($tolist as $k => $v) {
            foreach ($tolist as $key => $value) {
                if ($k != $key && $v['message_to'] == $value['message_to']) {
                    unset($tolist[$k]);
                }
            }
        }

        // replace name of message_to in user_id

        $return_arrayto = array();
        foreach ($tolist as $to_list) {
            if ($to_list['message_to'] != $id) {
                $return = array();
                $return = $to_list;

                $return['user_id'] = $to_list['message_to'];
                $return['first_name'] = $to_list['first_name'];
                $return['user_image'] = $to_list['user_image'];
                $return['message'] = $to_list['message'];

                unset($return['message_to']);
                array_push($return_arrayto, $return);
            }
        }

        // message from user
        $contition_array = array('is_delete' => '0', 'status' => '1', 'message_from !=' => $userid);

        $join_str4[0]['table'] = 'messages';
        $join_str4[0]['join_table_id'] = 'messages.message_from';
        $join_str4[0]['from_table_id'] = 'user.user_id';
        $join_str4[0]['join_type'] = '';

        $search_condition = "((message_to = '$userid') && (message_from != '$id'))";
        $fromlist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,messages.message_from,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'ASC', $limit = '', $offset = '', $join_str4, $groupby = '');

        // uniq array of fromlist  
        foreach ($fromlist as $k => $v) {
            foreach ($fromlist as $key => $value) {
                if ($k != $key && $v['message_from'] == $value['message_from']) {
                    unset($fromlist[$k]);
                }
            }
        }

        // replace name of message_to in user_id

        $return_arrayfrom = array();
        foreach ($fromlist as $from_list) {
            if ($from_list['message_from'] != $id) {
                $return = array();
                $return = $from_list;

                $return['user_id'] = $from_list['message_from'];
                $return['first_name'] = $from_list['first_name'];
                $return['user_image'] = $from_list['user_image'];
                $return['message'] = $from_list['message'];

                unset($return['message_from']);
                array_push($return_arrayfrom, $return);
            }
        }

        $userlist = array_merge($return_arrayto, $return_arrayfrom);

        // uniq array of fromlist  
        foreach ($userlist as $k => $v) {
            foreach ($userlist as $key => $value) {
                if ($k != $key && $v['user_id'] == $value['user_id']) {
                    if ($v['id'] < $value['id']) {
                        unset($userlist[$k]);
                    }
                }
            }
        }

        $userlist = $this->aasort($userlist, "id");

        if ($return_arraysel[0] == '') {
            $return_arraysel = array();
        }
        $this->data['userlist'] = array_merge($return_arraysel, $userlist);

// smily start
        $smileys = _get_smiley_array();
        $this->data['smiley_table'] = $smileys;
// smily end

        $this->load->view('business_profile/business_chat_user', $this->data);
    }

    public function user_list($id) {
        $userid = $this->session->userdata('aileenuser');
        $usrsearchdata = trim($_POST['search_user']);

        if ($usrsearchdata != "") {
            // message to user
            $contition_array = array('is_delete' => '0', 'status' => '1', 'message_to !=' => $userid);

            $join_str5[0]['table'] = 'messages';
            $join_str5[0]['join_table_id'] = 'messages.message_to';
            $join_str5[0]['from_table_id'] = 'user.user_id';
            $join_str5[0]['join_type'] = '';


            $search_condition = "(first_name LIKE '" . trim($usrsearchdata) . "%')";

            $tolist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'message_to,first_name,user_image', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str5, $groupby = '');

            // uniq array of tolist  
            foreach ($tolist as $k => $v) {
                foreach ($tolist as $key => $value) {
                    if ($k != $key && $v['message_to'] == $value['message_to']) {
                        unset($tolist[$k]);
                    }
                }
            }

            // replace name of message_to in user_id

            $return_arrayto = array();

            foreach ($tolist as $to_list) {

                $return = array();
                $return = $to_list;

                $return['user_id'] = $to_list['message_to'];
                $return['first_name'] = $to_list['first_name'];
                $return['user_image'] = $to_list['user_image'];

                unset($return['message_to']);
                array_push($return_arrayto, $return);
            }


            // message from user
            $contition_array = array('is_delete' => '0', 'status' => '1', 'message_from !=' => $userid);

            $join_str6[0]['table'] = 'messages';
            $join_str6[0]['join_table_id'] = 'messages.message_from';
            $join_str6[0]['from_table_id'] = 'user.user_id';
            $join_str6[0]['join_type'] = '';

            $search_condition = "(first_name LIKE '$usrsearchdata%')";

            $fromlist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.message_from,first_name,user_image', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str6, $groupby = '');

            // uniq array of fromlist  
            foreach ($fromlist as $k => $v) {
                foreach ($fromlist as $key => $value) {
                    if ($k != $key && $v['message_from'] == $value['message_from']) {
                        unset($fromlist[$k]);
                    }
                }
            }

// replace name of message_to in user_id

            $return_arrayfrom = array();

            foreach ($fromlist as $from_list) {

                $return = array();
                $return = $from_list;

                $return['user_id'] = $from_list['message_from'];
                $return['first_name'] = $from_list['first_name'];
                $return['user_image'] = $from_list['user_image'];

                unset($return['message_from']);
                array_push($return_arrayfrom, $return);
            }

            $userlist = array_merge($return_arrayto, $return_arrayfrom);

            // uniq array of fromlist  
            foreach ($userlist as $k => $v) {
                foreach ($userlist as $key => $value) {
                    if ($k != $key && $v['user_id'] == $value['user_id']) {
                        unset($userlist[$k]);
                    }
                }
            }
            //echo '<pre>'; print_r($userlist); die();
            if ($userlist) {

                foreach ($userlist as $user) {
                    $usrsrch = '<li class="clearfix">';

                    if ($user['user_image']) {
                        $usrsrch .= ' <div class="chat_heae_img">';
                        $usrsrch .= '<img src="' . base_url($this->config->item('user_thumb_upload_path') . $user['user_image']) . '" alt="avatar" height="50px" weight="50px" />';
                        $usrsrch .= '</div>';
                    } else {
                        $usrsrch .= ' <div class="chat_heae_img">';
                        $usrsrch .= '<img src="' . base_url(NOIMAGE) . '" alt="" height="50px" weight="50px">';
                        $usrsrch .= '</div>';
                    }

                    $usrsrch .= '<div class="about">';
                    $usrsrch .= '<div class="name">';
                    $usrsrch .= '<a href="' . base_url() . 'chat/abc/' . $user['user_id'] . '">' . $user['first_name'] . ' ' . $user['last_name'] . '<br></a>';
                    $usrsrch .= '</div><div class="status">Current Work</div></div></li>';
                }
            } else {

                $usrsrch .= '<div class="notac_a">No user available.. !!</div>';
            }
        } else {

            // 17-5-2017
            //$usrsrch .= '<div class="notac_a">No user available.. !!</div>';

            $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

            $loginuser = $this->common->select_data_by_id('user', 'user_id', $userid, $data = 'first_name,last_name');

            $this->data['logfname'] = $loginuser[0]['first_name'];
            $this->data['loglname'] = $loginuser[0]['last_name'];

            // last message user fetch

            $contition_array = array('id !=' => '');

            $search_condition = "(message_from = '$userid' OR message_to = '$userid')";

            $lastuser = $this->common->select_data_by_search('messages', $search_condition, $contition_array, $data = 'messages.message_from,message_to,id', $sortby = 'id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = '', $groupby = '');

            if ($lastuser[0]['message_from'] == $userid) {

                $lstusr = $this->data['lstusr'] = $lastuser[0]['message_to'];
            } else {

                $lstusr = $this->data['lstusr'] = $lastuser[0]['message_from'];
            }

// last user first name last name
            if ($lstusr) {
                $lastuser = $this->common->select_data_by_id('user', 'user_id', $lstusr, $data = 'first_name,last_name');

                $this->data['lstfname'] = $lastuser[0]['first_name'];
                $this->data['lstlname'] = $lastuser[0]['last_name'];
            }
            //khyati changes starrt 20-4
            // khyati 24-4 start 
            // slected user chat to


            $contition_array = array('is_delete' => '0', 'status' => '1');

            $join_str1[0]['table'] = 'messages';
            $join_str1[0]['join_table_id'] = 'messages.message_to';
            $join_str1[0]['from_table_id'] = 'user.user_id';
            $join_str1[0]['join_type'] = '';

            $search_condition = "((message_from = '$lstusr' OR message_to = '$lstusr') && (message_to != '$userid'))";

            $seltousr = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_to,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str1, $groupby = '');


            // slected user chat from


            $contition_array = array('is_delete' => '0', 'status' => '1');

            $join_str2[0]['table'] = 'messages';
            $join_str2[0]['join_table_id'] = 'messages.message_from';
            $join_str2[0]['from_table_id'] = 'user.user_id';
            $join_str2[0]['join_type'] = '';



            $search_condition = "((message_from = '$lstusr' OR message_to = '$lstusr') && (message_from != '$userid'))";

            $selfromusr = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_from,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str2, $groupby = '');


            $selectuser = array_merge($seltousr, $selfromusr);
            $selectuser = $this->aasort($selectuser, "id");


// replace name of message_to in user_id in select user

            $return_arraysel = array();
            $i = 0;
            foreach ($selectuser as $k => $sel_list) {
                $return = array();
                $return = $sel_list;

                if ($sel_list['message_to']) {

                    $return['user_id'] = $sel_list['message_to'];
                    $return['first_name'] = $sel_list['first_name'];
                    $return['user_image'] = $sel_list['user_image'];
                    $return['message'] = $sel_list['message'];

                    unset($return['message_to']);
                } else {

                    $return['user_id'] = $sel_list['message_from'];
                    $return['first_name'] = $sel_list['first_name'];
                    $return['user_image'] = $sel_list['user_image'];
                    $return['message'] = $sel_list['message'];


                    unset($return['message_from']);
                }
                array_push($return_arraysel, $return);
                $i++;
                if ($i == 1)
                    break;
            }


            // khyati 24-4 end 
            // message to user



            $contition_array = array('is_delete' => '0', 'status' => '1', 'message_to !=' => $userid);

            $join_str3[0]['table'] = 'messages';
            $join_str3[0]['join_table_id'] = 'messages.message_to';
            $join_str3[0]['from_table_id'] = 'user.user_id';
            $join_str3[0]['join_type'] = '';

            $search_condition = "((message_from = '$userid') && (message_to != '$lstusr'))";

            $tolist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_to,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str3, $groupby = '');



// uniq array of tolist  
            foreach ($tolist as $k => $v) {
                foreach ($tolist as $key => $value) {
                    if ($k != $key && $v['message_to'] == $value['message_to']) {
                        unset($tolist[$k]);
                    }
                }
            }

            // replace name of message_to in user_id

            $return_arrayto = array();

            foreach ($tolist as $to_list) {
                if ($to_list['message_to'] != $lstusr) {
                    $return = array();
                    $return = $to_list;

                    $return['user_id'] = $to_list['message_to'];
                    $return['first_name'] = $to_list['first_name'];
                    $return['user_image'] = $to_list['user_image'];
                    $return['message'] = $to_list['message'];

                    unset($return['message_to']);
                    array_push($return_arrayto, $return);
                }
            }

            // message from user
            $contition_array = array('is_delete' => '0', 'status' => '1', 'message_from !=' => $userid);

            $join_str4[0]['table'] = 'messages';
            $join_str4[0]['join_table_id'] = 'messages.message_from';
            $join_str4[0]['from_table_id'] = 'user.user_id';
            $join_str4[0]['join_type'] = '';

            $search_condition = "((message_to = '$userid') && (message_from != '$lstusr'))";


            $fromlist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,messages.message_from,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str4, $groupby = '');


            // uniq array of fromlist  
            foreach ($fromlist as $k => $v) {
                foreach ($fromlist as $key => $value) {
                    if ($k != $key && $v['message_from'] == $value['message_from']) {
                        unset($fromlist[$k]);
                    }
                }
            }

// replace name of message_to in user_id

            $return_arrayfrom = array();

            foreach ($fromlist as $from_list) {
                if ($to_list['message_from'] != $lstusr) {
                    $return = array();
                    $return = $from_list;

                    $return['user_id'] = $from_list['message_from'];
                    $return['first_name'] = $from_list['first_name'];
                    $return['user_image'] = $from_list['user_image'];
                    $return['message'] = $from_list['message'];


                    unset($return['message_from']);
                    array_push($return_arrayfrom, $return);
                }
            }

            $userlist = array_merge($return_arrayto, $return_arrayfrom);



            // uniq array of fromlist  
            foreach ($userlist as $k => $v) {
                foreach ($userlist as $key => $value) {
                    if ($k != $key && $v['user_id'] == $value['user_id']) {
                        unset($userlist[$k]);
                    }
                }
            }

            $userlist = $this->aasort($userlist, "id");

            $userdata = array_merge($return_arraysel, $userlist);



            if (count($userdata) > 0) {
                foreach ($userdata as $user) {
                    $usrsrch .= '<a href="' . base_url() . 'chat/abc/' . $user['user_id'] . '">';
                    $usrsrch .= '<li class="clearfix">';
                    if ($user['user_image']) {
                        $usrsrch .= '<div class="chat_heae_img">';
                        $usrsrch .= '<img src="' . base_url($this->config->item('user_thumb_upload_path') . $user['user_image']) . '" alt="" >';
                        $usrsrch .= '</div>';
                    } else {
                        $usrsrch .= '<div class="chat_heae_img">';
                        $usrsrch .= '<img src="' . base_url(NOIMAGE) . '" alt="" >';
                        $usrsrch .= '</div>';
                    }
                    $usrsrch .= '<div class="about">';
                    $usrsrch .= '<div class="name">';
                    $usrsrch .= '' . $user['first_name'] . ' ' . $user['last_name'] . '<br> </div>';
                    $usrsrch .= '<div class="status' . $user['user_id'] . '" style=" width: 145px;    max-height: 19px;
    color: #003;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis; ">';
                    $usrsrch .= '' . $user['message'] . '';
                    $usrsrch .= '</div>';
                    $usrsrch .= '</div>';
                    $usrsrch .= '</li>';
                    $usrsrch .= '</a>';
                }
            } else {
                $usrsrch .= 'No user available...';
            }
            // 17-5-2017 end
        }

        echo $usrsrch;
    }

    //khyati 22-4 changes start 


    public function userlisttwo($id = '') {
        $userid = $this->session->userdata('aileenuser');
        $usrsearchdata = trim($_POST['search_user']);
        $usrid = trim($_POST['user']);

        if ($usrsearchdata != "") {
            // message to user
            $contition_array = array('is_delete' => '0', 'status' => '1', 'message_to !=' => $userid);

            $join_str7[0]['table'] = 'messages';
            $join_str7[0]['join_table_id'] = 'messages.message_to';
            $join_str7[0]['from_table_id'] = 'user.user_id';
            $join_str7[0]['join_type'] = '';


            $search_condition = "((first_name LIKE '" . trim($usrsearchdata) . "%') AND (message_to !='" . $usrid . "' ))";

            $tolist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'message_to,first_name,user_image', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str7, $groupby = '');

            // uniq array of tolist  
            foreach ($tolist as $k => $v) {
                foreach ($tolist as $key => $value) {
                    if ($k != $key && $v['message_to'] == $value['message_to']) {
                        unset($tolist[$k]);
                    }
                }
            }

            // replace name of message_to in user_id

            $return_arrayto = array();

            foreach ($tolist as $to_list) {

                $return = array();
                $return = $to_list;

                $return['user_id'] = $to_list['message_to'];
                $return['first_name'] = $to_list['first_name'];
                $return['user_image'] = $to_list['user_image'];

                unset($return['message_to']);
                array_push($return_arrayto, $return);
            }


            // message from user
            $contition_array = array('is_delete' => '0', 'status' => '1', 'message_from !=' => $userid);

            $join_str[0]['table'] = 'messages';
            $join_str[0]['join_table_id'] = 'messages.message_from';
            $join_str[0]['from_table_id'] = 'user.user_id';
            $join_str[0]['join_type'] = '';

            $search_condition = "((first_name LIKE '" . trim($usrsearchdata) . "%') AND (message_from !='" . $usrid . "' ))";

            $fromlist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.message_from,first_name,user_image', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');

            // uniq array of fromlist  
            foreach ($fromlist as $k => $v) {
                foreach ($fromlist as $key => $value) {
                    if ($k != $key && $v['message_from'] == $value['message_from']) {
                        unset($fromlist[$k]);
                    }
                }
            }

// replace name of message_to in user_id

            $return_arrayfrom = array();

            foreach ($fromlist as $from_list) {

                $return = array();
                $return = $from_list;

                $return['user_id'] = $from_list['message_from'];
                $return['first_name'] = $from_list['first_name'];
                $return['user_image'] = $from_list['user_image'];

                unset($return['message_from']);
                array_push($return_arrayfrom, $return);
            }

            $userlist = array_merge($return_arrayto, $return_arrayfrom);

            // uniq array of fromlist  
            foreach ($userlist as $k => $v) {
                foreach ($userlist as $key => $value) {
                    if ($k != $key && $v['user_id'] == $value['user_id']) {
                        unset($userlist[$k]);
                    }
                }
            }
            //echo '<pre>'; print_r($userlist); die();
            if ($userlist) {

                foreach ($userlist as $user) {
                    $usrsrch = '<li class="clearfix">';

                    if ($user['user_image']) {
                        $usrsrch .= '    <div class="chat_heae_img">';
                        $usrsrch .= '<img src="' . base_url($this->config->item('user_thumb_upload_path') . $user['user_image']) . '" alt="avatar" height="50px" weight="50px" />';
                        $usrsrch .= '</div>';
                    } else {
                        $usrsrch .= '    <div class="chat_heae_img">';
                        $usrsrch .= '<img src="' . base_url(NOIMAGE) . '" alt="" height="50px" weight="50px">';
                        $usrsrch .= '</div>';
                    }

                    $usrsrch .= '<div class="about">';
                    $usrsrch .= '<div class="name">';
                    $usrsrch .= '<a href="' . base_url() . 'chat/abc/' . $user['user_id'] . '">' . $user['first_name'] . '<br></a>';
                    $usrsrch .= '</div><div class="status">Current Work</div></div></li>';
                }
            } else {

                $usrsrch .= '<div class="notac_a">No user available.. !!</div>';
            }
        } else {

            // 17-5-2017 start
            $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

            // last user if $id is null

            $contition_array = array('id !=' => '');

            $search_condition = "(message_from = '$userid' OR message_to = '$userid')";

            $lastchat = $this->common->select_data_by_search('messages', $search_condition, $contition_array, $data = 'messages.message_from,message_to,id', $sortby = 'id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = '', $groupby = '');

            if ($id) {

                $toid = $this->data['toid'] = $id;
            } elseif ($lastchat[0]['message_from'] == $userid) {

                $toid = $this->data['toid'] = $lastchat[0]['message_to'];
            } else {

                $toid = $this->data['toid'] = $lastchat[0]['message_from'];
            }

            // khyati 22-4 changes end

            $loginuser = $this->common->select_data_by_id('user', 'user_id', $userid, $data = 'first_name,last_name');

            $this->data['logfname'] = $loginuser[0]['first_name'];
            $this->data['loglname'] = $loginuser[0]['last_name'];

            // last message user fetch

            $contition_array = array('id !=' => '');

            $search_condition = "(message_from = '$id' OR message_to = '$id')";

            $lastuser = $this->common->select_data_by_search('messages', $search_condition, $contition_array, $data = 'messages.message_from,message_to,id', $sortby = 'id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = '', $groupby = '');

            if ($lastuser[0]['message_from'] == $userid) {

                $lstusr = $this->data['lstusr'] = $lastuser[0]['message_to'];
            } else {

                $lstusr = $this->data['lstusr'] = $lastuser[0]['message_from'];
            }

// last user first name last name
            if ($lstusr) {
                $lastuser = $this->common->select_data_by_id('user', 'user_id', $lstusr, $data = 'first_name,last_name');

                $this->data['lstfname'] = $lastuser[0]['first_name'];
                $this->data['lstlname'] = $lastuser[0]['last_name'];
            }
            //khyati changes starrt 20-4
            // slected user chat to


            $contition_array = array('is_delete' => '0', 'status' => '1');

            $join_str1[0]['table'] = 'messages';
            $join_str1[0]['join_table_id'] = 'messages.message_to';
            $join_str1[0]['from_table_id'] = 'user.user_id';
            $join_str1[0]['join_type'] = '';



            $search_condition = "((message_from = '$id' OR message_to = '$id') && (message_to != '$userid'))";

            $seltousr = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_to,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str1, $groupby = '');


            // slected user chat from


            $contition_array = array('is_delete' => '0', 'status' => '1');

            $join_str2[0]['table'] = 'messages';
            $join_str2[0]['join_table_id'] = 'messages.message_from';
            $join_str2[0]['from_table_id'] = 'user.user_id';
            $join_str2[0]['join_type'] = '';



            $search_condition = "((message_from = '$id' OR message_to = '$id') && (message_from != '$userid'))";

            $selfromusr = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_from,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str2, $groupby = '');


            $selectuser = array_merge($seltousr, $selfromusr);
            $selectuser = $this->aasort($selectuser, "id");


// replace name of message_to in user_id in select user

            $return_arraysel = array();
            $i = 0;
            foreach ($selectuser as $k => $sel_list) {
                $return = array();
                $return = $sel_list;

                if ($sel_list['message_to']) {

                    $return['user_id'] = $sel_list['message_to'];
                    $return['first_name'] = $sel_list['first_name'];
                    $return['user_image'] = $sel_list['user_image'];
                    $return['message'] = $sel_list['message'];

                    unset($return['message_to']);
                } else {

                    $return['user_id'] = $sel_list['message_from'];
                    $return['first_name'] = $sel_list['first_name'];
                    $return['user_image'] = $sel_list['user_image'];
                    $return['message'] = $sel_list['message'];


                    unset($return['message_from']);
                }
                array_push($return_arraysel, $return);
                $i++;
                if ($i == 1)
                    break;
            }

            // message to user
            $contition_array = array('is_delete' => '0', 'status' => '1', 'message_to !=' => $userid);

            $join_str3[0]['table'] = 'messages';
            $join_str3[0]['join_table_id'] = 'messages.message_to';
            $join_str3[0]['from_table_id'] = 'user.user_id';
            $join_str3[0]['join_type'] = '';

            $search_condition = "((message_from = '$userid') && (message_to != '$id'))";

            $tolist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,message_to,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str3, $groupby = '');

            // uniq array of tolist  
            foreach ($tolist as $k => $v) {
                foreach ($tolist as $key => $value) {

                    if ($k != $key && $v['message_to'] == $value['message_to']) {
                        unset($tolist[$k]);
                    }
                }
            }

            // replace name of message_to in user_id

            $return_arrayto = array();

            foreach ($tolist as $to_list) {
                if ($to_list['message_to'] != $id) {
                    $return = array();
                    $return = $to_list;

                    $return['user_id'] = $to_list['message_to'];
                    $return['first_name'] = $to_list['first_name'];
                    $return['user_image'] = $to_list['user_image'];
                    $return['message'] = $to_list['message'];


                    unset($return['message_to']);
                    array_push($return_arrayto, $return);
                }
            }

            // message from user
            $contition_array = array('is_delete' => '0', 'status' => '1', 'message_from !=' => $userid);

            $join_str4[0]['table'] = 'messages';
            $join_str4[0]['join_table_id'] = 'messages.message_from';
            $join_str4[0]['from_table_id'] = 'user.user_id';
            $join_str4[0]['join_type'] = '';

            $search_condition = "((message_to = '$userid') && (message_from != '$id'))";

            $fromlist = $this->common->select_data_by_search('user', $search_condition, $contition_array, $data = 'messages.id,messages.message_from,first_name,user_image,message', $sortby = 'messages.id', $orderby = 'DESC', $limit = '', $offset = '', $join_str4, $groupby = '');


            // uniq array of fromlist  
            foreach ($fromlist as $k => $v) {
                foreach ($fromlist as $key => $value) {
                    if ($k != $key && $v['message_from'] == $value['message_from']) {
                        unset($fromlist[$k]);
                    }
                }
            }

// replace name of message_to in user_id

            $return_arrayfrom = array();

            foreach ($fromlist as $from_list) {
                if ($from_list['message_from'] != $id) {
                    $return = array();
                    $return = $from_list;

                    $return['user_id'] = $from_list['message_from'];
                    $return['first_name'] = $from_list['first_name'];
                    $return['user_image'] = $from_list['user_image'];
                    $return['message'] = $from_list['message'];


                    unset($return['message_from']);
                    array_push($return_arrayfrom, $return);
                }
            }



            $userlist = array_merge($return_arrayto, $return_arrayfrom);


            // uniq array of fromlist  
            foreach ($userlist as $k => $v) {
                foreach ($userlist as $key => $value) {
                    if ($k != $key && $v['user_id'] == $value['user_id']) {
                        unset($userlist[$k]);
                    }
                }
            }


            $userlist = $this->aasort($userlist, "id");

            $userlist = array_merge($return_arraysel, $userlist);
            //echo '<pre>'; print_r($userlist); die();
            if (in_array($toid, $userlist)) {
                foreach ($userlist as $user) {
                    $usrsrch .= '<li class="clearfix">';
                    if ($user['user_id'] == $toid) {
                        $usrsrch .= 'active';
                    }
                    $usrsrch .= '">';
                    if ($user['user_image']) {
                        $usrsrch .= '<div class="chat_heae_img">';
                        $usrsrch .= '<img src="' . base_url($this->config->item('user_thumb_upload_path') . $user['user_image']) . '" alt="" height="50px" weight="50px">';
                        $usrsrch .= '</div>';
                    } else {

                        $usrsrch .= '<div class="chat_heae_img">';
                        $usrsrch .= '<img src="' . base_url(NOIMAGE) . '" alt="" height="30px" weight="30px">';
                        $usrsrch .= '</div>';
                    }
                    $usrsrch .= '<div class="about">';
                    $usrsrch .= '<div class="name">';
                    $usrsrch .= '<a href="' . base_url() . 'chat/abc/' . $user['user_id'] . '">' . $user['first_name'] . ' ' . $user['last_name'] . '<br></a> </div>';
                    $usrsrch .= '<div class="status' . $user['user_id'] . '" style=" width: 145px;    max-height: 25px;
    color: #003;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
">';
                    $usrsrch .= '' . $user['message'] . '';
                    $usrsrch .= '</div>';
                    $usrsrch .= '</div>';
                    $usrsrch .= '</li>';
                }
            } else {

                $lstusrdata = $this->common->select_data_by_id('user', 'user_id', $toid, $data = '*');


                if ($lstusrdata) {

                    $usrsrch .= '<li class="clearfix ';
                    if ($lstusrdata[0]['user_id'] == $toid) {
                        $usrsrch .= 'active';
                    } $usrsrch .= '">';
                    if ($lstusrdata[0]['user_image']) {
                        $usrsrch .= '<div class="chat_heae_img">';
                        $usrsrch .= '<img src="' . base_url($this->config->item('user_thumb_upload_path') . $lstusrdata[0]['user_image']) . '" alt="" height="50px" weight="50px">';
                        $usrsrch .= '</div>';
                    } else {
                        $usrsrch .= '<div class="chat_heae_img">';
                        $usrsrch .= '<img src="' . base_url(NOIMAGE) . '" alt="" height="50px" weight="50px">';
                        $usrsrch .= '</div>';
                    }
                    $usrsrch .= '<div class="about">';
                    $usrsrch .= '<div class="name">';
                    $usrsrch .= '<a href="' . base_url() . 'chat/abc/' . $lstusrdata[0]['user_id'] . '">' . $lstusrdata[0]['first_name'] . ' ' . $lstusrdata[0]['last_name'] . '<br></a> </div>';
                    $usrsrch .= '<div class="status' . $lstusrdata[0]['user_id'] . '" style=" width: 145px;    max-height: 25px;
    color: #003;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
">';
                    $search_condition = "((message_from = '$userid' AND message_to = '$toid') OR (message_to = '$userid' AND message_from = '$toid'))";
                    $contition_array = array('id !=' => '');
                    $messages = $this->common->select_data_by_search('messages', $search_condition, $contition_array, $data = '*', $sortby = 'id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = '', $groupby = '');


                    $usrsrch .= '' . $messages[0]['message'] . '';

                    $usrsrch .= '</div>
          </div>
        </li>';
                }
                foreach ($userlist as $user) {
                    if ($user['user_id'] != $toid) {

                        $usrsrch .= '<a href="' . base_url() . 'chat/abc/' . $user['user_id'] . '">';
                        $usrsrch .= '<li class="clearfix">';
                        if ($user['user_id'] == $toid) {
                            $usrsrch .= 'class ="active"';
                        }
                        if ($user['user_image']) {
                            $usrsrch .= '<div class="chat_heae_img">';
                            $usrsrch .= '<img src="' . base_url($this->config->item('user_thumb_upload_path') . $user['user_image']) . '" alt="" height="50px" weight="50px">';
                            $usrsrch .= '</div>';
                        } else {
                            $usrsrch .= '<div class="chat_heae_img">';
                            $usrsrch .= '<img src="' . base_url(NOIMAGE) . '" alt="" height="50px" weight="50px">';
                            $usrsrch .= '</div>';
                        }
                        $usrsrch .= '<div class="about">';
                        $usrsrch .= '<div class="name">';
                        $usrsrch .= '' . $user['first_name'] . ' ' . $user['last_name'] . '<br></div>';
                        $usrsrch .= '<div class="status' . $user['user_id'] . '" style=" width: 145px;
    color: #003;    max-height: 25px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
">';
                        $usrsrch .= '' . $user['message'] . '';
                        $usrsrch .= '</div>';
                        $usrsrch .= '</div>';
                        $usrsrch .= '</li></a>';
                    }
                }
            }
            // 17-5-2017 end
        }

        echo $usrsrch;
    }

    //khyati 22-4 changes end 
    //  sort an array start
    // khyati changes start 7-4
    public function aasort(&$array, $key) {
        $sorter = array();
        $ret = array();
        reset($array);

        foreach ($array as $ii => $va) {

            $sorter[$ii] = $va[$key];
        }

        arsort($sorter);

        foreach ($sorter as $ii => $va) {

            $ret[$ii] = $array[$ii];
        }

        return $array = $ret;
    }

//chat changes 15-7 end 
}

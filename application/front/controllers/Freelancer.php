<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Freelancer extends MY_Controller {

    public $data;

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('email_model');

        include ('include.php');
          $this->data['aileenuser_id'] = $this->session->userdata('aileenuser');
    }

    public function index() {  //echo "falguni"; die();
        $userid = $this->session->userdata('aileenuser');


        $this->load->view('freelancer/freelancer_main', $this->data);
    }

    public function freelancer_post() {


        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'status' => '0');
        $freelancerpostdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        if ($freelancerpostdata) {

            $this->load->view('freelancer/freelancer_post/reactivate', $this->data);
        } else {

            $userid = $this->session->userdata('aileenuser');
            $contition_array = array('user_id' => $userid, 'status' => '1', 'is_delete' => '0');
            $jobdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            if ($jobdata[0]['free_post_step'] == 1) {
                redirect('freelancer/freelancer_post_address_information', refresh);
            } else if ($jobdata[0]['free_post_step'] == 2) {
                redirect('freelancer/freelancer_post_professional_information', refresh);
            } else if ($jobdata[0]['free_post_step'] == 3) {
                redirect('freelancer/freelancer_post_rate', refresh);
            } else if ($jobdata[0]['free_post_step'] == 4) {
                redirect('freelancer/freelancer_post_avability', refresh);
            } else if ($jobdata[0]['free_post_step'] == 5) {
                redirect('freelancer/freelancer_post_education', refresh);
            } else if ($jobdata[0]['free_post_step'] == 6) {
                redirect('freelancer/freelancer_post_portfolio', refresh);
            } else if ($jobdata[0]['free_post_step'] == 7) {
                redirect('freelancer/freelancer_apply_post', refresh);
            } else {
                redirect('freelancer/freelancer_post_basic_information', refresh);
                // $this->load->view('freelancer/freelancer_post/freelancer_post_basic_information',$this->data);
            }
        }
    }

    //freelancer workexp first  info page controller start

    public function freelancer_post_basic_information() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['free_post_step'];

            if ($step == 1 || $step > 1) {
                $this->data['firstname1'] = $userdata[0]['freelancer_post_fullname'];
                $this->data['lastname1'] = $userdata[0]['freelancer_post_username'];
                $this->data['email1'] = $userdata[0]['freelancer_post_email'];
                $this->data['skypeid1'] = $userdata[0]['freelancer_post_skypeid'];
                $this->data['phoneno1'] = $userdata[0]['freelancer_post_phoneno'];
            }

//echo "<pre>";print_r( $this->data['phoneno1']);die();
        }

           $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);



        $this->load->view('freelancer/freelancer_post/freelancer_post_basic_information', $this->data);
    }

    public function hire_designation() {

        $userid = $this->session->userdata('aileenuser');


        $data = array(
            'designation' => $this->input->post('designation'),
            'modified_date' => date('Y-m-d', time())
        );

        $updatdata = $this->common->update_data($data, 'freelancer_hire_reg', 'user_id', $userid);

        if ($updatdata) {

            if ($this->input->post('hitext') == 1) {
                redirect('freelancer/freelancer_hire_profile', refresh);
            } elseif ($this->input->post('hitext') == 2) {
                redirect('freelancer/freelancer_hire_post', refresh);
            } elseif ($this->input->post('hitext') == 3) {
                redirect('freelancer/freelancer_save', refresh);
            }
        } else {
            $this->session->flashdata('error', 'Your data not inserted');
            redirect('freelancer/recommen_candidate', refresh);
        }
    }

//designation end


    public function freelancer_post_basic_information_insert() {
        $userid = $this->session->userdata('aileenuser');


        $this->form_validation->set_rules('firstname', 'Full Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('phoneno', 'Phone Nunmber Required', 'required');

        $this->form_validation->set_rules('email', 'EmailId', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('freelancer/freelancer_post/freelancer_post_basic_information');
        } else {

            $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
            $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



            if ($userdata) {
                if ($userdata[0]['free_post_step'] == 7) {
                    $data = array(
                        'free_post_step' => 7
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                } else if ($userdata[0]['free_post_step'] > 1) {
                    $data = array(
                        'free_post_step' => $userdata[0]['free_post_step']
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                } else {
                    $data = array(
                        'free_post_step' => 1
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                }

                $data = array(
                    'freelancer_post_fullname' => $this->input->post('firstname'),
                    'freelancer_post_username' => $this->input->post('lastname'),
                    'freelancer_post_skypeid' => $this->input->post('skypeid'),
                    'freelancer_post_email' => $this->input->post('email'),
                    'freelancer_post_phoneno' => $this->input->post('phoneno'),
                    'user_id' => $userid,
                    'modify_date' => date('Y-m-d', time())
                );



                $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);

                if ($updatedata) {
                    $this->session->set_flashdata('success', 'Basic information updated successfully');
                    redirect('freelancer/freelancer_post_address_information', refresh);
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('freelancer/freelancer_post_basic_information', refresh);
                }
            } else {

                $data = array(
                    'freelancer_post_fullname' => $this->input->post('firstname'),
                    'freelancer_post_username' => $this->input->post('lastname'),
                    'freelancer_post_skypeid' => $this->input->post('skypeid'),
                    'freelancer_post_email' => $this->input->post('email'),
                    'freelancer_post_phoneno' => $this->input->post('phoneno'),
                    'user_id' => $userid,
                    'created_date' => date('Y-m-d', time()),
                    'status' => 1,
                    'is_delete' => 0,
                    'free_post_step' => 1
                );



                $insert_id = $this->common->insert_data_getid($data, 'freelancer_post_reg');
                if ($insert_id) {


                    $this->session->set_flashdata('success', 'Basic information updated successfully');
                    redirect('freelancer/freelancer_post_address_information', refresh);
                } else {
                    $this->session->flashdata('error', 'Sorry!! Your data not inserted');
                    redirect('freelancer/freelancer_post_basic_information', refresh);
                }
            }
        }
    }

    //freelancer workexp first  info page controller End
//check email avilibity start
    public function check_email() {

        $email = $this->input->post('email');

        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $email1 = $userdata[0]['freelancer_post_email'];

        if ($email1) {

            $condition_array = array('is_delete' => '0', 'user_id !=' => $userid, 'status' => '1');

            $check_result = $this->common->check_unique_avalibility('freelancer_post_reg', 'freelancer_post_email', $email, '', '', $condition_array);
        } else {

            $condition_array = array('is_delete' => '0');

            $check_result = $this->common->check_unique_avalibility('freelancer_post_reg', 'freelancer_post_email', $email, '', '', $condition_array);
        }

        if ($check_result) {
            echo 'true';
            die();
        } else {
            echo 'false';
            die();
        }
    }

// check email end
//freelancer address page controller Start
    public function freelancer_post_address_information() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('status' => 1);
        $this->data['countries'] = $this->common->select_data_by_condition('countries', $contition_array, $data = '*', $sortby = 'country_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //for getting state data
        $contition_array = array('status' => 1);
        $this->data['states'] = $this->common->select_data_by_condition('states', $contition_array, $data = '*', $sortby = 'state_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //for getting city data
        $contition_array = array('status' => 1);
        $this->data['cities'] = $this->common->select_data_by_condition('cities', $contition_array, $data = '*', $sortby = 'city_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        //for getting job registration table data    
        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        if ($userdata) {
            $step = $userdata[0]['free_post_step'];

            if ($step == 2 || $step > 2 || ($step >= 1 && $step <= 2)) {
                $this->data['country1'] = $userdata[0]['freelancer_post_country'];
                $this->data['state1'] = $userdata[0]['freelancer_post_state'];
                $this->data['city1'] = $userdata[0]['freelancer_post_city'];
                $this->data['pincode1'] = $userdata[0]['freelancer_post_pincode'];
                $this->data['address1'] = $userdata[0]['freelancer_post_address'];
            }
        }

           $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);



        $this->load->view('freelancer/freelancer_post/freelancer_post_address_information', $this->data);
    }

    public function ajax_data() {

        // ajax for degree start

        if (isset($_POST["degree_id"]) && !empty($_POST["degree_id"])) {
            //Get all state data
            $contition_array = array('degree_id' => $_POST["degree_id"], 'status' => 1);
            $stream = $this->data['stream'] = $this->common->select_data_by_condition('stream', $contition_array, $data = '*', $sortby = 'stream_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //Count total number of rows
            //Display states list
            if (count($stream) > 0) {
                echo '<option value="">Select stream</option>';
                foreach ($stream as $st) {
                    echo '<option value="' . $st['stream_id'] . '">' . $st['stream_name'] . '</option>';
                }
            } else {
                echo '<option value="">Stream not available</option>';
            }
        }

        // ajax for degree end
        // ajax for country start


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

        // ajax for country end
        // ajax for state start

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

        // ajax for state end
    }

    public function freelancer_post_address_information_insert() {

        $userid = $this->session->userdata('aileenuser');

        if ($this->input->post('next')) {

            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');

            $this->form_validation->set_rules('postaladdress', 'Address', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('freelancer/freelancer_post/freelancer_post_address_information');
            } else {


                $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');

                $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($userdata[0]['free_post_step'] == 7) {
                    $data = array(
                        'free_post_step' => 7
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                } else if ($userdata[0]['free_post_step'] > 2) {
                    $data = array(
                        'free_post_step' => $userdata[0]['free_post_step']
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                } else {
                    $data = array(
                        'free_post_step' => 2
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                }

                $data = array(
                    'freelancer_post_country' => $this->input->post('country'),
                    'freelancer_post_state' => $this->input->post('state'),
                    'freelancer_post_city' => $this->input->post('city'),
                    'freelancer_post_address' => $this->input->post('postaladdress'),
                    'freelancer_post_pincode' => $this->input->post('pincode'),
                    'modify_date' => date('Y-m-d', time())
                );


                $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);


                if ($updatdata) {
                    $this->session->set_flashdata('success', 'Address information updated successfully');
                    redirect('freelancer/freelancer_post_professional_information', refresh);
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('freelancer/freelancer_post_address_information', refresh);
                }
            }
        }
    }

//freelancer address page controller End
//freelancer professional page controller Start
    public function freelancer_post_professional_information() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('status' => 1);
        $this->data['category'] = $this->common->select_data_by_condition('category', $contition_array, $data = '*', $sortby = 'category_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('status' => 1, 'type' => 1);
        $this->data['skill1'] = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = 'skill', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($userdata) {
            $step = $userdata[0]['free_post_step'];

            if ($step == 3 || ($step >= 1 && $step <= 3) || $step > 3) {

                $this->data['fields_req1'] = $userdata[0]['freelancer_post_field'];
                $this->data['area1'] = $userdata[0]['freelancer_post_area'];
                $this->data['otherskill1'] = $userdata[0]['freelancer_post_otherskill'];
                $this->data['skill_description1'] = $userdata[0]['freelancer_post_skill_description'];
                $this->data['experience_year1'] = $userdata[0]['freelancer_post_exp_year'];
                $this->data['experience_month1'] = $userdata[0]['freelancer_post_exp_month'];
            }
        }
        $skildata = explode(',', $userdata[0]['freelancer_post_area']);
        $this->data['selectdata'] = $skildata;



           $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);


        $this->load->view('freelancer/freelancer_post/freelancer_post_professional_information', $this->data);
    }

    public function freelancer_post_professional_information_insert() {

        $userid = $this->session->userdata('aileenuser');
        $skill1 = $this->input->post('skills');


        if ($this->input->post('next')) {

            $this->form_validation->set_rules('field', 'Field', 'required');
            $this->form_validation->set_rules('skill_description', 'Skill Description', 'required');



            if ($this->form_validation->run() == FALSE) {
                $this->load->view('freelancer/freelancer_post/freelancer_post_professional_information');
            } else {

                $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');

                $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($userdata[0]['free_post_step'] == 7) {
                    $data = array(
                        'free_post_step' => 7
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                } else if ($userdata[0]['free_post_step'] > 3) {
                    $data = array(
                        'free_post_step' => $userdata[0]['free_post_step']
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                } else {
                    $data = array(
                        'free_post_step' => 3
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                }

                $data = array(
                    'freelancer_post_field' => $this->input->post('field'),
                    'freelancer_post_area' => implode(',', $skill1),
                    'freelancer_post_otherskill' => $this->input->post('otherskill'),
                    'freelancer_post_skill_description' => $this->input->post('skill_description'),
                    'freelancer_post_exp_month' => $this->input->post('experience_month'),
                    'freelancer_post_exp_year' => $this->input->post('experience_year'),
                    'modify_date' => date('Y-m-d', time())
                );

                $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);


                if ($updatdata) {
                    $this->session->set_flashdata('success', 'professional information updated successfully');
                    redirect('freelancer/freelancer_post_rate', refresh);
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('freelancer/freelancer_post_professional_information', refresh);
                }
            }
        }
    }

//freelancer professional page controller End
//freelancer rate page controller Start 
    public function freelancer_post_rate() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('status' => 1, 'is_delete' => 0);
        $this->data['currency'] = $this->common->select_data_by_condition('currency', $contition_array, $data = '*', $sortby = 'currency_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['free_post_step'];

            if ($step == 4 || ($step >= 1 && $step <= 4) || $step > 4) {

                $this->data['hourly1'] = $userdata[0]['freelancer_post_hourly'];
                $this->data['currency1'] = $userdata[0]['freelancer_post_ratestate'];
                $this->data['fixed_rate1'] = $userdata[0]['freelancer_post_fixed_rate'];
            }
//echo "<pre>";print_r( $this->data['fixed_rate1']);die();
        }
           $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);



        $this->load->view('freelancer/freelancer_post/freelancer_post_rate', $this->data);
    }

    public function freelancer_post_rate_insert() {

        $userid = $this->session->userdata('aileenuser');

        if ($this->input->post('next')) {

            if ($this->input->post('fixed_rate') == 1) {
                $data = array(
                    'freelancer_post_fixed_rate' => $this->input->post('fixed_rate'),
                );
            } else {
                $data = array(
                    'freelancer_post_fixed_rate' => 0,
                );
            }

            $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);


            $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');

            $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($userdata[0]['free_post_step'] == 7) {
                $data = array(
                    'free_post_step' => 7
                );

                $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
            } else if ($userdata[0]['free_post_step'] > 4) {
                $data = array(
                    'free_post_step' => $userdata[0]['free_post_step']
                );

                $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
            } else {
                $data = array(
                    'free_post_step' => 4
                );

                $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
            }

            $data = array(
                'freelancer_post_hourly' => $this->input->post('hourly'),
                'freelancer_post_ratestate' => $this->input->post('state'),
                'modify_date' => date('Y-m-d', time())
            );

            //echo "<pre>";print_r( $data);die();
            $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);

            if ($updatdata) {
                $this->session->set_flashdata('success', 'Rate information updated successfully');
                redirect('freelancer/freelancer_post_avability', refresh);
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('freelancer/freelancer_post_rate', refresh);
            }
            //}
        }
    }

//freelancer rate page controller End
//freelancer avability page controller Start
    public function freelancer_post_avability() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['free_post_step'];

            if ($step == 5 || ($step >= 1 && $step <= 5) || $step > 5) {

                $this->data['job_type1'] = $userdata[0]['freelancer_post_job_type'];
                $this->data['work_hour1'] = $userdata[0]['freelancer_post_work_hour'];
            }
        }

           $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);


        $this->load->view('freelancer/freelancer_post/freelancer_post_avability', $this->data);
    }

    public function freelancer_post_avability_insert() {

        $userid = $this->session->userdata('aileenuser');


        if ($this->input->post('previous')) {
            redirect('freelancer/freelancer_post_rate', refresh);
        }

        if ($this->input->post('next')) {

            $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');

            $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($userdata[0]['free_post_step'] == 7) {
                $data = array(
                    'free_post_step' => 7
                );

                $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
            } else if ($userdata[0]['free_post_step'] > 5) {
                $data = array(
                    'free_post_step' => $userdata[0]['free_post_step']
                );

                $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
            } else {
                $data = array(
                    'free_post_step' => 5
                );

                $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
            }

            $data = array(
                'freelancer_post_job_type' => $this->input->post('job_type'),
                'freelancer_post_work_hour' => $this->input->post('work_hour'),
                'modify_date' => date('Y-m-d', time())
            );


            $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);


            if ($updatdata) {
                $this->session->set_flashdata('success', 'Avability information updated successfully');
                redirect('freelancer/freelancer_post_education', refresh);
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('freelancer/freelancer_post_avability', refresh);
            }
            //}
        }
    }

//freelancer avability page controller End
//freelancer education page controller Start
    public function freelancer_post_education() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('status' => 1);
        $this->data['degree_data'] = $this->common->select_data_by_condition('degree', $contition_array, $data = '*', $sortby = 'degree_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //for getting stream data
        $contition_array = array('status' => 1);
        $this->data['stream_data'] = $this->common->select_data_by_condition('stream', $contition_array, $data = '*', $sortby = 'stream_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('status' => 1);
        $this->data['university_data'] = $this->common->select_data_by_condition('university', $contition_array, $data = '*', $sortby = 'university_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['free_post_step'];

            if ($step == 6 || ($step >= 1 && $step <= 6) || $step > 6) {

                $this->data['degree1'] = $userdata[0]['freelancer_post_degree'];
                $this->data['stream1'] = $userdata[0]['freelancer_post_stream'];
                $this->data['university1'] = $userdata[0]['freelancer_post_univercity'];
                $this->data['college1'] = $userdata[0]['freelancer_post_collage'];
                $this->data['percentage1'] = $userdata[0]['freelancer_post_percentage'];
                $this->data['pass_year1'] = $userdata[0]['freelancer_post_passingyear'];
            }
        }

           $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);



        $this->load->view('freelancer/freelancer_post/freelancer_post_education', $this->data);
    }

    public function freelancer_post_education_insert() {

        $userid = $this->session->userdata('aileenuser');




        // if ($this->input->post('next')) {

        //     $this->form_validation->set_rules('degree', 'Degree', 'required');
        //     $this->form_validation->set_rules('stream', 'Stream', 'required');
        //     $this->form_validation->set_rules('university', 'University', 'required');
        //     $this->form_validation->set_rules('college', 'Collage', 'required');
        //     $this->form_validation->set_rules('percentage', 'Percentage', 'required');
        //     $this->form_validation->set_rules('passingyear', 'Passing Year', 'required');




        //     if ($this->form_validation->run() == FALSE) {
        //         $this->load->view('freelancer/freelancer_post/freelancer_post_education');
        //     } else {

                $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');

                $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($userdata[0]['free_post_step'] == 7) {
                    $data = array(
                        'free_post_step' => 7
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                } else if ($userdata[0]['free_post_step'] > 6) {
                    $data = array(
                        'free_post_step' => $userdata[0]['free_post_step']
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                } else {
                    $data = array(
                        'free_post_step' => 6
                    );

                    $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
                }

                $data = array(
                    'freelancer_post_degree' => $this->input->post('degree'),
                    'freelancer_post_stream' => $this->input->post('stream'),
                    'freelancer_post_univercity' => $this->input->post('university'),
                    'freelancer_post_collage' => $this->input->post('college'),
                    'freelancer_post_percentage' => $this->input->post('percentage'),
                    'freelancer_post_passingyear' => $this->input->post('passingyear'),
                    'modify_date' => date('Y-m-d', time())
                );


                $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);


                if ($updatdata) {
                    $this->session->set_flashdata('success', 'Education information updated successfully');
                    redirect('freelancer/freelancer_post_portfolio', refresh);
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('freelancer/freelancer_post_education', refresh);
                }
            
        
    }

//freelancer education page controller End
//freelancer Portfolio page controller Start
    public function freelancer_post_portfolio() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');

        $userdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['free_post_step'];

            if ($step == 7 || ($step >= 1 && $step <= 7) || $step > 7) {

                $this->data['portfolio1'] = $userdata[0]['freelancer_post_portfolio'];
                $this->data['portfolio_attachment1'] = $userdata[0]['freelancer_post_portfolio_attachment'];
            }
        }
           $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);



        $this->load->view('freelancer/freelancer_post/freelancer_post_portfolio', $this->data);
    }

    public function freelancer_post_portfolio_insert() {

        $userid = $this->session->userdata('aileenuser');



        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');

        $userdatacon = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        //upload portfolio attachment certificate process start
        $config['upload_path'] = 'uploads/freelancer_portfolio_attachment/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
        // $config['file_name'] = $_FILES['picture']['name'];
        $config['file_name'] = $_FILES['portfolio_attachment']['name'];

        //Load upload library and initialize configuration
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('portfolio_attachment')) {
            $uploadData = $this->upload->data();
            //$picture = $uploadData['file_name']."-".date("Y_m_d H:i:s");
            $certificate = $uploadData['file_name'];
        } else {

            $certificate = '';
        }
        //upload portfolio attachment certificate process End


        $portfolio_attachment = $_FILES['portfolio_attachment']['name'];

        if ($portfolio_attachment == "") {
            $data = array(
                'freelancer_post_portfolio_attachment' => $this->input->post('image_hidden_portfolio')
            );
        } else {
            $data = array(
                'freelancer_post_portfolio_attachment' => $certificate
            );
        }


        $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);


        $data = array(
            'freelancer_post_portfolio' => $this->input->post('portfolio'),
            'modify_date' => date('Y-m-d', time()),
            'free_post_step' => 7
        );
        //echo "<pre>";print_r($data );die();


        $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);

        if ($updatdata) {

            if($userdatacon[0]['free_post_step'] == 7){
            redirect('freelancer/freelancer_post_profile', refresh);
           }else{
             redirect('freelancer/freelancer_apply_post', refresh);
           }
        } else {
            $this->session->flashdata('error', 'Your data not inserted');
            redirect('freelancer/freelancer_post_portfolio', refresh);
        }
    }

//freelancer Portfolio page controller End

    public function freelancer_hire_post($id) {
        //echo $id."userid is:";
        
        $userid = $this->session->userdata('aileenuser');
        //echo $userid;die();
        if($id == ''){
        // code change by pallavi 14-4-2017
        $join_str[0]['table'] = 'freelancer_hire_reg';
        $join_str[0]['join_table_id'] = 'freelancer_hire_reg.user_id';
        $join_str[0]['from_table_id'] = 'freelancer_post.user_id';
        $join_str[0]['join_type'] = '';


        $contition_array = array('freelancer_post.is_delete'=> '0','freelancer_hire_reg.user_id' => $userid, 'freelancer_hire_reg.status' => '1');


$data='freelancer_post.post_id,freelancer_post.post_name,freelancer_post.post_field_req,freelancer_post.post_est_time,freelancer_post.post_skill,freelancer_post.post_other_skill,freelancer_post.post_rate,freelancer_post.post_last_date,freelancer_post.post_description,freelancer_post.user_id,freelancer_post.created_date,freelancer_post.post_currency,freelancer_post.post_rating_type,freelancer_post.country,freelancer_post.city,freelancer_post.post_exp_month,freelancer_post.post_exp_year,freelancer_hire_reg.username,freelancer_hire_reg.fullname,freelancer_hire_reg.designation,freelancer_hire_reg.freelancer_hire_user_image';
        $postdata = $this->data['freelancerpostdata'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data, $sortby = 'freelancer_post.post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');
       // echo "<pre>";print_r($postdata);die();
        
        }
        else{
            $userid=$id;
            //echo $userid; 
          $join_str[0]['table'] = 'freelancer_hire_reg';
          $join_str[0]['join_table_id'] = 'freelancer_hire_reg.user_id';
          $join_str[0]['from_table_id'] = 'freelancer_post.user_id';
          $join_str[0]['join_type'] = '';
            
             $contition_array = array('freelancer_post.is_delete'=> '0','freelancer_hire_reg.user_id' => $userid, 'freelancer_hire_reg.status' => '1');


$data='freelancer_post.post_id,freelancer_post.post_name,freelancer_post.post_field_req,freelancer_post.post_est_time,freelancer_post.post_skill,freelancer_post.post_other_skill,freelancer_post.post_rate,freelancer_post.post_last_date,freelancer_post.post_description,freelancer_post.user_id,freelancer_post.created_date,freelancer_post.post_currency,freelancer_post.post_rating_type,freelancer_post.country,freelancer_post.city,freelancer_post.post_exp_month,freelancer_post.post_exp_year,freelancer_hire_reg.username,freelancer_hire_reg.fullname,freelancer_hire_reg.designation,freelancer_hire_reg.freelancer_hire_user_image';
        $postdata = $this->data['freelancerpostdata'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data, $sortby = 'freelancer_post.post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');
      // echo "<pre>";print_r($postdata);die();
        }

         // echo "<pre>"; print_r($this->data['freelancerpostdata'] );die();



        // code end by pallavi 14-4-2017 


        // old code
        // $contition_array = array('user_id' => $userid, 'status' => '1');
        // $this->data['freelancerdata'] = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        // $contition_array = array('is_delete' => 0);
        // $this->data['freelancerpostdata'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        // echo "<pre>"; print_r($this->data['freelancerpostdata'] );die();
        // old end code

// code for search
        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'freelancer_post_otherskill,designation', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $unique = array_merge($field, $skill, $freelancer_postdata);
        // echo count($unique);
        // $this->data['demo']=$unique;


        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
$results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);





        $this->load->view('freelancer/freelancer_hire/freelancer_hire_post', $this->data);
    }

    public function freelancer_add_post() {
        $userid = $this->session->userdata('aileenuser');



        $contition_array = array('status' => 1);
        $this->data['countries'] = $this->common->select_data_by_condition('countries', $contition_array, $data = '*', $sortby = 'country_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('status' => 1);
        $this->data['category'] = $this->common->select_data_by_condition('category', $contition_array, $data = '*', $sortby = 'category_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('status' => 1);
        $this->data['currency'] = $this->common->select_data_by_condition('currency', $contition_array, $data = '*', $sortby = 'currency_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('user_id' => $userid, 'status' => '1');
        $this->data['freelancerdata'] = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        //code for search 
        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'freelancer_post_otherskill,designation', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $unique = array_merge($field, $skill, $freelancer_postdata);
        // echo count($unique);
        // $this->data['demo']=$unique;


        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
$results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);


// code for search end

        $this->load->view('freelancer/freelancer_hire/freelancer_add_post', $this->data);
    }

   // khyati changes start 7-4
    public  function aasort (&$array, $key) {
      $sorter=array();    $ret=array();    reset($array); 

         foreach ($array as $ii => $va) {       

          $sorter[$ii]=$va[$key];    

        }   

         asort($sorter);  

           foreach ($sorter as $ii => $va) {    

               $ret[$ii]=$array[$ii];   

                }  

     return  $array=$ret;


  }

public function ajax_dataforcity() { //echo "falguni"; die();
      
      $_POST["country_id"] = 101;

       if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){ 
    //Get all state data
         $contition_array = array('country_id' => $_POST["country_id"] , 'status' => 1);

     $state =  $this->data['states'] =  $this->common->select_data_by_condition('states', $contition_array, $data = '*', $sortby = 'state_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

     foreach ($state as $st) { 

      $contition_array = array('state_id' => $st["state_id"] , 'status' => 1);

      $this->data['finalcitylist'] =  $this->common->select_data_by_condition('cities', $contition_array, $data = '*', $sortby = 'city_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
      

      $city[] = $this->data['finalcitylist'];
     }
  
     $this->data['city'] = $city;
    
    //Count total number of rows

$new = array();
     foreach($city as $key => $val){
     foreach($val as $key1 => $val1){

      $return = array();
     // $return = $val1;
       $return['city_id'] = $val1['city_id'];
       $return['city_name'] = $val1['city_name'];
       
       array_push($new,$return);
     }
      
     }
    
  

   $citdata =  $this->aasort($new,"city_name");

    //Display states list
    if(count($citdata) > 0){ 
        echo '<option value="">Select City</option>';
     foreach($citdata as $ct){
      

        echo '<option value="'.$ct['city_id'].'">'.$ct['city_name'].'</option>';
     
       }
    }else{  
        echo '<option value="">City not available</option>';
    }
}

}

// khyati changes end 7-4

    public function freelancer_add_post_insert() {
        $userid = $this->session->userdata('aileenuser');
        $skills = $this->input->post('skills');

        $this->form_validation->set_rules('post_name', 'Post Name', 'required');
        $this->form_validation->set_rules('post_desc', 'Post description', 'required');
        $this->form_validation->set_rules('fields_req', 'Field required', 'required');

       // $this->form_validation->set_rules('est_time', 'Estimated time', 'required');
        $this->form_validation->set_rules('rate', 'Rate', 'required');
        $this->form_validation->set_rules('currency', 'Currency', 'required');
       // $this->form_validation->set_rules('rating', 'Rating', 'required');
       // $this->form_validation->set_rules('month', 'Month', 'required');
       // $this->form_validation->set_rules('year', 'Year', 'required');
        //$this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
      //  $this->form_validation->set_rules('city', 'City', 'required');
       // $this->form_validation->set_rules('last_date', 'Last date', 'required');


        if ($this->form_validation->run() == FALSE) {
             $contition_array = array('status' => 1);
        $this->data['countries'] = $this->common->select_data_by_condition('countries', $contition_array, $data = '*', $sortby = 'country_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('status' => 1);
        $this->data['category'] = $this->common->select_data_by_condition('category', $contition_array, $data = '*', $sortby = 'category_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('status' => 1);
        $this->data['currency'] = $this->common->select_data_by_condition('currency', $contition_array, $data = '*', $sortby = 'currency_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('user_id' => $userid, 'status' => '1');
        $this->data['freelancerdata'] = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $this->load->view('freelancer/freelancer_hire/freelancer_add_post', $this->data);
        } else {
              $datereplace=$this->input->post('last_date');
             $lastdate=str_replace('/', '-',$datereplace);
             //echo $ratetype;die();
             // echo $lastdate;die();   
            $data = array(
                'post_name' => $this->input->post('post_name'),
                'post_description' => $this->input->post('post_desc'),
                'post_field_req' => $this->input->post('fields_req'),
                'post_skill' => implode(',', $skills),
                'post_other_skill' => $this->input->post('other_skill'),
                'post_est_time' => $this->input->post('est_time'),
                'post_rate' => $this->input->post('rate'),
                'post_currency' => $this->input->post('currency'),
                'post_rating_type' => $this->input->post('rating'),
                'post_exp_month' => $this->input->post('month'),
                'post_exp_year' => $this->input->post('year'),
                'post_last_date' => $lastdate,
                //'post_location' => $this->input->post('location'),
                'country' => $this->input->post('country'),
                'city' => $this->input->post('city'),
                'user_id' => $userid,
                'created_date' => date('Y-m-d', time()),
                'status' => 1,
                'is_delete' => 0
            );

              //echo "<pre>"; print_r($data); die();  

            $insert_id = $this->common->insert_data_getid($data, 'freelancer_post');
            if ($insert_id) {



                redirect('freelancer/freelancer_hire_post', refresh);
            } else {
                $this->session->flashdata('error', 'Sorry!! Your data not inserted');
                redirect('freelancer/freelancer_post', refresh);
            }
        }
    }

    public function recommen_candidate() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);
        $freelancerhiredata = $this->data['freelancerhiredata'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $post_skill = $this->data['freelancerhiredata'][0]['post_skill'];
        $postuserarray = explode(',', $post_skill);

        $candidate = $this->data['candidate'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array = array(), $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        foreach ($candidate as $frcan) {
            $freelancer_post_area = explode(',', $frcan['freelancer_post_area']);
            $result = array_intersect($postuserarray, $freelancer_post_area);

            if (count($result) > 0) {

                $contition_array = array('freelancer_post_reg_id' => $frcan['freelancer_post_reg_id'], 'is_delete' => 0, 'status' => 1);

                $workcandidate = $this->data['workcandidate'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = 'freelancer_post_reg_id', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//                echo "<pre>"; print_r($workcandidate);
                    if($workcandidate[0]['user_id'] != $userid){
                $freecandidate[] = $workcandidate;
                    }
            }
        }
//        die();

        $this->data['candidatefreelancer'] = $freecandidate;
        // echo "<pre>"; print_r($this->data['candidatefreelancer']); die();
// code for search
        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'freelancer_post_otherskill,designation', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $unique = array_merge($field, $skill, $freelancer_postdata);
        // echo count($unique);
        // $this->data['demo']=$unique;


        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
       foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }
            // echo "<pre>"; print_r($result1);die();
         
         $this->data['demo']= array_values($result1);




        $this->load->view('freelancer/freelancer_hire/recommen_candidate', $this->data);
    }

    public function freelancer_edit_post($id) {  
       // echo $id; die();
        $userid = $this->session->userdata('aileenuser');



        $contition_array = array('status' => 1);
        $this->data['countries'] = $this->common->select_data_by_condition('countries', $contition_array, $data = '*', $sortby = 'country_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('status' => 1);
        $this->data['cities'] = $this->common->select_data_by_condition('cities', $contition_array, $data = '*', $sortby = 'city_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('status' => 1);
        $this->data['category'] = $this->common->select_data_by_condition('category', $contition_array, $data = '*', $sortby = 'category_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $contition_array = array('status' => 1, 'type' => 1);
        $this->data['skill1'] = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = 'skill', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');




        $contition_array = array('status' => 1);
        $this->data['currency'] = $this->common->select_data_by_condition('currency', $contition_array, $data = '*', $sortby = 'currency_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('post_id' => $id, 'is_delete' => 0);
            $this->data['freelancerpostdata'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $this->data['country1'] = $this->data['freelancerpostdata'][0]['country'];
        $this->data['city1'] = $this->data['freelancerpostdata'][0]['city'];

        $skildata = explode(',', $this->data['freelancerpostdata'][0]['post_skill']);
        $this->data['selectdata'] = $skildata;


//code for search 
        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'freelancer_post_otherskill,designation', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $unique = array_merge($field, $skill, $freelancer_postdata);
        // echo count($unique);
        // $this->data['demo']=$unique;


        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
$results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);





        $this->load->view('freelancer/freelancer_hire/freelancer_edit_post', $this->data);
    }

    public function freelancer_edit_post_insert($id) {

        $userid = $this->session->userdata('aileenuser');
        $skills = $this->input->post('skills');
        $this->form_validation->set_rules('post_name', 'Post Name', 'required');
        $this->form_validation->set_rules('post_desc', 'Post description', 'required');
        $this->form_validation->set_rules('fields_req', 'Field required', 'required');

       
        $this->form_validation->set_rules('est_time', 'Estimated time', 'required');
        $this->form_validation->set_rules('rate', 'Rate', 'required');
        $this->form_validation->set_rules('currency', 'Currency', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required');
        $this->form_validation->set_rules('month', 'Month', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');

        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');

        $this->form_validation->set_rules('last_date', 'Last date', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('freelancer/freelancer_hire/freelancer_edit_post');
        } else {
                 $datereplace=$this->input->post('last_date');
                 $lastdate=str_replace('/', '-',$datereplace);
            
            $data = array(
                'post_name' => $this->input->post('post_name'),
                'post_description' => $this->input->post('post_desc'),
                'post_field_req' => $this->input->post('fields_req'),
                'post_skill' => implode(',', $skills),
                'post_other_skill' => $this->input->post('other_skill'),
                'post_est_time' => $this->input->post('est_time'),
                'post_rate' => $this->input->post('rate'),
                'post_currency' => $this->input->post('currency'),
                'post_rating_type' => $this->input->post('rating'),
                'post_exp_month' => $this->input->post('month'),
                'post_exp_year' => $this->input->post('year'),
                'post_last_date' => $lastdate,
                'country' => $this->input->post('country'),
                'city' => $this->input->post('city'),
                'modify_date' => date('Y-m-d', time()),
            );

            // echo "<pre>"; print_r($data);die();
            $updatdata = $this->common->update_data($data, 'freelancer_post', 'post_id', $id);

            if ($updatdata) {



                redirect('freelancer/freelancer_hire_post', refresh);
            } else {
                $this->session->flashdata('error', 'Sorry!! Your data not inserted');
                redirect('freelancer/freelancer_edit_post', refresh);
            }
        }
    }

    //Freelancer Job All Post Start
    public function freelancer_apply_post($id="") {
        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');


        if ($id == $userid || $id == '') {

            //echo "hi"; die();

            $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);
            $freelancerdata = $this->data['freelancerdata'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //echo "<pre>"; print_r($freelancerdata);
            $freelancer_post_area = $this->data['freelancerdata'][0]['freelancer_post_area'];
            $postuserarray = explode(',', $freelancer_post_area);

            $freelancerdata1 = $this->data['freelancerdata1'] = $this->common->select_data_by_condition('freelancer_post', $contition_array = array(), $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           // echo "<pre>"; print_r($freelancerdata1);


            foreach ($freelancerdata1 as $frov) {

                $postskill = explode(',', $frov['post_skill']);

                $result = array_intersect($postuserarray, $postskill);
               // echo "<pre>"; print_r($result);
                if (count($result) > 0) {
                    //echo "hiiiii";
                    $contition_array = array('post_id' => $frov['post_id'], 'is_delete' => '0', 'status' => '1');
                    //echo "<pre>"; print_r($contition_array);
                    $frepostdata = $this->data['frepostdata'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                   // echo "<pre>";print_r($frepostdata);die();
                   // $freedata[] = $frepostdata;
                    if($frepostdata[0]['user_id'] != $userid) {
                    $freedata[] = $frepostdata;
                    }
                }
            }
            
        } 
        else {
            echo "heloo"; die();
            $contition_array = array('user_id' => $id, 'is_delete' => 0, 'status' => 1);
            $freelancerdata = $this->data['freelancerdata'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $freelancer_post_area = $this->data['freelancerdata'][0]['freelancer_post_area'];
            $postuserarray = explode(',', $freelancer_post_area);

            $freelancerdata1 = $this->data['freelancerdata1'] = $this->common->select_data_by_condition('freelancer_post', $contition_array = array(), $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            foreach ($freelancerdata1 as $frov) {

                $postskill = explode(',', $frov['post_skill']);

                $result = array_intersect($postuserarray, $postskill);
                if (count($result) > 0) {
                    $contition_array = array('post_id' => $frov['post_id'], 'is_delete' => 0, 'status' => 1);

                    $frepostdata = $this->data['frepostdata'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                    $freedata[] = $frepostdata;
                }
            }
        }

        $this->data['postdetail'] = $freedata;

       // echo "<pre>"; print_r($freedata);die();
       // echo "<pre>"; print_r($this->data['postdetail']); die();

//code for search
        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);




        $this->load->view('freelancer/freelancer_post/post_apply', $this->data);
    }

     public function save_user1($id, $save_id) { 
        //echo $id; echo $save_id; die();
        $id = $_POST['user_id'];

       // echo $id; die();
        $save_id = $_POST['save_id'];

        $userid = $this->session->userdata('aileenuser');
        //echo $id;die();
        $contition_array = array('from_id' => $userid, 'to_id' => $id, 'save_id' => $save_id);
        $userdata = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo "<pre>";print_r($userdata);die();

        if ($userdata) {
            $data = array(
                'status' => 0
            );


            $updatedata = $this->common->update_data($data, 'save', 'save_id', $save_id);

            if ($updatedata) {

                $saveuser = 'Saved';
                echo $saveuser;
            }
        } else {
            $data = array(
                'from_id' => $userid,
                'to_id' => $id,
                'status' => 0,
                'save_type' => 2
            );

            $insert_id = $this->common->insert_data($data, 'save');


            if ($insert_id) {

                $saveuser = 'Saved';
                echo $saveuser;
            }
        }
    }


    //Freelancer Job All Post controller end
//Freelancer Apply post at all post page & save post page controller Start
    public function apply_insert() {  
        
        $id = $_POST['post_id'];
        $para = $_POST['allpost'];
        $notid = $_POST['userid'];

        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('post_id' => $id, 'user_id' => $userid, 'is_delete' => 0);
        $userdata = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $app_id = $userdata[0]['app_id'];

        if ($userdata) {

            $contition_array = array('job_delete' => 1);
            $jobdata = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = 'app_id', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $data = array(
                'job_delete' => 0,
                'job_save'  => 3
                
            );


            $updatedata = $this->common->update_data($data, 'freelancer_apply', 'app_id', $app_id);



            $data = array(
                'not_type' => 3,
                'not_from_id' => $userid,
                'not_to_id' => $notid,
                'not_read' => 2,
                'not_from' => 6,
                'not_product_id' => $app_id
            );

$updatedata = $this->common->insert_data_getid($data, 'notification');
            // end notoification

            if ($updatedata) {

                if ($para == 'all') {
                    $applypost = 'Applied';
                }
            }
            echo $applypost;
        } else {

            $data = array(
                'post_id' => $id,
                'user_id' => $userid,
                'status' => 1,
                'created_date' => date('Y-m-d h:i:s', time()),
                'is_delete' => 0,
                'job_delete' => 0,
                'job_save'  => 3
            );


            $insert_id = $this->common->insert_data_getid($data, 'freelancer_apply');

            // insert notification

            $data = array(
                'not_type' => 3,
                'not_from_id' => $userid,
                'not_to_id' => $notid,
                'not_read' => 2,
                'not_from' => 6,
                'not_product_id' => $insert_id
            );

            $insert_id = $this->common->insert_data_getid($data, 'notification');
          
            // end notoification

            if ($insert_id) {

                $applypost = 'Applied';
            }
            echo $applypost;
        }
    }
    //Freelancer Apply post at all post page & save post page controller End
//Freelancer view all applied post controller Start
    public function freelancer_applied_post() {
       // echo "hi"; die();

        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');
// job seeker detail
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);
        $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

// post detail

//         $join_str[0]['table'] = 'freelancer_apply';
//         $join_str[0]['join_table_id'] = 'freelancer_apply.post_id';
//         $join_str[0]['from_table_id'] = 'freelancer_post.post_id';
//         $join_str[0]['join_type'] = '';

//         $contition_array = array('freelancer_apply.job_delete' => 0, 'freelancer_apply.user_id' => $userid, 'freelancer_apply.job_save' => 1);

// $data='freelancer_post.post_id,freelancer_post.post_name,freelancer_post.post_field_req,freelancer_post.post_est_time,freelancer_post.post_skill,freelancer_post.post_other_skill,freelancer_post.post_rate,freelancer_post.post_last_date,freelancer_post.post_description,freelancer_post.user_id,freelancer_post.created_date,freelancer_post.post_currency,freelancer_post.post_rating_type,freelancer_post.country,freelancer_post.city,freelancer_post.post_exp_month,freelancer_post.post_exp_year,freelancer_apply.app_id,freelancer_apply.post_id,freelancer_apply.status,freelancer_apply.created_date,freelancer_apply.modify_date,freelancer_apply.job_delete,freelancer_apply.job_save,freelancer_apply.is_delete';
//         $postdata = $this->data['postdata'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data, $sortby = 'freelancer_post.post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');
        
        //echo "<pre>"; print_r($postdata); die();

          $join_str[0]['table'] = 'freelancer_apply';
                    $join_str[0]['join_table_id'] = 'freelancer_apply.post_id';
                    $join_str[0]['from_table_id'] = 'freelancer_post.post_id';
                    $join_str[0]['join_type'] = '';
                     $contition_array = array('freelancer_apply.job_delete' => 0, 'freelancer_apply.user_id' => $userid);
                
                $postdata = $this->data['postdata'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data ='freelancer_post.*,freelancer_apply.app_id,freelancer_apply.user_id as userid,freelancer_apply.modify_date', $sortby = 'app_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');
        

//echo "<pre>"; print_r($postdata); die();

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
           
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
         
          }

         
         $this->data['demo']= array_values($result1);
        $this->load->view('freelancer/freelancer_post/freelancer_applied_post', $this->data);
    }

    //Freelancer view all applied post controller End
    //Freelancer Delete all Applied & Save post controller Start
    public function freelancer_delete_apply() {
        //echo "hi"; die();

        $id = $_POST['app_id'];
        $para = $_POST['para'];

        $userid = $this->session->userdata('aileenuser');

        $data = array(
            'job_delete' => 1,
            'job_save' => 3,
            'modify_date' => date('Y-m-d h:i:s', time())
        );

        $updatedata = $this->common->update_data($data, 'freelancer_apply', 'app_id', $id);
    }

    //Freelancer Delete all Applied & Save post controller End
//Freelancer Save post controller Start

    public function save_insert() {
      
       $id = $_POST['post_id'];
       $userid = $this->session->userdata('aileenuser');

        $contition_array = array('post_id' => $id, 'user_id' => $userid, 'is_delete' => 0);
        $userdata = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $app_id = $userdata[0]['app_id'];

        if($userdata){

$contition_array = array('job_delete' => 1);
$jobdata = $this->common->select_data_by_condition('freelancer_apply', $contition_array = array(), $data = '*', $sortby = '',$orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $data = array(
                'job_delete' => 0,
                'job_save' => 1
            );

$updatedata = $this->common->update_data($data, 'freelancer_apply', 'app_id', $app_id);

 if ($updatedata) {

    $savepost = 'Applied post';
    echo $savepost;
           
            }
        } else {

            $data = array(
                'post_id' => $id,
                'user_id' => $userid,
                'status' => 1,
                'created_date' => date('Y-m-d h:i:s', time()),
                'is_delete' => 0,
                'job_delete' => 0,
                'job_save' => 1
            );

            $insert_id = $this->common->insert_data_getid($data, 'freelancer_apply');
            if ($insert_id) {
                $savepost = 'Applied Post';
                echo $savepost;
            }
        }
    }

//Freelancer Save post controller End

    public function freelancer_apply_list($id) {
        $userid = $this->session->userdata('aileenuser');
         
        $this->data['postid'] = $id;
// khyati chnages start
        $join_str[0]['table'] = 'freelancer_apply';
        $join_str[0]['join_table_id'] = 'freelancer_apply.user_id';
        $join_str[0]['from_table_id'] = 'freelancer_post_reg.user_id';
        $join_str[0]['join_type'] = '';


       $contition_array = array('freelancer_apply.post_id' => $id, 'freelancer_apply.is_delete' => 0);



        $postdata = $this->data['postdata'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data, $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');

        //echo '<pre>'; print_r($postdata); die();
// khyati chnages end

// code for search
        $contition_array = array('status' => '1', 'is_delete' => '0');
        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'freelancer_post_otherskill,designation', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $unique = array_merge($field, $skill, $freelancer_postdata);
        // echo count($unique);
        // $this->data['demo']=$unique;
       
       foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {
                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
$this->data['demo']= array_values($result1);
        $this->load->view('freelancer/freelancer_hire/freelancer_apply_list', $this->data);
    }

    public function save_user() {
        //echo "hi";

         $id = $_POST['post_id'];
         //echo $id;

        $userid = $this->session->userdata('aileenuser');
      // echo $userid;

        $contition_array = array('post_id' => $id, 'user_id' => $userid, 'is_delete' => 0);
        $userdata = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'asc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//echo '<pre>'; print_r($userdata); die();

        $app_id = $userdata[0]['app_id'];

        if ($userdata) {

            $contition_array = array('job_delete' => 0);
            $jobdata = $this->common->select_data_by_condition('freelancer_apply', $contition_array = array(), $data = '*', $sortby = 'post_id', $orderby = 'asc', $limit = '', $offset = '', $join_str = array(), $groupby = '');



            $data = array(
                'job_delete' => 1,
                'job_save' => 2
            );

            $updatedata = $this->common->update_data($data, 'freelancer_apply', 'app_id', $app_id);


            if ($updatedata) {

                $savepost = 'Saved';
            }
            echo $savepost;
        } else {

            $data = array(
                'post_id' => $id,
                'user_id' => $userid,
                'status' => 1,
                'created_date' => date('Y-m-d h:i:s', time()),
                'is_delete' => 0,
                'job_delete' => 1,
                'job_save' => 2
            );

            $insert_id = $this->common->insert_data_getid($data, 'freelancer_apply');
            if ($insert_id) {

                $savepost = 'Saved';
            } echo $savepost;
        }
    }

//save freelancer list controller start
    public function freelancer_save() {

        $userid = $this->session->userdata('aileenuser');
        
        // code change by pallavi 14-4-2017

        $join_str[0]['table'] = 'freelancer_post_reg';
        $join_str[0]['join_table_id'] = 'freelancer_post_reg.user_id';
        $join_str[0]['from_table_id'] = 'save.to_id';
        $join_str[0]['join_type'] = '';


   $contition_array = array('save.status'=> '0','freelancer_post_reg.is_delete' => 0, 'freelancer_post_reg.status' => 1, 'save.from_id' => $userid, 'save.save_type' => 2);
   $postdata = $this->data['postdata'] = $this->common->select_data_by_condition('save', $contition_array, $data, $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');

      // code end by pallavi 14-4-2017

        // echo "<pre>";print_r($postdata);die();
        //
// code for search
        $contition_array = array('status' => '1', 'is_delete' => '0');
        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'freelancer_post_otherskill,designation', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $unique = array_merge($field, $skill, $freelancer_postdata);
        // echo count($unique);
        // $this->data['demo']=$unique;
       
       foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {
                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
$this->data['demo']= array_values($result1);
$this->load->view('freelancer/freelancer_hire/freelancer_save', $this->data);
   
    }

//save freelancer list controller End
//Freelancer Save Post Controller Start         

    public function freelancer_save_post() {
        //echo "hi"; die();

        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');
// job seeker detail
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);
        $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

// post detail
        $join_str[0]['table'] = 'freelancer_post';
        $join_str[0]['join_table_id'] = 'freelancer_post.post_id';
        $join_str[0]['from_table_id'] = 'freelancer_apply.post_id';
        $join_str[0]['join_type'] = '';

       $contition_array = array('freelancer_apply.job_delete' => 1, 'freelancer_apply.user_id' => $userid, 'freelancer_apply.job_save' => 2);
        $this->data['postdetail'] = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = '*', $sortby = 'app_id', $orderby = '', $limit = '', $offset = '', $join_str, $groupby ='');

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby = '');
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

    $this->data['demo']= array_values($result1);
    $this->load->view('freelancer/freelancer_post/freelancer_save_post', $this->data);
    }

//Freelancer Save Post Controller End

    public function user_image_insert() {


        $userid = $this->session->userdata('aileenuser');


        if ($this->input->post('cancel1')) {  //echo "hii"; die();
            redirect('freelancer/freelancer_add_post', refresh);
        } elseif ($this->input->post('cancel2')) {
            redirect('freelancer/freelancer_hire_post', refresh);
        } elseif ($this->input->post('cancel3')) {
            redirect('freelancer/freelancer_save', refresh);
        } elseif ($this->input->post('cancel4')) {
            redirect('freelancer/freelancer_hire_profile', refresh);
        }

        if (empty($_FILES['profilepic']['name'])) {
            $this->form_validation->set_rules('profilepic', 'Upload profilepic', 'required');
        } else {
            $config['upload_path'] = 'uploads/user_image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|mpeg|mpg|mpe|qt|mov|avi|pdf';

            $config['file_name'] = $_FILES['profilepic']['name'];

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('profilepic')) {
                $uploadData = $this->upload->data();

                $picture = $uploadData['file_name'];
            } else {
                $picture = '';
            }

            $data = array(
                'freelancer_hire_user_image' => $picture,
                'modified_date' => date('Y-m-d', time())
            );

            $updatdata = $this->common->update_data($data, 'freelancer_hire_reg', 'user_id', $userid);
           // echo "<pre>"; print_r($updatdata);die();

            if ($updatdata) {
                if ($this->input->post('hitext') == 1) {
                    redirect('freelancer/freelancer_add_post', refresh);
                } elseif ($this->input->post('hitext') == 2) {
                    redirect('freelancer/freelancer_hire_post', refresh);
                } elseif ($this->input->post('hitext') == 3) {
                    redirect('freelancer/freelancer_save', refresh);
                } elseif ($this->input->post('hitext') == 4) {
                    redirect('freelancer/freelancer_hire_profile', refresh);
                }
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('freelancer/freelancer_hire_post', refresh);
            }
        }
    }

    public function user_image_add() {


        $userid = $this->session->userdata('aileenuser');


        if ($this->input->post('cancel1')) {  //echo "hii"; die();
            redirect('freelancer/freelancer_apply_post', refresh);
        } elseif ($this->input->post('cancel2')) {
            redirect('freelancer/freelancer_save_post', refresh);
        } elseif ($this->input->post('cancel3')) {
            redirect('freelancer/freelancer_post_profile', refresh);
        }


        if (empty($_FILES['profilepic']['name'])) {
            $this->form_validation->set_rules('profilepic', 'Upload profilepic', 'required');
        } else {
            $config['upload_path'] = 'uploads/user_image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|mpeg|mpg|mpe|qt|mov|avi|pdf';

            $config['file_name'] = $_FILES['profilepic']['name'];

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('profilepic')) {
                $uploadData = $this->upload->data();

                $picture = $uploadData['file_name'];
            } else {
                $picture = '';
            }

            $data = array(
                'freelancer_post_user_image' => $picture,
                'modify_date' => date('Y-m-d', time())
            );


            $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);

            if ($updatdata) {
                if ($this->input->post('hitext') == 1) {
                    redirect('freelancer/freelancer_applied_post', refresh);
                } elseif ($this->input->post('hitext') == 2) {
                    redirect('freelancer/freelancer_save_post', refresh);
                } elseif ($this->input->post('hitext') == 3) {
                    redirect('freelancer/freelancer_post_profile', refresh);
                }
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('freelancer/freelancer_apply_post', refresh);
            }
        }
    }

    public function freelancer_hire_profile($id="") {
        //echo $id."userid is:";
        $userid = $this->session->userdata('aileenuser');
        //echo $userid;die();
        if ($id == $userid || $id == '') {

            $contition_array = array('user_id' => $userid, 'status' => '1');
            $this->data['freelancerhiredata'] = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        } else {
            $contition_array = array('user_id' => $id, 'status' => '1');
            $this->data['freelancerhiredata'] = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        }

// code for search
        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);


        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'freelancer_post_otherskill,designation', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $unique = array_merge($field, $skill, $freelancer_postdata);
        // echo count($unique);
        // $this->data['demo']=$unique;


        foreach ($unique as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);


        $this->load->view('freelancer/freelancer_hire/freelancer_hire_profile', $this->data);
    }

//Remove save candidate controller Start
    public function remove_save() {

        $saveid = $_POST['save_id'];
        //echo $saveid;die();
        $userid = $this->session->userdata('aileenuser');
        // echo $userid;echo $id;die();


        $data = array(
            'status' => 1
        );

        $updatedata = $this->common->update_data($data, 'save', 'save_id', $saveid);
    }

//Remove save candidate controller End

    public function freelancer_post_profile($id) {

        $userid = $this->session->userdata('aileenuser');

        if ($id == $userid || $id == '') {

            $contition_array = array('user_id' => $userid);
            $this->data['freelancerpostdata'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            //echo "<pre>"; print_r($this->data['freelancerpostdata']); die();
        } else {
            $contition_array = array('user_id' => $id);
            $this->data['freelancerpostdata'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        }

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $freelancer_postdata = $this->data['results'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'designation,freelancer_post_otherskill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($freelancer_postdata);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1', 'is_delete' => '0');

        $field = $this->data['results'] = $this->common->select_data_by_condition('category', $contition_array, $data = 'category_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($skill, $freelancer_postdata, $field);
        // echo count($unique);
        // $this->data['demo']=$uni;

        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }

         
         $this->data['demo']= array_values($result1);
        $this->load->view('freelancer/freelancer_post/freelancer_post_profile', $this->data);
    }

    //keyskill automatic retrieve cobtroller start
    public function keyskill() {
        $json = [];
        $where = "type='1' AND status='1'";



        if (!empty($this->input->get("q"))) {
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
    public function location() {
        $json = [];



        if (!empty($this->input->get("q"))) {
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
//freelancer post user search start

    public function freelancerpost_user($id) {

        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('freelancer_post_reg.user_id' => $id, 'freelancer_post_reg.is_delete' => 0);

        $data = '*';

        $this->data['freelancerpostdata'] = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);



        $this->load->view('freelancer/freelancer_post/freelancer_post_profile', $this->data);
    }

//freelancer post search end
    //freelancer hire user search start
    public function freelancerhire_user($id) {

        $userid = $this->session->userdata('aileenuser');
        //echo $userid;
        $contition_array = array('freelancer_hire_reg.user_id' => $id, 'freelancer_hire_reg.is_delete' => 0);

        $data = '*';

        $this->data['freelancerdata'] = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);


        $contition_array = array('user_id' => $id, 'is_delete' => 0);
        $this->data['freelancerpostdata'] = $this->common->select_data_by_condition('freelancer_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        $this->load->view('freelancer/freelancer_hire/freelancer_hire_post', $this->data);
    }

    //freelancer hire user search end 
//remove post at home page controoler start
    public function remove_post() {

        $postid = $_POST['post_id'];

        $data = array(
            'is_delete' => 1,
            'modify_date' => date('y-m-d h:i:s')
        );

        $updatedata = $this->common->update_data($data, 'freelancer_post', 'post_id', $postid);
    }

//remove post at home page controoler End
//invite user  at home page click on applied person controller Start
    public function invite_user($appid, $status, $postid, $personid) {
        $userid = $this->session->userdata('aileenuser');

        $data = array(
            'status' => $status,
            'modify_date' => date('y-m-d h:i:s')
        );


        $updatedata = $this->common->update_data($data, 'freelancer_apply', 'app_id', $appid);

        // insert notification

        $data = array(
            'not_type' => 4,
            'not_from_id' => $userid,
            'not_to_id' => $personid,
            'not_read' => 2,
            'not_from' => 5,
            'not_product_id' => $appid,
        );

        $insert_id = $this->common->insert_data_getid($data, 'notification');
        // end notoification

        redirect('freelancer/freelancer_apply_list/' . $postid, 'refresh');
    }

//invite user  at home page click on applied person controller End
//deactivate user start for work
    public function deactivate($id) {


        $data = array(
            'status' => 0
        );

        $update = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $id);

        if ($update) {


            $this->session->set_flashdata('success', 'You are deactivate successfully.');
            redirect('dashboard', 'refresh');
        } else {
            $this->session->flashdata('error', 'Sorry!! Your are not deactivate!!');
            redirect('freelancer/freelancer_post', 'refresh');
        }
    }

// deactivate user end
//deactivate user start for hire
    public function deactivate_hire($id) {


        $data = array(
            'status' => 0
        );

        $update = $this->common->update_data($data, 'freelancer_hire_reg', 'user_id', $id);

        if ($update) {


            $this->session->set_flashdata('success', 'You are deactivate successfully.');
            redirect('dashboard', 'refresh');
        } else {
            $this->session->flashdata('error', 'Sorry!! Your are not deactivate!!');
            redirect('freelancer/freelancer_hire_profile', 'refresh');
        }
    }

// deactivate user end

    public function image_upload_ajax() {

        include 'db.php';

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
                        // $config['file_name'] = $_FILES['picture']['name'];
                        $config['file_name'] = $_FILES['photoimg']['name'];
                        //$config['max_size'] = '1000000000000000';
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

                        $update = $this->common->update_data($data, 'freelancer_hire_reg', 'user_id', $session_uid);
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

            $update = $this->common->update_data($data, 'freelancer_hire_reg', 'user_id', $session_uid);
            if ($update) {

                echo $position;
            }
        }
    }

// cover pic controller

    public function ajaxpro_hire() {
        $userid = $this->session->userdata('aileenuser');

        $data = $_POST['image'];


        $imageName = time() . '.png';
        $base64string = $data;
        file_put_contents('uploads/free_hire_bg/' . $imageName, base64_decode(explode(',', $base64string)[1]));

        $data = array(
            'profile_background' => $imageName
        );

        $update = $this->common->update_data($data, 'freelancer_hire_reg', 'user_id', $userid);

        $this->data['jobdata'] = $this->common->select_data_by_id('job_reg', 'user_id', $userid, $data = '*', $join_str = array());

        echo '<img src="' . $this->data['jobdata'][0]['profile_background'] . '" />';
    }

    public function image_hire() {
        $userid = $this->session->userdata('aileenuser');

        $config['upload_path'] = 'uploads/free_hire_bg';
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


        $updatedata = $this->common->update_data($data, 'freelancer_hire_reg', 'user_id', $userid);

        if ($updatedata) {
            echo $userid;
        } else {
            echo "welcome";
        }
    }

    // cover pic end
    // cover pic controller

    public function ajaxpro_work() {
        $userid = $this->session->userdata('aileenuser');

        $data = $_POST['image'];


        $imageName = time() . '.png';
        $base64string = $data;
        file_put_contents('uploads/free_work_bg/' . $imageName, base64_decode(explode(',', $base64string)[1]));

        $data = array(
            'profile_background' => $imageName
        );

        $update = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);

        $this->data['jobdata'] = $this->common->select_data_by_id('freelancer_post_reg', 'user_id', $userid, $data = '*', $join_str = array());

        echo '<img src="' . $this->data['jobdata'][0]['profile_background'] . '" />';
    }

    public function image_work() {
        $userid = $this->session->userdata('aileenuser');

        $config['upload_path'] = 'uploads/free_work_bg';
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
            'profile_background_main' => $image
        );

        $updatedata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);

        if ($updatedata) {
            echo $userid;
        } else {
            echo "welcome";
        }
    }

    // cover pic end


    public function designation() {
        $userid = $this->session->userdata('aileenuser');


        $data = array(
            'designation' => $this->input->post('designation'),
            'modify_date' => date('Y-m-d', time())
        );

        $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);

        if ($updatdata) {

            if ($this->input->post('hitext') == 1) {
                redirect('freelancer/freelancer_post_profile', refresh);
            } elseif ($this->input->post('hitext') == 2) {
                redirect('freelancer/freelancer_save_post', refresh);
            } elseif ($this->input->post('hitext') == 3) {
                redirect('freelancer/freelancer_applied_post', refresh);
            }
        } else {
            $this->session->flashdata('error', 'Your data not inserted');
            redirect('freelancer/post_apply', refresh);
        }
    }

    //reactivate account start

    public function reactivate() {

        $userid = $this->session->userdata('aileenuser');
        $data = array(
            'status' => 1,
            'modify_date' => date('y-m-d h:i:s')
        );

        $updatdata = $this->common->update_data($data, 'freelancer_post_reg', 'user_id', $userid);
        if ($updatdata) {

            redirect('freelancer/freelancer_apply_post', refresh);
        } else {

            redirect('freelancer/reactivate', refresh);
        }
    }
    
    public function free_invite_user() {
        //echo "hiiiii";
         $postid = $_POST['post_id'];
         $invite_user = $_POST['invited_user']; 
        // echo $postid;
         //echo $invite_user;
         
        $userid = $this->session->userdata('aileenuser');
      
        $data = array(
            'user_id' => $userid,
            'post_id' => $postid,
            'invite_user_id' => $invite_user,
            'profile' => "freelancer"
            );
        $insert_id = $this->common->insert_data_getid($data, 'user_invite');
       
        if ($insert_id) {
            $data = array(
            'not_type' => 4,
            'not_from_id' => $userid,
            'not_to_id' => $invite_user,
            'not_read' => 2,
            'not_status' => 0,
            'not_product_id' => $insert_id,
            'not_from' => 4 
            );
        $insert_id = $this->common->insert_data_getid($data, 'notification');
        echo 'Selected';
        } else {
            echo 'error';
        }
    }

//reactivate accont end
}

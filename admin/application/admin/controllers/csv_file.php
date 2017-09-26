<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Csv_file extends CI_Controller {

    public $data;

    public function __construct() {

        parent::__construct();

        if (!$this->session->userdata('aileen_admin')) {
            redirect('login', 'refresh');
        }

        // Get Site Information
        $this->data['title'] = 'CSV Management | Aileensoul';
        $this->data['module_name'] = 'CSV Management';

        //Loadin Pagination Custome Config File
        $this->config->load('paging', TRUE);
        $this->paging = $this->config->item('paging');

        include('include.php');
    }

    public function index() {
        $this->load->view('csv/csv_insert', $this->data);
    }

    public function csv_function() {



        if (isset($_POST["importSubmit"])) {

            $filename = $_FILES["file"]["tmp_name"];


            if ($_FILES["file"]["size"] > 0) {
                $file = fopen($filename, "r");
                fgetcsv($file);
                while (($line = fgetcsv($file, 10000)) !== FALSE) {

                    $prevQuery = $this->db->get_where('user', array('user_email' => $line[4]))->row()->user_id;
                    if (count($prevResult) > 0) {
                        
                    } else {

                        $data = array(
                            'first_name' => trim($line[2]),
                            'last_name' => trim($line[3]),
                            'user_email' => trim($line[4]),
                            'user_password' => md5($line[5]),
                            'user_dob' => date('y-m-d', strtotime($line[6])),
                            // 'user_image' => $line[6],
                            'user_gender' => trim($line[8]),
                            'user_agree' => trim($line[9]),
                            'is_delete' => trim($line[10]),
                            'status' => trim($line[11]),
                            'created_date' => date('Y-m-d h:i:s', time()),
                            'modified_date' => date('Y-m-d h:i:s', time()),
                            'edit_ip' => trim($line[14]),
                            'verify_date' => date('Y-m-d h:i:s', time()),
                            'user_verify' => trim($line[16]),
//                            'profile_background' =>$line[16],
//                            'profile_background_main' =>$line[17],
//                            'fb_id' =>$line[18],
                            'user_slider' =>trim($line[20]),
                            'password_code' => trim($line[21])
                        );

                      //  echo "<pre>"; print_r($data);
                        if($data['first_name'] == ''){
                           
                        }else{
                           
                            $insert_id = $this->common->insert_data($data, 'user');
                            if($insert_id){
                                //echo "444";die();
                                $user_id = $this->db->get_where('user', array('user_email' => $line[4]))->row()->user_id;
                                
                               // echo $line[23];
                                 
                                $keyskill= explode(',', $line[23]);
                                foreach ($keyskill as $skill){
                                    
                                }
                                
                                
                                $data = array(
                            'user_id' => $user_id,
                            'fname' => trim($line[2]),
                            'lname' => trim($line[3]),
                            'email' => md5($line[4]),
                             'phnno' => trim($line[22]),
                            'dob' => date('y-m-d', strtotime($line[6])),
                            // 'user_image' => $line[6],
                            'gender' => trim($line[8]),
                            'keyskill' => trim($line[9]),
                            'experience' => trim($line[24]),
                            'work_job_title' => trim($line[11]),
                            'work_job_industry' => date('Y-m-d h:i:s', time()),
                            'work_job_city' => date('Y-m-d h:i:s', time()),
                            'is_delete' => 0,
                            'status' => 1,
                            'created_date' => date('Y-m-d h:i:s', time()),
//                            'profile_background' =>$line[16],
//                            'profile_background_main' =>$line[17],
//                            'fb_id' =>$line[18],
                            'modified_date' =>date('Y-m-d h:i:s', time()),
                            'job_step' => 10
                        );
                                
                                
                            }
                        }
                       // $insert_id = $this->common->insert_data($data, 'user');

                        if (!isset($insert_id)) {
                            echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
                                                        window.location= '<?php echo base_url('csv_file/index'); ?>';
							
						  </script>";
                        } else {
                            echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
                                                window.location= '<?php echo base_url('csv_file/index'); ?>';
						
					</script>";
                        }
                    }
                } 

                fclose($file);
            }
        }



        // echo "555"; exit;
//        if (isset($_POST['importSubmit'])) {
//
//            //validate whether uploaded file is a csv file
//            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
//            if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
//                if (is_uploaded_file($_FILES['file']['tmp_name'])) {
//
//                    //open uploaded csv file with read only mode
//                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
//
//                    //skip first line
//                    fgetcsv($csvFile);
//
//                    // while(($line = fgetcsv($csvFile, 10, ",")) !== FALSE){
//                    while (($line = fgetcsv($csvFile)) !== FALSE) {
//                        $num = count($line);
//                        echo $num;
//                        die();
//                        //check whether member already exists in database with same email
//                        // $prevQuery = "SELECT id FROM members WHERE email = '".$line[1]."'";
//                        $prevQuery = $this->db->get_where('user', array('user_email' => $line[4]))->row()->user_id;
//
//
//                        if (count($prevResult) > 0) {
//
//                            // $db->query("UPDATE members SET name = '".$line[0]."', phone = '".$line[2]."', created = '".$line[3]."', modified = '".$line[3]."', status = '".$line[4]."' WHERE email = '".$line[1]."'");
//                        } else {
//                            //insert member data into database
//                            $data = array(
//                                'first_name' => trim($line[2]),
//                                'last_name' => trim($line[3]),
//                                'user_email' => trim($line[4]),
//                                'user_password' => md5($line[5]),
//                                'user_dob' => date('y-m-d', strtotime($line[6])),
//                                // 'user_image' => $line[6],
//                                'user_gender' => trim($line[8]),
//                                'user_agree' => trim($line[9]),
//                                'is_delete' => trim($line[10]),
//                                'status' => trim($line[11]),
//                                'created_date' => date('Y-m-d h:i:s', time()),
//                                'modified_date' => date('Y-m-d h:i:s', time()),
//                                'edit_ip' => trim($line[14]),
//                                'verify_date' => date('Y-m-d h:i:s', time()),
//                                'user_verify' => trim($line[16]),
////                            'profile_background' =>$line[16],
////                            'profile_background_main' =>$line[17],
////                            'fb_id' =>$line[18],
//                                'user_slider' => trim($line[20]),
//                                'password_code' => trim($line[21])
//                            );
//
//                            $insert_id = $this->common->insert_data($data, 'user');
//
//                            if ($insert_id) {
//                                echo "hh";
//                            } else {
//                                echo "ss";
//                            }
//
//                            // $db->query("INSERT INTO members (name, email, phone, created, modified, status) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[3]."','".$line[4]."')");
//                        }
//                    }
//                    //close opened csv file
//                    fclose($csvFile);
//                    redirect('csv_file/index', refresh);
//                    // $qstring = '?status=succ';
//                } else {
//                    $qstring = '?status=err';
//                }
//            } else {
//                $qstring = '?status=invalid_file';
//            }
//        }
    }

}

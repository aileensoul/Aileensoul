<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bid_package extends MY_Controller {

    public $data;

    public function __construct() {

       parent::__construct();
        
        include('include.php');
    }

    //add bid_package detail
    public function add() {

        if ($this->input->post('submit') == 'send') {

            $package = $this->input->post('package');
            $error = '';
            if ($this->input->post('package') == '') {
                $error = 1;
                $this->session->set_flashdata('error', 'Package coins is required');
                redirect('bid_package', 'refresh');
            }
            if ($this->input->post('price') == '') {
                $error = 1;
                $this->session->set_flashdata('error', 'Package price is required');
                redirect('bid_package', 'refresh');
            }
            if ($error == 1) {
                $this->session->set_flashdata('error', 'Something error!');
                redirect('bid_package', 'refresh');
            }  else {
                $insert_array = array(
                    'package' => trim($this->input->post('package')),
                    'price' => trim($this->input->post('price')),
                    'create_date' => date('Y-m-d H:i:s'),
                    'modify_date' => date('Y-m-d H:i:s'),
                    'status' => 1
                );
                $insert_id = $this->common->insert_data_getid($insert_array, 'bid_package');

                if ($insert_id) {
                    $this->session->set_flashdata('success', 'Bid package successfully inserted.');
                    redirect('bid_package', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Error Occurred. Try Again!');
                    redirect('bid_package', 'refresh');
                }
            }
        }
    }

    //update the bid_package detail
    public function edit() {

        if ($this->input->post('package_id')) {

            $bid_package_id = $this->input->post('package_id');
            $error = '';
            if ($this->input->post('package') == '') {
                $error = 1;
                $this->session->set_flashdata('error', 'Package coins is required');
                redirect('bid_package', 'refresh');
            }
            if ($this->input->post('price') == '') {
                $error = 1;
                $this->session->set_flashdata('error', 'Package price is required');
                redirect('bid_package', 'refresh');
            }
            if ($error == 1) {
                $this->session->set_flashdata('error', 'Something error!');
                redirect('bid_package', 'refresh');
            } else {
                $update_array = array(
                    'package' => trim($this->input->post('package')),
                    'price' => trim($this->input->post('price')),
                    'modify_date' => date('Y-m-d H:i:s')
                );
                
                $update_result = $this->common->update_data($update_array, 'bid_package', 'package_id', $this->input->post('package_id'));

                if ($update_result) {
                    $this->session->set_flashdata('success', 'Bid package successfully updated.');
                    redirect('bid_package', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Error Occurred. Try Again!');
                    redirect('bid_package', 'refresh');
                }
            }
        }
    }

    // get name by id

    function getPackageData() {
        if ($this->input->post('package_id')) {
            $bid_package_id = $this->input->post('package_id');
            $contition_array = array('package_id' => $bid_package_id);
            $data = 'package,price';
            $package_data = $this->common->select_data_by_condition('bid_package', $contition_array, $data, $short_by = '', $order_by = '', $limit = '', $offset = '');

            $return_data = array();
            $return_data['package'] = $package_data[0]['package'];
            $return_data['price'] = $package_data[0]['price'];
            header('Content-Type: application/json');
            echo json_encode($return_data);
            exit;
        }
    }

    function change_status($id, $status) {
        if ($status == 1) {
            $update_status = 2;
        } else {
            $update_status = 1;
        }
        $update_array = array(
            'status' => $update_status,
            'modify_date' => date('Y-m-d H:i:s')
        );
        $update_result = $this->common->update_data($update_array, 'bid_package', 'package_id', $id);

        if ($update_result) {
            $this->session->set_flashdata('success', 'Bid package status updated');
            redirect('bid_package', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Error Occurred. Try Again!');
            redirect('bid_package', 'refresh');
        }
    }

    function delete($id) {

        $update_array = array(
            'status' => 3
        );
        $update_result = $this->common->update_data($update_array, 'bid_package', 'package_id', $id);

        if ($update_result) {
            $this->session->set_flashdata('success', 'Bid package sucessfully deleted');
            redirect('bid_package', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Error Occurred. Try Again!');
            redirect('bid_package', 'refresh');
        }
    }

}

?>
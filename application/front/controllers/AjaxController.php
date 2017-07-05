<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxController extends CI_Controller {

    private $perPage = 10;

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index() {
        $this->load->database();
        $count = $this->db->get('posts')->num_rows();
        if (!empty($this->input->get("page"))) {
            $this->input->get("page");
        
            $start = ceil($this->input->get("page") * $this->perPage);
            
//            $query = $this->db->limit($start, $this->perPage)->get("posts1");
            $query = $this->db->limit($this->perPage, $start)->get("posts");
            $data['posts'] = $query->result();

            $result = $this->load->view('data', $data);
            echo json_encode($result);
        } else {
            //$query = $this->db->limit(10, $this->perPage)->get("posts");
            $query = $this->db->limit(10, 0)->get("posts");
            $data['posts'] = $query->result();
            $this->load->view('myPost', $data);
        }
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Chat_model');
        $this->load->model('common');
    }

<<<<<<< HEAD
    public function send_message($id = '') {
      
    
        $userid = $this->session->userdata('aileenuser');
=======
    public function send_message($id = '', $message_from_profile = '', $message_from_profile_id = '', $message_to_profile = '', $message_to_profile_id = '') {

        $userid = $this->session->userdata('aileenuser');
        
>>>>>>> 43f5bd8734da22f769265d515dae4d77261a1429
        $message = $this->input->get('message', null);
        //$message = $this->common->make_links($message);
        $message = str_replace('"','',$message); 
        $nickname = $this->input->get('nickname', '');
        $guid = $this->input->get('guid', '');
        $type = $this->input->get('type', '');
        $login = $this->input->get('login', '');

<<<<<<< HEAD
        $this->Chat_model->add_message($message,$nickname, $guid, $userid, $id,$type, $login);
=======
        $this->Chat_model->add_message($message, $nickname, $guid, $userid, $id, $message_from_profile, $message_from_profile_id, $message_to_profile, $message_to_profile_id);
>>>>>>> 43f5bd8734da22f769265d515dae4d77261a1429
        $this->_setOutput($message);
    }

    public function get_messages($id ='', $message_from_profile='', $message_to_profile ='') {
        $userid = $this->session->userdata('aileenuser');

        $timestamp = $this->input->get('timestamp', null);
        $login = $this->input->get('login', null);

<<<<<<< HEAD
        $messages = $this->Chat_model->get_messages($timestamp, $userid, $id,$login);
=======
        $messages = $this->Chat_model->get_messages($timestamp, $userid, $id, $message_from_profile, $message_to_profile);
>>>>>>> 43f5bd8734da22f769265d515dae4d77261a1429
        $i = 0;
        foreach ($messages as $mes) {
            if (preg_match('/<img/', $mes['message'])) {
                $messages[$i]['message'] = $mes['message'];
            } else {
                $messages_new = $this->common->make_links($mes['message']);
                $messages[$i]['message'] =nl2br(htmlspecialchars_decode(htmlentities($messages_new, ENT_QUOTES, 'UTF-8')));
            }
            $i++;
        }
        
        $this->_setOutput($messages);
    }

    private function _setOutput($data) {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        echo json_encode($data);
    }

}

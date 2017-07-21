<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Chat_model');
        $this->load->model('common');
    }

    public function send_message($id = '', $message_from_profile = '', $message_from_profile_id = '', $message_to_profile = '', $message_to_profile_id = '') {

        $userid = $this->session->userdata('aileenuser');

        $message = $this->input->get('message', null);
        //$message = $this->common->make_links($message);
        $message = str_replace('"', '', $message);
        $nickname = $this->input->get('nickname', '');
        $guid = $this->input->get('guid', '');

        $this->Chat_model->add_message($message, $nickname, $guid, $userid, $id, $message_from_profile, $message_from_profile_id, $message_to_profile, $message_to_profile_id);
        $this->_setOutput($message);
    }

    public function get_messages($id = '', $message_from_profile = '', $message_to_profile = '',$message_from_profile_id = '', $message_to_profile_id = '') {
        $userid = $this->session->userdata('aileenuser');

        $timestamp = $this->input->get('timestamp', null);

        $messages = $this->Chat_model->get_messages($timestamp, $userid, $id, $message_from_profile, $message_to_profile, $message_from_profile_id, $message_to_profile_id);
        $i = 0;
        foreach ($messages as $mes) {
            if (preg_match('/<img/', $mes['message'])) {
                $messages[$i]['message'] = str_replace("\\", "", $mes['message']);
            } else {
                $messages_new = $this->common->make_links($mes['message']);
                $messages[$i]['message'] = nl2br(htmlspecialchars_decode(htmlentities($messages_new, ENT_QUOTES, 'UTF-8')));
            }
            $i++;
        }

        $this->_setOutput($messages);
    }
    
    public function delete_messages($message_from_profile = '', $message_to_profile = '',$message_for = '', $message_id = '') {
        $userid = $this->session->userdata('aileenuser');

        $timestamp = $this->input->get('timestamp', null);

        $messages = $this->Chat_model->get_messages($timestamp, $userid, $id, $message_from_profile, $message_to_profile, $message_from_profile_id, $message_to_profile_id);
        $i = 0;
        foreach ($messages as $mes) {
            if (preg_match('/<img/', $mes['message'])) {
                $messages[$i]['message'] = str_replace("\\", "", $mes['message']);
            } else {
                $messages_new = $this->common->make_links($mes['message']);
                $messages[$i]['message'] = nl2br(htmlspecialchars_decode(htmlentities($messages_new, ENT_QUOTES, 'UTF-8')));
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

<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends MY_Controller {

    public $data;

    public function __construct() {

         parent::__construct();
        
        include('include.php');
    }

    public function index() {
     
        $this->load->view('setting/index');
    }

    public function editform() {
        if ($this->input->is_ajax_request() && $this->input->post('setting_id')) {
            $setting_id = ($this->input->post('setting_id'));

            $setting_id = $setting_id;
            $setting_detail = $this->settings->getSettingById($setting_id);

            //create html of edit form
            $editform = '';
            $editform.='<div class="modal-header" id="model_header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3 id="setting_title">' . $setting_detail[0]['setting_name'] . '</h3>
                </div><div class="modal-body" style="height: 100px;">';
            $editform.='<form class="form_textarea" id="editform" method="post" action="setting/update">';
            $editform.='<div style="display:none;"><input name="' . $this->security->get_csrf_token_name() . '" value="' . $this->security->get_csrf_hash() . '" /></div>';
            $editform.='<input type="hidden" id="setting_edit" name="setting_edit" value="' . ($setting_detail[0]['setting_id']) . '" />';
            $editform.='<div class="col-sm-9 col-md-9 col-lg-10">';
			if($setting_id==11)
			{
				$editform.='<textarea class="form-control " rows="2" id="setting_val" name="setting_val">' . stripslashes($setting_detail[0]['setting_value']) . '</textarea>';
			}
			else
			{
				$editform.='<input class="form-control" type="text" id="setting_val" name="setting_val" value="' . $setting_detail[0]['setting_value'] . '"/>';
			}
            
            $editform.='</div><input class="btn btn-success" onclick="validate_submit(event);" type="submit" id="btn_save" name="btn_save" value="Save" />';
            $editform.='<div class="help-inline" style="color:#f00;display:none;" id="email_err">Please Enter Valied Email Id.</div>
            <div class="help-inline" style="color:#f00;display:none;" id="url_err">Please Enter Valied url.</div>
                            <div class="help-inline" style="color:#f00;display:none;" id="numeric_err">Only Numeric(and +,-) Value Allowed.</div>
                            <div class="help-inline" style="color:#f00;display:none;" id="owner_err">Only alphabets and Space Value Allowed.</div>
                            <div class="help-inline" style="color:#f00;display:none;" id="numeric_len_err">Not more than 16 number.</div>
                            <div class="help-inline" style="color:#f00;display:none;" id="url_err">Please Enter Valied url.</div>
                           ';

            $editform.='<div style="display:none; color:#f00;" id="errorMsg">Please enter ' . $setting_detail[0]['setting_name'] . '</div>';

            $editform.='</form></div>';
           

            //  $editform.='<script><script>';

            echo $editform;
            die();
        } else {
            redirect('login', 'refresh');
        }
    }

    public function update() {
        if ($this->input->post()) {
            $setting_id = $this->input->post('setting_edit');
            if($setting_id==11){
                $setting_val = addslashes($this->input->post('setting_val'));
            }else{
                $setting_val = $this->input->post('setting_val');
            }

            $setting_id = ($setting_id);

            $this->load->model('settings');
            $settingdetail = $this->settings->getSettingById($setting_id);

            $setting_array = array('setting_value' => $setting_val);
            $update_result = $this->settings->update_setting($setting_id, $setting_array);

            if ($update_result == 1) {
                $this->session->set_flashdata('success', $settingdetail[0]['setting_name'] . ' Updated Successfully.');
                redirect('setting', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Error Occurred. Try Again.');
                redirect('dashboard', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Error Occurred. Try Again.');
            redirect('login', 'refresh');
        }
    }

}



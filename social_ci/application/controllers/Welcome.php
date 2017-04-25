<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
		$this->load->library('facebook');
	}

	public function index()
	{ //echo site_url('welcome/flogin'); die();
		$this->data['login_url'] = $this->facebook->getLoginUrl(array('redirect_uri' => base_url('welcome/flogin'), 

			'scope' => array("email")));
			$this->load->view('login',$this->data);
	}

	public function flogin()
	{ 
	    $user = "";
	//echo  
	   $userId = $this->facebook->getUser(); 
        if ($userId) {

            $token =  $this->facebook->getAccessToken();
           // echo  $tok = $this->session->userdata('fb_733552333461096_access_token'); die();
            try { 
            // echo '<pre>'; print_r($this->session->userdata('fb_733552333461096_access_token')); die();
                $user = $this->facebook->api('/me?fields=id,first_name,friends,last_name,email,link,gender,locale,picture');
            $friend = $this->facebook->api('/me/taggable_friends?limit=118');
             //$friends = $this->facebook->api('/me/friends');
            //$friend = $this->facebook->api('https://graph.facebook.com/v1.0/me/taggable_friends?access_token=' . $token);
             
              //   echo '<pre>'; print_r($friend); die();
            } catch (FacebookApiException $e) {
                $user = "";
            }
        }
        else {
            echo 'Please try again.'; exit;
        }
        if($user!="") :
           echo '<pre>'; print_r($user); exit;	
           //Write here login script	
        else :
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => base_url('welcome/flogin'), 
                'scope' => array("email"."user_friend") // permissions here
            ));
        endif;
        
    }
}

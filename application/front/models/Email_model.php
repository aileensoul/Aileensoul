<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

    
	
 	function sendEmail($app_name = '', $app_email = '', $to_email = '', $subject = '', $mail_body = '', $cc = '', $bcc = '') {


         //Loading E-mail Class
         $this->load->library('email');

         $emailsetting = $this->common->select_data_by_condition('email_settings', array(), '*');

         $mail_html = '<table width="100%" cellspacing="10" cellpadding="10" style="background:#f1f1f1;" style="border:2px solid #ccc;" >
     <tr>
 	   <td valign="center"><img src="' . base_url('assets/img/logo.png') . '" alt="' . $this->data['main_site_name'] . '" style="margin:0px auto;display:block;width:150px;"/></td> 
 	</tr> 
 <tr>
 	<td>
		 
 		<table border="0" cellpadding="0" cellspacing="0" width="100%">
 			<p>
                             "' . $mail_body . '"
                         </p>
 		</table>
 	</td>
 </tr>
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
     
 			<tr>
 			<td style="font-family:Ubuntu, sans-serif;font-size:11px; padding-bottom:15px; padding-top:15px; border-top:1px solid #ccc;text-align:center;background:#eee;"> &copy; ' . date("Y") . ' <a href="' . $this->data['main_site_url'] . '" style="color:#268bb9;text-decoration:none;"> ' . $this->data['main_site_name'] . '</a></td>
 			</tr>
 </table> 
 </table>';

         //Loading E-mail Class
         $config['protocol'] = "smtp";
         $config['smtp_host'] = $emailsetting[0]['host_name'];
         $config['smtp_port'] = $emailsetting[0]['out_going_port'];
         $config['smtp_user'] = $emailsetting[0]['user_name'];
         $config['smtp_pass'] = $emailsetting[0]['password'];
         $config['smtp_rec_email'] = $emailsetting[0]['receiver_email'];
         $config['charset'] = "utf-8";
         $config['mailtype'] = "html";
         $config['newline'] = "\r\n";

         $this->email->initialize($config);
         $this->email->from($config['smtp_user'], $app_name);
          $this->email->cc($cc);
         $this->email->bcc($bcc);
        //    $this->email->cc($cc);

         $this->email->subject($subject);
         $this->email->message(html_entity_decode($mail_body));

         if ($this->email->send()) {
             return true;
         } else {
             return FALSE;
        }
    }


    function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL, $attachment_url=NULL)
    { 
         //echo $msg; echo "<br/>";
               //   echo $sub;  echo "<br/>";
               //   echo $to; echo "<br/>";
               //   echo $from; die();
       $this->load->library('email');
        $config['protocol'] = "SMTP";
        $config['smtp_host'] = "SMTP.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "aileensoftsolution@gmail.com";
        $config['smtp_pass'] = "xyz123456";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        // $system_name    =   $this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
        // if ($from == NULL)
        //     $from       =   $this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;
        $system_name ="aileensoul";
        // attachment
        //if ($attachment_url != NULL)
        //  $this->email->attach( $attachment_url );
            
         $this->email->from('aileensoul@gmail.com', 'Aileensoul');
        $this->email->to($to);
        $this->email->reply_to('no-replay@aileensoul.com', 'Explendid Videos');
        $this->email->subject($sub);
        $this->email->message($msg);
        $this->email->send();
   
        //echo $this->email->print_debugger(); die();
    }
    

}


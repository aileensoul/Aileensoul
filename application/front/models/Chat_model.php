<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Chat_model extends CI_Model {  
  
<<<<<<< HEAD
	function add_message($message,$nickname,$guid,$userid,$id,$type,$login)
	{ 
=======
	function add_message($message, $nickname, $guid,$userid,$id, $message_from_profile, $message_from_profile_id, $message_to_profile, $message_to_profile_id)
	{
>>>>>>> 43f5bd8734da22f769265d515dae4d77261a1429
                date_default_timezone_set('Asia/Calcutta');
		$data1 = array(
			'message'	=> (string) $message,
			'nickname'	=> (string) $nickname,
			'message_from'	=> (string) $login,
			'message_from_profile'	=> (string) $type,
			'message_to'	=> (string) $id,
			'message_from_profile'	=> (int) $message_from_profile,
			'message_from_profile_id'	=> (int) $message_from_profile_id,
			'message_to_profile'	=> (int) $message_to_profile,
			'message_to_profile_id'	=> (int) $message_to_profile_id,
			'guid'		=> (string) $guid,
			'timestamp'	=> time(),
		);
		
		$this->db->insert('messages', $data1);
                $msg_insert_id = $this->db->insert_id();
               
                $data2 = array(
			'not_type'	=> 2,
			'not_from_id'	=> $userid,
			'not_to_id'	=> $id,
                        'not_read' => 2,
                        'not_img' => 0,                       
                        'not_active' => 1,
                        'not_product_id' => $msg_insert_id,
                        'not_created_date' => date('Y-m-d H:i:s'),
			
		);
		  
		$this->db->insert('notification', $data2);
	}
 
<<<<<<< HEAD
	function get_messages($timestamp,$userid,$id,$login)
=======
	function get_messages($timestamp,$userid,$id,$message_from_profile,$message_to_profile)
>>>>>>> 43f5bd8734da22f769265d515dae4d77261a1429
	{ 

	// khyati start 
        
       $this->db->where('timestamp >', $timestamp);
<<<<<<< HEAD
       $where = '((message_from="' . $login . '"AND message_to ="' . $id . '") OR (message_to="' . $login . '" AND message_from ="' . $id . '"))';
=======
       $where = '((message_from="' . $userid . '"AND message_to ="' . $id . '") OR (message_to="' . $userid . '" AND message_from ="' . $id . '")) AND message_from_profile = "'.$message_from_profile.'" AND message_to_profile ="'.$message_to_profile.'" ';
>>>>>>> 43f5bd8734da22f769265d515dae4d77261a1429
       $this->db->where($where);

		// khyati end
		
		//$this->db->where('message_from', $userid);
		//$this->db->where('message_to', $id);
		$this->db->order_by('timestamp', 'DESC');
	//	$this->db->limit(10); 
		$query = $this->db->get('messages');
		//echo $this->db->last_query(); die();
		return array_reverse($query->result_array());
	}
 
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Chat_model extends CI_Model {  
  
	function add_message($message, $nickname, $guid,$userid,$id)
	{
		$data = array(
			'message'	=> (string) $message,
			'nickname'	=> (string) $nickname,
			'message_from'	=> (string) $userid,
			'message_to'	=> (string) $id,
			'guid'		=> (string)	$guid,
			'timestamp'	=> time(),
		);
		  
		$this->db->insert('messages', $data);
	}
 
	function get_messages($timestamp,$userid,$id)
	{ 

	// khyati start 
        
       $this->db->where('timestamp >', $timestamp);
       $where = '((message_from="' . $userid . '"AND message_to ="' . $id . '") OR (message_to="' . $userid . '" AND message_from ="' . $id . '"))';
       $this->db->where($where);

		// khyati end
		
		//$this->db->where('message_from', $userid);
		//$this->db->where('message_to', $id);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(10); 
		$query = $this->db->get('messages');
		//echo $this->db->last_query(); die();
		return array_reverse($query->result_array());
	}
 
}
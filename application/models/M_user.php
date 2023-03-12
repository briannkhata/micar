<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_user extends CI_Model {
    function get_users(){
        $this->db->where('deleted',0);
        $this->db->where('user_id !=',$this->session->userdata('user_id'));
        $this->db->order_by('user_id','DESC');
        $query = $this->db->get('tblusers');
        return $query->result_array();
    }

    function get_users_by_account_type(){
        $this->db->where('deleted',0);
        $this->db->where('user_id !=',$this->session->userdata('user_id'));
        $this->db->where('role','user');
        $query = $this->db->get('users');
        return $query->result_array();
    }

    function get_admins(){
        $this->db->where('deleted',0);
        $this->db->where('user_id !=',$this->session->userdata('user_id'));
        $this->db->where('role','admin');
        $query = $this->db->get('tblusers');
        return $query->result_array();
    }

    function get_sellers(){
        $this->db->where('deleted',0);
        $this->db->where('role','seller');
        $query = $this->db->get('tblusers');
        return $query->result_array();
    }

    function get_phone($user_id){
        $this->db->where('user_id',$user_id);
     $query = $this->db->get('tblusers')->result_array();
     if(count($query) > 0){
         foreach ($query as $row) {
             return $row['phone'];
         }
     }else {
         return '';
     }
 }

 function get_email($user_id){
    $this->db->where('user_id',$user_id);
 $query = $this->db->get('tblusers')->result_array();
 if(count($query) > 0){
     foreach ($query as $row) {
         return $row['email'];
     }
 }else {
     return '';
 }
}


















function get_photo($user_id){
    $this->db->where('user_id',$user_id);
    $query = $this->db->get('tblusers')->result_array();
    if(count($query) > 0){
        foreach ($query as $row) {
            return $row['photo'];
        }
    }else {
        return '';
    }
}




    

    function get_my_subscriptions($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->order_by('user_id','ASC');
        $query = $this->db->get('tblactivations');
        return $query->result_array();
    }

    function get_mychats(){
        $this->db->where('to',$this->session->userdata('user_id'));
        $this->db->group_by('from');
        $this->db->order_by('sent','Desc');
        $query = $this->db->get('tblchats');
        return $query->result_array();
    }

    function get_user_photos($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->order_by('photo_id','Desc');
        $query = $this->db->get('tblphotos');
        return $query->result_array();
    }

    function get_user_chats($to,$from){
        $query = $this->db->query("SELECT * FROM tblchats WHERE (`from` = '".$from."' AND `to` = '".$to."') OR (`from` = '".$to."' AND `to` = '".$from."') ORDER BY chat_id  ");
        return $query->result_array();
    }

    function get_charts_realtime($to,$from){
        $query = $this->db->query("SELECT * FROM tblchats WHERE (`from` = '".$from."' AND `to` = '".$to."') OR (`from` = '".$to."' AND `to` = '".$from."') ORDER BY chat_id  ");
        return $query->result_array();
    }

	function get_my_photos($user_id){
        $this->db->where('user_id =',$user_id);
        $query = $this->db->get('tblphotos');
        return $query->result_array();
    }


    function get_user_by_id($user_id){
	    $this->db->where('user_id',$user_id);
		$query = $this->db->get('tblusers');
		return $query->result_array();
	}

    function get_user_likes($user_id){
        $this->db->where('liked',$user_id);
        $query = $this->db->get('tbllikes');
        return $query->result_array();
    }

    function get_name($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('tblusers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['name'];
				}
			}else {
				return '';
			}
        }

    function get_setonline_status_to_on($user_id){
        $data['online'] = 1;
        $this->db->where('user_id',$user_id);
        $this->db->update('tblusers',$data);
        return;
    }

    function get_setonline_status_to_off($user_id){
        $data['online'] = 0;
        $this->db->where('user_id',$user_id);
        $this->db->update('tblusers',$data);
        return;
    }
    function get_online_status($user_id){
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('tblusers')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['online'];
            }
        }else {
            return '';
        }
    }


		function getLogin($username,$password){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$this->db->where('deleted',0);
			return $query = $this->db->get()->result_array();
		}

		function check_username($username){
			$this->db->where('username',$username);
			$query=$this->db->get('users');
			if($query->num_rows()>0)
			{
				return 1;	
			}
			else
			{
				return 0;	
			}
    	}	
   

 
}
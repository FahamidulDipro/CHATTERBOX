<?php
    class Chat_model extends CI_model{
        public function add_user($array){
            if($this->db->insert('users',$array)){
                return true;
            } else{
                return false;
            }
        }
    }
?>
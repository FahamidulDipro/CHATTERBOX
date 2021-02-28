<?php
    class Chat_model extends CI_model{
        public function add_user($array){
            if($this->db->insert('users',$array)){
                return true;
            } else{
                return false;
            }
        }
        public function login_check($loginData){
            $q = $this->db->where(['uname'=>$loginData['uname'],'passwd'=>$loginData['passwd']])
                            ->get('users');
            // echo "<pre>";
            // print_r($q->row()->id);   
            if($q->num_rows()){
                // return true;
                return $q->row()->id; 
            }   else{
                return false;
            }          
        }

        public function user_select($id){
            $q = $this->db->select('*')
                            ->where(['id'=>$id])
                            ->get('users');

                      return $q->row();      
        }
    }
?>
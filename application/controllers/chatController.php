<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class chatController extends CI_Controller{
        public function showPage(){
            $this->load->view('chatPage');
        }
    }
?>
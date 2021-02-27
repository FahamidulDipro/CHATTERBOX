<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Chat_controller extends CI_Controller
{
    public function index()
    {
        $this->load->view('loginPage');
    }
    public function login()
    {
        if ($this->form_validation->run('add_login_rule')) {
            $this->load->view('chatPage');
            echo "<div class='alert alert-success'><b>Login Successful</b></div>";
        } else {
            $this->load->view('loginPage');
        }
    }
    public function registration()
    {
        $this->load->view('signupPage');
    }
    public function signup()
    {
        if ($this->form_validation->run('add_user_rule')) {
            $data = $this->input->post();
            $this->load->model('Chat_model');
            if ($this->Chat_model->add_user($data)) {
                echo '<div class="alert alert-success"><b>User added successfully!</b></div>';
            } else {
                echo '<div class="alert alert-danger"><b>User cannot be added</b></div>';
            }

            $this->load->view('loginPage', $data);
        } else {
            $this->load->view('signupPage');
        }
    }


    // public function formValidation(){
    //     if($this->form_validation->run('add_user_rule')){
    //         echo "OK";
    //     }
    //     else{
    //         $this->load->view('signupPage');
    //     }

    // }
}
?>
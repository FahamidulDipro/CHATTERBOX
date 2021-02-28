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
            $loginData = $this->input->post();
            $this->load->model('Chat_model');
            $id=$this->Chat_model->login_check($loginData);
            if($id){
                $this->load->library('session');
                $this->session->set_userdata('id',$id);
                $userData['user_data']=$this->Chat_model->user_select($id);
                $this->load->view('chatPage',$userData);
                echo "<div class='alert alert-success'><b>Login Successful</b></div>";
            }else{
                echo "<div class='alert alert-danger'><b>Login Failed! Incorrect Username or Password</b></div>";
                $this->load->view('loginPage');
            }
          
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
        $config =[
            'upload_path'=>'./upload/',
            'allowed_types'=>'gif|jpg|jpeg|png'
        ];
        $this->load->library('upload',$config);
        if ($this->form_validation->run('add_user_rule')&& $this->upload->do_upload()) {
            $data = $this->input->post();
            $upload_data = $this->upload->data();
            $image_path = base_url('upload/'.$upload_data['raw_name'].$upload_data['file_ext']);
            $data['pic']=$image_path;
            $this->load->model('Chat_model');
            if ($this->Chat_model->add_user($data)) {
                echo '<div class="alert alert-success"><b>User added successfully!</b></div>';
            } else {
                echo '<div class="alert alert-danger"><b>User cannot be added</b></div>';
            }

            $this->load->view('loginPage', $data);
        } else {
            $upload_error = $this->upload->display_errors();
            $this->load->view('signupPage',compact('upload_error'));
        }
    }

    // public function welcome(){
    //     $this->load->model('Chat_model');
    //     $this->Chat_model->
    //     if(!$this->session->userdata('id')){
    //         return redirect('Chat_controller/login');
    //     }else{
    //         $this->load->view('chatPage');
    //     }
    // }
}
?>
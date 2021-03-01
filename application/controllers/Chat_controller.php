<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Chat_controller extends CI_Controller
{

// Default loginPage is shown
    public function index()
    {
        $this->load->view('loginPage');
    }

    // Handling login
    public function login()
    {
        if ($this->form_validation->run('add_login_rule')) {
            $loginData = $this->input->post();
            $this->load->model('Chat_model');
            $id = $this->Chat_model->login_check($loginData);
            if ($id) {
                $this->session->set_userdata('id', $id);
                $userData['user_data'] = $this->Chat_model->user_select($id);
                $this->load->view('chatPage', $userData);
            } else {
                echo "<div class='alert alert-danger'><b>Login Failed! Incorrect Username or Password</b></div>";
                $this->load->view('loginPage');
            }
        } else {
            $this->load->view('loginPage');
        }
    }

    // Redirecting to signupPage
    public function registration()
    {
        $this->load->view('signupPage');
    }

// Handling Signup
    public function signup()
    {
        $config = [
            'upload_path' => './upload/',
            'allowed_types' => 'gif|jpg|jpeg|png|webp'
        ];
        $this->load->library('upload', $config);
        if ($this->form_validation->run('add_user_rule') && $this->upload->do_upload()) {
            $data = $this->input->post();
            $upload_data = $this->upload->data();
            $image_path = base_url('upload/' . $upload_data['raw_name'] . $upload_data['file_ext']);
            $data['pic'] = $image_path;
            $this->load->model('Chat_model');
            if ($this->Chat_model->add_user($data)) {
                echo '<div class="alert alert-success"><b>User added successfully!</b></div>';
            } else {
                echo '<div class="alert alert-danger"><b>User cannot be added</b></div>';
            }

            $this->load->view('loginPage', $data);
        } else {
            $upload_error = $this->upload->display_errors();
            $this->load->view('signupPage', compact('upload_error'));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        return redirect('Chat_controller/login');
    }



    public function add_chat(){
       $chat=$this->input->post();
    //    print_r($chat);
       if($this->form_validation->run('add_chat_rule')){
           $this->load->model('Chat_model');
           $this->Chat_model->addChat($chat);
           $sc['show_chat']=$this->Chat_model->showChat();
        //    print_r($sc);
        //    return redirect('chatPage');
        //    $c['sh_ch'] = $this->Chat_model->showChat()
        $this->load->view('chatPage',$sc);
       }
    // 

    }
}
?>
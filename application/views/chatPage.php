<?php
    include "header.php";
?>
    <div class="container mt-3">
    <?php
        if($id=$this->session->userdata('id')){
        //    echo '    <h1>Hey<span class="text-info mx-2"><img src="'.$user_data->pic.'"style="height:50px;width:50px;border-radius:50%;object-fit:cover;margin-right:10px;">'.$user_data->uname.'</span>Welcome to CHATTERBOX</h1>';
            print_r($id);
        }
        // if(isset($user_chat)){
        //     print_r($user_chat);
        // }
    //    print_r($sh_ch);
        foreach ($show_chat as $shc){
            echo $shc->chat.'<br>'.'at '.$shc->date.'<br>';
        }
        echo form_open('Chat_controller/add_chat');
        echo form_textarea(['class'=>'form-control','type'=>'text','placeholder'=>'Send Message','name'=>'chat']).'<br>';
        echo '<div class="text-danger">'.form_error('chat').'</div>';
        echo form_hidden('user_id',$this->session->userdata('id'));
        echo form_hidden('date',date('Y-m-d H:i:s'));
        echo form_submit(['class'=>'btn btn-success','type'=>'submit','value'=>'Send']);
        echo form_reset(['class'=>'btn btn-primary','value'=>'Reset']).'<br>';
       
    ?>

    </div>


<?php
    include "footer.php";
?>
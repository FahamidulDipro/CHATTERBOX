<?php
    include "header.php";
?>

<div class="container mt-3">
<h1 class="text-center my-3">Please Login to Chat</h1>
<?php
    // print_r($user_data);
    echo form_open('Chat_controller/login');
    echo form_input(['class'=>'form-control','type'=>'text','placeholder'=>'Enter Username','name'=>'uname']).'<br>';
    echo '<div class="text-danger">'.form_error('uname').'</div>';
    echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Password','name'=>'passwd']).'<br>';
    echo '<div class="text-danger">'.form_error('passwd').'</div>';
    echo form_submit(['class'=>'btn btn-success','type'=>'submit','value'=>'Login','name'=>'submit']);
      echo form_reset(['class'=>'btn btn-primary','value'=>'Reset']).'<br>';
    echo "<br>Don't have an account? ".'<a href="'.base_url('Chat_controller/registration').'">Sign UP</a>';
?>
    <!-- <a href="signupPage">Signup</a> -->

</div>


<?php
    include "footer.php";
?>
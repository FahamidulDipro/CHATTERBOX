<?php
    include "header.php";
?>

<div class="container mt-3">
<h1 class="text-center my-3">Please Create an Account</h1>
<?php
    echo form_open('Chat_controller/signup');
    echo form_input(['class'=>'form-control','type'=>'text','placeholder'=>'Enter Username','name'=>'uname']).'<br>';
    echo '<div class="text-danger">'.form_error('uname').'</div>';
    echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Password','name'=>'passwd']).'<br>';
    echo '<div class="text-danger">'.form_error('passwd').'</div>';
    echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Confirm Password','name'=>'cpasswd']).'<br>';
    echo '<div class="text-danger">'.form_error('cpasswd').'</div>';
    echo form_submit(['class'=>'btn btn-success','type'=>'submit','value'=>'Signup']);
    echo form_reset(['class'=>'btn btn-primary','value'=>'Reset']).'<br>';
    echo "<br>Already have an account? ".'<a href="'.base_url('Chat_controller/index').'">Login</a>';
    
?>

</div>


<?php
    include "footer.php";
?>
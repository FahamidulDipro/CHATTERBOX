<?php
    include "header.php";
?>
    <div class="container mt-3">
    <?php
        if($id=$this->session->userdata('id')){
           echo '    <h1>Hey<span class="text-info mx-2"><img src="'.$user_data->pic.'"style="height:50px;width:50px;border-radius:50%;object-fit:cover;margin-right:10px;">'.$user_data->uname.'</span>Welcome to CHATTERBOX</h1>';
        }
    ?>
    </div>


<?php
    include "footer.php";
?>
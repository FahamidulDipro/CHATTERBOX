<?php
    include "header.php";
?>
    <div class="container mt-3">
    <?php
        if($id=$this->session->userdata('id')){
           echo '    <h1>Hey<span class="text-info mx-2">'.$uname.'</span>Welcome to CHATTERBOX</h1>';
        }
    ?>
    </div>


<?php
    include "footer.php";
?>
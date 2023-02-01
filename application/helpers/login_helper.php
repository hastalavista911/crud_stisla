<?php
    function checkSessionUser(){
        $CI =& get_instance();
        if($CI->session->userdata("my_sess") == "Y"){
            // redirect("dashboard");
        } else {
            redirect(base_url());
        }
    }
?>
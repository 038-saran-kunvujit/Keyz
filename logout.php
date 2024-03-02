<?php 

    session_start();
    session_destroy();
    header("Location: frm_login.php");

?>
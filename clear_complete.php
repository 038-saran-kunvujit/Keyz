<?php 
    session_start();
    unset($_SESSION["complete"]);
    header("location:frm_add_box_slot.php")
?>
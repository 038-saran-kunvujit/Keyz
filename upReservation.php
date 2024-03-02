<?php 
        include('connect.php');
    if (isset($_POST['submit'])) {
        $sql = "UPDATE reserve SET 
        customer_name = '".$_POST['customer_name']."', 
        line_id = '".$_POST['line_id']."', 
        note = '".$_POST['note']."' 
        WHERE reserve_id = '".mysqli_real_escape_string($conn, $_POST['reserve_id'])."'";

        if (mysqli_query($conn, $sql)) {
            echo '<script> alert("แก้ไขข้อมูลเสร็จเรียบร้อย")</script>';
            header('Refresh:0; url= frmManageReserve.php');
        } else {
            echo '<script> alert("แก้ไขข้อมูลไม่สำเร็จ")</script>';
            header('Refresh:0; url= ../form-update.php');
        }
    }
    mysqli_close($conn);
?>

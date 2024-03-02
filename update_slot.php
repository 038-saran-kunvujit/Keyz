<?php 
       include('connect.php');
    if (isset($_POST['send'])) {
        $slot_id = mysqli_real_escape_string($conn, $_POST['slot_id']); 
        $sql = "UPDATE slot SET 
            room_number = '".$_POST['room_number']."',
            slot_number = '".$_POST['slot_number']."', 
            rfid_number = '".$_POST['rfid_number']."' 
            WHERE slot_id = '$slot_id'";
            
    //ตรวจสอบค่าว่าถูหต้องหรือไม่
    if (mysqli_query($conn, $sql)) {
        echo '<script> alert("บันทึกข้อมูลเรียบร้อย"); window.location.href = "frm_manageroom.php"; </script>';
    } else {
        echo '<script> alert("บันทึกข้อมูลไม่สำเร็จ"); window.location.href = "frm_manageroom.php"; </script>';
    }
}   
?>

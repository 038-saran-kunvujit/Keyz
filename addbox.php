
<?php
session_start();
include('connect.php');

$max_num_slot = 20;

if (isset($_POST['submit'])) {
    if (isset($_POST['apartment_name'], $_SESSION['username'])) {
        $apartment_name = $conn->real_escape_string($_POST['apartment_name']);
        $username = $conn->real_escape_string($_SESSION['username']);


        $sql = "INSERT INTO box(username, apartment_name) VALUES ('$username', '$apartment_name')";

        if ($conn->query($sql) === TRUE) {

           $sql ="SELECT *  FROM box WHERE username='". $_SESSION['username']. "' &&  apartment_name = '".$_POST['apartment_name']."'";
         
           if ($result = $conn->query($sql)) {
               while ($row = $result -> fetch_assoc()) {
               $box_id  = $row["box_id"];
              
               }
               $result -> free_result();
           }

           //เพิ่มรายการ slot ตาม max_num_slot ใส่เฉพาะ รหัสอพาร์ตเม้น และ สถานะคีย์การ์ด=ไม่อยู่
           $sql = "INSERT INTO slot ( box_id, card_status_id) VALUES ($box_id, 2)";

           // สร้างรายการห้อง 20 รายการ สำหรับใส่รายละเอียด ในตาราง slot
           for ($i = 0; $i < $max_num_slot; $i++) {
               $result = $conn->query($sql);
           }
            header('Refresh:0; url=frm_add_box_slot.php');
            $_SESSION["complete"] = "yes";
            $_SESSION["apartment_name"] = $apartment_name;
            $_SESSION["box_id"] = $box_id;    
        } else {
            echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script> " 
            . $conn->error;  
        } 
    }
}


?>
<?php
session_start();
include('connect.php');

$_SESSION['box_id'] = $_POST['box_id'];

$send = (isset($_POST['send']) ? $_POST['send'] : '');
include("gen_passcode.php");

if ($send == '') {
    // Do nothing
} else {
    $box_id = (isset($_POST['box_id']) ? $_POST['box_id'] : '');
    $slot_id = (isset($_POST['slot_id']) ? $_POST['slot_id'] : '');
    $room_number = (isset($_POST['room_number']) ? $_POST['room_number'] : '');
    $name = (isset($_POST['customer_name']) ? $_POST['customer_name'] : '');
    $lineid = (isset($_POST['line_id']) ? $_POST['line_id'] : '');
    $checkin = (isset($_POST['check_in']) ? formatDateTime($_POST['check_in']) : '');
    $checkout = (isset($_POST['check_out']) ? formatDateTime($_POST['check_out']) : '');
    $fee = (isset($_POST['fee']) ? $_POST['fee'] : '');
    $note = (isset($_POST['note']) ? $_POST['note'] : 0);
    $Code_key = gen_passcode();

    $status = '2'; // เพิ่มสถานะ



    $sql = "USE keyz";
    $conn->query($sql);

    $sql = "INSERT INTO reserve (`box_id`,`slot_id`,`room_number`,`customer_name`,`line_id`,`check_in`, `check_out`,`fee`,`note`,`Code_key`)VALUES('$box_id','$slot_id','$room_number','$name','$lineid','$checkin','$checkout','$fee','$note','$Code_key');"; // เพิ่ม $status ในคำสั่ง SQL

    if ($conn->query($sql) === TRUE) {
       
        sendLineNotification($lineid, $Code_key, $room_number);
        echo "<script>alert('จองห้องเรียบร้อย');</script> ";
        header('Refresh:0; url= search.php');
    } else {
        echo "<script>alert('ไม่สามารถจองห้องได้');</script> " . $conn->error;; 
    }

    $conn->close();
  
}

function formatDateTime($datetimeString) {
    $dateTime = DateTime::createFromFormat('Y-m-d H:i:s.u', $datetimeString);
    return $dateTime ? $dateTime->format('d-m-Y H:i:s') : $datetimeString;
}

function sendLineNotification($lineId, $codeKey, $room_number) {
    $accessToken = 'Y94ZzwQCtF8NVdsxi1G2X3Iz1PNhbfX3VDZBhXVsoKi'; // Replace with your Line Notify access token
    $message = "รหัสรับคีย์การ์ดของท่านคือ : $codeKey";
    $message .= " ห้องพักหมายเลข : $room_number";

    $url = 'https://notify-api.line.me/api/notify';
    $data = array('message' => $message);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\nAuthorization: Bearer $accessToken\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    // You can check $result for success or handle errors accordingly.
}
?>

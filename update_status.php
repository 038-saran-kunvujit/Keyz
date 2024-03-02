<?php

// กำหนดข้อมูลเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "keyz";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}


$sql = "SELECT check_out FROM reserve WHERE check_out ";

// ทำการทำงาน query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // ดึงข้อมูล check_out จากผลลัพธ์
    $row = $result->fetch_assoc();
    $check_out = $row["check_out"];

    // สร้าง SQL query เพื่ออัพเดต status เป็น 'ว่าง' ที่มี check_out น้อยกว่าหรือเท่ากับเวลาปัจจุบัน
    $update_sql = "UPDATE reserve SET status = 'ว่าง' WHERE check_out <= NOW()";

    // ทำการทำงาน query สำหรับการอัพเดต
    if ($conn->query($update_sql) === TRUE) {
        echo "อัพเดตสถานะเรียบร้อย";
    } else {
        echo "ผิดพลาดในการอัพเดต: " . $conn->error;
    }
} else {
    echo "ไม่พบข้อมูล check_out";
}

// ปิดการเชื่อมต่อ
$conn->close();

?>

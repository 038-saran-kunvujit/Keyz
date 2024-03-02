<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Code Key</title>
</head>
<body>
    <h2>Check Code Key</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="code_key">Enter Code Key:</label>
        <input type="text" id="code_key" name="code_key" required>
        <button type="submit" name="submit">Search</button>
    </form>

    <?php
    // เชื่อมต่อฐานข้อมูล
    include('connect.php');

    
    // ตรวจสอบการเชื่อมต่อ
    

    // รับค่า code key จาก form
    if(isset($_POST['submit'])) {
        $code_key = $_POST['code_key'];
        
        // สร้างคำสั่ง SQL
        $sql = "SELECT `box_id`, `slot_id` FROM `reserve` WHERE Code_key = '$code_key'";
        
        // ทำการ query ข้อมูล
        $result = $conn->query($sql);

        // ตรวจสอบผลลัพธ์
        if ($result->num_rows > 0) {
            // แสดงผลลัพธ์
            while($row = $result->fetch_assoc()) {
                echo $row["box_id"] ;
                echo $row["slot_id"];
                $slot_id = $row["slot_id"];
            }
            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }
        $sql = "UPDATE slot SET card_status_id = 1 WHERE slot_id = ".$slot_id."  ";
        $result = $conn->query($sql);
       
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
    ?>
</body>
</html>

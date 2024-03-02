<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Code Key</title>
</head>
<body>
    <h2>Return keycard</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="rfid">Enter rfid number:</label>
        <input type="text" id="rfid_number" name="rfid_number" required>
        <button type="submit" name="submit">Search</button>
    </form>

    <?php
    // เชื่อมต่อฐานข้อมูล
    include('connect.php');

    if(isset($_POST['submit'])) {
        $rfid_number = $_POST['rfid_number'];
     
        $sql = "UPDATE slot SET card_status_id = 2 WHERE rfid_number = ".$rfid_number."  ";
        $result = $conn->query($sql);
       
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
    ?>
</body>
</html>

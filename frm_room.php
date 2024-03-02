<?php 
    session_start();
    include('connect.php');
    
     if (!isset($_SESSION['username'])) {
         header('location: frm_login.php');
    }
    
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search room</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="website icon" type="png" href="img/logo.png">
</head>
<?php 
    require("menu.php"); 


?>
<body class="bg-cover bg-center h-screen bg-opacity-25" style="background-image:url(img/bg1.png);" >

 <!-- ฟอร์มค้นหา -->
  <!-- ------------------------------------------------------------------------------------------------- -->
  <div class="flex justify-center  bg-[#e0e0e0]">
  <form action="search.php" method="post"  >


    <label class="font-semibold ">อพาร์ตเมนท์ </label>
    <select name="box_id"  class="border border-gray-300 rounded-md  py-1 px-6  mr-5" required>
        <?php
            $sql = "SELECT apartment_name , box_id FROM box WHERE username = '".$_SESSION['username']."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['box_id'] . "'>" . $row['apartment_name'] . "</option>";
                   
                }
            }
           
        ?>
    </select>
    

    <label for="check_in" class="font-semibold ">เช็คอิน  </label>
    <input type="date" id="check_in" name="check_in" class="py-1 px-6  border border-gray-300 rounded-md mr-4" required>
    
    <label for="check_out" class="font-semibold ">เช็คเอาท์  </label>
    <input type="date" id="check_out" name="check_out" class="py-1 px-6  border border-gray-300 rounded-md mr-5" required>
    
    <button type="submit" class="mb-3 mt-2 inline-block  rounded  px-4 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
    style="background: linear-gradient(to right,  #FF0000, #1A1A1A, #1A1A1A, #FF0000)">ค้นหา</button>
  </form>
</div>

<div class="flex justify-center ">
<img src="img/logo.png" class="h-25 " alt="keyz Logo" />
</div>

    <?php


// รับค่าจากฟอร์ม
$checkInDate = isset($_POST['check_in']) ? $_POST['check_in'] : '';
$checkOutDate = isset($_POST['check_out']) ? $_POST['check_out'] : '';

// สร้างคำสั่ง SQL สำหรับค้นหาข้อมูล
$sql = "SELECT * FROM reserve WHERE check_in >= '$checkInDate' AND check_out <= '$checkOutDate'";

// ทำการ query ข้อมูล
$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลที่พบหรือไม่
if ($result->num_rows > 0) {
    // วนลูปแสดงผลข้อมูล
    while($row = $result->fetch_assoc()) { 
    }
}else{
    echo "";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
<!-- ---------------------------------------------------------------------------------------------- -->

</div>
<script>
    if ( window.history.replaceState ) {
	    window.history.replaceState( null, null, window.location.href );
    }
</script>




          
      
      
</body>

</html>
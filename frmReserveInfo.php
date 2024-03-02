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
<meta charset="utf-8">
<title>Reserve</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


<div class="flex justify-end">
<a href="search.php" class="mr-10 mt-10" style="font-size: 24px;"><i class="fa-solid fa-xmark"></i></a>
</div>
</head>
<body class="bg-cover bg-center h-screen bg-opacity-25" style="background-image:url(img/bg1.png);">

 <?php
$_SESSION["box_id"] = $_POST['box_id'];
$_SESSION["slot_id"] = $_POST['slot_id'];
$room_number = isset($_GET['room_number']) ? $_GET['room_number'] : '';

$room_number = isset($_POST['room_number']) ? $_POST['room_number'] : '';
$check_in = isset($_POST['check_in']) ? $_POST['check_in'] : '';
$check_out = isset($_POST['check_out']) ? $_POST['check_out'] : '';
$box_id = isset($_POST['box_id']) ? $_POST['box_id'] : '';
$slot_id = isset($_POST['slot_id']) ? $_POST['slot_id'] : '';
 ?>


<script>
function validateForm() {
  if (document.getElementById("line_id").value == "") {
    alert("กรุณากรอกไอดีไลน์");
    return false;
  } 
}
</script>



<div class="container mx-auto px-3 mt-2">

  <div class="text-4xl text-center font-semibold text-gray-900 dark:text-stone mt-10 ml-5 mb-10" style="text-shadow: 2px 2px 4px rgba(0, 0, 0.3, 0.3);">เพิ่มข้อมูลการจองห้อง</div>
  
    <div class="flex justify-center mx-auto">  
   <!-- form จร้าาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาา -->
        <form class=" w-700 md:w-1/2 bg-white border border-stone-500 rounded-lg  " method="post" action="InsReserveinfo.php" id="rerserve" onsubmit="return validateForm()" >
            <input type='hidden' name='reserve_id ' value=" . $row['reserve_id '] . ">

            <?php
            
              echo "<input type='hidden' name='room_number' value=".$room_number.">";
              echo "<input type='hidden' name='check_in' value=".$check_in.">";
              echo "<input type='hidden' name='check_out' value=".$check_out.">";
              echo "<input type='hidden' name='box_id' value=".$box_id.">";
              echo "<input type='hidden' name='slot_id' value=".$slot_id.">";
            ?>

    <!-- ลำดับห้อง -->
    <div class=" "> 
      <div class="flex justify-center mx-3 mb-6 mt-5">                   
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <h1 class="flex justify-center text-2xl font-semibold" style="text-shadow: 2px 2px 4px rgba(0, 0, 0.3, 0.3);"> <?php echo "ห้องที่ ".$room_number; ?> </h1>
        </div>
      </div>

    <!-- แสดงวันที่ -->
    <div class="flex justify-center  flex-wrap mx-3 mb-6">
      <h1 class=" text-xl font-semibold mr-5" style="text-shadow: 2px 2px 4px rgba(0, 0, 0.3, 0.3);"> 
        <?php echo "วันเข้า ".$check_in; ?></h1> 
      <h1 class=" text-xl font-semibold ml-3" style="text-shadow: 2px 2px 4px rgba(0, 0, 0.3, 0.3);"> 
        <?php echo "วันเข้า ".$check_out; ?></h1>
      </div>
    <!-- ชื่อ และ ไลน์ไอดี -->
      <div class="flex justify-center  flex-wrap mx-3 mb-2">
        <div class=" w-full  px-3">
            <label for="grid-last-name">
            ชื่อ
            </label>
            <input type="text" name="customer_name" id="customer_name" class="mb-5 appearance-none block w-full  text-gray-900 border border-stone-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="ชื่อ-นามสกุล">

            <label for="grid-last-name">
            ไอดีไลน์
            </label>
            <input type="text" name="line_id" id="line_id" class="mb-5 appearance-none block w-full  border border-stone-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="ไอดีไลน์">

            <label for="grid-last-name">
              หมายเหตุ
            </label>
            <input type="text" name="note" id="note" class="appearance-none block w-full  border border-stone-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="หมายเหตุ">
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        </div>

       

      
  </div>
  <div class="mt-5 mb-5">
            <center><button type="submit" name="send" value="Submit" class="mb-3 mt-2 inline-block  rounded  px-4 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
            style="background: linear-gradient(to right,  #FFD700, #1A1A1A, #1A1A1A, #1A1A1A)">บันทึก</button>

            <button type="reset" name="cancel" value="Reset" class="mb-3 mt-2 inline-block  rounded  px-4 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
            style="background: linear-gradient(to right,  #1A1A1A, #1A1A1A, #1A1A1A, #FF0000)">รีเซ็ต</button></center>
        </div>  
</div>
</div>
</div>
                      
       
      </form>
    </div>
  </div>
      
    <script>
          if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }
    </script>
</body>
</html>
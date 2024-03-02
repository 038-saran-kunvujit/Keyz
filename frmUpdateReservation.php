<?php 
session_start();
include('connect.php');

if (!isset($_SESSION['username'])) {
    header("Location: frm_login.php");
  // exit();
 }
// Check if the reservation ID is set
if(!isset($_GET['id'])){
    header("location: ./");
    exit();
}

// Check if box_id is set, otherwise, use session box_id
$boxId = isset($_GET['box_id']) ? mysqli_real_escape_string($conn, $_GET['box_id']) : mysqli_real_escape_string($conn, $_SESSION['box_id']);

// Fetch the reservation data from the database
$sql = "SELECT * FROM reserve WHERE reserve_id = '".mysqli_real_escape_string($conn, $_GET['id'])."' AND box_id = '$boxId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Reservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="website icon" type="png" href="img/logo.png">
</head>
<body class="bg-cover bg-center h-screen bg-opacity-25" style="background-image:url(img/bg1.png);">
          
<div class="flex justify-end">
    <a href="frmManageReserve.php" class="mr-10 mt-10" style="font-size: 24px;"><i class="fa-solid fa-xmark"></i></a>
</div>

<div class="container mx-auto px-3 mt-2">
    <div class="text-4xl text-center font-semibold text-gray-900 dark:text-stone mt-10 ml-5 mb-6" style="text-shadow: 2px 2px 4px rgba(0, 0, 0.3, 0.3);">แก้ไขข้อมูลการจอง</div>
            
    <div class="flex justify-center mx-auto">
        <form class="row gy-4 w-full w-72 bg-white border border-stone-500 rounded-lg" action="upReservation.php" method="POST">
            <input type="hidden" name="reserve_id" value="<?php echo $_GET['id'] ?>" >
            
            <!-- Show room number -->
            <div class="flex justify-center mx-3 mb-6 mt-5">                   
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <h1 class="flex justify-center text-2xl font-semibold" style="text-shadow: 2px 2px 4px rgba(0, 0, 0.3, 0.3);"> <?php echo "ห้องที่ ".$row['room_number']; ?></h1>
                </div>
            </div>

            <!-- Show check-in and check-out dates -->
            <div class="flex justify-center  flex-wrap mx-3 mb-6">
                <h1 class=" text-xl font-semibold mr-5" style="text-shadow: 2px 2px 4px rgba(0, 0, 0.3, 0.3);"> <?php echo "วันเข้า ".$row['check_in']; ?></h1> 
                <h1 class=" text-xl font-semibold ml-3" style="text-shadow: 2px 2px 4px rgba(0, 0, 0.3, 0.3);"> <?php echo "วันเข้า ".$row['check_out']; ?></h1>
            </div>

            <!-- Input fields for customer name, Line ID, and note -->
            <div class="flex justify-center mx-3 mb-6 mt-5">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="customer_name" class="form-label">ชื่อ</label>
                    <input type="text" class="appearance-none block w-full  bg-[#e0e0e0] text-gray-700 border border-stone-950 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="customer_name" name="customer_name" placeholder="ชื่อ" value="<?php echo $row['customer_name'] ?>">
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label for="line_id" class="form-label">Line ID</label>
                    <input type="text" class="appearance-none block w-full  bg-[#e0e0e0] text-gray-700 border border-stone-950 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="line_id" name="line_id" placeholder="Line ID" value="<?php echo $row['line_id'] ?>">
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label for="note" class="form-label">โน๊ต</label>
                    <input type="text" class="appearance-none block w-full  bg-[#e0e0e0] text-gray-700 border border-stone-950 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="note" name="note" placeholder="โน๊ต" value="<?php echo $row['note'] ?>" >
                </div>        
            </div> 

            <!-- Buttons for saving and returning back -->
            <div class="mt-5 mb-5">
                <center>
                    <button type="submit" name="submit" class="mb-3 mt-2 inline-block  rounded  px-4 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]" style="background: linear-gradient(to right,  #1A1A1A, #1A1A1A, #1A1A1A, #FF0000)">บันทึก</button>
                </center>
            </div>
        </form>
    </div>
</div>

<!-- Javascript -->
<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
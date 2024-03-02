<?php
   require_once('connect.php');
   
    session_start();  

    $_SESSION['username'] = 'siwipa';
    if (!isset($_SESSION['complete'])) {
      $_SESSION['complete'] = 'no';
    }
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Keycardbox</title>
  </head>

  <body class="bg-cover bg-center h-screen bg-opacity-25">
    <style>
        th {
            border: 1px solid #000000;
            padding: 8px;
            background: #FFCC33; 
        }
        td {
            border: 1px solid #000000;
            padding: 8px;
        }
    </style>

    <?php require("menu.php"); ?>

    <div class="row justify-content-center ">
      <div class="container mx-auto px-3 mt-2">
          <div class="text-4xl text-center  text-gray-900 dark:text-stone mt-6 ml-5 mb-6 font-semibold">เพิ่มข้อมูลตู้สำหรับอพาร์ตเมนท์</div>

        <div class="flex justify-end">
          <a href="clear_complete.php"><button type="button" class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
          style="background: linear-gradient(to right, #FFD700, #1A1A1A, #1A1A1A, #1A1A1A)">เพิ่มข้อมูลตู้ใหม่</button></a>
        </div>

      <!-- สร้างฟอร์มกรอกฟอร์มเพื่อเพิ่มชื่อตู้ = ชื่ออพาร์ตเมนท์ -->
      <?php if ($_SESSION['complete'] == "no") { ?>
        <form action="add_box.php" method="POST" class="mb-10">
        <div class=" flex justify-center  ">
          <div class="mr-5">
            <label for="apartment_name" class="block mt-2 text-sm font-bold mb-2">Apartment surat</label>

            <input type="text" name="apartment_name"  class="shadow mt-2 appearance-none border  rounded  py-2 px-3 text-gray-700 mb-3 bg-[#fffde7] leading-tight focus:outline-none focus:shadow-outline " required>
          </div>
        </div>

        <center>
        <button type="submit" name="submit" class="mb-3 inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
            style="background: linear-gradient(to right, #FFD700, #1A1A1A, #1A1A1A, #1A1A1A)">Add new box</button>
        </center>
        </form> 

      <?php } //end complete=no ?>

   
    <?php 
      echo "<br>";
     if (isset($_SESSION['complete'])) {
        if ($_SESSION['complete'] == "yes") {
       
          $sql ="SELECT *  FROM box WHERE username='". $_SESSION['username']. "' &&  apartment_name = '".$_SESSION['apartment_name']."'";
          
          if ($result = $conn->query($sql)) {
            while ($row = $result -> fetch_assoc()) {
               echo "<br> <br>";
               $box_id  = $row["box_id"];
            }
            $result -> free_result();
          }
          $max_num_slot = 20;
          //เพิ่มรายการ slot 20 ช่อง ใส่เฉพาะ รหัสอพาร์ตเม้น และ สถานะคีย์การ์ด=ไม่อยู่
           $sql = "INSERT INTO slot (box_id, card_status_id) VALUES ($box_id, 2)";
           // สร้างรายการห้อง 20 รายการ สำหรับใส่รายละเอียด ในตาราง slot
           for ($i = 0; $i < $max_num_slot; $i++) {
            $result = $conn->query($sql);
           }
          // $result -> free_result();

           // ดึงรายการ 20 อัน ที่เพิ่งใส่ มากกรอกรายละเอียด
           $sql ="select * from slot where box_id=$box_id";
           $result = $conn->query($sql);

           echo "<p class='text-center font-semibold'>Apartment : ".$_SESSION['apartment_name']."</p>";
           echo "<p class='text-center font-semibold'>Owner : ".$_SESSION['username']."</p><br>";
         
//สร้างตารางงงงงงงงงงงงงงงงงงงงงงงงงงงงงง
           echo "<div class='flex justify-center ' >";
           echo " <div class='table-responsive mb-8' >";
           echo "<table class='table table-bordered '>";
           echo "<thead >";
           echo "<tr class='text-center text-light bg-dark bg-[#FFCC00]' >";
           echo "<td>ลำดับ</td>";
           echo "<td>หมายเลขตู้</td>";
           echo "<td>หมายเลขห้อง</td>";
           echo "<td>หมายเลขช่องที่ตู้</td>";
           echo "<td>หมายเลข RFID ของคีย์การ์ด</td>";
           echo "<td>สถานะคีย์การ์ด</td>";
           echo "<td>การจัดการ</td>";
           echo "</tr>";
           echo " </thead>";
           echo  "<tbody>";

           $i=1; // ลำดับจำนวนห้อง
           
           while ($row = $result -> fetch_assoc()) {
            echo "<form action='updateroom.php' method='POST'>";
            echo "<input type='hidden' name='slot_id' value='" . $row['slot_id'] . "'>";
             echo "<tr class=text-center >";
             echo "<td>".$i++."</td>";
             echo "<td>".$row["box_id"]."</td>";
               echo "<td><input type='text' class='appearance-none block w-full bg-[#FFFFCC] text-gray-700 border border-stone-950 rounded py-3 px-4 mb-2 mt-2  leading-tight focus:outline-none focus:bg-white'  name='room_number' value=".$row["room_number"]."  ></td>";
               echo "<td><input type='text' class='appearance-none block w-full bg-[#FFFFCC] text-gray-700 border border-stone-950 rounded py-3 px-4 mb-2 mt-2 leading-tight focus:outline-none focus:bg-white'  name='slot_number' value=".$row["slot_number"]."  ></td>";
               echo "<td><input type='text' class='appearance-none block w-full bg-[#FFFFCC] text-gray-700 border border-stone-950 rounded py-3 px-4 mb-2 mt-2 leading-tight focus:outline-none focus:bg-white'  name='rfid_number' value=".$row["rfid_number"]."  ></td>" ;
               $status = $row["card_status_id"];
               if ($status==1){
                 echo "<td> คืนแล้ว </td>";
               }
               else {
                 echo "<td> ยังไม่คืน </td>";
               }
               echo "</td>";
               echo "<td><div class=btn-group>";
               echo "<button type='submit' name='send' class='mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]'
               style='background: linear-gradient(to right, #FFD700, #1A1A1A, #1A1A1A, #FFD700)'>Submit</button>";
               
               echo "</div>";
               echo "</td>";
             echo "</tr>";

             echo "</form>";
          }
             echo  "</tbody>";
           }
         
           // end while
          echo "</table>";
           
           
        } //end  complete = yes   

      //end isset
     $conn->close();
    // unset($_SESSION["complete"]);
    ?>

</div>
    </div>
   </div>            
   </div>
   </div>

  </body>
  </html>
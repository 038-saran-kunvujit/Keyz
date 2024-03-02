<?php 
    session_start();
    include('connect.php');
    
     if (!isset($_SESSION['username'])) {
         header('location: frm_login.php');
    }

    if(isset($_POST['box_id']) && !empty($_POST['box_id'])) {
        $_SESSION['box_id'] = $_POST['box_id'];
    }
    
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="img/logo.png">
    <title>Manage Box</title>
    <!-- favicons -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Css -->
    
    <?php require("menu.php"); ?>
 
</head>
<body class="bg-cover bg-center h-screen bg-opacity-25" style="background-image:url(img/bg1.png);">
    

<style>
    	th{
            border: 1px solid #000000;
            padding: 8px;
            background: #fbc02d;
            
        }
        td{
            border: 1px solid #000000;
            padding: 8px;
            background:#FFFFFF ; 
        }

</style>

<div class="container mx-auto px-3 mt-2">
    <div class="text-4xl text-center font-extrabold text-gray-900 dark:text-stone mt-6 ml-5 mb-6" style="text-shadow: 2px 2px 4px rgba(0, 0, 0.3, 0.3);" >จัดการข้อมูลตู้</div>
    
    <form method="post" action="" class="mt-16">
        <div class="flex justify-center mb-4">
            <label for="apartment_name" class="font-semibold mr-2">อพาร์ตเมนท์ </label>
            <select name="box_id" class="border border-gray-300 rounded-md mr-4 py-1 px-6" onchange="this.form.submit()" required>
                <option value="">เลือกอพาร์ตเมนท์</option>
                <?php
                $sql = "SELECT apartment_name , box_id FROM box WHERE username = '".$_SESSION['username']."'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['box_id'] . "'";
                        if(isset($_SESSION['box_id']) && $_SESSION['box_id'] == $row['box_id']) {
                            echo "selected";
                        }
                        echo ">" . $row['apartment_name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </form>

    <div class="flex justify-center ">
        <div class="table-responsive">
            <!-- PHP code to fetch reservation data based on selected box_id -->
            <?php
            
                if(isset($_SESSION['box_id']) && !empty($_SESSION['box_id'])) {
                    $boxid = $_SESSION['box_id'];
                    $sql = "SELECT slot_id,`box_id`,`room_number`,`slot_number`,`rfid_number`,`card_status_id` FROM slot WHERE box_id = '$boxid'";
                    $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0):
                    
            ?>
            
            <table class="table table-bordered  mb-6">
                <thead>
                    <tr class="text-center text-light bg-dark">
                        <th>ลำดับ</th>
                        <th>หมายเลขตู้</th>
                        <th>หมายเลขห้อง</th>
                        <th>หมายเลขช่องที่ตู้</th>
                        <th>หมายเลข RFID ของคีย์การ์ด</th>
                        <th>สถานะคีย์การ์ด</th>
                        <th>การจัดการ</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= 20; $i++) {
                    $i=1;
                    while ($row = mysqli_fetch_assoc($result)):
                        echo "<form action='update_slot.php' method='POST'>";
                        echo "<input type='hidden' name='slot_id' value='" . $row['slot_id'] . "'>";
                         echo "<tr class=text-center >";
                         echo "<td>".$i++."</td>";
                         echo "<td>".$row["box_id"]."</td>";
                           echo "<td><input type='text' class='appearance-none block w-full bg-[#eceff1] text-gray-700 border border-stone-950 rounded py-3 px-4 mb-2 mt-2  leading-tight focus:outline-none focus:bg-white'  name='room_number' value=".$row["room_number"]."  ></td>";
                           echo "<td><input type='text' class='appearance-none block w-full bg-[#eceff1] text-gray-700 border border-stone-950 rounded py-3 px-4 mb-2 mt-2 leading-tight focus:outline-none focus:bg-white'  name='slot_number' value=".$row["slot_number"]."  ></td>";
                           echo "<td><input type='text' class='appearance-none block w-full bg-[#eceff1] text-gray-700 border border-stone-950 rounded py-3 px-4 mb-2 mt-2 leading-tight focus:outline-none focus:bg-white'  name='rfid_number' value=".$row["rfid_number"]."  ></td>" ;   
                           $status = $row["card_status_id"];
                            if ($status==1){
                                echo "<td> คืนแล้ว </td>";
                            }
                            else {
                                echo "<td> ยังไม่คืน </td>";
                            }
                           echo "<td><div class=btn-group>";
                           echo "<button type='submit' name='send' class='mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]'
                           style='background: linear-gradient(to right, #1A1A1A, #1A1A1A, #1A1A1A, #FF0000)'>Submit</button>";
                           
                           echo "</div>";
                           echo "</td>";
                         echo "</tr>";
                         echo "</form>";
                        
                    ?>
                    
                    <?php
                        
                        endwhile;
                    }
                    ?>
                </tbody>
            </table>
            <?php
                
                endif;
            }
            ?>
        </div>
    </div>
</div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>
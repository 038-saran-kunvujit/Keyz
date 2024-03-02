<?php 
session_start();
include('connect.php');

if (!isset($_SESSION['username'])) {
    header('location: frm_login.php');
}

// Check if box_id is selected
if(isset($_POST['box_id']) && !empty($_POST['box_id'])) {
    $_SESSION['box_id'] = $_POST['box_id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="png" href="img/logo.png">
    <?php require("menu.php"); ?>
</head>
<body class="bg-cover bg-center h-screen bg-opacity-25" style="background-image:url(img/bg1.png);">

<style>
    th {
        border: 1px solid #000000;
        padding: 8px;
        background: #fbc02d;
    }

    td {
        border: 1px solid #000000;
        padding: 8px;
        background: #FFFFFF;
    }
</style>

<div class="container mx-auto px-3 mt-2">
    <div class="text-4xl text-center font-extrabold text-gray-900 dark:text-stone mt-6 ml-5 mb-6"style="text-shadow: 2px 2px 4px rgba(0, 0, 0.3, 0.3);">จัดการข้อมูลการจอง</div>

    <form method="post" action="" class="mt-16">
        <div class="flex justify-center mb-4 ">
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

    <!-- Display reservation data based on selected box_id -->
    <div class="flex justify-center ">
        <div class="table-responsive">
            <?php
            if(isset($_SESSION['box_id']) && !empty($_SESSION['box_id'])) {
                $boxid = $_SESSION['box_id'];
                $sql = "SELECT reserve_id,`box_id`,`room_number`,`customer_name`,`line_id`,`check_in`,`check_out`,`note` FROM reserve WHERE box_id = '$boxid'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0):
            ?>
            <table class="table table-bordered mt-5 mb-6">
                <thead>
                    <tr class="text-center text-light bg-dark">
                        <th>ลำดับ</th>
                        <th>ห้องพัก</th>
                        <th>ชื่อ</th>
                        <th>Line ID</th>
                        <th>วันเข้า</th>
                        <th>วันออก</th>
                        <th>โน๊ต</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    while ($row = mysqli_fetch_assoc($result)):
                    ?>
                    <tr class="text-center">
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['room_number'] ?></td>
                        <td><?php echo $row['customer_name'] ?></td>
                        <td><?php echo $row['line_id'] ?></td>
                        <td><?php echo $row['check_in'] ?></td>
                        <td><?php echo $row['check_out'] ?></td>
                        <td><?php echo $row['note'] ?></td>
                        <td>
                            <div class="btn-group">
                                <button class="mb-3 mt-2 inline-block rounded px-4 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]" style="background: linear-gradient(to right, #1A1A1A, #1A1A1A, #1A1A1A, #FFD700)">
                                    <a href="frmUpdateReservation.php?id=<?php echo $row['reserve_id'] ?>" class="btn btn-warning">แก้ไข</a>
                                </button>
                                <button class="mb-3 mt-2 inline-block rounded px-4 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]" style="background: linear-gradient(to right, #c41411, #1A1A1A, #1A1A1A, #FF0000)">
                                    <a href="delReservation.php?id=<?php echo $row['reserve_id'] ?>" class="btn btn-danger">ลบ</a>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    endwhile;
                    ?>
                </tbody>
            </table>
            <?php
                else:
                    echo "<p class='mt-5'>ไม่มีข้อมูลการจอง</p>";
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
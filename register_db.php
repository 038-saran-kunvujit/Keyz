<?php 
    session_start();
    include('connect.php');
    
    $errors = array();

    if (isset($_POST['send'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $owner_name = mysqli_real_escape_string($conn, $_POST['owner_name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $user_check_query = "SELECT * FROM owner WHERE username = '$username'  LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { 
            if ($result['username'] === $username) {
            echo '<script> alert("ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว")</script>';
            header('Refresh:0; url= frm_register.php');
            exit;
            }
           
        }

        if (count($errors) == 0) {
            $password = md5($password);

            $sql = "INSERT INTO owner (username, owner_name,address, password) VALUES ('$username', '$owner_name','$address', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            echo '<script> alert("บันทึกการลงทะเบียน")</script>';
            header('Refresh:0; url= frm_login.php');
       
        } else {
            echo '<script> alert("ไม่สามารถลงทะเบียนได้")</script>';
            header('Refresh:0; url= frm_register.php');
  
        }
    }

?>

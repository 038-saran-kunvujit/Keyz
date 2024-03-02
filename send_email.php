<?php 
if (isset($_POST['send_message'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $msg = $_POST['msg'];
  // Content-Type helps email client to parse file as HTML 
  // therefore retaining styles

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $message = "<html>
  <head>
        <title>New message from website contact form</title>
  </head>
  <body>
        <h1>" . $subject . "</h1>
        <p>".$msg."</p>
  </body>
  </html>";
  if (mail('lhong2564@gmail.com', $subject, $message, $headers)) {
  // echo "Email sent compelete";
   echo '<script> alert("Email sent compelete")</script>';
  // header('Refresh:0; url= frm_email.php');
  }else{
//    echo "Failed to send email. Please try again later";
   echo '<script> alert("Email sent failed")</script>';
  // header('Refresh:0; url= frm_email.php');
  }
}
?>
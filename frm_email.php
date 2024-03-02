<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sending email with php</title>
</head>
<body>
<form method="post" action="send_email.php">
  Name: <input type="text" name="name" > <br />
  email: <input type="email" name="email" > <br />
  Subject: <input type="text" name="subject" > <br />
  Message: <textarea name="msg"></textarea>
  <button type="submit" name="send_message">Send</button>
</form>
</body>
</html>
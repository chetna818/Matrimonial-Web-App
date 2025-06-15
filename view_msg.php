<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .chat-bubble-right {
    position: relative;
    background: #0d6efd; /* Bootstrap primary blue */
    color: white;
    border-radius: 15px;
    padding: 10px 15px;
    margin: 10px 0;
    max-width: 70%;
    margin-right: auto; /* Push to right */
    
  }
   .chat-bubble-right::after {
    content: "";
    position: absolute;
    right: -10px;
    top: 10px;
    border-width: 10px 0 10px 10px;
    border-style: solid;
    border-color: transparent transparent transparent #0d6efd;
  }
    </style>
</head>
<body>
<?php
if (isset($_COOKIE["login"])) {
    $user_email = $_COOKIE["login"];
    $conn = mysqli_connect("localhost", "root", "", "matrimonialprojectmahipal");
    

    if (!isset($_GET["id"])) {
        echo "No message ID given.";
        exit;
    }
    $code=($_GET["id"]);
    $inbox = mysqli_query($conn, "select * from message where code='$code' ");
  if ($in = mysqli_fetch_array($inbox)) {
    $from = $in["from_email"];
        $to = $in["to_email"];
        $message = $in["message"];
        $datetime = $in["date"];
      
        echo $to;
        
        $sender_rs = mysqli_query($conn, "SELECT fname, lname FROM admin WHERE email = '$from'");
if ($sender = mysqli_fetch_assoc($sender_rs)) {
    echo "<p><strong>From:</strong> " . $sender["fname"] . " " . $sender["lname"] . "</p>";
}
?>
        <div class="col-lg-4 p-4 ms-3 chat-bubble-right">
  <?=  $message;?>
</div>
  <?php     
        echo $datetime;
  }
  else{
    echo"msg not found";
  }
} 
else{
    echo"logout";
}       
?>
</body>
</html>
    

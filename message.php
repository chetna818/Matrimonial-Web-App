<?php
    
    if(isset($_COOKIE["login"])){
		$user_email=$_COOKIE["login"];
		$conn=mysqli_connect("localhost","root","","matrimonialprojectmahipal");
    if(!isset($_GET["id"]) ){
      //header("location:search.php");
      echo "not get id";
      
    }
    else{
      ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
     body {
                margin-top: 20px;
                color: #1a202c;
                text-align: left;
                background-color: #e2e8f0;
            }
  </style>
</head>
<body>


 <?php
 if (!isset($_GET["id"])) {
    echo "Invalid access: no ID provided.";
    exit();
}
$user_code = $_GET["id"];

if (empty($_POST["message"])) {
    echo "Message field is empty.";
    exit();
}

$message = mysqli_real_escape_string($conn, $_POST["message"]);
$user_email = mysqli_real_escape_string($conn, $_COOKIE["login"]);
$from_email = $user_email;
$to_code = $user_code;

$rs = mysqli_query($conn, "SELECT code FROM admin WHERE email = '$user_email'");
if ($r = mysqli_fetch_assoc($rs)) {
    $from_code = $r["code"];
} else {
    echo "Sender not found.";
    exit();
}
  
    

$rs = mysqli_query($conn, "select email from admin where code = '$user_code' ");
if ($r = mysqli_fetch_assoc($rs)) {
  $to_email=$r["email"];
}  
    $sn=0;
    $rs=mysqli_query($conn,"select MAX(sn) from message");
    if($r=mysqli_fetch_array($rs)){
        $sn=$r[0];
    }
    $sn++;
    
    $a=array();
    for($i='A';$i<='Z';$i++){
        array_push($a,$i);
        if($i=='Z'){
            break;
        }
    }

    for($i='a';$i<='z';$i++){
        array_push($a,$i);
        if($i=='z'){
            break;
        }
    }
    for($i='0';$i<='9';$i++){
        array_push($a,$i);
    }
    shuffle($a);
	$code="";
    for($i=0;$i<=6;$i++){
        $code=$code.$a[$i];
    }    
    $code=$code."_".$sn;
    $target="profile/$code.jpg";
  
  $dt=date("Y-m-d H:i:s");
  //if(mysqli_query($conn,"insert into message values ($sn,'$code', '$from_code', '$to_code', '$from_email', '$to_email', '$message','$dt')")>0){
    //header("location:message.php?id=$user_code&success=1");
    
 // }
  $sql = "INSERT INTO `message`   
        VALUES ($sn, '$code', '$from_code', '$to_code', '$from_email', '$to_email', '$message', '$dt')";

if (mysqli_query($conn, $sql)) {
    header("location:send_message.php?id=$user_code&success=1");

    exit();
} else {
    echo "Insert failed: " . mysqli_error($conn);
}
  //else{
    //header("location:message.php?id=$user_code&again=1");
    //echo $user_code;
   // echo $to_email;
 // }
    }
 

?>

</body>
</html>
<?php
}
else{
  //header("location:login.php");
  echo "send but no success msg appear";
}
?>

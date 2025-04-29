<?php
if(empty($_POST["fname"]) || empty($_POST["lname"])|| empty($_POST["email"]) || empty($_POST["pass"]) || empty($_POST["gender"]) || empty($_POST["caste"]) || empty($_POST["religion"]) || empty($_POST["dob"]) || empty($_POST["occupation"]) || empty($_POST["city"]) || empty($_POST["state"]) || empty($_POST["country"])){
    header("location:reg.php?empty=1");
	
}
else{
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $gender=$_POST["gender"];
    $caste=$_POST["caste"];
    $religion=$_POST["religion"];
    $dob=$_POST["dob"];
    $occupation=$_POST["occupation"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    $country=$_POST["country"];
    $conn=mysqli_connect("localhost","root","","matrimonialprojectmahipal");
    //taking maximum serial number from database
    $sn=0;
    $rs=mysqli_query($conn,"select MAX(sn) from admin");
    if($r=mysqli_fetch_array($rs)){
        $sn=$r[0];
    }
    $sn++;
    //random user code generation
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

    // if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){
      if(mysqli_query($conn,"insert into admin values($sn,'$code','$fname','$lname','$email','$pass','$gender','$caste','$religion','$dob','$occupation','$city','$state','$country')")){
        header("location:reg.php?success=1");
		
      }
      else{
        header("location:reg.php?again=1");
		
      }
    // }
    // else{
    //     header("location:register.php?img_err=1");
    // }
    


}
?>
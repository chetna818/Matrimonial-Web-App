<?php
    if(empty($_POST["email"]) || empty($_POST["pass"])){
		header("location:login.php?empty=1");
        //echo "email not found";
	}
    else{
	
		$email=$_POST["email"];
		$pass=$_POST["pass"];
        $conn=mysqli_connect("localhost","root","","matrimonialprojectmahipal");
        $rs=mysqli_query($conn,"select * from admin where email='$email'");
        if($r=mysqli_fetch_array($rs)){
            if($r["pass"]==$pass){
                setcookie("login",$email,time()+3600);
                
                header("location:profile.php");
                echo "now redirect to profile page";
            }
            else{
              //echo "Password Incorrect";
              header("location:login.php?incorrect=1");
            }
           
		
       }
       else{
        //echo "email not found";
        header("location:login.php?incorrect=1");
      }
    }
?>
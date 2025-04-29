<?php
     
	 if(isset($_COOKIE["login"])){
		 $email=$_COOKIE["login"];
         $conn=mysqli_connect("localhost","root","","matrimonialprojectmahipal");
		 if(empty($_POST["cp"]) || empty($_POST["np"]) || empty($_POST["rp"])){
			 header("location:change_pass.php?empty=1");
		 }
		 else{
			 $cp=$_POST["cp"];
			 $np=$_POST["np"];
			 $rp=$_POST["rp"];
			 $rs=mysqli_query($conn,"select * from admin where email='$email'");
		     if($r=mysqli_fetch_array($rs)){
				 if($r["pass"]=="$cp"){
					 if($np==$rp){
						 if(mysqli_query($conn,"update admin set pass='$np' where email='$email'")>0){
							header("location:change_pass.php?success=1"); 
						 }
						 else{
							 header("location:change_pass.php?again=1");
						 }
					 }
					 else{
						 header("location:change_pass.php?missmatch=1");
					 }
				 }
				 else{
					 header("location:change_pass.php?password_invalid=1");
				 }
			 }
			 else{
				 //header("location:logout.php");
                 echo"problem";
			 }
		 }
	 }
     else{
		 //header("location:index.php");
	 }
?>	 
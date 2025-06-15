<?php
   
    if(isset($_COOKIE["login"])){
		$email=$_COOKIE["login"];
		$conn=mysqli_connect("localhost","root","","matrimonialprojectmahipal");
        $rs=mysqli_query($conn,"select * from admin order by RAND() limit 5");
        $data=[];
        while($r=mysqli_fetch_assoc($rs)){
            $data[]=$r;
        }
        echo json_encode($data);
    }    
?>


   
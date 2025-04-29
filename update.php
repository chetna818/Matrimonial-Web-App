<?php
    if(isset($_COOKIE["login"])){
            $email=$_COOKIE["login"];
            $conn=mysqli_connect("localhost","root","","matrimonialprojectmahipal");
            $rs=mysqli_query($conn,"select * from admin where email='$email'");
            if($r=mysqli_fetch_array($rs)){
                if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["gender"]) || empty($_POST["caste"]) || empty($_POST["religion"]) || empty($_POST["dob"]) || empty($_POST["city"]) || empty($_POST["state"]) || empty($_POST["country"])){
                    header("location:edit.php?empty=1");
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
                    $city=$_POST["city"];
                    $state=$_POST["state"];
                    $country=$_POST["country"];
                    if(mysqli_query($conn,"update admin set fname='$fname',lname='$lname',gender='$gender',caste='$caste',religion='$religion',dob='$dob',occupation='$occupation',city='$city',state='$state',country='$country' where email='$email'")>0){
                        header("location:profile.php?success=1");
                        //echo "done";
                    }
                    else{
                        //header("location:edit.php?again=1");
                        echo " not done";
                    }
                }
            }
            else{
                header("location:logout.php");
            }
    }
?>    
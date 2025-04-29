<div class="container-fluid p-0 mb-2 mt-2 text-white text-center">
<span class="badge rounded-pill bg-secondary p-3">
  <h4>Profiles Based on Your Search</h4>
  </span>  
</div>
<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      
.center-card {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}
</style>
    </style>
            </head>
            <body>
            
<?php
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    $conn = mysqli_connect("localhost", "root", "", "matrimonialprojectmahipal");
    $rs = mysqli_query($conn, "select * from admin where email='$email'");
    if ($r = mysqli_fetch_array($rs)) {
        if (empty($_POST["gender"]) || empty($_POST["caste"]) || empty($_POST["religion"])) {
            //header("location:search.php?empty=1");
            echo "empty";
            ?>
            
<?php
        } 
        
        else {
            $gender = $_POST["gender"];
            $caste = $_POST["caste"];
            $religion = $_POST["religion"];
            $rec = mysqli_query($conn, "select * from admin where gender='$gender' AND caste='$caste' AND religion='$religion'");
            $flag = false;
            while ($record = mysqli_fetch_array($rec)){
               $flag = true;
            ?>  
          
            <div class="container-fluid">
              
            <section class="w-100 px-4 py-5" style="background-color: #9de2ff; border-radius: .5rem .5rem 0 0;">
  <div class="row d-flex justify-content-center style=margin: 30px">
  <div class="container fluid mt-4 ">
    
  <div class="row">
    
    <div class=" col-sm-3 col-lg-3 col-xl-6">
      
      <div class="card" style="border-radius: 5px;">
        <div class="card-body p-4">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                alt="Generic placeholder image" class="img-fluid" style="width: 180px ;margin: 30px; border-radius: 10px;">
            </div>
            <div class="container-fluid">
            <div style="text-align: center; font-weight: bold; padding-top:30px">
  <div>Name : <?=$record["fname"]." ".$record["lname"]?></div><br>
  <div>Gender : <?=$record["gender"]?></div></br>
  <div>Religion : <?=$record["religion"]?></div></br>
  <div>Caste : <?=$record["caste"]?></div><br>
  
  
</div>
            </div>
              
            </div>
            </div>
            </div>
              <div class="d-flex pt-1">
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary flex-grow-1">Follow</button>
                <a class="btn btn-primary" target="_blank" href="searched_profile.php?id=<?= $record["code"] ?>">View Profile</a>

              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>

  </div>
</section> 
</body>
</html> 
            <?php 
              
            }
            if ($flag) {
              echo "Profile(s) found.";
          } else {
            ?>
            <div class="container-fluid p-0 mt-10 bg-black text-white text-center">

  
  <h2 class="text-center mt-5">Sorry, no profiles found.</h2>

  <a class="btn btn-info " target="__blank" href="search.php">Search More</a> 
</div>
            
    
   

               
                
                      
                
                    
              </div>
          </body>
          </html>
           <?php  
          }


            
                //echo "found";
        }
    } else {
        //header ("location:logout.php");
        echo "not found";
    }
} else {
    echo "cookies not found";
    ?>
    <a class="btn btn-info " target="__blank" href="login.php">Search More</a>
    <?php
}
?>
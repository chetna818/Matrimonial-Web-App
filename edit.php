<?php
    if(isset($_COOKIE["login"])){
            $email=$_COOKIE["login"];
            $conn=mysqli_connect("localhost","root","","matrimonialprojectmahipal");
            $rs=mysqli_query($conn,"select * from admin where email='$email'");
            if($r=mysqli_fetch_array($rs)){
            ?>
            <!DOCTYPE html>
<html>
<head>
<title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>    
   
    body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color:#6a11cb(14, 93, 196);
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
</head>
<body>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          
          <!-- /Breadcrumb -->
    
          
              
                <div data-mdb-input-init class="form-outline mb-4">

<form method="POST" action="update.php">
    <input type="text" id="form3Example1q" class="form-control" name="fname" value="<?php echo $r["fname"]; ?>" placeholder="First Name" required><br><br>
    <input type="text" id="form3Example1q" class="form-control" name="lname" value="<?php echo $r["lname"]; ?>" placeholder="Last Name" required><br><br>
    <input type="email" id="form3Example1q" class="form-control" name="email" value="<?php echo $r["email"]; ?>"placeholder="Email" required><br><br>
    <input type="password" id="form3Example1q" class="form-control" name="pass" value="<?php echo $r["pass"]; ?>"placeholder="Password" required><br><br>
    <div class="row">
        <div data-mdb-input-init class="form-outline mb-4">
        Gender:
                <input type="radio" name="gender" value="Male" <?php if($r["gender"] == 'Male') echo 'checked'; ?>> Male
    <input type="radio" name="gender" value="Female" <?php if($r["gender"] == 'Female') echo 'checked'; ?>> Female<br><br>
            
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
        Caste:
    <select name="caste" class="form-control" required>
        <option value="" disabled hidden <?= empty($r['caste']) ? 'selected' : '' ?>>Select Caste</option>
        <option <?= $r['caste']=='Gupta' ? 'selected' : '' ?>>Gupta</option>
        <option <?= $r['caste']=='Sharma' ? 'selected' : '' ?>>Sharma</option>
        <option <?= $r['caste']=='Dixit' ? 'selected' : '' ?>>Dixit</option>
        <option <?= $r['caste']=='Rajput' ? 'selected' : '' ?>>Rajput</option>
    </select><br><br>
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
        Religion:
            <select name="religion" class="form-control" required><br>
                <option value="" disabled selected hidden>Select religion</option>
                <option <?= $r['religion']=='Hindu' ? 'selected' : '' ?>>Hindu</option>
                <option <?= $r['religion']=='Muslim' ? 'selected' : '' ?>>Muslim</option>
                <option <?= $r['religion']=='Sikh' ? 'selected' : '' ?>>Sikh</option>
                <option <?= $r['religion']=='Christian' ? 'selected' : '' ?>>Christian</option>
            </select>
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
        Date of Birth:
            <input type="date" id="form3Example1q" class="form-control" name="dob" value="<?php echo $r["dob"]; ?>" required><br><br>
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
          Occupation:
            <select name="occupation" class="form-control" required><br>
            <option value="" disabled selected hidden>Select Occupation</option>
                <option <?= $r['occupation']=='Teacher' ? 'selected' : '' ?>>Teacher</option>
                <option <?= $r['occupation']=='Doctor' ? 'selected' : '' ?>>Doctor</option>
                <option <?= $r['occupation']=='Businessman' ? 'selected' : '' ?>>Businessman</option>
                <option <?= $r['occupation']=='Clerk' ? 'selected' : '' ?>>Clerk</option>
            </select>
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
            <select name="city" class="form-control" required><br>
                <option value="" disabled selected hidden>Select City</option>
                <option <?= $r['city']=='Rajsamand' ? 'selected' : '' ?>>Rajsamand</option>
                <option <?= $r['city']=='Bikaner' ? 'selected' : '' ?>>Bikaner</option>
                <option <?= $r['city']=='Jaipur' ? 'selected' : '' ?>>Jaipur</option>
                <option <?= $r['city']=='Dhoinda' ? 'selected' : '' ?>>Dhoinda</option>
            </select>
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
            <select name="state" class="form-control" required><br>
                <option value="" disabled selected hidden>Select State</option>
                <option <?= $r['state']=='Rajsathan' ? 'selected' : '' ?>>Rajsathan</option>
                <option <?= $r['state']=='Delhi' ? 'selected' : '' ?>>Delhi</option>
                <option <?= $r['state']=='Gujrat' ? 'selected' : '' ?>>Gujrat</option>
                <option <?= $r['state']=='Mumbai' ? 'selected' : '' ?>>Mumbai</option>
            </select>
        </div>


    </div>
</div>


<div class="row mb-4 pb-2 pb-md-0 mb-md-5">
<div class="col-md-6">

    <div data-mdb-input-init class="form-outline">
        <input type="text" id="form3Example1w" class="form-control" name="country" value="India" />

    </div>

</div>
</div>
<button class="btn btn-danger btn-lg mb-1" data-mdb-ripple-init>
Update
</button>

</form>

</div>
</div>
</div>
</div>
</div>
</body>
</html>         
            <?php        
            }
            else{
                //header("location:index.php");
               echo "problem";
            }
    }
    else{
       // header("location:index.php");
        echo "big problem";
    }
?>    

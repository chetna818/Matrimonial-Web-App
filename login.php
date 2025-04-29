<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .gradient-custom {
      /* fallback for old browsers */
      background: #6a11cb;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
.error-message {
    color: #721c24;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    padding: 10px;
    width: 75%;
    margin: 20px auto;
    text-align: center;
    border-radius: 5px;
}


  </style>
</head>

<body>
  <?php
  if (isset($_COOKIE["login"])) {
    header("location:profile.php");
    //echo "logged in";
  } else {
    //echo "logged out";
  ?>




    

    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
           
              <div class="card-body p-5 text-center">
              <?php
    if (isset($_GET["incorrect"])) {
      echo "<p style='color: red;'>Incorrect Username or Password. Please fill.</p>";
    } else if (isset($_GET["empty"])) {
    
     echo "<p style='color: red;'>empty Username or Password. Please fill.</p>";
   
    }
    


    ?>
              <?php  
              if (isset($_GET["success"])) {
    echo "<p style='color: green;'>Registration successful. Please log in.</p>";
}
?>

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Please enter your login and password!</p>



                  <div data-mdb-input-init class="form-outline form-white mb-4">
                    <!-- Login Form -->

                    <div data-mdb-input-init class="form-outline form-white mb-4">
                   


                      <form method="POST" action="check.php">
                        
                        <input type="email" id="typeEmailX" placeholder="Email" name="email" class="form-control form-control-lg" />
                        <label class="form-label" for="typeEmailX"></label>
                    </div>

                    <div data-mdb-input-init class="form-outline form-white mb-4">
                      <input type="password" id="typePasswordX" placeholder="password" name="pass" class="form-control form-control-lg" />
                      <label class="form-label" for="typePasswordX"></label>
                    </div>




                  </div>

                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                  </form>
                  <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                  </div>

                </div>

                <div>
                  <p class="mb-0">Don't have an account? <a href="reg.php" class="text-white-50 fw-bold">Sign Up</a>
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>







    <?php
    //if (isset($_GET['error'])) {
    //echo "<p style='color:red;'>Invalid email or password</p>";
    // }
    ?>
</body>

</html>
<?php
  }
?>
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
    </style>
</head>

<body>





    <?php
      
    if (isset($_GET["empty"])) {
    ?>
        <div class="error text-center w-75 mx-auto mt-3" style="color: red; text-align: center; margin-bottom: 10px;" role="alert">
            Fields are empty
        </div>
    <?php
    } else if (isset($_GET["success"])) {
        header("location:login.php?success=1");
    ?>
        
        <div class="error text-center w-75 mx-auto mt-3" style="color: green; text-align: center; margin-bottom: 10px;" role="alert">
            Registration successful
        </div>

    <?php
       
    }



    ?>
    <section class="h-100 h-custom" style="background-color: #6a11cb;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                            alt="Sample photo">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>



                            <div data-mdb-input-init class="form-outline mb-4">

                                <form method="POST" action="register_save.php">
                                    <input type="text" id="form3Example1q" class="form-control" name="fname" placeholder="First Name" required><br><br>
                                    <input type="text" id="form3Example1q" class="form-control" name="lname" placeholder="Last Name" required><br><br>
                                    <input type="email" id="form3Example1q" class="form-control" name="email" placeholder="Email" required><br><br>
                                    <input type="password" id="form3Example1q" class="form-control" name="pass" placeholder="Password" required><br><br>
                                    <div class="row">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <select name="gender" class="form-control " required><br><br>
                                                <option value="" disabled selected hidden>Select Gender</option>
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <select name="caste" class="form-control" required><br>
                                                <option value="" disabled selected hidden>Select Caste</option>
                                                <option>Gupta</option>
                                                <option>Sharma</option>
                                                <option>Dixit</option>
                                                <option>Rajput</option>
                                            </select>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <select name="religion" class="form-control" required><br>
                                                <option value="" disabled selected hidden>Select religion</option>
                                                <option>Hindu</option>
                                                <option>Muslim</option>
                                                <option>Sikh</option>
                                                <option>Christian</option>
                                            </select>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="date" id="form3Example1q" class="form-control" name="dob" value="Date of Birth" required><br><br>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <select name="occupation" class="form-control" required><br>
                                                <option value="" disabled selected hidden>Select Occupation</option>
                                                <option>Teacher</option>
                                                <option>Doctor</option>
                                                <option>Businessman</option>
                                                <option>Clerk</option>
                                            </select>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <select name="city" class="form-control" required><br>
                                                <option value="" disabled selected hidden>Select City</option>
                                                <option>Rajsamand</option>
                                                <option>Bikaner</option>
                                                <option>Jaipur</option>
                                                <option>Dhoinda</option>
                                            </select>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <select name="state" class="form-control" required><br>
                                                <option value="" disabled selected hidden>Select State</option>
                                                <option>Rajsathan</option>
                                                <option>Delhi</option>
                                                <option>Gujrat</option>
                                                <option>Mumbai</option>
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
                                Login
                            </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
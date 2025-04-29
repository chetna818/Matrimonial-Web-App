  
<?php
    if(isset($_COOKIE["login"])){
            $email=$_COOKIE["login"];
            $conn=mysqli_connect("localhost","root","","matrimonialprojectmahipal");
            $rs=mysqli_query($conn,"select * from admin where email='$email'");
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
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
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

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #6a11cb(14, 93, 196);
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->

            <!-- /Breadcrumb -->



        </div>
        <div data-mdb-input-init class="form-outline mb-4">

            <form method="POST" action="search_result.php">

                <div class="row">
                    <div data-mdb-input-init class="form-outline mb-4">
                        Gender:
                        <input type="radio" name="gender" value="male"> Male
                        <input type="radio" name="gender" value="female"> Female<br><br>

                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        Caste:
                        <select name="caste" class="form-control" required><br>
                                                <option value="" disabled selected hidden>Select Caste</option>
                                                <option>Gupta</option>
                                                <option>Sharma</option>
                                                <option>Dixit</option>
                                                <option>Rajput</option>
                                            </select><br><br>

                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        religion:
                        <select name="religion" class="form-control" required><br>
                                                <option value="" disabled selected hidden>Select religion</option>
                                                <option>Hindu</option>
                                                <option>Muslim</option>
                                                <option>Sikh</option>
                                                <option>Christian</option>
                                            </select>
                    </div>



                </div>
        </div>
        <button class="btn btn-danger btn-lg mb-1" data-mdb-ripple-init>
            Search
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
    header("location:logout.php");
}
?>
<?php

if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    $conn = mysqli_connect("localhost", "root", "", "matrimonialprojectmahipal");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Boostrap 5 Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .td {
                font-weight: 600;
            }

            body {
                margin-top: 20px;
                color: #1a202c;
                text-align: left;
                background-color: #e2e8f0;
            }
        </style>
    </head>

    <body>

        <div class="container-fluid p-5">
            <?php
            $rs = mysqli_query($conn, "select * from admin where email='$email'");
            if ($r = mysqli_fetch_array($rs)) {
            ?>
                <div class="row mt-4">


                    <h2>Change Password</h2>
                    <?php
                    if (isset($_GET["empty"])) {
                    ?>
                        <div class="alert alert-danger">All Field Required</div>
                    <?php
                    } else if (isset($_GET["success"])) {
                    ?>
                        <div class="alert alert-success">Password Changed</div>
                    <?php
                    } else if (isset($_GET["missmatch"])) {
                    ?>
                        <div class="alert alert-danger">New Password & Retype Password not match</div>
                    <?php
                    } else if (isset($_GET["password_invalid"])) {
                    ?>
                        <div class="alert alert-danger">Invalid Current Password</div>
                    <?php
                    } else if (isset($_GET["again"])) {
                    ?>
                        <div class="alert alert-danger">Try Again</div>
                    <?php
                    }
                    ?>
                    <form method="post" action="changepass.php">
                        Current Password<input type="password" name="cp" class="form-control" required><br>
                        New Password<input type="password" name="np" class="form-control" required><br>
                        Retype Password<input type="password" name="rp" class="form-control" required><br>
                        <input type="submit" value="Save" class="btn btn-primary">
                    </form>

                </div>
        </div>
    <?php
            } else {
                header("location:logout.php");
            }
    ?>
    </div>


    </body>

    </html>
<?php
} else {
    //header("location:index.php");
}
?>
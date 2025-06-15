<?php

if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    
    if (isset($_GET["empty"])) {
    ?>
        <div class="alert alert-danger">All Field Required</div>
    <?php
    } else if (isset($_GET["success"])) {
    ?>
        <div class="alert alert-success">Message send</div>
    <?php
    } else if (isset($_GET["again"])) {
    ?>
        <div class="alert alert-danger">Try Again</div>
    <?php
    }
    
    $conn = mysqli_connect("localhost", "root", "", "matrimonialprojectmahipal");

    if (!isset($_GET["id"])) {
        //header("location:search.php");
        echo "hello";
    } else {

        $code = $_GET["id"];
        echo "Logged in Email: $email<br>";
        echo "Viewing Code: $code<br>";
        $rs = mysqli_query($conn, "select * from admin where code='$code' AND email<>'$email' ");
        if ($r = mysqli_fetch_array($rs)) {
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
                   
                    <div class="col-lg-8">
                        <form method="post" action="message.php?id=<?= $code ?>">
                            <h6>Message :</h6><br>

                            <textarea name="message" rows=4 class="form-control" required></textarea><br><br>
                            <input type="submit" value="Send" class="btn btn-danger">
                        </form>
            </body>

            </html>
<?php
        }
    }
} else {
    //header("location:logout.php");
    echo "in profile page";
}


?>
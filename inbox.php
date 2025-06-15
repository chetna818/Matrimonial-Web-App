<?php
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    $conn = mysqli_connect("localhost", "root", "", "matrimonialprojectmahipal");

    $rs = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
    if ($r = mysqli_fetch_array($rs)) {
        $code = $r["code"]; // Fix 1
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Inbox</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <style>
                body {
                    margin-top: 20px;
                    background-color: #e2e8f0;
                }
                .msg-preview {
  font-size: 14px;
  color: #333;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 200px; /* adjust width as needed */
}
            </style>
        </head>
        <body>
        <div class="container">
            <h2>Your Inbox</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $inbox = mysqli_query($conn, "SELECT * FROM message WHERE to_code='$code' ORDER BY sn DESC");
                    while ($in = mysqli_fetch_array($inbox)) {
                        $from_email = $in["from_email"];
                         $message = $in["message"];
                        $short_msg = substr($message, 0, 10);
                        $user = mysqli_query($conn, "SELECT * FROM admin WHERE email='$from_email'");
                        $user_rec = mysqli_fetch_array($user);
                        ?>
                       
                        <tr>
                            <td><a href="user.php"><?= $user_rec["fname"] . " " . $user_rec["lname"] ?></a></td>
                            
                           <td class="msg-preview">
  <a href="view_msg.php?id=<?= $in["code"] ?>">
    <?= htmlspecialchars($short_msg) ?>
  </a>
</td>
                            <td><?= $in["date"]  ?></td>
                        </tr>
                        
                        <?php
                    }
                    ?>
                </tbody>
            </table>
           
        </div>
        </body>
        </html>
        <?php
    }
}
?>

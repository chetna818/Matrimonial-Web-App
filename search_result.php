<?php
$conn = mysqli_connect("localhost", "root", "", "matrimonialprojectmahipal");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <style>
    .profile-card {
      margin-bottom: 20px;
    }
    .profile-img {
      width: 100px;
      margin: 20px;
      border-radius: 10px;
    }
    .profile-info {
      padding-top: 20px;
      font-weight: bold;
    }
    

  </style>
</head>
<body>

<div class="container-fluid p-3" style="background-color: #e6f7ff;">

  <div class="row">
    <!-- Main Searched Profiles -->
    <div class="col-lg-8">
      <h4 class="mb-4">Profiles Based on Your Search</h4>
      <?php
      if (isset($_POST["gender"], $_POST["religion"], $_POST["caste"])) {
          $gender = $_POST["gender"];
          $religion = $_POST["religion"];
          $caste = $_POST["caste"];

          $rec = mysqli_query($conn, "SELECT * FROM admin WHERE gender='$gender' AND religion='$religion' AND caste='$caste'");
          while ($record = mysqli_fetch_array($rec)) {
      ?>
        <div class="card profile-card">
          <div class="card-body d-flex">
            <div class="flex-shrink-0">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                   alt="Profile Image" class="img-fluid profile-img">
            </div>
            <div class="flex-grow-1 profile-info">
              <div>Name: <?= $record["fname"] . " " . $record["lname"] ?></div>
              <div>Gender: <?= $record["gender"] ?></div>
              <div>Religion: <?= $record["religion"] ?></div>
              <div>Caste: <?= $record["caste"] ?></div>
              <div class="mt-2">
                <a class="btn btn-sm btn-primary" href="send_message.php?id=<?= $record["code"] ?>">Message</a>
                <a class="btn btn-sm btn-info" href="searched_profile.php?id=<?= $record["code"] ?>">View Profile</a>
              </div>
            </div>
          </div>
        </div>
      <?php
          }
      } else {
          echo "<div class='alert alert-warning'>Search filters are missing.</div>";
      }
      ?>
    </div>

    <!-- Suggested Profiles -->
    <div class="col-lg-4">
      <h5 class="mt-3">Suggested Profiles</h5>
      <div id="record_suggestion"></div>
    </div>
  </div>
</div>

<script>
function fetchRandomData() {
  $.post("random_profiles.php", function(data) {
    let records = JSON.parse(data);
    let html = '';
    records.forEach(function(record) {
      html += `
        <div class="card profile-card">
          <div class="card-body d-flex">
            <div class="flex-shrink-0">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                   alt="Profile Image" class="img-fluid profile-img">
            </div>
            <div class="flex-grow-1 profile-info">
              <div>Name: ${record.fname} ${record.lname}</div>
              <div>Gender: ${record.gender}</div>
              <div>Religion: ${record.religion}</div>
              <div>Caste: ${record.caste}</div>
              <div class="mt-2">
                <a class="btn btn-sm btn-info" href="searched_profile.php?id=${record.code}">View Profile</a>
              </div>
            </div>
          </div>
        </div>`;
    });
   $("#record_suggestion").fadeOut(600, function() {
  $(this).html(html).fadeIn(300);
});

  });
}

fetchRandomData();
setInterval(fetchRandomData, 10000); // update every 10 sec
</script>

</body>
</html>

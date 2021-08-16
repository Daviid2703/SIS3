<?php
  session_start();

  $con = mysqli_connect('localhost', 'codeigniter', 'codeigniter2019', 'SISIII2020_89191217' );
  $sql = "SELECT * FROM Stranka WHERE email = '$_SESSION[username]'";

    $rs = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($rs);
    $email = $row['email'];
    $name = $row['ime'];
    $surname =$row['priimek'];
    $password = $row['geslo'];
?>

<html>
  <head>
    <meta charset="utf-8" lang="sl-SI" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="cssFolder/editProfile.css">
  </head>

  <body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <a class="navbar-brand" href="index.html">Pet Hotel</a>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="registrationChoice.html">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="loginChoice.html">Sign in</a>
        </li>
      </ul>
    </nav>

    <div class="container rounded bg-white mt-5 mb-5">
      <br>
      <div class="row">
        <div class="col-md-3 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" width="150px" src="pictures/profilePicture.jpg">
            <span class="font-weight-bold"><?php echo $_SESSION["name"]; ?></span>
            <span class="text-black-50"><?php echo $_SESSION["username"]; ?></span>
            <span> </span>
          </div>
        </div>


        <div class="col-md-5 border-right">
          <form method="post" action="phpFolder/editProfileCust.php">
          <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="text-right">Profile Settings</h4>
            </div>

            <div class="row mt-2">

              <div class="col-md-6">
                <label class="labels">New name</label>
                <input type="text" class="form-control" name="txtName" value="<?php echo $_SESSION['name']; ?>" placeholder="<?php echo $_SESSION['name']; ?>">
              </div>
              <div class="col-md-6">
                <label class="labels">New surname</label>
                <input type="text" class="form-control" name="txtSurname" value="<?php echo $_SESSION['surName']; ?>" placeholder="<?php echo $_SESSION['surName']; ?>">
              </div>

            </div>

            <div class="row mt-3">
              <div class="col-md-12">
                <label class="labels">E-mail</label>
                <input type="email" class="form-control" name="txtEmail" value="<?php echo $_SESSION['username']; ?>" placeholder="<?php echo $_SESSION['username']; ?>">
              </div>

              <div class="col-md-12">
                <label class="labels">New e-mail</label>
                <input type="email" class="form-control" name="txtNewEmail" value="<?php echo $email; ?>" "placeholder="enter newEmail">
              </div>


              <div class="col-md-12">
                <label class="labels">Password</label>
                <input type="password" name="txtPassword" class="form-control">
              </div>

              <div class="mt-5 text-center">
                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
              </div>
              </form>
              <br>
              <br>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="phpFolder/logout.php">Log out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <?php mysqli_close($con);
?>
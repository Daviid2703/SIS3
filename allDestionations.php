<?php

  session_start();

  $con = mysqli_connect('localhost', 'codeigniter', 'codeigniter2019', 'SISIII2020_89191217' );

  if(!$con){
    die('Could not connect: ' . mysqli_error());
  }
  $dest = $_POST["txtCity"];
  $sql = "SELECT * FROM Oglas WHERE mesto = '$dest'";
  $rs = mysqli_query($con, $sql);
  
$resultset = array();
while ($row = mysqli_fetch_array($rs)) {
  $resultset[] = $row;
}


?>
<html>
  <head>
    <meta charset="utf-8" lang="sl-SI" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style type="text/css">
      .img-thumbnail{
        height: 200px;
        width: 200px;
      }

      body{
        background: linear-gradient(90deg, #99e6ff, #ffb3ff);
        background-attachment: fixed;
      }
  
    </style>
  </head>

  <body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html">Pet Hotel</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="registrationChoice.html">Register</a></li>
        <li><a href="loginChoice.html">Sign in</a></li>
        <li><a href="phpFolder/profile.php">Profile</a></li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
          <?php 
        foreach ($resultset as $result){
        $city = $result['mesto'];
        $country = $result['drzava'];
        $price = $result['cena'];
        $desc = $result['opis_lokacije'];
        $worker = $result['v_id'];
        $sql2 = "SELECT * FROM Varuh WHERE id = '$worker'";
        $rs2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_array($rs2);

        $workerName = $row2['ime'];
        
        
        echo '<div class="col-xs-12 col-sm-4 col-md-2">

          <div class="productbox">
            <img src="pictures/signHotel.png" class="img-thumbnail">
            <div class="producttitle"><strong>'. $city .'</strong>,</div>
            <p class="text-justify"><strong>'. $country .'</strong></p>
            <span>
              <strong>Description:</strong> <br>'. $desc .'
            </span>
            <br>
            <br>
            <br>
            <span>
              <span>Name of Worker: '. $workerName .'</span><br><br>
              <strong>Price: '. $price .'€</strong>
            </span>
            <div class="productprice">
                <div class="pull-right">
                    <a href="#" class="btn btn-success btm-sm" style="margin-right: 35px ;" role="button">Reserve stay</a>
                </div>
 
                </div>
          </div>
        </div>';
      }
      ?>

    </div>
  </div>
  </body>
<?php
    include '../action/likeAction.php';
    include '../action/userAction.php';
    include '../action/matchAction.php';
    include '../action/messageAction.php';  
    $userID = $_GET['user_id'];
    $loggedInUser = $user->getOneUser($userID);
    $username = $loggedInUser['username'];
    $age = $loggedInUser['age'];
    $address = $loggedInUser['address'];
    $gender = $loggedInUser['gender'];
    $likeGender = $loggedInUser['like_gender'];
    $job = $loggedInUser['job'];
    $school = $loggedInUser['school'];
    $hobby = $loggedInUser['hobby'];
    $pic = $loggedInUser['user_image1'];
    $userMessage = $loggedInUser['profile_comment'];

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
  </head>
  <body class="">
 
    <div class="row nav_row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-dark static-top nav_design" id="navheight">
          <a class="nav_letters mt-3 ml-2" href="index.php" id="logo">
            theRightOne
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto mt-4 text-center" style="font-size: 18px;">
              <li class="nav-item mr-5">
                <a class="nav_letters nav_page_letter" href="user_top.php"><i class="fas fa-home"></i>Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav_letters nav_page_letter" href="profile.php"><i class="fas fa-user"></i>Profile</a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav_letters nav_page_letter" href="seeAllMatches.php"><i class="fas fa-heart"></i>Matches</a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav_letters nav_page_letter" href="contact.php"><i class="fas fa-envelope"></i>Contact</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <div class="container-fluid p-0 overflow-hidden">
<!-- profile -->
      <div class="mx-auto mt-5 bg-white border w-50">
        <div class="row">
          <div class="col-md-6 col-sm-12" style="width:300px;">
            <div class="img_box">
              <img src="../upload/<?php echo $pic ?>" alt="" class="profile_pic img-fluid">
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="row mt-2">
              <div class="col-md-6 col-sm-12">
                <p class="info text-center font-weight-bold"><?php echo $username ?></p>
              </div>
              <div class="col-md-6 col-sm-12">
                <p class="info text-center font-weight-bold">age:<?php echo $age ?></p>
              </div>
            </div>
            <div class="row profile_sec">
              <div class="col-md-6 col-sm-12">
                <p class="info text-center"><i class="fas fa-map-marker-alt"></i> <?php echo $address ?></p>
              </div>
              <div class="col-md-6 col-sm-12">
                <p class="info text-center"><i class="fas fa-briefcase"></i> <?php echo $job ?></p>
              </div>
            </div>
            <div class="row profile_sec">
              <div class="col-md-6 col-sm-12">
                <p class="info text-center"><i class="fas fa-school"></i> <?php echo $school ?></p>
              </div>
              <div class="col-md-6 col-sm-12">
                <p class="info text-center"><i class="fas fa-heart"></i> <?php echo $hobby ?></p>
              </div>
            </div>
            <div class="row profile_sec">
              <div class="col-12">
                <p class="mt-3 info text-break mx-3"><?php echo $userMessage?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
          
           
      <div class="row">
        <div class="col-12">
          <div class="w-50 mx-auto">
            <a href="addMoreInfo.php" class="btn btn-block btn-red mt-4 btn-lg"> Edit Profile</a>
          </div>
        </div>
      </div>
                
      <div class="row">
        <div class="col-12">
          <div class="w-50 mx-auto">
            <a href="deleteUser.php" class="btn btn-block btn-dark btn-lg mt-4">Delete Account</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
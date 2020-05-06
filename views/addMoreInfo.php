<?php
    include '../action/userAction.php';
    $userID = $_SESSION['user_id'];
    $loggedInUser = $user->getOneUser($userID);
    $age = $loggedInUser['age'];
    $userAddress = $loggedInUser['address'];
    $gender = $loggedInUser['gender'];
    $likeGender = $loggedInUser['like_gender'];
    $job = $loggedInUser['job'];
    $school = $loggedInUser['school'];
    $hobby = $loggedInUser['hobby'];
    $pic = $loggedInUser['user_image1'];
    $profileComment = $loggedInUser['profile_comment'];
    $addresses = array(
      'hokkaido','aomori',' iwate',' miyagi','akita','yamagata','fukushima','ibaraki','tochigi','gunma','saitama','chiba','tokyo','kanagawa','niigata','toyama','ishikawa','fukui','yamanashi','nagano','gifu','shizuoka','aichi','mie','shiga','kyoto','osaka','hyogo','nara','wakayama','tottori','shimane','okayama','hiroshima','yamaguchi','tokushima','kagawa','ehime','kochi','fukuoka','saga','nagasaki','kumamoto','oita','miyazaki','kagoshima','okinawa','overseas'
    );
    $genders = array('Male','Female')
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
    $(function(){
      $('#myfile').change(function(e){
        var file = e.target.files[0];
        var reader = new FileReader();
    
        if(file.type.indexOf("image") < 0){
          alert("画像ファイルを指定してください。");
          return false;
        }
    
        reader.onload = (function(file){
          return function(e){
            $("#img1").attr("src", e.target.result);
            $("#img1").attr("title", file.name);
          };
        })(file);
        reader.readAsDataURL(file);
    
          });
        });
        function countLength( text, field ) {
        document.getElementById(field).innerHTML = text.length;
      }
    </script>
  </head>
  <body class="">
  <div class="row m-0 p-0 nav_row" id="navheight">
      <div class="col-12">
        
        <nav class="navbar navbar-expand-lg navbar-dark static-top nav_design">
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
                <a class="nav_letters nav_page_letter" href="contact.php"><i class="fas fa-envelope"></i>Contact</a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav_letters nav_page_letter" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <div class="container">
      <div class="mx-auto border border-0 w-50 mt-4">
        <div class="text-dark border-0  mb-3">
          <h2 class="text-center display-4 border-bottom">Your Profile</h2>
        </div>
            
        <form action="../action/userAction.php" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12 mb-4">
              <label for="address">Address:</label>
                <select name="address" id="address" class="w-100 form-control">
                  <?php
                    if($userAddress):
                  ?>
                    <?php 
                    $addresses = array_diff($addresses,array($userAddress));
                    $addresses = array_values($addresses);
                    ?>
                    <option value="<?php echo $userAddress ?>" selected><?php echo $userAddress ?></option>
                    <?php else: ?>
                    <option value="" selected disabled  class="form-control">Address</option>
                    
                  <?php endif; ?>
                  <?php
                    foreach($addresses AS $address):
                    ?>
                    <option value="<?php echo $address ?>"><?php echo $address ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12 mb-4">
              <label for="age">Age:</label>
              <input type="number" name="age" id="age" class="p-4 form-control" placeholder="age" value="<?php echo $age ?>">
            </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12 mb-4">
              <label for="like">Your Interest:</label>
                <select name="like" id="like" class="w-100 form-control">
                  <?php
                    if($likeGender):
                    $genders = array_diff($genders,array($likeGender));
                    $genders = array_values($genders);
                  ?>
                    <option value="<?php echo $likeGender?>" selected class="form-control"><?php echo $likeGender?></option>
                    
                  <?php
                    else:
                  ?>
                    <option value="" selected disabled  class="form-control">Looking for</option>
                  <?php
                    endif;
                  ?>
                  <?php
                    foreach($genders AS $gender):
                    ?>
                    <option value="<?php echo $gender ?>"><?php echo $gender ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12 mb-4">
              <label for="job">Job:</label>
              <input type="text" name="job" id="job" class="p-4 form-control" placeholder="job" value="<?php echo $job?>">
            </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12 mb-4">
              <label for="school">School</label>
              <input type="text" name="school" id="school" class="p-4 form-control" placeholder="school" value="<?php echo $school ?>">
            </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12 mb-4">
              <label for="hobby">Hobby:</label>
              <input type="text" name="hobby" id="hobby" class="p-4 form-control" placeholder="Your Hobby" value="<?php echo $hobby ?>">
            </div>
            <br>
            <div class="form-group col-12 mb-4">
              <textarea name="profile_message" id="" cols="40" rows="5" class="form-control" placeholder="Your Message (the maximum amount of characters is 200)"  maxlength="200" onKeyUp="countLength(value, 'textlength');"><?php echo $profileComment?></textarea>
              <span id="textlength">0</span><span>/200</span>
            </div>
            <br>
            <br>
            <div class="form-group col-md-12">
                  <button type="submit" class="btn-red form-control text-uppercase btn-lg" name="add">Edit</button>
            </div>
            <div class="form-group col-md-12">
                  <button type="submit" class="btn-grey form-control text-uppercase btn-lg" name="skip">Cancel</button>
            </div>
            </div>
          </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
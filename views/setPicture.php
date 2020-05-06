<?php
    include '../action/userAction.php';
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

    <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h4><div class="modal-title" id="welcomeModalLabel">Welcome to "THE RIGHT ONE"!</div></h4>
          </div>  
          <div class="modal-body">
            First, please fill set up your profile picture and fill up the profile! <br>You can change it from setting anytime later.
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-red" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <h1 class="display-4 mt-5 text-center">Set your profile picture</h1>
      <form action="" method="post" class="mt-5" enctype="multipart/form-data">
      <div class="form-group form-control-lg w-50 mx-auto">
        <div class="custom-file form-group">
          <input type="file" name="pic" class="custom-file-input" id="inputFile">
          <label class="custom-file-label" for="inputFile">Choose a file or drag and drop a file here</label>
        </div>
      </div>
      <div class="mx-auto img_area" style="width:20%;">
        <div class="img_box">
          <img src="" alt="" id="img1" class="profile_pic img-fluid">
        </div>
      </div>
        <button type="submit" name="update_photo" class="btn btn-red btn-block mt-5 btn-lg w-50 mx-auto" value="info">Submit</button>
        <a href="addMoreInfo.php" class="btn btn-block btn-grey mt-5 btn-lg w-50 mx-auto">Skip</a>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script>
    $(function(){
      $('#inputFile').change(function(e){
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
    </script>
    <script>
      bsCustomFileInput.init();
    </script>
    <script>
      $(window).on('load',function(){
      $('#welcomeModal').modal('show');
      });
    </script>
  </body>
</html>
<?php
  include '../action/contactAction.php';
  include '../action/userAction.php';
  if(!isset($_SESSION['user_id'])){
    header('Location:index.php');
    exit();
  }
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
    <script>
    $(function(){
      $('#myfile').change(function(e){
        //ファイルオブジェクトを取得する
        var file = e.target.files[0];
        var reader = new FileReader();
    
        //画像でない場合は処理終了
        if(file.type.indexOf("image") < 0){
          alert("画像ファイルを指定してください。");
          return false;
        }
    
        //アップロードした画像を設定する
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
      <div class="mx-auto border border-0 w-50 mt-5" style="">
        <div class="text-dark border-0  mb-3">
            <h2 class="text-center display-4 border-bottom">Contact</h2>
        </div>
        <form action="" method="post">
          <div class="form-row">
            <div class="form-group col-md-12 col-sm-12 col-xs-12 mb-4">
              <label for="category">Category:</label>
                <select name="category" id="category" class="w-100 form-control" required>
                    <option value="" selected disabled>Category</option>
                    <option value="feedback">Your Feedback</option>
                    <option value="recruitment">About Recruitment</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <div class="form-group col-md-12 col-sm-12 col-xs-12 mb-4">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <br>
            <div class="form-group col-12 mb-4">
              <textarea name="content" id="" cols="40" rows="5" class="form-control" placeholder="Your Message (the maximum amount of characters is 200)"  maxlength="200" onKeyUp="countLength(value,'textlength');" required><?php echo $profileComment?></textarea>
              <span id="textlength">0</span><span>/200</span>
            </div>
            <br>
            <div class="form-group col-md-12">
                  <button type="submit" class="btn-red form-control text-uppercase btn-lg" name="contact">Send</button>
            </div>
            <div class="form-group col-md-12">
                  <button type="submit" class="btn-grey form-control text-uppercase btn-lg" name="cancel">Cancel</button>
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
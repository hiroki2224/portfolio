<?php
  include '../action/matchAction.php';
  include '../action/userAction.php';
  include '../action/messageAction.php';  
  $userID = $_SESSION['user_id'];
  $allMatchedID = $match->getAllMatchedID($userID);
  foreach($allMatchedID as $eachID){
    $matchUsers[] = $user->getOneUser($eachID);
  }
  $messageArray = array();
    $textTimeArray = array();
    $messageValueArray = array();
    foreach($matchUsers as $matchUser){
      $matchUserID = $matchUser['user_id'];
      $latestMessages = $message->getTheLatestMessage($userID,$matchUserID);
      array_push($textTimeArray,$latestMessages['created_at']);
      $messageValueArray[] = array(
                                  'user_id1' => $latestMessages['user_id'],
                                  'user_id2' => $latestMessages['received_user_id'],
                                  'content' => $latestMessages['textmessage'],
      );
    }
    $messageArray = array_combine($textTimeArray,$messageValueArray);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
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

    <div class="container-fluid">
      <div class="row">
        <div class="col-2 d-md-block d-none" id="sidebar">
            <!-- tab -->
          <ul class="nav nav-tabs">
            <li class="active nav-item"><a href="#matches" data-toggle="tab" class="nav-link tabname">MATCHES</a></li>
            <li class="nav-item"><a href="#messages" data-toggle="tab" class="nav-link tabname">MESSAGES</a></li>
          </ul>
            <!-- tab 終了 -->
            <!-- tab content -->
          <div class="tab-content">
                <!-- matches tab-pane開始 -->
            <div class="tab-pane active" id="matches">
              <div class="row">
                <?php foreach($matchUsers as $matchUser): ?>
                  <div class="col-md-6 col-sm-12 m-0 p-1">
                    <a href="matchProfile.php?user_id=<?php echo $matchUser['user_id'] ?>">
                      <img src="../upload/<?php echo $matchUser['user_image1']?>" alt="" style="height:100%; width:100%;margin:0px; padding:0px;">
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
                <!-- matches tab-pane終 -->
                <!-- message tab-pane -->
            <div class="tab-pane" id="messages">
                    
              <?php 
              krsort($messageArray);
              foreach ($messageArray as $key => $eachMessage):
              $messageUserID1 = $eachMessage['user_id1'];
              $messageUserID2 = $eachMessage['user_id2'];
              if($messageUserID1 == $userID){
                $messageUserID = $messageUserID2;
              }else{
                $messageUserID = $messageUserID1;
              }
              $messageUser = $user->getOneUser($messageUserID);
              ?>
                <a href="direct_message.php?user_id=<?php echo $messageUser['user_id'] ?>">
                  <div class="row">
                    <div class="col-3">
                      <img src="../upload/<?php echo $messageUser['user_image1'] ?>" alt="" style="height:80px; width:60px;">
                    </div>
                    <div class="col-8 offset-1">
                      <span class="message_user"><?php echo $messageUser['username']; ?></span>
                      <br>
                      <?php 
                        if($eachMessage['user_id1'] == $userID):
                      ?>
                      <i class="fas fa-undo-alt"></i>
                      <?php endif; ?>
                      <?php echo $eachMessage['content']; ?>
                    </div>
                  </div>
                </a>
              <?php endforeach?>
      
            </div>
          </div>
              <!-- tab content 終了 -->
        </div>
        <div class="col-10">
          <div class="row mt-4">
            <?php foreach($matchUsers as $matchUser): ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="mx-auto" style="width:180px;">
                <div class="img_box">
                    <a href="matchProfile.php?user_id=<?php echo $matchUser['user_id']?>">
                      <img src="../upload/<?php echo $matchUser['user_image1'] ?>" alt="" class="profile_pic img-fluid img-thumbnail">
                    </a>
                </div>
                <div class="text-center" style="width:100%;">
                  <?php echo $matchUser['username'] ?>
                </div>
              </div>
            </div>
            <?php endforeach;?>
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
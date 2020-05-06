<?php
    include '../action/userAction.php';
    $allUsers = $user->getAllUsers();
    $page = $_GET['page'];
    if($page == ''){
      $page = 1;
    }
      $page = max($page,1);
      
      $cntUsers = $user->countUsers();
      $maxPage = ceil($cntUsers['cnt'] / 10);
      $page = min($page,$maxPage);
      $start = ($page -1) * 10;
      $tenUsers = $user->getTenUsers($start);
      $pages = array();
      for($i=1; $i<=$maxPage; $i++){
        array_push($pages,$i);
      };
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
    <link rel="stylesheet" href="../css/admin.css">
  </head>
  <body>
    <div class="row nav_row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-dark static-top nav_design">
          <a class="mt-3 ml-2 nav_letters" href="index.php" id="logo">
            theRightOne
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto mt-4" style="font-size: 18px;">
              <li class="nav-item mr-5">
                <a class="nav_letters nav_page_letter" href="adminTop.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav_letters nav_page_letter" href="user_list.php">User List</a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav_letters nav_page_letter" href="user_feedback.php">User Feedback</a>
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
        <div class="col-md-8 offset-md-2 col-sm-12">
          <table class="mx-auto table-bordered table-striped mt-5 table-hover w-100">
            <thead>
              <tr>
                <th class="w-25">userID</th>
                <th class="w-25">username</th>
                <th class="w-25">Edit</th>
                <th class="w-25">Delete</th>
             </tr>
            </thead>
            <tbody>
              <?php
                foreach($tenUsers as $eachUser):
              ?>
              <tr>
                <td><?php echo $eachUser['user_id']?></td>
                <td><?php echo $eachUser['username'] ?></td>
                <td><a href="user_profile.php?user_id=<?php echo $eachUser['user_id']?>">Edit</a></td>
                <td><a href="user_delete.php?user_id=<?php echo $eachUser['user_id'] ?>">Delete</td>
              </tr>
              <form action="user_profile.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $eachUser['user_id']?>">
              </form>
              <?php
                endforeach;
              ?>
            </tbody>
          </table>
          <ul class="p-0 mt-2 overflow-hidden page">
            <?php if($page > 1):?>
                <li><a href="user_list.php?page=<?php print(htmlspecialchars($page-1))?>" class="">Back</a></li>
            <?php endif; ?>
            <?php foreach($pages as $eachPage): ?>
              <?php if($eachPage == $page): ?>
                <a href="user_list.php?page=<?php print(htmlspecialchars($eachPage))?>" class="thisPage"><?php echo $eachPage ?></a>
              <?php else: ?>
                <a href="user_list.php?page=<?php print(htmlspecialchars($eachPage))?>" class=""><?php echo $eachPage ?></a>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php if($page < $maxPage): ?>
              <li class=""><a href="user_list.php?page=<?php print(htmlspecialchars($page+1))?>" class="">Next</a></li>
            <?php endif; ?>
          </ul>
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
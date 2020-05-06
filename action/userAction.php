<?php
    require_once '../class/User.php';
    $user = new User();
    session_start();

    if(isset($_POST['register'])){
        $username = htmlspecialchars($_POST['username'],ENT_QUOTES);
        $gender = $_POST['gender'];
        $likeGender = $_POST['like_gender'];
        $email = htmlspecialchars($_POST['email'],ENT_QUOTES);
        $password = htmlspecialchars(md5($_POST['password']),ENT_QUOTES);
        $check = $user->checkExistedAccount($email);
        if($check == TRUE){
            return $_SESSION['duplicate_error'] = TRUE;
        }elseif($check == FALSE){
            $user->createAccount($username,$gender,$likeGender,$email,$password);
            header('Location:../views/index.php');
            exit();
        }
    }
    elseif(isset($_POST['add'])){
        $address = htmlspecialchars($_POST['address'],ENT_QUOTES);
        $age = htmlspecialchars($_POST['age'],ENT_QUOTES);
        $gender = htmlspecialchars($_POST['gender'],ENT_QUOTES);
        $likeGender = htmlspecialchars($_POST['like'],ENT_QUOTES);
        $job = htmlspecialchars($_POST['job'],ENT_QUOTES);
        $school = htmlspecialchars($_POST['school'],ENT_QUOTES);
        $hobby = htmlspecialchars($_POST['hobby'],ENT_QUOTES);
        $userID = htmlspecialchars($_SESSION['user_id'],ENT_QUOTES);
        $profileMessage = htmlspecialchars($_POST['profile_message'],ENT_QUOTES);
        $result = $user->addDetails($address,$age,$likeGender,$job,$school,$hobby,$profileMessage,$userID);



        if($result == 1){
            if($_SESSION['login_times'] == 1){
                header('Location:../views/user_top.php');
            }else{
                header('Location:../views/profile.php');
            }
        }else{
            echo 'Error';
        }
    }
    elseif(isset($_POST['skip'])){
        if($_SESSION['login_times'] == 1){
            header('Location:../views/user_top.php');
        }else{
            header('Location:../views/profile.php');
        }
    }
    elseif(isset($_POST['login'])){
        $email = htmlspecialchars($_POST['email'],ENT_QUOTES);
        $password = htmlspecialchars(md5($_POST['password']),ENT_QUOTES);
        
        $login = $user->login($email,$password);
        if ($login) {
            $_SESSION['user_id'] = $login['id'];
            if ($login['status'] == 'A') {
                header('Location: ../views/adminTop.php');
            } else {
                $user->updateLoginTimes($_SESSION['user_id']);
                $loginTimes = $user->getLoginTimes($_SESSION['user_id']);
                $_SESSION['login_times'] = $loginTimes;
                if($_SESSION['login_times'] == 1){
                    header("Location: ../views/setPicture.php");
                }else{
                    header("Location: ../views/user_top.php");
                }
            }
        }else {
            return $_SESSION['login_error'] = TRUE;
        }
    }
    elseif(isset($_POST['update_photo'])){
        $pic = $_FILES['pic']['name'];
        $userID = $_SESSION['user_id'];
        $btnValue = htmlspecialchars($_POST['update_photo'],ENT_QUOTES);
        $target_dir = "../upload/";
        $target_file = $target_dir.basename($_FILES["pic"]["name"]);
        $result = $user->updatePhoto($pic,$userID);
        if($result == TRUE){
            move_uploaded_file($_FILES['pic']['tmp_name'],$target_file);
            if($btnValue == "profile"){
                header('Location:../views/profile.php');
            }else{
                header('Location:../views/addMoreInfo.php');
            }
        }else{
            echo 'Error';
        }
    }

?>
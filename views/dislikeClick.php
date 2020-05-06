<?php
    include '../action/userAction.php';
    include '../action/dislikeAction.php';

    $userID = $_SESSION['user_id'];
    $receivedUserID = $_SESSION['selected_id'];

    $dislike->sendDislike($userID,$receivedUserID);
    if($dislike==TRUE){
        header('Location:user_top.php');
    }else{
        return FALSE;
    }
?>
<?php
    include '../action/userAction.php';
    $userID = $_GET['user_id'];
    $user->deleteUser($userID);
?>
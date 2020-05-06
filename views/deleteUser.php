<?php
    include '../action/userAction.php';
    $userID = $_SESSION['user_id'];
    $user->deleteUser($userID);
?>
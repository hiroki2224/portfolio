<?php
    include '../action/userAction.php';
    session_destroy();

    header('Location:../views/index.php');
?>
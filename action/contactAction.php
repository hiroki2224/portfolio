<?php
    require_once '../class/Contact.php';
    session_start();
    $contact = new Contact;
    if(isset($_POST['contact'])){
        $userID = $_SESSION['user_id'];
        $category = htmlspecialchars($_POST['category']);
        $subject = htmlspecialchars($_POST['subject'],ENT_QUOTES);
        $content = htmlspecialchars($_POST['content'],ENT_QUOTES);
        $reportedID = $_POST['reported_id'];
        if($_POST['reported_id']){
            $contact->sendContact($userID,$category,$subject,$content,$reportedID);
        }else{
            $contact->sendContact($userID,$category,$subject,$content,Null);
        }
    }
?>
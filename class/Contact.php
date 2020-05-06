<?php
    require_once "Database.php";
    class Contact extends Database{

        public function sendContact($userID,$category,$subject,$content,$reportedID){
            $sql = "INSERT INTO contacts(user_id,category,title ,content,reported_id)VALUES('$userID','$category','$subject','$content','$reportedID')";
            $result = $this->conn->query($sql);
            if($result==TRUE){
                header('Location:../views/contact.php');
                exit();
            }else{
                die('cannot send the feedback '.$this->conn->error);
            }
        }
        public function getAllContacts(){
            $sql = "SELECT * FROM contacts";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                while($tableData = $result->fetch_assoc()){
                $dataHolder[] = $tableData;
            }
                return $dataHolder;
            }else{
                die("No record Found: ".$this->conn->error);
            }
        }
        public function countContacts(){
            $sql = "SELECT COUNT(*) AS cnt FROM contacts";
            $result = $this->conn->query($sql);
            if($result->num_rows>0){
                return $result->fetch_assoc();
            }else{
                return FALSE;
            }
        }
        public function getTenContacts($start){
            $sql = "SELECT * FROM contacts LIMIT $start,10";
            $result = $this->conn->query($sql);
            if($result->num_rows>0){
                while($tableData = $result->fetch_assoc()){
                    $dataHolder[] = $tableData;
                }
                return $dataHolder;
            }else{
                return FALSE;
            }
        }
    }
<?php
    require_once "Database.php";
    
    class Dislike extends Database{
        function sendDislike($userID,$receivedID){
            $sql = "INSERT INTO dislikes(user_id,received_user_id)VALUES($userID,$receivedID)";
            $result = $this->conn->query($sql);
            // return $sql;
            if($result->num_rows == TRUE){
                return TRUE;
            }else{
                echo 'error';
            }
        }

        function getOnesDislikes($userID){
            $sql = "SELECT received_user_id FROM dislikes WHERE user_id = $userID";
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
?>
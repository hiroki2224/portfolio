<?php
    require_once "Database.php";
    
    class Like extends Database{
        function countLikesADay($userID){
            $sql = "SELECT COUNT(*) AS number FROM likes WHERE user_id = '$userID' AND created_at > (NOW() - INTERVAL 1 DAY)";
            $result = $this->conn->query($sql);
            if($result){
                return $result->fetch_assoc();
            }else{
                return 0;
            }
        }
        function sendLike($yourID,$receivedID){
            $sql = "INSERT INTO likes(user_id,received_user_id,created_at)VALUES('$yourID','$receivedID',NOW())";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                return TRUE;
                // header("Location:../views/user_top.php");
                // echo 'success';
            }else{
                die('cannot send like '.$this->conn->error);
            }
        }
        function checkLike($receivedID,$yourID){
            $sql = "SELECT * FROM likes where user_id = '$receivedID' AND received_user_id = '$yourID' ";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                $addMatchSql = "INSERT INTO matches(user_id1,user_id2)VALUES('$yourID','$receivedID')";
                $addResult = $this->conn->query($addMatchSql);
                if($addResult == TRUE){
                    return 'Match';
                }else{
                    die('CANNOT MAKE MATCH '.$this->conn->error);
                }
            }else{
                return TRUE;
            }
        }

        function getOnesLikes($userID){
            $sql = "SELECT received_user_id FROM likes WHERE user_id = $userID";
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
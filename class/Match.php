<!-- Problem -->
<!-- // "print_r($testData)" returns 2 so I thought "print_r($result->fetch_assoc())" would return the information of user whose use_id = 2 but it would return the one with user_id = 3
    // Why does it happen??? -->


<?php
    require_once "Database.php";
    class Match extends Database{
        public function getAllMatchedID($userID){
            // $sql = "SELECT  user_id FROM users WHERE user_id =6 ";
            //             // --  (SELECT user_id2 FROM matches WHERE user_id1 = $userID)";
            // $result = $this->conn->query($sql);
            // $sql2 = "SELECT  * FROM users WHERE user_id >
            //             (SELECT user_id2 FROM matches WHERE user_id1 = 1)";
            $search1 = "SELECT user_id2 FROM matches WHERE user_id1 = $userID";
            $search2 = "SELECT user_id1 FROM matches WHERE user_id2 = $userID";
            $search1Result = $this->conn->query($search1);
            $search2Result = $this->conn->query($search2);
            if($search1Result->num_rows + $search2Result->num_rows > 0){
                // $allData = array();
                while($data = $search1Result->fetch_assoc()){
                    $allData[] = $data['user_id2'];
                }
                while($data = $search2Result->fetch_assoc()){
                    $allData[] = $data['user_id1'];
                }
                return $allData;
                // foreach($allData as $oneData){
                //     $matchIDSql = "SELECT  user_id FROM users WHERE user_id = $oneData ";
                //     $result[] = $this->conn->query($matchIDSql);
                // }
            }

            // $testResult = $this->conn->query($sql1);
            // if($testResult->num_rows>0){
            //     $allData = array();
            //     while($data = $testResult->fetch_assoc()){
            //         $allData[] = $data;
            //     }
            //     return $allData;
            // }
            // return $testResult->fetch_assoc();
           
            
            // // $result2 = $this->conn->query($sql2);
            // if($result->num_rows > 0){
            //     print_r($result->fetch_assoc());
            // }else{
            //     return 'NO MATCH YET';
            // }
        }
        public function seeIfTheyreMatched($userID,$userID2){
            $search1 = "SELECT count(*) as count FROM matches WHERE user_id1 = $userID AND user_id2 = $userID2";
            $search2 = "SELECT count(*) as count FROM matches WHERE user_id1 = $userID2 AND user_id2 = $userID";
            $search1Result = $this->conn->query($search1);
            $search2Result = $this->conn->query($search2);
            if($search1Result->num_rows + $search2Result->num_rows > 0){
                $result1 = $search1Result->fetch_assoc();
                $result2 = $search2Result->fetch_assoc();
                return $result1['count'] + $result2['count'];
                // header('Location:../index.php');
            }else{
                echo 'error';
            }
        }
    }
?>
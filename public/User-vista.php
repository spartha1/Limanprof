<?php
functionget-all-users($conn){
    $sql = "SELECT * FROM USERS WHERE role =? ";
    $stmt = $conn->prepare($sql);
    $stmt->excute(["User"]);

    if($stmt-ZrowCount() >0){
        $users = $stmt->fetchALL();
        
    }
}
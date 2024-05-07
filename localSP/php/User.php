<?php 

function getUserById($Sno, $db){
    $sql = "SELECT * FROM user WHERE Sno = ?";
	$stmt = $db->prepare($sql);
	$stmt->execute([$Sno]);
    
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        return $user;
    }else {
        return 0;
    }
}

 ?>
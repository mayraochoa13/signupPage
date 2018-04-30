<?php
    
    include './dbConnection.php';
    //$conn = connecToDB("lab8");
    $conn = connecToDB("heroku_83d3890dcc2d78f");
    $username = $_GET['username'];
    //$sql = "SELECT * FROM lab8_user WHERE username= '$username' ";
    $sql = "SELECT * FROM lab8_user WHERE username= :username ";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($record);
?>
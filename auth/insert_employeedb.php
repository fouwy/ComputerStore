<?php
    function insertEmployee($name,$phone,$username,$password){
        global $dbh;
        $stmt=$dbh->prepare('INSERT INTO person (name,phone_number,username,password)VALUES(?,?)');
        $stmt->execute(array($name,$phone,$username,$password));
    }
?>
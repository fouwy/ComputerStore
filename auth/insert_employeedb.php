<?php
    function insertPerson($name,$phone,$username,$password){
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO person (name,phone_number,username,password)VALUES(?,?,?,?)');
        $stmt->execute(array($name,$phone,$username,$password));

        return $dbh->lastInsertId();
    }

    function assignEmployeeToPerson($personId) {
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO employee VALUES(?)');
        $stmt->execute(array($personId));
    }

    function attachEmployeeToPerson($name, $phone, $username, $password) {
        global $dbh;
        try {
        //make sure foreign key constraint is ON
        $dbh->exec('PRAGMA foreign_keys = ON');

        $dbh->beginTransaction();
        $personId = insertPerson($name, $phone, $username, $password);
        assignEmployeeToPerson($personId);
        $dbh->commit();
        } catch(PDOException $e) {
            //rollback update
            $dbh->rollBack();

            throw $e;
        }

    }
?>
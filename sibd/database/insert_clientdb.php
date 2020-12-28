<?php
    include 'insert_employeedb.php';

    function assignClientToPerson($personId, $addr, $tax_id) {
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO client VALUES(?,?,?)');
        $stmt->execute(array($personId, $addr, $tax_id));
    }

    function attachClientToPerson($name, $phone, $username, $password, $addr, $tax_id) {
        global $dbh;
        try {
        //make sure foreign key constraint is ON
        $dbh->exec('PRAGMA foreign_keys = ON');

        $dbh->beginTransaction();
        $personId = insertPerson($name, $phone, $username, $password);
        assignClientToPerson($personId, $addr, $tax_id);
        $dbh->commit();

        } catch(PDOException $e) {
            //rollback update
            $dbh->rollBack();
            throw $e;
        }
    }

    function isClientLoginValid($username, $password) {
        global $dbh;
        $stmt = $dbh->prepare(' SELECT person.name 
                                FROM client JOIN person USING(id)
                                WHERE username=? AND password=?');

        $stmt->execute(array($username, sha1($password)));

        return $stmt->fetch();
    }
?>
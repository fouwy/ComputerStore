<?php
    function insertModel($brand, $model_year){
        global $dbh;
        $stmt = $dbh->prepare(' INSERT INTO model (model_year, brand)
                                VALUES(?,?)');
        $stmt->execute(array($model_year, $brand));

        return $dbh->lastInsertId();
    }

    function getClientID($client) {
        global $dbh;
        $stmt = $dbh->prepare(' SELECT id 
                                FROM client JOIN person USING(id)
                                WHERE name=?');
         $stmt->execute(array($client)); 
         
         return $stmt->fetch();
    }

    function assignModelToComputer($client_id ,$model_id) {
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO computer(client_id, model_id) VALUES(?,?)');
        $stmt->execute(array($client_id, $model_id));

        return $dbh->lastInsertId();
    }

    function insertComputerInDB($client, $brand, $model_year) {
        global $dbh;
        try {
            //make sure foreign key constraint is ON
            $dbh->exec('PRAGMA foreign_keys = ON');
    
            $dbh->beginTransaction();
            $model_id = insertModel($brand, $model_year);
            $client_id = getClientID($client);
            $computer_id = assignModelToComputer($client_id["id"], $model_id);
            $dbh->commit();
            } catch(PDOException $e) {
                //rollback update
                $dbh->rollBack();
    
                throw $e;
            }
            return $computer_id;
    }

?>
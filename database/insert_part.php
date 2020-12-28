<?php
    function addPart(   $service_id, $part, $price, $category, 
                        $serial_num, $quantity) {

        global $dbh;
        try {
            $dbh->exec('PRAGMA foreign_keys = ON');
            $dbh->beginTransaction();

            $stmt = $dbh->prepare('INSERT INTO part
                                (name, serial_num, price, category, service_id)
                                VALUES (?,?,?,?,?)');
            $stmt->execute(array($part, $serial_num, $price, $category, $service_id));
            $part_id = $dbh->lastInsertId();

            $stmt = $dbh->prepare('INSERT INTO QuantityNeededForService
                                (partid, quantity, serviceid)
                                VALUES (?,?,?)');
            $stmt->execute(array($part_id, $quantity, $service_id));

            //TODO: Adicionar o preco ao total do servico
            $stmt = $dbh->prepare('SELECT total FROM SERVICE WHERE id=?');
            $stmt->execute(array($service_id));

            $total = $stmt->fetch();
            $total = $total["total"] + $price;

            $stmt = $dbh->prepare('UPDATE service SET total=?  WHERE id=?');
            $stmt->execute(array($total, $service_id));

            $dbh->commit();
        } catch (PDOException $e) {
            $dbh->rollBack();
            throw $e;
        }
    }

?>
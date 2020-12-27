<?php
    function editService($service_id, $finish_date, $deliv_date, $price) {

        global $dbh;
        try {
            $dbh->exec('PRAGMA foreign_keys = ON');
            $dbh->beginTransaction();

            $query = 'UPDATE service SET';
            $params = array();

            if ($deliv_date != '') {
                $query = $query . ' delivery_date=?';
                $params[] = $deliv_date;
            }
            if ($finish_date != '') {
                $query = $query . ', finish_date=?';
                $params[] = $finish_date;
            }
            if ($price != '') {
                $query = $query . ', total=?';
                $params[] = $price;
            }

            $params[] = $service_id;
            $query = $query . ' WHERE id=?';

            $stmt = $dbh->prepare($query);
            $stmt->execute($params);

            $dbh->commit();
        } catch (PDOException $e) {
            $dbh->rollBack();
            throw $e;
        }
    }
?>
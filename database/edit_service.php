<?php
    function editService($service_id, $finish_date, $deliv_date, $price) {

        global $dbh;
        try {
            $dbh->exec('PRAGMA foreign_keys = ON');
            $dbh->beginTransaction();

            if ($deliv_date != '') {
                $stmt = $dbh->prepare('UPDATE service SET delivery_date=?  WHERE id=?');
                $stmt->execute(array($deliv_date, $service_id));
            }
            if ($finish_date != '') {
                $stmt = $dbh->prepare('UPDATE service SET finish_date=?  WHERE id=?');
                $stmt->execute(array($finish_date, $service_id));
            }
            if ($price != '') {
                $stmt = $dbh->prepare('UPDATE service SET total=?  WHERE id=?');
                $stmt->execute(array($price, $service_id));
            }

            $dbh->commit();
        } catch (PDOException $e) {
            $dbh->rollBack();
            throw $e;
        }
    }
?>
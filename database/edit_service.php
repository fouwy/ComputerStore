<?php
    include 'insert_service.php';

    function editService($service_id, $finish_date, $deliv_date, $price, $tests, $times, $prices) {

        global $dbh;
        try {
            $dbh->exec('PRAGMA foreign_keys = ON');
            $dbh->beginTransaction();

            //Add Tests to Service
            $stmt = $dbh->prepare('SELECT total FROM SERVICE WHERE id=?');
            $stmt->execute(array($service_id));
            $total = $stmt->fetch();

            foreach($tests as $test) {
                if ($test == "ram") {
                    $i = 0;    
                } else if ($test == "cpu") {
                    $i = 1;
                } else if ($test == "gpu") {
                    $i = 2;
                }
                addTest($service_id, $test, $times[$i], $prices[$i]);
                $total["total"] += $prices[$i];
            }
            $stmt = $dbh->prepare('UPDATE service SET total=?  WHERE id=?');
            $stmt->execute(array($total["total"], $service_id));

            //Update dates or total cost
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
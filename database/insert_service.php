<?php
    function addService($adm_date, $finish_date, $deliv_date,   
                        $service_by, $item, $tests, $times, $prices) {
        
        global $dbh;
        
        try {
            $dbh->exec('PRAGMA foreign_keys = ON');
            $dbh->beginTransaction();
            
            //Insert service and leave total at 1 for now
            $stmt = $dbh->prepare(' INSERT INTO service(
                                adm_date, delivery_date, finish_date,
                                service_by, service_item, total)
                                VALUES (?,?,?,?,?,?)');
            $stmt->execute(array($adm_date, $deliv_date, $finish_date, 
                                $service_by, $item, 1));
            
            $service_id = $dbh->lastInsertId();
            
            $total = 0;
            //Add each test and accumulate the prices
            foreach($tests as $test) {
                if ($test == "ram") {
                    $i = 0;    
                } else if ($test == "cpu") {
                    $i = 1;
                } else if ($test == "gpu") {
                    $i = 2;
                }
                addTest($service_id, $test, $times[$i], $prices[$i]);
                $total += $prices[$i];
            }
            $stmt = $dbh->prepare(' UPDATE service SET total = ?
                                    WHERE id = ?');
            $stmt->execute(array($total, $service_id));
            $dbh->commit();
        } catch (PDOException $e) {
            $dbh->rollBack();
            throw $e;
        }        
        return $service_id;
    }

    function addTest($service_id, $test, $time_needed, $price) {
        global $dbh;

        $stmt = $dbh->prepare(' INSERT INTO test
                            (name, time_needed, ontheservice, price)
                            VALUES (?,?,?,?)');
        $stmt->execute(array($test, $time_needed, $service_id, $price));

    }
?>

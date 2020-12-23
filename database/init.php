<?php
    //deve haver melhor maneira de fazer isto
    try {
        $dbh = new PDO('sqlite:./sql/ComputerStore.db');
    } catch (PDOException $e) {
        try {
            $dbh = new PDO('sqlite:../sql/ComputerStore.db');
        } catch (PDOException $e2) {
            echo $e;
            echo $e2;
            die();
        }
    }
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    session_start();
?>

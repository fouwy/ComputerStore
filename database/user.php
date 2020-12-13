<?php
function loginIsValid($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT username FROM person WHERE username=? AND password=?');
    $stmt->execute(array($username, $password) );
    return $stmt->fetch();
}
#Not working<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
?>
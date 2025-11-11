<?php

// Database credentials

$DB_HOST = 'sql302.infinityfree.com';

$DBNAME = 'if0_40308452_megatrades_db';

$DBUSER = 'if0_40308452';

$DBPASS = 'xbibXim7sNXZm';

// DSN and PDO options

$DSN = "mysql:host=$DB_HOST;dbname=$DBNAME;charset=utf8mb4";

$options = [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

];

// Create PDO instance

try {

    $pdo = new PDO($DSN, $DBUSER, $DBPASS, $options);

} catch (Exception $e) {

    die('Database connection failed: ' . htmlspecialchars($e->getMessage()));

}

?>
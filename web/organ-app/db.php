<?php

function getDb() {
    $db = NULL;

    // Try to get a Database Handle
    try {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $id = 1;
        // $statement = $db->prepare('SELECT student_first_name FROM student WHERE student_id=:id');
        // $statement->bindValue(':id', $id, PDO::PARAM_INT);
        // $statement->execute();
        // $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        // foreach ($rows as $row) {
        //     echo 'studentFirstName: ' . $row['student_first_name'] . '<br/>';
        // }
    } catch (PDOException $ex) {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }

    return $db;
}
?>
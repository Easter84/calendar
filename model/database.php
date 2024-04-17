<?php

declare(strict_types=1);
/**
 * This contains the basic code for connecting to the database. This file will be used
 * by the table specific php files.
 */
$dsn = "mysql:host=localhost;dbname=calendar";
$user_name = 'root';
$password = '';
$db_connection = new PDO($dsn, $user_name, $password);


/**
 * Creates a connection to the db and then runs a query using any arguments passed to it.
 * Depending on the arguments it either returns a boolean or an array.
 * @return array | bool Depending on $is_fetch true or false
 */
function execute_query(string $query, array $params = [], bool $is_fetch = true): array|bool 
{
    global $db_connection;

    $statement = $db_connection->prepare($query);
    foreach ($params as $param => $value) {
        $statement->bindValue($param, $value);
    }

    $success = $statement->execute();
    if ($is_fetch) {
        $result = $statement->fetchAll();
    } else {
        $result = $success;
    }
    $statement->closeCursor();
    return $result;
}
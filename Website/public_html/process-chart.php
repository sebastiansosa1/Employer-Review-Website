<?php
include_once 'database.php';

header('Content-Type: application/json');

$pdo = openConnection();

$query = "SELECT company_name, overall_rating
                        FROM reviewedEmployer_S
                        ORDER BY overall_rating DESC
                        LIMIT 0, 10";

$data = array();
try {
    $res = $pdo->query($query);
    while($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
} catch (PDOException $e) {
    die($e->getMessage());
}
$pdo = null;
print_r(json_encode($data));


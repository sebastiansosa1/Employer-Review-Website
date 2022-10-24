<?php
//required_once 'Review.php';
//required_once 'Employer.php';

/**
 * Create connection to the database
 *
 * @return PDO object which is the connection to the database
 */
function openConnection()
{
    try {
        $open_review_s_db = new PDO("sqlite:open_review_s_sqlite.db");
        $open_review_s_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    return $open_review_s_db;
}

?>



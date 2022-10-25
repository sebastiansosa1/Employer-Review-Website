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

//function buildOptionsList($id, $param)
//{
//    $open_review_s_db = openConnection();
//    $query = "SELECT employer_id, company_name FROM employer WHERE company_name LIKE '%$param%'";
//    try {
//        $res = $open_review_s_db->query($query);
//        echo "<datalist id='$id'>";
//        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
//            $val = $row['employer_id'];
//            $tag = $row['company_name'];
//            echo "<option value=$val>$tag</option>";
//        }
//        echo "</datalist>";
//
//    } catch (PDOException $e) {
//        die($e->getMessage());
//    }
//}

function buildOptionsList($param)
{
    $open_review_s_db = openConnection();
    $query = "SELECT employer_id, company_name FROM employer WHERE company_name LIKE '%$param%'";
    try {
        $res = $open_review_s_db->query($query);
        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $val = $row['employer_id'];
            $tag = $row['company_name'];
            echo "<option value=$val>$tag</option>";
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

?>



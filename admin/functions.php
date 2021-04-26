<?php
// This file contains all the functions

/**
 * redirect user to given location
 * @param mixed $location the new path
 */
function redirect($location)
{
    header("Location: $location");
}

/**
 * real escape a string for mysql
 * @param mixed $string string to be escaped
 * @return string escaped string
 */
function escape($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}
/**
 * Confirms that a query has succeeded, if not dies
 * @param mixed $result executed query statement
 */
function confirmQuery($result)
{
    global $connection;
    if (!$result) {
        die("Query Faild " . mysqli_error($connection));
    }
}
/**
 * runs a select query, checks it and returns all the 
 * @param mixed $query the select query to be run
 * @return string[]|null the result of the select query in an associative array format
 */
function selectQuery($query)
{
    global $connection;
    $select_query = mysqli_query($connection, $query);
    confirmQuery($select_query);
    // return mysqli_fetch_assoc($select_query);
    return $select_query;
}
/**
 * A function counts the rows by sending a query with one conditional column to database 
 * @param mixed $table database table
 * @param mixed $condition conditional column one
 * @param mixed $value value for condition one
 * @return int number of the rows in the table with those conditions
 */
function conditionalRecordCount($table, $condition, $value)
{
    global $connection;
    $query =  "SELECT * FROM $table WHERE $condition ='$value';";
    $select_all = mysqli_query($connection, $query);
    confirmQuery($select_all);
    $counts = mysqli_num_rows($select_all);
    return $counts;
}
/**
 * A function counts the rows by sending a query with one conditional column to database 
 * @param mixed $table database table
 * @param mixed $condition1 conditional column one
 * @param mixed $value1 value for condition one
 * @param mixed $condition2 conditional column two
 * @param mixed $value2 value for condition two
 * @return int number of the rows in the table with those conditions
 */
function doubleConditionalRecordCount($table, $condition1, $value1, $condition2, $value2)
{
    global $connection;
    $query =  "SELECT * FROM $table WHERE $condition1 ='$value1' AND $condition2 ='$value2';";
    $select_all = mysqli_query($connection, $query);
    confirmQuery($select_all);
    $counts = mysqli_num_rows($select_all);
    return $counts;
}
/**
 * checks if the user is logged in
 * @return true if logged
 * @return false if not logged
 */
function isLoggedIn()
{
    if (isset($_SESSION['user_role'])) {
        return true;
    }
    return false;
}
/**
 * checks if the logged in user is admin
 * @return true if is admin
 * @return false if is not admin
 */
function isAdmin()
{
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
        return true;
    }
    return false;
}
/**
 * redirect the user the parent page if not admin
 */
function adminOnly()
{
    if (!isAdmin()) {
        redirect('../');
    }
}
/**
 * delete a product from the get url
 * only admin can perform this
 */
function deleteProduct()
{
    if (isAdmin()) {
        if (isset($_GET['delete_p'])) {
            global $connection;
            $id = $_GET['delete_p'];
            $stmt = mysqli_prepare($connection, "DELETE FROM products WHERE id=?;");
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            redirect('./');
        }
    }
}

/**
 * delete a comment from the get url
 * only admin can perform this
 */
function deleteComment()
{
    if (isAdmin()) {
        if (isset($_GET['delete_c'])) {
            global $connection;
            $id = $_GET['delete_c'];
            $stmt = mysqli_prepare($connection, "DELETE FROM comments WHERE comment_id=?;");
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            redirect('./comments.php');
        }
    }
}
/**
 * create and echo an html output for stars based on the rating
 * @param mixed $rating the rating of the product
 */
function echoRating($rating)
{
    if ($rating < 1) {
        echo '<span class="item-star">No Rating Available</span>';
    } else {
        for ($i = 0; $i < 5; $i++) {
            if ($i < $rating) {
                echo '<i class="fas fa-star item-star"></i>';
            } else {
                echo '<i class="far fa-star item-star"></i>';
            }
        }
    }
}

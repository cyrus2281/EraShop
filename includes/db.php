<?php
//creating connection to database
const DB_HOST= "localhost";
const DB_USER= "milad";
const DB_PASSWORD= "secret";
const DB_NAME= "erashop";


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($connection) {
    // echo "we are connected";
} else {
    die("Could not connect to databse");
}

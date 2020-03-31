<?php
require_once("db_credentials.php");

//1. Create a database connection
function db_connect()
{
    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    confirm_db_connect();
    return $connection;
}

//2. Perform database query
//example:
//$query = "SELECT * FROM subjects ORDER BY position ASC";
//$result = mysqli_query($db,$query);

//4. Release returned data
//example:
//mysqli_fetch_all($result);

//5. CLose database connection
function db_disconnect($connection)
{
    if(isset($connection))
    {
     mysqli_close($connection);
    }
}

function db_escape($connection,$string)
{
    return mysqli_real_escape_string($connection,$string);
}

function confirm_db_connect()
{
    if(mysqli_connect_errno())
    {
        $msg = "Database connection failed: ";
        $msg .= mysqli_error();
        $msg .= "( ".mysqli_connect_errno()." ) ";
        exit($msg);
    }
}

function confirm_result($result)
{
    if(!$result)
    {
        exit("Database query failed");
    }
}
?>
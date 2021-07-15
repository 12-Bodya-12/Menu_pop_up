<?php
$con = new mysqli('localhost', 'root', 'root', "dropdownb");
if ($con->connect_errno) {
    die('Нет соединения: ' . $con->connect_error);
}
?>
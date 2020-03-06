<?php
    $dbHost="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="wysiwyg";

    $db=new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    mysqli_set_charset($db, 'UTF8');
    if($db->connect_error){
        die("Connection failed!: " .$db->connect_error);
    }

?>
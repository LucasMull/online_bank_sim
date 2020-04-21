#!/usr/bin/php

<?php

require_once "config.php";

if (!$conn){
        die("Connection failed: ".mysqli_connect_error()."\n");
}
echo "Connected successfully\n";

//CREATE DATABASE
$sql = "CREATE DATABASE IF NOT EXISTS agencies";
if ($conn->query($sql) === TRUE) {
        echo "Database created succesfully\n";
} else {
        echo "Error creating database: ".$conn->error."\n";
}
//CREATE TABLES
$path = "/home/".DB_USERNAME."/Projetos/online_bank_sim/clients";
$filenames = array_diff(scandir($path),array('..','.'));
$conn->query("USE agencies");
foreach ($filenames as $file) { 
        $sql = "CREATE TABLE new_$file ( acc SMALLINT(5) NOT NULL, psw VARCHAR(25) NOT NULL, PRIMARY KEY (acc))";
        if ($conn->query($sql) === TRUE ) {
                echo "Table new_".$file." created succesfully\n";
                $sql = "LOAD DATA LOCAL INFILE '$path/$file' INTO TABLE new_$file FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'";
                $conn->query($sql);
                if ($conn->query($sql) === TRUE ) {
                        echo "Succesfully populated table new_".$file."\n";
                } else {
                        echo "Error populating table new_".$file.":".$conn->error."\n";
                }
        } else {
                echo "Error creating table: ".$conn->error."\n";
        }
}

?>

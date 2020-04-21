<?php
// Include config file
require_once "config.php";

$agency = $account = $password = "";
$agency_err = $account_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty(trim($_POST['agency']))) {
                $agency_err = "Please enter your agency.";
        } else if (strlen(trim($_POST['agency'])) != 5) {
                $agency_err = "Invalid agency, please check your spelling.";
        } else {
                $password = $_POST['password'];
                $sql="SELECT acc FROM new_". trim($_POST['agency']) ." WHERE psw = '$password' ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) {
                        echo "Welcome ". trim($_POST['agency']);
                        echo " Success..";
                } else {
                        echo " Error..";
                }
        }
}
?>

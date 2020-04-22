<?php
// Include config file
require_once "config.php";

$agency = trim($_POST['agency']);
$agency_err = $account_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($agency)) {
                $agency_err = "Please enter your agency.";
        } else if (strlen($agency) != 5) {
                $agency_err = "Invalid agency, please check your spelling.";
        } else {
                $sql="SELECT * FROM new_$agency WHERE psw = ? AND acc = ?";
                if($stmt = mysqli_prepare($conn, $sql)){
                        mysqli_stmt_bind_param($stmt,"ss", $param_password, $param_account);
                        $param_account = trim($_POST['account']);
                        $param_password = $_POST['password'];
                       
                        if(mysqli_stmt_execute($stmt)) {
                                mysqli_stmt_store_result($stmt);

                                if(mysqli_stmt_num_rows($stmt) == 1) {
                                    $account = trim($_POST['account']);
                                    $password = $_POST['password'];
                                    echo "Welcome, $account!";
                                } else {
                                    echo "Couldn't match password with account or account doesn't exist";
                                }
                        }
                }
        }
} else echo "Something wrong happened, sorry...";
?>

<?php
require_once "config.php";

$agency = trim($_POST['agency']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql="SELECT * FROM new_$agency WHERE psw = ? AND acc = ?";
        if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("ss", $param_password, $param_account);
                $param_account = trim($_POST['account']);
                $param_password = $_POST['password'];
                if($stmt->execute()) {
                        $stmt->store_result();

                        if($stmt->num_rows == 1) {
                            header("Location: user.html");
                            exit;
                        } else {
                            echo "Couldn't match password with account or account doesn't exist";
                        }
                }
        $stmt->close();
        exit;
        }
        $mysqli->close();
}
echo "Something wrong happened, sorry...";
exit;
?>
